<style>
:root{--navy:#0b1437;--blue:#1a56db;--green:#16a34a;}
.uc-hero{background:linear-gradient(135deg,var(--navy) 0%,#111b47 100%);padding:80px 0 0;position:relative;overflow:hidden;}
.uc-hero h1{color:#fff;font-weight:800;}
.uc-hero p{color:#94a3b8;}
.uc-hero-img{width:100%;height:360px;object-fit:cover;border-radius:16px 16px 0 0;}
.challenge-item{display:flex;gap:14px;align-items:flex-start;padding:16px;background:#fff;border-radius:10px;border:1px solid #e2e8f0;margin-bottom:12px;}
.challenge-item i{font-size:1.2rem;flex-shrink:0;margin-top:2px;}
.feat-card{background:#fff;border:1px solid #e2e8f0;border-radius:12px;padding:24px;height:100%;transition:.18s;}
.feat-card:hover{box-shadow:0 8px 30px rgba(0,0,0,.08);transform:translateY(-3px);}
.feat-icon{width:48px;height:48px;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:1.3rem;margin-bottom:14px;}
.stat-box{text-align:center;padding:24px;background:var(--navy);border-radius:12px;}
.stat-box .num{font-size:2rem;font-weight:800;color:#fff;line-height:1;}
.stat-box .lbl{font-size:.78rem;color:#94a3b8;margin-top:6px;}
.quote-card{background:#fff;border-radius:14px;border-left:5px solid var(--blue);padding:28px 32px;box-shadow:0 4px 24px rgba(0,0,0,.07);}
.other-case{display:flex;align-items:center;gap:12px;padding:12px 16px;background:#fff;border:1px solid #e2e8f0;border-radius:10px;text-decoration:none;color:inherit;transition:.15s;font-size:.87rem;font-weight:600;}
.other-case:hover{border-color:var(--blue);color:var(--blue);transform:translateX(3px);}
</style>

<!-- Hero -->
<section class="uc-hero">
  <div class="container">
    <div class="row align-items-end">
      <div class="col-lg-7 pb-5">
        <span class="badge mb-3 px-3 py-2" style="background:rgba(255,255,255,.12);color:#93c5fd;font-size:.78rem;">
          <i class="bi <?= $icon ?> me-1"></i><?= $tag ?>
        </span>
        <h1 class="display-5 mb-3"><?= $title ?></h1>
        <p class="lead mb-4"><?= $subtitle ?></p>
        <div class="d-flex gap-3 flex-wrap">
          <a href="<?= base_url('contact') ?>" class="btn btn-primary btn-lg px-5">Start Free Trial</a>
          <a href="<?= base_url('pricing') ?>" class="btn btn-outline-light btn-lg px-4">View Pricing</a>
        </div>
      </div>
      <div class="col-lg-5 d-none d-lg-block">
        <img src="<?= $hero_img ?>" class="uc-hero-img" alt="<?= $tag ?>">
      </div>
    </div>
  </div>
</section>

<!-- Challenges -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-5">
        <div class="badge mb-3 px-3 py-2" style="background:<?= $bg ?>;color:<?= $color ?>;font-size:.78rem;">Common Challenges</div>
        <h2 class="fw-800 mb-3" style="color:var(--navy);">Sound familiar?</h2>
        <p class="text-muted">These are the problems we hear most from <?= $tag ?>. ExamRankers was built to solve all of them.</p>
        <a href="<?= base_url('contact') ?>" class="btn btn-primary mt-3">Talk to Us →</a>
      </div>
      <div class="col-lg-7">
        <?php foreach($challenges as $c): ?>
        <div class="challenge-item">
          <i class="bi <?= $c[1] ?>" style="color:<?= $color ?>;"></i>
          <span class="text-muted" style="font-size:.9rem;"><?= $c[0] ?></span>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- Features -->
<section class="py-5">
  <div class="container">
    <div class="text-center mb-5">
      <div class="badge mb-2 px-3 py-2" style="background:<?= $bg ?>;color:<?= $color ?>;font-size:.78rem;">Built for <?= $tag ?></div>
      <h2 class="fw-800" style="color:var(--navy);">Everything you need. Nothing you don't.</h2>
    </div>
    <div class="row g-4">
      <?php foreach($features as $f): ?>
      <div class="col-md-6 col-lg-4">
        <div class="feat-card">
          <div class="feat-icon" style="background:<?= $bg ?>;color:<?= $color ?>;"><i class="bi <?= $f[0] ?>"></i></div>
          <h6 class="fw-700 mb-2" style="color:var(--navy);"><?= $f[1] ?></h6>
          <p class="text-muted mb-0" style="font-size:.87rem;"><?= $f[2] ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Stats -->
<section class="py-5" style="background:linear-gradient(135deg,<?= $color ?>,<?= $color ?>dd);">
  <div class="container">
    <div class="row g-3">
      <?php foreach($stats as $s): ?>
      <div class="col-6 col-lg-3">
        <div class="stat-box">
          <div class="num"><?= $s[0] ?></div>
          <div class="lbl"><?= $s[1] ?></div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Quote -->
<section class="py-5 bg-light">
  <div class="container" style="max-width:760px;">
    <div class="quote-card text-center">
      <i class="bi bi-quote fs-1 mb-3 d-block" style="color:<?= $color ?>;opacity:.4;"></i>
      <p class="fs-5 fst-italic text-muted mb-4">"<?= $quote ?>"</p>
      <strong style="color:var(--navy);"><?= $quote_by ?></strong>
    </div>
  </div>
</section>

<!-- Other use cases -->
<section class="py-5">
  <div class="container">
    <h5 class="fw-700 mb-4 text-center" style="color:var(--navy);">Explore other use cases</h5>
    <div class="row g-3 justify-content-center">
      <?php foreach($all_cases as $slug => $c):
        if($c['title'] === $title) continue; ?>
      <div class="col-md-4 col-lg-3">
        <a href="<?= base_url('use-cases/'.$slug) ?>" class="other-case" style="color:inherit;">
          <i class="bi <?= $c['icon'] ?> fs-5" style="color:<?= $c['color'] ?>;"></i>
          <span><?= $c['tag'] ?></span>
        </a>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="py-5 text-center" style="background:linear-gradient(135deg,var(--navy),#111b47);">
  <div class="container">
    <h2 class="fw-800 text-white mb-3">Ready to transform your <?= strtolower($tag) ?> assessments?</h2>
    <p class="mb-4" style="color:#94a3b8;">Book a free 30-minute demo. No commitment, no credit card.</p>
    <a href="<?= base_url('contact') ?>" class="btn btn-primary btn-lg px-5">Book a Free Demo</a>
  </div>
</section>
