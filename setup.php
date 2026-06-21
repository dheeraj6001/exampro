<?php
/**
 * ExamRankers — One-time setup (SQLite version)
 * Open this URL once in your browser, then DELETE the file.
 */

$db_path = __DIR__ . '/application/database/examrankers.db';

$admin_name     = 'Admin';
$admin_username = 'admin';
$admin_email    = 'admin@examrankers.com';
$admin_password = 'Admin@123';

header('Content-Type: text/html; charset=utf-8');

function render($icon, $heading, $color, $body) {
    echo '<!DOCTYPE html><html><head><meta charset="utf-8">
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
          </head><body class="bg-light d-flex align-items-center justify-content-center" style="min-height:100vh;">';
    echo '<div class="card shadow p-5 text-center" style="max-width:520px;width:100%;">
            <div class="fs-1 mb-3">' . $icon . '</div>
            <h4 class="fw-bold text-' . $color . '">' . $heading . '</h4>' . $body . '
          </div></body></html>';
}

try {
    if (!is_dir(dirname($db_path))) {
        mkdir(dirname($db_path), 0755, true);
    }

    $pdo = new PDO('sqlite:' . $db_path);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('PRAGMA journal_mode=WAL;');

    // Create tables
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS er_admins (
            id         INTEGER PRIMARY KEY AUTOINCREMENT,
            name       TEXT    NOT NULL,
            username   TEXT    NOT NULL UNIQUE,
            email      TEXT    NOT NULL UNIQUE,
            password   TEXT    NOT NULL,
            created_at TEXT    DEFAULT (datetime('now'))
        );

        CREATE TABLE IF NOT EXISTS er_blog_posts (
            id         INTEGER PRIMARY KEY AUTOINCREMENT,
            title      TEXT    NOT NULL,
            slug       TEXT    NOT NULL UNIQUE,
            excerpt    TEXT    DEFAULT '',
            content    TEXT    DEFAULT '',
            category   TEXT    DEFAULT 'General',
            image      TEXT    DEFAULT '',
            status     TEXT    DEFAULT 'draft',
            created_at TEXT    DEFAULT (datetime('now')),
            updated_at TEXT    DEFAULT (datetime('now'))
        );

        CREATE TABLE IF NOT EXISTS er_settings (
            id            INTEGER PRIMARY KEY AUTOINCREMENT,
            setting_key   TEXT    NOT NULL UNIQUE,
            setting_value TEXT
        );

        CREATE TABLE IF NOT EXISTS er_testimonials (
            id             INTEGER PRIMARY KEY AUTOINCREMENT,
            name           TEXT    NOT NULL,
            org            TEXT    DEFAULT '',
            quote          TEXT    NOT NULL,
            stars          INTEGER DEFAULT 5,
            avatar_initial TEXT    DEFAULT 'A',
            avatar_color   TEXT    DEFAULT '#1a56db',
            status         TEXT    DEFAULT 'active',
            sort_order     INTEGER DEFAULT 0
        );

        CREATE TABLE IF NOT EXISTS er_faqs (
            id         INTEGER PRIMARY KEY AUTOINCREMENT,
            question   TEXT    NOT NULL,
            answer     TEXT    NOT NULL,
            sort_order INTEGER DEFAULT 0,
            status     TEXT    DEFAULT 'active'
        );
    ");

    // Admin user (upsert)
    $hash = password_hash($admin_password, PASSWORD_DEFAULT);
    $pdo->prepare("
        INSERT INTO er_admins (name, username, email, password)
        VALUES (?, ?, ?, ?)
        ON CONFLICT(username) DO UPDATE SET password=excluded.password, name=excluded.name, email=excluded.email
    ")->execute([$admin_name, $admin_username, $admin_email, $hash]);

    // Default settings (only if not yet seeded)
    $existing = $pdo->query("SELECT COUNT(*) FROM er_settings")->fetchColumn();
    if ($existing == 0) {
        $ins = $pdo->prepare("INSERT OR IGNORE INTO er_settings (setting_key, setting_value) VALUES (?,?)");
        foreach ([
            ['site_name',      'ExamRankers'],
            ['site_phone',     '+91 98765 43210'],
            ['site_email',     'info@examrankers.com'],
            ['site_address',   'New Delhi, India'],
            ['facebook_url',   '#'],
            ['twitter_url',    '#'],
            ['linkedin_url',   '#'],
            ['youtube_url',    '#'],
            ['footer_tagline', "India's most trusted online exam & marking platform."],
        ] as $row) $ins->execute($row);
    }

    // Default testimonials
    $existing = $pdo->query("SELECT COUNT(*) FROM er_testimonials")->fetchColumn();
    if ($existing == 0) {
        $ins = $pdo->prepare("INSERT INTO er_testimonials (name,org,quote,stars,avatar_initial,avatar_color,status,sort_order) VALUES (?,?,?,?,?,?,?,?)");
        foreach ([
            ['Dr. Rajesh Sharma','Controller of Exams, NIT Surat','The auto-marking engine saved our faculty 200+ hours per semester. Descriptive marking panel is clean and fast.',5,'R','#1a56db','active',1],
            ['Priya Nair','Director, EduVision Academy','JEE mock tests for 50,000 students with zero downtime. Rank lists published within seconds of exam end.',5,'P','#0d9488','active',2],
            ['Amit Verma','Head of Certification, SkillBridge','Blind marking with double moderation replaced months of manual paper handling with a fully digital process.',5,'A','#7c3aed','active',3],
            ['Sunita Gupta','CEO, TopRanker Coaching','White-label feature is fantastic. Marking schemes, negative marking, and partial credit work exactly as configured.',5,'S','#ea580c','active',4],
            ['Mohit Agarwal','Talent Head, GlobalEdge Technologies','HR team screens 2,000+ applicants a week with auto-graded aptitude tests. Time-to-hire cut by 40%.',5,'M','#0f766e','active',5],
            ['Kavitha Rajan','Principal, Greenfield College','Switched from paper to ExamRankers in 2 weeks. Auto certificates with QR verification impressed everyone.',5,'K','#be185d','active',6],
        ] as $r) $ins->execute($r);
    }

    // Default FAQs
    $existing = $pdo->query("SELECT COUNT(*) FROM er_faqs")->fetchColumn();
    if ($existing == 0) {
        $ins = $pdo->prepare("INSERT INTO er_faqs (question,answer,sort_order,status) VALUES (?,?,?,?)");
        foreach ([
            ['Is there a free trial?','Yes — all plans come with a 30-day free trial, no credit card required. You can conduct up to 3 live exams with up to 50 candidates each during the trial.',1,'active'],
            ['How quickly can we go live?','Most clients are up and running within 24 hours. Our onboarding team assists with setup, question import, and your first test run.',2,'active'],
            ['Do you support offline exams?','Yes. Our offline mode allows candidates to take exams without a stable internet connection. Responses sync automatically when connectivity is restored.',3,'active'],
            ['Is the platform secure?','ExamRankers is ISO 27001 certified and SOC 2 Type II compliant. All data is encrypted in transit and at rest.',4,'active'],
            ['Can we use our own domain and branding?','Absolutely. All Professional and Enterprise plans include a white-label portal with your custom domain, logo, and brand colors.',5,'active'],
        ] as $r) $ins->execute($r);
    }

    render('✅','Setup complete!','success','
        <p class="text-muted mt-2">SQLite database created. Tables seeded.</p>
        <table class="table table-bordered mt-3 text-start">
          <tr><th>DB file</th><td><code>application/database/examrankers.db</code></td></tr>
          <tr><th>Login URL</th><td><a href="admin/login">admin/login</a></td></tr>
          <tr><th>Username</th><td><strong>' . htmlspecialchars($admin_username) . '</strong></td></tr>
          <tr><th>Password</th><td><strong>' . htmlspecialchars($admin_password) . '</strong></td></tr>
        </table>
        <div class="alert alert-danger mt-3 mb-3"><strong>⚠️ Delete this file immediately!</strong><br>
        <code>rm ' . __FILE__ . '</code></div>
        <a href="admin/login" class="btn btn-primary">Go to Admin Login →</a>
    ');

} catch (Throwable $e) {
    render('❌','Setup Failed','danger','
        <p class="text-muted mt-2">' . htmlspecialchars($e->getMessage()) . '</p>
        <hr>
        <p class="text-muted small">Make sure the <code>application/database/</code> directory is writable by the web server.</p>
    ');
}
