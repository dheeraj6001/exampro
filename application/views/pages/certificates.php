<style>
:root{--navy:#0b1437;--blue:#1a56db;--green:#16a34a;--gold:#d97706;--purple:#7c3aed;}

/* Hero */
.cert-hero{background:linear-gradient(135deg,var(--navy) 0%,#111b47 100%);padding:90px 0 60px;overflow:hidden;}
.cert-hero h1{color:#fff;font-weight:800;}
.cert-hero p{color:#94a3b8;}

/* Certificate mock */
.cert-mock{background:#fff;border-radius:16px;box-shadow:0 20px 60px rgba(0,0,0,.35);padding:0;overflow:hidden;position:relative;}
.cert-mock-header{background:linear-gradient(135deg,var(--navy),#1e3a8a);padding:22px 28px;display:flex;align-items:center;justify-content:space-between;}
.cert-mock-body{padding:28px 32px;}
.cert-seal{width:60px;height:60px;border-radius:50%;border:3px solid rgba(255,255,255,.3);display:flex;align-items:center;justify-content:center;color:rgba(255,255,255,.7);font-size:1.4rem;}
.cert-divider{height:3px;background:linear-gradient(90deg,var(--gold),#fbbf24,var(--gold));border-radius:3px;margin:16px 0;}
.cert-badge-strip{background:#f0fdf4;border-top:1px solid #dcfce7;padding:12px 28px;display:flex;align-items:center;gap:8px;}
.qr-box{width:56px;height:56px;background:var(--navy);border-radius:6px;display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.qr-grid{display:grid;grid-template-columns:repeat(5,1fr);gap:2px;width:36px;height:36px;}
.qr-cell{border-radius:1px;}

/* Feature cards */
.feat-card{background:#fff;border:1px solid #e2e8f0;border-radius:14px;padding:26px;height:100%;transition:.18s;}
.feat-card:hover{box-shadow:0 10px 36px rgba(0,0,0,.08);transform:translateY(-4px);}
.feat-icon{width:52px;height:52px;border-radius:13px;display:flex;align-items:center;justify-content:center;font-size:1.4rem;margin-bottom:16px;}

/* Steps */
.step-line{position:relative;}
.step-line::before{content:'';position:absolute;left:23px;top:52px;bottom:0;width:2px;background:#e2e8f0;z-index:0;}
.step-line:last-child::before{display:none;}
.step-num{width:48px;height:48px;border-radius:50%;background:var(--blue);color:#fff;font-weight:800;font-size:1rem;display:flex;align-items:center;justify-content:center;flex-shrink:0;position:relative;z-index:1;box-shadow:0 0 0 4px #eff6ff;}

/* Customisation preview */
.custom-card{border-radius:12px;overflow:hidden;border:2px solid transparent;transition:.2s;cursor:pointer;}
.custom-card:hover,.custom-card.active{border-color:var(--blue);}
.custom-card-header{padding:14px 18px;font-weight:700;font-size:.82rem;color:#fff;}
.custom-card-body{padding:16px 18px;background:#fff;}

/* Verification demo */
.verify-screen{background:#fff;border:1px solid #e2e8f0;border-radius:14px;overflow:hidden;box-shadow:0 8px 30px rgba(0,0,0,.08);}
.verify-bar{background:#f8fafc;padding:10px 16px;border-bottom:1px solid #e2e8f0;display:flex;align-items:center;gap:8px;}
.verify-dot{width:8px;height:8px;border-radius:50%;}
.url-pill{background:#fff;border:1px solid #e2e8f0;border-radius:20px;padding:4px 14px;font-size:.75rem;color:#64748b;font-family:monospace;flex:1;}

/* Comparison table */
.cmp th{background:#f8fafc;font-size:.78rem;text-transform:uppercase;letter-spacing:.5px;color:#64748b;padding:12px 18px;}
.cmp td{padding:12px 18px;vertical-align:middle;font-size:.88rem;}
.chk{color:var(--green);}
.crs{color:#cbd5e1;}

/* Stat strip */
.stat-strip{background:var(--blue);padding:32px 0;}
.stat-strip .num{font-size:2.2rem;font-weight:800;color:#fff;line-height:1;}
.stat-strip .lbl{font-size:.8rem;color:#bfdbfe;margin-top:4px;}
</style>

<!-- ═══ HERO ═══ -->
<section class="cert-hero">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-5">
        <span class="badge mb-3 px-3 py-2" style="background:rgba(26,86,219,.25);color:#93c5fd;font-size:.78rem;">
          <i class="bi bi-patch-check-fill me-1"></i>Digital Certificates
        </span>
        <h1 class="display-5 mb-3">Certificates in 60 seconds. Verified forever.</h1>
        <p class="lead mb-4">Auto-generate QR-verified digital certificates the moment results are published. Branded, tamper-proof, and shareable directly on LinkedIn.</p>
        <div class="d-flex gap-3 flex-wrap mb-4">
          <a href="<?= base_url('contact') ?>" class="btn btn-primary btn-lg px-5">Start Free Trial</a>
          <a href="<?= base_url('pricing') ?>" class="btn btn-outline-light btn-lg px-4">View Pricing</a>
        </div>
        <div class="d-flex gap-4 flex-wrap">
          <?php foreach([['60 sec','Certificate delivery'],['QR verified','Instant online check'],['Zero','Forgery incidents']] as $s): ?>
          <div>
            <div class="fw-800 text-white" style="font-size:1.05rem;"><?= $s[0] ?></div>
            <div style="font-size:.74rem;color:#64748b;"><?= $s[1] ?></div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Certificate mock-up -->
      <div class="col-lg-7">
        <div class="cert-mock">
          <div class="cert-mock-header">
            <div>
              <div class="fw-800 text-white" style="font-size:1rem;letter-spacing:.5px;">GREENFIELD COLLEGE</div>
              <div style="font-size:.72rem;color:#93c5fd;">Established 1984 · New Delhi</div>
            </div>
            <div class="cert-seal"><i class="bi bi-shield-fill-check"></i></div>
          </div>
          <div class="cert-mock-body">
            <div class="text-center mb-3">
              <div style="font-size:.72rem;color:#94a3b8;letter-spacing:2px;text-transform:uppercase;margin-bottom:6px;">Certificate of Achievement</div>
              <div class="cert-divider"></div>
              <div style="font-size:.8rem;color:#64748b;margin-bottom:6px;">This is to certify that</div>
              <div class="fw-800" style="font-size:1.4rem;color:var(--navy);">Arjun Mehta</div>
              <div style="font-size:.8rem;color:#64748b;margin:6px 0;">has successfully completed</div>
              <div class="fw-700" style="font-size:1rem;color:var(--blue);">Advanced Python Programming — Batch 2026</div>
              <div class="cert-divider"></div>
            </div>
            <div class="row g-3 text-center mb-3">
              <?php foreach([['Score','87 / 100'],['Percentile','94th'],['Grade','A+'],['Date','18 Jun 2026']] as $d): ?>
              <div class="col-3">
                <div style="background:#f8fafc;border-radius:8px;padding:10px 6px;">
                  <div class="fw-700" style="color:var(--navy);font-size:.9rem;"><?= $d[1] ?></div>
                  <div style="font-size:.68rem;color:#94a3b8;"><?= $d[0] ?></div>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
            <div class="d-flex align-items-center gap-3">
              <div class="qr-box">
                <?php
                $pattern = [1,1,1,0,1,1,0,0,1,1,0,1,1,0,1,0,0,1,0,0,1,1,1,0,1];
                echo '<div class="qr-grid">';
                foreach($pattern as $c) echo '<div class="qr-cell" style="background:'.($c?'#fff':'transparent').';"></div>';
                echo '</div>';
                ?>
              </div>
              <div>
                <div style="font-size:.7rem;color:#64748b;">Scan to verify instantly</div>
                <div style="font-size:.72rem;font-family:monospace;color:var(--blue);">verify.examrankers.com/a7f3k2</div>
              </div>
              <div class="ms-auto text-end">
                <div style="font-size:.68rem;color:#94a3b8;">Authorised by</div>
                <div style="font-family:Georgia,serif;font-style:italic;font-size:.9rem;color:var(--navy);">Dr. K. Rajan</div>
                <div style="width:80px;height:1px;background:#94a3b8;margin-left:auto;margin-top:2px;"></div>
                <div style="font-size:.64rem;color:#94a3b8;">Principal</div>
              </div>
            </div>
          </div>
          <div class="cert-badge-strip">
            <i class="bi bi-patch-check-fill text-success"></i>
            <span style="font-size:.75rem;color:#166534;font-weight:600;">Tamper-proof · QR verified · Issued by ExamRankers</span>
            <span class="ms-auto" style="font-size:.72rem;color:#94a3b8;">ID: GC-2026-08471</span>
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
      <?php foreach([['50 lakh+','Certificates issued'],['0','Forgery incidents'],['60 sec','From result to certificate'],['3 sec','Employer verification time']] as $s): ?>
      <div class="col-6 col-md-3">
        <div class="num"><?= $s[0] ?></div>
        <div class="lbl"><?= $s[1] ?></div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<!-- ═══ HOW IT WORKS ═══ -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="row g-5 align-items-center">
      <div class="col-lg-5">
        <span class="badge mb-2 px-3 py-2" style="background:#f0fdf4;color:var(--green);font-size:.78rem;">How It Works</span>
        <h2 class="fw-800 mb-3" style="color:var(--navy);">From exam end to certificate — fully automatic</h2>
        <p class="text-muted">No manual steps. No admin time. Candidates get their certificate the moment results are finalised.</p>
      </div>
      <div class="col-lg-7">
        <?php $steps = [
          ['Exam closes & auto-marking completes','MCQ answers are marked instantly. Descriptive answers go through your evaluator panel. Pass/fail status is determined by your configured passing mark.'],
          ['Results are published','You click Publish (or set auto-publish). All candidate scores, ranks, and pass/fail statuses are locked.'],
          ['Certificates auto-generate in bulk','ExamRankers generates a personalised PDF certificate for every passing candidate — with your logo, signatory, score, grade, and a unique QR code — in under 60 seconds regardless of batch size.'],
          ['Candidates are notified by email','Each candidate receives a direct download link for their certificate. They can also access it any time from their candidate portal.'],
          ['Employers verify in 3 seconds','Anyone with the certificate can scan the QR code or visit the verification link to instantly confirm authenticity — no login, no call, no email.'],
        ]; foreach($steps as $i=>$s): ?>
        <div class="d-flex gap-3 mb-4 step-line">
          <div class="step-num mt-1"><?= $i+1 ?></div>
          <div class="pb-2">
            <h6 class="fw-700 mb-1" style="color:var(--navy);"><?= $s[0] ?></h6>
            <p class="text-muted mb-0" style="font-size:.87rem;"><?= $s[1] ?></p>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- ═══ FEATURES ═══ -->
<section class="py-5">
  <div class="container">
    <div class="text-center mb-5">
      <span class="badge mb-2 px-3 py-2" style="background:#eff6ff;color:var(--blue);font-size:.78rem;">Features</span>
      <h2 class="fw-800" style="color:var(--navy);">Everything a world-class certificate needs</h2>
    </div>
    <div class="row g-4">
      <?php $features = [
        ['bi-qr-code','#eff6ff','var(--blue)','QR-Code Verification','Every certificate carries a unique QR code linked to an immutable verification page. Scanning it shows the candidate name, exam, score, date, and issuing institution — no login required.'],
        ['bi-palette-fill','#faf5ff','var(--purple)','Fully Branded Templates','Your logo, institution name, signature, and colour scheme. Candidates see your brand — not ours. Upload your letterhead and we do the rest.'],
        ['bi-lightning-fill','#f0fdf4','var(--green)','Bulk Generation in 60 Seconds','Issue 10 or 10,000 certificates in the same time. Auto-generation scales instantly — no queue, no wait.'],
        ['bi-linkedin','#eff6ff','var(--blue)','LinkedIn Share Button','Candidates can add their certificate directly to their LinkedIn profile with one click, instantly broadcasting their achievement.'],
        ['bi-shield-lock-fill','#fff7ed','var(--gold)','Tamper-Proof by Design','Certificates are cryptographically signed. Any modification to the PDF invalidates the QR verification — making forgery immediately detectable.'],
        ['bi-file-earmark-pdf-fill','#fee2e2','#dc2626','High-Resolution PDF','Print-ready PDFs at A4 and letter sizes. Suitable for framing, official records, and digital sharing.'],
        ['bi-translate','#f0fdfa','#0d9488','Multi-language Support','Issue certificates in English, Hindi, Tamil, Telugu, Bengali, and 12 other languages — automatically based on candidate preference.'],
        ['bi-clock-history','#fdf2f8','#be185d','Permanent Archive','Certificates remain verifiable permanently — even if the candidate loses their copy. Institutions can re-issue any certificate from the archive in seconds.'],
        ['bi-calendar-check-fill','#f8fafc','var(--navy)','Expiry & Re-Certification','Set certificate validity periods for compliance or professional certifications. Candidates receive automatic renewal reminders before expiry.'],
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

<!-- ═══ VERIFICATION DEMO ═══ -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="row g-5 align-items-center">
      <div class="col-lg-6">
        <span class="badge mb-2 px-3 py-2" style="background:#f0fdf4;color:var(--green);font-size:.78rem;">Live Verification</span>
        <h2 class="fw-800 mb-3" style="color:var(--navy);">Employers verify in 3 seconds. No login needed.</h2>
        <p class="text-muted mb-4">Anyone — HR managers, admission officers, or clients — can scan the QR code or visit the verification link. They see exactly what the institution recorded. No phone calls, no email chains, no waiting.</p>
        <ul class="list-unstyled">
          <?php foreach([
            ['bi-check-circle-fill','var(--green)','Publicly accessible — no account needed to verify'],
            ['bi-check-circle-fill','var(--green)','Shows institution name, exam title, score, grade, and date'],
            ['bi-check-circle-fill','var(--green)','Modification to certificate instantly invalidates verification'],
            ['bi-check-circle-fill','var(--green)','Works on mobile — scan QR with any smartphone camera'],
            ['bi-check-circle-fill','var(--green)','Verification page stays live permanently'],
          ] as $li): ?>
          <li class="d-flex gap-2 mb-2" style="font-size:.9rem;color:#374151;">
            <i class="bi <?= $li[0] ?> mt-1 flex-shrink-0" style="color:<?= $li[1] ?>;"></i><?= $li[2] ?>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class="col-lg-6">
        <div class="verify-screen">
          <div class="verify-bar">
            <span class="verify-dot" style="background:#ef4444;"></span>
            <span class="verify-dot" style="background:#f59e0b;"></span>
            <span class="verify-dot" style="background:#22c55e;"></span>
            <div class="url-pill ms-2">verify.examrankers.com/a7f3k2</div>
            <i class="bi bi-lock-fill text-success ms-2" style="font-size:.8rem;"></i>
          </div>
          <div class="p-4">
            <div class="d-flex align-items-center gap-3 mb-4 p-3 rounded-3" style="background:#f0fdf4;border:1px solid #bbf7d0;">
              <i class="bi bi-patch-check-fill text-success fs-2"></i>
              <div>
                <div class="fw-700" style="color:#166534;">Certificate Verified</div>
                <div style="font-size:.8rem;color:#16a34a;">This certificate is authentic and has not been tampered with.</div>
              </div>
            </div>
            <table class="table table-borderless mb-0" style="font-size:.85rem;">
              <?php foreach([
                ['Candidate','Arjun Mehta'],
                ['Exam','Advanced Python Programming'],
                ['Issued by','Greenfield College, New Delhi'],
                ['Score','87 / 100 &nbsp;·&nbsp; Grade A+'],
                ['Percentile','94th'],
                ['Date of Issue','18 June 2026'],
                ['Certificate ID','GC-2026-08471'],
                ['Status','<span class="badge" style="background:#dcfce7;color:#16a34a;">Valid</span>'],
              ] as $row): ?>
              <tr>
                <td style="color:#64748b;width:38%;padding:6px 0;"><?= $row[0] ?></td>
                <td style="font-weight:600;color:var(--navy);padding:6px 0;"><?= $row[1] ?></td>
              </tr>
              <?php endforeach; ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ CUSTOMISATION ═══ -->
<section class="py-5">
  <div class="container">
    <div class="text-center mb-5">
      <span class="badge mb-2 px-3 py-2" style="background:#faf5ff;color:var(--purple);font-size:.78rem;">Branding & Customisation</span>
      <h2 class="fw-800" style="color:var(--navy);">Your certificate. Your identity.</h2>
      <p class="text-muted" style="max-width:520px;margin:.75rem auto 0;">Upload your institution's logo, configure the layout, add signatory details, and choose your colour palette. We handle the rest.</p>
    </div>
    <div class="row g-4">
      <?php $opts = [
        ['bi-image-fill','Institution Logo','Upload your logo in any format. It appears on every certificate, email, and verification page.'],
        ['bi-pen-fill','Digital Signatory','Add up to 3 authorised signatories with their uploaded signature images and designations.'],
        ['bi-palette2','Brand Colours','Set your primary and accent colours. The header, footer, and highlights match your brand identity.'],
        ['bi-fonts','Certificate Text','Customise the award text, sub-text, and footer copy. Add a tagline, accreditation body name, or custom message.'],
        ['bi-layout-text-window-reverse','Template Layout','Choose from portrait or landscape orientation. Two-column or centred single-column layout.'],
        ['bi-award-fill','Grade / Score Display','Show or hide the score, percentile, grade letter, or pass/fail status — your choice per exam.'],
      ]; foreach($opts as $o): ?>
      <div class="col-md-6 col-lg-4">
        <div class="d-flex gap-3 p-3 border rounded-3 bg-white h-100" style="transition:.15s;">
          <div style="width:40px;height:40px;border-radius:10px;background:#faf5ff;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <i class="bi <?= $o[0] ?>" style="color:var(--purple);font-size:1.1rem;"></i>
          </div>
          <div>
            <h6 class="fw-700 mb-1" style="color:var(--navy);font-size:.88rem;"><?= $o[1] ?></h6>
            <p class="text-muted mb-0" style="font-size:.8rem;"><?= $o[2] ?></p>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ═══ USE CASES ═══ -->
<section class="py-5 bg-light">
  <div class="container">
    <h2 class="fw-800 text-center mb-5" style="color:var(--navy);">Who uses digital certificates</h2>
    <div class="row g-4">
      <?php $usecases = [
        ['bi-mortarboard-fill','var(--blue)','#eff6ff','Universities & Colleges','Issue end-semester and convocation certificates to thousands of students in minutes. Eliminates 3 weeks of printing and dispatch.'],
        ['bi-briefcase-fill','var(--purple)','#faf5ff','Corporate L&D','Certify employees after completing compliance training, skill development, or onboarding assessments. Auto-expiry for re-certification.'],
        ['bi-buildings-fill','var(--navy)','#f1f5f9','Certification Bodies','Issue professional and vocational certificates with full audit trail. QR verification satisfies employer and regulatory requirements.'],
        ['bi-person-check-fill','var(--green)','#f0fdf4','Coaching Institutes','Reward mock exam toppers and scholarship test qualifiers. LinkedIn-shareable certificates drive organic brand promotion.'],
        ['bi-award-fill','var(--gold)','#fffbeb','EdTech Platforms','Add credentialing to your course completion flow. Shareable certificates are proven to increase course completion rates by 40%.'],
        ['bi-hospital-fill','#0d9488','#f0fdfa','Healthcare & Compliance','Issue mandatory training certificates (POSH, fire safety, first aid) with auto-reminder before annual expiry date.'],
      ]; foreach($usecases as $u): ?>
      <div class="col-md-6 col-lg-4">
        <div class="feat-card">
          <div class="feat-icon" style="background:<?= $u[2] ?>;color:<?= $u[1] ?>;"><i class="bi <?= $u[0] ?>"></i></div>
          <h6 class="fw-700 mb-2" style="color:var(--navy);"><?= $u[3] ?></h6>
          <p class="text-muted mb-0" style="font-size:.87rem;"><?= $u[4] ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ═══ PLAN COMPARISON ═══ -->
<section class="py-5">
  <div class="container">
    <h2 class="fw-800 text-center mb-2" style="color:var(--navy);">Certificates by plan</h2>
    <p class="text-center text-muted mb-5">All plans include digital certificates. Advanced branding and expiry management on higher plans.</p>
    <div class="table-responsive rounded-3 border shadow-sm">
      <table class="table cmp mb-0 bg-white">
        <thead>
          <tr>
            <th style="width:46%;">Feature</th>
            <th class="text-center">Starter</th>
            <th class="text-center" style="background:#eff6ff;">Professional</th>
            <th class="text-center">Enterprise</th>
          </tr>
        </thead>
        <tbody>
          <?php $rows = [
            ['Auto-generated PDF certificates','✓','✓','✓'],
            ['QR verification page','✓','✓','✓'],
            ['Institution logo on certificate','✓','✓','✓'],
            ['Candidate email delivery','✓','✓','✓'],
            ['Permanent verification archive','✓','✓','✓'],
            ['Custom brand colours & layout','✗','✓','✓'],
            ['Digital signatory (up to 3)','✗','✓','✓'],
            ['Custom certificate text & tagline','✗','✓','✓'],
            ['LinkedIn share integration','✗','✓','✓'],
            ['Multi-language certificates','✗','✓','✓'],
            ['Certificate expiry & auto-reminder','✗','✓','✓'],
            ['Bulk re-issue from archive','✗','✓','✓'],
            ['Custom verification domain','✗','✗','✓'],
            ['Accreditation body branding','✗','✗','✓'],
            ['API-driven certificate issuance','✗','✗','✓'],
            ['Embossed seal design option','✗','✗','✓'],
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
    <div style="border-left:5px solid var(--green);background:#f0fdf4;border-radius:0 14px 14px 0;padding:28px 32px;">
      <i class="bi bi-quote fs-1 mb-3 d-block" style="color:var(--green);opacity:.4;"></i>
      <p class="fs-5 fst-italic text-muted mb-4">"Auto certificates with QR verification have impressed students and employers alike. What used to take our admin team 3 weeks of printing and dispatching now takes 60 seconds. Parents share the certificates on WhatsApp the same evening results are published."</p>
      <div class="d-flex align-items-center gap-3">
        <div style="width:44px;height:44px;border-radius:50%;background:var(--green);display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;">K</div>
        <div>
          <strong style="color:var(--navy);">Kavitha Rajan</strong>
          <div class="text-muted small">Principal, Greenfield College</div>
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
    <h2 class="fw-800 text-white mb-3">Start issuing beautiful, verified certificates today</h2>
    <p class="mb-4" style="color:#94a3b8;max-width:480px;margin:0 auto 1.5rem;">Try ExamRankers free for 30 days. No credit card required. Your first certificates are ready in under 10 minutes.</p>
    <div class="d-flex justify-content-center gap-3 flex-wrap">
      <a href="<?= base_url('contact') ?>" class="btn btn-primary btn-lg px-5">Start Free Trial</a>
      <a href="<?= base_url('contact') ?>" class="btn btn-outline-light btn-lg px-4">Book a Demo</a>
    </div>
  </div>
</section>
