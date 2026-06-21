<!-- PAGE HERO -->
<div class="page-hero text-white py-5 text-center">
  <div class="container py-3">
    <span class="hero-badge mb-3 d-inline-block">Knowledge Hub</span>
    <h1 class="fw-bold display-5 mt-3 mb-2">ExamRankers Blog</h1>
    <p style="opacity:.75;font-size:1.05rem;">Tips, guides, and news on online exams, AI proctoring, and marking & evaluation.</p>
  </div>
</div>

<!-- BLOG LISTING -->
<section class="py-5" style="background:var(--light);">
  <div class="container">

    <?php if (empty($posts)): ?>
      <div class="text-center py-5">
        <i class="bi bi-file-earmark-text fs-1 text-muted d-block mb-3 opacity-25"></i>
        <h5 class="text-muted">No articles published yet.</h5>
        <p class="text-muted small">Check back soon — we're working on great content!</p>
      </div>
    <?php else: ?>

    <!-- Category filter pills -->
    <?php if (!empty($categories)): ?>
    <div class="d-flex flex-wrap gap-2 mb-4">
      <a href="<?= base_url('blog') ?>" class="btn btn-sm btn-primary rounded-pill px-3">All</a>
      <?php foreach ($categories as $cat): ?>
        <a href="#" class="btn btn-sm btn-outline-secondary rounded-pill px-3"><?= htmlspecialchars($cat->category) ?></a>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <div class="row g-4">
      <?php foreach ($posts as $i => $post): ?>

      <?php if ($i === 0): ?>
      <!-- Featured post (first) -->
      <div class="col-12">
        <div class="card border-0 shadow-sm overflow-hidden" style="border-radius:14px;">
          <div class="row g-0">
            <?php if ($post->image): ?>
            <div class="col-md-5">
              <img src="<?= htmlspecialchars($post->image) ?>" alt="<?= htmlspecialchars($post->title) ?>"
                   style="width:100%;height:100%;object-fit:cover;min-height:240px;">
            </div>
            <?php endif; ?>
            <div class="col-md-<?= $post->image ? '7' : '12' ?>">
              <div class="p-4 p-md-5 h-100 d-flex flex-column justify-content-center">
                <div class="d-flex gap-2 mb-3">
                  <span class="badge rounded-pill" style="background:#dbeafe;color:#1e40af;font-size:.75rem;"><?= htmlspecialchars($post->category) ?></span>
                  <span class="text-muted small"><?= date('d M Y', strtotime($post->created_at)) ?></span>
                </div>
                <h2 class="fw-bold mb-3" style="color:var(--text);font-size:1.5rem;">
                  <a href="<?= base_url('blog/' . $post->slug) ?>" class="text-decoration-none" style="color:inherit;">
                    <?= htmlspecialchars($post->title) ?>
                  </a>
                </h2>
                <?php if ($post->excerpt): ?>
                  <p class="text-muted mb-4"><?= htmlspecialchars($post->excerpt) ?></p>
                <?php endif; ?>
                <a href="<?= base_url('blog/' . $post->slug) ?>" class="btn btn-primary align-self-start">
                  Read Article <i class="bi bi-arrow-right ms-1"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php else: ?>
      <!-- Regular post cards -->
      <div class="col-sm-6 col-lg-4">
        <div class="card border-0 shadow-sm h-100" style="border-radius:12px;overflow:hidden;">
          <?php if ($post->image): ?>
            <img src="<?= htmlspecialchars($post->image) ?>" alt="<?= htmlspecialchars($post->title) ?>"
                 style="width:100%;height:180px;object-fit:cover;">
          <?php else: ?>
            <div style="height:140px;background:linear-gradient(135deg,var(--navy),var(--navy2));
                        display:flex;align-items:center;justify-content:center;">
              <i class="bi bi-file-earmark-text text-white opacity-25" style="font-size:3rem;"></i>
            </div>
          <?php endif; ?>
          <div class="card-body p-4 d-flex flex-column">
            <div class="d-flex gap-2 mb-2">
              <span class="badge rounded-pill" style="background:#dbeafe;color:#1e40af;font-size:.72rem;"><?= htmlspecialchars($post->category) ?></span>
              <span class="text-muted" style="font-size:.75rem;"><?= date('d M Y', strtotime($post->created_at)) ?></span>
            </div>
            <h6 class="fw-bold mb-2" style="color:var(--text);line-height:1.4;">
              <a href="<?= base_url('blog/' . $post->slug) ?>" class="text-decoration-none" style="color:inherit;">
                <?= htmlspecialchars($post->title) ?>
              </a>
            </h6>
            <?php if ($post->excerpt): ?>
              <p class="text-muted small mb-3 flex-grow-1"><?= htmlspecialchars(substr($post->excerpt, 0, 110)) ?>...</p>
            <?php else: ?>
              <div class="flex-grow-1"></div>
            <?php endif; ?>
            <a href="<?= base_url('blog/' . $post->slug) ?>" class="text-primary small fw-semibold text-decoration-none">
              Read more <i class="bi bi-arrow-right ms-1"></i>
            </a>
          </div>
        </div>
      </div>
      <?php endif; ?>

      <?php endforeach; ?>
    </div>

    <?php endif; ?>
  </div>
</section>

<!-- CTA -->
<section class="cta-banner text-white py-5 text-center">
  <div class="container py-3">
    <h2 class="fw-bold display-6 mb-3">Ready to Digitise Your Exams?</h2>
    <p class="opacity-75 mb-4 mx-auto" style="max-width:480px;">Join 3,500+ organisations using ExamRankers for secure, scalable online assessments.</p>
    <a href="<?= base_url('contact') ?>" class="btn-primary-custom text-decoration-none" style="background:#22c55e;">Request a Free Demo</a>
  </div>
</section>
