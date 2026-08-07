-- JM International local CMS schema (PostgreSQL)

CREATE TABLE IF NOT EXISTS jobs (
    id INTEGER PRIMARY KEY,
    company_name TEXT NOT NULL DEFAULT '',
    position TEXT NOT NULL DEFAULT '',
    location TEXT NOT NULL DEFAULT '',
    salary_per_month TEXT NOT NULL DEFAULT '',
    job_description TEXT NOT NULL DEFAULT '',
    responsibilities TEXT NOT NULL DEFAULT '',
    apply_before TEXT NOT NULL DEFAULT '',
    posted_on TEXT NOT NULL DEFAULT '',
    status SMALLINT NOT NULL DEFAULT 1
);

CREATE TABLE IF NOT EXISTS clients (
    id INTEGER PRIMARY KEY,
    clientname TEXT NOT NULL DEFAULT '',
    status SMALLINT NOT NULL DEFAULT 1
);

CREATE TABLE IF NOT EXISTS gallery (
    id INTEGER PRIMARY KEY,
    title TEXT NOT NULL DEFAULT '',
    description TEXT NOT NULL DEFAULT '',
    image TEXT NOT NULL DEFAULT '',
    uploaded_on TEXT NOT NULL DEFAULT ''
);

CREATE TABLE IF NOT EXISTS events (
    id INTEGER PRIMARY KEY,
    event_name TEXT NOT NULL DEFAULT '',
    event_details TEXT NOT NULL DEFAULT '',
    event_url TEXT NOT NULL DEFAULT '',
    posted_on TEXT NOT NULL DEFAULT '',
    posted_by TEXT NOT NULL DEFAULT '',
    photo1 TEXT,
    photo2 TEXT,
    photo3 TEXT,
    enabled TEXT NOT NULL DEFAULT '1',
    created_at TEXT NOT NULL DEFAULT ''
);

CREATE TABLE IF NOT EXISTS messages (
    id INTEGER PRIMARY KEY,
    username TEXT NOT NULL DEFAULT '',
    email TEXT NOT NULL DEFAULT '',
    message TEXT NOT NULL DEFAULT '',
    created_at TEXT NOT NULL DEFAULT ''
);

CREATE TABLE IF NOT EXISTS applications (
    id INTEGER PRIMARY KEY,
    job_id INTEGER,
    company TEXT NOT NULL DEFAULT '',
    position TEXT NOT NULL DEFAULT '',
    location TEXT NOT NULL DEFAULT '',
    username TEXT NOT NULL DEFAULT '',
    phone TEXT NOT NULL DEFAULT '',
    email TEXT NOT NULL DEFAULT '',
    submitted_at TEXT NOT NULL DEFAULT '',
    resume_path TEXT
);

CREATE TABLE IF NOT EXISTS applications_rd (
    id INTEGER PRIMARY KEY,
    username TEXT NOT NULL DEFAULT '',
    phone TEXT NOT NULL DEFAULT '',
    email TEXT NOT NULL DEFAULT '',
    submitted_at TEXT NOT NULL DEFAULT '',
    resume_path TEXT
);

CREATE INDEX IF NOT EXISTS idx_jobs_status ON jobs (status);
CREATE INDEX IF NOT EXISTS idx_clients_name ON clients (clientname);
CREATE INDEX IF NOT EXISTS idx_applications_job ON applications (job_id);
