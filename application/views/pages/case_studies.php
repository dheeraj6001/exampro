<style>
:root { --navy:#0b1437; --blue:#1a56db; --green:#16a34a; }
.page-hero { background:linear-gradient(135deg,var(--navy) 0%,#111b47 100%); padding:80px 0 60px; }
.page-hero h1 { color:#fff; font-weight:800; }
.page-hero p  { color:#94a3b8; }

.cs-card { border-radius:14px; border:1px solid #e2e8f0; overflow:hidden; background:#fff; transition:.2s; height:100%; }
.cs-card:hover { box-shadow:0 12px 40px rgba(0,0,0,.09); transform:translateY(-4px); }
.cs-card-img { height:200px; object-fit:cover; width:100%; }
.cs-tag { font-size:.72rem; font-weight:700; padding:3px 12px; border-radius:20px; }
.stat-row { background:linear-gradient(135deg,var(--navy),#111b47); border-radius:12px; padding:32px; }
.stat-item .num { font-size:2.2rem; font-weight:800; color:#fff; line-height:1; }
.stat-item .lbl { font-size:.8rem; color:#94a3b8; margin-top:4px; }

.quote-block { border-left:4px solid var(--blue); background:#f8faff; border-radius:0 12px 12px 0; padding:20px 24px; }
</style>

<!-- Hero -->
<section class="page-hero text-center">
  <div class="container">
    <div class="badge mb-3 px-3 py-2" style="background:rgba(26,86,219,.2);color:#93c5fd;font-size:.8rem;">Real Results · Real Organisations</div>
    <h1 class="display-5 mb-3">Customer Success Stories</h1>
    <p class="lead" style="max-width:580px;margin:0 auto;">See how 3,500+ institutions use ExamRankers to run faster, fairer, and more scalable assessments.</p>
  </div>
</section>

<!-- Stats bar -->
<section class="py-4" style="background:var(--blue);">
  <div class="container">
    <div class="row g-3 text-center text-white">
      <?php foreach([['3,500+','Organisations'],['10M+','Exams Conducted'],['50M+','Candidates Served'],['99.9%','Avg. Uptime']] as $s): ?>
      <div class="col-6 col-md-3">
        <div class="fw-800" style="font-size:1.8rem;"><?= $s[0] ?></div>
        <div style="font-size:.8rem;opacity:.8;"><?= $s[1] ?></div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Featured case study -->
<section class="py-5">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-6">
        <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?w=800&q=80" class="img-fluid rounded-3 shadow" alt="TopRanker">
      </div>
      <div class="col-lg-6">
        <span class="badge mb-3 px-3 py-2" style="background:#eff6ff;color:var(--blue);font-size:.78rem;">FEATURED · COACHING INSTITUTE</span>
        <h2 class="fw-800 mb-3" style="color:var(--navy);">How TopRanker Coaching ran 50,000 JEE mock tests with zero downtime</h2>
        <p class="text-muted mb-4">India's largest online JEE preparation programme needed to run full-length mock tests for 50,000 students simultaneously. Their home-built system crashed at 8,000 users. ExamRankers changed everything.</p>
        <div class="row g-3 mb-4">
          <?php foreach([['78%','Reduction in eval time'],['2 min','Result publication time'],['94%','Drop in tech complaints'],['40%','Cut in time-to-hire']] as $s): ?>
          <div class="col-6">
            <div class="stat-row text-center py-3">
              <div class="num"><?= $s[0] ?></div>
              <div class="lbl"><?= $s[1] ?></div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
        <div class="quote-block mb-4">
          <p class="mb-1 fst-italic text-muted">"JEE mock tests for 50,000 students with zero downtime. Rank lists published within seconds of exam end. Rock solid."</p>
          <strong style="font-size:.85rem;color:var(--navy);">Priya Nair</strong> <span class="text-muted small">· Director, EduVision Academy</span>
        </div>
        <a href="<?= base_url('contact') ?>" class="btn btn-primary px-4">Get Similar Results →</a>
      </div>
    </div>
  </div>
</section>

<!-- Case study cards -->
<section class="py-5 bg-light">
  <div class="container">
    <h2 class="fw-800 text-center mb-2" style="color:var(--navy);">More Success Stories</h2>
    <p class="text-center text-muted mb-5">Across education, enterprise, and government sectors.</p>
    <div class="row g-4">

      <?php $cases = [
        [
          'img'   => 'https://images.unsplash.com/photo-1606326608606-aa0b62935f2b?w=600&q=80',
          'tag'   => 'University',
          'color' => '#eff6ff',
          'tc'    => 'var(--blue)',
          'title' => 'NIT Surat cuts evaluation time by 78% with auto-marking',
          'org'   => 'NIT Surat',
          'desc'  => 'The Controller of Exams faced a growing backlog of end-semester scripts. Auto-marking deployment reduced faculty workload by 200+ hours per semester while improving consistency.',
          'stats' => [['200+','Faculty hours saved/semester'],['78%','Eval time reduction'],['0','Student grievances re: marking']],
          'quote' => 'The auto-marking engine is clean, fast, and the faculty trust it.',
          'name'  => 'Dr. Rajesh Sharma · Controller of Exams',
        ],
        [
          'img'   => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=600&q=80',
          'tag'   => 'Corporate L&D',
          'color' => '#f0fdf4',
          'tc'    => 'var(--green)',
          'title' => 'GlobalEdge cuts time-to-hire by 40% with aptitude screening',
          'org'   => 'GlobalEdge Technologies',
          'desc'  => 'GlobalEdge\'s HR team was drowning in 2,000+ applications per week. Online aptitude tests with auto-scoring reduced screening time from 3 weeks to 4 days.',
          'stats' => [['40%','Faster time-to-hire'],['2,000+','Applicants screened/week'],['94%','Reduction in manual screening']],
          'quote' => 'HR team screens 2,000+ applicants a week. Time-to-hire cut by 40%.',
          'name'  => 'Mohit Agarwal · Talent Head, GlobalEdge',
        ],
        [
          'img'   => 'https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=600&q=80',
          'tag'   => 'Certification Body',
          'color' => '#faf5ff',
          'tc'    => '#7c3aed',
          'title' => 'SkillBridge replaces paper-based certification with digital blind marking',
          'org'   => 'SkillBridge',
          'desc'  => 'Blind marking with double moderation replaced months of paper handling. The audit trail now satisfies their external accreditation requirements without any additional documentation.',
          'stats' => [['3 months','Admin work eliminated'],['100%','Audit-ready documentation'],['2x','Moderation throughput']],
          'quote' => 'Blind marking with double moderation replaced months of manual paper handling.',
          'name'  => 'Amit Verma · Head of Certification, SkillBridge',
        ],
        [
          'img'   => 'https://images.unsplash.com/photo-1588072432836-e10032774350?w=600&q=80',
          'tag'   => 'Coaching Institute',
          'color' => '#fff7ed',
          'tc'    => '#ea580c',
          'title' => 'TopRanker Coaching goes white-label — students see their brand everywhere',
          'org'   => 'TopRanker Coaching',
          'desc'  => 'White-label portal with custom domain deployed in under 4 hours. Parents and students now associate the polished exam experience directly with the TopRanker brand.',
          'stats' => [['4 hrs','White-label setup time'],['31%','Rise in parent satisfaction'],['Zero','ExamRankers branding visible']],
          'quote' => 'White-label feature is fantastic. Works exactly as configured.',
          'name'  => 'Sunita Gupta · CEO, TopRanker Coaching',
        ],
        [
          'img'   => 'https://images.unsplash.com/photo-1589330273594-fade1ee91647?w=600&q=80',
          'tag'   => 'School / College',
          'color' => '#fdf2f8',
          'tc'    => '#be185d',
          'title' => 'Greenfield College goes paperless in 2 weeks — auto certificates delight students',
          'org'   => 'Greenfield College',
          'desc'  => 'What used to take 3 weeks of printing, signing, and dispatching now happens in 60 seconds. QR-verified digital certificates have become a talking point for prospective students.',
          'stats' => [['3 weeks → 60s','Certificate turnaround'],['4,000','Certificates issued per cycle'],['Zero','Forgery incidents']],
          'quote' => 'Auto certificates with QR verification have impressed students and employers.',
          'name'  => 'Kavitha Rajan · Principal, Greenfield College',
        ],
        [
          'img'   => 'https://images.unsplash.com/photo-1501504905252-473c47e087f8?w=600&q=80',
          'tag'   => 'EdTech Platform',
          'color' => '#eff6ff',
          'tc'    => 'var(--blue)',
          'title' => 'EduVision scales to 1 lakh online learners with ExamRankers infrastructure',
          'org'   => 'EduVision Academy',
          'desc'  => 'EduVision needed a platform that could handle spiky demand around competitive exam seasons. Auto-scaling infrastructure and offline sync solved their rural connectivity challenge.',
          'stats' => [['1 lakh+','Learners on platform'],['99.97%','Uptime during peak'],['60%','Rural candidates via offline mode']],
          'quote' => 'Zero downtime, instant results. The platform never lets us down.',
          'name'  => 'Priya Nair · Director, EduVision Academy',
        ],
      ]; foreach($cases as $c): ?>

      <div class="col-md-6 col-lg-4">
        <div class="cs-card">
          <img src="<?= $c['img'] ?>" class="cs-card-img" alt="">
          <div class="p-4">
            <span class="cs-tag mb-3 d-inline-block" style="background:<?= $c['color'] ?>;color:<?= $c['tc'] ?>;"><?= $c['tag'] ?></span>
            <h5 class="fw-700 mb-2" style="color:var(--navy);font-size:.95rem;line-height:1.4;"><?= $c['title'] ?></h5>
            <p class="text-muted small mb-3"><?= $c['desc'] ?></p>
            <div class="row g-2 mb-3">
              <?php foreach($c['stats'] as $s): ?>
              <div class="col-4 text-center">
                <div class="fw-800 text-primary" style="font-size:.95rem;line-height:1.1;"><?= $s[0] ?></div>
                <div class="text-muted" style="font-size:.66rem;line-height:1.3;"><?= $s[1] ?></div>
              </div>
              <?php endforeach; ?>
            </div>
            <div class="quote-block">
              <p class="mb-1 fst-italic" style="font-size:.8rem;color:#475569;">"<?= $c['quote'] ?>"</p>
              <span style="font-size:.74rem;color:var(--navy);font-weight:600;"><?= $c['name'] ?></span>
            </div>
          </div>
        </div>
      </div>

      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="py-5 text-center" style="background:linear-gradient(135deg,var(--navy),#111b47);">
  <div class="container">
    <h2 class="fw-800 text-white mb-3">Your organisation could be next</h2>
    <p class="mb-4" style="color:#94a3b8;">Talk to our team and see how ExamRankers fits your specific use case.</p>
    <div class="d-flex justify-content-center gap-3 flex-wrap">
      <a href="<?= base_url('contact') ?>" class="btn btn-primary btn-lg px-5">Book a Free Demo</a>
      <a href="<?= base_url('pricing') ?>" class="btn btn-outline-light btn-lg px-5">View Pricing</a>
    </div>
  </div>
</section>
