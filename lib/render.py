"""Render public HTML pages from shared JSON data + page shells."""
from __future__ import annotations

import html
import re
from pathlib import Path

from lib import store

ROOT = Path(__file__).resolve().parents[1]


def _read(name: str) -> str:
    return (ROOT / name).read_text(encoding="utf-8", errors="ignore")


def _esc(s: str) -> str:
    return html.escape(s or "", quote=True)


def _shell_between(page: str, start_marker: str, end_marker: str, replacement: str) -> str:
    i = page.find(start_marker)
    j = page.find(end_marker, i + len(start_marker) if i >= 0 else 0)
    if i < 0 or j < 0:
        return page
    return page[:i] + start_marker + replacement + page[j:]


def render_clients_list_items(active_only: bool = True) -> str:
    items = []
    for c in store.get_clients(active_only=active_only):
        items.append(f"<li>{_esc(c.get('clientname', ''))}</li>")
    return "\n".join(items)


def render_marquee_texts() -> str:
    parts = []
    for c in store.get_clients(active_only=True):
        name = _esc(c.get("clientname", ""))
        parts.append(f'<h2 class="marquee-text">{name}</h2>')
    return "".join(parts)


def render_gallery_blocks() -> str:
    blocks = []
    for g in store.get_gallery():
        img = (g.get("image") or "").replace("\\", "/").lstrip("/")
        img_src = "/" + img if img else ""
        title = _esc(g.get("title", ""))
        desc = _esc(g.get("description", ""))
        blocks.append(
            f"""
            <div class="team-block">
                <div class="inner-box">
                    <div class="image-box">
                        <a href="{_esc(img_src)}" class="lightbox-image overlay-box" data-fancybox="gallery" title="{title}">
                            <img src="{_esc(img_src)}" alt="{title}">
                        </a>
                    </div>
                    <div class="caption">
                        <h5>{title}</h5>
                        <p>{desc}</p>
                    </div>
                </div>
            </div>"""
        )
    return "\n".join(blocks)


def render_event_blocks() -> str:
    blocks = []
    for e in store.get_events(enabled_only=True):
        name = _esc(e.get("event_name", ""))
        details = _esc(e.get("event_details", "")).replace("\n", "<br>")
        url = _esc(e.get("event_url") or "#")
        posted_on = _esc(e.get("posted_on", ""))
        posted_by = _esc(e.get("posted_by", ""))
        photos = []
        for k in ("photo1", "photo2", "photo3"):
            p = e.get(k)
            if p:
                photos.append(str(p).replace("../", ""))
        gallery_id = f"gallery-{_esc(str(e.get('id')))}"
        photo_html = ""
        for i, p in enumerate(photos):
            pe = _esc(p)
            photo_html += f"""
                <div class="image">
                    <a href="{pe}" class="lightbox-image overlay-box" data-fancybox="{gallery_id}">
                        <img src="{pe}" alt="">
                    </a>
                </div>"""
        if not photo_html:
            photo_html = '<div class="image"></div>'
        blocks.append(
            f"""
            <div class="news-block-two">
                <div class="inner-box">
                    <div class="image-box">
                        <div class="row clearfix">{photo_html}</div>
                    </div>
                    <div class="lower-box">
                        <h4><a href="{url}" target="_blank" rel="noopener">{name}</a></h4>
                        <div class="meta-info">Posted on {posted_on} by {posted_by}</div>
                        <div class="text">{details}</div>
                    </div>
                </div>
            </div>"""
        )
    return "\n".join(blocks)


def render_job_cards() -> str:
    cards = []
    for j in store.get_jobs(active_only=True):
        jid = int(j.get("id"))
        company = _esc(j.get("company_name", ""))
        position = _esc(j.get("position", ""))
        location = _esc(j.get("location", ""))
        salary = _esc(str(j.get("salary_per_month") or ""))
        posted = _esc(j.get("posted_on", ""))
        desc = j.get("job_description") or ""
        resp = j.get("responsibilities") or ""
        resp_html = f'<p class="card-sub">{resp}</p>' if resp else ""
        cards.append(
            f"""
            <div class="job-card job-card-layout" style="position:relative; padding:20px;">
                <div class="btn-box" align="right">
                    <a href="/jobs/{jid}" class="job-button-1" style="display:inline-block; position:absolute; top:20px; right:20px; z-index:10;">Apply Now</a>
                </div>
                <div class="job-card-details d-flex align-items-center justify-content-between">
                    <div class="card-head d-flex align-items-center">
                        <div class="company-title-box">
                            <p class="card-sub mb-1 font-weight-medium">{company}</p>
                            <h4 class="card-title mb-1">
                                <a href="/jobs/{jid}">{position}</a>
                            </h4>
                            <p class="card-sub">
                                <span class="sub">OMR {salary} / month</span>
                                <span class="sub"><i class="fa fa-location-arrow"></i> {location}</span>
                                <span class="sub"><i class="fa fa-calendar"></i> Posted on: {posted}</span>
                            </p>
                            <p class="card-sub">{desc}</p>
                            {resp_html}
                        </div>
                    </div>
                </div>
            </div>"""
        )
    return "\n".join(cards)


def render_job_details(job: dict) -> str:
    shell = _read("job-details-cache/job-45.html")
    # Use job-45 as layout shell; replace dynamic regions
    jid = int(job.get("id"))
    company = _esc(job.get("company_name", ""))
    position = _esc(job.get("position", ""))
    location = _esc(job.get("location", ""))
    salary = _esc(str(job.get("salary_per_month") or ""))
    posted = _esc(job.get("posted_on", ""))
    apply_before = _esc(job.get("apply_before", ""))
    desc = job.get("job_description") or ""
    resp = job.get("responsibilities") or ""

    # Replace apply links with clean URLs
    shell = re.sub(r"job-submit\.php\?job_id=\d+", f"/jobs/{jid}/apply", shell)
    shell = re.sub(r"job-details\.php\?job_id=\d+", f"/jobs/{jid}", shell)    # Company / title / location in upper box
    shell = re.sub(
        r'(<div class="company">\s*<span>)(.*?)(</span>)',
        rf"\1{company}\3",
        shell,
        count=1,
        flags=re.S,
    )
    shell = re.sub(r"(<div class=\"company\">.*?<h3>)(.*?)(</h3>)", rf"\1{position}\3", shell, count=1, flags=re.S)
    shell = re.sub(
        r'(flaticon-place"></i>)(.*?)(</p>)',
        rf"\1{location}\3",
        shell,
        count=1,
        flags=re.S,
    )
    # Description block
    shell = re.sub(
        r"(<h2>\s*Job Description\s*</h2>)(.*?)(</div>\s*</div>\s*</div>\s*</div>\s*<div class=\"col-lg-4)",
        rf"\1{desc}<h3>Responsibilities</h3>{resp}\3",
        shell,
        count=1,
        flags=re.S,
    )
    # Sidebar fields
    def repl_sidebar(label: str, value: str, text: str) -> str:
        return re.sub(
            rf"(<span>{re.escape(label)}</span>\s*<p>)(.*?)(</p>)",
            rf"\1{value}\3",
            text,
            count=1,
            flags=re.S,
        )

    shell = repl_sidebar("Company", company, shell)
    shell = repl_sidebar("Location", location, shell)
    shell = repl_sidebar("Salary", f"OMR {salary}" if salary else "", shell)
    shell = repl_sidebar("Posted on", posted, shell)
    shell = repl_sidebar("Apply on or Before", apply_before, shell)
    return shell


def render_index() -> str:
    page = _read("index.php")
    # Replace marquee texts inside marquee-content-one
    page = re.sub(
        r'(<div class="marquee-content-one">)(.*?)(</div>)',
        rf"\1{render_marquee_texts()}\3",
        page,
        count=1,
        flags=re.S,
    )
    # Replace gallery carousel inner blocks
    page = re.sub(
        r'(<div class="team-carousel owl-theme owl-carousel">)(.*?)(</div>\s*</div>\s*</section>)',
        rf"\1{render_gallery_blocks()}\3",
        page,
        count=1,
        flags=re.S,
    )
    return page


def render_clients_page() -> str:
    page = _read("clients.php")
    page = re.sub(
        r'(<ul class="list-unstyled clients-list">)(.*?)(</ul>)',
        rf"\1{render_clients_list_items()}\3",
        page,
        count=1,
        flags=re.S,
    )
    return page


def render_events_page() -> str:
    page = _read("events.php")
    # Replace main events listing region — from first news-block-two through last before footer/widgets
    m = re.search(r'(<div class="news-block-two">.*?)(<footer class="main-footer">)', page, re.S)
    if m:
        page = page[: m.start(1)] + render_event_blocks() + "\n" + page[m.start(2) :]
    return page


def render_job_list_page() -> str:
    page = _read("job-list.php")
    # Keep the Resume Drop Off banner; replace every job card after it with live JSON jobs.
    m = re.search(
        r'(href="job-submit-rd\.php"[\s\S]*?</div>\s*</div>\s*</div>)'
        r'([\s\S]*?)'
        r'(</div>\s*</div>\s*</div>\s*</div>\s*</div>\s*<footer class="main-footer">)',
        page,
        re.I,
    )
    if m:
        page = page[: m.start()] + m.group(1) + "\n" + render_job_cards() + "\n" + m.group(3) + page[m.end() :]
    return page
