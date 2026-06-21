<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($page_title ?? 'Admin') ?> — ExamRankers Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <style>
    :root { --sw:240px; --navy:#0b1437; --blue:#1a56db; }
    body  { background:#f1f5f9; font-family:'Segoe UI',system-ui,sans-serif; font-size:.88rem; }

    .er-side { position:fixed;top:0;left:0;width:var(--sw);height:100vh;background:var(--navy);z-index:200;overflow-y:auto;display:flex;flex-direction:column; }
    .er-brand { display:block;padding:18px 20px;font-size:1.1rem;font-weight:800;color:#fff;text-decoration:none;border-bottom:1px solid rgba(255,255,255,.08); }
    .er-brand span { color:#3b82f6; }
    .er-sec { padding:16px 16px 4px;font-size:.6rem;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:rgba(255,255,255,.28); }
    .er-link { display:flex;align-items:center;gap:10px;padding:9px 14px;margin:2px 8px;color:rgba(255,255,255,.6);text-decoration:none;font-size:.83rem;border-radius:6px;transition:all .18s; }
    .er-link i { width:18px;font-size:1rem;flex-shrink:0; }
    .er-link:hover { background:rgba(255,255,255,.07);color:#fff; }
    .er-link.active { background:var(--blue);color:#fff; }
    .er-link.red { color:#f87171; }
    .er-link.red:hover { background:rgba(248,113,113,.1);color:#fca5a5; }
    .er-foot { margin-top:auto;padding:14px;font-size:.72rem;color:rgba(255,255,255,.18); }

    .er-main  { margin-left:var(--sw);min-height:100vh; }
    .er-top   { background:#fff;border-bottom:1px solid #e2e8f0;padding:0 24px;height:56px;display:flex;align-items:center;justify-content:space-between;position:sticky;top:0;z-index:100;box-shadow:0 1px 3px rgba(0,0,0,.05); }
    .er-body  { padding:24px; }

    .er-card { background:#fff;border-radius:10px;border:1px solid #e2e8f0;overflow:hidden; }
    .er-card-head { padding:13px 20px;border-bottom:1px solid #f1f5f9;display:flex;align-items:center;justify-content:space-between; }
    .er-card-head h6 { margin:0;font-weight:700;font-size:.86rem;color:#0f172a; }
    .er-card-body { padding:20px; }

    .stat-box { background:#fff;border-radius:10px;border:1px solid #e2e8f0;padding:18px 22px; }
    .stat-box .num { font-size:1.85rem;font-weight:800;color:var(--navy);line-height:1; }
    .stat-box .lbl { font-size:.75rem;color:#64748b;margin-top:4px; }

    .er-tbl { font-size:.83rem; }
    .er-tbl th { font-weight:700;color:#64748b;font-size:.72rem;text-transform:uppercase;letter-spacing:.5px;background:#f8fafc; }
    .er-tbl td { vertical-align:middle; }

    .bp  { background:#dcfce7;color:#166534;font-size:.7rem;padding:2px 10px;border-radius:20px; }
    .bd  { background:#fef9c3;color:#854d0e;font-size:.7rem;padding:2px 10px;border-radius:20px; }
    .ba  { background:#dbeafe;color:#1e40af;font-size:.7rem;padding:2px 10px;border-radius:20px; }
    .bi2 { background:#f1f5f9;color:#64748b;font-size:.7rem;padding:2px 10px;border-radius:20px; }

    #er-toasts { position:fixed;bottom:24px;right:24px;z-index:9999;display:flex;flex-direction:column;gap:8px; }
  </style>

  <!-- Inject JS constants from PHP -->
  <script>
    const API_BASE   = <?= json_encode($api_base) ?>;
    const ADMIN_BASE = <?= json_encode($admin_base) ?>;
    const SITE_BASE  = <?= json_encode($site_base) ?>;
    ER = {}; // placeholder until admin.js loads
  </script>
</head>
<body>

<?php
$cp = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$seg2 = $this->uri->segment(2);
function era($seg, $keys) { return in_array($seg, (array)$keys) ? 'active' : ''; }
?>

<!-- SIDEBAR -->
<aside class="er-side">
  <a href="<?= $admin_base ?>dashboard" class="er-brand">Exam<span>Rankers</span></a>

  <div class="er-sec">Main</div>
  <a href="<?= $admin_base ?>dashboard"    class="er-link <?= era($seg2,'dashboard') ?>"><i class="bi bi-grid-1x2-fill"></i>Dashboard</a>

  <div class="er-sec">Content</div>
  <a href="<?= $admin_base ?>blog"         class="er-link <?= era($seg2,'blog') ?>"><i class="bi bi-file-earmark-text-fill"></i>Blog Posts</a>
  <a href="<?= $admin_base ?>testimonials" class="er-link <?= era($seg2,'testimonials') ?>"><i class="bi bi-chat-quote-fill"></i>Testimonials</a>
  <a href="<?= $admin_base ?>faqs"         class="er-link <?= era($seg2,'faqs') ?>"><i class="bi bi-question-circle-fill"></i>FAQs</a>

  <div class="er-sec">System</div>
  <a href="<?= $admin_base ?>settings"     class="er-link <?= era($seg2,'settings') ?>"><i class="bi bi-gear-fill"></i>Site Settings</a>
  <a href="<?= $site_base ?>"   target="_blank" class="er-link"><i class="bi bi-box-arrow-up-right"></i>View Website</a>
  <a href="#" onclick="ER.logout();return false;" class="er-link red"><i class="bi bi-box-arrow-left"></i>Logout</a>

  <div class="er-foot">ExamRankers &copy; <?= date('Y') ?></div>
</aside>

<!-- MAIN -->
<div class="er-main">
  <div class="er-top">
    <h6 class="mb-0 fw-bold" style="color:#0f172a;"><?= htmlspecialchars($page_title ?? '') ?></h6>
    <div class="d-flex align-items-center gap-3">
      <span class="text-muted small"><i class="bi bi-person-circle me-1"></i><span id="admin-name">Admin</span></span>
      <a href="#" onclick="ER.logout();return false;" class="btn btn-sm btn-outline-danger">Logout</a>
    </div>
  </div>
  <div class="er-body">

<div id="er-toasts"></div>

<!-- Load shared admin JS -->
<script src="<?= base_url('assets/js/admin.js') ?>"></script>
<script>
  // Set the base URLs into ER after it's loaded
  ER.base      = API_BASE;
  ER.adminBase = ADMIN_BASE;
  ER.siteBase  = SITE_BASE;
  // Auth guard — redirect to login if no token
  ER.requireAuth();
</script>
