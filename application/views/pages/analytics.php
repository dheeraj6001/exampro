<style>
:root{--navy:#0b1437;--blue:#1a56db;--green:#16a34a;--purple:#7c3aed;--orange:#ea580c;}

/* Hero */
.hero{background:linear-gradient(135deg,var(--navy) 0%,#111b47 100%);padding:90px 0 0;overflow:hidden;}
.hero h1{color:#fff;font-weight:800;}
.hero p{color:#94a3b8;}
.hero-screen{background:#fff;border-radius:16px 16px 0 0;box-shadow:0 -8px 60px rgba(0,0,0,.3);overflow:hidden;}
.hero-screen-bar{background:#f1f5f9;padding:10px 16px;display:flex;align-items:center;gap:8px;border-bottom:1px solid #e2e8f0;}
.hero-screen-dot{width:10px;height:10px;border-radius:50%;}

/* Stat cards inside hero screen */
.dash-stat{background:#fff;border:1px solid #e2e8f0;border-radius:10px;padding:14px 18px;}
.dash-stat .num{font-size:1.6rem;font-weight:800;line-height:1;}
.dash-stat .lbl{font-size:.72rem;color:#64748b;margin-top:3px;}
.dash-stat .delta{font-size:.72rem;font-weight:700;padding:2px 7px;border-radius:12px;}
.delta-up{background:#dcfce7;color:#16a34a;}
.delta-dn{background:#fee2e2;color:#dc2626;}

/* Bar chart mock */
.bar-wrap{display:flex;align-items:flex-end;gap:6px;height:90px;padding:0 4px;}
.bar{border-radius:4px 4px 0 0;min-width:18px;flex:1;transition:.3s;}

/* Donut mock */
.donut-ring{width:90px;height:90px;border-radius:50%;background:conic-gradient(var(--blue) 0% 38%,var(--green) 38% 62%,var(--purple) 62% 80%,var(--orange) 80% 100%);}
.donut-hole{width:58px;height:58px;border-radius:50%;background:#fff;position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);}

/* Feature cards */
.feat-card{background:#fff;border:1px solid #e2e8f0;border-radius:14px;padding:28px;height:100%;transition:.18s;}
.feat-card:hover{box-shadow:0 10px 36px rgba(0,0,0,.08);transform:translateY(-4px);}
.feat-icon{width:52px;height:52px;border-radius:13px;display:flex;align-items:center;justify-content:center;font-size:1.4rem;margin-bottom:16px;}

/* Chart section */
.chart-card{background:#fff;border:1px solid #e2e8f0;border-radius:14px;padding:24px;}

/* Report type cards */
.report-pill{display:flex;align-items:center;gap:12px;padding:14px 18px;background:#fff;border:1px solid #e2e8f0;border-radius:10px;transition:.15s;}
.report-pill:hover{border-color:var(--blue);box-shadow:0 4px 16px rgba(26,86,219,.08);}

/* Comparison table */
.cmp th{background:#f8fafc;font-size:.78rem;text-transform:uppercase;letter-spacing:.5px;color:#64748b;padding:12px 18px;}
.cmp td{padding:12px 18px;vertical-align:middle;font-size:.88rem;}
.chk{color:var(--green);}
.crs{color:#cbd5e1;}

/* Testimonial */
.quote-card{border-left:5px solid var(--blue);background:#f8faff;border-radius:0 14px 14px 0;padding:24px 28px;}
</style>

<!-- ═══ HERO ═══ -->
<section class="hero">
  <div class="container">
    <div class="row align-items-end g-4">
      <div class="col-lg-5 pb-5">
        <span class="badge mb-3 px-3 py-2" style="background:rgba(26,86,219,.25);color:#93c5fd;font-size:.78rem;">
          <i class="bi bi-bar-chart-line-fill me-1"></i>Analytics & Reporting
        </span>
        <h1 class="display-5 mb-3">Turn every exam into actionable insight</h1>
        <p class="lead mb-4">Instant rank lists, topic-wise heatmaps, cohort trends, and one-click exports — everything you need to make assessment data work for you.</p>
        <div class="d-flex gap-3 flex-wrap">
          <a href="<?= base_url('contact') ?>" class="btn btn-primary btn-lg px-5">See a Live Demo</a>
          <a href="<?= base_url('pricing') ?>" class="btn btn-outline-light btn-lg px-4">View Pricing</a>
        </div>
        <div class="d-flex gap-4 mt-4 flex-wrap">
          <?php foreach([['90 sec','Rank list generation'],['15+','Report types'],['CSV/Excel/PDF','Export formats']] as $s): ?>
          <div>
            <div class="fw-800 text-white" style="font-size:1.1rem;"><?= $s[0] ?></div>
            <div style="font-size:.75rem;color:#64748b;"><?= $s[1] ?></div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Dashboard mock-up -->
      <div class="col-lg-7 d-none d-lg-block">
        <div class="hero-screen">
          <div class="hero-screen-bar">
            <span class="hero-screen-dot" style="background:#ef4444;"></span>
            <span class="hero-screen-dot" style="background:#f59e0b;"></span>
            <span class="hero-screen-dot" style="background:#22c55e;"></span>
            <span style="font-size:.72rem;color:#94a3b8;margin-left:8px;">ExamRankers · Analytics Dashboard</span>
          </div>
          <div style="background:#f8fafc;padding:20px;">
            <!-- Stat row -->
            <div class="row g-3 mb-3">
              <?php foreach([
                ['2,847','Total candidates','↑ 12%','up','var(--blue)'],
                ['73.4%','Avg. pass rate','↑ 4%','up','var(--green)'],
                ['68/100','Avg. score','↓ 2%','dn','var(--orange)'],
                ['4 min 12s','Avg. time/question','–','','var(--purple)'],
              ] as $s): ?>
              <div class="col-3">
                <div class="dash-stat">
                  <div class="num" style="color:<?= $s[4] ?>;font-size:1.25rem;"><?= $s[0] ?></div>
                  <div class="lbl"><?= $s[1] ?></div>
                  <?php if($s[2]!=='–'): ?>
                  <span class="delta delta-<?= $s[3] ?> mt-1 d-inline-block"><?= $s[2] ?></span>
                  <?php endif; ?>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
            <!-- Charts row -->
            <div class="row g-3">
              <div class="col-8">
                <div class="chart-card" style="padding:16px;">
                  <div class="d-flex justify-content-between mb-3">
                    <span style="font-size:.78rem;font-weight:700;color:var(--navy);">Score distribution</span>
                    <span style="font-size:.7rem;color:#94a3b8;">JEE Mock #12</span>
                  </div>
                  <div class="bar-wrap">
                    <?php $bars = [18,42,68,90,75,58,34,20,12,6];
                    $colors=['#dbeafe','#bfdbfe','#93c5fd','#60a5fa','#3b82f6','var(--blue)','#1d4ed8','#1e40af','#1e3a8a','#172554'];
                    foreach($bars as $i=>$h): ?>
                    <div class="bar" style="height:<?= $h ?>%;background:<?= $colors[$i] ?>;"></div>
                    <?php endforeach; ?>
                  </div>
                  <div class="d-flex justify-content-between mt-1">
                    <span style="font-size:.66rem;color:#94a3b8;">0–10</span>
                    <span style="font-size:.66rem;color:#94a3b8;">50</span>
                    <span style="font-size:.66rem;color:#94a3b8;">90–100</span>
                  </div>
                </div>
              </div>
              <div class="col-4">
                <div class="chart-card h-100 d-flex flex-column align-items-center justify-content-center" style="padding:16px;">
                  <span style="font-size:.78rem;font-weight:700;color:var(--navy);margin-bottom:12px;">By subject</span>
                  <div style="position:relative;display:inline-block;">
                    <div class="donut-ring"></div>
                    <div class="donut-hole"></div>
                  </div>
                  <div class="mt-3 w-100">
                    <?php foreach([['Physics','var(--blue)','38%'],['Chemistry','var(--green)','24%'],['Maths','var(--purple)','18%'],['GK','var(--orange)','20%']] as $l): ?>
                    <div class="d-flex justify-content-between" style="font-size:.68rem;margin-bottom:3px;">
                      <span><span style="display:inline-block;width:8px;height:8px;border-radius:50%;background:<?= $l[1] ?>;margin-right:4px;"></span><?= $l[0] ?></span>
                      <strong><?= $l[2] ?></strong>
                    </div>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ FEATURE HIGHLIGHTS ═══ -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="text-center mb-5">
      <span class="badge mb-2 px-3 py-2" style="background:#eff6ff;color:var(--blue);font-size:.78rem;">What you get</span>
      <h2 class="fw-800" style="color:var(--navy);">Every report you'll ever need</h2>
      <p class="text-muted" style="max-width:540px;margin:.75rem auto 0;">Built for institutions that take assessment seriously — from classroom tests to national-level competitive exams.</p>
    </div>
    <div class="row g-4">
      <?php $features = [
        ['bi-lightning-fill','#eff6ff','var(--blue)','Instant Rank Lists','Published within 90 seconds of the last submission. No waiting, no manual calculation. Filter by score, percentile, or category.'],
        ['bi-grid-3x3-gap-fill','#f0fdf4','var(--green)','Topic-wise Performance Heatmap','See exactly which topics candidates struggled with. Identify syllabus gaps across your entire cohort at a glance.'],
        ['bi-people-fill','#faf5ff','var(--purple)','Cohort & Trend Analysis','Compare performance across batches, time periods, or exam series. Track improvement — or flag decline — before it becomes a crisis.'],
        ['bi-clock-history','#fff7ed','var(--orange)','Time-per-Question Analysis','Know how long candidates spent on each question. Identify questions that are confusing vs. genuinely hard.'],
        ['bi-person-lines-fill','#f0fdfa','#0d9488)','Individual Student Reports','Drill into any candidate\'s full answer script, time taken, score breakdown, and percentile rank with one click.'],
        ['bi-funnel-fill','#fdf2f8','#be185d','Evaluator Performance Tracking','For manually marked exams, track marking speed, inter-rater reliability, and moderation flags per evaluator.'],
        ['bi-shield-exclamation','#fef3c7','#92400e','Proctoring Incident Reports','See a timeline of AI proctoring flags per candidate — tab switches, face detection, audio events — with video timestamps.'],
        ['bi-download','#eff6ff','var(--blue)','One-click Data Export','Download any report as CSV, Excel, or PDF. Bulk-export all answer scripts as a zip. Schedule automated email reports.'],
        ['bi-graph-up-arrow','#f0fdf4','var(--green)','Percentile & Z-Score Reports','Normalised scoring for large-cohort competitive exams. Compare performance against national or institutional benchmarks.'],
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

<!-- ═══ REPORT TYPES ═══ -->
<section class="py-5">
  <div class="container">
    <div class="row g-5 align-items-center">
      <div class="col-lg-5">
        <span class="badge mb-2 px-3 py-2" style="background:#f0fdf4;color:var(--green);font-size:.78rem;">15+ Report Types</span>
        <h2 class="fw-800 mb-3" style="color:var(--navy);">The right report for every stakeholder</h2>
        <p class="text-muted mb-4">Candidates, faculty, administrators, and leadership all need different views of the same data. ExamRankers generates them all automatically.</p>
        <a href="<?= base_url('contact') ?>" class="btn btn-primary px-4">Request a Demo →</a>
      </div>
      <div class="col-lg-7">
        <div class="row g-3">
          <?php $reports = [
            ['bi-trophy-fill','var(--blue)','Rank List Report','All candidates ranked by score with percentile, pass/fail, and category-wise cut-offs.'],
            ['bi-person-badge-fill','var(--green)','Individual Score Card','Per-candidate breakdown: subject, topic, marks obtained vs. max, time taken, percentile.'],
            ['bi-thermometer-half','var(--purple)','Topic Heatmap','Colour-coded grid showing average score per topic — instantly reveals syllabus weak spots.'],
            ['bi-clock-fill','var(--orange)','Time Analysis Report','Average and median time per question, section, and candidate — flags time pressure issues.'],
            ['bi-graph-up','#0d9488','Trend Report','Score trends across multiple exams in a series — track cohort improvement over time.'],
            ['bi-file-earmark-bar-graph-fill','#be185d','Evaluator Report','Marks awarded per evaluator, average marking time, and inter-rater reliability coefficient.'],
            ['bi-camera-video-fill','#92400e','Proctoring Summary','Flags per candidate sorted by severity — prioritise manual review efficiently.'],
            ['bi-file-earmark-pdf-fill','var(--blue)','Custom Export','Build your own report template. Export scheduled to your email or SFTP.'],
          ]; foreach($reports as $r): ?>
          <div class="col-sm-6">
            <div class="report-pill">
              <div style="width:36px;height:36px;border-radius:9px;background:#f8fafc;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                <i class="bi <?= $r[0] ?>" style="color:<?= $r[1] ?>;font-size:1rem;"></i>
              </div>
              <div>
                <div class="fw-700" style="font-size:.82rem;color:var(--navy);"><?= $r[2] ?></div>
                <div class="text-muted" style="font-size:.74rem;"><?= $r[3] ?></div>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ DEEP DIVE — TOPIC HEATMAP ═══ -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="row g-5 align-items-center">
      <div class="col-lg-6">
        <!-- Heatmap mock-up -->
        <div class="chart-card shadow-sm">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
              <h6 class="fw-700 mb-0" style="color:var(--navy);">Topic Performance Heatmap</h6>
              <span class="text-muted" style="font-size:.75rem;">JEE Main Mock #12 · 2,847 candidates</span>
            </div>
            <span class="badge" style="background:#eff6ff;color:var(--blue);font-size:.72rem;">Auto-generated</span>
          </div>
          <?php
          $topics = [
            ['Kinematics',        82, 'up'],
            ['Thermodynamics',    54, 'dn'],
            ['Electrostatics',    61, 'up'],
            ['Organic Chemistry', 48, 'dn'],
            ['Inorganic Chem.',   70, 'up'],
            ['Integration',       43, 'dn'],
            ['Probability',       67, 'up'],
            ['Coordinate Geo.',   55, 'dn'],
          ];
          foreach ($topics as $t):
            $pct = $t[1];
            $col = $pct >= 70 ? '#16a34a' : ($pct >= 55 ? '#f59e0b' : '#ef4444');
            $bg  = $pct >= 70 ? '#dcfce7' : ($pct >= 55 ? '#fef3c7' : '#fee2e2');
          ?>
          <div class="d-flex align-items-center gap-3 mb-2">
            <span style="width:130px;font-size:.8rem;color:#374151;flex-shrink:0;"><?= $t[0] ?></span>
            <div style="flex:1;background:#f1f5f9;border-radius:6px;height:22px;overflow:hidden;">
              <div style="width:<?= $pct ?>%;height:100%;background:<?= $col ?>;border-radius:6px;transition:.4s;"></div>
            </div>
            <span style="width:38px;text-align:right;font-size:.8rem;font-weight:700;color:<?= $col ?>;"><?= $pct ?>%</span>
            <span style="font-size:.72rem;padding:2px 8px;border-radius:12px;background:<?= $bg ?>;color:<?= $col ?>;width:48px;text-align:center;">
              <?= $t[2]==='up' ? '▲' : '▼' ?>
            </span>
          </div>
          <?php endforeach; ?>
          <div class="d-flex gap-3 mt-4 pt-3 border-top">
            <span style="font-size:.72rem;"><span style="display:inline-block;width:10px;height:10px;background:#16a34a;border-radius:2px;margin-right:4px;"></span>Strong (≥70%)</span>
            <span style="font-size:.72rem;"><span style="display:inline-block;width:10px;height:10px;background:#f59e0b;border-radius:2px;margin-right:4px;"></span>Moderate (55–69%)</span>
            <span style="font-size:.72rem;"><span style="display:inline-block;width:10px;height:10px;background:#ef4444;border-radius:2px;margin-right:4px;"></span>Weak (&lt;55%)</span>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <span class="badge mb-2 px-3 py-2" style="background:#eff6ff;color:var(--blue);font-size:.78rem;">Topic Heatmap</span>
        <h2 class="fw-800 mb-3" style="color:var(--navy);">Know exactly where your students are struggling</h2>
        <p class="text-muted mb-4">The topic heatmap gives you a colour-coded breakdown of average performance per chapter — across the entire cohort, not just one student. Red topics tell you where to focus your next teaching cycle.</p>
        <ul class="list-unstyled">
          <?php foreach([
            ['bi-check-circle-fill','var(--green)','Refreshed within 90 seconds of exam close'],
            ['bi-check-circle-fill','var(--green)','Drill down from subject → chapter → individual question'],
            ['bi-check-circle-fill','var(--green)','Compare across multiple exam series to track improvement'],
            ['bi-check-circle-fill','var(--green)','Export as PDF to share with teaching staff in one click'],
          ] as $li): ?>
          <li class="d-flex gap-2 mb-2" style="font-size:.9rem;color:#374151;">
            <i class="bi <?= $li[0] ?> mt-1 flex-shrink-0" style="color:<?= $li[1] ?>;"></i><?= $li[2] ?>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ═══ EXPORT & INTEGRATIONS ═══ -->
<section class="py-5">
  <div class="container">
    <div class="text-center mb-5">
      <span class="badge mb-2 px-3 py-2" style="background:#faf5ff;color:var(--purple);font-size:.78rem;">Export & Integrations</span>
      <h2 class="fw-800" style="color:var(--navy);">Your data, your way</h2>
      <p class="text-muted" style="max-width:520px;margin:.75rem auto 0;">Export to any format, schedule automated reports, or push data directly into your existing systems via API.</p>
    </div>
    <div class="row g-4 justify-content-center">
      <?php $exports = [
        ['bi-file-earmark-spreadsheet-fill','#f0fdf4','var(--green)','Excel / CSV Export','Download any report as a formatted Excel workbook or raw CSV. Compatible with Google Sheets, Power BI, and Tableau.'],
        ['bi-file-earmark-pdf-fill','#fee2e2','#dc2626','PDF Reports','Branded PDF scorecards and rank lists. Ideal for sharing with parents, HR teams, or accreditation bodies.'],
        ['bi-envelope-at-fill','#eff6ff','var(--blue)','Scheduled Email Reports','Set up automatic weekly or post-exam report delivery to faculty, coordinators, or leadership — no manual steps.'],
        ['bi-code-slash','#faf5ff','var(--purple)','REST API Access','Pull any analytics data programmatically. Push scores into your LMS, HRMS, or data warehouse via webhook or API.'],
        ['bi-database-fill-gear','#fff7ed','var(--orange)','Bulk Script Export','Download all candidate answer scripts as a structured zip — full audit trail for NAAC, RTI, or legal requirements.'],
        ['bi-graph-up-arrow','#f0fdfa','#0d9488','Power BI / Tableau Ready','Export structured datasets that drop directly into Power BI or Tableau dashboards with zero transformation needed.'],
      ]; foreach($exports as $e): ?>
      <div class="col-md-6 col-lg-4">
        <div class="feat-card">
          <div class="feat-icon" style="background:<?= $e[1] ?>;color:<?= $e[2] ?>;"><i class="bi <?= $e[0] ?>"></i></div>
          <h6 class="fw-700 mb-2" style="color:var(--navy);"><?= $e[3] ?></h6>
          <p class="text-muted mb-0" style="font-size:.87rem;"><?= $e[4] ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ═══ PLAN COMPARISON ═══ -->
<section class="py-5 bg-light">
  <div class="container">
    <h2 class="fw-800 text-center mb-2" style="color:var(--navy);">Analytics by plan</h2>
    <p class="text-center text-muted mb-5">More depth as you scale.</p>
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
            ['Rank list & score reports','✓','✓','✓'],
            ['Individual score cards','✓','✓','✓'],
            ['Category / section breakdown','✓','✓','✓'],
            ['CSV & PDF export','✓','✓','✓'],
            ['Topic-wise heatmap','✗','✓','✓'],
            ['Time-per-question analysis','✗','✓','✓'],
            ['Cohort trend analysis','✗','✓','✓'],
            ['Percentile & Z-score reports','✗','✓','✓'],
            ['Evaluator performance tracking','✗','✓','✓'],
            ['Proctoring incident reports','✗','✓','✓'],
            ['Scheduled email reports','✗','✓','✓'],
            ['REST API analytics access','✗','✓','✓'],
            ['Power BI / Tableau export','✗','✗','✓'],
            ['Custom report templates','✗','✗','✓'],
            ['Bulk answer-script export','✗','✗','✓'],
            ['Dedicated analytics account manager','✗','✗','✓'],
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
<section class="py-5">
  <div class="container" style="max-width:800px;">
    <div class="quote-card">
      <i class="bi bi-quote fs-1 mb-3 d-block" style="color:var(--blue);opacity:.35;"></i>
      <p class="fs-5 fst-italic text-muted mb-4">"The topic heatmap alone changed how we plan our teaching calendar. We can see within 90 seconds which chapters the entire cohort struggled with and adjust next week's revision accordingly. No other platform gives us that speed."</p>
      <div class="d-flex align-items-center gap-3">
        <div style="width:44px;height:44px;border-radius:50%;background:var(--blue);display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;">P</div>
        <div>
          <strong style="color:var(--navy);">Priya Nair</strong>
          <div class="text-muted small">Director, EduVision Academy</div>
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
    <h2 class="fw-800 text-white mb-3">See your exam data come alive</h2>
    <p class="mb-4" style="color:#94a3b8;max-width:480px;margin:0 auto 1.5rem;">Book a free 30-minute demo and we will walk you through the analytics dashboard with your use case in mind.</p>
    <div class="d-flex justify-content-center gap-3 flex-wrap">
      <a href="<?= base_url('contact') ?>" class="btn btn-primary btn-lg px-5">Book a Free Demo</a>
      <a href="<?= base_url('pricing') ?>" class="btn btn-outline-light btn-lg px-4">View Pricing</a>
    </div>
  </div>
</section>
