<style>
:root{--navy:#0b1437;--blue:#1a56db;--green:#16a34a;--red:#dc2626;--orange:#ea580c;--purple:#7c3aed;}

/* Hero */
.le-hero{background:linear-gradient(135deg,var(--navy) 0%,#111b47 100%);padding:90px 0 0;overflow:hidden;}
.le-hero h1{color:#fff;font-weight:800;}
.le-hero p{color:#94a3b8;}

/* Live badge pulse */
.live-dot{width:10px;height:10px;border-radius:50%;background:#22c55e;display:inline-block;margin-right:6px;animation:pulse-dot 1.4s infinite;}
@keyframes pulse-dot{0%,100%{box-shadow:0 0 0 0 rgba(34,197,94,.5);}50%{box-shadow:0 0 0 6px rgba(34,197,94,0);}}

/* Exam interface mock */
.exam-mock{background:#fff;border-radius:16px 16px 0 0;box-shadow:0 -10px 60px rgba(0,0,0,.3);overflow:hidden;}
.exam-topbar{background:var(--navy);padding:12px 20px;display:flex;align-items:center;justify-content:space-between;}
.exam-topbar .timer{background:#dc2626;color:#fff;font-weight:800;font-size:.9rem;padding:5px 14px;border-radius:8px;font-family:monospace;letter-spacing:1px;}
.exam-body{display:grid;grid-template-columns:1fr 200px;min-height:320px;}
.exam-main{padding:20px 24px;border-right:1px solid #f1f5f9;}
.exam-sidebar{padding:16px;background:#f8fafc;}
.q-num{font-size:.72rem;color:#94a3b8;margin-bottom:8px;}
.q-text{font-size:.88rem;font-weight:600;color:var(--navy);margin-bottom:14px;line-height:1.5;}
.opt{display:flex;align-items:center;gap:10px;padding:8px 12px;border:1px solid #e2e8f0;border-radius:8px;margin-bottom:6px;font-size:.82rem;cursor:pointer;transition:.12s;}
.opt.selected{border-color:var(--blue);background:#eff6ff;color:var(--blue);}
.opt-circle{width:20px;height:20px;border-radius:50%;border:2px solid #cbd5e1;flex-shrink:0;display:flex;align-items:center;justify-content:center;font-size:.65rem;font-weight:700;}
.opt.selected .opt-circle{border-color:var(--blue);background:var(--blue);color:#fff;}
.q-grid{display:grid;grid-template-columns:repeat(5,1fr);gap:4px;}
.q-btn{width:28px;height:28px;border-radius:5px;font-size:.7rem;font-weight:700;display:flex;align-items:center;justify-content:center;border:none;cursor:pointer;}
.q-answered{background:#dcfce7;color:#16a34a;}
.q-current{background:var(--blue);color:#fff;}
.q-flagged{background:#fef3c7;color:#92400e;}
.q-unattempted{background:#f1f5f9;color:#94a3b8;}
.exam-footer{background:#f8fafc;border-top:1px solid #e2e8f0;padding:10px 20px;display:flex;align-items:center;justify-content:space-between;}
.progress-bar-custom{height:6px;background:#e2e8f0;border-radius:3px;overflow:hidden;flex:1;margin:0 16px;}
.progress-fill{height:100%;border-radius:3px;background:var(--blue);transition:.3s;}

/* Monitor panel mock */
.monitor-panel{background:#0f172a;border-radius:14px;padding:20px;overflow:hidden;}
.candidate-row{display:flex;align-items:center;gap:10px;padding:8px 0;border-bottom:1px solid rgba(255,255,255,.05);}
.candidate-row:last-child{border-bottom:none;}
.av{width:28px;height:28px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:.7rem;font-weight:700;color:#fff;flex-shrink:0;}
.status-dot-sm{width:7px;height:7px;border-radius:50%;flex-shrink:0;}
.mini-bar{height:4px;border-radius:2px;background:rgba(255,255,255,.1);overflow:hidden;width:60px;}
.mini-fill{height:100%;border-radius:2px;}

/* Feature cards */
.feat-card{background:#fff;border:1px solid #e2e8f0;border-radius:14px;padding:26px;height:100%;transition:.18s;}
.feat-card:hover{box-shadow:0 10px 36px rgba(0,0,0,.09);transform:translateY(-4px);}
.feat-icon{width:52px;height:52px;border-radius:13px;display:flex;align-items:center;justify-content:center;font-size:1.4rem;margin-bottom:16px;}

/* Timeline */
.tl-item{display:flex;gap:16px;margin-bottom:28px;position:relative;}
.tl-item::before{content:'';position:absolute;left:19px;top:42px;bottom:-28px;width:2px;background:#e2e8f0;}
.tl-item:last-child::before{display:none;}
.tl-dot{width:40px;height:40px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:1rem;flex-shrink:0;position:relative;z-index:1;}

/* Stat strip */
.stat-strip{background:var(--blue);padding:30px 0;}
.stat-strip .num{font-size:2rem;font-weight:800;color:#fff;line-height:1;}
.stat-strip .lbl{font-size:.78rem;color:#bfdbfe;margin-top:4px;}

/* Security cards */
.sec-card{border-left:4px solid transparent;background:#fff;border-radius:0 12px 12px 0;padding:16px 20px;border:1px solid #e2e8f0;height:100%;}

/* cmp table */
.cmp th{background:#f8fafc;font-size:.78rem;text-transform:uppercase;letter-spacing:.5px;color:#64748b;padding:12px 18px;}
.cmp td{padding:12px 18px;vertical-align:middle;font-size:.88rem;}
.chk{color:var(--green);}
.crs{color:#cbd5e1;}
</style>

<!-- ═══ HERO ═══ -->
<section class="le-hero">
  <div class="container">
    <div class="row align-items-end g-5">
      <div class="col-lg-5 pb-5">
        <div class="d-flex align-items-center gap-2 mb-3">
          <span class="badge px-3 py-2" style="background:rgba(34,197,94,.15);color:#4ade80;font-size:.78rem;">
            <span class="live-dot"></span>Live Exams
          </span>
          <span class="badge px-3 py-2" style="background:rgba(26,86,219,.2);color:#93c5fd;font-size:.78rem;">
            Up to 1 lakh concurrent
          </span>
        </div>
        <h1 class="display-5 mb-3">The exam platform that never goes down when it matters most</h1>
        <p class="lead mb-4">Auto-scaling infrastructure, real-time candidate monitoring, browser lockdown, and instant results — built for the moments when failure is not an option.</p>
        <div class="d-flex gap-3 flex-wrap mb-4">
          <a href="<?= base_url('contact') ?>" class="btn btn-primary btn-lg px-5">Start Free Trial</a>
          <a href="<?= base_url('pricing') ?>" class="btn btn-outline-light btn-lg px-4">View Pricing</a>
        </div>
        <div class="d-flex gap-4 flex-wrap">
          <?php foreach([['1 lakh+','Concurrent candidates'],['99.99%','Uptime on exam day'],['90 sec','Result publication']] as $s): ?>
          <div>
            <div class="fw-800 text-white" style="font-size:1.05rem;"><?= $s[0] ?></div>
            <div style="font-size:.74rem;color:#64748b;"><?= $s[1] ?></div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Exam interface mock -->
      <div class="col-lg-7 d-none d-lg-block">
        <div class="exam-mock">
          <div class="exam-topbar">
            <div class="d-flex align-items-center gap-3">
              <span style="color:#fff;font-size:.82rem;font-weight:700;">JEE Main Mock #12</span>
              <span style="background:rgba(255,255,255,.1);color:#94a3b8;font-size:.72rem;padding:3px 10px;border-radius:12px;">Physics · Section A</span>
            </div>
            <div class="d-flex align-items-center gap-3">
              <span style="color:#94a3b8;font-size:.75rem;">Q 23 of 90</span>
              <div class="timer">01:24:38</div>
            </div>
          </div>
          <div class="exam-body">
            <div class="exam-main">
              <div class="q-num">Question 23 &nbsp;·&nbsp; 4 marks &nbsp;·&nbsp; Negative: −1</div>
              <div class="q-text">A particle moves in a circle of radius R with constant speed v. The magnitude of the change in velocity when the particle moves through an angle of 60° is:</div>
              <?php $opts=[['A','v',''],['B','v√2','selected'],['C','v√3',''],['D','2v','']];
              foreach($opts as $o): ?>
              <div class="opt <?= $o[2] ?>">
                <div class="opt-circle"><?= $o[0] ?></div>
                <span><?= $o[1] ?></span>
              </div>
              <?php endforeach; ?>
              <div class="d-flex gap-2 mt-3">
                <button class="btn btn-sm btn-outline-secondary px-3">← Previous</button>
                <button class="btn btn-sm" style="background:#fef3c7;color:#92400e;border:none;">🚩 Flag</button>
                <button class="btn btn-sm btn-primary px-3 ms-auto">Save & Next →</button>
              </div>
            </div>
            <div class="exam-sidebar">
              <div style="font-size:.72rem;font-weight:700;color:#64748b;margin-bottom:8px;text-transform:uppercase;letter-spacing:.5px;">Questions</div>
              <div class="q-grid mb-3">
                <?php
                $states=['answered','answered','answered','flagged','answered','answered','answered','answered','answered','answered','answered','answered','answered','answered','answered','answered','answered','flagged','answered','answered','answered','answered','current','unattempted','unattempted','unattempted','unattempted','unattempted','unattempted','unattempted'];
                foreach($states as $i=>$st): ?>
                <div class="q-btn q-<?= $st ?>"><?= $i+1 ?></div>
                <?php endforeach; ?>
              </div>
              <div style="font-size:.68rem;color:#94a3b8;">
                <div class="d-flex align-items-center gap-1 mb-1"><div style="width:10px;height:10px;border-radius:2px;background:#dcfce7;"></div> Answered (20)</div>
                <div class="d-flex align-items-center gap-1 mb-1"><div style="width:10px;height:10px;border-radius:2px;background:#fef3c7;"></div> Flagged (2)</div>
                <div class="d-flex align-items-center gap-1"><div style="width:10px;height:10px;border-radius:2px;background:#f1f5f9;"></div> Unattempted (68)</div>
              </div>
            </div>
          </div>
          <div class="exam-footer">
            <span style="font-size:.75rem;color:#64748b;"><i class="bi bi-check-circle-fill text-success me-1"></i>Auto-saved 3 sec ago</span>
            <div class="progress-bar-custom"><div class="progress-fill" style="width:25%;"></div></div>
            <span style="font-size:.75rem;color:#64748b;">25% complete</span>
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
      <?php foreach([['1 lakh+','Concurrent exam-takers'],['99.99%','Uptime guarantee'],['30 sec','Auto-save interval'],['0','Data loss incidents']] as $s): ?>
      <div class="col-6 col-md-3">
        <div class="num"><?= $s[0] ?></div>
        <div class="lbl"><?= $s[1] ?></div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<!-- ═══ FEATURES ═══ -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="text-center mb-5">
      <span class="badge mb-2 px-3 py-2" style="background:#eff6ff;color:var(--blue);font-size:.78rem;">Platform Features</span>
      <h2 class="fw-800" style="color:var(--navy);">Built for the toughest exam days</h2>
      <p class="text-muted" style="max-width:520px;margin:.75rem auto 0;">Every feature exists because a real institution ran into a real problem. We solved it so you don't have to.</p>
    </div>
    <div class="row g-4">
      <?php $features = [
        ['bi-lightning-fill','#eff6ff','var(--blue)','Auto-Scaling Infrastructure','Spins up additional compute automatically when candidate traffic spikes. 1,000 or 1,00,000 simultaneous logins — same response time.'],
        ['bi-wifi-off','#f0fdf4','var(--green)','30-Second Auto-Save','Answers saved to server every 30 seconds. If a candidate loses connectivity mid-exam, they reconnect and resume — no answers lost.'],
        ['bi-laptop','#fdf2f8','#be185d','Browser Lockdown','Full-screen enforcement, tab-switch detection, copy-paste blocking, right-click disable, and keyboard shortcut prevention — all configurable per exam.'],
        ['bi-stopwatch-fill','#fff7ed','var(--orange)','Flexible Timer Modes','Set a single global countdown, per-section timers, or per-question time limits. Candidates see a live timer throughout.'],
        ['bi-shuffle','#faf5ff','var(--purple)','Question Randomisation','Draw from your bank with difficulty-balanced randomisation. Shuffle option order. Every candidate sees a unique paper.'],
        ['bi-eye-fill','#eff6ff','var(--blue)','Live Candidate Monitoring','Watch progress, connection status, and proctoring flags for every candidate in real time from the invigilator dashboard.'],
        ['bi-camera-video-fill','#f0fdf4','var(--green)','AI Proctoring Integration','AI monitors webcam feed for tab switches, multiple faces, phone use, and audio anomalies. Flags reviewed post-exam or escalated live.'],
        ['bi-geo-alt-fill','#fdf2f8','#be185d','Geo-Fencing','Restrict exam access to specific locations, IP ranges, or registered exam centres. Ideal for CBT hall deployments.'],
        ['bi-hdd-fill','#f8fafc','var(--navy)','Local LAN / Offline Mode','Run exams over a local network without internet. Answers sync when connectivity returns. Critical for rural CBT centres.'],
        ['bi-people-fill','#faf5ff','var(--purple)','Batch & Group Management','Assign candidates to batches, sections, or exam centres. Each group can have different start times or question sets.'],
        ['bi-bell-fill','#fff7ed','var(--orange)','Automated Candidate Notifications','Invite emails, reminder 24h before, 1h before, and start-time alerts sent automatically. No manual follow-up needed.'],
        ['bi-bar-chart-fill','#eff6ff','var(--blue)','Instant Results on Close','Rank lists, score cards, and topic reports published within 90 seconds of the last submission or exam window close.'],
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

<!-- ═══ LIVE MONITORING PANEL ═══ -->
<section class="py-5">
  <div class="container">
    <div class="row g-5 align-items-center">
      <div class="col-lg-6">
        <span class="badge mb-2 px-3 py-2" style="background:#f0fdf4;color:var(--green);font-size:.78rem;"><span class="live-dot"></span>Real-Time Monitoring</span>
        <h2 class="fw-800 mb-3" style="color:var(--navy);">Watch every candidate. Act on every flag.</h2>
        <p class="text-muted mb-4">The invigilator dashboard gives you a live view of every candidate — connection status, questions answered, time remaining, and AI proctoring flags — all updating in real time.</p>
        <ul class="list-unstyled mb-4">
          <?php foreach([
            ['bi-circle-fill','var(--green)','Green = actively answering'],
            ['bi-circle-fill','#f59e0b','Amber = connection unstable'],
            ['bi-circle-fill','var(--red)','Red = disconnected / tab switch detected'],
            ['bi-flag-fill','var(--orange)','Flag icon = AI proctoring alert raised'],
            ['bi-check2-all','var(--blue)','Blue tick = exam submitted'],
          ] as $li): ?>
          <li class="d-flex gap-2 mb-2 align-items-center" style="font-size:.87rem;color:#374151;">
            <i class="bi <?= $li[0] ?> flex-shrink-0" style="color:<?= $li[1] ?>;font-size:.65rem;"></i><?= $li[2] ?>
          </li>
          <?php endforeach; ?>
        </ul>
        <a href="<?= base_url('contact') ?>" class="btn btn-primary px-4">See It in Action →</a>
      </div>
      <div class="col-lg-6">
        <div class="monitor-panel">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <span style="color:#fff;font-size:.82rem;font-weight:700;">Invigilator Dashboard</span>
            <span style="font-size:.72rem;color:#4ade80;"><span class="live-dot" style="width:7px;height:7px;"></span>LIVE</span>
          </div>
          <div class="d-flex gap-3 mb-3">
            <?php foreach([['2,841','Active','#4ade80'],['6','Disconnected','#f87171'],['4','Flagged','#fbbf24']] as $s): ?>
            <div style="background:rgba(255,255,255,.06);border-radius:8px;padding:8px 14px;text-align:center;">
              <div style="font-size:1.1rem;font-weight:800;color:<?= $s[2] ?>;"><?= $s[0] ?></div>
              <div style="font-size:.68rem;color:#64748b;"><?= $s[1] ?></div>
            </div>
            <?php endforeach; ?>
          </div>
          <!-- candidate rows -->
          <?php
          $candidates = [
            ['R','#3b82f6','Rahul Sharma','green','34/90','47:22',false],
            ['P','#8b5cf6','Priya Nair','green','51/90','47:19',false],
            ['A','#ec4899','Ankit Verma','amber','28/90','47:21',true],
            ['S','#f59e0b','Sneha Gupta','green','42/90','47:18',false],
            ['M','#10b981','Mohit Jain','red','19/90','—',false],
            ['K','#06b6d4','Kavya Pillai','green','38/90','47:20',false],
            ['D','#ef4444','Dev Patel','green','45/90','47:17',true],
          ];
          foreach($candidates as $c): ?>
          <div class="candidate-row">
            <div class="av" style="background:<?= $c[1] ?>;font-size:.65rem;"><?= $c[0] ?></div>
            <div style="flex:1;min-width:0;">
              <div style="font-size:.78rem;color:#e2e8f0;font-weight:600;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><?= $c[2] ?></div>
              <div style="font-size:.68rem;color:#64748b;"><?= $c[3]==='amber'?'Unstable connection':($c[3]==='red'?'Disconnected':'Active') ?></div>
            </div>
            <div class="mini-bar">
              <div class="mini-fill" style="width:<?= intval(explode('/',$c[4])[0])/90*100 ?>%;background:<?= $c[3]==='green'?'#4ade80':($c[3]==='amber'?'#fbbf24':'#f87171') ?>;"></div>
            </div>
            <div style="font-size:.72rem;color:#94a3b8;width:36px;text-align:right;"><?= $c[4] ?></div>
            <div style="font-size:.68rem;color:#64748b;width:38px;text-align:right;font-family:monospace;"><?= $c[5] ?></div>
            <?php if($c[6]): ?>
            <i class="bi bi-flag-fill" style="color:#fbbf24;font-size:.75rem;"></i>
            <?php else: ?>
            <div style="width:14px;"></div>
            <?php endif; ?>
            <div class="status-dot-sm" style="background:<?= $c[3]==='green'?'#4ade80':($c[3]==='amber'?'#fbbf24':'#f87171') ?>;"></div>
          </div>
          <?php endforeach; ?>
          <div class="text-center mt-3" style="font-size:.72rem;color:#475569;">Showing 7 of 2,851 candidates · Updates every 5 seconds</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ EXAM LIFECYCLE ═══ -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="row g-5 align-items-start">
      <div class="col-lg-5">
        <span class="badge mb-2 px-3 py-2" style="background:#eff6ff;color:var(--blue);font-size:.78rem;">Exam Lifecycle</span>
        <h2 class="fw-800 mb-3" style="color:var(--navy);">From setup to results in one platform</h2>
        <p class="text-muted">Every stage of a live exam — configuration, candidate preparation, live session, and results — handled end-to-end with zero third-party tools needed.</p>
      </div>
      <div class="col-lg-7">
        <?php $timeline = [
          ['var(--blue)','#eff6ff','bi-gear-fill','Exam Configuration','Set exam name, duration, sections, marking scheme, negative marking, randomisation rules, and access window. Done in under 10 minutes.'],
          ['var(--purple)','#faf5ff','bi-person-plus-fill','Candidate Onboarding','Upload candidate list via CSV or add individually. Auto-send personalised invite emails with login credentials and exam instructions.'],
          ['var(--orange)','#fff7ed','bi-clock-fill','Scheduled Start','Exam auto-opens at the configured date and time. Candidates log in with their unique credentials. Browser lockdown activates instantly on entry.'],
          ['var(--green)','#f0fdf4','bi-activity','Live Session','Auto-save every 30 seconds. Real-time invigilator dashboard. AI proctoring flags reviewed live or post-exam. Candidates can flag questions for review.'],
          ['#0d9488','#f0fdfa','bi-check-circle-fill','Auto-Close & Submit','Exam closes at the configured end time. Unsubmitted answers are auto-saved and submitted. No candidate can continue after close.'],
          ['var(--navy)','#f1f5f9','bi-bar-chart-fill','Instant Results','Rank lists, score cards, and topic heatmaps published within 90 seconds of exam close. Certificates auto-generated for passing candidates.'],
        ]; foreach($timeline as $i=>$t): ?>
        <div class="tl-item">
          <div class="tl-dot" style="background:<?= $t[1] ?>;color:<?= $t[0] ?>;">
            <i class="bi <?= $t[2] ?>"></i>
          </div>
          <div>
            <h6 class="fw-700 mb-1" style="color:var(--navy);"><?= $t[3] ?></h6>
            <p class="text-muted mb-0" style="font-size:.87rem;"><?= $t[4] ?></p>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- ═══ SECURITY ═══ -->
<section class="py-5">
  <div class="container">
    <div class="text-center mb-5">
      <span class="badge mb-2 px-3 py-2" style="background:#fee2e2;color:var(--red);font-size:.78rem;">Security & Anti-Cheating</span>
      <h2 class="fw-800" style="color:var(--navy);">The most secure exam environment available</h2>
      <p class="text-muted" style="max-width:520px;margin:.75rem auto 0;">Multiple overlapping security layers — because no single control is enough on its own.</p>
    </div>
    <div class="row g-3">
      <?php $sec = [
        ['bi-display','var(--blue)','Browser Lockdown','Full-screen enforcement. Closing the browser pauses the exam. Students cannot minimise or switch windows.'],
        ['bi-clipboard-x-fill','#dc2626','Copy-Paste Prevention','All keyboard shortcuts disabled within the exam interface. Right-click and drag-select blocked.'],
        ['bi-eye','var(--purple)','Tab-Switch Detection','Any focus loss is logged with a timestamp. Configurable auto-submit after N violations.'],
        ['bi-camera-video','var(--green)','AI Webcam Proctoring','Detects multiple faces, absent candidate, phone usage, and audio anomalies using on-device ML.'],
        ['bi-shuffle','var(--orange)','Per-Candidate Randomisation','Every candidate receives a unique question order and unique option order. No two papers are identical.'],
        ['bi-lock-fill','var(--navy)','Encrypted Question Delivery','Questions delivered encrypted per session. Questions are never stored in the browser or cache.'],
        ['bi-geo-alt','#0d9488','IP & Location Restriction','Whitelist specific IP ranges or physical locations. Block VPNs and proxy servers automatically.'],
        ['bi-person-badge','#be185d','Identity Verification','Aadhaar-based e-KYC and photo match at login. Biometric terminal integration for CBT centres.'],
      ]; foreach($sec as $s): ?>
      <div class="col-sm-6 col-lg-3">
        <div class="p-3 bg-white border rounded-3 h-100 d-flex flex-column gap-2" style="transition:.15s;">
          <div class="d-flex align-items-center gap-2">
            <div style="width:34px;height:34px;border-radius:8px;background:#f8fafc;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
              <i class="bi <?= $s[0] ?>" style="color:<?= $s[1] ?>;"></i>
            </div>
            <span class="fw-700" style="font-size:.83rem;color:var(--navy);"><?= $s[2] ?></span>
          </div>
          <p class="text-muted mb-0" style="font-size:.79rem;"><?= $s[3] ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ═══ PLAN TABLE ═══ -->
<section class="py-5 bg-light">
  <div class="container">
    <h2 class="fw-800 text-center mb-2" style="color:var(--navy);">Live exam features by plan</h2>
    <p class="text-center text-muted mb-5">Every plan can run live exams. Advanced controls unlock on higher tiers.</p>
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
            ['Unlimited simultaneous exams','5 exams','Unlimited','Unlimited'],
            ['Candidate limit / month','500','5,000','Unlimited'],
            ['30-second auto-save','✓','✓','✓'],
            ['Browser lockdown','✓','✓','✓'],
            ['Tab-switch detection','✓','✓','✓'],
            ['Question randomisation','✓','✓','✓'],
            ['Per-section timers','✓','✓','✓'],
            ['Negative marking','✓','✓','✓'],
            ['Live invigilator dashboard','✓','✓','✓'],
            ['AI webcam proctoring','✗','✓','✓'],
            ['Live video proctoring','✗','✗','✓'],
            ['IP / geo restriction','✗','✓','✓'],
            ['Identity verification (e-KYC)','✗','✗','✓'],
            ['LAN / offline mode','✗','✗','✓'],
            ['Biometric terminal integration','✗','✗','✓'],
            ['99.99% uptime SLA','✗','✗','✓'],
          ]; foreach($rows as $r): ?>
          <tr>
            <td class="text-muted"><?= $r[0] ?></td>
            <?php for($i=1;$i<=3;$i++): $v=$r[$i]; ?>
            <td class="text-center <?= $i===2?'bg-light':'' ?>">
              <?php if($v==='✓') echo '<i class="bi bi-check-circle-fill chk fs-5"></i>';
              elseif($v==='✗') echo '<i class="bi bi-x-circle-fill crs fs-5"></i>';
              else echo '<span style="font-size:.82rem;font-weight:600;color:var(--navy);">'.$v.'</span>'; ?>
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
    <div style="border-left:5px solid var(--blue);background:#f8faff;border-radius:0 14px 14px 0;padding:28px 32px;">
      <i class="bi bi-quote fs-1 mb-3 d-block" style="color:var(--blue);opacity:.35;"></i>
      <p class="fs-5 fst-italic text-muted mb-4">"We ran JEE mock tests for 50,000 students simultaneously. Not a single crash. Rank lists were live within 90 seconds of exam close. Our previous system used to melt at 8,000 users — ExamRankers handled 6 times that without blinking."</p>
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
    <h2 class="fw-800 text-white mb-3">Ready to run your first live exam?</h2>
    <p class="mb-4" style="color:#94a3b8;max-width:480px;margin:0 auto 1.5rem;">Set up an exam in under 10 minutes. 30-day free trial — no credit card required.</p>
    <div class="d-flex justify-content-center gap-3 flex-wrap">
      <a href="<?= base_url('contact') ?>" class="btn btn-primary btn-lg px-5">Start Free Trial</a>
      <a href="<?= base_url('contact') ?>" class="btn btn-outline-light btn-lg px-4">Book a Demo</a>
    </div>
  </div>
</section>
