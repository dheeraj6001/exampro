<?php
/**
 * ExamRankers — One-time setup (SQLite version)
 * Open this URL once in your browser, then DELETE the file.
 */

$db_path = __DIR__ . '/application/database/examrankers.db';

$admin_name     = 'Admin';
$admin_username = 'admin';
$admin_email    = 'admin@examrankers.com';
$admin_password = 'Admin@123';

header('Content-Type: text/html; charset=utf-8');

function render($icon, $heading, $color, $body) {
    echo '<!DOCTYPE html><html><head><meta charset="utf-8">
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
          </head><body class="bg-light d-flex align-items-center justify-content-center" style="min-height:100vh;">';
    echo '<div class="card shadow p-5 text-center" style="max-width:520px;width:100%;">
            <div class="fs-1 mb-3">' . $icon . '</div>
            <h4 class="fw-bold text-' . $color . '">' . $heading . '</h4>' . $body . '
          </div></body></html>';
}

try {
    if (!is_dir(dirname($db_path))) {
        mkdir(dirname($db_path), 0755, true);
    }

    $pdo = new PDO('sqlite:' . $db_path);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('PRAGMA journal_mode=WAL;');

    // Create tables
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS er_admins (
            id         INTEGER PRIMARY KEY AUTOINCREMENT,
            name       TEXT    NOT NULL,
            username   TEXT    NOT NULL UNIQUE,
            email      TEXT    NOT NULL UNIQUE,
            password   TEXT    NOT NULL,
            created_at TEXT    DEFAULT (datetime('now'))
        );

        CREATE TABLE IF NOT EXISTS er_blog_posts (
            id         INTEGER PRIMARY KEY AUTOINCREMENT,
            title      TEXT    NOT NULL,
            slug       TEXT    NOT NULL UNIQUE,
            excerpt    TEXT    DEFAULT '',
            content    TEXT    DEFAULT '',
            category   TEXT    DEFAULT 'General',
            image      TEXT    DEFAULT '',
            status     TEXT    DEFAULT 'draft',
            created_at TEXT    DEFAULT (datetime('now')),
            updated_at TEXT    DEFAULT (datetime('now'))
        );

        CREATE TABLE IF NOT EXISTS er_settings (
            id            INTEGER PRIMARY KEY AUTOINCREMENT,
            setting_key   TEXT    NOT NULL UNIQUE,
            setting_value TEXT
        );

        CREATE TABLE IF NOT EXISTS er_testimonials (
            id             INTEGER PRIMARY KEY AUTOINCREMENT,
            name           TEXT    NOT NULL,
            org            TEXT    DEFAULT '',
            quote          TEXT    NOT NULL,
            stars          INTEGER DEFAULT 5,
            avatar_initial TEXT    DEFAULT 'A',
            avatar_color   TEXT    DEFAULT '#1a56db',
            status         TEXT    DEFAULT 'active',
            sort_order     INTEGER DEFAULT 0
        );

        CREATE TABLE IF NOT EXISTS er_faqs (
            id         INTEGER PRIMARY KEY AUTOINCREMENT,
            question   TEXT    NOT NULL,
            answer     TEXT    NOT NULL,
            sort_order INTEGER DEFAULT 0,
            status     TEXT    DEFAULT 'active'
        );
    ");

    // Admin user (upsert)
    $hash = password_hash($admin_password, PASSWORD_DEFAULT);
    $pdo->prepare("
        INSERT INTO er_admins (name, username, email, password)
        VALUES (?, ?, ?, ?)
        ON CONFLICT(username) DO UPDATE SET password=excluded.password, name=excluded.name, email=excluded.email
    ")->execute([$admin_name, $admin_username, $admin_email, $hash]);

    // Default settings (only if not yet seeded)
    $existing = $pdo->query("SELECT COUNT(*) FROM er_settings")->fetchColumn();
    if ($existing == 0) {
        $ins = $pdo->prepare("INSERT OR IGNORE INTO er_settings (setting_key, setting_value) VALUES (?,?)");
        foreach ([
            ['site_name',      'ExamRankers'],
            ['site_phone',     '+91 98765 43210'],
            ['site_email',     'info@examrankers.com'],
            ['site_address',   'New Delhi, India'],
            ['facebook_url',   '#'],
            ['twitter_url',    '#'],
            ['linkedin_url',   '#'],
            ['youtube_url',    '#'],
            ['footer_tagline', "India's most trusted online exam & marking platform."],
        ] as $row) $ins->execute($row);
    }

    // Default testimonials
    $existing = $pdo->query("SELECT COUNT(*) FROM er_testimonials")->fetchColumn();
    if ($existing == 0) {
        $ins = $pdo->prepare("INSERT INTO er_testimonials (name,org,quote,stars,avatar_initial,avatar_color,status,sort_order) VALUES (?,?,?,?,?,?,?,?)");
        foreach ([
            ['Dr. Rajesh Sharma','Controller of Exams, NIT Surat','The auto-marking engine saved our faculty 200+ hours per semester. Descriptive marking panel is clean and fast.',5,'R','#1a56db','active',1],
            ['Priya Nair','Director, EduVision Academy','JEE mock tests for 50,000 students with zero downtime. Rank lists published within seconds of exam end.',5,'P','#0d9488','active',2],
            ['Amit Verma','Head of Certification, SkillBridge','Blind marking with double moderation replaced months of manual paper handling with a fully digital process.',5,'A','#7c3aed','active',3],
            ['Sunita Gupta','CEO, TopRanker Coaching','White-label feature is fantastic. Marking schemes, negative marking, and partial credit work exactly as configured.',5,'S','#ea580c','active',4],
            ['Mohit Agarwal','Talent Head, GlobalEdge Technologies','HR team screens 2,000+ applicants a week with auto-graded aptitude tests. Time-to-hire cut by 40%.',5,'M','#0f766e','active',5],
            ['Kavitha Rajan','Principal, Greenfield College','Switched from paper to ExamRankers in 2 weeks. Auto certificates with QR verification impressed everyone.',5,'K','#be185d','active',6],
        ] as $r) $ins->execute($r);
    }

    // Default FAQs
    $existing = $pdo->query("SELECT COUNT(*) FROM er_faqs")->fetchColumn();
    if ($existing == 0) {
        $ins = $pdo->prepare("INSERT INTO er_faqs (question,answer,sort_order,status) VALUES (?,?,?,?)");
        foreach ([
            ['Is there a free trial?','Yes — all plans come with a 30-day free trial, no credit card required. You can conduct up to 3 live exams with up to 50 candidates each during the trial.',1,'active'],
            ['How quickly can we go live?','Most clients are up and running within 24 hours. Our onboarding team assists with setup, question import, and your first test run.',2,'active'],
            ['Do you support offline exams?','Yes. Our offline mode allows candidates to take exams without a stable internet connection. Responses sync automatically when connectivity is restored.',3,'active'],
            ['Is the platform secure?','ExamRankers is ISO 27001 certified and SOC 2 Type II compliant. All data is encrypted in transit and at rest.',4,'active'],
            ['Can we use our own domain and branding?','Absolutely. All Professional and Enterprise plans include a white-label portal with your custom domain, logo, and brand colors.',5,'active'],
        ] as $r) $ins->execute($r);
    }

    // Sample blog posts
    $existing = $pdo->query("SELECT COUNT(*) FROM er_blog_posts")->fetchColumn();
    if ($existing == 0) {
        $ins = $pdo->prepare("INSERT INTO er_blog_posts (title,slug,excerpt,content,category,image,status,created_at,updated_at) VALUES (?,?,?,?,?,?,?,?,?)");
        $now = date('Y-m-d H:i:s');
        $posts = [
            [
                'How AI-Powered Auto-Marking Is Transforming Online Exams',
                'how-ai-auto-marking-transforming-online-exams',
                'Manual paper checking is slow, inconsistent, and expensive. Discover how AI-based auto-marking engines are changing the game for educational institutions and certification bodies.',
                '<h2>The Problem with Manual Marking</h2>
<p>Every year, millions of exam papers are checked by hand. Evaluators work under extreme pressure, often marking hundreds of scripts in a short window. Fatigue, bias, and inconsistency are inevitable — and costly.</p>
<p>A study by the University of Cambridge found that the same answer script could receive marks varying by up to 15% depending on the evaluator and the time of day. That margin can be the difference between a pass and a fail for a student.</p>
<h2>What AI Auto-Marking Actually Does</h2>
<p>Modern auto-marking engines use a combination of Natural Language Processing (NLP) and machine learning models trained on thousands of previously marked scripts. The system understands context, synonyms, partial credit, and even subject-specific terminology.</p>
<ul>
  <li><strong>MCQ and fill-in-the-blank:</strong> Marked instantly with 100% accuracy.</li>
  <li><strong>Short descriptive answers:</strong> NLP models compare semantic meaning, not just keywords.</li>
  <li><strong>Long-form essays:</strong> Evaluated against a rubric with human review flagging.</li>
</ul>
<h2>Real Results from Real Institutions</h2>
<p>NIT Surat deployed ExamRankers auto-marking for their end-semester exams and reported a <strong>78% reduction in evaluation time</strong> and a significant drop in student grievances related to marking inconsistency.</p>
<blockquote><em>"The auto-marking engine saved our faculty 200+ hours per semester. The descriptive marking panel is clean and fast."</em> — Dr. Rajesh Sharma, Controller of Exams</blockquote>
<h2>Is Human Review Still Needed?</h2>
<p>Yes — and ExamRankers is designed with this in mind. The platform flags low-confidence answers for human review, supports double moderation, and maintains a full audit trail. AI speeds up the process; human judgment ensures fairness.</p>
<h2>Getting Started</h2>
<p>Setting up auto-marking on ExamRankers takes under 30 minutes. You define the answer key, set partial-credit rules, and the system handles the rest. Try it free for 30 days — no credit card required.</p>',
                'Marking & Evaluation',
                'https://images.unsplash.com/photo-1606326608606-aa0b62935f2b?w=800&q=80',
                'published',
                date('Y-m-d H:i:s', strtotime('-5 days')),
                date('Y-m-d H:i:s', strtotime('-5 days')),
            ],
            [
                'Top 10 Online Exam Best Practices for Higher Education',
                'top-10-online-exam-best-practices-higher-education',
                'Running online exams at scale requires more than just uploading a question paper. Here are 10 battle-tested practices from institutions that have successfully moved their assessments online.',
                '<h2>1. Define Your Assessment Goals First</h2>
<p>Before choosing tools or formats, clarify what you are measuring. Is it recall, application, analysis, or creation? The goal determines the question type — MCQ for recall, case studies for application, essays for analysis.</p>
<h2>2. Randomise Questions and Options</h2>
<p>Use a question bank with randomisation to ensure no two students see the same paper. This is the single most effective deterrent against collusion.</p>
<h2>3. Set Appropriate Time Limits</h2>
<p>Online exams should allow 20–30% more time than paper equivalents to account for typing speed and system lag. For a 60-mark paper, allow 75–80 minutes.</p>
<h2>4. Enable AI Proctoring Selectively</h2>
<p>AI proctoring works best for high-stakes exams. For routine class tests, it adds friction without proportionate benefit. Match the security level to the exam importance.</p>
<h2>5. Test the System Before Exam Day</h2>
<p>Run a mandatory mock test at least one week before the actual exam. This catches connectivity issues, browser incompatibility, and candidate anxiety early.</p>
<h2>6. Have a Clear Malpractice Policy</h2>
<p>Students should know exactly what is and is not allowed before they begin. Ambiguity leads to disputes. Publish your malpractice policy alongside the exam instructions.</p>
<h2>7. Use Section-Wise Timing</h2>
<p>For mixed-format exams (MCQ + descriptive), lock each section with its own timer. This prevents candidates from spending all their time on easy questions.</p>
<h2>8. Provide Instant Feedback Where Possible</h2>
<p>For formative assessments, show correct answers immediately after submission. Instant feedback accelerates learning and reduces result-anxiety.</p>
<h2>9. Archive All Recordings and Logs</h2>
<p>Maintain a complete audit trail — screen recordings, login timestamps, answer change logs — for a minimum of 6 months. This protects the institution in case of disputes.</p>
<h2>10. Collect Candidate Feedback</h2>
<p>Send a 3-question survey after each exam asking about technical experience, time adequacy, and question clarity. Two cycles of feedback are usually enough to resolve 80% of recurring issues.</p>',
                'Online Exam Tips',
                'https://images.unsplash.com/photo-1501504905252-473c47e087f8?w=800&q=80',
                'published',
                date('Y-m-d H:i:s', strtotime('-12 days')),
                date('Y-m-d H:i:s', strtotime('-12 days')),
            ],
            [
                'Blind Marking Explained: How to Eliminate Evaluator Bias',
                'blind-marking-eliminate-evaluator-bias',
                'Evaluator bias — conscious or not — is one of the biggest threats to fair assessment. Blind marking removes the human element from the equation. Here is how it works and how to implement it.',
                '<h2>What Is Blind Marking?</h2>
<p>Blind marking (also called anonymous marking) is a process where the evaluator does not know whose script they are assessing. Student names, roll numbers, and other identifying information are hidden until after the marking is complete.</p>
<h2>Why It Matters</h2>
<p>Research consistently shows that evaluators — even experienced ones — are influenced by factors unrelated to answer quality:</p>
<ul>
  <li>Handwriting quality (in paper exams)</li>
  <li>The student\'s known academic performance</li>
  <li>Gender and cultural name associations</li>
  <li>The order in which scripts are marked (halo effect)</li>
</ul>
<p>A 2019 meta-analysis found that blind marking increased marks awarded to female students in STEM subjects by an average of 3.4 percentage points — not because examiners are deliberately biased, but because of unconscious associations.</p>
<h2>Double Moderation: Taking It Further</h2>
<p>Blind marking is most effective when combined with double moderation — where two independent evaluators mark the same script without seeing each other\'s scores. If scores diverge by more than a set threshold (typically 10%), a third senior evaluator adjudicates.</p>
<h2>How ExamRankers Implements It</h2>
<ol>
  <li>Candidates submit answers anonymously — only a system-generated ID is visible to evaluators.</li>
  <li>Scripts are distributed randomly across the evaluator pool.</li>
  <li>Evaluators mark using a structured rubric with defined scoring bands.</li>
  <li>The system flags divergent scores automatically for moderation.</li>
  <li>Final marks are released only after the moderation round is complete.</li>
</ol>
<h2>Implementation Tips</h2>
<p>Start with your highest-stakes assessments first. Blind marking adds a small administrative overhead — for routine tests, the benefit may not justify the process change. Focus on final exams, certifications, and competitive selections.</p>',
                'Marking & Evaluation',
                'https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=800&q=80',
                'published',
                date('Y-m-d H:i:s', strtotime('-18 days')),
                date('Y-m-d H:i:s', strtotime('-18 days')),
            ],
            [
                'AI Proctoring vs Human Proctoring: Which Should You Choose?',
                'ai-proctoring-vs-human-proctoring',
                'Both AI and human proctoring have their place in online assessment. This guide breaks down the cost, accuracy, and candidate experience of each approach so you can make the right choice for your organisation.',
                '<h2>The Core Difference</h2>
<p>Human proctoring uses a live invigilator watching a video feed in real time. AI proctoring uses computer vision and behavioural analysis to flag suspicious activity automatically.</p>
<h2>Cost Comparison</h2>
<table class="table table-bordered">
  <thead><tr><th>Factor</th><th>Human Proctoring</th><th>AI Proctoring</th></tr></thead>
  <tbody>
    <tr><td>Cost per candidate</td><td>₹150–500</td><td>₹20–80</td></tr>
    <tr><td>Scales to 10,000 candidates?</td><td>Very difficult</td><td>Yes, easily</td></tr>
    <tr><td>Available 24/7?</td><td>Limited</td><td>Yes</td></tr>
    <tr><td>Privacy concerns</td><td>High</td><td>Medium</td></tr>
  </tbody>
</table>
<h2>What AI Proctoring Detects</h2>
<ul>
  <li>Face not visible or multiple faces detected</li>
  <li>Eyes leaving the screen for extended periods</li>
  <li>Mouth movement (indicating verbal communication)</li>
  <li>Noise detection (voices in the background)</li>
  <li>Tab switching or opening other applications</li>
  <li>Copy-paste attempts</li>
</ul>
<h2>What AI Proctoring Cannot Detect</h2>
<p>AI is not perfect. It struggles with poor lighting, candidates wearing glasses, and environments with multiple people visible. It also cannot verify that the physical materials on a desk are not notes.</p>
<h2>Our Recommendation</h2>
<p><strong>Use AI proctoring as your default</strong> for most online exams. Reserve human proctoring for your highest-stakes certifications — professional qualifications, competitive entrance exams, or exams with significant consequences for failure.</p>
<p>A hybrid model — AI proctoring with human review of flagged incidents — gives you the best of both worlds at a fraction of the cost of full human supervision.</p>',
                'AI Proctoring',
                'https://images.unsplash.com/photo-1587620962725-abab19836100?w=800&q=80',
                'published',
                date('Y-m-d H:i:s', strtotime('-25 days')),
                date('Y-m-d H:i:s', strtotime('-25 days')),
            ],
            [
                'How TopRanker Coaching Scaled to 50,000 JEE Mock Tests',
                'topranker-coaching-jee-mock-test-case-study',
                'When TopRanker Coaching needed to run JEE mock tests for 50,000 students simultaneously, they turned to ExamRankers. Here is the full story of how they did it — and what others can learn from it.',
                '<h2>The Challenge</h2>
<p>TopRanker Coaching runs India\'s largest online JEE preparation programme. Every month, they conduct a full-length mock test for their entire student base — over 50,000 students sitting the same paper simultaneously across 300+ cities.</p>
<p>Before ExamRankers, they were using a home-built system that crashed every time they exceeded 8,000 concurrent users. Result processing took 48 hours. Rank lists were published manually from Excel files.</p>
<h2>What They Needed</h2>
<ul>
  <li>Ability to handle 50,000+ concurrent users without performance degradation</li>
  <li>Instant rank generation the moment the exam ends</li>
  <li>Detailed performance analytics per student, per topic, per question</li>
  <li>White-label portal with their own domain and branding</li>
  <li>Offline mode for students in areas with unstable internet</li>
</ul>
<h2>The Solution</h2>
<p>ExamRankers deployed a dedicated cloud environment for TopRanker with auto-scaling infrastructure. The platform\'s distributed queue system processes answers in parallel — a 50,000-student exam is fully evaluated in under 90 seconds after the last submission.</p>
<h2>Results After 6 Months</h2>
<ul>
  <li><strong>Zero downtime</strong> across all mock tests</li>
  <li>Rank lists published <strong>within 2 minutes</strong> of exam end</li>
  <li>Student complaints about technical issues dropped by <strong>94%</strong></li>
  <li>Coaching team saved <strong>120 hours/month</strong> on result processing</li>
  <li>Parent satisfaction scores increased by <strong>31%</strong></li>
</ul>
<blockquote><em>"JEE mock tests for 50,000 students with zero downtime. Rank lists published within seconds of exam end. Rock solid."</em> — Priya Nair, Director, EduVision Academy</blockquote>
<h2>Key Takeaway</h2>
<p>Infrastructure is the hidden cost of online exams. Most platforms are built for average load — not peak load. If your exam matters, your platform needs to be built for the worst case, every time.</p>',
                'Case Studies',
                'https://images.unsplash.com/photo-1523240795612-9a054b0db644?w=800&q=80',
                'published',
                date('Y-m-d H:i:s', strtotime('-32 days')),
                date('Y-m-d H:i:s', strtotime('-32 days')),
            ],
            [
                'Setting Up Negative Marking and Partial Credit: A Practical Guide',
                'negative-marking-partial-credit-guide',
                'Getting marking schemes right is critical for competitive and professional exams. This guide covers how to configure negative marking, partial credit, and section-wise weighting in ExamRankers.',
                '<h2>Why Marking Schemes Matter</h2>
<p>A poorly designed marking scheme can make a well-designed exam unfair. If negative marking is too aggressive, risk-averse students are penalised for guessing — even when they have partial knowledge. If it is too lenient, the exam loses its ability to differentiate ability levels.</p>
<h2>Negative Marking: How to Set It Right</h2>
<p>The standard negative marking formula used in competitive exams like JEE and UPSC is:</p>
<p><code>Score = (Correct × Full marks) − (Wrong × Penalty fraction)</code></p>
<p>Common penalty fractions:</p>
<ul>
  <li><strong>−¼ mark</strong> — Standard for 4-option MCQs (JEE, NEET)</li>
  <li><strong>−⅓ mark</strong> — Used when 3 options are presented</li>
  <li><strong>−½ mark</strong> — High-stakes professional exams</li>
  <li><strong>0</strong> — Formative assessments where guessing is acceptable</li>
</ul>
<p>In ExamRankers, you set the penalty per question type in the Exam Settings panel. Different sections of the same exam can have different penalty values.</p>
<h2>Partial Credit for Descriptive Questions</h2>
<p>Partial credit should be tied to a rubric with defined scoring bands. For a 10-mark descriptive question, a typical band structure:</p>
<ul>
  <li><strong>9–10:</strong> Complete, accurate answer with all key points addressed</li>
  <li><strong>7–8:</strong> Mostly correct with minor omissions</li>
  <li><strong>5–6:</strong> Core concept correct but significant gaps</li>
  <li><strong>3–4:</strong> Partial understanding demonstrated</li>
  <li><strong>1–2:</strong> Attempted but mostly incorrect</li>
  <li><strong>0:</strong> Not attempted or entirely irrelevant</li>
</ul>
<h2>Section-Wise Weighting</h2>
<p>For exams covering multiple subjects, weight sections by their relative importance. ExamRankers lets you assign a multiplier per section — Physics questions at 1.5× weight compared to General Knowledge, for example.</p>
<h2>Testing Your Scheme Before Go-Live</h2>
<p>Always run a shadow marking exercise before the live exam: have 10 evaluators mark the same 20 scripts using your rubric. If average scores deviate by more than 8%, refine the rubric before the real event.</p>',
                'Marking & Evaluation',
                'https://images.unsplash.com/photo-1596496181848-3091d4878b24?w=800&q=80',
                'published',
                date('Y-m-d H:i:s', strtotime('-40 days')),
                date('Y-m-d H:i:s', strtotime('-40 days')),
            ],
            [
                'How to Build a Question Bank That Actually Works',
                'how-to-build-question-bank-that-works',
                'A poorly organised question bank is worse than no question bank at all. Here is a step-by-step guide to building a question bank that delivers consistent, fair exams every time.',
                '<h2>Why Most Question Banks Fail</h2>
<p>Institutions spend months uploading questions into a system, only to find that their randomised exams are either too easy, too hard, or wildly inconsistent in difficulty between students. The problem is almost never the software — it is the question bank design.</p>
<h2>Step 1: Define Difficulty Levels Clearly</h2>
<p>Every question must be tagged with a difficulty level before it enters the bank. Use a three-tier system:</p>
<ul>
  <li><strong>Easy (L1):</strong> Direct recall — definition, formula, single-step calculation</li>
  <li><strong>Medium (L2):</strong> Application — two-step problem, concept applied to scenario</li>
  <li><strong>Hard (L3):</strong> Analysis/synthesis — multi-step, cross-topic, judgement required</li>
</ul>
<p>A well-balanced exam for most subjects: 30% L1, 50% L2, 20% L3.</p>
<h2>Step 2: Tag Every Question Accurately</h2>
<p>Each question needs at minimum: subject, chapter/topic, difficulty, question type (MCQ/descriptive/numerical), and estimated time to answer. These tags drive intelligent randomisation.</p>
<h2>Step 3: Maintain a Review Cycle</h2>
<p>Questions go stale. Textbooks change, curricula update, and over time students share answers. Build a 6-month review cycle into your process — flag questions with a high correct-answer rate (above 90%) for replacement or difficulty upgrade.</p>
<h2>Step 4: Set Minimum Bank Depth</h2>
<p>For a randomised 60-question exam, you need at least 5× the question count in the bank per topic — ideally 10×. With less than 3× depth, candidates will see repeated questions across mock tests.</p>
<h2>Step 5: Pilot New Questions</h2>
<p>Before adding a new question to the live bank, embed it in an exam as an unscored pilot question. Analyse the response distribution — if 95% of candidates get it right, it is too easy; if 5% do, check if the question is ambiguous rather than genuinely hard.</p>',
                'Online Exam Tips',
                'https://images.unsplash.com/photo-1456513080510-7bf3a84b82f8?w=800&q=80',
                'published',
                date('Y-m-d H:i:s', strtotime('-47 days')),
                date('Y-m-d H:i:s', strtotime('-47 days')),
            ],
            [
                'Digital Certificates with QR Verification: The Future of Credentialing',
                'digital-certificates-qr-verification-credentialing',
                'Paper certificates are easy to forge and impossible to verify instantly. Digital certificates with QR-code verification solve both problems. Here is how they work and why employers love them.',
                '<h2>The Problem with Paper Certificates</h2>
<p>Every year, thousands of fake certificates enter the job market. Background verification companies report that certificate fraud affects 1 in 8 job applications in India. For employers, verifying a paper certificate means phone calls, emails, and waiting — often days or weeks.</p>
<h2>How QR-Verified Digital Certificates Work</h2>
<ol>
  <li>Candidate completes the exam and meets the passing criteria.</li>
  <li>The system auto-generates a unique certificate with a tamper-proof QR code.</li>
  <li>The QR code links to a public verification URL — no login required.</li>
  <li>Employers scan the QR code and instantly see: candidate name, exam title, score, date, and issuing institution.</li>
  <li>Any tampering with the certificate invalidates the QR link.</li>
</ol>
<h2>What Employers See on Verification</h2>
<p>The verification page shows exactly what the issuing institution recorded — not what the candidate claims. This makes misrepresentation impossible and eliminates the need for manual verification calls.</p>
<h2>Auto-Generation Saves Enormous Time</h2>
<p>At Greenfield College, certificates for 4,000 students used to take 3 weeks to print, sign, and dispatch. With ExamRankers, certificates are available for download within 60 seconds of result publication. The admin workload dropped from 3 weeks to 20 minutes.</p>
<h2>Customisation Options</h2>
<p>Digital certificates can be fully branded — your logo, institution name, authorised signatory signature (digital), and custom design template. Students receive a PDF they can share on LinkedIn, email to employers, or print at home.</p>',
                'Product Updates',
                'https://images.unsplash.com/photo-1589330273594-fade1ee91647?w=800&q=80',
                'published',
                date('Y-m-d H:i:s', strtotime('-55 days')),
                date('Y-m-d H:i:s', strtotime('-55 days')),
            ],
            [
                'Online Exams for HR Teams: Screen 2,000 Applicants in a Week',
                'online-exams-hr-teams-screen-applicants',
                'Aptitude tests and skill assessments are now a standard part of hiring. Here is how HR teams are using ExamRankers to screen thousands of applicants efficiently — without sacrificing quality.',
                '<h2>The Hiring Bottleneck</h2>
<p>A mid-sized IT company posts one opening and receives 800 applications. HR has 3 people. At 5 minutes per CV screen, that is 67 hours of work before a single interview is scheduled. Most candidates never hear back.</p>
<p>Online aptitude screening changes the equation: instead of screening CVs, HR screens exam scores. The top 10% go straight to interviews. The process that took 3 weeks now takes 4 days.</p>
<h2>What to Test in a Hiring Exam</h2>
<p>Match the test content to the role:</p>
<ul>
  <li><strong>Technical roles:</strong> Logical reasoning, coding challenges, domain knowledge</li>
  <li><strong>Sales roles:</strong> Verbal ability, situational judgement, numerical reasoning</li>
  <li><strong>Operations roles:</strong> Attention to detail, data interpretation, process logic</li>
  <li><strong>Management trainees:</strong> Critical thinking, case analysis, communication skills</li>
</ul>
<h2>Keeping It Fair and Legal</h2>
<p>Hiring assessments must be job-relevant and non-discriminatory. Avoid questions that could disadvantage candidates based on gender, region, or language unless language ability is genuinely required for the role. ExamRankers supports multi-language question papers to remove language as an unintended barrier.</p>
<h2>Candidate Experience Matters</h2>
<p>Poor exam UX damages your employer brand. Candidates who struggle with a clunky platform associate the frustration with your company. ExamRankers is designed for first-time users — no training, no downloads, works on any device.</p>
<h2>Integration with ATS</h2>
<p>ExamRankers scores can be exported directly to your Applicant Tracking System via API. Candidates who pass automatically move to the next pipeline stage. No manual data entry, no spreadsheets.</p>',
                'EdTech News',
                'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=800&q=80',
                'published',
                date('Y-m-d H:i:s', strtotime('-62 days')),
                date('Y-m-d H:i:s', strtotime('-62 days')),
            ],
            [
                'The Complete Guide to White-Label Exam Portals',
                'complete-guide-white-label-exam-portals',
                'Your candidates should see your brand, not your vendor\'s. White-label exam portals give you full control over the experience. Here is everything you need to know before you set one up.',
                '<h2>What Is a White-Label Exam Portal?</h2>
<p>A white-label portal is a fully branded version of the ExamRankers platform that looks and feels like your own product. Candidates visit your domain, see your logo, and experience your brand colours — with no ExamRankers branding visible anywhere.</p>
<h2>What Gets Customised</h2>
<ul>
  <li><strong>Domain:</strong> exams.yourinstitution.com instead of platform.examrankers.com</li>
  <li><strong>Logo and favicon:</strong> Your institutional identity throughout</li>
  <li><strong>Colour scheme:</strong> Primary, secondary, and accent colours matched to your brand guide</li>
  <li><strong>Email templates:</strong> Exam invitations, results, and certificates sent from your email domain</li>
  <li><strong>Login page:</strong> Custom background, message, and support contact</li>
  <li><strong>Certificate template:</strong> Fully designed to match your existing credentials</li>
</ul>
<h2>Technical Setup: What Is Required</h2>
<p>Setting up a white-label portal requires two DNS changes — a CNAME record pointing your subdomain to our servers, and a TXT record for SSL certificate verification. Our team handles everything else. Average setup time: 4 hours after DNS propagation.</p>
<h2>Who Benefits Most</h2>
<p>White-label portals are most valuable for:</p>
<ul>
  <li>Coaching institutes that want to appear technology-forward to students and parents</li>
  <li>Certification bodies where brand trust is central to credential value</li>
  <li>Corporates running internal assessments where candidates must see the company brand</li>
  <li>Universities building their own examination management identity</li>
</ul>
<h2>Pricing</h2>
<p>White-label is available on Professional and Enterprise plans. There is no per-candidate charge for the branding — it is a flat feature included in the plan. Contact our team for a customisation walkthrough.</p>',
                'Product Updates',
                'https://images.unsplash.com/photo-1557804506-669a67965ba0?w=800&q=80',
                'published',
                date('Y-m-d H:i:s', strtotime('-70 days')),
                date('Y-m-d H:i:s', strtotime('-70 days')),
            ],
            [
                'EdTech in India 2025: The Rise of Assessment-First Learning',
                'edtech-india-2025-assessment-first-learning',
                'India\'s EdTech sector is shifting from content delivery to outcomes-based assessment. What does this mean for institutions, learners, and platforms? We break down the key trends shaping 2025.',
                '<h2>From Content to Outcomes</h2>
<p>The first wave of EdTech was about access — putting lectures and textbooks online. The second wave is about outcomes — measuring whether learners actually understood and retained what they consumed. Assessment is now the core product, not an afterthought.</p>
<h2>The Numbers Tell the Story</h2>
<p>India\'s online assessment market is projected to reach ₹8,200 crore by 2027, growing at 22% CAGR. The drivers are clear: competitive exam preparation, corporate L&D mandates, and the push from regulatory bodies like UGC and AICTE to validate digital learning credentials.</p>
<h2>Trend 1: Continuous Assessment Replacing Annual Exams</h2>
<p>NEP 2020 explicitly recommends replacing annual high-stakes exams with continuous formative assessment. Progressive institutions are already shifting — running monthly topic tests, mid-semester evaluations, and project-based assessments in addition to (or instead of) traditional finals.</p>
<h2>Trend 2: Skill Credentials Over Degree Credentials</h2>
<p>Employers are increasingly asking for demonstrated skills rather than degree certificates. Short-form certifications — 20-hour courses with a proctored final exam — are growing faster than degree programmes in every EdTech category.</p>
<h2>Trend 3: Vernacular Assessments</h2>
<p>Only 11% of India\'s population is comfortable in English. The next 500 million learners will demand exams in Hindi, Tamil, Telugu, Kannada, and Bengali. Platforms that cannot support multi-language assessments will be locked out of the largest growth market in Indian EdTech.</p>
<h2>What This Means for Institutions</h2>
<p>The institutions that will thrive in 2025 and beyond are those that treat assessment as a strategic capability — not a compliance exercise. That means investing in question bank depth, evaluator training, data analytics, and candidate experience in equal measure.</p>',
                'EdTech News',
                'https://images.unsplash.com/photo-1488190211105-8b0e65b80b4e?w=800&q=80',
                'published',
                date('Y-m-d H:i:s', strtotime('-78 days')),
                date('Y-m-d H:i:s', strtotime('-78 days')),
            ],
            [
                '5 Ways to Reduce Candidate Anxiety in Online Exams',
                '5-ways-reduce-candidate-anxiety-online-exams',
                'Exam anxiety is real and measurable — it suppresses performance by up to 12% in high-stakes settings. Here are five evidence-based strategies to reduce it and get results that reflect true ability.',
                '<h2>Why Anxiety Matters for Assessment Validity</h2>
<p>An exam that measures anxiety rather than ability is a poor exam. When candidates underperform due to unfamiliar interfaces, unexpected technical issues, or unclear instructions, the results do not reflect what they know — they reflect how stressed they were.</p>
<h2>1. Run a Mandatory Mock Exam</h2>
<p>Familiarity is the single biggest anxiety reducer. A 15-minute mock exam one week before the real event — using the exact same interface, question types, and timing format — reduces first-time technical anxiety almost entirely. Make it mandatory, not optional.</p>
<h2>2. Show a Countdown, Not a Clock</h2>
<p>Displaying remaining time (45:23 left) is less anxiety-inducing than displaying elapsed time (14:37 gone). The psychological framing of abundance versus scarcity has a measurable effect on performance. ExamRankers defaults to countdown display.</p>
<h2>3. Allow Question Flagging and Review</h2>
<p>Candidates who can flag uncertain questions and return to them later perform better than those forced to answer linearly. The ability to skip and return reduces the anxiety spike caused by a difficult early question affecting the rest of the exam.</p>
<h2>4. Clear Instructions Before the Timer Starts</h2>
<p>Instructions should be displayed on a separate screen before the exam timer begins. Candidates should be able to re-read instructions without using exam time. Any time spent reading instructions under a live countdown directly increases anxiety.</p>
<h2>5. Communicate Results Timeline Clearly</h2>
<p>Post-exam anxiety about when results will arrive is often worse than the exam anxiety itself. Tell candidates exactly when results will be published — not "within a few days" but "by 6 PM on Thursday 22nd." Certainty reduces anxiety even when the wait is long.</p>
<h2>Measuring the Impact</h2>
<p>After implementing these five changes, add a 3-question post-exam wellbeing survey. Track anxiety scores alongside exam scores across cohorts. You will see the correlation — and the improvement.</p>',
                'Online Exam Tips',
                'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=800&q=80',
                'published',
                date('Y-m-d H:i:s', strtotime('-85 days')),
                date('Y-m-d H:i:s', strtotime('-85 days')),
            ],
        ];
        foreach ($posts as $p) $ins->execute($p);
    }

    render('✅','Setup complete!','success','
        <p class="text-muted mt-2">SQLite database created. 12 blog posts, testimonials, and FAQs seeded.</p>
        <table class="table table-bordered mt-3 text-start">
          <tr><th>DB file</th><td><code>application/database/examrankers.db</code></td></tr>
          <tr><th>Login URL</th><td><a href="admin/login">admin/login</a></td></tr>
          <tr><th>Username</th><td><strong>' . htmlspecialchars($admin_username) . '</strong></td></tr>
          <tr><th>Password</th><td><strong>' . htmlspecialchars($admin_password) . '</strong></td></tr>
        </table>
        <div class="alert alert-danger mt-3 mb-3"><strong>⚠️ Delete this file immediately!</strong><br>
        <code>rm ' . __FILE__ . '</code></div>
        <a href="admin/login" class="btn btn-primary">Go to Admin Login →</a>
    ');

} catch (Throwable $e) {
    render('❌','Setup Failed','danger','
        <p class="text-muted mt-2">' . htmlspecialchars($e->getMessage()) . '</p>
        <hr>
        <p class="text-muted small">Make sure the <code>application/database/</code> directory is writable by the web server.</p>
    ');
}
