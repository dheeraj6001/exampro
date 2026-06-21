<style>
:root{--navy:#0b1437;--blue:#1a56db;--green:#16a34a;--red:#dc2626;--orange:#ea580c;--purple:#7c3aed;--amber:#d97706;}

/* Hero */
.ap-hero{background:linear-gradient(135deg,var(--navy) 0%,#0d1f5c 100%);padding:90px 0 0;overflow:hidden;}
.ap-hero h1{color:#fff;font-weight:800;}
.ap-hero p{color:#94a3b8;}

/* Live badge */
.ai-badge{display:inline-flex;align-items:center;gap:7px;padding:5px 14px;border-radius:20px;font-size:.75rem;font-weight:700;}
.ai-dot{width:8px;height:8px;border-radius:50%;background:#22c55e;animation:pulse-g 1.4s infinite;}
@keyframes pulse-g{0%,100%{box-shadow:0 0 0 0 rgba(34,197,94,.5);}50%{box-shadow:0 0 0 5px rgba(34,197,94,0);}}

/* Proctor panel mock */
.proctor-panel{background:#0f172a;border-radius:16px 16px 0 0;box-shadow:0 -10px 60px rgba(0,0,0,.4);overflow:hidden;}
.proctor-topbar{background:#1e293b;padding:11px 18px;display:flex;align-items:center;justify-content:space-between;border-bottom:1px solid rgba(255,255,255,.06);}
.cam-feed{background:#1e293b;border-radius:10px;overflow:hidden;position:relative;}
.cam-overlay{position:absolute;inset:0;display:flex;flex-direction:column;justify-content:space-between;padding:8px;}
.face-box{border:2px solid #22c55e;border-radius:4px;width:60px;height:72px;position:absolute;top:22px;left:50%;transform:translateX(-50%);}
.flag-row{display:flex;align-items:center;gap:8px;padding:7px 10px;border-radius:8px;margin-bottom:6px;font-size:.74rem;}
.flag-row.ok{background:rgba(34,197,94,.1);border:1px solid rgba(34,197,94,.2);}
.flag-row.warn{background:rgba(245,158,11,.12);border:1px solid rgba(245,158,11,.25);}
.flag-row.alert{background:rgba(239,68,68,.12);border:1px solid rgba(239,68,68,.25);}
.flag-dot{width:8px;height:8px;border-radius:50%;flex-shrink:0;}

/* Stat strip */
.stat-strip{background:var(--blue);padding:28px 0;}
.stat-strip .num{font-size:2rem;font-weight:800;color:#fff;line-height:1;}
.stat-strip .lbl{font-size:.76rem;color:#bfdbfe;margin-top:4px;}

/* Detection cards */
.detect-card{background:#fff;border:1px solid #e2e8f0;border-radius:14px;padding:24px;height:100%;transition:.18s;position:relative;overflow:hidden;}
.detect-card:hover{box-shadow:0 10px 36px rgba(0,0,0,.09);transform:translateY(-4px);}
.detect-card::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;}
.detect-card.red::before{background:var(--red);}
.detect-card.orange::before{background:var(--orange);}
.detect-card.blue::before{background:var(--blue);}
.detect-card.purple::before{background:var(--purple);}
.detect-card.green::before{background:var(--green);}
.detect-card.amber::before{background:var(--amber);}
.detect-icon{width:50px;height:50px;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:1.3rem;margin-bottom:14px;}

/* Feat cards */
.feat-card{background:#fff;border:1px solid #e2e8f0;border-radius:14px;padding:24px;height:100%;transition:.18s;}
.feat-card:hover{box-shadow:0 8px 28px rgba(0,0,0,.08);transform:translateY(-3px);}
.feat-icon{width:50px;height:50px;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:1.3rem;margin-bottom:14px;}

/* Incident timeline */
.incident-item{display:flex;gap:12px;align-items:flex-start;padding:12px 0;border-bottom:1px solid #f1f5f9;}
.incident-item:last-child{border-bottom:none;}
.inc-time{font-family:monospace;font-size:.72rem;color:#94a3b8;width:52px;flex-shrink:0;padding-top:2px;}
.inc-icon{width:28px;height:28px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:.75rem;flex-shrink:0;}
.severity-badge{font-size:.65rem;font-weight:700;padding:2px 8px;border-radius:10px;}
.sev-high{background:#fee2e2;color:#991b1b;}
.sev-med{background:#fef3c7;color:#92400e;}
.sev-low{background:#f0fdf4;color:#166534;}

/* Balance section */
.balance-card{border-radius:14px;padding:28px;height:100%;}

/* cmp */
.cmp th{background:#f8fafc;font-size:.78rem;text-transform:uppercase;letter-spacing:.5px;color:#64748b;padding:12px 18px;}
.cmp td{padding:12px 18px;vertical-align:middle;font-size:.88rem;}
.chk{color:var(--green);}
.crs{color:#cbd5e1;}
</style>

<!-- ═══ HERO ═══ -->
<section class="ap-hero">
  <div class="container">
    <div class="row align-items-end g-5">
      <div class="col-lg-5 pb-5">
        <div class="d-flex align-items-center gap-2 mb-3 flex-wrap">
          <span class="ai-badge" style="background:rgba(34,197,94,.12);color:#4ade80;">
            <span class="ai-dot"></span>AI-Powered
          </span>
          <span class="badge px-3 py-2" style="background:rgba(26,86,219,.2);color:#93c5fd;font-size:.78rem;">On-device ML · No cloud upload</span>
        </div>
        <h1 class="display-5 mb-3">Catch cheating. Never punish the honest.</h1>
        <p class="lead mb-4">AI proctoring that flags genuine malpractice with surgical precision — without creating a surveillance nightmare for the 98% of candidates who are playing fair.</p>
        <div class="d-flex gap-3 flex-wrap mb-4">
          <a href="<?= base_url('contact') ?>" class="btn btn-primary btn-lg px-5">Start Free Trial</a>
          <a href="<?= base_url('pricing') ?>" class="btn btn-outline-light btn-lg px-4">View Pricing</a>
        </div>
        <div class="d-flex gap-4 flex-wrap">
          <?php foreach([['8 signals','AI monitors simultaneously'],['<2%','False positive rate'],['No upload','All processing on-device']] as $s): ?>
          <div>
            <div class="fw-800 text-white" style="font-size:1.05rem;"><?= $s[0] ?></div>
            <div style="font-size:.74rem;color:#64748b;"><?= $s[1] ?></div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Proctor panel mock -->
      <div class="col-lg-7 d-none d-lg-block">
        <div class="proctor-panel">
          <div class="proctor-topbar">
            <div class="d-flex align-items-center gap-2">
              <span class="ai-badge" style="background:rgba(34,197,94,.15);color:#4ade80;padding:3px 10px;font-size:.7rem;">
                <span class="ai-dot" style="width:6px;height:6px;"></span>AI MONITORING ACTIVE
              </span>
              <span style="color:#64748b;font-size:.72rem;">JEE Mock #12 · Candidate: Arjun Mehta</span>
            </div>
            <span style="font-family:monospace;font-size:.78rem;color:#94a3b8;">01:24:38 remaining</span>
          </div>
          <div style="padding:16px;display:grid;grid-template-columns:1fr 1.4fr;gap:12px;">

            <!-- Camera feed mock -->
            <div>
              <div style="font-size:.7rem;color:#64748b;margin-bottom:6px;font-weight:600;text-transform:uppercase;letter-spacing:.5px;">Webcam Feed</div>
              <div class="cam-feed" style="height:200px;background:linear-gradient(160deg,#1e293b,#0f172a);">
                <!-- Simulated face silhouette -->
                <div style="position:absolute;top:30px;left:50%;transform:translateX(-50%);">
                  <div style="width:50px;height:56px;border-radius:50% 50% 45% 45%;background:rgba(255,255,255,.08);margin:0 auto;"></div>
                  <div style="width:70px;height:40px;border-radius:0 0 35px 35px;background:rgba(255,255,255,.06);margin:0 auto;"></div>
                </div>
                <div class="face-box"></div>
                <div style="position:absolute;bottom:8px;left:8px;">
                  <span style="background:rgba(34,197,94,.2);border:1px solid rgba(34,197,94,.4);color:#4ade80;font-size:.65rem;padding:2px 8px;border-radius:10px;font-weight:700;">
                    <i class="bi bi-person-check-fill me-1"></i>Face Detected
                  </span>
                </div>
                <div style="position:absolute;top:8px;right:8px;">
                  <span style="background:rgba(220,38,38,.2);border:1px solid rgba(220,38,38,.4);color:#f87171;font-size:.65rem;padding:2px 8px;border-radius:10px;font-weight:700;animation:pulse-g 1.4s infinite;">
                    ● REC
                  </span>
                </div>
                <!-- Grid overlay -->
                <div style="position:absolute;inset:0;background:repeating-linear-gradient(0deg,transparent,transparent 30px,rgba(255,255,255,.02) 30px,rgba(255,255,255,.02) 31px),repeating-linear-gradient(90deg,transparent,transparent 30px,rgba(255,255,255,.02) 30px,rgba(255,255,255,.02) 31px);"></div>
              </div>

              <!-- Audio waveform mock -->
              <div style="margin-top:8px;background:#1e293b;border-radius:8px;padding:8px 12px;">
                <div style="font-size:.68rem;color:#64748b;margin-bottom:5px;display:flex;justify-content:space-between;">
                  <span>Audio Level</span>
                  <span style="color:#4ade80;">Normal</span>
                </div>
                <div style="display:flex;align-items:center;gap:2px;height:20px;">
                  <?php $waves=[2,4,8,5,12,6,3,8,14,7,4,9,6,3,7,5,10,4,6,8,3,5,7,4,6];
                  foreach($waves as $w): ?>
                  <div style="flex:1;height:<?= $w ?>px;background:rgba(34,197,94,.5);border-radius:2px;"></div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>

            <!-- AI signals panel -->
            <div>
              <div style="font-size:.7rem;color:#64748b;margin-bottom:6px;font-weight:600;text-transform:uppercase;letter-spacing:.5px;">AI Signal Monitor</div>
              <?php $signals=[
                ['ok','bi-person-fill','#4ade80','Face Detection','Single face visible'],
                ['ok','bi-eye-fill','#4ade80','Eye Tracking','Looking at screen'],
                ['warn','bi-display','#fbbf24','Tab Activity','1 tab switch detected'],
                ['ok','bi-mic-fill','#4ade80','Audio Analysis','No voice detected'],
                ['ok','bi-clipboard-x-fill','#4ade80','Copy / Paste','No activity'],
                ['ok','bi-fullscreen','#4ade80','Browser Lock','Full-screen active'],
                ['alert','bi-people-fill','#f87171','Multiple Faces','Second face at 00:47'],
                ['ok','bi-phone-fill','#4ade80','Device Detection','No phone visible'],
              ]; foreach($signals as $s): ?>
              <div class="flag-row <?= $s[0] ?>">
                <span class="flag-dot" style="background:<?= $s[2] ?>;"></span>
                <i class="bi <?= $s[1] ?>" style="color:<?= $s[2] ?>;font-size:.75rem;"></i>
                <span style="color:#e2e8f0;flex:1;"><?= $s[3] ?></span>
                <span style="color:<?= $s[2] ?>;font-size:.68rem;"><?= $s[4] ?></span>
              </div>
              <?php endforeach; ?>
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
      <?php foreach([['8','AI signals monitored'],['<2%','False positive rate'],['On-device','No video cloud upload'],['Zero','Config required']] as $s): ?>
      <div class="col-6 col-md-3">
        <div class="num"><?= $s[0] ?></div>
        <div class="lbl"><?= $s[1] ?></div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<!-- ═══ WHAT AI DETECTS ═══ -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="text-center mb-5">
      <span class="badge mb-2 px-3 py-2" style="background:#fee2e2;color:var(--red);font-size:.78rem;">Detection Capabilities</span>
      <h2 class="fw-800" style="color:var(--navy);">8 signals. Monitored simultaneously. Every second.</h2>
      <p class="text-muted" style="max-width:540px;margin:.75rem auto 0;">Our AI runs entirely on the candidate's device — no video streamed to the cloud — making it fast, private, and effective even on slow connections.</p>
    </div>
    <div class="row g-4">
      <?php $detections = [
        ['red','bi-people-fill','#fee2e2','#dc2626','Multiple Face Detection','Flags when more than one person enters the camera frame. Distinguishes between a second person and a reflection. Timestamps every event.'],
        ['orange','bi-eye-slash-fill','#fff7ed','var(--orange)','Gaze & Eye Tracking','Detects when the candidate looks away from the screen repeatedly. Configurable threshold — e.g. flag after 3 off-screen looks of 3+ seconds.'],
        ['blue','bi-display','#eff6ff','var(--blue)','Tab Switch & Focus Loss','Every window switch, minimise, or loss of browser focus is logged with a timestamp. Configurable auto-submit after N violations.'],
        ['purple','bi-mic-fill','#faf5ff','var(--purple)','Audio Anomaly Detection','Detects voices other than the candidate speaking. Useful for catching live assistance. Loud ambient noise is distinguished from directed speech.'],
        ['green','bi-phone-landscape-fill','#f0fdf4','var(--green)','Mobile / Device Detection','Computer vision scans for smartphone shapes in the camera frame. Flags candidates holding or glancing at a second device.'],
        ['amber','bi-clipboard-x-fill','#fffbeb','var(--amber)','Copy-Paste & Keyboard','All keyboard shortcuts blocked. Copy-paste, print-screen, developer console, and task-switch hotkeys are disabled at browser level.'],
        ['red','bi-fullscreen-exit','#fee2e2','#dc2626','Full-Screen Enforcement','Candidate must remain in full-screen mode. Exiting pauses the exam and logs a violation. Third violation can trigger auto-submit.'],
        ['orange','bi-person-dash-fill','#fff7ed','var(--orange)','Absent Candidate Detection','Flags when no face is detected in the camera frame for more than a configurable threshold (default: 15 seconds).'],
      ]; foreach($detections as $d): ?>
      <div class="col-md-6 col-lg-3">
        <div class="detect-card <?= $d[0] ?>">
          <div class="detect-icon" style="background:<?= $d[2] ?>;color:<?= $d[3] ?>;"><i class="bi <?= $d[1] ?>"></i></div>
          <h6 class="fw-700 mb-2" style="color:var(--navy);font-size:.88rem;"><?= $d[4] ?></h6>
          <p class="text-muted mb-0" style="font-size:.8rem;line-height:1.55;"><?= $d[5] ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ═══ INCIDENT REPORT DEMO ═══ -->
<section class="py-5">
  <div class="container">
    <div class="row g-5 align-items-start">
      <div class="col-lg-5">
        <span class="badge mb-2 px-3 py-2" style="background:#eff6ff;color:var(--blue);font-size:.78rem;">Incident Reports</span>
        <h2 class="fw-800 mb-3" style="color:var(--navy);">Every flag. Full context. One click to review.</h2>
        <p class="text-muted mb-4">After the exam, you get a prioritised incident report sorted by severity. Click any flag to jump to the exact video timestamp. Review only what matters — not hours of footage.</p>
        <ul class="list-unstyled mb-4">
          <?php foreach([
            ['bi-check-circle-fill','var(--green)','Flags sorted by severity — review high-risk candidates first'],
            ['bi-check-circle-fill','var(--green)','Click to jump to exact video frame for any flag'],
            ['bi-check-circle-fill','var(--green)','Export incident report as PDF for disciplinary records'],
            ['bi-check-circle-fill','var(--green)','Mark flags as Genuine Violation or Dismissed'],
            ['bi-check-circle-fill','var(--green)','Bulk-dismiss low-severity flags with one click'],
          ] as $li): ?>
          <li class="d-flex gap-2 mb-2" style="font-size:.88rem;color:#374151;">
            <i class="bi <?= $li[0] ?> mt-1 flex-shrink-0" style="color:<?= $li[1] ?>;"></i><?= $li[2] ?>
          </li>
          <?php endforeach; ?>
        </ul>
        <div class="p-3 rounded-3" style="background:#f0fdf4;border:1px solid #bbf7d0;">
          <div class="d-flex gap-2 align-items-start">
            <i class="bi bi-shield-check text-success mt-1 flex-shrink-0"></i>
            <div style="font-size:.82rem;color:#166534;">
              <strong>Presumption of innocence by design.</strong> Flags are evidence for review — not automatic penalties. Your team makes the final call.
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-7">
        <div class="border rounded-3 bg-white shadow-sm overflow-hidden">
          <div class="p-3 border-bottom" style="background:#f8fafc;display:flex;align-items:center;justify-content:space-between;">
            <div>
              <span class="fw-700" style="color:var(--navy);font-size:.88rem;">Proctoring Incident Report</span>
              <span class="text-muted ms-2" style="font-size:.75rem;">Arjun Mehta · JEE Mock #12</span>
            </div>
            <div class="d-flex gap-2">
              <span class="severity-badge sev-high">2 High</span>
              <span class="severity-badge sev-med">3 Medium</span>
              <span class="severity-badge sev-low">4 Low</span>
            </div>
          </div>
          <div class="p-3">
            <?php $incidents = [
              ['00:47','bi-people-fill','#dc2626','#fee2e2','high','Multiple faces detected','Second face visible for 4.2 seconds. Confidence: 94%.'],
              ['12:31','bi-people-fill','#dc2626','#fee2e2','high','Multiple faces detected','Brief appearance of second face (1.8s). Confidence: 78%.'],
              ['08:14','bi-eye-slash-fill','#d97706','#fef3c7','med','Gaze off-screen','Looked away for 6 consecutive seconds.'],
              ['23:05','bi-display','#d97706','#fef3c7','med','Tab switch','Browser lost focus for 3.1 seconds.'],
              ['41:18','bi-display','#d97706','#fef3c7','med','Tab switch','Browser lost focus for 1.4 seconds.'],
              ['05:02','bi-person-dash-fill','#16a34a','#dcfce7','low','Face absent','No face detected for 8 seconds.'],
              ['15:44','bi-person-dash-fill','#16a34a','#dcfce7','low','Face absent','No face detected for 5 seconds.'],
              ['33:21','bi-mic-fill','#16a34a','#dcfce7','low','Audio anomaly','Background noise spike — likely environmental.'],
              ['52:09','bi-person-dash-fill','#16a34a','#dcfce7','low','Face absent','No face detected for 6 seconds.'],
            ]; foreach($incidents as $inc): ?>
            <div class="incident-item">
              <div class="inc-time"><?= $inc[0] ?></div>
              <div class="inc-icon" style="background:<?= $inc[3] ?>;color:<?= $inc[2] ?>;">
                <i class="bi <?= $inc[1] ?>"></i>
              </div>
              <div style="flex:1;">
                <div class="d-flex align-items-center gap-2 mb-1">
                  <span class="fw-600" style="font-size:.82rem;color:var(--navy);"><?= $inc[4]==='high'?'⚠ ':'' ?><?= $inc[5] ?></span>
                  <span class="severity-badge sev-<?= $inc[4]==='high'?'high':($inc[4]==='med'?'med':'low') ?>"><?= ucfirst($inc[4]) ?></span>
                </div>
                <span style="font-size:.76rem;color:#64748b;"><?= $inc[6] ?></span>
              </div>
              <button class="btn btn-sm" style="font-size:.68rem;padding:2px 10px;background:#f1f5f9;color:#374151;border:none;white-space:nowrap;">Review ▶</button>
            </div>
            <?php endforeach; ?>
          </div>
          <div class="p-3 border-top" style="background:#f8fafc;display:flex;gap:2 justify-content:space-between;align-items:center;">
            <span style="font-size:.75rem;color:#64748b;">Risk score: <strong style="color:#dc2626;">High (72/100)</strong></span>
            <div class="d-flex gap-2 ms-auto">
              <button class="btn btn-sm btn-outline-secondary" style="font-size:.74rem;">Dismiss All Low</button>
              <button class="btn btn-sm btn-danger" style="font-size:.74rem;">Flag for Review</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ PRIVACY & FAIRNESS ═══ -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-4">
        <div class="balance-card h-100" style="background:#fff;border:2px solid var(--green);">
          <div style="width:52px;height:52px;border-radius:13px;background:#f0fdf4;display:flex;align-items:center;justify-content:center;margin-bottom:16px;">
            <i class="bi bi-shield-lock-fill" style="color:var(--green);font-size:1.4rem;"></i>
          </div>
          <h5 class="fw-800 mb-3" style="color:var(--navy);">Privacy by design</h5>
          <ul class="list-unstyled">
            <?php foreach([
              'All AI processing runs on the candidate\'s device — no video is streamed or stored on ExamRankers servers',
              'Webcam footage (if recorded) is stored encrypted and accessible only to authorised institution admins',
              'Candidates are informed of monitoring before the exam starts — no hidden surveillance',
              'Video retained for 6 months then deleted; flagged events retained up to 3 years',
              'DPDPA 2023 compliant — full data processing agreement available',
            ] as $li): ?>
            <li class="d-flex gap-2 mb-2" style="font-size:.84rem;color:#374151;">
              <i class="bi bi-check-circle-fill flex-shrink-0 mt-1" style="color:var(--green);font-size:.8rem;"></i><?= $li ?>
            </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="balance-card h-100" style="background:#fff;border:2px solid var(--blue);">
          <div style="width:52px;height:52px;border-radius:13px;background:#eff6ff;display:flex;align-items:center;justify-content:center;margin-bottom:16px;">
            <i class="bi bi-person-heart" style="color:var(--blue);font-size:1.4rem;"></i>
          </div>
          <h5 class="fw-800 mb-3" style="color:var(--navy);">Fairness by default</h5>
          <ul class="list-unstyled">
            <?php foreach([
              'AI flags are evidence for human review — not automatic penalties',
              'Accommodation mode for candidates with disabilities — extended time, no gaze tracking',
              'Low-confidence flags are auto-marked for dismissal to reduce noise',
              'Discrimination impact testing run quarterly across gender, age, and skin-tone groups',
              'Candidates can submit a formal objection to any proctoring flag',
            ] as $li): ?>
            <li class="d-flex gap-2 mb-2" style="font-size:.84rem;color:#374151;">
              <i class="bi bi-check-circle-fill flex-shrink-0 mt-1" style="color:var(--blue);font-size:.8rem;"></i><?= $li ?>
            </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="balance-card h-100" style="background:#fff;border:2px solid var(--purple);">
          <div style="width:52px;height:52px;border-radius:13px;background:#faf5ff;display:flex;align-items:center;justify-content:center;margin-bottom:16px;">
            <i class="bi bi-sliders" style="color:var(--purple);font-size:1.4rem;"></i>
          </div>
          <h5 class="fw-800 mb-3" style="color:var(--navy);">Configurable sensitivity</h5>
          <ul class="list-unstyled">
            <?php foreach([
              'Set minimum duration before a gaze event is flagged (e.g. only flag if away for 5+ seconds)',
              'Configure max tab switches before auto-submit (1, 3, 5, or unlimited)',
              'Choose which signals to enable per exam — not all exams need full proctoring',
              'Set different thresholds for different exam types: mock tests vs. final exams',
              'Pilot mode — run AI proctoring silently to calibrate before enforcement',
            ] as $li): ?>
            <li class="d-flex gap-2 mb-2" style="font-size:.84rem;color:#374151;">
              <i class="bi bi-check-circle-fill flex-shrink-0 mt-1" style="color:var(--purple);font-size:.8rem;"></i><?= $li ?>
            </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ MORE FEATURES ═══ -->
<section class="py-5">
  <div class="container">
    <div class="text-center mb-5">
      <span class="badge mb-2 px-3 py-2" style="background:#eff6ff;color:var(--blue);font-size:.78rem;">More Capabilities</span>
      <h2 class="fw-800" style="color:var(--navy);">Beyond the basics</h2>
    </div>
    <div class="row g-4">
      <?php $feats = [
        ['bi-camera-video-fill','#eff6ff','var(--blue)','Live Video Proctoring','Pair AI proctoring with a live human invigilator who watches video feeds in real time. Available on Enterprise. Ideal for high-stakes board or professional exams.'],
        ['bi-people-fill','#f0fdf4','var(--green)','Invigilator Dashboard','Supervisors see a live grid of all candidate feeds, AI flags, and connection status. Escalate or message a candidate directly from the dashboard.'],
        ['bi-phone-fill','#faf5ff','var(--purple)','Mobile App Proctoring','Candidates taking exams on the ExamRankers mobile app receive the same AI proctoring as desktop — face detection, audio analysis, and lock mode.'],
        ['bi-geo-alt-fill','#fff7ed','var(--orange)','Geofencing & IP Lock','Restrict exam access to a physical location (GPS) or IP range. No VPN bypass — we detect and block common VPN providers automatically.'],
        ['bi-fingerprint','#f0fdfa','#0d9488','Identity Verification','Aadhaar-based e-KYC and photo match at login confirm candidate identity before the exam begins. Biometric terminal integration for CBT halls.'],
        ['bi-file-earmark-bar-graph-fill','#fee2e2','var(--red)','Risk Score per Candidate','Each candidate receives an AI-generated risk score (0–100) based on the number, severity, and pattern of flags. Sort candidates by risk for review.'],
      ]; foreach($feats as $f): ?>
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

<!-- ═══ PLAN TABLE ═══ -->
<section class="py-5 bg-light">
  <div class="container">
    <h2 class="fw-800 text-center mb-2" style="color:var(--navy);">AI Proctoring by plan</h2>
    <p class="text-center text-muted mb-5">Basic security on all plans. Full AI proctoring from Professional.</p>
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
            ['Browser lockdown','✓','✓','✓'],
            ['Tab-switch detection & logging','✓','✓','✓'],
            ['Copy-paste & shortcut prevention','✓','✓','✓'],
            ['Full-screen enforcement','✓','✓','✓'],
            ['AI face detection','✗','✓','✓'],
            ['Multiple face detection','✗','✓','✓'],
            ['Gaze / eye tracking','✗','✓','✓'],
            ['Audio anomaly detection','✗','✓','✓'],
            ['Mobile / device detection','✗','✓','✓'],
            ['Absent candidate detection','✗','✓','✓'],
            ['Proctoring incident reports','✗','✓','✓'],
            ['AI risk score per candidate','✗','✓','✓'],
            ['Configurable sensitivity thresholds','✗','✓','✓'],
            ['Accommodation / disability mode','✗','✓','✓'],
            ['Live video proctoring (human)','✗','✗','✓'],
            ['Live invigilator dashboard','✗','✗','✓'],
            ['Geofencing & IP lock','✗','✓','✓'],
            ['Aadhaar / biometric identity check','✗','✗','✓'],
            ['Video archive (6 months)','✗','✓','✓'],
            ['Bulk flag export for audit','✗','✓','✓'],
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
    <div style="border-left:5px solid var(--red);background:#fff5f5;border-radius:0 14px 14px 0;padding:28px 32px;">
      <i class="bi bi-quote fs-1 mb-3 d-block" style="color:var(--red);opacity:.3;"></i>
      <p class="fs-5 fst-italic text-muted mb-4">"We were sceptical about AI proctoring — worried about false positives upsetting genuine candidates. The pilot run on 500 students showed a 1.8% false positive rate, all in the 'Low' severity category. Not a single genuine complaint. We rolled it out to 50,000 the next month."</p>
      <div class="d-flex align-items-center gap-3">
        <div style="width:44px;height:44px;border-radius:50%;background:var(--red);display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;">P</div>
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
    <h2 class="fw-800 text-white mb-3">Run your next exam with complete confidence</h2>
    <p class="mb-4" style="color:#94a3b8;max-width:480px;margin:0 auto 1.5rem;">Try AI proctoring free for 30 days. Enable it on any exam in under 60 seconds — no setup, no hardware.</p>
    <div class="d-flex justify-content-center gap-3 flex-wrap">
      <a href="<?= base_url('contact') ?>" class="btn btn-primary btn-lg px-5">Start Free Trial</a>
      <a href="<?= base_url('contact') ?>" class="btn btn-outline-light btn-lg px-4">Book a Demo</a>
    </div>
  </div>
</section>
