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
            <div class="text-muted small">info@examrankers.com</div>
            <div class="text-muted small">support@examrankers.com</div>
          </div>
        </div>
        <div class="d-flex gap-3 mb-4 p-3 rounded-3 border">
          <div class="feature-icon icon-green mb-0 flex-shrink-0"><i class="bi bi-telephone text-success fs-5"></i></div>
          <div>
            <div class="fw-semibold small">Call Us</div>
            <div class="text-muted small">+91 8874 954655 (Sales)</div>
            <div class="text-muted small">+91 8874 954655 (Support)</div>
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
            <span class="client-logo" style="font-size:.72rem;padding:4px 12px;">JEE ACADEMY</span>
          </div>
        </div>
      </div>

      <!-- FORM -->
      <div class="col-lg-8">
        <div class="card border-0 shadow p-4 p-md-5">
          <h4 class="fw-bold mb-1">Book Your Free Demo</h4>
          <p class="text-muted small mb-4">Complete the form below and one of our experts will reach out within 30 minutes.</p>

          <!-- Feedback messages -->
          <div id="form-success" class="alert alert-success d-flex align-items-center gap-2" style="display:none !important;">
            <i class="bi bi-check-circle-fill fs-5"></i>
            <span><strong>Thank you!</strong> We've received your enquiry and will contact you within 30 minutes.</span>
          </div>
          <div id="form-error" class="alert alert-danger d-flex align-items-center gap-2" style="display:none !important;">
            <i class="bi bi-exclamation-triangle-fill fs-5"></i>
            <span id="form-error-msg">Something went wrong. Please try again.</span>
          </div>

          <form id="contact-form" novalidate>

            <div class="row g-3 mb-3">
              <div class="col-sm-6">
                <label class="form-label fw-semibold small">First Name <span class="text-danger">*</span></label>
                <input type="text" name="first_name" id="first_name" class="form-control" required placeholder="First Name">
              </div>
              <div class="col-sm-6">
                <label class="form-label fw-semibold small">Last Name <span class="text-danger">*</span></label>
                <input type="text" name="last_name" id="last_name" class="form-control" required placeholder="Last Name">
              </div>
            </div>

            <div class="row g-3 mb-3">
              <div class="col-sm-6">
                <label class="form-label fw-semibold small">Work Email <span class="text-danger">*</span></label>
                <input type="email" name="email" id="email" class="form-control" required placeholder="user@gmail.com">
              </div>
              <div class="col-sm-6">
                <label class="form-label fw-semibold small">Phone Number <span class="text-danger">*</span></label>
                <input type="tel" name="phone" id="phone" class="form-control" required placeholder="+91 98765 43210">
              </div>
            </div>

            <div class="row g-3 mb-3">
              <div class="col-sm-6">
                <label class="form-label fw-semibold small">Organisation Name <span class="text-danger">*</span></label>
                <input type="text" name="org" id="org" class="form-control" required placeholder="JEE Academy">
              </div>
              <div class="col-sm-6">
                <label class="form-label fw-semibold small">Organisation Type</label>
                <select name="org_type" id="org_type" class="form-select">
                  <option value="">— Select —</option>
                  <option value="coaching">Coaching Institute</option>
                  <option value="university">University / College</option>
                  <option value="corporate">Corporate / Enterprise</option>
                  <option value="government">Government / PSU</option>
                  <option value="school">School</option>
                  <option value="other">Other</option>
                </select>
              </div>
            </div>

            <div class="mb-3">
              <label class="form-label fw-semibold small">How many candidates do you plan to assess per exam?</label>
              <select name="service" id="service" class="form-select">
                <option value="">— Select —</option>
                <option value="u100">Up to 100</option>
                <option value="u1000">100 – 1,000</option>
                <option value="u10k">1,000 – 10,000</option>
                <option value="o10k">10,000+</option>
              </select>
            </div>

            <div class="mb-4">
              <label class="form-label fw-semibold small">Message / Requirements</label>
              <textarea name="message" id="message" class="form-control" rows="4"
                        placeholder="Tell us about your exam requirements, timeline, or any specific features you need..."></textarea>
            </div>

            <button type="submit" id="submit-btn" class="btn btn-primary btn-lg w-100 fw-semibold">
              <span id="btn-text"><i class="bi bi-calendar-check me-2"></i>Request Free Demo</span>
              <span id="btn-loading" style="display:none;">
                <span class="spinner-border spinner-border-sm me-2" role="status"></span>Submitting…
              </span>
            </button>
            <p class="text-center text-muted small mt-3 mb-0">
              <i class="bi bi-lock me-1"></i>Your information is secure and will never be shared.
            </p>

          </form>

          <script>
          const BASE_API = 'https://api.psofts.com';

          document.getElementById('contact-form').addEventListener('submit', async function(e) {
            e.preventDefault();
            const form = this;

            const successEl = document.getElementById('form-success');
            const errorEl   = document.getElementById('form-error');
            const errorMsg  = document.getElementById('form-error-msg');
            const btnText   = document.getElementById('btn-text');
            const btnLoad   = document.getElementById('btn-loading');
            const submitBtn = document.getElementById('submit-btn');

            // Hide previous feedback
            successEl.style.display = 'none';
            errorEl.style.display   = 'none';

            // Basic required-field check
            const required = ['first_name', 'last_name', 'email', 'phone', 'org'];
            for (const id of required) {
              const el = document.getElementById(id);
              if (!el.value.trim()) {
                el.focus();
                el.classList.add('is-invalid');
                return;
              }
              el.classList.remove('is-invalid');
            }

            // Loading state
            btnText.style.display = 'none';
            btnLoad.style.display = '';
            submitBtn.disabled    = true;

            const formData = {
              name:           document.getElementById('first_name').value.trim() + ' ' + document.getElementById('last_name').value.trim(),
              firstName:      document.getElementById('first_name').value.trim(),
              lastName:       document.getElementById('last_name').value.trim(),
              email:          document.getElementById('email').value.trim(),
              phone:          document.getElementById('phone').value.trim(),
              orgName:        document.getElementById('org').value.trim(),
              orgType:        document.getElementById('org_type').value,
              candidateRange: document.getElementById('service').value,
              message:        document.getElementById('message').value.trim(),
            };

            try {
              const response = await fetch(BASE_API + '/public/enquiry/examappenquiry', {
                method:  'POST',
                headers: {
                  'Content-Type':   'application/json',
                  'x-tenant-domain': 'examrankers.com',
                },
                body: JSON.stringify(formData),
              });

              if (response.ok) {
                successEl.style.display = '';
                form.reset();
                successEl.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
              } else {
                const result = await response.json().catch(() => ({}));
                errorMsg.textContent = result.message || 'Submission failed. Please try again.';
                errorEl.style.display = '';
                errorEl.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
              }
            } catch (error) {
              errorMsg.textContent = 'Network error: ' + error.message;
              errorEl.style.display = '';
              errorEl.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            } finally {
              btnText.style.display = '';
              btnLoad.style.display = 'none';
              submitBtn.disabled    = false;
            }
          });
          </script>
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
