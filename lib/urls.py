"""Pretty URL maps + HTML link rewriting for professional browser paths."""
from __future__ import annotations

import re

# Old path → clean path (used for 301/302 redirects)
PUBLIC_REDIRECTS: dict[str, str] = {
    "/index.php": "/",
    "/index.html": "/",
    "/clients.php": "/clients",
    "/contact.html": "/contact",
    "/events.php": "/events",
    "/job-list.php": "/jobs",
    "/job-submit-rd.php": "/jobs/resume-drop-off",
    "/services.html": "/services",
    "/recruitment-services.html": "/services/recruitment",
    "/hr-consultancy.html": "/services/hr-consultancy",
    "/training-and-development.html": "/services/training",
    "/outsourced-human-resources.html": "/services/outsourced-hr",
    "/metals-and-minerals-trading.html": "/services/metals-minerals",
    "/sendmessage.php": "/contact",
}

ADMIN_REDIRECTS: dict[str, str] = {
    "login.php": "/admin/login",
    "logout.php": "/admin/logout",
    "dashboard.php": "/admin",
    "dashboard.html": "/admin",
    "dashboard": "/admin",
    "applications_list.php": "/admin/applications",
    "applications_list_rd.php": "/admin/resume-drop-off",
    "gallery.php": "/admin/gallery",
    "jobs_admin.php": "/admin/jobs",
    "admin-events.html": "/admin/events",
    "messages.php": "/admin/messages",
    "clients.php": "/admin/clients",
    "api.php": "/admin/api",
}

# Clean admin path → internal template / handler key
ADMIN_CLEAN: dict[str, str] = {
    "": "dashboard.php",
    "login": "login.php",
    "logout": "logout.php",
    "applications": "applications_list.php",
    "resume-drop-off": "applications_list_rd.php",
    "gallery": "gallery.php",
    "jobs": "jobs_admin.php",
    "events": "admin-events.html",
    "messages": "messages.php",
    "clients": "clients.php",
    "api": "api.php",
}

# Static public pages served from disk under clean paths
PUBLIC_STATIC: dict[str, str] = {
    "/contact": "contact.html",
    "/services": "services.html",
    "/services/recruitment": "recruitment-services.html",
    "/services/hr-consultancy": "hr-consultancy.html",
    "/services/training": "training-and-development.html",
    "/services/outsourced-hr": "outsourced-human-resources.html",
    "/services/metals-minerals": "metals-and-minerals-trading.html",
}


def normalize_admin_rel(admin_rel: str) -> str:
    """Map clean or legacy admin relative path to the handler filename."""
    rel = (admin_rel or "").lstrip("/")
    if rel in ADMIN_CLEAN:
        return ADMIN_CLEAN[rel]
    # already a legacy filename
    return rel


def admin_redirect_target(admin_rel: str, query: str = "") -> str | None:
    """If this is a legacy admin path, return the clean Location."""
    rel = (admin_rel or "").lstrip("/")
    if rel in ADMIN_REDIRECTS:
        dest = ADMIN_REDIRECTS[rel]
        return f"{dest}?{query}" if query else dest
    return None


_REPLACEMENTS: list[tuple[re.Pattern[str], str]] = [
    # Root-absolute assets (nested paths like /services/training break relative css/js/images)
    (re.compile(r'\b(href|src)="((?:css|js|images|fonts)/)', re.I), r'\1="/\2'),
    (re.compile(r"\b(href|src)='((?:css|js|images|fonts)/)", re.I), r"\1='/\2"),
    (re.compile(r'url\((["\']?)(images|css|fonts)/', re.I), r"url(\1/\2/"),
    # Public
    (re.compile(r'href="index\.php"', re.I), 'href="/"'),
    (re.compile(r'href="index\.html"', re.I), 'href="/"'),
    (re.compile(r'href="/index\.php"', re.I), 'href="/"'),
    (re.compile(r'href="clients\.php"', re.I), 'href="/clients"'),
    (re.compile(r'href="/clients\.php"', re.I), 'href="/clients"'),
    (re.compile(r'href="contact\.html"', re.I), 'href="/contact"'),
    (re.compile(r'href="/contact\.html"', re.I), 'href="/contact"'),
    (re.compile(r'href="events\.php"', re.I), 'href="/events"'),
    (re.compile(r'href="/events\.php"', re.I), 'href="/events"'),
    (re.compile(r'href="job-list\.php"', re.I), 'href="/jobs"'),
    (re.compile(r'href="/job-list\.php"', re.I), 'href="/jobs"'),
    (re.compile(r'href="job-submit-rd\.php"', re.I), 'href="/jobs/resume-drop-off"'),
    (re.compile(r'href="/job-submit-rd\.php"', re.I), 'href="/jobs/resume-drop-off"'),
    (re.compile(r'href="services\.html"', re.I), 'href="/services"'),
    (re.compile(r'href="recruitment-services\.html"', re.I), 'href="/services/recruitment"'),
    (re.compile(r'href="hr-consultancy\.html"', re.I), 'href="/services/hr-consultancy"'),
    (re.compile(r'href="training-and-development\.html"', re.I), 'href="/services/training"'),
    (re.compile(r'href="outsourced-human-resources\.html"', re.I), 'href="/services/outsourced-hr"'),
    (re.compile(r'href="metals-and-minerals-trading\.html"', re.I), 'href="/services/metals-minerals"'),
    (re.compile(r'href="job-details\.php\?job_id=(\d+)"', re.I), r'href="/jobs/\1"'),
    (re.compile(r'href="/job-details\.php\?job_id=(\d+)"', re.I), r'href="/jobs/\1"'),
    (re.compile(r'href="job-submit\.php\?job_id=(\d+)"', re.I), r'href="/jobs/\1/apply"'),
    (re.compile(r'href="/job-submit\.php\?job_id=(\d+)"', re.I), r'href="/jobs/\1/apply"'),
    (re.compile(r'action="sendmessage\.php"', re.I), 'action="/contact"'),
    # Admin (relative + absolute)
    (re.compile(r'href="dashboard\.php"', re.I), 'href="/admin"'),
    (re.compile(r'href="dashboard\.html"', re.I), 'href="/admin"'),
    (re.compile(r'href="login\.php"', re.I), 'href="/admin/login"'),
    (re.compile(r'href="logout\.php"', re.I), 'href="/admin/logout"'),
    (re.compile(r'href="applications_list\.php"', re.I), 'href="/admin/applications"'),
    (re.compile(r'href="applications_list_rd\.php"', re.I), 'href="/admin/resume-drop-off"'),
    (re.compile(r'href="gallery\.php"', re.I), 'href="/admin/gallery"'),
    (re.compile(r'href="jobs_admin\.php"', re.I), 'href="/admin/jobs"'),
    (re.compile(r'href="admin-events\.html"', re.I), 'href="/admin/events"'),
    (re.compile(r'href="messages\.php"', re.I), 'href="/admin/messages"'),
    (re.compile(r'href="clients\.php"', re.I), 'href="/admin/clients"'),
    (re.compile(r'href="/admin/dashboard\.php"', re.I), 'href="/admin"'),
    (re.compile(r'href="/admin/login\.php"', re.I), 'href="/admin/login"'),
    (re.compile(r'href="/admin/logout\.php"', re.I), 'href="/admin/logout"'),
    (re.compile(r'href="/admin/applications_list\.php"', re.I), 'href="/admin/applications"'),
    (re.compile(r'href="/admin/applications_list_rd\.php"', re.I), 'href="/admin/resume-drop-off"'),
    (re.compile(r'href="/admin/gallery\.php"', re.I), 'href="/admin/gallery"'),
    (re.compile(r'href="/admin/jobs_admin\.php"', re.I), 'href="/admin/jobs"'),
    (re.compile(r'href="/admin/admin-events\.html"', re.I), 'href="/admin/events"'),
    (re.compile(r'href="/admin/messages\.php"', re.I), 'href="/admin/messages"'),
    (re.compile(r'href="/admin/clients\.php"', re.I), 'href="/admin/clients"'),
    (re.compile(r"fetch\(`api\.php", re.I), "fetch(`/admin/api"),
    (re.compile(r"fetch\('api\.php'", re.I), "fetch('/admin/api'"),
    (re.compile(r'fetch\("api\.php"', re.I), 'fetch("/admin/api"'),
    (re.compile(r"url = 'api\.php'", re.I), "url = '/admin/api'"),
    (re.compile(r'url = "api\.php"', re.I), 'url = "/admin/api"'),
]


def pretty_html(html: str) -> str:
    """Rewrite legacy href/action/fetch targets to clean URLs."""
    out = html
    for pattern, repl in _REPLACEMENTS:
        out = pattern.sub(repl, out)
    return out
