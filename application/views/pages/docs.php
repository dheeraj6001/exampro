<style>
:root{--navy:#0b1437;--blue:#1a56db;}
.docs-hero{background:linear-gradient(135deg,var(--navy),#111b47);padding:60px 0 40px;}
.doc-card{background:#fff;border:1px solid #e2e8f0;border-radius:12px;padding:24px;height:100%;transition:.18s;text-decoration:none;color:inherit;display:block;}
.doc-card:hover{border-color:var(--blue);box-shadow:0 8px 30px rgba(26,86,219,.1);transform:translateY(-3px);color:inherit;}
.doc-icon{width:52px;height:52px;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:1.4rem;margin-bottom:16px;}
.doc-badge{font-size:.7rem;padding:3px 10px;border-radius:20px;font-weight:600;}
.step-num{width:32px;height:32px;border-radius:50%;background:var(--blue);color:#fff;font-weight:700;font-size:.85rem;display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.sidebar-link{display:block;padding:7px 12px;border-radius:8px;font-size:.85rem;color:#374151;text-decoration:none;transition:.12s;}
.sidebar-link:hover{background:#eff6ff;color:var(--blue);}
.sidebar-link.active{background:#eff6ff;color:var(--blue);font-weight:600;}
</style>

<div class="docs-hero text-center">
  <div class="container">
    <h1 class="fw-800 text-white mb-2">Documentation</h1>
    <p class="mb-4" style="color:#94a3b8;">Guides, references, and examples to help you get the most out of ExamRankers.</p>
    <div class="mx-auto" style="max-width:480px;">
      <div class="input-group input-group-lg">
        <span class="input-group-text bg-white border-0"><i class="bi bi-search text-muted"></i></span>
        <input type="text" class="form-control border-0 shadow-none" placeholder="Search documentation…">
      </div>
    </div>
  </div>
</div>

<section class="py-5">
  <div class="container">

    <!-- Doc sections -->
    <h3 class="fw-800 mb-4" style="color:var(--navy);">Browse by topic</h3>
    <div class="row g-4 mb-5">
      <?php $sections = [
        ['bi-rocket-takeoff-fill','#eff6ff','var(--blue)','Quick Start','Get your first exam live in under 10 minutes.',['Platform overview','Account setup','Your first exam','Inviting candidates'],'Beginner'],
        ['bi-journal-text','#f0fdf4','#16a34a','Exam Setup','Create, configure, and schedule exams.',['Exam types & modes','Sections & timing','Negative marking','Scheduling & access control'],'Core'],
        ['bi-collection-fill','#fff7ed','#ea580c','Question Bank','Build and manage your question library.',['Question types','Bulk import (Excel/CSV)','Tags & difficulty','Smart randomisation'],'Core'],
        ['bi-check2-all','#faf5ff','#7c3aed','Marking & Evaluation','Configure auto and manual marking.',['Auto-marking rules','Descriptive marking','Blind marking','Partial credit & rubrics'],'Core'],
        ['bi-bar-chart-fill','#f0fdfa','#0d9488','Analytics & Reports','Measure outcomes and export data.',['Score reports','Rank lists','Topic-wise analysis','Exporting data'],'Core'],
        ['bi-shield-lock-fill','#fff1f2','#e11d48','Proctoring & Security','Set up a cheat-proof exam environment.',['Browser lockdown','AI proctoring','Live video proctoring','Audit logs'],'Pro'],
        ['bi-plug-fill','#eff6ff','var(--blue)','Integrations','Connect ExamRankers to your tools.',['HRMS / LMS (SCORM)','Razorpay payments','SAML / SSO','Webhook events'],'Pro'],
        ['bi-code-slash','#f8fafc','#0b1437','REST API','Automate everything with our API.',['Authentication (JWT)','Endpoints reference','Rate limits','Code examples'],'Pro'],
      ]; foreach($sections as $s): ?>
      <div class="col-md-6 col-lg-3">
        <a href="<?= $s[5]==='Pro'?base_url('api-docs'):base_url('help') ?>" class="doc-card">
          <div class="doc-icon" style="background:<?= $s[1] ?>;color:<?= $s[2] ?>;"><i class="bi <?= $s[0] ?>"></i></div>
          <div class="d-flex align-items-center gap-2 mb-2">
            <h6 class="fw-700 mb-0" style="color:var(--navy);"><?= $s[3] ?></h6>
            <span class="doc-badge" style="background:<?= $s[5]==='Pro'?'#faf5ff':'#f1f5f9' ?>;color:<?= $s[5]==='Pro'?'#7c3aed':'#64748b' ?>;"><?= $s[5] ?></span>
          </div>
          <p class="text-muted small mb-3"><?= $s[4] ?></p>
          <ul class="list-unstyled mb-0">
            <?php foreach($s[6] as $link): ?>
            <li class="mb-1" style="font-size:.8rem;color:#64748b;"><i class="bi bi-arrow-right-short" style="color:<?= $s[2] ?>;"></i><?= $link ?></li>
            <?php endforeach; ?>
          </ul>
        </a>
      </div>
      <?php endforeach; ?>
    </div>

    <!-- Quick start steps -->
    <div class="row g-4 align-items-start">
      <div class="col-lg-8">
        <div class="border rounded-3 p-4 bg-white">
          <h4 class="fw-800 mb-4" style="color:var(--navy);">Quick Start — first exam in 5 steps</h4>
          <?php $steps = [
            ['Create your account','Sign up at examrankers.com. No credit card needed. Your 30-day trial starts immediately.'],
            ['Set up your question bank','Go to Question Bank → Add Question. Add MCQs, descriptive, or fill-in-the-blank questions. Tag them by subject and difficulty.'],
            ['Create an exam','Dashboard → Create Exam. Set the name, duration, passing marks, and select questions from your bank. Enable negative marking or section timing if needed.'],
            ['Invite candidates','Exam → Candidates → Invite. Upload a CSV of email addresses or share the direct exam link. Candidates get a login email automatically.'],
            ['Review results','After the exam window closes, go to Results. View scores, rank lists, and topic-wise analytics. Export to Excel or publish to candidates.'],
          ]; foreach($steps as $i=>$s): ?>
          <div class="d-flex gap-3 mb-4">
            <div class="step-num mt-1"><?= $i+1 ?></div>
            <div>
              <h6 class="fw-700 mb-1" style="color:var(--navy);"><?= $s[0] ?></h6>
              <p class="text-muted mb-0" style="font-size:.88rem;"><?= $s[1] ?></p>
            </div>
          </div>
          <?php endforeach; ?>
          <a href="<?= base_url('contact') ?>" class="btn btn-primary mt-2">Need help? Contact Support →</a>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="border rounded-3 p-4 bg-white mb-4">
          <h6 class="fw-700 mb-3" style="color:var(--navy);">Popular articles</h6>
          <?php foreach([
            ['How do I create a mock test?',base_url('help')],
            ['Setting up negative marking',base_url('help')],
            ['Importing questions from Excel',base_url('help')],
            ['Publishing results to candidates',base_url('help')],
            ['Setting up AI proctoring',base_url('help')],
            ['API authentication guide',base_url('api-docs')],
          ] as $a): ?>
          <a href="<?= $a[1] ?>" class="sidebar-link"><i class="bi bi-file-text me-2"></i><?= $a[0] ?></a>
          <?php endforeach; ?>
        </div>
        <div class="border rounded-3 p-4" style="background:linear-gradient(135deg,var(--navy),#111b47);">
          <h6 class="fw-700 mb-2 text-white">Need live help?</h6>
          <p class="small mb-3" style="color:#94a3b8;">Our support team is online Mon–Sat, 9 AM to 9 PM IST.</p>
          <a href="<?= base_url('contact') ?>" class="btn btn-primary btn-sm w-100 mb-2">Contact Support</a>
          <a href="<?= base_url('help') ?>" class="btn btn-outline-light btn-sm w-100">Help Centre</a>
        </div>
      </div>
    </div>

  </div>
</section>
