<div class="d-flex justify-content-between align-items-center mb-4">
  <div><h5 class="fw-bold mb-0">Blog Posts</h5><p class="text-muted small mb-0">All articles managed via API</p></div>
  <a href="<?= base_url('admin/blog/create') ?>" class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i>New Post</a>
</div>

<div class="er-card">
  <div class="er-card-body p-0">
    <div id="posts-table">
      <div class="text-center py-5 text-muted"><span class="spinner-border spinner-border-sm me-2"></span>Loading posts…</div>
    </div>
  </div>
</div>

<script>
function escHtml(s) { return String(s||'').replace(/[&<>"']/g, c=>({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[c])); }
function fmtDate(d) { return new Date(d).toLocaleDateString('en-IN',{day:'2-digit',month:'short',year:'numeric'}); }

async function loadPosts() {
  const res = await ER.get('admin/blog');
  if (!res.success) { ER.toast(res.message, 'error'); return; }
  const posts = res.data || [];

  if (posts.length === 0) {
    document.getElementById('posts-table').innerHTML =
      '<div class="text-center py-5 text-muted"><i class="bi bi-file-earmark-text fs-1 d-block mb-2 opacity-25"></i><p>No posts yet.</p><a href="'+ADMIN_BASE+'blog/create" class="btn btn-primary btn-sm">Write First Post</a></div>';
    return;
  }

  document.getElementById('posts-table').innerHTML = `
    <table class="table er-tbl mb-0">
      <thead><tr>
        <th class="px-4" style="width:42%">Title</th>
        <th>Category</th><th>Status</th><th>Date</th>
        <th class="text-end pe-4">Actions</th>
      </tr></thead>
      <tbody>
        ${posts.map(p => `
        <tr>
          <td class="px-4">
            <div class="fw-semibold">${escHtml(p.title)}</div>
            ${p.excerpt ? `<div class="text-muted" style="font-size:.75rem;">${escHtml(p.excerpt.substring(0,80))}…</div>` : ''}
          </td>
          <td><span class="bi2">${escHtml(p.category)}</span></td>
          <td>${p.status==='published'?'<span class="bp">Published</span>':'<span class="bd">Draft</span>'}</td>
          <td class="text-muted" style="font-size:.78rem;">${fmtDate(p.created_at)}</td>
          <td class="text-end pe-4">
            ${p.status==='published'?`<a href="${SITE_BASE}blog/${p.slug}" target="_blank" class="btn btn-sm btn-outline-secondary py-0 px-2 me-1" title="View"><i class="bi bi-eye"></i></a>`:''}
            <a href="${ADMIN_BASE}blog/edit/${p.id}" class="btn btn-sm btn-outline-primary py-0 px-2 me-1">Edit</a>
            <button onclick="delPost(${p.id})" class="btn btn-sm btn-outline-danger py-0 px-2">Delete</button>
          </td>
        </tr>`).join('')}
      </tbody>
    </table>`;
}

async function delPost(id) {
  if (!ER.confirm('Delete this post permanently?')) return;
  const res = await ER.delete('admin/blog/' + id);
  if (res.success) { ER.toast('Post deleted'); loadPosts(); }
  else ER.toast(res.message, 'error');
}

loadPosts();
</script>
