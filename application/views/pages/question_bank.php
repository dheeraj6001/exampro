<style>
:root{--navy:#0b1437;--blue:#1a56db;--green:#16a34a;--orange:#ea580c;--purple:#7c3aed;--teal:#0d9488;}

/* Hero */
.qb-hero{background:linear-gradient(135deg,var(--navy) 0%,#111b47 100%);padding:90px 0 0;overflow:hidden;}
.qb-hero h1{color:#fff;font-weight:800;}
.qb-hero p{color:#94a3b8;}

/* Question bank UI mock */
.qb-mock{background:#fff;border-radius:16px 16px 0 0;box-shadow:0 -10px 60px rgba(0,0,0,.3);overflow:hidden;}
.qb-topbar{background:#f8fafc;border-bottom:1px solid #e2e8f0;padding:12px 18px;display:flex;align-items:center;gap:10px;flex-wrap:wrap;}
.qb-search{flex:1;min-width:160px;background:#fff;border:1px solid #e2e8f0;border-radius:8px;padding:7px 12px;font-size:.8rem;display:flex;align-items:center;gap:8px;color:#94a3b8;}
.filter-pill{background:#fff;border:1px solid #e2e8f0;border-radius:20px;padding:5px 12px;font-size:.74rem;font-weight:600;color:#374151;white-space:nowrap;}
.filter-pill.active{background:#eff6ff;border-color:var(--blue);color:var(--blue);}
.qb-table{width:100%;font-size:.8rem;}
.qb-table th{background:#f8fafc;padding:9px 14px;color:#64748b;font-weight:600;font-size:.72rem;text-transform:uppercase;letter-spacing:.4px;white-space:nowrap;}
.qb-table td{padding:10px 14px;border-bottom:1px solid #f1f5f9;vertical-align:middle;}
.qb-table tr:last-child td{border-bottom:none;}
.qb-table tr:hover td{background:#fafafa;}
.diff-badge{font-size:.66rem;font-weight:700;padding:2px 9px;border-radius:12px;}
.diff-e{background:#dcfce7;color:#166534;}
.diff-m{background:#fef3c7;color:#92400e;}
.diff-h{background:#fee2e2;color:#991b1b;}
.type-tag{font-size:.68rem;padding:2px 8px;border-radius:6px;background:#f1f5f9;color:#475569;font-weight:600;}
.qb-footer-bar{background:#f8fafc;border-top:1px solid #e2e8f0;padding:9px 18px;display:flex;align-items:center;justify-content:space-between;}

/* Feat cards */
.feat-card{background:#fff;border:1px solid #e2e8f0;border-radius:14px;padding:26px;height:100%;transition:.18s;}
.feat-card:hover{box-shadow:0 10px 36px rgba(0,0,0,.09);transform:translateY(-4px);}
.feat-icon{width:52px;height:52px;border-radius:13px;display:flex;align-items:center;justify-content:center;font-size:1.4rem;margin-bottom:16px;}

/* Tag system visual */
.tag-demo{background:#fff;border:1px solid #e2e8f0;border-radius:12px;padding:20px;}
.tag-chip{display:inline-flex;align-items:center;gap:5px;padding:4px 12px;border-radius:20px;font-size:.75rem;font-weight:600;margin:3px;}

/* Import steps */
.import-step{background:#fff;border:1px solid #e2e8f0;border-radius:12px;padding:20px;text-align:center;position:relative;}
.import-arrow{display:flex;align-items:center;justify-content:center;color:#cbd5e1;font-size:1.4rem;}

/* Question type cards */
.qtype-card{background:#fff;border:1px solid #e2e8f0;border-radius:12px;padding:20px;height:100%;transition:.18s;}
.qtype-card:hover{border-color:var(--blue);box-shadow:0 6px 24px rgba(26,86,219,.08);}
.qtype-icon{font-size:1.8rem;margin-bottom:10px;}

/* stat strip */
.stat-strip{background:var(--blue);padding:28px 0;}
.stat-strip .num{font-size:2rem;font-weight:800;color:#fff;line-height:1;}
.stat-strip .lbl{font-size:.76rem;color:#bfdbfe;margin-top:4px;}

/* cmp */
.cmp th{background:#f8fafc;font-size:.78rem;text-transform:uppercase;letter-spacing:.5px;color:#64748b;padding:12px 18px;}
.cmp td{padding:12px 18px;vertical-align:middle;font-size:.88rem;}
.chk{color:var(--green);}
.crs{color:#cbd5e1;}
</style>

<!-- ═══ HERO ═══ -->
<section class="qb-hero">
  <div class="container">
    <div class="row align-items-end g-5">
      <div class="col-lg-5 pb-5">
        <span class="badge mb-3 px-3 py-2" style="background:rgba(26,86,219,.25);color:#93c5fd;font-size:.78rem;">
          <i class="bi bi-collection-fill me-1"></i>Question Bank
        </span>
        <h1 class="display-5 mb-3">One bank. Every question type. Infinite exams.</h1>
        <p class="lead mb-4">Build, tag, organise, and reuse your question library across unlimited exams. Smart randomisation ensures no two candidates ever see the same paper.</p>
        <div class="d-flex gap-3 flex-wrap mb-4">
          <a href="<?= base_url('contact') ?>" class="btn btn-primary btn-lg px-5">Start Free Trial</a>
          <a href="<?= base_url('pricing') ?>" class="btn btn-outline-light btn-lg px-4">View Pricing</a>
        </div>
        <div class="d-flex gap-4 flex-wrap">
          <?php foreach([['10+','Question types'],['Bulk import','Excel / CSV / Word'],['Smart tags','Subject · Chapter · Difficulty']] as $s): ?>
          <div>
            <div class="fw-800 text-white" style="font-size:1.05rem;"><?= $s[0] ?></div>
            <div style="font-size:.74rem;color:#64748b;"><?= $s[1] ?></div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Question bank UI mock -->
      <div class="col-lg-7 d-none d-lg-block">
        <div class="qb-mock">
          <div class="qb-topbar">
            <div class="qb-search"><i class="bi bi-search" style="font-size:.85rem;"></i> Search questions…</div>
            <div class="filter-pill active">All (1,847)</div>
            <div class="filter-pill">Physics (412)</div>
            <div class="filter-pill">Chemistry (386)</div>
            <div class="filter-pill">Maths (521)</div>
            <button class="btn btn-primary btn-sm ms-auto" style="font-size:.75rem;padding:5px 14px;white-space:nowrap;">+ Add Question</button>
          </div>
          <div style="overflow-x:auto;">
            <table class="qb-table">
              <thead>
                <tr>
                  <th style="width:36px;"><input type="checkbox" class="form-check-input" style="width:14px;height:14px;"></th>
                  <th>Question</th>
                  <th>Type</th>
                  <th>Subject</th>
                  <th>Chapter</th>
                  <th>Difficulty</th>
                  <th>Used</th>
                </tr>
              </thead>
              <tbody>
                <?php $qs = [
                  ['A particle moves in a circle of radius R…','MCQ','Physics','Kinematics','h','14×'],
                  ['The IUPAC name of CH₃COOH is…','MCQ','Chemistry','Organic','e','22×'],
                  ['Evaluate ∫₀^π sin²x dx','Numerical','Maths','Integration','m','8×'],
                  ['State and prove the law of conservation…','Descriptive','Physics','Laws of Motion','m','3×'],
                  ['Match the following oxidation states…','Match','Chemistry','Redox','h','11×'],
                  ['Fill in the blank: The SI unit of force is ___','Fill Blank','Physics','Units','e','19×'],
                ]; foreach($qs as $q): ?>
                <tr>
                  <td><input type="checkbox" class="form-check-input" style="width:14px;height:14px;"></td>
                  <td style="max-width:220px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;color:var(--navy);font-weight:500;"><?= $q[0] ?></td>
                  <td><span class="type-tag"><?= $q[1] ?></span></td>
                  <td style="color:#64748b;"><?= $q[2] ?></td>
                  <td style="color:#94a3b8;font-size:.76rem;"><?= $q[3] ?></td>
                  <td><span class="diff-badge diff-<?= $q[4] ?>"><?= $q[4]==='e'?'Easy':($q[4]==='m'?'Medium':'Hard') ?></span></td>
                  <td style="color:#94a3b8;"><?= $q[5] ?></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <div class="qb-footer-bar">
            <span style="font-size:.74rem;color:#64748b;">Showing 1–6 of 1,847 questions</span>
            <div class="d-flex gap-2">
              <button class="btn btn-sm btn-outline-secondary" style="font-size:.72rem;padding:3px 10px;">Import</button>
              <button class="btn btn-sm btn-outline-secondary" style="font-size:.72rem;padding:3px 10px;">Export</button>
              <button class="btn btn-sm btn-primary" style="font-size:.72rem;padding:3px 10px;">Use in Exam</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ STAT STRIP ═══ -->
<div class="stat-strip">
  <div class="container">
    <div class="row g-3 text-center">
      <?php foreach([['10+','Question types supported'],['1,000','Max bulk import per file'],['Unlimited','Questions per bank'],['Smart tags','Power intelligent randomisation']] as $s): ?>
      <div class="col-6 col-md-3">
        <div class="num"><?= $s[0] ?></div>
        <div class="lbl"><?= $s[1] ?></div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<!-- ═══ QUESTION TYPES ═══ -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="text-center mb-5">
      <span class="badge mb-2 px-3 py-2" style="background:#eff6ff;color:var(--blue);font-size:.78rem;">Question Types</span>
      <h2 class="fw-800" style="color:var(--navy);">Every question format your exam demands</h2>
      <p class="text-muted" style="max-width:520px;margin:.75rem auto 0;">From single-choice MCQ to full coding challenges — all in one bank, all auto-marked where possible.</p>
    </div>
    <div class="row g-3">
      <?php $types = [
        ['☑','MCQ — Single Choice','One correct answer from 2–6 options. Auto-marked instantly. Supports images, equations, and code snippets in options.','var(--blue)','#eff6ff'],
        ['☑☑','MCQ — Multiple Choice','One or more correct answers. Configurable partial credit per correct option selected.','var(--purple)','#faf5ff'],
        ['🔢','Numerical Answer','Candidate types a number. Set tolerance range for floating-point answers (e.g. 9.8 ± 0.05).','var(--orange)','#fff7ed'],
        ['✍','Descriptive / Essay','Long-form text answer. AI-scored against a rubric or sent to your manual evaluator panel.','var(--green)','#f0fdf4'],
        ['—','Fill in the Blank','One or multiple blanks in a sentence. Exact match or keyword-match scoring.','var(--teal)','#f0fdfa'],
        ['↔','Match the Following','Two-column matching. All-or-nothing or partial credit per correct pair.','#be185d','#fdf2f8'],
        ['↕','Ordering / Sequencing','Candidates drag to arrange items in the correct order. Common in logic and process questions.','var(--navy)','#f1f5f9'],
        ['✓✗','True / False','Simple binary choice. Supports reason-based variants ("True because…").','var(--orange)','#fff7ed'],
        ['💻','Coding Challenge','Write and run code in 30+ languages. Auto-graded against test cases with time and memory limits.','var(--blue)','#eff6ff'],
        ['📁','File Upload','Candidate submits a file (PDF, image, spreadsheet). Evaluator downloads and marks manually.','var(--purple)','#faf5ff'],
      ]; foreach($types as $t): ?>
      <div class="col-sm-6 col-lg-4 col-xl-3">
        <div class="qtype-card">
          <div class="qtype-icon"><?= $t[0] ?></div>
          <div class="fw-700 mb-1" style="font-size:.88rem;color:var(--navy);"><?= $t[1] ?></div>
          <p class="text-muted mb-0" style="font-size:.78rem;line-height:1.5;"><?= $t[2] ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ═══ TAGGING SYSTEM ═══ -->
<section class="py-5">
  <div class="container">
    <div class="row g-5 align-items-center">
      <div class="col-lg-6">
        <span class="badge mb-2 px-3 py-2" style="background:#f0fdf4;color:var(--green);font-size:.78rem;">Smart Tagging</span>
        <h2 class="fw-800 mb-3" style="color:var(--navy);">Tag once. Reuse forever.</h2>
        <p class="text-muted mb-3">Every question carries a set of searchable tags. Tags power intelligent randomisation — so each exam pulls the exact mix of subjects, chapters, and difficulties you specify, automatically.</p>
        <ul class="list-unstyled mb-4">
          <?php foreach([
            ['bi-bookmark-fill','var(--blue)','Subject','Physics, Chemistry, Maths, English…'],
            ['bi-journals','var(--purple)','Chapter / Topic','Kinematics, Organic Chemistry, Integration…'],
            ['bi-speedometer2','var(--orange)','Difficulty','Easy (L1) · Medium (L2) · Hard (L3)'],
            ['bi-card-list','var(--green)','Question Type','MCQ · Descriptive · Numerical · Coding…'],
            ['bi-stopwatch-fill','var(--teal)','Estimated Time','Target time-per-question for exam design'],
            ['bi-calendar3','var(--navy)','Year / Source','Board 2022, JEE 2023, Internal…'],
          ] as $tag): ?>
          <li class="d-flex align-items-start gap-2 mb-3">
            <div style="width:32px;height:32px;border-radius:8px;background:#f8fafc;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
              <i class="bi <?= $tag[0] ?>" style="color:<?= $tag[1] ?>;font-size:.9rem;"></i>
            </div>
            <div>
              <span class="fw-700" style="font-size:.85rem;color:var(--navy);"><?= $tag[2] ?></span>
              <span class="text-muted" style="font-size:.82rem;"> — <?= $tag[3] ?></span>
            </div>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class="col-lg-6">
        <div class="tag-demo shadow-sm">
          <div style="font-size:.72rem;color:#94a3b8;margin-bottom:12px;font-weight:600;text-transform:uppercase;letter-spacing:.5px;">Sample question tags</div>
          <div class="fw-600 mb-3" style="color:var(--navy);font-size:.88rem;line-height:1.5;border-left:3px solid var(--blue);padding-left:12px;">
            "A particle moves in a circle of radius R with constant speed v. The magnitude of the change in velocity when the particle moves through an angle of 60° is:"
          </div>
          <div>
            <?php $chips = [
              ['Subject: Physics','var(--blue)','#eff6ff'],
              ['Chapter: Kinematics','var(--purple)','#faf5ff'],
              ['Difficulty: Hard','#dc2626','#fee2e2'],
              ['Type: MCQ','var(--green)','#f0fdf4'],
              ['Est. Time: 2 min','var(--orange)','#fff7ed'],
              ['Source: JEE 2022','var(--navy)','#f1f5f9'],
              ['Used: 14 times','var(--teal)','#f0fdfa'],
              ['Correct rate: 34%','#be185d','#fdf2f8'],
            ]; foreach($chips as $c): ?>
            <span class="tag-chip" style="background:<?= $c[2] ?>;color:<?= $c[1] ?>;"><?= $c[0] ?></span>
            <?php endforeach; ?>
          </div>
          <hr style="border-color:#f1f5f9;">
          <div class="d-flex align-items-center gap-2">
            <i class="bi bi-lightbulb-fill text-warning"></i>
            <span style="font-size:.8rem;color:#374151;">Questions with <strong>correct rate below 20%</strong> are automatically flagged for review.</span>
          </div>
        </div>

        <!-- Randomisation config -->
        <div class="tag-demo shadow-sm mt-3">
          <div style="font-size:.72rem;color:#94a3b8;margin-bottom:12px;font-weight:600;text-transform:uppercase;letter-spacing:.5px;">Randomisation rule — JEE Mock</div>
          <?php $rules = [
            ['Physics','14 Easy','21 Medium','10 Hard'],
            ['Chemistry','14 Easy','21 Medium','10 Hard'],
            ['Maths','12 Easy','18 Medium','10 Hard'],
          ]; foreach($rules as $r): ?>
          <div class="d-flex align-items-center gap-2 mb-2">
            <span style="width:80px;font-size:.78rem;font-weight:600;color:var(--navy);"><?= $r[0] ?></span>
            <span class="tag-chip" style="background:#dcfce7;color:#166534;margin:0;"><?= $r[1] ?></span>
            <span class="tag-chip" style="background:#fef3c7;color:#92400e;margin:0;"><?= $r[2] ?></span>
            <span class="tag-chip" style="background:#fee2e2;color:#991b1b;margin:0;"><?= $r[3] ?></span>
          </div>
          <?php endforeach; ?>
          <div class="d-flex align-items-center gap-2 mt-3 pt-2 border-top">
            <i class="bi bi-check-circle-fill text-success"></i>
            <span style="font-size:.8rem;color:#374151;">Each candidate gets a <strong>unique paper</strong> — same difficulty balance, different questions.</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ FEATURES ═══ -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="text-center mb-5">
      <span class="badge mb-2 px-3 py-2" style="background:#eff6ff;color:var(--blue);font-size:.78rem;">All Features</span>
      <h2 class="fw-800" style="color:var(--navy);">Everything you need to build a world-class bank</h2>
    </div>
    <div class="row g-4">
      <?php $features = [
        ['bi-file-earmark-spreadsheet-fill','#eff6ff','var(--blue)','Bulk Import — Excel / CSV','Download our template, paste in your questions, upload. Up to 1,000 questions per file. Supports images via URL and LaTeX for equations.'],
        ['bi-shuffle','#f0fdf4','var(--green)','Difficulty-Balanced Randomisation','Define exactly how many Easy, Medium, and Hard questions per section. Every candidate gets a statistically equivalent paper.'],
        ['bi-file-earmark-word-fill','#faf5ff','var(--purple)','Word / DOCX Import','Import questions directly from a Microsoft Word document using our question template. Saves hours of manual re-entry.'],
        ['bi-image-fill','#fff7ed','var(--orange)','Rich Media Questions','Embed images, audio clips, diagrams, and mathematical equations (LaTeX / MathJax) directly in question stems and options.'],
        ['bi-graph-up-arrow','#f0fdfa','var(--teal)','Question Performance Analytics','See correct answer rate, average time taken, and discrimination index for every question. Flag weak questions automatically.'],
        ['bi-arrow-repeat','#fdf2f8','#be185d','Reuse Across Exams','Add any question from the bank to multiple exams. Edits to a question in the bank do not affect already-published exams.'],
        ['bi-lock-fill','#f1f5f9','var(--navy)','Question Access Control','Restrict bank sections to specific faculty or departments. Prevent evaluators from seeing the answer key before marking.'],
        ['bi-clock-history','#eff6ff','var(--blue)','Version History','Every edit to a question is tracked. Restore any previous version with one click. Full audit trail for accreditation.'],
        ['bi-translate','#f0fdf4','var(--green)','Multi-language Questions','Write questions in English, Hindi, Tamil, or any of 14 supported languages. Candidate sees their preferred language.'],
      ]; foreach($features as $f): ?>
      <div class="col-md-6 col-lg-4">
        <div class="feat-card">
          <div class="feat-icon" style="background:<?= $f[1] ?>;color:<?= $f[2] ?>;"><i class="bi <?= $f[0] ?>"></i></div>
          <h6 class="fw-700 mb-2" style="color:var(--navy);"><?= $f[3] ?></h6>
          <p class="text-muted mb-0" style="font-size:.87rem;"><?= $f[4] ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ═══ BULK IMPORT ═══ -->
<section class="py-5">
  <div class="container">
    <div class="row g-5 align-items-center">
      <div class="col-lg-5">
        <span class="badge mb-2 px-3 py-2" style="background:#f0fdf4;color:var(--green);font-size:.78rem;">Bulk Import</span>
        <h2 class="fw-800 mb-3" style="color:var(--navy);">Migrate your entire question library in minutes</h2>
        <p class="text-muted mb-4">Already have questions in Excel, Word, or a legacy system? Our import tool handles up to 1,000 questions per file — complete with answers, tags, images, and difficulty levels.</p>
        <ul class="list-unstyled">
          <?php foreach([
            ['bi-check-circle-fill','var(--green)','Excel / CSV — download our template and fill it in'],
            ['bi-check-circle-fill','var(--green)','Microsoft Word — use our DOCX question template'],
            ['bi-check-circle-fill','var(--green)','Images attached via URL or uploaded separately'],
            ['bi-check-circle-fill','var(--green)','LaTeX equations rendered automatically'],
            ['bi-check-circle-fill','var(--green)','Validation report shows errors before import completes'],
            ['bi-check-circle-fill','var(--green)','Duplicate detection prevents repeated questions'],
          ] as $li): ?>
          <li class="d-flex gap-2 mb-2" style="font-size:.88rem;color:#374151;">
            <i class="bi <?= $li[0] ?> mt-1 flex-shrink:0" style="color:<?= $li[1] ?>;"></i><?= $li[2] ?>
          </li>
          <?php endforeach; ?>
        </ul>
        <a href="<?= base_url('contact') ?>" class="btn btn-primary mt-3 px-4">Download Sample Template →</a>
      </div>
      <div class="col-lg-7">
        <div class="row g-3 align-items-center">
          <?php $steps = [
            ['bi-download','var(--blue)','#eff6ff','1. Download template','Get our Excel or Word template with all required columns pre-formatted.'],
            ['bi-pencil-fill','var(--purple)','#faf5ff','2. Fill in questions','Add your questions, options, answers, and tags. Images go in as URLs.'],
            ['bi-cloud-upload-fill','var(--green)','#f0fdf4','3. Upload the file','Drag and drop onto the import screen. We validate and preview before saving.'],
            ['bi-check2-circle','var(--orange)','#fff7ed','4. Review & confirm','Fix any validation errors. Confirm and all questions land in your bank instantly.'],
          ]; foreach($steps as $i=>$s): ?>
          <div class="col-6">
            <div class="import-step h-100">
              <div class="feat-icon mx-auto mb-3" style="background:<?= $s[2] ?>;color:<?= $s[1] ?>;">
                <i class="bi <?= $s[0] ?>"></i>
              </div>
              <div class="fw-700 mb-1" style="font-size:.85rem;color:var(--navy);"><?= $s[3] ?></div>
              <p class="text-muted mb-0" style="font-size:.78rem;"><?= $s[4] ?></p>
            </div>
          </div>
          <?php endforeach; ?>
        </div>

        <!-- Excel preview mock -->
        <div class="mt-3 border rounded-3 overflow-hidden shadow-sm">
          <div style="background:#1d6f42;padding:7px 14px;display:flex;align-items:center;gap:8px;">
            <i class="bi bi-file-earmark-excel-fill text-white"></i>
            <span style="color:#fff;font-size:.78rem;font-weight:600;">question_import_template.xlsx</span>
          </div>
          <div style="overflow-x:auto;background:#fff;">
            <table style="width:100%;font-size:.7rem;border-collapse:collapse;">
              <thead>
                <tr style="background:#e8f5e9;">
                  <?php foreach(['question_text','option_a','option_b','option_c','option_d','correct_answer','subject','chapter','difficulty','type'] as $h): ?>
                  <th style="padding:5px 8px;border:1px solid #c8e6c9;white-space:nowrap;color:#1d6f42;font-weight:700;"><?= $h ?></th>
                  <?php endforeach; ?>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="padding:5px 8px;border:1px solid #e2e8f0;max-width:140px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">A particle moves in a circle…</td>
                  <td style="padding:5px 8px;border:1px solid #e2e8f0;">v</td>
                  <td style="padding:5px 8px;border:1px solid #e2e8f0;">v√2</td>
                  <td style="padding:5px 8px;border:1px solid #e2e8f0;">v√3</td>
                  <td style="padding:5px 8px;border:1px solid #e2e8f0;">2v</td>
                  <td style="padding:5px 8px;border:1px solid #e2e8f0;background:#f0fdf4;color:#166534;font-weight:700;">B</td>
                  <td style="padding:5px 8px;border:1px solid #e2e8f0;">Physics</td>
                  <td style="padding:5px 8px;border:1px solid #e2e8f0;">Kinematics</td>
                  <td style="padding:5px 8px;border:1px solid #e2e8f0;">Hard</td>
                  <td style="padding:5px 8px;border:1px solid #e2e8f0;">MCQ</td>
                </tr>
                <tr style="background:#fafafa;">
                  <td style="padding:5px 8px;border:1px solid #e2e8f0;color:#94a3b8;font-style:italic;">← your next question</td>
                  <td colspan="9" style="padding:5px 8px;border:1px solid #e2e8f0;color:#cbd5e1;"></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ QUESTION ANALYTICS ═══ -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="row g-5 align-items-center">
      <div class="col-lg-6">
        <span class="badge mb-2 px-3 py-2" style="background:#fff7ed;color:var(--orange);font-size:.78rem;">Question Intelligence</span>
        <h2 class="fw-800 mb-3" style="color:var(--navy);">Your bank gets smarter after every exam</h2>
        <p class="text-muted mb-4">Every time a question is used in a live exam, ExamRankers captures how candidates responded. Over time, each question builds its own performance profile.</p>
        <div class="row g-3">
          <?php $metrics = [
            ['Correct Answer Rate','The % of candidates who got it right. Below 15% flags it for review. Above 92% suggests it is too easy.','#fee2e2','#dc2626'],
            ['Discrimination Index','Measures if high-performing candidates answered correctly more than low-performers. Low index = weak question.','#fef3c7','#92400e'],
            ['Average Time Taken','How long candidates spent on this question on average. Outliers reveal confusing wording or unusual difficulty.','#eff6ff','var(--blue)'],
            ['Usage Count','How many exams has this question appeared in. High usage with high correct rate = consider retiring it.','#f0fdf4','var(--green)'],
          ]; foreach($metrics as $m): ?>
          <div class="col-6">
            <div class="p-3 rounded-3 h-100" style="background:<?= $m[2] ?>;border:1px solid <?= $m[3] ?>22;">
              <div class="fw-700 mb-1" style="font-size:.82rem;color:var(--navy);"><?= $m[0] ?></div>
              <p class="mb-0" style="font-size:.76rem;color:#374151;"><?= $m[1] ?></p>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="col-lg-6">
        <!-- Question detail panel mock -->
        <div class="tag-demo shadow-sm">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <span style="font-size:.78rem;font-weight:700;color:var(--navy);">Question Analytics</span>
            <span class="diff-badge diff-h">Hard</span>
          </div>
          <div style="font-size:.82rem;color:var(--navy);font-weight:500;border-left:3px solid var(--orange);padding-left:10px;margin-bottom:16px;line-height:1.5;">
            "A particle moves in a circle of radius R…"
          </div>
          <?php $qstats = [
            ['Correct Answer Rate','34%','bar','#ef4444',34],
            ['Discrimination Index','0.62','badge','var(--green)',null],
            ['Average Time Taken','3 min 12 sec','badge','var(--blue)',null],
            ['Total Usage','14 exams','badge','var(--purple)',null],
            ['Candidate Attempts','28,400','badge','var(--navy)',null],
          ]; foreach($qstats as $s): ?>
          <div class="d-flex align-items-center justify-content-between mb-2 pb-2 border-bottom">
            <span style="font-size:.78rem;color:#64748b;"><?= $s[0] ?></span>
            <?php if($s[2]==='bar'): ?>
            <div class="d-flex align-items-center gap-2">
              <div style="width:80px;height:6px;background:#f1f5f9;border-radius:3px;overflow:hidden;">
                <div style="width:<?= $s[4] ?>%;height:100%;background:<?= $s[3] ?>;border-radius:3px;"></div>
              </div>
              <span class="fw-700" style="color:<?= $s[3] ?>;font-size:.82rem;"><?= $s[1] ?></span>
            </div>
            <?php else: ?>
            <span class="fw-700" style="color:<?= $s[3] ?>;font-size:.82rem;"><?= $s[1] ?></span>
            <?php endif; ?>
          </div>
          <?php endforeach; ?>
          <div class="d-flex align-items-center gap-2 mt-2 p-2 rounded-2" style="background:#fef3c7;">
            <i class="bi bi-exclamation-triangle-fill" style="color:#92400e;font-size:.85rem;"></i>
            <span style="font-size:.75rem;color:#92400e;">Correct rate below 40% — consider reviewing question wording.</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ PLAN TABLE ═══ -->
<section class="py-5">
  <div class="container">
    <h2 class="fw-800 text-center mb-2" style="color:var(--navy);">Question bank features by plan</h2>
    <p class="text-center text-muted mb-5">All plans get a full question bank. Advanced analytics and import options on higher tiers.</p>
    <div class="table-responsive rounded-3 border shadow-sm">
      <table class="table cmp mb-0 bg-white">
        <thead>
          <tr>
            <th style="width:44%;">Feature</th>
            <th class="text-center">Starter</th>
            <th class="text-center" style="background:#eff6ff;">Professional</th>
            <th class="text-center">Enterprise</th>
          </tr>
        </thead>
        <tbody>
          <?php $rows = [
            ['Unlimited questions per bank','✓','✓','✓'],
            ['MCQ, True/False, Fill in blank','✓','✓','✓'],
            ['Descriptive / essay questions','✓','✓','✓'],
            ['Images & media in questions','✓','✓','✓'],
            ['LaTeX / MathJax equations','✓','✓','✓'],
            ['Subject, chapter & difficulty tags','✓','✓','✓'],
            ['Difficulty-balanced randomisation','✓','✓','✓'],
            ['Excel / CSV bulk import','✓','✓','✓'],
            ['Numerical answer type','✗','✓','✓'],
            ['Match the following type','✗','✓','✓'],
            ['Ordering / sequencing type','✗','✓','✓'],
            ['Coding challenge type','✗','✓','✓'],
            ['Word / DOCX import','✗','✓','✓'],
            ['Question performance analytics','✗','✓','✓'],
            ['Discrimination index reporting','✗','✓','✓'],
            ['Multi-language questions','✗','✓','✓'],
            ['Question version history','✗','✗','✓'],
            ['Department-level access control','✗','✗','✓'],
            ['API-based question management','✗','✗','✓'],
          ]; foreach($rows as $r): ?>
          <tr>
            <td class="text-muted"><?= $r[0] ?></td>
            <?php for($i=1;$i<=3;$i++): ?>
            <td class="text-center <?= $i===2?'bg-light':'' ?>">
              <?php if($r[$i]==='✓') echo '<i class="bi bi-check-circle-fill chk fs-5"></i>';
              else echo '<i class="bi bi-x-circle-fill crs fs-5"></i>'; ?>
            </td>
            <?php endfor; ?>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <div class="text-center mt-4">
      <a href="<?= base_url('pricing') ?>" class="btn btn-outline-primary px-4">See full pricing →</a>
    </div>
  </div>
</section>

<!-- ═══ TESTIMONIAL ═══ -->
<section class="py-5 bg-light">
  <div class="container" style="max-width:800px;">
    <div style="border-left:5px solid var(--purple);background:#faf5ff;border-radius:0 14px 14px 0;padding:28px 32px;">
      <i class="bi bi-quote fs-1 mb-3 d-block" style="color:var(--purple);opacity:.35;"></i>
      <p class="fs-5 fst-italic text-muted mb-4">"We imported 4,200 questions from Excel in under 20 minutes. The tagging system is incredibly well thought out — we can now pull a balanced 90-question JEE paper in seconds, with every student getting a unique set. Our faculty haven't had to manually check for repeated questions since."</p>
      <div class="d-flex align-items-center gap-3">
        <div style="width:44px;height:44px;border-radius:50%;background:var(--purple);display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;">S</div>
        <div>
          <strong style="color:var(--navy);">Sunita Gupta</strong>
          <div class="text-muted small">CEO, TopRanker Coaching</div>
        </div>
        <div class="ms-auto">
          <?php for($i=0;$i<5;$i++): ?><i class="bi bi-star-fill" style="color:#f59e0b;font-size:.9rem;"></i><?php endfor; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ CTA ═══ -->
<section class="py-5 text-center" style="background:linear-gradient(135deg,var(--navy),#111b47);">
  <div class="container">
    <h2 class="fw-800 text-white mb-3">Build your question bank today</h2>
    <p class="mb-4" style="color:#94a3b8;max-width:480px;margin:0 auto 1.5rem;">Start with our free trial — import your existing questions and run your first exam in under 30 minutes. No credit card required.</p>
    <div class="d-flex justify-content-center gap-3 flex-wrap">
      <a href="<?= base_url('contact') ?>" class="btn btn-primary btn-lg px-5">Start Free Trial</a>
      <a href="<?= base_url('contact') ?>" class="btn btn-outline-light btn-lg px-4">Book a Demo</a>
    </div>
  </div>
</section>
