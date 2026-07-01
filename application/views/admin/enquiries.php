<div class="er-card">
  <div class="er-card-head">
    <h6><i class="bi bi-inbox-fill me-2 text-muted"></i>Enquiries</h6>
    <span class="text-muted small" id="enq-count"></span>
  </div>
  <div class="er-card-body p-0">
    <div id="enq-list">
      <div class="text-center py-4 text-muted"><span class="spinner-border spinner-border-sm me-2"></span>Loading…</div>
    </div>
  </div>
</div>

<script>
(async () => {
  const listEl = document.getElementById('enq-list');
  const res = await ER.get('admin/enquiries');

  if (!res.success) {
    listEl.innerHTML = `<div class="text-center py-5 text-danger"><i class="bi bi-exclamation-triangle-fill fs-2 d-block mb-2"></i>${escHtml(res.message || 'Failed to load enquiries')}</div>`;
    return;
  }

  const rows = (res.data || []).slice().sort((a, b) => enqDate(b) - enqDate(a));
  document.getElementById('enq-count').textContent = rows.length + ' total';

  if (rows.length === 0) {
    listEl.innerHTML = '<div class="text-center py-5 text-muted"><i class="bi bi-inbox fs-2 d-block mb-2 opacity-25"></i>No enquiries yet.</div>';
    return;
  }

  listEl.innerHTML = `
    <table class="table er-tbl mb-0">
      <thead><tr><th class="px-4">Name</th><th>Email</th><th>Subject / Type</th><th>Message</th><th>Status</th><th>Date</th></tr></thead>
      <tbody>${rows.map(enqRow).join('')}</tbody>
    </table>`;
})();

function enqName(e)  { return e.name || [e.first_name, e.last_name].filter(Boolean).join(' ') || '—'; }
function enqSubj(e)  { return e.subject || e.type || e.service || e.org_type || '—'; }
function enqDateRaw(e) { return e.createdAt || e.created_at || null; }
function enqDate(e)  { const d = enqDateRaw(e); return d ? new Date(d).getTime() : 0; }

function enqRow(e) {
  const status = e.status || 'new';
  const badge  = status === 'new' ? 'ba' : (status === 'resolved' ? 'bp' : 'bi2');
  const d      = enqDateRaw(e);
  return `
    <tr>
      <td class="px-4 fw-semibold">${escHtml(enqName(e))}</td>
      <td class="text-muted">${escHtml(e.email || '—')}</td>
      <td class="text-muted">${escHtml(enqSubj(e))}</td>
      <td class="text-muted" style="max-width:320px;white-space:pre-wrap;">${escHtml(e.message || '—')}</td>
      <td><span class="${badge}">${escHtml(status)}</span></td>
      <td class="text-muted" style="font-size:.78rem;white-space:nowrap;">${d ? fmtDate(d) : '—'}</td>
    </tr>`;
}

function escHtml(s) { return String(s).replace(/[&<>"']/g, c => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[c])); }
function fmtDate(d) { const dt = new Date(d); return dt.toLocaleDateString('en-IN',{day:'2-digit',month:'short',year:'numeric'}); }
</script>
