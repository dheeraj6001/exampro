<?php
// Edit mode: URL segment 4 is the post ID  e.g. admin/blog/edit/5
$post_id = $this->uri->segment(4);
$is_edit = !empty($post_id) && is_numeric($post_id);
?>
<div class="d-flex align-items-center gap-3 mb-4">
  <a href="<?= base_url('admin/blog') ?>" class="btn btn-sm btn-outline-secondary"><i class="bi bi-arrow-left"></i></a>
  <div>
    <h5 class="fw-bold mb-0" id="form-title"><?= $is_edit ? 'Edit Post' : 'New Blog Post' ?></h5>
    <p class="text-muted small mb-0">Saved via API — appears live immediately on publish</p>
  </div>
</div>

<div class="row g-4">
  <div class="col-lg-8">
    <div class="er-card mb-4">
      <div class="er-card-head"><h6>Post Content</h6></div>
      <div class="er-card-body">
        <div class="mb-3">
          <label class="form-label fw-semibold small">Title <span class="text-danger">*</span></label>
          <input type="text" id="f-title" class="form-control" placeholder="Enter post title…">
        </div>
        <div class="mb-3">
          <label class="form-label fw-semibold small">Excerpt <span class="text-muted fw-normal">(shown in listing)</span></label>
          <textarea id="f-excerpt" class="form-control" rows="2" placeholder="1–2 sentence summary"></textarea>
        </div>
        <div>
          <label class="form-label fw-semibold small">Content</label>
          <div id="quill-editor" style="min-height:320px;border:1px solid #dee2e6;border-radius:6px;background:#fff;"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-4">
    <div class="er-card mb-4">
      <div class="er-card-head"><h6>Publish</h6></div>
      <div class="er-card-body">
        <div class="mb-3">
          <label class="form-label fw-semibold small">Status</label>
          <select id="f-status" class="form-select">
            <option value="draft">Draft</option>
            <option value="published">Published</option>
          </select>
        </div>
        <div class="d-flex gap-2">
          <button id="save-btn" onclick="savePost()" class="btn btn-primary flex-grow-1">
            <i class="bi bi-check-lg me-1"></i><?= $is_edit ? 'Update Post' : 'Save Post' ?>
          </button>
          <a href="<?= base_url('admin/blog') ?>" class="btn btn-outline-secondary">Cancel</a>
        </div>
      </div>
    </div>

    <div class="er-card mb-4">
      <div class="er-card-head"><h6>Category</h6></div>
      <div class="er-card-body">
        <select id="f-category" class="form-select">
          <?php foreach(['Online Exam Tips','Marking & Evaluation','AI Proctoring','EdTech News','Case Studies','Product Updates','General'] as $c): ?>
            <option value="<?= $c ?>"><?= $c ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>

    <div class="er-card">
      <div class="er-card-head"><h6>Featured Image</h6></div>
      <div class="er-card-body">
        <input type="url" id="f-image" class="form-control" placeholder="https://…">
        <div id="img-preview" class="mt-2 d-none">
          <img id="preview-img" src="" class="img-fluid rounded" style="max-height:130px;width:100%;object-fit:cover;" alt="">
        </div>
        <div class="text-muted mt-1" style="font-size:.74rem;">Direct image URL (JPG/PNG/WebP)</div>
      </div>
    </div>
  </div>
</div>

<!-- Quill -->
<link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
<script>
const POST_ID = <?= json_encode($is_edit ? (int)$post_id : null) ?>;

const quill = new Quill('#quill-editor', {
  theme: 'snow',
  modules: { toolbar: [[{header:[2,3,false]}],['bold','italic','underline','strike'],[{list:'ordered'},{list:'bullet'}],['blockquote','code-block'],['link','image'],[{align:[]}],['clean']] },
  placeholder: 'Write your post content here…',
});

// Image preview
document.getElementById('f-image').addEventListener('input', function() {
  const url = this.value.trim();
  const pv  = document.getElementById('img-preview');
  if (url) { document.getElementById('preview-img').src = url; pv.classList.remove('d-none'); }
  else pv.classList.add('d-none');
});

// If editing, load existing post
if (POST_ID) {
  (async () => {
    const res = await ER.get('admin/blog/' + POST_ID);
    if (!res.success) { ER.toast('Failed to load post', 'error'); return; }
    const p = res.data;
    document.getElementById('f-title').value    = p.title    || '';
    document.getElementById('f-excerpt').value  = p.excerpt  || '';
    document.getElementById('f-status').value   = p.status   || 'draft';
    document.getElementById('f-category').value = p.category || 'General';
    document.getElementById('f-image').value    = p.image    || '';
    if (p.image) {
      document.getElementById('preview-img').src = p.image;
      document.getElementById('img-preview').classList.remove('d-none');
    }
    quill.root.innerHTML = p.content || '';
  })();
}

async function savePost() {
  const title = document.getElementById('f-title').value.trim();
  if (!title) { ER.toast('Title is required', 'error'); return; }

  const btn  = document.getElementById('save-btn');
  ER.loading(btn, true);

  const body = {
    title    : title,
    excerpt  : document.getElementById('f-excerpt').value.trim(),
    content  : quill.root.innerHTML,
    category : document.getElementById('f-category').value,
    image    : document.getElementById('f-image').value.trim(),
    status   : document.getElementById('f-status').value,
  };

  const res = POST_ID
    ? await ER.put('admin/blog/' + POST_ID, body)
    : await ER.post('admin/blog', body);

  ER.loading(btn, false);

  if (res.success) {
    ER.toast(POST_ID ? 'Post updated!' : 'Post created!');
    setTimeout(() => window.location.href = ADMIN_BASE + 'blog', 800);
  } else {
    ER.toast(res.message || 'Save failed', 'error');
  }
}
</script>
