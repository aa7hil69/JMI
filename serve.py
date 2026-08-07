#!/usr/bin/env python3
"""Local server: public site + admin CMS backed by PostgreSQL."""
from __future__ import annotations

import argparse
import base64
import http.cookies
import json
import re
import sys
from datetime import datetime
from http.server import SimpleHTTPRequestHandler, ThreadingHTTPServer
from pathlib import Path
from urllib.parse import parse_qs, urlparse

ROOT = Path(__file__).resolve().parent
sys.path.insert(0, str(ROOT))

from lib import admin_render, db, render, store, urls  # noqa: E402

ADMIN_USER = "admin"
ADMIN_PASS = "jmspc"
AUTH_COOKIE = "jmi_admin"

_schema_ready = False


def _ensure_db() -> None:
    """Lazy schema init for serverless (Vercel never calls main())."""
    global _schema_ready
    if _schema_ready:
        return
    db.ensure_schema()
    _schema_ready = True


class Handler(SimpleHTTPRequestHandler):
    def __init__(self, *args, **kwargs):
        super().__init__(*args, directory=str(ROOT), **kwargs)

    # ---------- helpers ----------
    def _cookies(self) -> http.cookies.SimpleCookie:
        c = http.cookies.SimpleCookie()
        raw = self.headers.get("Cookie", "")
        if raw:
            try:
                c.load(raw)
            except http.cookies.CookieError:
                pass
        return c

    def _authed(self) -> bool:
        c = self._cookies()
        return AUTH_COOKIE in c and c[AUTH_COOKIE].value == "1"

    def _redirect(self, location: str, set_cookie: str | None = None, code: int = 302):
        self.send_response(code)
        self.send_header("Location", location)
        if set_cookie is not None:
            self.send_header("Set-Cookie", set_cookie)
        self.end_headers()

    def _prepare_html(self, text: str) -> str:
        text = urls.pretty_html(text)
        # Ensure admin pages get in-page toasts instead of browser alert() for DataTables
        if "/admin/assets/admin-notify.js" not in text and "dataTables" in text.lower():
            inject = '<script src="/admin/assets/admin-notify.js"></script>\n'
            if "jquery.dataTables.min.js" in text:
                text = text.replace(
                    "jquery.dataTables.min.js\"></script>",
                    "jquery.dataTables.min.js\"></script>\n    " + inject,
                    1,
                )
            elif "</body>" in text:
                text = text.replace("</body>", inject + "</body>", 1)
        return text

    def _bytes(self, data: bytes, content_type: str = "text/html; charset=utf-8", code: int = 200):
        if "text/html" in content_type:
            data = self._prepare_html(data.decode("utf-8", errors="ignore")).encode("utf-8")
        self.send_response(code)
        self.send_header("Content-Type", content_type)
        self.send_header("Content-Length", str(len(data)))
        self.end_headers()
        self.wfile.write(data)

    def _html(self, text: str, code: int = 200):
        self._bytes(text.encode("utf-8"), "text/html; charset=utf-8", code)

    def _json(self, obj, code: int = 200):
        raw = json.dumps(obj, ensure_ascii=False).encode("utf-8")
        self._bytes(raw, "application/json; charset=utf-8", code)

    def _read_body(self) -> bytes:
        length = int(self.headers.get("Content-Length", 0) or 0)
        return self.rfile.read(length) if length else b""

    def _form(self) -> dict[str, list[str]]:
        ctype = self.headers.get("Content-Type", "")
        if "multipart/form-data" in ctype:
            return {}
        return parse_qs(self._read_body().decode("utf-8", errors="ignore"))

    def _multipart(self) -> dict:
        """Minimal multipart/form-data parser (cgi removed in Python 3.13+)."""
        ctype = self.headers.get("Content-Type", "")
        m = re.search(r'boundary=(?:"([^"]+)"|([^;]+))', ctype, re.I)
        if not m:
            return {"fields": {}, "files": {}}
        boundary = (m.group(1) or m.group(2)).encode("utf-8")
        body = self._read_body()
        fields: dict[str, str] = {}
        files: dict[str, dict] = {}
        for part in body.split(b"--" + boundary):
            if part in (b"", b"--", b"--\r\n", b"\r\n"):
                continue
            if part.startswith(b"--"):
                break
            if part.startswith(b"\r\n"):
                part = part[2:]
            header_blob, _, content = part.partition(b"\r\n\r\n")
            if not _:
                continue
            headers = header_blob.decode("utf-8", errors="ignore")
            content = content.rstrip(b"\r\n")
            name_m = re.search(r'name="([^"]+)"', headers)
            if not name_m:
                continue
            name = name_m.group(1)
            filename_m = re.search(r'filename="([^"]*)"', headers)
            if filename_m is not None:
                files[name] = {"filename": filename_m.group(1), "data": content}
            else:
                fields[name] = content.decode("utf-8", errors="ignore")
        return {"fields": fields, "files": files}

    def _admin_rel(self, path: str) -> str | None:
        if path == "/admin" or path.startswith("/admin/"):
            # Empty string (not "dashboard") — avoids ADMIN_REDIRECTS self-loop.
            return path[len("/admin") :].lstrip("/")
        return None

    def _require_admin(self) -> bool:
        if self._authed():
            return True
        self._redirect("/admin/login")
        return False

    # ---------- routing ----------
    def do_GET(self):
        try:
            _ensure_db()
        except Exception as exc:
            return self.send_error(500, f"Database unavailable: {exc}")

        parsed = urlparse(self.path)
        path = parsed.path.rstrip("/") or "/"
        # keep /admin as /admin (not empty after rstrip of trailing only)
        if parsed.path.startswith("/admin") and path == "/admin":
            path = "/admin"
        elif parsed.path.startswith("/admin/"):
            path = parsed.path if not parsed.path.endswith("/") else parsed.path[:-1]
        qs = parse_qs(parsed.query)
        query = parsed.query

        # Admin first (so /admin/clients is never caught by public /clients)
        admin_rel = self._admin_rel(parsed.path if parsed.path.startswith("/admin") else path)
        if admin_rel is not None:
            return self._handle_admin_get(admin_rel, qs, query)

        # Convenience aliases
        if path in ("/logout.php", "/logout"):
            return self._redirect("/admin/logout")
        if path in ("/login.php", "/login"):
            return self._redirect("/admin/login")

        # Legacy public → clean redirects
        if path in urls.PUBLIC_REDIRECTS:
            dest = urls.PUBLIC_REDIRECTS[path]
            return self._redirect(dest, code=302)
        if path == "/job-details.php":
            job_id = (qs.get("job_id") or [""])[0]
            return self._redirect(f"/jobs/{job_id}" if job_id else "/jobs")
        if path == "/job-submit.php":
            job_id = (qs.get("job_id") or [""])[0]
            return self._redirect(f"/jobs/{job_id}/apply" if job_id else "/jobs/resume-drop-off")

        # Clean public routes
        if path == "/":
            return self._html(render.render_index())
        if path == "/clients":
            return self._html(render.render_clients_page())
        if path == "/events":
            return self._html(render.render_events_page())
        if path == "/jobs":
            return self._html(render.render_job_list_page())
        if path == "/jobs/resume-drop-off":
            return self._bytes((ROOT / "job-submit-rd.php").read_bytes())

        m_apply = re.fullmatch(r"/jobs/(\d+)/apply", path)
        if m_apply:
            job_id = m_apply.group(1)
            target = ROOT / "job-submit-cache" / f"job-{job_id}.html"
            if not target.is_file():
                target = ROOT / "job-submit-rd.php"
            return self._bytes(target.read_bytes())

        m_job = re.fullmatch(r"/jobs/(\d+)", path)
        if m_job:
            job = store.get_job(m_job.group(1))
            if not job:
                return self.send_error(404, "Job not found")
            return self._html(render.render_job_details(job))

        if path in urls.PUBLIC_STATIC:
            target = ROOT / urls.PUBLIC_STATIC[path]
            if target.is_file():
                return self._bytes(target.read_bytes())
            return self.send_error(404)

        # Static assets / leftover files
        rel = parsed.path.lstrip("/") or "index.php"
        target = ROOT / rel
        if target.is_file() and target.suffix.lower() == ".php":
            return self._bytes(target.read_bytes())

        # Uploads may live only in Postgres on Vercel (read-only disk)
        if rel.startswith("uploads/") or rel.startswith("Uploads/"):
            blob = store.get_upload(rel)
            if blob:
                data, ctype = blob
                return self._bytes(data, ctype)

        return super().do_GET()

    def do_POST(self):
        try:
            _ensure_db()
        except Exception as exc:
            return self.send_error(500, f"Database unavailable: {exc}")

        parsed = urlparse(self.path)
        path = parsed.path.rstrip("/") or "/"
        if parsed.path.startswith("/admin/"):
            path = parsed.path[:-1] if parsed.path.endswith("/") else parsed.path
        qs = parse_qs(parsed.query)
        admin_rel = self._admin_rel(parsed.path)

        if admin_rel in ("login", "login.php"):
            form = self._form()
            username = (form.get("username") or [""])[0]
            password = (form.get("password") or [""])[0]
            if username == ADMIN_USER and password == ADMIN_PASS:
                return self._redirect(
                    "/admin",
                    f"{AUTH_COOKIE}=1; Path=/; HttpOnly; SameSite=Lax",
                )
            return self._redirect("/admin/login?error=1")

        if path in ("/contact", "/sendmessage.php") or path.endswith("sendmessage.php"):
            return self._handle_contact_post()

        m_apply = re.fullmatch(r"/jobs/(\d+)/apply", path)
        if m_apply:
            return self._handle_job_submit(False, {"job_id": [m_apply.group(1)]})
        if path in ("/jobs/resume-drop-off", "/job-submit-rd.php") or path.endswith("job-submit-rd.php"):
            return self._handle_job_submit(True, qs)
        if path.endswith("job-submit.php"):
            return self._handle_job_submit(False, qs)

        if admin_rel is not None:
            if not self._authed():
                return self._redirect("/admin/login")
            return self._handle_admin_post(urls.normalize_admin_rel(admin_rel), qs)

        self.send_error(405)

    def do_PUT(self):
        return self._handle_admin_api_write("PUT")

    def do_PATCH(self):
        return self._handle_admin_api_write("PATCH")

    def do_DELETE(self):
        return self._handle_admin_api_write("DELETE")

    # ---------- admin GET ----------
    def _handle_admin_get(self, admin_rel: str, qs: dict, query: str = ""):
        # Legacy filename → clean URL
        dest = urls.admin_redirect_target(admin_rel, query)
        if dest:
            return self._redirect(dest)

        admin_rel = urls.normalize_admin_rel(admin_rel)

        if admin_rel == "login.php":
            return self._bytes((ROOT / "admin" / "login.php").read_bytes())
        if admin_rel == "logout.php":
            return self._redirect("/admin/login", f"{AUTH_COOKIE}=; Path=/; Max-Age=0")

        if admin_rel == "api.php":
            # public-ish for authenticated admin events UI
            if not self._authed():
                return self._json({"error": "Unauthorized"}, 401)
            events = store.get_events()
            name = (qs.get("name") or [""])[0].lower()
            date_from = (qs.get("from") or [""])[0]
            date_to = (qs.get("to") or [""])[0]
            if name:
                events = [e for e in events if name in (e.get("event_name") or "").lower()]
            if date_from:
                events = [e for e in events if (e.get("posted_on") or "") >= date_from]
            if date_to:
                events = [e for e in events if (e.get("posted_on") or "") <= date_to]
            return self._json(events)

        if not self._require_admin():
            return

        if admin_rel == "dashboard.php":
            return self._bytes((ROOT / "admin" / "dashboard.php").read_bytes())

        if admin_rel == "jobs_admin.php":
            delete_id = (qs.get("delete_id") or [""])[0]
            if delete_id:
                jobs = [j for j in store.get_jobs() if str(j.get("id")) != str(delete_id)]
                store.save_jobs(jobs)
                return self._redirect("/admin/jobs")
            return self._html(admin_render.render_jobs_admin())

        if admin_rel == "edit_job_form.php":
            job_id = int((qs.get("job_id") or ["0"])[0] or 0)
            return self._html(admin_render.edit_job_form_html(job_id))

        if admin_rel == "clients.php":
            if qs.get("toggle_id"):
                tid = int(qs["toggle_id"][0])
                clients = store.get_clients()
                for c in clients:
                    if int(c.get("id")) == tid:
                        c["status"] = 0 if int(c.get("status", 0)) == 1 else 1
                        break
                store.save_clients(clients)
                return self._redirect("/admin/clients")
            if qs.get("delete_id"):
                did = qs["delete_id"][0]
                store.save_clients([c for c in store.get_clients() if str(c.get("id")) != str(did)])
                return self._redirect("/admin/clients")
            filters = {k: (qs.get(k) or [""])[0] for k in ("clientname", "status")}
            return self._html(admin_render.render_clients_admin(filters=filters))

        if admin_rel == "gallery.php":
            if qs.get("delete"):
                did = qs["delete"][0]
                store.save_gallery([g for g in store.get_gallery() if str(g.get("id")) != str(did)])
                return self._redirect("/admin/gallery")
            search = (qs.get("search") or [""])[0]
            return self._html(admin_render.render_gallery_admin(search=search))

        if admin_rel == "messages.php":
            if qs.get("delete_id"):
                did = qs["delete_id"][0]
                store.save_messages([m for m in store.get_messages() if str(m.get("id")) != str(did)])
                return self._redirect("/admin/messages")
            return self._html(admin_render.render_messages_admin())

        if admin_rel == "applications_list.php":
            filters = {k: (qs.get(k) or [""])[0] for k in (
                "username", "phone", "email", "from_date", "to_date",
                "job_id", "company", "position", "location",
            )}
            return self._html(admin_render.render_applications_admin(rd=False, filters=filters))
        if admin_rel == "applications_list_rd.php":
            filters = {k: (qs.get(k) or [""])[0] for k in (
                "username", "phone", "email", "from_date", "to_date",
            )}
            return self._html(admin_render.render_applications_admin(rd=True, filters=filters))

        if admin_rel == "admin-events.html":
            return self._bytes((ROOT / "admin" / "admin-events.html").read_bytes())

        target = ROOT / "admin" / admin_rel
        if target.is_file():
            return self._bytes(target.read_bytes())
        if (ROOT / "admin" / f"{admin_rel}.php").is_file():
            return self._bytes((ROOT / "admin" / f"{admin_rel}.php").read_bytes())
        self.send_error(404, "Admin page not found")

    # ---------- admin POST ----------
    def _handle_admin_post(self, admin_rel: str, qs: dict):
        if admin_rel == "api.php":
            return self._events_create()

        if admin_rel == "toggle_status.php":
            form = self._form()
            job_id = (form.get("job_id") or [""])[0]
            status = (form.get("status") or ["0"])[0]
            jobs = store.get_jobs()
            for j in jobs:
                if str(j.get("id")) == str(job_id):
                    j["status"] = int(status)
                    break
            store.save_jobs(jobs)
            return self._json({"success": True})

        if admin_rel == "update_job.php":
            form = self._form()
            job_id = (form.get("id") or form.get("job_id") or [""])[0]
            jobs = store.get_jobs()
            for j in jobs:
                if str(j.get("id")) == str(job_id):
                    for key in (
                        "company_name",
                        "position",
                        "location",
                        "salary_per_month",
                        "job_description",
                        "responsibilities",
                        "apply_before",
                    ):
                        if key in form:
                            j[key] = form[key][0]
                    j["status"] = 1 if form.get("status") else 0
                    break
            store.save_jobs(jobs)
            return self._json({"success": True})

        if admin_rel == "jobs_admin.php":
            # add job (multipart or urlencoded)
            ctype = self.headers.get("Content-Type", "")
            if "multipart/form-data" in ctype:
                mp = self._multipart()
                get = lambda k, d="": mp["fields"].get(k, d)
                status = 1 if mp["fields"].get("status") else 0
            else:
                form = self._form()
                get = lambda k, d="": (form.get(k) or [d])[0]
                status = 1 if form.get("status") else 0
            jobs = store.get_jobs()
            jobs.append(
                {
                    "id": store.next_id(jobs),
                    "company_name": get("company_name"),
                    "position": get("position"),
                    "location": get("location"),
                    "salary_per_month": get("salary_per_month"),
                    "job_description": get("job_description"),
                    "responsibilities": get("responsibilities"),
                    "apply_before": get("apply_before"),
                    "posted_on": store.now_str(),
                    "status": status,
                }
            )
            store.save_jobs(jobs)
            return self._redirect("/admin/jobs")

        if admin_rel == "clients.php":
            form = self._form()
            name = (form.get("clientname") or [""])[0].strip()
            if name:
                clients = store.get_clients()
                clients.append({"id": store.next_id(clients), "clientname": name, "status": 1})
                store.save_clients(clients)
            return self._redirect("/admin/clients")

        if admin_rel == "gallery.php":
            ctype = self.headers.get("Content-Type", "")
            items = store.get_gallery()
            if "multipart/form-data" in ctype:
                mp = self._multipart()
                title = mp["fields"].get("title", "")
                description = mp["fields"].get("description", "")
                gid = mp["fields"].get("id")
                if gid:  # edit meta
                    for g in items:
                        if str(g.get("id")) == str(gid):
                            g["title"] = title
                            g["description"] = description
                            break
                else:
                    image_path = ""
                    fileitem = mp["files"].get("image")
                    if fileitem and fileitem.get("filename"):
                        image_path = store.save_upload(
                            fileitem["data"], "uploads/gallery", fileitem["filename"]
                        )
                    items.insert(
                        0,
                        {
                            "id": store.next_id(items),
                            "title": title,
                            "description": description,
                            "image": image_path,
                            "uploaded_on": store.now_str(),
                        },
                    )
                store.save_gallery(items)
            else:
                form = self._form()
                gid = (form.get("id") or [""])[0]
                if gid:
                    for g in items:
                        if str(g.get("id")) == str(gid):
                            g["title"] = (form.get("title") or [""])[0]
                            g["description"] = (form.get("description") or [""])[0]
                            break
                    store.save_gallery(items)
            return self._redirect("/admin/gallery")

        if admin_rel == "messages.php":
            form = self._form()
            if form.get("delete_all_messages"):
                store.save_messages([])
            return self._redirect("/admin/messages")

        self.send_error(404, "Unknown admin POST")

    def _handle_admin_api_write(self, method: str):
        try:
            _ensure_db()
        except Exception as exc:
            return self.send_error(500, f"Database unavailable: {exc}")

        parsed = urlparse(self.path)
        admin_rel = urls.normalize_admin_rel(self._admin_rel(parsed.path) or "")
        if admin_rel != "api.php":
            return self.send_error(405)
        if not self._authed():
            return self._json({"error": "Unauthorized"}, 401)
        qs = parse_qs(parsed.query)

        if method == "DELETE":
            eid = (qs.get("id") or [""])[0]
            store.save_events([e for e in store.get_events() if str(e.get("id")) != str(eid)])
            return self._json({"success": True})

        if method == "PATCH":
            eid = (qs.get("id") or [""])[0]
            enabled = (qs.get("enabled") or ["1"])[0]
            events = store.get_events()
            for e in events:
                if str(e.get("id")) == str(eid):
                    e["enabled"] = str(enabled)
                    break
            store.save_events(events)
            return self._json({"success": True})

        if method == "PUT":
            return self._events_update()

        self.send_error(405)

    def _save_event_photos(self, photos: list) -> list[str | None]:
        out: list[str | None] = []
        for i, p in enumerate((photos or [])[:3]):
            if not p:
                out.append(None)
                continue
            if isinstance(p, str) and p.startswith("data:"):
                # data URL
                m = re.match(r"data:(.*?);base64,(.*)", p, re.S)
                if not m:
                    out.append(None)
                    continue
                ext = "png" if "png" in m.group(1) else "jpg"
                raw = base64.b64decode(m.group(2))
                path = store.save_upload(raw, "Uploads", f"event-{i + 1}.{ext}")
                out.append(path)
            else:
                out.append(str(p).replace("../", ""))
        while len(out) < 3:
            out.append(None)
        return out

    def _events_create(self):
        body = json.loads(self._read_body().decode("utf-8") or "{}")
        events = store.get_events()
        photos = self._save_event_photos(body.get("photos") or [])
        events.insert(
            0,
            {
                "id": str(store.next_id([{**e, "id": int(e.get("id", 0) or 0)} for e in events])),
                "event_name": body.get("eventName", ""),
                "event_details": body.get("eventDetails", ""),
                "event_url": body.get("eventUrl", ""),
                "posted_on": body.get("postedOn", ""),
                "posted_by": body.get("postedBy", ""),
                "photo1": photos[0],
                "photo2": photos[1],
                "photo3": photos[2],
                "enabled": "1",
                "created_at": store.now_str(),
            },
        )
        store.save_events(events)
        return self._json({"success": True})

    def _events_update(self):
        body = json.loads(self._read_body().decode("utf-8") or "{}")
        eid = str(body.get("id", ""))
        events = store.get_events()
        for e in events:
            if str(e.get("id")) == eid:
                e["event_name"] = body.get("eventName", e.get("event_name"))
                e["event_details"] = body.get("eventDetails", e.get("event_details"))
                e["event_url"] = body.get("eventUrl", e.get("event_url"))
                e["posted_on"] = body.get("postedOn", e.get("posted_on"))
                e["posted_by"] = body.get("postedBy", e.get("posted_by"))
                if body.get("photos"):
                    photos = self._save_event_photos(body.get("photos") or [])
                    e["photo1"], e["photo2"], e["photo3"] = photos
                break
        store.save_events(events)
        return self._json({"success": True})

    # ---------- public forms ----------
    def _handle_contact_post(self):
        form = self._form()
        messages = store.get_messages()
        messages.append(
            {
                "id": store.next_id(messages),
                "username": (form.get("username") or [""])[0],
                "email": (form.get("email") or [""])[0],
                "message": (form.get("message") or [""])[0],
                "created_at": store.now_str(),
            }
        )
        store.save_messages(messages)
        return self._html(
            "<!DOCTYPE html><html><body style='font-family:sans-serif;padding:2rem'>"
            "<h1>Thank you</h1><p>Your message was received.</p>"
            "<p><a href='/contact'>Back</a></p></body></html>"
        )

    def _handle_job_submit(self, rd: bool, qs: dict):
        ctype = self.headers.get("Content-Type", "")
        resume_path = None
        if "multipart/form-data" in ctype:
            mp = self._multipart()
            username = mp["fields"].get("username", "")
            phone = mp["fields"].get("phone", "")
            email = mp["fields"].get("email", "")
            fileitem = mp["files"].get("resume")
            if fileitem and fileitem.get("filename"):
                resume_path = store.save_upload(
                    fileitem["data"], "uploads/resumes", fileitem["filename"]
                )
        else:
            form = self._form()
            username = (form.get("username") or [""])[0]
            phone = (form.get("phone") or [""])[0]
            email = (form.get("email") or [""])[0]

        apps = store.get_applications(rd=rd)
        app = {
            "id": store.next_id(apps),
            "username": username,
            "phone": phone,
            "email": email,
            "submitted_at": store.now_str(),
            "resume_path": resume_path,
        }
        if not rd:
            job_id = (qs.get("job_id") or [""])[0]
            app["job_id"] = int(job_id) if job_id else None
            job = store.get_job(job_id) if job_id else None
            if job:
                app["company"] = job.get("company_name")
                app["position"] = job.get("position")
                app["location"] = job.get("location")
        apps.append(app)
        store.save_applications(apps, rd=rd)
        return self._html(
            "<!DOCTYPE html><html><body style='font-family:sans-serif;padding:2rem'>"
            "<h1>Application received</h1><p>Thank you. Your application was saved.</p>"
            "<p><a href='/jobs'>Back to jobs</a></p></body></html>"
        )

    def log_message(self, fmt: str, *args):
        sys.stderr.write("%s - %s\n" % (self.address_string(), fmt % args))


# Vercel / serverless alias (entrypoint may also use Handler directly)
handler = Handler


def main():
    parser = argparse.ArgumentParser()
    parser.add_argument("--host", default="127.0.0.1")
    parser.add_argument("--port", type=int, default=8080)
    args = parser.parse_args()
    try:
        _ensure_db()
    except Exception as exc:
        print("PostgreSQL connection failed.")
        print(f"  URL: {db.database_url()}")
        print("  Create site-crawl/.env from .env.example with your password, then run:")
        print("    python scripts/migrate_json_to_pg.py")
        print(f"  Error: {exc}")
        sys.exit(1)
    server = ThreadingHTTPServer((args.host, args.port), Handler)
    print(f"JM site + admin CMS at http://{args.host}:{args.port}/")
    print(f"Admin: http://{args.host}:{args.port}/admin/login")
    print(f"Database: {db.database_url()}")
    print("Press Ctrl+C to stop")
    server.serve_forever()


if __name__ == "__main__":
    main()
