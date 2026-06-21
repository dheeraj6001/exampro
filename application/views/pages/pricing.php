<style>
:root { --navy:#0b1437; --blue:#1a56db; --green:#16a34a; }
.page-hero { background:linear-gradient(135deg,var(--navy) 0%,#111b47 100%); padding:80px 0 60px; }
.page-hero h1 { color:#fff; font-weight:800; }
.page-hero p { color:#94a3b8; }

.plan-card { border-radius:16px; border:2px solid #e2e8f0; padding:36px 32px; height:100%; transition:.2s; position:relative; background:#fff; }
.plan-card:hover { border-color:var(--blue); box-shadow:0 12px 40px rgba(26,86,219,.10); transform:translateY(-4px); }
.plan-card.popular { border-color:var(--blue); }
.popular-badge { position:absolute; top:-14px; left:50%; transform:translateX(-50%); background:var(--blue); color:#fff; font-size:.72rem; font-weight:700; padding:4px 18px; border-radius:20px; white-space:nowrap; }
.plan-price { font-size:2.8rem; font-weight:800; color:var(--navy); line-height:1; }
.plan-price sup { font-size:1.1rem; font-weight:600; vertical-align:super; }
.plan-price sub { font-size:.9rem; font-weight:400; color:#64748b; }
.plan-feature { padding:7px 0; border-bottom:1px solid #f1f5f9; font-size:.88rem; display:flex; align-items:center; gap:10px; color:#374151; }
.plan-feature:last-child { border-bottom:none; }
.plan-feature i.bi-check-circle-fill { color:var(--green); }
.plan-feature i.bi-x-circle-fill { color:#cbd5e1; }

.compare-tbl th { background:#f8fafc; font-size:.8rem; text-transform:uppercase; letter-spacing:.5px; color:#64748b; }
.compare-tbl td, .compare-tbl th { padding:14px 20px; vertical-align:middle; }
.compare-tbl .cat-row td { background:#f1f5f9; font-weight:700; font-size:.82rem; color:var(--navy); }
.chk { color:var(--green); font-size:1.1rem; }
.crs { color:#cbd5e1; font-size:1.1rem; }

.faq-q { font-weight:600; color:var(--navy); }
</style>

<!-- Hero -->
<section class="page-hero text-center">
  <div class="container">
    <div class="badge mb-3 px-3 py-2" style="background:rgba(26,86,219,.2);color:#93c5fd;font-size:.8rem;">Simple, Transparent Pricing</div>
    <h1 class="display-5 fw-800 mb-3">Plans for every organisation</h1>
    <p class="lead mb-4" style="max-width:560px;margin:0 auto;">Start free for 30 days. No credit card required. Upgrade or cancel anytime.</p>
    <div class="d-flex justify-content-center gap-2 flex-wrap">
      <button class="btn btn-sm btn-primary active" id="btn-annual" onclick="toggleBilling('annual')">Annual <span class="badge bg-warning text-dark ms-1">Save 20%</span></button>
      <button class="btn btn-sm btn-outline-light" id="btn-monthly" onclick="toggleBilling('monthly')">Monthly</button>
    </div>
  </div>
</section>

<!-- Plans -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="row g-4 justify-content-center">

      <!-- Starter -->
      <div class="col-md-6 col-lg-4">
        <div class="plan-card">
          <p class="text-muted small fw-semibold text-uppercase mb-1" style="letter-spacing:1px;">Starter</p>
          <div class="plan-price mb-1"><sup>₹</sup><span class="annual-price">2,399</span><span class="monthly-price d-none">2,999</span><sub>/mo</sub></div>
          <p class="text-muted small mb-4">Billed <span class="annual-label">annually</span><span class="monthly-label d-none">monthly</span></p>
          <a href="<?= base_url('contact') ?>" class="btn btn-outline-primary w-100 mb-4">Start Free Trial</a>
          <div>
            <?php foreach([
              ['check','Up to 500 candidates/month'],
              ['check','5 simultaneous exams'],
              ['check','MCQ & descriptive questions'],
              ['check','Auto-marking engine'],
              ['check','Basic analytics dashboard'],
              ['check','Email support (48h SLA)'],
              ['check','Branded exam portal'],
              ['x','AI proctoring'],
              ['x','Custom domain (white-label)'],
              ['x','API access'],
            ] as $f): ?>
              <div class="plan-feature">
                <i class="bi bi-<?= $f[0]==='check'?'check-circle-fill':'x-circle-fill' ?>"></i><?= $f[1] ?>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

      <!-- Professional -->
      <div class="col-md-6 col-lg-4">
        <div class="plan-card popular">
          <div class="popular-badge">Most Popular</div>
          <p class="text-muted small fw-semibold text-uppercase mb-1" style="letter-spacing:1px;">Professional</p>
          <div class="plan-price mb-1" style="color:var(--blue);"><sup>₹</sup><span class="annual-price">6,399</span><span class="monthly-price d-none">7,999</span><sub>/mo</sub></div>
          <p class="text-muted small mb-4">Billed <span class="annual-label">annually</span><span class="monthly-label d-none">monthly</span></p>
          <a href="<?= base_url('contact') ?>" class="btn btn-primary w-100 mb-4">Start Free Trial</a>
          <div>
            <?php foreach([
              ['check','Up to 5,000 candidates/month'],
              ['check','Unlimited simultaneous exams'],
              ['check','All question types incl. coding'],
              ['check','AI auto-marking + manual panel'],
              ['check','Advanced analytics & rank lists'],
              ['check','Priority support (4h SLA)'],
              ['check','White-label portal'],
              ['check','AI proctoring (10 flags/exam)'],
              ['check','Custom domain & SSL'],
              ['check','API access'],
            ] as $f): ?>
              <div class="plan-feature">
                <i class="bi bi-<?= $f[0]==='check'?'check-circle-fill':'x-circle-fill' ?>"></i><?= $f[1] ?>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

      <!-- Enterprise -->
      <div class="col-md-6 col-lg-4">
        <div class="plan-card">
          <p class="text-muted small fw-semibold text-uppercase mb-1" style="letter-spacing:1px;">Enterprise</p>
          <div class="plan-price mb-1">Custom</div>
          <p class="text-muted small mb-4">Volume pricing · Dedicated SLA</p>
          <a href="<?= base_url('contact') ?>" class="btn btn-dark w-100 mb-4">Talk to Sales</a>
          <div>
            <?php foreach([
              ['check','Unlimited candidates'],
              ['check','Dedicated cloud infrastructure'],
              ['check','All Professional features'],
              ['check','Full AI proctoring suite'],
              ['check','Blind marking & moderation'],
              ['check','SSO / SAML integration'],
              ['check','Custom SLA (99.99% uptime)'],
              ['check','Onsite training & onboarding'],
              ['check','Dedicated account manager'],
              ['check','Custom integrations & API'],
            ] as $f): ?>
              <div class="plan-feature">
                <i class="bi bi-check-circle-fill"></i><?= $f[1] ?>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

    </div>

    <!-- Trust line -->
    <div class="text-center mt-5">
      <p class="text-muted small">All plans include a <strong>30-day free trial</strong> · No credit card required · Cancel anytime</p>
      <div class="d-flex justify-content-center gap-3 flex-wrap mt-3">
        <span class="badge py-2 px-3 bg-white border text-muted"><i class="bi bi-shield-check text-success me-1"></i>ISO 27001</span>
        <span class="badge py-2 px-3 bg-white border text-muted"><i class="bi bi-lock text-success me-1"></i>SOC 2 Type II</span>
        <span class="badge py-2 px-3 bg-white border text-muted"><i class="bi bi-cloud-check text-success me-1"></i>99.9% Uptime</span>
        <span class="badge py-2 px-3 bg-white border text-muted"><i class="bi bi-headset text-success me-1"></i>Live Support</span>
      </div>
    </div>
  </div>
</section>

<!-- Feature Comparison Table -->
<section class="py-5">
  <div class="container">
    <h2 class="fw-800 text-center mb-2" style="color:var(--navy);">Full Feature Comparison</h2>
    <p class="text-center text-muted mb-5">See exactly what is included in each plan.</p>
    <div class="table-responsive rounded-3 border">
      <table class="table compare-tbl mb-0">
        <thead>
          <tr>
            <th style="width:40%">Feature</th>
            <th class="text-center">Starter</th>
            <th class="text-center" style="background:#eff6ff;">Professional</th>
            <th class="text-center">Enterprise</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $rows = [
            ['__cat' => 'Exam Delivery'],
            ['Candidate limit/month','500','5,000','Unlimited'],
            ['Simultaneous exams','5','Unlimited','Unlimited'],
            ['Offline exam mode','✗','✓','✓'],
            ['Mobile-responsive exams','✓','✓','✓'],
            ['Section-wise timing','✓','✓','✓'],
            ['__cat' => 'Question Types'],
            ['MCQ & True/False','✓','✓','✓'],
            ['Fill in the blank','✓','✓','✓'],
            ['Descriptive / essay','✓','✓','✓'],
            ['Match the following','✓','✓','✓'],
            ['Coding questions','✗','✓','✓'],
            ['__cat' => 'Marking & Evaluation'],
            ['Auto-marking (MCQ)','✓','✓','✓'],
            ['AI descriptive marking','✗','✓','✓'],
            ['Manual marking panel','✓','✓','✓'],
            ['Blind marking','✗','✗','✓'],
            ['Double moderation','✗','✗','✓'],
            ['Partial credit & negative marking','✓','✓','✓'],
            ['__cat' => 'Analytics & Reports'],
            ['Basic score reports','✓','✓','✓'],
            ['Advanced rank analytics','✗','✓','✓'],
            ['Topic-wise performance','✗','✓','✓'],
            ['Cohort & trend analysis','✗','✗','✓'],
            ['Data export (CSV/Excel/PDF)','✓','✓','✓'],
            ['__cat' => 'Security & Proctoring'],
            ['Browser lockdown','✓','✓','✓'],
            ['Copy-paste prevention','✓','✓','✓'],
            ['AI proctoring (flags)','✗','10/exam','Unlimited'],
            ['Live video proctoring','✗','✗','✓'],
            ['Audit trail & logs','✓','✓','✓'],
            ['__cat' => 'Branding & Integration'],
            ['Branded exam portal','✓','✓','✓'],
            ['Custom domain (white-label)','✗','✓','✓'],
            ['Custom email templates','✗','✓','✓'],
            ['REST API access','✗','✓','✓'],
            ['SSO / SAML','✗','✗','✓'],
            ['__cat' => 'Support'],
            ['Email support','48h','4h','1h'],
            ['Phone / chat support','✗','✓','✓'],
            ['Dedicated account manager','✗','✗','✓'],
            ['Onboarding & training','Self-serve','Guided','Onsite'],
          ];
          foreach($rows as $r):
            if(isset($r['__cat'])): ?>
              <tr class="cat-row"><td colspan="4"><?= $r['__cat'] ?></td></tr>
            <?php else:
              $cols = array_values($r); ?>
              <tr>
                <td class="text-muted" style="font-size:.87rem;"><?= $cols[0] ?></td>
                <?php for($i=1;$i<=3;$i++): $v=$cols[$i]; ?>
                  <td class="text-center <?= $i===2?'bg-light':'' ?>">
                    <?php if($v==='✓') echo '<i class="bi bi-check-circle-fill chk"></i>';
                    elseif($v==='✗') echo '<i class="bi bi-x-circle-fill crs"></i>';
                    else echo '<span style="font-size:.82rem;">'.$v.'</span>'; ?>
                  </td>
                <?php endfor; ?>
              </tr>
            <?php endif;
          endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>

<!-- FAQ -->
<section class="py-5 bg-light">
  <div class="container" style="max-width:760px;">
    <h2 class="fw-800 text-center mb-5" style="color:var(--navy);">Pricing FAQs</h2>
    <div class="accordion" id="pricingFaq">
      <?php $faqs = [
        ['What counts as a "candidate"?','A candidate is any individual who sits an exam in a given calendar month. If the same person takes 3 exams in one month, they count as 1 candidate. Unused candidates do not roll over.'],
        ['Can I switch plans mid-month?','Yes. Upgrades take effect immediately and are prorated. Downgrades apply from the next billing cycle.'],
        ['Is there a setup fee?','No. All plans are subscription-only with no setup, onboarding, or hidden fees.'],
        ['Do you offer discounts for schools and NGOs?','Yes — educational institutions and registered non-profits receive a 30% discount. Contact our team with your registration details.'],
        ['What payment methods do you accept?','We accept credit/debit cards, net banking, UPI, and bank transfer for annual plans. All payments are processed securely via Razorpay.'],
        ['What happens after my 30-day trial?','You will receive a reminder 7 days and 1 day before your trial ends. After the trial, your account is paused — no data is deleted. You can upgrade anytime to reactivate.'],
      ]; foreach($faqs as $i=>$f): ?>
      <div class="accordion-item border-0 mb-2 rounded-3 overflow-hidden shadow-sm">
        <h2 class="accordion-header">
          <button class="accordion-button <?= $i>0?'collapsed':'' ?> faq-q" type="button" data-bs-toggle="collapse" data-bs-target="#pf<?= $i ?>">
            <?= $f[0] ?>
          </button>
        </h2>
        <div id="pf<?= $i ?>" class="accordion-collapse collapse <?= $i===0?'show':'' ?>" data-bs-parent="#pricingFaq">
          <div class="accordion-body text-muted" style="font-size:.9rem;"><?= $f[1] ?></div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="py-5 text-center" style="background:linear-gradient(135deg,var(--navy),#111b47);">
  <div class="container">
    <h2 class="fw-800 text-white mb-3">Ready to get started?</h2>
    <p class="text-muted mb-4" style="color:#94a3b8!important;">Join 3,500+ organisations already running smarter exams.</p>
    <div class="d-flex justify-content-center gap-3 flex-wrap">
      <a href="<?= base_url('contact') ?>" class="btn btn-primary btn-lg px-5">Start Free Trial</a>
      <a href="<?= base_url('contact') ?>" class="btn btn-outline-light btn-lg px-5">Talk to Sales</a>
    </div>
  </div>
</section>

<script>
function toggleBilling(type) {
  const isAnnual = type === 'annual';
  document.querySelectorAll('.annual-price').forEach(e => e.classList.toggle('d-none', !isAnnual));
  document.querySelectorAll('.monthly-price').forEach(e => e.classList.toggle('d-none', isAnnual));
  document.querySelectorAll('.annual-label').forEach(e => e.classList.toggle('d-none', !isAnnual));
  document.querySelectorAll('.monthly-label').forEach(e => e.classList.toggle('d-none', isAnnual));
  document.getElementById('btn-annual').classList.toggle('btn-primary', isAnnual);
  document.getElementById('btn-annual').classList.toggle('btn-outline-light', !isAnnual);
  document.getElementById('btn-monthly').classList.toggle('btn-primary', !isAnnual);
  document.getElementById('btn-monthly').classList.toggle('btn-outline-light', isAnnual);
}
</script>
