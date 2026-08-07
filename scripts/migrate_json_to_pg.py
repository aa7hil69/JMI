"""Create the jmi database (if needed), apply schema, import data/*.json."""
from __future__ import annotations

import json
import os
import sys
from pathlib import Path
from urllib.parse import urlparse, urlunparse

ROOT = Path(__file__).resolve().parents[1]
sys.path.insert(0, str(ROOT))

from dotenv import load_dotenv

load_dotenv(ROOT / ".env")
load_dotenv(ROOT.parent / ".env")

from lib import db, store  # noqa: E402


def _admin_url(db_url: str) -> str:
    """Point DATABASE_URL at the postgres maintenance DB."""
    p = urlparse(db_url)
    return urlunparse(p._replace(path="/postgres"))


def ensure_database() -> None:
    import psycopg

    target = db.database_url()
    name = urlparse(target).path.lstrip("/") or "jmi"
    admin = _admin_url(target)
    with psycopg.connect(admin, autocommit=True) as conn:
        exists = conn.execute(
            "SELECT 1 FROM pg_database WHERE datname = %s", (name,)
        ).fetchone()
        if not exists:
            conn.execute(f'CREATE DATABASE "{name}"')
            print(f"Created database {name}")
        else:
            print(f"Database {name} already exists")


def load_json(name: str, default):
    for folder in (ROOT / "archive" / "json", ROOT / "data"):
        p = folder / name
        if p.is_file():
            return json.loads(p.read_text(encoding="utf-8"))
    return default


def migrate() -> None:
    ensure_database()
    db.ensure_schema()
    print("Schema applied")

    jobs = load_json("jobs.json", {"jobs": []}).get("jobs", [])
    store.save_jobs(jobs)
    print(f"jobs: {len(jobs)}")

    clients = load_json("clients.json", {"clients": []}).get("clients", [])
    store.save_clients(clients)
    print(f"clients: {len(clients)}")

    gallery = load_json("gallery.json", {"items": []}).get("items", [])
    store.save_gallery(gallery)
    print(f"gallery: {len(gallery)}")

    events = load_json("events.json", [])
    if isinstance(events, dict):
        events = events.get("events", [])
    store.save_events(events)
    print(f"events: {len(events)}")

    messages = load_json("messages.json", {"messages": []}).get("messages", [])
    store.save_messages(messages)
    print(f"messages: {len(messages)}")

    apps = load_json("applications.json", {"applications": []}).get("applications", [])
    store.save_applications(apps, rd=False)
    print(f"applications: {len(apps)}")

    apps_rd = load_json("applications_rd.json", {"applications": []}).get("applications", [])
    store.save_applications(apps_rd, rd=True)
    print(f"applications_rd: {len(apps_rd)}")

    print("Migration complete.")


if __name__ == "__main__":
    if not (os.environ.get("DATABASE_URL") or os.environ.get("JMI_DATABASE_URL")):
        print(
            "Set DATABASE_URL in site-crawl/.env first, e.g.\n"
            "  DATABASE_URL=postgresql://postgres:YOUR_PASSWORD@127.0.0.1:5433/jmi"
        )
        sys.exit(1)
    migrate()
