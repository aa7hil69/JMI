"""Extract CMS snapshots into data/*.json for admin <-> public sync."""
from __future__ import annotations

import html
import json
import re
from pathlib import Path

ROOT = Path(__file__).resolve().parents[1]
DATA = ROOT / "archive" / "json"
DATA.mkdir(parents=True, exist_ok=True)


def strip_tags(s: str) -> str:
    return html.unescape(re.sub(r"<[^>]+>", "", s or "")).strip()


def main() -> None:
    # Events
    events = json.loads((ROOT / "admin" / "api.php").read_text(encoding="utf-8", errors="ignore"))
    for e in events:
        for k in ("photo1", "photo2", "photo3"):
            v = e.get(k)
            if isinstance(v, str):
                e[k] = v.replace("../", "").replace("\\", "/")
    (DATA / "events.json").write_text(json.dumps(events, indent=2, ensure_ascii=False), encoding="utf-8")
    print(f"events: {len(events)}")

    # Clients
    admin_clients = (ROOT / "admin" / "clients.php").read_text(encoding="utf-8", errors="ignore")
    clients = []
    for m in re.finditer(
        r"<tr><td>(\d+)</td><td class='clientname-cell'>(.*?)</td><td>.*?badge[^>]*>(Active|Inactive)</span>",
        admin_clients,
        re.S,
    ):
        clients.append(
            {
                "id": int(m.group(1)),
                "clientname": strip_tags(m.group(2)),
                "status": 1 if m.group(3) == "Active" else 0,
            }
        )
    if not clients:
        clients_html = (ROOT / "clients.php").read_text(encoding="utf-8", errors="ignore")
        for i, m in enumerate(re.finditer(r"<ul class=\"list-unstyled clients-list\">(.*?)</ul>", clients_html, re.S), 1):
            for j, li in enumerate(re.finditer(r"<li>(.*?)</li>", m.group(1), re.S), 1):
                name = strip_tags(li.group(1))
                if name:
                    clients.append({"id": j, "clientname": name, "status": 1})
    (DATA / "clients.json").write_text(json.dumps({"clients": clients}, indent=2, ensure_ascii=False), encoding="utf-8")
    print(f"clients: {len(clients)}")

    # Gallery
    index_html = (ROOT / "index.php").read_text(encoding="utf-8", errors="ignore")
    gallery = []
    for i, block in enumerate(re.findall(r'<div class="team-block">(.*?)</div>\s*</div>\s*</div>', index_html, re.S), 1):
        img = re.search(r'src="(uploads/gallery/[^"]+)"', block)
        title = re.search(r"<h5>(.*?)</h5>", block, re.S)
        desc = re.search(r"<p>(.*?)</p>", block, re.S)
        if not img:
            continue
        gallery.append(
            {
                "id": i,
                "title": strip_tags(title.group(1)) if title else "",
                "description": strip_tags(desc.group(1)) if desc else "",
                "image": img.group(1),
                "uploaded_on": "",
            }
        )
    admin_gal = (ROOT / "admin" / "gallery.php").read_text(encoding="utf-8", errors="ignore")
    admin_items = [
        {
            "id": int(m.group(1)),
            "title": html.unescape(m.group(2)),
            "description": html.unescape(m.group(3)),
        }
        for m in re.finditer(
            r'data-id="(\d+)"\s+data-title="([^"]*)"\s+data-description="([^"]*)"',
            admin_gal,
        )
    ]
    img_paths = re.findall(r'src="\.\./(uploads/gallery/[^"]+)"', admin_gal) or re.findall(
        r'src="(uploads/gallery/[^"]+)"', admin_gal
    )
    if admin_items and len(admin_items) == len(img_paths):
        gallery = [
            {
                "id": item["id"],
                "title": item["title"],
                "description": item["description"],
                "image": img,
                "uploaded_on": "",
            }
            for item, img in zip(admin_items, img_paths)
        ]
    elif admin_items:
        for i, item in enumerate(admin_items):
            if i < len(gallery):
                gallery[i].update(item)
    (DATA / "gallery.json").write_text(json.dumps({"items": gallery}, indent=2, ensure_ascii=False), encoding="utf-8")
    print(f"gallery: {len(gallery)}")

    # Jobs from detail pages + list enrichment
    jobs = []
    for f in sorted((ROOT / "job-details-cache").glob("job-*.html")):
        jid = int(re.search(r"job-(\d+)", f.name).group(1))
        text = f.read_text(encoding="utf-8", errors="ignore")
        # Real title is in upper-box h3; page banner h1 is always "Job Listing"
        position = ""
        m = re.search(r'<div class="upper-box">.*?<h3>(.*?)</h3>', text, re.S)
        if m:
            position = strip_tags(m.group(1))
        if not position or position.lower() == "job listing":
            m = re.search(r'<div class="company">.*?</div>\s*<h3>(.*?)</h3>', text, re.S)
            if m:
                position = strip_tags(m.group(1))

        def meta(label: str) -> str:
            mm = re.search(rf"<span>{label}</span>\s*<p>(.*?)</p>", text, re.S | re.I)
            return strip_tags(mm.group(1)) if mm else ""

        company = meta("Company")
        if not company:
            m = re.search(r'<div class="company">\s*<span>(.*?)</span>', text, re.S)
            if m:
                company = strip_tags(m.group(1))
        location = meta("Location")
        if not location:
            m = re.search(r'flaticon-place"></i>(.*?)</p>', text, re.S)
            if m:
                location = strip_tags(m.group(1))
        salary = meta("Salary").replace("OMR", "").replace("/month", "").strip()
        apply_before = meta("Apply on or Before")
        posted_on = meta("Posted on") or meta("Posted On")

        desc = ""
        resp = ""
        m = re.search(r"<h2>\s*Job Description\s*</h2>\s*(.*?)(?:<h3>\s*Responsibilities|$)", text, re.S | re.I)
        if m:
            desc = m.group(1).strip()
        m = re.search(r"<h3>\s*Responsibilities\s*</h3>\s*(.*?)(?:</div>\s*</div>\s*</div>|$)", text, re.S | re.I)
        if m:
            resp = re.split(r'<div class="job-sidebar"|</section>', m.group(1))[0].strip()

        jobs.append(
            {
                "id": jid,
                "company_name": company,
                "position": position,
                "location": location,
                "salary_per_month": salary,
                "job_description": desc,
                "responsibilities": resp,
                "apply_before": apply_before,
                "posted_on": posted_on,
                "status": 1,
            }
        )

    job_list = (ROOT / "job-list.php").read_text(encoding="utf-8", errors="ignore")
    for m in re.finditer(r"job_id=(\d+)(.*?)(?=job_id=\d+|$)", job_list, re.S):
        jid = int(m.group(1))
        block = m.group(2)[:3000]
        job = next((j for j in jobs if j["id"] == jid), None)
        if not job:
            continue
        if not job["position"]:
            pm = re.search(rf'<a href="job-details\.php\?job_id={jid}">(.*?)</a>', job_list, re.S)
            if pm:
                job["position"] = strip_tags(pm.group(1))
        if not job["company_name"]:
            cm = re.search(r"(?:fa-building|Company)[^<]*</i>\s*(.*?)<", block, re.S | re.I)
            if cm:
                job["company_name"] = strip_tags(cm.group(1))
        if not job["location"]:
            lm = re.search(r"(?:fa-map|Location)[^<]*</i>\s*(.*?)<", block, re.S | re.I)
            if lm:
                job["location"] = strip_tags(lm.group(1))
        if not job["salary_per_month"]:
            sm = re.search(r"(?:fa-money|Salary|OMR)[^<]*</i>\s*(.*?)<", block, re.S | re.I)
            if sm:
                job["salary_per_month"] = strip_tags(sm.group(1)).replace("OMR", "").replace("/month", "").strip()

    (DATA / "jobs.json").write_text(json.dumps({"jobs": jobs}, indent=2, ensure_ascii=False), encoding="utf-8")
    print(f"jobs: {len(jobs)}")
    for j in jobs:
        print(f"  #{j['id']} {j['position'][:60]!r}")

    # Messages: start empty locally (contact form will populate) to avoid shipping inbox PII
    (DATA / "messages.json").write_text(json.dumps({"messages": []}, indent=2), encoding="utf-8")
    (DATA / "applications.json").write_text(json.dumps({"applications": []}, indent=2), encoding="utf-8")
    (DATA / "applications_rd.json").write_text(json.dumps({"applications": []}, indent=2), encoding="utf-8")
    print("messages/applications: empty (forms will populate)")
    print("done")


if __name__ == "__main__":
    main()
