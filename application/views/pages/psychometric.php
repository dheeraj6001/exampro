<style>
:root{--navy:#0b1437;--blue:#1a56db;--green:#16a34a;--purple:#7c3aed;--orange:#ea580c;--teal:#0d9488;--pink:#be185d;--amber:#d97706;}

/* Hero */
.ps-hero{background:linear-gradient(135deg,#1e0a4f 0%,#0b1437 60%,#111b47 100%);padding:90px 0 0;overflow:hidden;}
.ps-hero h1{color:#fff;font-weight:800;}
.ps-hero p{color:#94a3b8;}

/* Assessment UI mock */
.assess-mock{background:#fff;border-radius:16px 16px 0 0;box-shadow:0 -10px 60px rgba(0,0,0,.35);overflow:hidden;}
.assess-topbar{background:linear-gradient(90deg,#1e0a4f,var(--navy));padding:12px 20px;display:flex;align-items:center;justify-content:space-between;}
.assess-progress{height:5px;background:rgba(255,255,255,.1);}
.assess-progress-fill{height:100%;background:linear-gradient(90deg,#a78bfa,#7c3aed);transition:.4s;}
.ps-q-text{font-size:.95rem;font-weight:600;color:var(--navy);line-height:1.6;margin-bottom:16px;}
.likert-row{display:flex;align-items:center;gap:0;border:1px solid #e2e8f0;border-radius:10px;overflow:hidden;margin-bottom:8px;}
.likert-cell{flex:1;text-align:center;padding:10px 4px;font-size:.74rem;cursor:pointer;transition:.12s;border-right:1px solid #e2e8f0;}
.likert-cell:last-child{border-right:none;}
.likert-cell:hover{background:#f5f3ff;}
.likert-cell.sel{background:var(--purple);color:#fff;font-weight:700;}
.likert-label{display:flex;justify-content:space-between;font-size:.68rem;color:#94a3b8;margin-bottom:4px;padding:0 4px;}

/* Trait radar mock */
.radar-wrap{position:relative;width:180px;height:180px;margin:0 auto;}
.radar-bg{fill:none;stroke:#e2e8f0;stroke-width:1;}
.radar-area{fill:rgba(124,58,237,.15);stroke:var(--purple);stroke-width:2;}
.radar-dot{fill:var(--purple);}

/* Score bars */
.score-bar-row{margin-bottom:12px;}
.score-bar-track{height:8px;background:#f1f5f9;border-radius:4px;overflow:hidden;margin-top:4px;}
.score-bar-fill{height:100%;border-radius:4px;transition:.6s;}

/* Trait cards */
.trait-card{background:#fff;border:1px solid #e2e8f0;border-radius:14px;padding:24px;height:100%;transition:.18s;position:relative;overflow:hidden;}
.trait-card::after{content:'';position:absolute;top:0;left:0;bottom:0;width:4px;}
.trait-card:hover{box-shadow:0 10px 36px rgba(0,0,0,.09);transform:translateY(-3px);}
.trait-icon{width:50px;height:50px;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:1.3rem;margin-bottom:14px;}

/* Feat cards */
.feat-card{background:#fff;border:1px solid #e2e8f0;border-radius:14px;padding:24px;height:100%;transition:.18s;}
.feat-card:hover{box-shadow:0 8px 28px rgba(0,0,0,.08);transform:translateY(-3px);}
.feat-icon{width:50px;height:50px;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:1.3rem;margin-bottom:14px;}

/* Report card mock */
.report-mock{background:#fff;border:1px solid #e2e8f0;border-radius:14px;overflow:hidden;box-shadow:0 8px 30px rgba(0,0,0,.08);}
.report-header{background:linear-gradient(135deg,#1e0a4f,var(--purple));padding:20px 24px;color:#fff;}

/* Validation badges */
.val-badge{display:inline-flex;align-items:center;gap:7px;padding:8px 16px;border-radius:30px;font-size:.8rem;font-weight:600;border:1px solid;}

/* Stat strip */
.stat-strip{background:var(--purple);padding:28px 0;}
.stat-strip .num{font-size:2rem;font-weight:800;color:#fff;line-height:1;}
.stat-strip .lbl{font-size:.76rem;color:#ddd6fe;margin-top:4px;}

/* cmp */
.cmp th{background:#f8fafc;font-size:.78rem;text-transform:uppercase;letter-spacing:.5px;color:#64748b;padding:12px 18px;}
.cmp td{padding:12px 18px;vertical-align:middle;font-size:.88rem;}
.chk{color:var(--green);}
.crs{color:#cbd5e1;}
</style>

<!-- ═══ HERO ═══ -->
<section class="ps-hero">
  <div class="container">
    <div class="row align-items-end g-5">
      <div class="col-lg-5 pb-5">
        <span class="badge mb-3 px-3 py-2" style="background:rgba(124,58,237,.25);color:#c4b5fd;font-size:.78rem;">
          <i class="bi bi-brain me-1"></i>Psychometric Assessments
        </span>
        <h1 class="display-5 mb-3">Measure what matters. Hire, develop, and grow with science.</h1>
        <p class="lead mb-4">Scientifically validated personality, cognitive, and behavioural assessments that predict job performance — not just exam scores.</p>
        <div class="d-flex gap-3 flex-wrap mb-4">
          <a href="<?= base_url('contact') ?>" class="btn btn-primary btn-lg px-5">Start Free Trial</a>
          <a href="<?= base_url('pricing') ?>" class="btn btn-outline-light btn-lg px-4">View Pricing</a>
        </div>
        <div class="d-flex gap-4 flex-wrap">
          <?php foreach([['6+','Assessment types'],['500+','Validated questions'],['ISO 10667','Compliant']] as $s): ?>
          <div>
            <div class="fw-800 text-white" style="font-size:1.05rem;"><?= $s[0] ?></div>
            <div style="font-size:.74rem;color:#64748b;"><?= $s[1] ?></div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Assessment UI mock -->
      <div class="col-lg-7 d-none d-lg-block">
        <div class="assess-mock">
          <div class="assess-topbar">
            <div>
              <div style="color:#fff;font-size:.82rem;font-weight:700;">Personality Profile Assessment</div>
              <div style="color:#94a3b8;font-size:.7rem;">Big Five Model · Question 14 of 40</div>
            </div>
            <div style="font-family:monospace;font-size:.78rem;color:#a78bfa;">14 / 40</div>
          </div>
          <div class="assess-progress">
            <div class="assess-progress-fill" style="width:35%;"></div>
          </div>
          <div style="padding:24px;">
            <div style="font-size:.72rem;color:#94a3b8;font-weight:600;text-transform:uppercase;letter-spacing:.5px;margin-bottom:10px;">How accurately does this statement describe you?</div>
            <div class="ps-q-text">"I enjoy meeting new people and feel energised after social interactions."</div>
            <div class="likert-label">
              <span>Strongly Disagree</span><span>Strongly Agree</span>
            </div>
            <div class="likert-row">
              <?php $opts=['1','2','3','4','5'];
              foreach($opts as $i=>$o): ?>
              <div class="likert-cell <?= $i===3?'sel':'' ?>"><?= $o ?></div>
              <?php endforeach; ?>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-4">
              <button class="btn btn-sm btn-outline-secondary">← Previous</button>
              <div style="display:flex;gap:4px;">
                <?php for($i=0;$i<40;$i++): ?>
                <div style="width:<?= $i<14?'10px':'7px' ?>;height:<?= $i<14?'10px':'7px' ?>;border-radius:50%;background:<?= $i<13?'var(--purple)':($i===13?'#7c3aed':'#e2e8f0') ?>;margin-top:<?= $i<14?'0':'1.5px' ?>;transition:.2s;"></div>
                <?php endfor; ?>
              </div>
              <button class="btn btn-sm btn-primary px-4">Save & Next →</button>
            </div>
          </div>
          <!-- Mini report preview at bottom -->
          <div style="background:#faf5ff;border-top:1px solid #ede9fe;padding:14px 24px;">
            <div style="font-size:.7rem;color:#7c3aed;font-weight:700;text-transform:uppercase;letter-spacing:.5px;margin-bottom:8px;">Your emerging profile (partial)</div>
            <div class="row g-2">
              <?php $traits=[['Extraversion','72%','var(--purple)'],['Agreeableness','84%','var(--green)'],['Conscientiousness','61%','var(--blue)'],['Openness','78%','var(--orange)']];
              foreach($traits as $t): ?>
              <div class="col-3">
                <div style="font-size:.66rem;color:#64748b;margin-bottom:3px;"><?= $t[0] ?></div>
                <div style="height:5px;background:#ede9fe;border-radius:3px;overflow:hidden;">
                  <div style="width:<?= $t[1] ?>;height:100%;background:<?= $t[2] ?>;border-radius:3px;"></div>
                </div>
                <div style="font-size:.66rem;font-weight:700;color:<?= $t[2] ?>;margin-top:2px;"><?= $t[1] ?></div>
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
      <?php foreach([['6+','Assessment frameworks'],['500+','Validated questions'],['3×','Better hiring decisions'],['ISO 10667','International standard']] as $s): ?>
      <div class="col-6 col-md-3">
        <div class="num"><?= $s[0] ?></div>
        <div class="lbl"><?= $s[1] ?></div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<!-- ═══ ASSESSMENT TYPES ═══ -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="text-center mb-5">
      <span class="badge mb-2 px-3 py-2" style="background:#faf5ff;color:var(--purple);font-size:.78rem;">Assessment Types</span>
      <h2 class="fw-800" style="color:var(--navy);">Six scientifically validated frameworks</h2>
      <p class="text-muted" style="max-width:540px;margin:.75rem auto 0;">Each assessment is built on peer-reviewed psychological research and validated across thousands of respondents before deployment.</p>
    </div>
    <div class="row g-4">
      <?php $types = [
        ['var(--purple)','#faf5ff','bi-person-fill','Big Five Personality (OCEAN)','The gold standard of personality science. Measures Openness, Conscientiousness, Extraversion, Agreeableness, and Neuroticism. Predicts job performance, team fit, and leadership potential.','40 questions · 15 min · Norm-referenced'],
        ['var(--blue)','#eff6ff','bi-cpu-fill','Cognitive Ability (Aptitude)','Numerical reasoning, verbal reasoning, abstract/logical reasoning, and spatial ability. The single strongest predictor of job performance across roles and industries.','60 questions · 25 min · Adaptive difficulty'],
        ['var(--green)','#f0fdf4','bi-heart-pulse-fill','Emotional Intelligence (EQ)','Measures self-awareness, self-regulation, empathy, social skills, and motivation. Critical for leadership, customer-facing, and team-based roles.','45 questions · 20 min · Situational format'],
        ['var(--orange)','#fff7ed','bi-diagram-3-fill','Situational Judgement (SJT)','Presents realistic workplace scenarios. Candidates choose the most and least effective response. Measures practical judgement without relying on domain knowledge.','20 scenarios · 30 min · Role-specific'],
        ['var(--teal)','#f0fdfa','bi-shield-fill','Integrity & Values','Assesses counterproductive work behaviours, rule compliance, and ethical decision-making. Used for roles with fiduciary responsibility or access to sensitive data.','35 questions · 12 min · Validated scale'],
        ['var(--pink)','#fdf2f8','bi-people-fill','Team Role Profiling','Based on Belbin\'s team roles framework. Identifies preferred team roles: Plant, Monitor-Evaluator, Co-ordinator, Implementer, and more. Builds high-performing teams.','32 questions · 12 min · Team-level reporting'],
      ]; foreach($types as $t): ?>
      <div class="col-md-6 col-lg-4">
        <div class="trait-card" style="border-top:4px solid <?= $t[0] ?>;">
          <div class="trait-icon" style="background:<?= $t[1] ?>;color:<?= $t[0] ?>;"><i class="bi <?= $t[2] ?>"></i></div>
          <h5 class="fw-800 mb-2" style="color:var(--navy);font-size:1rem;"><?= $t[3] ?></h5>
          <p class="text-muted mb-3" style="font-size:.84rem;line-height:1.6;"><?= $t[4] ?></p>
          <div style="font-size:.73rem;font-weight:600;color:<?= $t[0] ?>;background:<?= $t[1] ?>;padding:5px 12px;border-radius:20px;display:inline-block;"><?= $t[5] ?></div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ═══ SAMPLE REPORT ═══ -->
<section class="py-5">
  <div class="container">
    <div class="row g-5 align-items-start">
      <div class="col-lg-5">
        <span class="badge mb-2 px-3 py-2" style="background:#faf5ff;color:var(--purple);font-size:.78rem;">Candidate Reports</span>
        <h2 class="fw-800 mb-3" style="color:var(--navy);">Reports that tell you what to do next</h2>
        <p class="text-muted mb-4">Every candidate gets a detailed PDF report. Every recruiter gets a side-by-side comparison. Every L&D manager gets a team-level dashboard.</p>
        <ul class="list-unstyled mb-4">
          <?php foreach([
            ['bi-file-person-fill','var(--purple)','Individual profile report with trait breakdown and narrative interpretation'],
            ['bi-people-fill','var(--blue)','Side-by-side candidate comparison for shortlisting decisions'],
            ['bi-bar-chart-fill','var(--green)','Team composition report showing balance of roles and traits'],
            ['bi-graph-up-arrow','var(--orange)','Development report with suggested coaching focus areas'],
            ['bi-briefcase-fill','var(--teal)','Job-fit score mapped against your role competency framework'],
          ] as $li): ?>
          <li class="d-flex gap-3 mb-3 align-items-start">
            <div style="width:34px;height:34px;border-radius:9px;background:#f8fafc;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
              <i class="bi <?= $li[0] ?>" style="color:<?= $li[1] ?>;font-size:.95rem;"></i>
            </div>
            <span style="font-size:.88rem;color:#374151;padding-top:6px;"><?= $li[2] ?></span>
          </li>
          <?php endforeach; ?>
        </ul>
        <a href="<?= base_url('contact') ?>" class="btn btn-primary px-4">Request a Sample Report →</a>
      </div>

      <!-- Report mock -->
      <div class="col-lg-7">
        <div class="report-mock">
          <div class="report-header">
            <div class="d-flex align-items-center justify-content-between mb-2">
              <div>
                <div class="fw-800" style="font-size:1rem;">Personality Profile Report</div>
                <div style="font-size:.75rem;color:#c4b5fd;">Big Five (OCEAN) · Norm: Indian Management Professional</div>
              </div>
              <span class="badge py-2 px-3" style="background:rgba(255,255,255,.15);font-size:.72rem;">Confidential</span>
            </div>
            <div class="d-flex align-items-center gap-3">
              <div style="width:40px;height:40px;border-radius:50%;background:rgba(255,255,255,.15);display:flex;align-items:center;justify-content:center;font-weight:800;font-size:.9rem;">AM</div>
              <div>
                <div class="fw-700">Arjun Mehta</div>
                <div style="font-size:.72rem;color:#c4b5fd;">Senior Manager Candidate · GlobalEdge Technologies · 18 Jun 2026</div>
              </div>
            </div>
          </div>

          <div class="p-4">
            <!-- OCEAN bars -->
            <div class="mb-4">
              <div class="fw-700 mb-3" style="font-size:.85rem;color:var(--navy);">Trait Scores (percentile vs. norm group)</div>
              <?php $ocean = [
                ['Openness to Experience','O','78','var(--purple)','High openness — creative, curious, open to new ideas. Thrives in ambiguous, innovative environments.'],
                ['Conscientiousness','C','82','var(--blue)','High conscientiousness — organised, dependable, goal-directed. Strong predictor of performance.'],
                ['Extraversion','E','71','var(--orange)','Moderately high — enjoys collaboration and leadership but recharges alone. Adaptable.'],
                ['Agreeableness','A','65','var(--green)','Moderate — cooperative but will challenge when needed. Good for negotiation roles.'],
                ['Neuroticism (Emotional Stability)','N','28','var(--teal)','Low neuroticism = high emotional stability. Handles pressure and criticism well.'],
              ]; foreach($ocean as $trait): ?>
              <div class="score-bar-row">
                <div class="d-flex justify-content-between align-items-center">
                  <div class="d-flex align-items-center gap-2">
                    <span style="width:22px;height:22px;border-radius:50%;background:<?= $trait[3] ?>;color:#fff;font-size:.7rem;font-weight:800;display:flex;align-items:center;justify-content:center;"><?= $trait[1] ?></span>
                    <span style="font-size:.82rem;font-weight:600;color:var(--navy);"><?= $trait[0] ?></span>
                  </div>
                  <span class="fw-800" style="color:<?= $trait[3] ?>;font-size:.88rem;"><?= $trait[2] ?>th</span>
                </div>
                <div class="score-bar-track mt-1">
                  <div class="score-bar-fill" style="width:<?= $trait[2] ?>%;background:<?= $trait[3] ?>;"></div>
                </div>
                <div style="font-size:.72rem;color:#64748b;margin-top:3px;"><?= $trait[4] ?></div>
              </div>
              <?php endforeach; ?>
            </div>

            <!-- Job fit score -->
            <div class="d-flex align-items-center gap-3 p-3 rounded-3 mb-3" style="background:#f0fdf4;border:1px solid #bbf7d0;">
              <div style="width:56px;height:56px;border-radius:50%;background:var(--green);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                <span class="fw-800 text-white" style="font-size:1.1rem;">87</span>
              </div>
              <div>
                <div class="fw-700" style="color:#166534;font-size:.88rem;">Strong Role Fit — Senior Manager</div>
                <div style="font-size:.76rem;color:#16a34a;">87th percentile match against GlobalEdge's Senior Manager competency framework</div>
              </div>
            </div>

            <!-- Key narrative -->
            <div class="p-3 rounded-3" style="background:#faf5ff;border:1px solid #ede9fe;">
              <div class="fw-700 mb-1" style="font-size:.8rem;color:var(--purple);">Narrative Summary</div>
              <p class="mb-0" style="font-size:.8rem;color:#374151;line-height:1.6;">Arjun demonstrates the profile of a high-performing, emotionally stable leader with strong drive for achievement (C: 82nd) and creative problem-solving (O: 78th). His moderate agreeableness suggests he will challenge ideas constructively rather than comply uncritically — valuable in strategic roles. Recommended for fast-track leadership development.</p>
            </div>
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
      <span class="badge mb-2 px-3 py-2" style="background:#eff6ff;color:var(--blue);font-size:.78rem;">Platform Features</span>
      <h2 class="fw-800" style="color:var(--navy);">Everything you need for professional-grade assessment</h2>
    </div>
    <div class="row g-4">
      <?php $features = [
        ['bi-shield-fill-check','#faf5ff','var(--purple)','ISO 10667 Compliant','All assessments meet the international standard for assessment service delivery in work and organisational settings.'],
        ['bi-translate','#f0fdf4','var(--green)','14 Languages','Assessments available in English, Hindi, Tamil, Telugu, Bengali, Marathi, and 8 more. Same psychometric properties across all languages.'],
        ['bi-phone-fill','#eff6ff','var(--blue)','Mobile-Optimised','Candidates complete assessments on any device — smartphone, tablet, or desktop — with no drop in reliability or validity.'],
        ['bi-sliders','#fff7ed','var(--orange)','Configurable Norm Groups','Compare candidates against the right peer group — Indian IT professionals, banking sector, fresh graduates, or your own organisation.'],
        ['bi-plug-fill','#f0fdfa','var(--teal)','ATS & HRMS Integration','Push assessment results directly into Zoho Recruit, Darwinbox, SAP SuccessFactors, Workday, or any ATS via API.'],
        ['bi-clock-fill','#fdf2f8','var(--pink)','Adaptive Testing','Cognitive assessments use adaptive algorithms — harder questions for high performers, easier for others. More precise in less time.'],
        ['bi-graph-up-arrow','#faf5ff','var(--purple)','Predictive Validity Reporting','Track how assessment scores correlate with actual on-the-job performance in your organisation over time.'],
        ['bi-building','#f8fafc','var(--navy)','Custom Competency Mapping','Map any assessment to your organisation\'s competency framework. Generate role-fit scores automatically.'],
        ['bi-person-workspace','#f0fdf4','var(--green)','360-Degree Feedback','Combine self-assessment with observer ratings from managers, peers, and direct reports for a full development picture.'],
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

<!-- ═══ USE CASES ═══ -->
<section class="py-5">
  <div class="container">
    <div class="text-center mb-5">
      <span class="badge mb-2 px-3 py-2" style="background:#f0fdf4;color:var(--green);font-size:.78rem;">Who Uses Psychometrics</span>
      <h2 class="fw-800" style="color:var(--navy);">Three high-impact use cases</h2>
    </div>
    <div class="row g-4">

      <!-- Hiring -->
      <div class="col-lg-4">
        <div style="background:#fff;border:1px solid #e2e8f0;border-radius:16px;overflow:hidden;height:100%;">
          <div style="background:linear-gradient(135deg,var(--purple),#5b21b6);padding:28px 28px 20px;">
            <i class="bi bi-person-check-fill text-white fs-2 mb-3 d-block"></i>
            <h4 class="fw-800 text-white mb-2">Recruitment Screening</h4>
            <p style="color:#ddd6fe;font-size:.88rem;">Add a psychometric layer before interviews. Screen for cognitive ability, personality fit, and integrity — before investing interview time.</p>
          </div>
          <div class="p-4">
            <?php foreach([
              'Reduce unqualified interview invites by 60%',
              'Identify high-potential candidates who may be overlooked on CV alone',
              'Compare candidates objectively against a standardised benchmark',
              'Spot integrity risks before hiring for sensitive roles',
              'Shortlist by job-fit score — not gut feel',
            ] as $li): ?>
            <div class="d-flex gap-2 mb-2" style="font-size:.84rem;color:#374151;">
              <i class="bi bi-check-circle-fill flex-shrink-0 mt-1" style="color:var(--purple);font-size:.8rem;"></i><?= $li ?>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

      <!-- L&D -->
      <div class="col-lg-4">
        <div style="background:#fff;border:1px solid #e2e8f0;border-radius:16px;overflow:hidden;height:100%;">
          <div style="background:linear-gradient(135deg,var(--blue),#1e40af);padding:28px 28px 20px;">
            <i class="bi bi-graph-up-arrow text-white fs-2 mb-3 d-block"></i>
            <h4 class="fw-800 text-white mb-2">Leadership Development</h4>
            <p style="color:#bfdbfe;font-size:.88rem;">Understand your leaders' strengths and blind spots. Design targeted development plans grounded in data — not opinion.</p>
          </div>
          <div class="p-4">
            <?php foreach([
              'Map leadership potential across management cohorts',
              'Identify emotional intelligence gaps before they become problems',
              'Build succession pipelines based on trait data',
              'Personalise coaching programmes for each leader',
              'Track development over time with repeated assessments',
            ] as $li): ?>
            <div class="d-flex gap-2 mb-2" style="font-size:.84rem;color:#374151;">
              <i class="bi bi-check-circle-fill flex-shrink-0 mt-1" style="color:var(--blue);font-size:.8rem;"></i><?= $li ?>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

      <!-- Teams -->
      <div class="col-lg-4">
        <div style="background:#fff;border:1px solid #e2e8f0;border-radius:16px;overflow:hidden;height:100%;">
          <div style="background:linear-gradient(135deg,var(--teal),#0f766e);padding:28px 28px 20px;">
            <i class="bi bi-people-fill text-white fs-2 mb-3 d-block"></i>
            <h4 class="fw-800 text-white mb-2">Team Building</h4>
            <p style="color:#99f6e4;font-size:.88rem;">Understand the personality composition of your teams. Spot imbalances before they cause friction — and build stronger groups deliberately.</p>
          </div>
          <div class="p-4">
            <?php foreach([
              'See the Big Five profile of your entire team at a glance',
              'Identify missing roles (e.g. no "Completer-Finisher" in a delivery team)',
              'Reduce interpersonal conflict by understanding style differences',
              'Use team reports in workshop and off-site settings',
              'Onboard new hires with awareness of team dynamics',
            ] as $li): ?>
            <div class="d-flex gap-2 mb-2" style="font-size:.84rem;color:#374151;">
              <i class="bi bi-check-circle-fill flex-shrink-0 mt-1" style="color:var(--teal);font-size:.8rem;"></i><?= $li ?>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ═══ SCIENTIFIC VALIDITY ═══ -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="row g-5 align-items-center">
      <div class="col-lg-5">
        <span class="badge mb-2 px-3 py-2" style="background:#faf5ff;color:var(--purple);font-size:.78rem;">Scientific Foundation</span>
        <h2 class="fw-800 mb-3" style="color:var(--navy);">Not a quiz. A validated instrument.</h2>
        <p class="text-muted mb-4">Every assessment on ExamRankers Psychometric is developed following the Standards for Educational and Psychological Testing (APA/NCME) and validated on Indian populations specifically.</p>
        <div class="row g-3">
          <?php $sci = [
            ['Criterion Validity','Assessment scores predict actual job performance. We publish validity coefficients for every instrument.','var(--purple)','#faf5ff'],
            ['Test-Retest Reliability','Scores are stable over time (r > 0.80 at 4-week retest). Measures a stable trait, not a mood.','var(--blue)','#eff6ff'],
            ['Internal Consistency','Cronbach\'s α > 0.85 across all scales. Questions in each scale consistently measure the same construct.','var(--green)','#f0fdf4'],
            ['Norm Referencing','Scores benchmarked against a representative Indian working population sample of 12,000+ respondents.','var(--orange)','#fff7ed'],
          ]; foreach($sci as $s): ?>
          <div class="col-6">
            <div class="p-3 rounded-3 h-100" style="background:<?= $s[3] ?>;border:1px solid <?= $s[2] ?>22;">
              <div class="fw-700 mb-1" style="font-size:.82rem;color:var(--navy);"><?= $s[0] ?></div>
              <p class="mb-0" style="font-size:.76rem;color:#374151;"><?= $s[1] ?></p>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="col-lg-7">
        <div class="bg-white border rounded-3 p-4 shadow-sm mb-3">
          <div class="fw-700 mb-3" style="color:var(--navy);font-size:.9rem;">Validation Standards & Certifications</div>
          <div class="d-flex flex-wrap gap-2">
            <?php $badges = [
              ['var(--purple)','#faf5ff','ISO 10667:2020','Assessment service delivery'],
              ['var(--blue)','#eff6ff','APA Standards','Psychological testing'],
              ['var(--green)','#f0fdf4','EFPA Level B','European psychometric standard'],
              ['var(--orange)','#fff7ed','NCME Aligned','Educational measurement'],
              ['var(--teal)','#f0fdfa','Indian Norm Sample','12,000+ respondents'],
              ['var(--navy)','#f1f5f9','Bias Tested','Gender · Age · Language neutral'],
            ]; foreach($badges as $b): ?>
            <div class="val-badge" style="background:<?= $b[1] ?>;color:<?= $b[0] ?>;border-color:<?= $b[0] ?>33;">
              <i class="bi bi-patch-check-fill"></i>
              <div>
                <div class="fw-700" style="font-size:.76rem;"><?= $b[2] ?></div>
                <div style="font-size:.66rem;opacity:.8;"><?= $b[3] ?></div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- Predictive stats -->
        <div class="bg-white border rounded-3 p-4 shadow-sm">
          <div class="fw-700 mb-3" style="color:var(--navy);font-size:.9rem;">Predictive validity — published coefficients</div>
          <?php $validity = [
            ['Cognitive Ability → Job Performance','r = 0.51','var(--blue)',51],
            ['Big Five Conscientiousness → Performance','r = 0.41','var(--purple)',41],
            ['EQ → Leadership Effectiveness','r = 0.46','var(--green)',46],
            ['Integrity Test → Counterproductive Behaviour','r = -0.41','var(--orange)',41],
            ['SJT → Customer Service Performance','r = 0.38','var(--teal)',38],
          ]; foreach($validity as $v): ?>
          <div class="d-flex align-items-center gap-3 mb-2">
            <div style="flex:1;font-size:.78rem;color:#374151;"><?= $v[0] ?></div>
            <div style="width:100px;height:6px;background:#f1f5f9;border-radius:3px;overflow:hidden;flex-shrink:0;">
              <div style="width:<?= $v[3]*2 ?>%;height:100%;background:<?= $v[2] ?>;border-radius:3px;"></div>
            </div>
            <div style="width:44px;text-align:right;font-weight:700;font-size:.78rem;color:<?= $v[2] ?>;flex-shrink:0;"><?= $v[1] ?></div>
          </div>
          <?php endforeach; ?>
          <p class="mb-0 mt-3" style="font-size:.72rem;color:#94a3b8;">Source: published meta-analyses (Schmidt & Hunter, 1998; Joseph & Newman, 2010). Coefficients corrected for attenuation.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ PLAN TABLE ═══ -->
<section class="py-5">
  <div class="container">
    <h2 class="fw-800 text-center mb-2" style="color:var(--navy);">Psychometric features by plan</h2>
    <p class="text-center text-muted mb-5">Core personality and aptitude testing from Professional. Full suite on Enterprise.</p>
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
            ['Big Five Personality (OCEAN)','✗','✓','✓'],
            ['Cognitive Ability (Aptitude)','✗','✓','✓'],
            ['Emotional Intelligence (EQ)','✗','✓','✓'],
            ['Situational Judgement (SJT)','✗','✗','✓'],
            ['Integrity & Values Assessment','✗','✗','✓'],
            ['Team Role Profiling (Belbin)','✗','✗','✓'],
            ['Individual PDF report','✗','✓','✓'],
            ['Side-by-side candidate comparison','✗','✓','✓'],
            ['Team composition report','✗','✗','✓'],
            ['Leadership development report','✗','✗','✓'],
            ['Job-fit score vs. competency framework','✗','✓','✓'],
            ['14-language delivery','✗','✓','✓'],
            ['Adaptive testing algorithm','✗','✓','✓'],
            ['Custom norm group configuration','✗','✗','✓'],
            ['360-degree feedback module','✗','✗','✓'],
            ['Predictive validity tracking','✗','✗','✓'],
            ['ATS / HRMS integration','✗','✓','✓'],
            ['API access to results','✗','✓','✓'],
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
      <p class="fs-5 fst-italic text-muted mb-4">"We added the Big Five and Cognitive Ability assessments to our management hiring process. In the first six months, early attrition among new hires dropped by 34% and average performance review scores rose by 18%. The data speaks for itself."</p>
      <div class="d-flex align-items-center gap-3">
        <div style="width:44px;height:44px;border-radius:50%;background:var(--purple);display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;">M</div>
        <div>
          <strong style="color:var(--navy);">Mohit Agarwal</strong>
          <div class="text-muted small">Talent Head, GlobalEdge Technologies</div>
        </div>
        <div class="ms-auto">
          <?php for($i=0;$i<5;$i++): ?><i class="bi bi-star-fill" style="color:#f59e0b;font-size:.9rem;"></i><?php endfor; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ CTA ═══ -->
<section class="py-5 text-center" style="background:linear-gradient(135deg,#1e0a4f,var(--navy));">
  <div class="container">
    <h2 class="fw-800 text-white mb-3">Start measuring what actually predicts performance</h2>
    <p class="mb-4" style="color:#94a3b8;max-width:480px;margin:0 auto 1.5rem;">Request a free demo with a sample assessment and report tailored to one of your open roles.</p>
    <div class="d-flex justify-content-center gap-3 flex-wrap">
      <a href="<?= base_url('contact') ?>" class="btn btn-primary btn-lg px-5">Book a Free Demo</a>
      <a href="<?= base_url('pricing') ?>" class="btn btn-outline-light btn-lg px-4">View Pricing</a>
    </div>
  </div>
</section>
