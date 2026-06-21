<div class="mb-4">
  <h5 class="fw-bold mb-0">Site Settings</h5>
  <p class="text-muted small mb-0">Updates saved via API — take effect immediately</p>
</div>

<div id="settings-wrap">
  <div class="text-center py-5 text-muted"><span class="spinner-border spinner-border-sm me-2"></span>Loading settings…</div>
</div>

<template id="settings-tpl">
<div class="row g-4">
  <div class="col-lg-8">
    <div class="er-card mb-4">
      <div class="er-card-head"><h6><i class="bi bi-info-circle me-2 text-muted"></i>Company Information</h6></div>
      <div class="er-card-body">
        <div class="row g-3">
          <div class="col-sm-6"><label class="form-label fw-semibold small">Site Name</label><input type="text" id="s-site_name" class="form-control"></div>
          <div class="col-sm-6"><label class="form-label fw-semibold small">Phone</label><input type="text" id="s-site_phone" class="form-control"></div>
          <div class="col-sm-6"><label class="form-label fw-semibold small">Email</label><input type="email" id="s-site_email" class="form-control"></div>
          <div class="col-sm-6"><label class="form-label fw-semibold small">Address</label><input type="text" id="s-site_address" class="form-control"></div>
          <div class="col-12"><label class="form-label fw-semibold small">Footer Tagline</label><input type="text" id="s-footer_tagline" class="form-control"></div>
        </div>
      </div>
    </div>
    <div class="er-card">
      <div class="er-card-head"><h6><i class="bi bi-share me-2 text-muted"></i>Social Media</h6></div>
      <div class="er-card-body">
        <div class="row g-3">
          <div class="col-sm-6"><label class="form-label fw-semibold small"><i class="bi bi-facebook text-primary me-1"></i>Facebook URL</label><input type="url" id="s-facebook_url" class="form-control"></div>
          <div class="col-sm-6"><label class="form-label fw-semibold small"><i class="bi bi-twitter-x me-1"></i>Twitter / X</label><input type="url" id="s-twitter_url" class="form-control"></div>
          <div class="col-sm-6"><label class="form-label fw-semibold small"><i class="bi bi-linkedin text-primary me-1"></i>LinkedIn</label><input type="url" id="s-linkedin_url" class="form-control"></div>
          <div class="col-sm-6"><label class="form-label fw-semibold small"><i class="bi bi-youtube text-danger me-1"></i>YouTube</label><input type="url" id="s-youtube_url" class="form-control"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4">
    <div class="er-card">
      <div class="er-card-head"><h6>Save</h6></div>
      <div class="er-card-body">
        <p class="text-muted small">Changes are applied to the live site immediately.</p>
        <button id="save-settings-btn" onclick="saveSettings()" class="btn btn-primary w-100"><i class="bi bi-check-lg me-1"></i>Save Settings</button>
      </div>
    </div>
  </div>
</div>
</template>

<script>
const FIELDS = ['site_name','site_phone','site_email','site_address','footer_tagline','facebook_url','twitter_url','linkedin_url','youtube_url'];

(async () => {
  const res = await ER.get('admin/settings');
  if (!res.success) { ER.toast('Failed to load settings', 'error'); return; }

  document.getElementById('settings-wrap').innerHTML =
    document.getElementById('settings-tpl').innerHTML;

  const s = res.data || {};
  FIELDS.forEach(k => {
    const el = document.getElementById('s-' + k);
    if (el) el.value = s[k] || '';
  });
})();

async function saveSettings() {
  const btn = document.getElementById('save-settings-btn');
  ER.loading(btn, true);

  const body = {};
  FIELDS.forEach(k => {
    const el = document.getElementById('s-' + k);
    if (el) body[k] = el.value.trim();
  });

  const res = await ER.put('admin/settings', body);
  ER.loading(btn, false);
  if (res.success) ER.toast('Settings saved successfully');
  else ER.toast(res.message || 'Save failed', 'error');
}
</script>
