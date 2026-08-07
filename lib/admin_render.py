"""Render admin list pages from shared JSON using crawled HTML shells."""
from __future__ import annotations

import html
import json
import re
from pathlib import Path

from lib import store

ROOT = Path(__file__).resolve().parents[1]
ADMIN = ROOT / "admin"


def _esc(s: object) -> str:
    return html.escape("" if s is None else str(s), quote=True)


def _read(name: str) -> str:
    return (ADMIN / name).read_text(encoding="utf-8", errors="ignore")


def render_jobs_admin() -> str:
    page = _read("jobs_admin.php")
    rows = []
    for j in store.get_jobs():
        jid = int(j.get("id"))
        status = int(j.get("status", 0))
        checked = "checked" if status == 1 else ""
        rows.append(
            f"""<tr>
            <td>{jid}</td>
            <td>{_esc(j.get('company_name'))}</td>
            <td>{_esc(j.get('position'))}</td>
            <td>{_esc(j.get('location'))}</td>
            <td>{_esc(j.get('salary_per_month') or 'N/A')}</td>
            <td>{_esc(j.get('posted_on'))}</td>
            <td>{_esc(j.get('apply_before'))}</td>
            <td>
              <label class="switch">
                <input type="checkbox" class="status-toggle" data-id="{jid}" {checked}>
                <span class="slider round"></span>
              </label>
            </td>
            <td>
              <button type="button" class="btn btn-sm btn-primary edit-job-btn" data-id="{jid}">Edit</button>
              <a class="btn btn-sm btn-danger" href="jobs_admin.php?delete_id={jid}" onclick="return confirm('Delete this job?')">Delete</a>
            </td>
            </tr>"""
        )
    # replace tbody contents if present
    if re.search(r"<tbody[^>]*>", page, re.I):
        page = re.sub(r"(<tbody[^>]*>)(.*?)(</tbody>)", rf"\1{''.join(rows)}\3", page, count=1, flags=re.S | re.I)
    return page


def render_clients_admin(filters: dict | None = None) -> str:
    page = _read("clients.php")
    filters = filters or {}
    name_q = str(filters.get("clientname") or "").strip().lower()
    status_q = str(filters.get("status") or "").strip()

    rows = []
    for c in store.get_clients():
        if name_q and name_q not in str(c.get("clientname") or "").lower():
            continue
        if status_q != "" and str(int(c.get("status", 0))) != status_q:
            continue
        cid = int(c.get("id"))
        status = int(c.get("status", 0))
        badge = '<span class="badge bg-success">Active</span>' if status == 1 else '<span class="badge bg-secondary">Inactive</span>'
        toggle_label = "Disable" if status == 1 else "Enable"
        rows.append(
            f"<tr><td>{cid}</td><td class='clientname-cell'>{_esc(c.get('clientname'))}</td>"
            f"<td>{badge}</td><td>"
            f"<a href='clients.php?toggle_id={cid}&status={status}' class='btn btn-sm btn-secondary'>{toggle_label}</a> "
            f"<a href='clients.php?delete_id={cid}' class='btn btn-sm btn-danger' onclick=\"return confirm('Delete client?')\">Delete</a>"
            f"</td></tr>"
        )
    tbody_html = "".join(rows)
    page = re.sub(
        r"(<tbody[^>]*>)(.*?)(</tbody>)",
        lambda m: m.group(1) + tbody_html + m.group(3),
        page,
        count=1,
        flags=re.S | re.I,
    )

    # Preserve filter values (avoid \1 + digit backref bugs)
    name_val = _esc(str(filters.get("clientname") or "").strip())
    page = re.sub(
        r'(<form method="GET"[^>]*>[\s\S]*?name="clientname"[^>]*value=")[^"]*(")',
        lambda m: m.group(1) + name_val + m.group(2),
        page,
        count=1,
        flags=re.I,
    )

    def _sel(opt: str) -> str:
        return " selected" if status_q == opt else ""

    page = re.sub(
        r'(<select[^>]*name="status"[^>]*>).*?(</select>)',
        lambda m: (
            m.group(1)
            + f'<option value=""{_sel("")}>All</option>'
            + f'<option value="1"{_sel("1")}>Active</option>'
            + f'<option value="0"{_sel("0")}>Inactive</option>'
            + m.group(2)
        ),
        page,
        count=1,
        flags=re.S | re.I,
    )
    return page


def render_gallery_admin(search: str = "") -> str:
    page = _read("gallery.php")
    q = (search or "").strip().lower()
    cards = []
    for g in store.get_gallery():
        title_raw = g.get("title") or ""
        desc_raw = g.get("description") or ""
        if q and q not in title_raw.lower() and q not in desc_raw.lower():
            continue
        gid = int(g.get("id"))
        title = _esc(title_raw)
        desc = _esc(desc_raw)
        img = (g.get("image") or "").replace("\\", "/").lstrip("/")
        # Root-absolute path works from /admin/* and public pages
        img_src = "/" + img if img else ""
        uploaded = _esc(g.get("uploaded_on") or "")
        cards.append(
            f"""
            <div class="col-md-4 mb-4">
                <div class="card shadow">
                    <img src="{_esc(img_src)}" class="card-img-top" alt="{title}" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{title}</h5>
                        <p class="card-text">{desc}</p>
                        <p class="card-text text-muted small">Uploaded on: {uploaded}</p>
                        <div class="d-flex justify-content-between">
                            <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#imageModal" data-src="{_esc(img_src)}" data-title="{title}">View</a>
                            <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" data-id="{gid}" data-title="{title}" data-description="{desc}">Edit</a>
                            <a href="?delete={gid}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this image?');">Delete</a>
                        </div>
                    </div>
                </div>
            </div>"""
        )
    if not cards:
        cards.append('<div class="col-12"><p class="text-muted">No gallery images found.</p></div>')

    # Replace only the Uploaded Images grid (the .row after the search form)
    marker = "<!-- Image List -->"
    idx = page.find(marker)
    if idx < 0:
        idx = page.find('<div class="row">')
    if idx >= 0:
        row_start = page.find('<div class="row">', idx)
        # find matching close of this row by scanning until pagination/footer markers
        end_markers = ["<!-- Pagination -->", '<nav aria-label="Page navigation"', '<footer class="footer"', "</main>", '<div class="modal fade" id="editModal"']
        row_end = -1
        for em in end_markers:
            pos = page.find(em, row_start)
            if pos != -1 and (row_end == -1 or pos < row_end):
                row_end = pos
        if row_start != -1 and row_end != -1:
            page = page[:row_start] + f'<div class="row">\n{"".join(cards)}\n</div>\n' + page[row_end:]
    return page


def render_messages_admin() -> str:
    page = _read("messages.php")
    rows = []
    for msg in sorted(store.get_messages(), key=lambda x: int(x.get("id", 0)), reverse=True):
        mid = int(msg.get("id"))
        rows.append(
            f"<tr><td>{mid}</td><td>{_esc(msg.get('username'))}</td><td>{_esc(msg.get('email'))}</td>"
            f"<td>{_esc(msg.get('message'))}</td><td>{_esc(msg.get('created_at'))}</td>"
            f"<td><a href='messages.php?delete_id={mid}' class='btn btn-sm btn-danger' onclick=\"return confirm('Delete?')\">Delete</a></td></tr>"
        )
    page = re.sub(r"(<tbody[^>]*>)(.*?)(</tbody>)", rf"\1{''.join(rows)}\3", page, count=1, flags=re.S | re.I)
    return page


def render_applications_admin(rd: bool = False, filters: dict | None = None) -> str:
    page = _read("applications_list_rd.php" if rd else "applications_list.php")
    filters = filters or {}

    def fget(key: str) -> str:
        return str(filters.get(key) or "").strip()

    username_q = fget("username").lower()
    phone_q = fget("phone").lower()
    email_q = fget("email").lower()
    from_date = fget("from_date")
    to_date = fget("to_date")
    job_id_q = fget("job_id")
    company_q = fget("company").lower()
    position_q = fget("position").lower()
    location_q = fget("location").lower()

    apps = store.get_applications(rd=rd)

    def date_ok(submitted: str) -> bool:
        day = (submitted or "")[:10]
        if from_date and day < from_date:
            return False
        if to_date and day > to_date:
            return False
        return True

    filtered = []
    for a in apps:
        if username_q and username_q not in str(a.get("username") or "").lower():
            continue
        if phone_q and phone_q not in str(a.get("phone") or "").lower():
            continue
        if email_q and email_q not in str(a.get("email") or "").lower():
            continue
        if not date_ok(str(a.get("submitted_at") or "")):
            continue
        if not rd:
            job = store.get_job(a.get("job_id")) or {}
            if job_id_q and str(a.get("job_id")) != job_id_q:
                continue
            company = str(job.get("company_name") or a.get("company") or "").lower()
            position = str(job.get("position") or a.get("position") or "").lower()
            location = str(job.get("location") or a.get("location") or "").lower()
            if company_q and company_q not in company:
                continue
            if position_q and position_q not in position:
                continue
            if location_q and location_q not in location:
                continue
        filtered.append(a)

    rows = []
    for a in sorted(filtered, key=lambda x: int(x.get("id", 0)), reverse=True):
        resume = a.get("resume_path")
        if resume:
            href = "/" + str(resume).lstrip("/")
            resume_cell = f'<a href="{_esc(href)}" target="_blank" rel="noopener">View Resume</a>'
        else:
            resume_cell = "No Resume"
        if rd:
            rows.append(
                f"<tr>"
                f"<td>{_esc(a.get('username'))}</td>"
                f"<td>{_esc(a.get('phone'))}</td>"
                f"<td>{_esc(a.get('email'))}</td>"
                f"<td>{_esc(a.get('submitted_at'))}</td>"
                f"<td>{resume_cell}</td>"
                f"</tr>"
            )
        else:
            job = store.get_job(a.get("job_id")) or {}
            rows.append(
                f"<tr>"
                f"<td>{int(a.get('id'))}</td>"
                f"<td>{_esc(a.get('job_id'))}</td>"
                f"<td>{_esc(job.get('company_name') or a.get('company'))}</td>"
                f"<td>{_esc(job.get('position') or a.get('position'))}</td>"
                f"<td>{_esc(job.get('location') or a.get('location'))}</td>"
                f"<td>{_esc(a.get('username'))}</td>"
                f"<td>{_esc(a.get('phone'))}</td>"
                f"<td>{_esc(a.get('email'))}</td>"
                f"<td>{_esc(a.get('submitted_at'))}</td>"
                f"<td>{resume_cell}</td>"
                f"</tr>"
            )

    # Leave tbody empty when nothing matches — DataTables shows its own empty message
    # (a colspan placeholder row breaks DataTables column-count checks).

    tbody_html = "".join(rows)
    page = re.sub(
        r"(<tbody[^>]*>)(.*?)(</tbody>)",
        lambda m: m.group(1) + tbody_html + m.group(3),
        page,
        count=1,
        flags=re.S | re.I,
    )

    # Preserve filter field values in the form
    # Use lambdas — string replacements like \1 + "1" become \11 (invalid group refs).
    for key, val in {
        "username": fget("username"),
        "phone": fget("phone"),
        "email": fget("email"),
        "from_date": from_date,
        "to_date": to_date,
        "job_id": job_id_q,
        "company": fget("company"),
        "position": fget("position"),
        "location": fget("location"),
    }.items():
        escaped = _esc(val)
        page = re.sub(
            rf'(name="{key}"[^>]*value=")[^"]*(")',
            lambda m, v=escaped: m.group(1) + v + m.group(2),
            page,
            count=1,
            flags=re.I,
        )
        # also handle inputs where value attr comes before name or missing value
        page = re.sub(
            rf'(<input[^>]*name="{key}"[^>]*?)(/?>)',
            lambda m, v=escaped: (
                m.group(1)
                if 'value="' in m.group(1)
                else m.group(1) + f' value="{v}"'
            )
            + m.group(2),
            page,
            count=1,
            flags=re.I,
        )
    return page


def edit_job_form_html(job_id: int) -> str:
    job = store.get_job(job_id)
    if not job:
        return "<p>Job not found</p>"
    status_checked = "checked" if int(job.get("status", 0)) == 1 else ""
    return f"""
    <form id="editJobForm">
      <input type="hidden" name="id" value="{int(job['id'])}">
      <div class="mb-3"><label class="form-label">Company</label>
        <input class="form-control" name="company_name" value="{_esc(job.get('company_name'))}" required></div>
      <div class="mb-3"><label class="form-label">Position</label>
        <input class="form-control" name="position" value="{_esc(job.get('position'))}" required></div>
      <div class="mb-3"><label class="form-label">Location</label>
        <input class="form-control" name="location" value="{_esc(job.get('location'))}" required></div>
      <div class="mb-3"><label class="form-label">Salary / month</label>
        <input class="form-control" name="salary_per_month" value="{_esc(job.get('salary_per_month'))}"></div>
      <div class="mb-3"><label class="form-label">Apply before</label>
        <input type="date" class="form-control" name="apply_before" value="{_esc(job.get('apply_before'))}"></div>
      <div class="mb-3"><label class="form-label">Job description</label>
        <textarea class="form-control" name="job_description" rows="6">{html.escape(job.get('job_description') or '')}</textarea></div>
      <div class="mb-3"><label class="form-label">Responsibilities</label>
        <textarea class="form-control" name="responsibilities" rows="6">{html.escape(job.get('responsibilities') or '')}</textarea></div>
      <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" name="status" value="1" id="editStatus" {status_checked}>
        <label class="form-check-label" for="editStatus">Active</label>
      </div>
      <button type="submit" class="btn btn-primary">Save changes</button>
    </form>
    """
