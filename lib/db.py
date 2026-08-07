"""PostgreSQL connection helpers for the local CMS."""
from __future__ import annotations

import os
from contextlib import contextmanager
from pathlib import Path

from dotenv import load_dotenv

ROOT = Path(__file__).resolve().parents[1]
load_dotenv(ROOT / ".env")
load_dotenv(ROOT.parent / ".env")


def database_url() -> str:
    url = (os.environ.get("DATABASE_URL") or os.environ.get("JMI_DATABASE_URL") or "").strip()
    if not url:
        raise RuntimeError(
            "DATABASE_URL is not set. Copy site-crawl/.env.example to .env "
            "and set your PostgreSQL password (port 5433 on this machine)."
        )
    return url


@contextmanager
def connect():
    import psycopg

    conn = psycopg.connect(database_url())
    try:
        yield conn
        conn.commit()
    except Exception:
        conn.rollback()
        raise
    finally:
        conn.close()


def ensure_schema() -> None:
    raw = (ROOT / "sql" / "schema.sql").read_text(encoding="utf-8")
    # Strip line comments, then run each statement
    lines = []
    for line in raw.splitlines():
        stripped = line.strip()
        if stripped.startswith("--"):
            continue
        lines.append(line)
    body = "\n".join(lines)
    statements = [s.strip() for s in body.split(";") if s.strip()]
    with connect() as conn:
        for stmt in statements:
            conn.execute(stmt)
