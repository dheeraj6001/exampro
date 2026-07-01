<div class="er-card">
  <div class="er-card-head">
    <h6><i class="bi bi-person-check-fill me-2 text-muted"></i>Signed In</h6>
  </div>
  <div class="er-card-body">
    <p class="mb-1">Welcome back, <strong id="dash-admin-name">—</strong>.</p>
    <p class="text-muted small mb-0">Signed in as <span id="dash-admin-email">—</span>.</p>
  </div>
</div>

<script>
(() => {
  const admin = ER.getAdmin();
  if (admin) {
    document.getElementById('dash-admin-name').textContent  = admin.name || admin.email || 'Admin';
    document.getElementById('dash-admin-email').textContent = admin.email || '—';
  }
})();
</script>
