<style>
:root{--navy:#0b1437;--blue:#1a56db;}
.help-hero{background:linear-gradient(135deg,var(--navy),#111b47);padding:60px 0 40px;}
.cat-pill{display:inline-flex;align-items:center;gap:8px;padding:10px 20px;border-radius:30px;border:2px solid #e2e8f0;background:#fff;font-size:.85rem;font-weight:600;cursor:pointer;transition:.15s;text-decoration:none;color:#374151;}
.cat-pill:hover,.cat-pill.active{border-color:var(--blue);background:#eff6ff;color:var(--blue);}
.cat-pill i{font-size:1rem;}
.faq-section{display:none;}
.faq-section.active{display:block;}
.faq-q{font-weight:600;color:var(--navy);font-size:.92rem;}
.contact-card{background:linear-gradient(135deg,var(--navy),#111b47);border-radius:14px;padding:32px;color:#fff;}
</style>

<div class="help-hero text-center">
  <div class="container">
    <h1 class="fw-800 text-white mb-2">Help Centre</h1>
    <p class="mb-4" style="color:#94a3b8;">Find answers quickly. Search or browse by category.</p>
    <div class="mx-auto" style="max-width:540px;">
      <div class="input-group input-group-lg">
        <span class="input-group-text bg-white border-0"><i class="bi bi-search text-muted"></i></span>
        <input type="text" id="faq-search" class="form-control border-0 shadow-none" placeholder="Search help articles…" oninput="searchFaqs(this.value)">
      </div>
    </div>
  </div>
</div>

<section class="py-5">
  <div class="container">

    <!-- Category pills -->
    <div class="d-flex flex-wrap gap-2 justify-content-center mb-5">
      <?php $cats = [
        ['all','All Topics','bi-grid-fill'],
        ['start','Getting Started','bi-rocket-takeoff-fill'],
        ['exam','Exam Management','bi-file-earmark-check-fill'],
        ['marking','Marking & Results','bi-check2-circle'],
        ['billing','Billing & Account','bi-credit-card-fill'],
        ['tech','Technical Issues','bi-tools'],
      ]; foreach($cats as $i=>$c): ?>
      <a href="#" class="cat-pill <?= $i===0?'active':'' ?>" onclick="filterCat('<?= $c[0] ?>',this);return false;">
        <i class="bi <?= $c[2] ?>"></i><?= $c[1] ?>
      </a>
      <?php endforeach; ?>
    </div>

    <div class="row g-5">
      <div class="col-lg-8">

        <?php $faqs = [
          ['start','Getting Started',[
            ['How do I create my first exam?','Go to Dashboard → Create Exam. Fill in the exam name, duration, and passing mark. Then add questions from the Question Bank or type them manually. Click Publish when ready. The exam link is generated automatically.'],
            ['How do I invite candidates?','After publishing an exam, go to Candidates → Invite. Enter email addresses manually, upload a CSV, or share the direct exam link. Candidates receive an email with their unique login credentials.'],
            ['How do I set up the question bank?','Go to Question Bank → Add Question. Select the question type (MCQ, descriptive, fill-in-the-blank, etc.), enter the question, add options, and mark the correct answer. Tag questions by subject, chapter, and difficulty for smart randomisation.'],
            ['Can I import questions from Excel or Word?','Yes. Download our question import template from Question Bank → Import. Fill it in and upload. Supports up to 1,000 questions per file. Images can be added via URL in the template.'],
            ['Is there a free trial?','Yes — all plans include a 30-day free trial with full platform access (up to 3 exams, 50 candidates). No credit card required to start.'],
          ]],
          ['exam','Exam Management',[
            ['Can candidates retake an exam?','Yes. Go to the exam settings and enable "Allow retakes". Set the maximum number of attempts and whether to use the first score, last score, or highest score for ranking.'],
            ['How does question randomisation work?','ExamRankers draws questions from your bank based on the tags you specify (subject, chapter, difficulty). Each candidate receives a unique paper while maintaining the same overall difficulty balance.'],
            ['Can I set different time limits for different sections?','Yes. When creating a multi-section exam, each section has its own time limit. Candidates cannot go back to a completed section.'],
            ['How do I schedule an exam for a future date?','In Exam Settings, set the Start Date and End Date. The exam automatically opens for candidates at the start time and closes at the end time. You can set a single window or allow a rolling window where candidates can start anytime within the dates.'],
            ['What happens if a candidate loses internet during an exam?','Answers are auto-saved every 30 seconds. If connectivity drops, the candidate can reconnect and resume from where they left off within the exam window. Completed submissions are safe.'],
          ]],
          ['marking','Marking & Results',[
            ['How does auto-marking work?','MCQ, true/false, and fill-in-the-blank questions are marked instantly based on the answer key you set. Descriptive questions are either AI-marked or sent to your evaluator pool for manual marking.'],
            ['When are results published?','For fully auto-marked exams, results are published the moment the last candidate submits (or the exam window closes). For exams with descriptive sections, results are published after all manual marking is complete.'],
            ['Can I award partial marks for descriptive answers?','Yes. When adding a descriptive question, set the maximum marks and define a marking rubric. Evaluators award marks within the defined range. The system enforces minimum and maximum bounds.'],
            ['How do I set up negative marking?','In Exam Settings → Marking Scheme, enable Negative Marking and set the penalty per wrong answer (e.g., -0.25 for 1-mark MCQs). Different sections can have different penalty values.'],
            ['Can candidates view their answer scripts after results?','This is controlled by you. Enable "Show answers after results" in Exam Settings to let candidates review their answers, correct answers, and evaluator comments after the result is published.'],
          ]],
          ['billing','Billing & Account',[
            ['How is billing calculated?','You are billed per the plan you chose — either monthly or annually. The candidate count resets every calendar month. Unused candidates do not roll over.'],
            ['Can I change my plan mid-month?','Yes. Upgrades apply immediately and are prorated. Downgrades apply from the next billing cycle. You will not lose any data when downgrading.'],
            ['How do I download my GST invoice?','Go to Account → Billing → Invoice History. Click Download Invoice for any month. All invoices include GST breakdowns as required by Indian tax law.'],
            ['What payment methods are accepted?','Credit/debit cards, net banking, UPI, and bank transfer (for annual plans). All payments are processed via Razorpay with 256-bit SSL encryption.'],
            ['How do I cancel my subscription?','Go to Account → Billing → Cancel Subscription. Your account remains active until the end of the current billing period. All data is available for download for 30 days after cancellation.'],
          ]],
          ['tech','Technical Issues',[
            ['Which browsers are supported?','Chrome 90+, Firefox 88+, Edge 90+, and Safari 14+. We recommend Chrome for the best experience. The secure browser lockdown feature requires Chrome or Edge.'],
            ['Why is the exam not loading for some candidates?','The most common causes are: browser not updated, third-party cookies blocked, or firewall blocking our domain. Share our Technical Requirements page with candidates before exam day.'],
            ['How do I allow ExamRankers through our firewall?','Whitelist *.examrankers.com and *.cloudfront.net on port 443. For video proctoring, also whitelist *.twilio.com. Full firewall requirements are in our Network Configuration Guide.'],
            ['What are the minimum system requirements for candidates?','Any device with a modern browser and a stable internet connection of at least 1 Mbps. Webcam required for proctored exams. No software download needed.'],
            ['Is there a mobile app?','Candidates can take exams directly in a mobile browser on any smartphone. A dedicated iOS and Android app is on our roadmap for 2025.'],
          ]],
        ]; foreach($faqs as $cat): ?>

        <div class="faq-section <?= $cat[0]==='start'?'active':'' ?>" id="cat-<?= $cat[0] ?>">
          <h5 class="fw-700 mb-4" style="color:var(--navy);"><?= $cat[1] ?></h5>
          <div class="accordion mb-5" id="acc-<?= $cat[0] ?>">
            <?php foreach($cat[2] as $i=>$f): ?>
            <div class="accordion-item border-0 mb-2 rounded-3 shadow-sm faq-item" data-q="<?= strtolower($f[0].' '.$f[1]) ?>">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed faq-q rounded-3" type="button" data-bs-toggle="collapse" data-bs-target="#faq-<?= $cat[0].'-'.$i ?>">
                  <?= $f[0] ?>
                </button>
              </h2>
              <div id="faq-<?= $cat[0].'-'.$i ?>" class="accordion-collapse collapse" data-bs-parent="#acc-<?= $cat[0] ?>">
                <div class="accordion-body text-muted" style="font-size:.9rem;"><?= $f[1] ?></div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>

        <?php endforeach; ?>

        <div id="search-results" style="display:none;"></div>
      </div>

      <div class="col-lg-4">
        <div class="contact-card mb-4">
          <h6 class="fw-700 mb-2">Can't find your answer?</h6>
          <p class="small mb-3" style="color:#94a3b8;">Our support team responds within 4 hours on Professional plans.</p>
          <a href="<?= base_url('contact') ?>" class="btn btn-primary btn-sm w-100 mb-2">Contact Support</a>
          <a href="<?= base_url('docs') ?>" class="btn btn-outline-light btn-sm w-100">Browse Documentation</a>
        </div>
        <div class="border rounded-3 p-4 bg-white">
          <h6 class="fw-700 mb-3" style="color:var(--navy);">Support hours</h6>
          <?php foreach([['Email support','24/7 (responses Mon–Sat)'],['Chat support','9 AM – 9 PM IST'],['Phone support','10 AM – 7 PM IST (Pro+)'],['Exam day hotline','During your exam window']] as $s): ?>
          <div class="d-flex justify-content-between small border-bottom pb-2 mb-2">
            <span class="text-muted"><?= $s[0] ?></span>
            <span class="fw-600" style="color:var(--navy);font-size:.8rem;"><?= $s[1] ?></span>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
function filterCat(cat, el) {
  document.querySelectorAll('.cat-pill').forEach(p => p.classList.remove('active'));
  el.classList.add('active');
  document.getElementById('search-results').style.display = 'none';
  if (cat === 'all') {
    document.querySelectorAll('.faq-section').forEach(s => s.classList.add('active'));
  } else {
    document.querySelectorAll('.faq-section').forEach(s => s.classList.remove('active'));
    const sec = document.getElementById('cat-' + cat);
    if (sec) sec.classList.add('active');
  }
}

function searchFaqs(q) {
  const sr = document.getElementById('search-results');
  if (!q.trim()) {
    sr.style.display = 'none';
    document.querySelectorAll('.faq-section').forEach(s => s.classList.remove('active'));
    document.getElementById('cat-start').classList.add('active');
    return;
  }
  document.querySelectorAll('.faq-section').forEach(s => s.classList.remove('active'));
  const items = document.querySelectorAll('.faq-item');
  let html = '<h5 class="fw-700 mb-4" style="color:var(--navy);">Search results</h5><div class="accordion">';
  let count = 0;
  items.forEach((item, i) => {
    if (item.dataset.q.includes(q.toLowerCase())) {
      const btn = item.querySelector('.accordion-button');
      const body = item.querySelector('.accordion-body');
      html += `<div class="accordion-item border-0 mb-2 rounded-3 shadow-sm"><h2 class="accordion-header"><button class="accordion-button collapsed faq-q rounded-3" type="button" data-bs-toggle="collapse" data-bs-target="#sr-${i}">${btn.textContent.trim()}</button></h2><div id="sr-${i}" class="accordion-collapse collapse"><div class="accordion-body text-muted" style="font-size:.9rem;">${body.innerHTML}</div></div></div>`;
      count++;
    }
  });
  html += '</div>';
  sr.innerHTML = count ? html : '<p class="text-muted">No results for "' + q + '". Try a different search or <a href="' + location.origin + '/<?= base_url('contact') ?>">contact support</a>.</p>';
  sr.style.display = 'block';
}
</script>
