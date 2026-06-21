<!-- PAGE HEADER -->
<div class="page-hero text-white py-5 text-center">
  <div class="container py-3">
    <span class="hero-badge mb-3 d-inline-block">Get in Touch</span>
    <h1 class="fw-bold display-5 mt-3 mb-2">Request a Free Demo</h1>
    <p style="opacity:.75;font-size:1.05rem;">Fill in the form — our team responds within 30 minutes during business hours.</p>
    <nav aria-label="breadcrumb" class="d-flex justify-content-center mt-3">
      <ol class="breadcrumb mb-0" style="background:transparent;">
        <li class="breadcrumb-item"><a href="<?= base_url() ?>" class="text-white opacity-75">Home</a></li>
        <li class="breadcrumb-item active text-white">Contact</li>
      </ol>
    </nav>
  </div>
</div>

<!-- CONTACT -->
<section class="py-5">
  <div class="container">
    <div class="row g-5 align-items-start">

      <!-- INFO -->
      <div class="col-lg-4">
        <div class="mb-4">
          <span class="section-label">Why Request a Demo?</span>
          <h2 class="section-title mt-1 mb-3">See the Full Platform in 20 Minutes</h2>
          <p class="text-muted">Our solution experts will walk you through the features most relevant to your use case — exam creation, proctoring, analytics, and more.</p>
        </div>

        <div class="d-flex gap-3 mb-4 p-3 rounded-3 border">
          <div class="feature-icon icon-blue mb-0 flex-shrink-0"><i class="bi bi-envelope text-primary fs-5"></i></div>
          <div>
            <div class="fw-semibold small">Email Us</div>
            <div class="text-muted small">sales@examflow.com</div>
            <div class="text-muted small">support@examflow.com</div>
          </div>
        </div>
        <div class="d-flex gap-3 mb-4 p-3 rounded-3 border">
          <div class="feature-icon icon-green mb-0 flex-shrink-0"><i class="bi bi-telephone text-success fs-5"></i></div>
          <div>
            <div class="fw-semibold small">Call Us</div>
            <div class="text-muted small">+91 98765 43210 (Sales)</div>
            <div class="text-muted small">+91 98765 43211 (Support)</div>
          </div>
        </div>
        <div class="d-flex gap-3 mb-4 p-3 rounded-3 border">
          <div class="feature-icon icon-cyan mb-0 flex-shrink-0"><i class="bi bi-clock text-info fs-5"></i></div>
          <div>
            <div class="fw-semibold small">Working Hours</div>
            <div class="text-muted small">Mon–Sat: 9 AM – 7 PM IST</div>
            <div class="text-muted small">Enterprise: 24×7 support</div>
          </div>
        </div>

        <div class="card border-0 shadow-sm p-3" style="background:var(--light);">
          <div class="fw-bold small mb-2"><i class="bi bi-star-fill text-warning me-2"></i>Trusted by 3,500+ Organisations</div>
          <div class="d-flex flex-wrap gap-2 mt-2">
            <span class="client-logo" style="font-size:.72rem;padding:4px 12px;">ICAI</span>
            <span class="client-logo" style="font-size:.72rem;padding:4px 12px;">NASSCOM</span>
            <span class="client-logo" style="font-size:.72rem;padding:4px 12px;">FSSAI</span>
            <span class="client-logo" style="font-size:.72rem;padding:4px 12px;">KD Campus</span>
          </div>
        </div>
      </div>

      <!-- FORM -->
      <div class="col-lg-8">
        <div class="card border-0 shadow p-4 p-md-5">
          <h4 class="fw-bold mb-1">Book Your Free Demo</h4>
          <p class="text-muted small mb-4">Complete the form below and one of our experts will reach out within 30 minutes.</p>

          <?php if (isset($success)): ?>
            <div class="alert alert-success d-flex align-items-center gap-2">
              <i class="bi bi-check-circle-fill fs-5"></i>
              <span><strong>Thank you!</strong> We've received your request and will contact you shortly.</span>
            </div>
          <?php endif; ?>
          <?php if (isset($error)): ?>
            <div class="alert alert-danger d-flex align-items-center gap-2">
              <i class="bi bi-exclamation-triangle-fill fs-5"></i>
              <span><?= htmlspecialchars($error) ?></span>
            </div>
          <?php endif; ?>

          <?= form_open('contact/send') ?>

            <div class="row g-3 mb-3">
              <div class="col-sm-6">
                <label class="form-label fw-semibold small">First Name <span class="text-danger">*</span></label>
                <input type="text" name="first_name" class="form-control" required
                       value="<?= set_value('first_name') ?>" placeholder="Arjun">
              </div>
              <div class="col-sm-6">
                <label class="form-label fw-semibold small">Last Name <span class="text-danger">*</span></label>
                <input type="text" name="last_name" class="form-control" required
                       value="<?= set_value('last_name') ?>" placeholder="Mehta">
              </div>
            </div>

            <div class="row g-3 mb-3">
              <div class="col-sm-6">
                <label class="form-label fw-semibold small">Work Email <span class="text-danger">*</span></label>
                <input type="email" name="email" class="form-control" required
                       value="<?= set_value('email') ?>" placeholder="arjun@yourorg.com">
              </div>
              <div class="col-sm-6">
                <label class="form-label fw-semibold small">Phone Number <span class="text-danger">*</span></label>
                <input type="tel" name="phone" class="form-control" required
                       value="<?= set_value('phone') ?>" placeholder="+91 98765 43210">
              </div>
            </div>

            <div class="row g-3 mb-3">
              <div class="col-sm-6">
                <label class="form-label fw-semibold small">Organisation Name <span class="text-danger">*</span></label>
                <input type="text" name="org" class="form-control" required
                       value="<?= set_value('org') ?>" placeholder="EduVision Academy">
              </div>
              <div class="col-sm-6">
                <label class="form-label fw-semibold small">Organisation Type</label>
                <select name="org_type" class="form-select">
                  <option value="">— Select —</option>
                  <option value="coaching" <?= set_select('org_type','coaching') ?>>Coaching Institute</option>
                  <option value="university" <?= set_select('org_type','university') ?>>University / College</option>
                  <option value="corporate" <?= set_select('org_type','corporate') ?>>Corporate / Enterprise</option>
                  <option value="government" <?= set_select('org_type','government') ?>>Government / PSU</option>
                  <option value="school" <?= set_select('org_type','school') ?>>School</option>
                  <option value="other" <?= set_select('org_type','other') ?>>Other</option>
                </select>
              </div>
            </div>

            <div class="mb-3">
              <label class="form-label fw-semibold small">How many candidates do you plan to assess per exam?</label>
              <select name="service" class="form-select">
                <option value="">— Select —</option>
                <option value="u100" <?= set_select('service','u100') ?>>Up to 100</option>
                <option value="u1000" <?= set_select('service','u1000') ?>>100 – 1,000</option>
                <option value="u10k" <?= set_select('service','u10k') ?>>1,000 – 10,000</option>
                <option value="o10k" <?= set_select('service','o10k') ?>>10,000+</option>
              </select>
            </div>

            <div class="mb-4">
              <label class="form-label fw-semibold small">Message / Requirements</label>
              <textarea name="message" class="form-control" rows="4"
                        placeholder="Tell us about your exam requirements, timeline, or any specific features you need..."><?= set_value('message') ?></textarea>
            </div>

            <button type="submit" class="btn btn-primary btn-lg w-100 fw-semibold">
              <i class="bi bi-calendar-check me-2"></i>Request Free Demo
            </button>
            <p class="text-center text-muted small mt-3 mb-0">
              <i class="bi bi-lock me-1"></i>Your information is secure and will never be shared.
            </p>

          <?= form_close() ?>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- FAQ -->
<section class="py-5" style="background:var(--light);">
  <div class="container">
    <div class="text-center mb-5">
      <span class="section-label">FAQ</span>
      <h2 class="section-title">Frequently Asked Questions</h2>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="accordion" id="faqAccordion">
          <?php
          $faqs = [
            ['Is there a free trial?', 'Yes — all plans come with a 30-day free trial, no credit card required. You can conduct up to 3 live exams with up to 50 candidates each during the trial.'],
            ['How quickly can we go live?', 'Most clients are up and running within 24 hours. Our onboarding team assists with setup, question import, and your first test run.'],
            ['Do you support offline exams?', 'Yes. Our offline mode allows candidates to take exams without a stable internet connection. Responses are synced automatically when connectivity is restored.'],
            ['Is the platform secure?', 'ExamRankers is ISO 27001 certified and SOC 2 Type II compliant. All data is encrypted in transit and at rest. We perform regular penetration tests.'],
            ['Can we use our own domain and branding?', 'Absolutely. All Professional and Enterprise plans include a white-label portal with your custom domain, logo, and brand colors.'],
          ];
          foreach ($faqs as $i => $faq):
          ?>
          <div class="accordion-item border mb-2 rounded-3 overflow-hidden">
            <h2 class="accordion-header">
              <button class="accordion-button <?= $i > 0 ? 'collapsed' : '' ?> fw-semibold" type="button"
                      data-bs-toggle="collapse" data-bs-target="#faq<?= $i ?>">
                <?= $faq[0] ?>
              </button>
            </h2>
            <div id="faq<?= $i ?>" class="accordion-collapse collapse <?= $i === 0 ? 'show' : '' ?>" data-bs-parent="#faqAccordion">
              <div class="accordion-body text-muted"><?= $faq[1] ?></div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>
