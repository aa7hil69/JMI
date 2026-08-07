"""PostgreSQL-backed data store shared by admin + public site."""
from __future__ import annotations

import os
from datetime import datetime
from pathlib import Path
from typing import Any

from lib import db

ROOT = Path(__file__).resolve().parents[1]
DATA = ROOT / "data"  # optional; runtime data is PostgreSQL


def now_str() -> str:
    return datetime.now().strftime("%Y-%m-%d %H:%M:%S")


def next_id(items: list[dict], key: str = "id") -> int:
    nums = []
    for it in items:
        try:
            nums.append(int(it.get(key)))
        except (TypeError, ValueError):
            pass
    return (max(nums) + 1) if nums else 1


def _row_to_dict(row: Any, columns: list[str]) -> dict:
    return {col: row[i] for i, col in enumerate(columns)}


# --- Jobs ---
_JOB_COLS = [
    "id",
    "company_name",
    "position",
    "location",
    "salary_per_month",
    "job_description",
    "responsibilities",
    "apply_before",
    "posted_on",
    "status",
]


def get_jobs(active_only: bool = False) -> list[dict]:
    sql = f"SELECT {', '.join(_JOB_COLS)} FROM jobs"
    params: tuple = ()
    if active_only:
        sql += " WHERE status = 1"
    sql += " ORDER BY id DESC"
    with db.connect() as conn:
        rows = conn.execute(sql, params).fetchall()
    return [_row_to_dict(r, _JOB_COLS) for r in rows]


def get_job(job_id: int | str) -> dict | None:
    jid = int(job_id)
    with db.connect() as conn:
        row = conn.execute(
            f"SELECT {', '.join(_JOB_COLS)} FROM jobs WHERE id = %s",
            (jid,),
        ).fetchone()
    return _row_to_dict(row, _JOB_COLS) if row else None


def save_jobs(jobs: list[dict]) -> None:
    with db.connect() as conn:
        conn.execute("DELETE FROM jobs")
        for j in jobs:
            conn.execute(
                """
                INSERT INTO jobs (
                    id, company_name, position, location, salary_per_month,
                    job_description, responsibilities, apply_before, posted_on, status
                ) VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)
                """,
                (
                    int(j.get("id")),
                    j.get("company_name") or "",
                    j.get("position") or "",
                    j.get("location") or "",
                    str(j.get("salary_per_month") or ""),
                    j.get("job_description") or "",
                    j.get("responsibilities") or "",
                    j.get("apply_before") or "",
                    j.get("posted_on") or "",
                    int(j.get("status", 0) or 0),
                ),
            )


# --- Clients ---
_CLIENT_COLS = ["id", "clientname", "status"]


def get_clients(active_only: bool = False) -> list[dict]:
    sql = f"SELECT {', '.join(_CLIENT_COLS)} FROM clients"
    if active_only:
        sql += " WHERE status = 1"
    sql += " ORDER BY LOWER(clientname) ASC, id ASC"
    with db.connect() as conn:
        rows = conn.execute(sql).fetchall()
    return [_row_to_dict(r, _CLIENT_COLS) for r in rows]


def save_clients(clients: list[dict]) -> None:
    ordered = sorted(clients, key=lambda c: str(c.get("clientname") or "").casefold())
    with db.connect() as conn:
        conn.execute("DELETE FROM clients")
        for c in ordered:
            conn.execute(
                "INSERT INTO clients (id, clientname, status) VALUES (%s,%s,%s)",
                (int(c.get("id")), c.get("clientname") or "", int(c.get("status", 0) or 0)),
            )


# --- Gallery ---
_GALLERY_COLS = ["id", "title", "description", "image", "uploaded_on"]


def get_gallery() -> list[dict]:
    with db.connect() as conn:
        rows = conn.execute(
            f"SELECT {', '.join(_GALLERY_COLS)} FROM gallery ORDER BY id DESC"
        ).fetchall()
    return [_row_to_dict(r, _GALLERY_COLS) for r in rows]


def save_gallery(items: list[dict]) -> None:
    with db.connect() as conn:
        conn.execute("DELETE FROM gallery")
        for g in items:
            conn.execute(
                """
                INSERT INTO gallery (id, title, description, image, uploaded_on)
                VALUES (%s,%s,%s,%s,%s)
                """,
                (
                    int(g.get("id")),
                    g.get("title") or "",
                    g.get("description") or "",
                    g.get("image") or "",
                    g.get("uploaded_on") or "",
                ),
            )


# --- Events ---
_EVENT_COLS = [
    "id",
    "event_name",
    "event_details",
    "event_url",
    "posted_on",
    "posted_by",
    "photo1",
    "photo2",
    "photo3",
    "enabled",
    "created_at",
]


def get_events(enabled_only: bool = False) -> list[dict]:
    sql = f"SELECT {', '.join(_EVENT_COLS)} FROM events"
    if enabled_only:
        sql += " WHERE enabled IN ('1', 'true', 'True')"
    sql += " ORDER BY id DESC"
    with db.connect() as conn:
        rows = conn.execute(sql).fetchall()
    out = []
    for r in rows:
        d = _row_to_dict(r, _EVENT_COLS)
        # Keep string ids for compatibility with existing admin JS/API
        d["id"] = str(d["id"])
        out.append(d)
    return out


def save_events(events: list[dict]) -> None:
    with db.connect() as conn:
        conn.execute("DELETE FROM events")
        for e in events:
            conn.execute(
                """
                INSERT INTO events (
                    id, event_name, event_details, event_url, posted_on, posted_by,
                    photo1, photo2, photo3, enabled, created_at
                ) VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)
                """,
                (
                    int(e.get("id") or 0),
                    e.get("event_name") or "",
                    e.get("event_details") or "",
                    e.get("event_url") or "",
                    e.get("posted_on") or "",
                    e.get("posted_by") or "",
                    e.get("photo1"),
                    e.get("photo2"),
                    e.get("photo3"),
                    str(e.get("enabled", "1")),
                    e.get("created_at") or "",
                ),
            )


# --- Messages ---
_MSG_COLS = ["id", "username", "email", "message", "created_at"]


def get_messages() -> list[dict]:
    with db.connect() as conn:
        rows = conn.execute(
            f"SELECT {', '.join(_MSG_COLS)} FROM messages ORDER BY id DESC"
        ).fetchall()
    return [_row_to_dict(r, _MSG_COLS) for r in rows]


def save_messages(messages: list[dict]) -> None:
    with db.connect() as conn:
        conn.execute("DELETE FROM messages")
        for m in messages:
            conn.execute(
                """
                INSERT INTO messages (id, username, email, message, created_at)
                VALUES (%s,%s,%s,%s,%s)
                """,
                (
                    int(m.get("id")),
                    m.get("username") or "",
                    m.get("email") or "",
                    m.get("message") or "",
                    m.get("created_at") or "",
                ),
            )


# --- Applications ---
_APP_COLS = [
    "id",
    "job_id",
    "company",
    "position",
    "location",
    "username",
    "phone",
    "email",
    "submitted_at",
    "resume_path",
]
_APP_RD_COLS = ["id", "username", "phone", "email", "submitted_at", "resume_path"]


def get_applications(rd: bool = False) -> list[dict]:
    if rd:
        with db.connect() as conn:
            rows = conn.execute(
                f"SELECT {', '.join(_APP_RD_COLS)} FROM applications_rd ORDER BY id DESC"
            ).fetchall()
        return [_row_to_dict(r, _APP_RD_COLS) for r in rows]
    with db.connect() as conn:
        rows = conn.execute(
            f"SELECT {', '.join(_APP_COLS)} FROM applications ORDER BY id DESC"
        ).fetchall()
    return [_row_to_dict(r, _APP_COLS) for r in rows]


def save_applications(apps: list[dict], rd: bool = False) -> None:
    if rd:
        with db.connect() as conn:
            conn.execute("DELETE FROM applications_rd")
            for a in apps:
                conn.execute(
                    """
                    INSERT INTO applications_rd
                        (id, username, phone, email, submitted_at, resume_path)
                    VALUES (%s,%s,%s,%s,%s,%s)
                    """,
                    (
                        int(a.get("id")),
                        a.get("username") or "",
                        a.get("phone") or "",
                        a.get("email") or "",
                        a.get("submitted_at") or "",
                        a.get("resume_path"),
                    ),
                )
        return

    with db.connect() as conn:
        conn.execute("DELETE FROM applications")
        for a in apps:
            job_id = a.get("job_id")
            conn.execute(
                """
                INSERT INTO applications (
                    id, job_id, company, position, location,
                    username, phone, email, submitted_at, resume_path
                ) VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)
                """,
                (
                    int(a.get("id")),
                    int(job_id) if job_id not in (None, "") else None,
                    a.get("company") or "",
                    a.get("position") or "",
                    a.get("location") or "",
                    a.get("username") or "",
                    a.get("phone") or "",
                    a.get("email") or "",
                    a.get("submitted_at") or "",
                    a.get("resume_path"),
                ),
            )


def _guess_content_type(filename: str) -> str:
    import mimetypes

    ctype, _ = mimetypes.guess_type(filename)
    return ctype or "application/octet-stream"


def _save_upload_db(rel_path: str, file_bytes: bytes, content_type: str) -> None:
    with db.connect() as conn:
        conn.execute(
            """
            INSERT INTO upload_files (path, content, content_type, created_at)
            VALUES (%s, %s, %s, %s)
            ON CONFLICT (path) DO UPDATE SET
                content = EXCLUDED.content,
                content_type = EXCLUDED.content_type,
                created_at = EXCLUDED.created_at
            """,
            (rel_path, file_bytes, content_type, now_str()),
        )


def get_upload(rel_path: str) -> tuple[bytes, str] | None:
    """Return (bytes, content_type) for a stored upload path, or None."""
    path = (rel_path or "").lstrip("/")
    if not path:
        return None
    disk = ROOT / path
    if disk.is_file():
        return disk.read_bytes(), _guess_content_type(path)
    with db.connect() as conn:
        row = conn.execute(
            "SELECT content, content_type FROM upload_files WHERE path = %s",
            (path,),
        ).fetchone()
    if not row:
        return None
    content, ctype = row[0], row[1] or _guess_content_type(path)
    if isinstance(content, memoryview):
        content = content.tobytes()
    return bytes(content), ctype


def save_upload(file_bytes: bytes, relative_dir: str, filename: str) -> str:
    stamp = datetime.now().strftime("%Y%m%d%H%M%S%f")
    safe = "".join(c if c.isalnum() or c in ".-_" else "_" for c in filename) or "upload.bin"
    out_name = f"{stamp}-{safe}"
    rel_path = f"{relative_dir}/{out_name}".replace("\\", "/")
    dest = ROOT / relative_dir / out_name
    ctype = _guess_content_type(filename)

    wrote_disk = False
    try:
        dest.parent.mkdir(parents=True, exist_ok=True)
        if dest.exists():
            out_name = f"{stamp}-{os.getpid()}-{safe}"
            rel_path = f"{relative_dir}/{out_name}".replace("\\", "/")
            dest = ROOT / relative_dir / out_name
        dest.write_bytes(file_bytes)
        wrote_disk = True
    except OSError:
        # Vercel / serverless: /var/task is read-only — persist in Postgres instead
        wrote_disk = False

    if not wrote_disk or os.environ.get("VERCEL"):
        _save_upload_db(rel_path, file_bytes, ctype)
    return rel_path
