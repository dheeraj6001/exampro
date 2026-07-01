<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login — ExamRankers</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <style>
    body { background:linear-gradient(135deg,#0b1437,#111b47); min-height:100vh; display:flex; align-items:center; justify-content:center; font-family:'Segoe UI',sans-serif; }
    .card { border-radius:16px; box-shadow:0 30px 80px rgba(0,0,0,.45); border:none; }
    .brand { font-size:1.6rem; font-weight:800; color:#0b1437; }
    .brand span { color:#1a56db; }
    .form-control:focus { border-color:#1a56db; box-shadow:0 0 0 3px rgba(26,86,219,.15); }
    #err { display:none !important; }
  </style>
</head>
<body>
<div style="width:100%;max-width:400px;padding:16px;">
  <div class="card p-4 p-md-5">
    <div class="text-center mb-4">
      <div class="brand">Exam<span>Rankers</span></div>
      <p class="text-muted small mt-1 mb-0">Admin Panel — Sign In</p>
    </div>

    <div id="err" class="alert alert-danger d-flex align-items-center gap-2 mb-3 py-2" style="font-size:.84rem;">
      <i class="bi bi-exclamation-triangle-fill"></i>
      <span id="err-msg">Invalid credentials</span>
    </div>

    <form id="login-form">
      <div class="mb-3">
        <label class="form-label fw-semibold small">Email</label>
        <div class="input-group">
          <span class="input-group-text bg-light"><i class="bi bi-person text-muted"></i></span>
          <input type="email" id="email" class="form-control" placeholder="admin@example.com" required autofocus>
        </div>
      </div>
      <div class="mb-4">
        <label class="form-label fw-semibold small">Password</label>
        <div class="input-group">
          <span class="input-group-text bg-light"><i class="bi bi-lock text-muted"></i></span>
          <input type="password" id="password" class="form-control" placeholder="••••••••" required>
        </div>
      </div>
      <button type="submit" id="submit-btn" class="btn btn-primary w-100 fw-semibold py-2">
        Sign In <i class="bi bi-arrow-right ms-1"></i>
      </button>
    </form>

    <p class="text-center mt-4 mb-0" style="font-size:.78rem;">
      <a href="<?= $site_base ?>" class="text-muted text-decoration-none">
        <i class="bi bi-arrow-left me-1"></i>Back to Website
      </a>
    </p>
  </div>
</div>

<script>
const ADMIN_BASE = <?= json_encode($admin_base) ?>;

// If already logged in, redirect
if (localStorage.getItem('er_token')) {
  window.location.href = ADMIN_BASE + 'dashboard';
}

document.getElementById('login-form').addEventListener('submit', async function(e) {
  e.preventDefault();
  const btn = document.getElementById('submit-btn');
  const errEl = document.getElementById('err');
  btn.disabled = true;
  btn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span>Signing in…';
  errEl.style.setProperty('display', 'none', 'important');

  try {
    const res = await fetch(ADMIN_BASE + 'login_submit', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({
        email:    document.getElementById('email').value,
        password: document.getElementById('password').value,
      }),
    });
    const json = await res.json();

    if (json.success) {
      localStorage.setItem('er_token', json.data.token || '');
      localStorage.setItem('er_admin', JSON.stringify(json.data.user || {}));
      window.location.href = ADMIN_BASE + 'dashboard';
    } else {
      document.getElementById('err-msg').textContent = json.message || 'Invalid credentials';
      errEl.style.setProperty('display', 'flex', 'important');
      btn.disabled = false;
      btn.innerHTML = 'Sign In <i class="bi bi-arrow-right ms-1"></i>';
    }
  } catch (err) {
    document.getElementById('err-msg').textContent = 'Network error. Please try again.';
    errEl.style.removeProperty('display');
    btn.disabled = false;
    btn.innerHTML = 'Sign In <i class="bi bi-arrow-right ms-1"></i>';
  }
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
