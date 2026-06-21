<!-- PAGE HERO -->
<div class="page-hero text-white py-5 text-center">
  <div class="container py-3" style="max-width:800px;">
    <span class="hero-badge mb-3 d-inline-block"><?= htmlspecialchars($post->category) ?></span>
    <h1 class="fw-bold mt-3 mb-3" style="font-size:clamp(1.6rem,4vw,2.4rem);line-height:1.2;">
      <?= htmlspecialchars($post->title) ?>
    </h1>
    <div class="d-flex align-items-center justify-content-center gap-3 opacity-75" style="font-size:.88rem;">
      <span><i class="bi bi-calendar3 me-1"></i><?= date('d M Y', strtotime($post->created_at)) ?></span>
      <span>·</span>
      <span><i class="bi bi-clock me-1"></i><?= max(1, round(str_word_count(strip_tags($post->content)) / 200)) ?> min read</span>
    </div>
    <nav aria-label="breadcrumb" class="d-flex justify-content-center mt-3">
      <ol class="breadcrumb mb-0" style="background:transparent;">
        <li class="breadcrumb-item"><a href="<?= base_url() ?>" class="text-white opacity-75">Home</a></li>
        <li class="breadcrumb-item"><a href="<?= base_url('blog') ?>" class="text-white opacity-75">Blog</a></li>
        <li class="breadcrumb-item active text-white"><?= htmlspecialchars(substr($post->title, 0, 40)) ?>...</li>
      </ol>
    </nav>
  </div>
</div>

<!-- POST CONTENT -->
<section class="py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">

        <?php if ($post->image): ?>
          <img src="<?= htmlspecialchars($post->image) ?>" alt="<?= htmlspecialchars($post->title) ?>"
               class="img-fluid rounded-3 w-100 mb-4 shadow-sm" style="max-height:420px;object-fit:cover;">
        <?php endif; ?>

        <!-- Article -->
        <article class="blog-content">
          <?= $post->content ?>
        </article>

        <!-- Share + Back -->
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mt-5 pt-4 border-top">
          <a href="<?= base_url('blog') ?>" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i>Back to Blog
          </a>
          <div class="d-flex gap-2">
            <span class="text-muted small me-1">Share:</span>
            <a href="https://twitter.com/share?url=<?= urlencode(current_url()) ?>&text=<?= urlencode($post->title) ?>"
               target="_blank" class="btn btn-sm btn-outline-secondary py-0 px-2">
              <i class="bi bi-twitter-x"></i>
            </a>
            <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?= urlencode(current_url()) ?>"
               target="_blank" class="btn btn-sm btn-outline-secondary py-0 px-2">
              <i class="bi bi-linkedin"></i>
            </a>
            <a href="https://wa.me/?text=<?= urlencode($post->title . ' ' . current_url()) ?>"
               target="_blank" class="btn btn-sm btn-outline-success py-0 px-2">
              <i class="bi bi-whatsapp"></i>
            </a>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<!-- RELATED POSTS -->
<?php if (!empty($related)): ?>
<section class="py-5" style="background:var(--light);">
  <div class="container">
    <h4 class="fw-bold mb-4">More Articles</h4>
    <div class="row g-4">
      <?php foreach ($related as $r): if ($r->slug === $post->slug) continue; ?>
      <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100" style="border-radius:10px;overflow:hidden;">
          <?php if ($r->image): ?>
            <img src="<?= htmlspecialchars($r->image) ?>" style="height:140px;object-fit:cover;width:100%;" alt="">
          <?php endif; ?>
          <div class="card-body p-3">
            <span class="badge rounded-pill mb-2" style="background:#dbeafe;color:#1e40af;font-size:.72rem;"><?= htmlspecialchars($r->category) ?></span>
            <h6 class="fw-bold mb-0" style="font-size:.88rem;line-height:1.4;">
              <a href="<?= base_url('blog/' . $r->slug) ?>" class="text-decoration-none" style="color:var(--text);">
                <?= htmlspecialchars($r->title) ?>
              </a>
            </h6>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<style>
/* Blog article typography */
.blog-content { color: #1e293b; line-height: 1.85; font-size: 1.02rem; }
.blog-content h2, .blog-content h3, .blog-content h4 { font-weight: 700; margin-top: 2rem; margin-bottom: .75rem; color: #0f172a; }
.blog-content p { margin-bottom: 1.2rem; }
.blog-content ul, .blog-content ol { margin-bottom: 1.2rem; padding-left: 1.5rem; }
.blog-content li { margin-bottom: .4rem; }
.blog-content blockquote { border-left: 4px solid #1a56db; padding: 12px 20px; background: #f0f4ff; border-radius: 0 8px 8px 0; margin: 1.5rem 0; font-style: italic; color: #475569; }
.blog-content img { max-width: 100%; border-radius: 8px; margin: 1rem 0; }
.blog-content pre { background: #0f172a; color: #e2e8f0; padding: 16px 20px; border-radius: 8px; overflow-x: auto; font-size: .88rem; }
.blog-content code { background: #f1f5f9; color: #be185d; padding: 2px 6px; border-radius: 4px; font-size: .88rem; }
.blog-content a { color: #1a56db; }
.blog-content table { width: 100%; border-collapse: collapse; margin-bottom: 1.2rem; }
.blog-content table th, .blog-content table td { border: 1px solid #e2e8f0; padding: 8px 12px; }
.blog-content table th { background: #f8fafc; font-weight: 700; }
</style>
