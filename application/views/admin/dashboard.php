<!-- Stats -->
<div class="row g-3 mb-4" id="stats-row">
  <div class="col-sm-6 col-lg-3"><div class="stat-box d-flex align-items-center gap-3"><div class="fs-3 text-primary"><i class="bi bi-file-earmark-text-fill"></i></div><div><div class="num" id="s-total">—</div><div class="lbl">Total Posts</div></div></div></div>
  <div class="col-sm-6 col-lg-3"><div class="stat-box d-flex align-items-center gap-3"><div class="fs-3 text-success"><i class="bi bi-check-circle-fill"></i></div><div><div class="num" id="s-pub">—</div><div class="lbl">Published</div></div></div></div>
  <div class="col-sm-6 col-lg-3"><div class="stat-box d-flex align-items-center gap-3"><div class="fs-3 text-warning"><i class="bi bi-pencil-fill"></i></div><div><div class="num" id="s-draft">—</div><div class="lbl">Drafts</div></div></div></div>
  <div class="col-sm-6 col-lg-3"><div class="stat-box d-flex align-items-center gap-3"><div class="fs-3 text-info"><i class="bi bi-chat-quote-fill"></i></div><div><div class="num" id="s-testi">—</div><div class="lbl">Testimonials</div></div></div></div>
</div>

<!-- Quick Actions -->
<div class="er-card mb-4">
  <div class="er-card-head"><h6>Quick Actions</h6></div>
  <div class="er-card-body d-flex flex-wrap gap-2">
    <a href="<?= base_url('admin/blog/create') ?>" class="btn btn-primary btn-sm"><i class="bi bi-plus-lg me-1"></i>New Blog Post</a>
    <a href="<?= base_url('admin/testimonials') ?>" class="btn btn-outline-secondary btn-sm"><i class="bi bi-chat-quote me-1"></i>Testimonials</a>
    <a href="<?= base_url('admin/faqs') ?>" class="btn btn-outline-secondary btn-sm"><i class="bi bi-question-circle me-1"></i>FAQs</a>
    <a href="<?= base_url('admin/settings') ?>" class="btn btn-outline-secondary btn-sm"><i class="bi bi-gear me-1"></i>Settings</a>
    <a href="<?= base_url('blog') ?>" target="_blank" class="btn btn-outline-dark btn-sm"><i class="bi bi-box-arrow-up-right me-1"></i>View Blog</a>
  </div>
</div>

<!-- Recent posts -->
<div class="er-card">
  <div class="er-card-head">
    <h6><i class="bi bi-clock-history me-2 text-muted"></i>Recent Blog Posts</h6>
    <a href="<?= base_url('admin/blog') ?>" class="btn btn-sm btn-outline-primary">View All</a>
  </div>
  <div class="er-card-body p-0">
    <div id="recent-posts">
      <div class="text-center py-4 text-muted"><span class="spinner-border spinner-border-sm me-2"></span>Loading…</div>
    </div>
  </div>
</div>

<script>
(async () => {
  // Load blog posts
  const blogRes  = await ER.get('admin/blog');
  const testiRes = await ER.get('admin/testimonials');

  if (blogRes.success) {
    const posts = blogRes.data || [];
    const pub   = posts.filter(p => p.status === 'published').length;
    const draft = posts.filter(p => p.status === 'draft').length;
    document.getElementById('s-total').textContent = posts.length;
    document.getElementById('s-pub').textContent   = pub;
    document.getElementById('s-draft').textContent = draft;

    const recent = posts.slice(0, 5);
    if (recent.length === 0) {
      document.getElementById('recent-posts').innerHTML =
        '<div class="text-center py-5 text-muted"><i class="bi bi-file-earmark-text fs-2 d-block mb-2 opacity-25"></i>No posts yet. <a href="'+ADMIN_BASE+'blog/create">Create your first post</a>.</div>';
    } else {
      document.getElementById('recent-posts').innerHTML = `
        <table class="table er-tbl mb-0">
          <thead><tr><th class="px-4">Title</th><th>Category</th><th>Status</th><th>Date</th><th></th></tr></thead>
          <tbody>${recent.map(p => `
            <tr>
              <td class="px-4 fw-semibold">${escHtml(p.title)}</td>
              <td class="text-muted">${escHtml(p.category)}</td>
              <td>${p.status==='published'?'<span class="bp">Published</span>':'<span class="bd">Draft</span>'}</td>
              <td class="text-muted" style="font-size:.78rem;">${fmtDate(p.created_at)}</td>
              <td><a href="${ADMIN_BASE}blog/edit/${p.id}" class="btn btn-sm btn-outline-primary py-0 px-2">Edit</a></td>
            </tr>`).join('')}
          </tbody>
        </table>`;
    }
  }

  if (testiRes.success) {
    document.getElementById('s-testi').textContent = (testiRes.data || []).length;
  }
})();

function escHtml(s) { return String(s).replace(/[&<>"']/g, c => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[c])); }
function fmtDate(d) { const dt = new Date(d); return dt.toLocaleDateString('en-IN',{day:'2-digit',month:'short',year:'numeric'}); }
</script>
