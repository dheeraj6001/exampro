<style>
:root{--navy:#0b1437;--blue:#1a56db;--green:#16a34a;}
.blog-hero{background:linear-gradient(135deg,var(--navy),#111b47);padding:70px 0 50px;}
.blog-hero h1{color:#fff;font-weight:800;}
.blog-hero p{color:#94a3b8;}

.cat-pill{padding:7px 18px;border-radius:30px;border:2px solid #e2e8f0;background:#fff;font-size:.82rem;font-weight:600;text-decoration:none;color:#374151;transition:.15s;white-space:nowrap;}
.cat-pill:hover{border-color:var(--blue);color:var(--blue);}
.cat-pill.active{background:var(--blue);border-color:var(--blue);color:#fff;}

.post-card{background:#fff;border:1px solid #e2e8f0;border-radius:14px;overflow:hidden;height:100%;transition:.18s;display:flex;flex-direction:column;}
.post-card:hover{box-shadow:0 10px 36px rgba(0,0,0,.1);transform:translateY(-4px);}
.post-card-img{width:100%;height:195px;object-fit:cover;}
.post-card-img-placeholder{height:140px;background:linear-gradient(135deg,var(--navy),#1e3a7b);display:flex;align-items:center;justify-content:center;}
.post-body{padding:20px;flex:1;display:flex;flex-direction:column;}
.cat-badge{font-size:.71rem;font-weight:700;padding:3px 11px;border-radius:20px;background:#dbeafe;color:#1e40af;display:inline-block;margin-bottom:8px;}

/* Featured post */
.featured-card{background:#fff;border:1px solid #e2e8f0;border-radius:16px;overflow:hidden;}
.featured-card img{width:100%;height:100%;object-fit:cover;min-height:260px;}

/* Pagination */
.page-link{border-radius:8px !important;border:1px solid #e2e8f0;color:var(--navy);font-weight:600;font-size:.88rem;padding:8px 14px;margin:0 2px;}
.page-link:hover{background:#eff6ff;border-color:var(--blue);color:var(--blue);}
.page-item.active .page-link{background:var(--blue);border-color:var(--blue);color:#fff;}
.page-item.disabled .page-link{color:#cbd5e1;pointer-events:none;}
</style>

<!-- Hero -->
<div class="blog-hero text-center">
  <div class="container">
    <span class="badge px-3 py-2 mb-3" style="background:rgba(26,86,219,.25);color:#93c5fd;font-size:.78rem;">Knowledge Hub</span>
    <h1 class="display-5 mb-3">ExamRankers Blog</h1>
    <p class="mb-4" style="max-width:520px;margin:0 auto;">Tips, guides, and news on online exams, AI proctoring, marking & evaluation.</p>
    <!-- Search -->
    <div class="mx-auto" style="max-width:440px;">
      <div class="input-group">
        <span class="input-group-text bg-white border-0 pe-0"><i class="bi bi-search text-muted"></i></span>
        <input type="text" id="blog-search" class="form-control border-0 shadow-none" placeholder="Search articles…" oninput="liveSearch(this.value)">
        <button class="btn btn-primary px-3" onclick="liveSearch(document.getElementById('blog-search').value)">Go</button>
      </div>
    </div>
  </div>
</div>

<!-- Main -->
<section class="py-5" style="background:#f8fafc;">
  <div class="container">

    <!-- Category filter -->
    <?php if (!empty($categories)): ?>
    <div class="d-flex flex-wrap gap-2 mb-5 justify-content-center" id="cat-bar">
      <a href="<?= base_url('blog') ?>" class="cat-pill <?= !$active_cat ? 'active' : '' ?>">All</a>
      <?php foreach ($categories as $cat): ?>
        <a href="<?= base_url('blog') . '?category=' . urlencode($cat->category) ?>"
           class="cat-pill <?= ($active_cat === $cat->category) ? 'active' : '' ?>">
          <?= htmlspecialchars($cat->category) ?>
        </a>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <!-- No results -->
    <?php if (empty($posts)): ?>
    <div class="text-center py-5">
      <i class="bi bi-file-earmark-text text-muted d-block mb-3" style="font-size:3rem;opacity:.25;"></i>
      <h5 class="text-muted">No articles found<?= $active_cat ? ' in "' . htmlspecialchars($active_cat) . '"' : '' ?>.</h5>
      <a href="<?= base_url('blog') ?>" class="btn btn-outline-primary mt-3">View all articles</a>
    </div>

    <?php else: ?>

    <!-- Search results overlay (hidden by default) -->
    <div id="search-results" style="display:none;"></div>

    <!-- Posts grid -->
    <div id="posts-grid">

      <?php foreach ($posts as $i => $post): ?>

      <?php if ($i === 0 && $current_page === 1 && !$active_cat): ?>
      <!-- Featured (first post, page 1 only) -->
      <div class="featured-card mb-4 shadow-sm">
        <div class="row g-0">
          <?php if ($post->image): ?>
          <div class="col-lg-5">
            <img src="<?= htmlspecialchars($post->image) ?>" alt="<?= htmlspecialchars($post->title) ?>" style="width:100%;height:100%;object-fit:cover;min-height:280px;">
          </div>
          <?php endif; ?>
          <div class="col-lg-<?= $post->image ? '7' : '12' ?> p-4 p-lg-5 d-flex flex-column justify-content-center">
            <span class="cat-badge mb-2"><?= htmlspecialchars($post->category) ?></span>
            <div class="text-muted small mb-3"><i class="bi bi-calendar3 me-1"></i><?= date('d M Y', strtotime($post->created_at)) ?></div>
            <h2 class="fw-800 mb-3" style="color:var(--navy);font-size:1.5rem;line-height:1.35;">
              <a href="<?= base_url('blog/' . $post->slug) ?>" class="text-decoration-none" style="color:inherit;">
                <?= htmlspecialchars($post->title) ?>
              </a>
            </h2>
            <?php if ($post->excerpt): ?>
              <p class="text-muted mb-4" style="font-size:.92rem;"><?= htmlspecialchars($post->excerpt) ?></p>
            <?php endif; ?>
            <a href="<?= base_url('blog/' . $post->slug) ?>" class="btn btn-primary align-self-start px-4">
              Read Article <i class="bi bi-arrow-right ms-1"></i>
            </a>
          </div>
        </div>
      </div>

      <!-- Remaining posts as cards -->
      <?php if (count($posts) > 1): ?>
      <div class="row g-4" id="card-grid">
      <?php endif; ?>

      <?php else: ?>

      <?php if ($i === 1 && $current_page === 1 && !$active_cat): ?>
      <div class="row g-4" id="card-grid">
      <?php elseif ($i === 0): ?>
      <div class="row g-4" id="card-grid">
      <?php endif; ?>

        <div class="col-sm-6 col-lg-4">
          <div class="post-card">
            <?php if ($post->image): ?>
              <img src="<?= htmlspecialchars($post->image) ?>" class="post-card-img" alt="<?= htmlspecialchars($post->title) ?>">
            <?php else: ?>
              <div class="post-card-img-placeholder">
                <i class="bi bi-file-earmark-text text-white" style="font-size:2.5rem;opacity:.3;"></i>
              </div>
            <?php endif; ?>
            <div class="post-body">
              <span class="cat-badge"><?= htmlspecialchars($post->category) ?></span>
              <div class="text-muted small mb-2"><i class="bi bi-calendar3 me-1"></i><?= date('d M Y', strtotime($post->created_at)) ?></div>
              <h6 class="fw-700 mb-2" style="color:var(--navy);line-height:1.45;font-size:.95rem;">
                <a href="<?= base_url('blog/' . $post->slug) ?>" class="text-decoration-none" style="color:inherit;">
                  <?= htmlspecialchars($post->title) ?>
                </a>
              </h6>
              <?php if ($post->excerpt): ?>
                <p class="text-muted small mb-3 flex-grow-1"><?= htmlspecialchars(substr($post->excerpt, 0, 105)) ?>…</p>
              <?php else: ?>
                <div class="flex-grow-1"></div>
              <?php endif; ?>
              <a href="<?= base_url('blog/' . $post->slug) ?>" class="text-primary small fw-600 text-decoration-none">
                Read more <i class="bi bi-arrow-right ms-1"></i>
              </a>
            </div>
          </div>
        </div>

      <?php endif; ?>
      <?php endforeach; ?>

      <?php if (!empty($posts)): ?>
      </div><!-- /.row card-grid -->
      <?php endif; ?>

    </div><!-- /#posts-grid -->

    <!-- Pagination -->
    <?php if ($last_page > 1): ?>
    <nav class="mt-5 d-flex justify-content-center align-items-center gap-3 flex-wrap" aria-label="Blog pagination">
      <!-- Summary -->
      <span class="text-muted small">
        Showing <?= (($current_page - 1) * $per_page) + 1 ?>–<?= min($current_page * $per_page, $total) ?> of <?= $total ?> articles
      </span>
      <ul class="pagination mb-0">

        <!-- Previous -->
        <li class="page-item <?= $current_page <= 1 ? 'disabled' : '' ?>">
          <a class="page-link" href="<?= base_url('blog') . '?page=' . ($current_page - 1) . ($active_cat ? '&category=' . urlencode($active_cat) : '') ?>">
            <i class="bi bi-chevron-left"></i>
          </a>
        </li>

        <?php
        // Smart page window: always show first, last, current ±2
        $window_start = max(1, $current_page - 2);
        $window_end   = min($last_page, $current_page + 2);
        ?>

        <?php if ($window_start > 1): ?>
          <li class="page-item">
            <a class="page-link" href="<?= base_url('blog') . '?page=1' . ($active_cat ? '&category=' . urlencode($active_cat) : '') ?>">1</a>
          </li>
          <?php if ($window_start > 2): ?>
            <li class="page-item disabled"><span class="page-link">…</span></li>
          <?php endif; ?>
        <?php endif; ?>

        <?php for ($p = $window_start; $p <= $window_end; $p++): ?>
          <li class="page-item <?= $p === $current_page ? 'active' : '' ?>">
            <a class="page-link" href="<?= base_url('blog') . '?page=' . $p . ($active_cat ? '&category=' . urlencode($active_cat) : '') ?>"><?= $p ?></a>
          </li>
        <?php endfor; ?>

        <?php if ($window_end < $last_page): ?>
          <?php if ($window_end < $last_page - 1): ?>
            <li class="page-item disabled"><span class="page-link">…</span></li>
          <?php endif; ?>
          <li class="page-item">
            <a class="page-link" href="<?= base_url('blog') . '?page=' . $last_page . ($active_cat ? '&category=' . urlencode($active_cat) : '') ?>"><?= $last_page ?></a>
          </li>
        <?php endif; ?>

        <!-- Next -->
        <li class="page-item <?= $current_page >= $last_page ? 'disabled' : '' ?>">
          <a class="page-link" href="<?= base_url('blog') . '?page=' . ($current_page + 1) . ($active_cat ? '&category=' . urlencode($active_cat) : '') ?>">
            <i class="bi bi-chevron-right"></i>
          </a>
        </li>

      </ul>
    </nav>
    <?php endif; ?>

    <?php endif; ?>
  </div>
</section>

<!-- CTA -->
<section class="py-5 text-center" style="background:linear-gradient(135deg,var(--navy),#111b47);">
  <div class="container">
    <h2 class="fw-800 text-white mb-3">Ready to Digitise Your Exams?</h2>
    <p class="mb-4" style="color:#94a3b8;max-width:480px;margin:0 auto 1.5rem;">Join 3,500+ organisations using ExamRankers for secure, scalable online assessments.</p>
    <a href="<?= base_url('contact') ?>" class="btn btn-primary btn-lg px-5">Request a Free Demo</a>
  </div>
</section>

<script>
// Live search — filters visible cards client-side; falls back to server for no-results
let searchTimer;
function liveSearch(q) {
  clearTimeout(searchTimer);
  q = q.trim().toLowerCase();
  const sr = document.getElementById('search-results');
  const grid = document.getElementById('posts-grid');
  if (!q) {
    sr.style.display = 'none';
    grid.style.display = '';
    return;
  }
  searchTimer = setTimeout(() => {
    const cards = document.querySelectorAll('#card-grid .col-sm-6, #card-grid .col-sm-6');
    const featured = document.querySelector('.featured-card');
    let found = 0;
    // Check featured
    if (featured) {
      const text = featured.innerText.toLowerCase();
      featured.style.display = text.includes(q) ? '' : 'none';
      if (text.includes(q)) found++;
    }
    cards.forEach(card => {
      const text = card.innerText.toLowerCase();
      card.style.display = text.includes(q) ? '' : 'none';
      if (text.includes(q)) found++;
    });
    if (found === 0) {
      grid.style.display = 'none';
      sr.style.display = 'block';
      sr.innerHTML = `<div class="text-center py-5">
        <i class="bi bi-search text-muted d-block mb-3" style="font-size:2.5rem;opacity:.3;"></i>
        <h6 class="text-muted">No articles match "<strong>${q}</strong>"</h6>
        <button class="btn btn-outline-primary mt-3 btn-sm" onclick="document.getElementById('blog-search').value='';liveSearch('');">Clear search</button>
      </div>`;
    } else {
      sr.style.display = 'none';
      grid.style.display = '';
    }
  }, 250);
}
</script>
