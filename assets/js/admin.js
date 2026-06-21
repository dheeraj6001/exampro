/**
 * ExamRankers Admin — shared API utilities
 * All admin panel JS uses these helpers for authenticated API calls.
 */

const ER = {

  // ── storage ──────────────────────────────────────────────────
  getToken  : () => localStorage.getItem('er_token'),
  getAdmin  : () => JSON.parse(localStorage.getItem('er_admin') || 'null'),
  setSession: (token, admin) => {
    localStorage.setItem('er_token', token);
    localStorage.setItem('er_admin', JSON.stringify(admin));
  },
  clearSession: () => {
    localStorage.removeItem('er_token');
    localStorage.removeItem('er_admin');
  },

  // ── core fetch wrapper ────────────────────────────────────────
  async call(endpoint, method = 'GET', body = null) {
    const opts = {
      method,
      headers: {
        'Content-Type' : 'application/json',
        'Authorization': 'Bearer ' + (ER.getToken() || ''),
      },
    };
    if (body !== null) opts.body = JSON.stringify(body);

    try {
      const res = await fetch(ER.base + endpoint, opts);
      const json = await res.json();
      if (res.status === 401) { ER.logout(); return json; }
      return json;
    } catch (e) {
      return { success: false, message: 'Network error: ' + e.message, data: null };
    }
  },

  // ── convenience wrappers ──────────────────────────────────────
  get   : (ep)         => ER.call(ep, 'GET'),
  post  : (ep, body)   => ER.call(ep, 'POST',   body),
  put   : (ep, body)   => ER.call(ep, 'PUT',    body),
  delete: (ep)         => ER.call(ep, 'DELETE'),

  // ── auth helpers ──────────────────────────────────────────────
  logout() {
    ER.call('auth/logout', 'POST').finally(() => {
      ER.clearSession();
      window.location.href = ER.adminBase + 'login';
    });
  },

  requireAuth() {
    if (!ER.getToken()) {
      window.location.href = ER.adminBase + 'login';
      return false;
    }
    // Populate admin name in topbar
    const admin = ER.getAdmin();
    const el = document.getElementById('admin-name');
    if (el && admin) el.textContent = admin.name;
    return true;
  },

  // ── UI helpers ────────────────────────────────────────────────
  toast(message, type = 'success') {
    const wrap = document.getElementById('er-toasts');
    if (!wrap) return;
    const id = 'toast-' + Date.now();
    const icon = type === 'success' ? 'bi-check-circle-fill' : 'bi-exclamation-triangle-fill';
    wrap.insertAdjacentHTML('beforeend', `
      <div id="${id}" class="toast align-items-center text-bg-${type === 'success' ? 'success' : 'danger'} border-0 show" role="alert">
        <div class="d-flex">
          <div class="toast-body"><i class="bi ${icon} me-2"></i>${message}</div>
          <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
        </div>
      </div>`);
    setTimeout(() => document.getElementById(id)?.remove(), 4000);
  },

  loading(el, show) {
    if (!el) return;
    if (show) {
      el.dataset.orig = el.innerHTML;
      el.disabled = true;
      el.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span>Saving…';
    } else {
      el.disabled = false;
      el.innerHTML = el.dataset.orig || 'Save';
    }
  },

  confirm(msg) { return window.confirm(msg); },
};
