<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

    public function index()
    {
        $per_page = 6;
        $page     = max(1, (int) $this->input->get('page'));
        $category = $this->input->get('category');
        $offset   = ($page - 1) * $per_page;

        $all = $this->_static_posts();

        // Filter by category
        if ($category) {
            $all = array_values(array_filter($all, function($p) use ($category) {
                return $p->category === $category;
            }));
        }

        $total     = count($all);
        $posts     = array_slice($all, $offset, $per_page);
        $last_page = (int) ceil($total / $per_page) ?: 1;

        // Unique categories
        $cats_raw  = array_unique(array_column($this->_static_posts(), 'category'));
        $categories = array_map(function($c) {
            $o = new stdClass; $o->category = $c; return $o;
        }, $cats_raw);

        $data['page_title']   = 'Blog';
        $data['meta_desc']    = 'Tips, guides, and news on online exams, AI proctoring, marking & evaluation from the ExamRankers team.';
        $data['posts']        = $posts;
        $data['categories']   = $categories;
        $data['total']        = $total;
        $data['per_page']     = $per_page;
        $data['current_page'] = $page;
        $data['last_page']    = $last_page;
        $data['active_cat']   = $category;

        $this->load->view('templates/header', $data);
        $this->load->view('pages/blog', $data);
        $this->load->view('templates/footer');
    }

    public function post($slug)
    {
        $all  = $this->_static_posts();
        $post = null;
        foreach ($all as $p) {
            if ($p->slug === $slug) { $post = $p; break; }
        }
        if (!$post) show_404();

        // Related: same category, exclude current, max 3
        $related = array_slice(array_values(array_filter($all, function($p) use ($post) {
            return $p->slug !== $post->slug && $p->category === $post->category;
        })), 0, 3);
        if (count($related) < 3) {
            $others = array_slice(array_values(array_filter($all, function($p) use ($post, $related) {
                $rel_slugs = array_column($related, 'slug');
                return $p->slug !== $post->slug && !in_array($p->slug, $rel_slugs);
            })), 0, 3 - count($related));
            $related = array_merge($related, $others);
        }

        $data['page_title'] = $post->title;
        $data['meta_desc']  = $post->excerpt ?: substr(strip_tags($post->content), 0, 160);
        $data['post']       = $post;
        $data['related']    = $related;

        $this->load->view('templates/header', $data);
        $this->load->view('pages/blog_post', $data);
        $this->load->view('templates/footer');
    }

    private function _static_posts()
    {
        $posts = [
            [
                'id'         => 1,
                'slug'       => 'how-ai-proctoring-reduces-false-positives',
                'title'      => 'How AI Proctoring Reduces False Positives Without Compromising Security',
                'category'   => 'AI Proctoring',
                'excerpt'    => 'False positives in AI proctoring can unfairly penalise honest students. Here\'s how modern on-device AI achieves a sub-2% false positive rate while still catching genuine malpractice.',
                'image'      => 'https://picsum.photos/seed/aiproctor/800/420',
                'created_at' => '2026-06-15 09:00:00',
                'content'    => '<p>AI proctoring has come a long way from the early days of rigid webcam monitoring that flagged any movement as suspicious. Today\'s systems are built with a core principle: <strong>the 98% of students who play fair should never feel like suspects</strong>.</p>
<h3>The false positive problem</h3>
<p>Early proctoring systems had false positive rates as high as 12–18%. A candidate scratching their nose or glancing at a sticky note on their monitor would trigger a flag. The result? Mass appeals, disillusioned institutions, and eroded trust in AI proctoring as a whole.</p>
<h3>How on-device ML changed the game</h3>
<p>Moving inference to the candidate\'s device (rather than streaming video to cloud servers) enabled faster, more contextual decisions. Instead of flagging a single off-screen glance, the model now looks at <em>patterns</em>: how many times, for how long, and in what sequence.</p>
<h3>Configurable thresholds</h3>
<p>ExamRankers lets institutions set minimum durations before a flag is raised. The default: flag a gaze-away event only if it lasts more than 5 seconds and occurs more than 3 times. This alone eliminates over 70% of false positives compared to threshold-free systems.</p>
<h3>Results from the field</h3>
<p>After piloting with 500 students at EduVision Academy, the false positive rate was 1.8%, all in the Low severity category. Not one candidate filed a formal objection. The institution subsequently rolled out to 50,000 students.</p>',
            ],
            [
                'id'         => 2,
                'slug'       => 'big-five-personality-hiring-guide',
                'title'      => 'The Recruiter\'s Guide to the Big Five Personality Assessment',
                'category'   => 'Psychometric',
                'excerpt'    => 'The Big Five (OCEAN) is the most validated personality framework in psychology. Here\'s how recruiters can use it to predict performance — and avoid common misapplications.',
                'image'      => 'https://picsum.photos/seed/bigfive/800/420',
                'created_at' => '2026-06-10 10:30:00',
                'content'    => '<p>The Big Five personality model — Openness, Conscientiousness, Extraversion, Agreeableness, and Neuroticism (OCEAN) — is backed by decades of peer-reviewed research. Unlike the Myers-Briggs Type Indicator (MBTI), which lacks predictive validity for job performance, the Big Five has a published validity coefficient of r = 0.41 for Conscientiousness alone.</p>
<h3>What each trait predicts</h3>
<p><strong>Conscientiousness</strong> is the strongest predictor of overall job performance across nearly every role and industry. Candidates scoring above the 70th percentile are consistently more organised, dependable, and goal-directed.</p>
<p><strong>Openness</strong> predicts creative performance and adaptability. High scorers thrive in roles that require learning new skills quickly — critical in fast-moving tech and consulting environments.</p>
<p><strong>Extraversion</strong> predicts performance in sales, leadership, and customer-facing roles. Importantly, high introversion does not mean poor performance — it simply means a different working style that excels in focused, analytical work.</p>
<h3>The most common misapplication</h3>
<p>Using personality scores as a hard cut-off is the single biggest mistake recruiters make. The Big Five is a tool for <em>insight</em>, not elimination. A candidate with moderate Conscientiousness and very high Openness may outperform a high-Conscientiousness candidate in a role that demands creative problem-solving.</p>
<h3>Best practice: job-fit mapping</h3>
<p>Map your role competency framework to the traits that predict success in that specific role. ExamRankers Psychometric generates an automatic job-fit score that does this mapping for you, so recruiters see a single headline score alongside the underlying trait breakdown.</p>',
            ],
            [
                'id'         => 3,
                'slug'       => 'question-bank-best-practices',
                'title'      => '10 Best Practices for Building a High-Quality Question Bank',
                'category'   => 'Question Banks',
                'excerpt'    => 'A well-structured question bank is the foundation of every fair exam. From difficulty tagging to item analysis, here\'s what separates a good question bank from a great one.',
                'image'      => 'https://picsum.photos/seed/qbank/800/420',
                'created_at' => '2026-06-05 08:00:00',
                'content'    => '<p>The question bank is the most underrated asset in any assessment programme. Institutions invest heavily in exam delivery technology but often neglect the quality of the questions themselves. Here are 10 practices that distinguish high-quality banks from the rest.</p>
<h3>1. Tag every question with difficulty, topic, and learning objective</h3>
<p>Without structured metadata, you cannot build balanced exams programmatically. Every question should have at least: difficulty level (Easy/Medium/Hard), topic/sub-topic, and the learning objective it tests.</p>
<h3>2. Run item analysis after every exam</h3>
<p>Post-exam analysis reveals two critical statistics: <strong>Difficulty Index</strong> (proportion of students who got it right) and <strong>Discrimination Index</strong> (whether the question separates high performers from low performers). Any question with a discrimination index below 0.2 should be reviewed or retired.</p>
<h3>3. Avoid single-difficulty exams</h3>
<p>A well-designed exam typically follows a 30/50/20 split: 30% easy (confidence-building), 50% medium (core assessment), 20% hard (differentiation). Building this intentionally requires a tagged question bank.</p>
<h3>4. Use question variants to prevent leakage</h3>
<p>For high-stakes exams, create 3–5 variants of each question that test the same concept but with different numbers, scenarios, or phrasing. Randomise which variant each candidate sees.</p>
<h3>5. Retire questions after heavy use</h3>
<p>A question seen by more than 2,000 candidates in a coaching context is likely to be circulating in WhatsApp groups. Track exposure and retire questions proactively before they become memory items.</p>',
            ],
            [
                'id'         => 4,
                'slug'       => 'online-exam-security-checklist',
                'title'      => 'The 12-Point Online Exam Security Checklist for 2026',
                'category'   => 'Guides',
                'excerpt'    => 'From browser lockdown to identity verification, use this checklist before your next high-stakes online exam to ensure every security layer is in place.',
                'image'      => 'https://picsum.photos/seed/examsec/800/420',
                'created_at' => '2026-05-28 11:00:00',
                'content'    => '<p>Security failures in online exams don\'t always come from sophisticated attacks. Most malpractice exploits a single missing layer. This checklist covers every layer you should have in place for high-stakes assessments.</p>
<h3>Identity & access</h3>
<ul>
<li><strong>Identity verification at login</strong> — photo match or Aadhaar-based e-KYC</li>
<li><strong>Single-use exam links</strong> — prevent sharing of access URLs</li>
<li><strong>IP/geofencing</strong> — restrict access to approved locations</li>
<li><strong>VPN detection</strong> — block access from known VPN providers</li>
</ul>
<h3>Browser security</h3>
<ul>
<li><strong>Full-screen enforcement</strong> — third exit triggers auto-submit</li>
<li><strong>Tab-switch logging</strong> — every focus loss timestamped</li>
<li><strong>Clipboard blocking</strong> — copy, paste, print-screen all disabled</li>
<li><strong>Developer console blocked</strong> — no F12 or right-click</li>
</ul>
<h3>AI monitoring</h3>
<ul>
<li><strong>Face detection</strong> — flags absence or multiple faces</li>
<li><strong>Gaze tracking</strong> — configurable off-screen threshold</li>
<li><strong>Audio analysis</strong> — detects coaching voices</li>
<li><strong>Mobile device detection</strong> — scans camera frame for phones</li>
</ul>
<p>Not every exam needs every layer. A 20-minute aptitude screening test needs browser lockdown and face detection. A national board exam needs all 12. Match your security stack to your exam stakes.</p>',
            ],
            [
                'id'         => 5,
                'slug'       => 'certificate-verification-digital-trust',
                'title'      => 'Why QR-Based Certificate Verification is Replacing Paperwork',
                'category'   => 'Product',
                'excerpt'    => 'Paper certificates are easily forged, slow to verify, and expensive to replace. Here\'s how blockchain-anchored QR codes are making credential verification instant and tamper-proof.',
                'image'      => 'https://picsum.photos/seed/certqr/800/420',
                'created_at' => '2026-05-20 09:30:00',
                'content'    => '<p>Certificate fraud costs Indian employers an estimated ₹2,400 crore annually in bad hires, re-hiring costs, and reputational damage. The root problem is simple: paper certificates carry no mechanism for verification that cannot be forged.</p>
<h3>The QR verification model</h3>
<p>Every certificate issued on ExamRankers contains a QR code that encodes a unique certificate ID. Scanning the QR opens a verification page on examrankers.com/verify that displays the candidate name, exam name, score, and issuing institution — fetched live from the certificate registry.</p>
<h3>Blockchain anchoring</h3>
<p>For institutions that require the highest level of assurance, ExamRankers supports anchoring the certificate hash to a public blockchain. This creates an immutable, timestamped record that cannot be altered even by ExamRankers — because it exists on a decentralised ledger outside any single organisation\'s control.</p>
<h3>Instant employer verification</h3>
<p>Instead of calling the institution\'s registrar and waiting 3–7 days, an employer scans the QR and sees a verified result in under 5 seconds. Our verification page is public and requires no login — designed for HR departments, not just the institution.</p>
<h3>Adoption in the market</h3>
<p>Since 2024, NASSCOM, NSDC, and several state skill development missions have mandated digital verifiable credentials for all certification programmes. Institutions still issuing paper certificates are increasingly out of compliance with sector-level standards.</p>',
            ],
            [
                'id'         => 6,
                'slug'       => 'analytics-for-learning-outcomes',
                'title'      => 'From Scores to Insights: Using Exam Analytics to Improve Learning Outcomes',
                'category'   => 'Analytics',
                'excerpt'    => 'Exam results tell you who passed. Analytics tells you why — and what to do next. Here\'s how institutions are using topic-level heatmaps and cohort reports to close learning gaps.',
                'image'      => 'https://picsum.photos/seed/analytics/800/420',
                'created_at' => '2026-05-12 10:00:00',
                'content'    => '<p>The average institution uses 3% of the data generated by each exam. Pass/fail rates and rank lists are published. Everything else — topic-level performance, question discrimination, time-per-question distributions, cohort comparisons — goes unread.</p>
<h3>Topic-level heatmaps</h3>
<p>The most actionable analytics view is the topic heatmap: a colour-coded grid showing average scores by topic across the entire cohort. Red cells (below 40% average) tell faculty exactly where curriculum gaps exist. Most institutions discover that 2–3 topics account for 70% of their overall failure rate.</p>
<h3>Individual student dashboards</h3>
<p>Students benefit from seeing their performance broken down by topic, not just an aggregate score. Knowing "I scored 82% overall but only 41% on Organic Chemistry" is far more actionable than knowing you got 164/200.</p>
<h3>Cohort comparison</h3>
<p>For coaching institutes running parallel batches, cohort comparison reveals whether teaching quality is consistent across faculty. If Batch A scores 68% on Thermodynamics and Batch B scores 42% on the same topic, that\'s a faculty and curriculum signal — not a student quality signal.</p>
<h3>Predictive early warning</h3>
<p>ExamRankers Analytics flags students at risk of failure 4–6 weeks before final exams based on mock test trajectories. Early intervention (targeted revision, extra sessions) can shift pass rates by 8–12 percentage points, based on cohort data from partner institutions.</p>',
            ],
            [
                'id'         => 7,
                'slug'       => 'live-exam-monitoring-guide',
                'title'      => 'A Practical Guide to Live Exam Monitoring at Scale',
                'category'   => 'AI Proctoring',
                'excerpt'    => 'Running a live exam for 5,000 candidates simultaneously requires more than good software. Here\'s the operational playbook that high-volume exam bodies use to monitor at scale.',
                'image'      => 'https://picsum.photos/seed/livemon/800/420',
                'created_at' => '2026-05-05 08:30:00',
                'content'    => '<p>Monitoring a live exam for 50 candidates is straightforward. Monitoring 5,000 simultaneously is an operations challenge as much as a technology challenge. This guide covers both.</p>
<h3>Technology layer</h3>
<p>At scale, the invigilator-to-candidate ratio matters. Human live monitoring is typically 1:30 (one invigilator can watch 30 live feeds). AI monitoring changes this to effectively 1:unlimited, with human review triggered only when the AI flags an incident.</p>
<h3>The triage dashboard</h3>
<p>ExamRankers\' live monitoring dashboard shows all active candidate feeds in a grid. Feeds with AI flags are automatically surfaced to the top of the grid and highlighted. Invigilators focus their attention where it matters most — not watching 5,000 peaceful candidates.</p>
<h3>Escalation protocols</h3>
<p>Define your escalation protocol before the exam, not during it. Common protocol: AI flags → invigilator review → if confirmed, exam paused and candidate messaged. For serious violations, exam terminated and incident logged for review committee.</p>
<h3>Communication during the exam</h3>
<p>ExamRankers includes a direct messaging system between invigilators and candidates. For ambiguous flags (e.g. a power cut that caused a tab switch), the invigilator can message the candidate, note the explanation, and dismiss the flag — all without interrupting the exam flow.</p>
<h3>Post-exam review</h3>
<p>Schedule a review window of 2–3 hours immediately after the exam ends. Review all High severity flags before releasing results. Low severity flags can be reviewed in bulk with a single dismiss-all action if the overall pattern doesn\'t suggest coordinated malpractice.</p>',
            ],
            [
                'id'         => 8,
                'slug'       => 'auto-marking-subjective-exams',
                'title'      => 'How Auto-Marking Works for Subjective and Descriptive Exams',
                'category'   => 'Assessment',
                'excerpt'    => 'MCQ auto-marking is simple. But what about 500-word essay answers? Here\'s how NLP-based marking works, where it excels, and where human review is still essential.',
                'image'      => 'https://picsum.photos/seed/automark/800/420',
                'created_at' => '2026-04-28 09:00:00',
                'content'    => '<p>Auto-marking for multiple-choice questions is trivially simple — a regex match against the answer key. Auto-marking for subjective responses is a different matter entirely, and the technology has matured significantly in the last three years.</p>
<h3>Keyword and concept matching</h3>
<p>The simplest form of subjective auto-marking checks whether the student\'s answer contains a set of required keywords or concepts defined by the examiner. This works well for factual recall questions but breaks down for higher-order thinking questions where the correct answer can be expressed in many different ways.</p>
<h3>NLP-based semantic matching</h3>
<p>Modern auto-marking systems use large language model embeddings to compare the semantic meaning of a student\'s answer against a model answer, not just the exact words. A student who writes "the mitochondria generates ATP through oxidative phosphorylation" and another who writes "mitochondria make energy using oxygen" will both score well on a well-calibrated semantic matcher.</p>
<h3>Where human review is still essential</h3>
<p>For marks worth more than 5 per question, for answers that require evaluating argument quality (as in law or philosophy exams), or for any case where a student disputes an AI mark, human review is non-negotiable. Auto-marking should be positioned as a first-pass efficiency tool, not a replacement for examiner judgement on high-stakes subjective responses.</p>
<h3>Calibration</h3>
<p>The quality of NLP-based auto-marking is only as good as the calibration. ExamRankers requires at least 30 human-marked sample answers per question before the auto-marking model is deployed. The system then shows its confidence score alongside every mark it assigns — low-confidence marks are automatically routed to a human examiner.</p>',
            ],
            [
                'id'         => 9,
                'slug'       => 'government-exam-digitalisation-india',
                'title'      => 'Digitalising Government Exams in India: Lessons from 3 State Deployments',
                'category'   => 'Guides',
                'excerpt'    => 'Moving state-level government exams from paper to digital is a multi-year programme. Here are the lessons from three deployments — and the mistakes to avoid.',
                'image'      => 'https://picsum.photos/seed/govtexam/800/420',
                'created_at' => '2026-04-20 10:00:00',
                'content'    => '<p>India conducts over 400 major government recruitment exams annually — from central bodies like UPSC and SSC to state-level PSC and departmental exams. The shift from paper to digital is accelerating, driven by the NRA\'s (National Recruitment Agency) push for a common entrance test infrastructure.</p>
<h3>Deployment 1: State Health Department (Maharashtra)</h3>
<p>72,000 candidates for 3,200 posts. Paper exams had previously taken 11 weeks from exam day to final merit list. Digital delivery, auto-marking, and instant rank generation cut this to 6 days. The biggest challenge: candidate familiarity with touchscreen devices. Solution: free practice sessions at district-level CBT centres 2 weeks before the exam.</p>
<h3>Deployment 2: Rajasthan Police Constable Exam</h3>
<p>1.2 million candidates across 140 exam centres. Key lesson: plan your bandwidth carefully. Even with a locally-cached exam delivery model (questions downloaded to centre servers, no internet required during exam), centre check-in and biometric authentication at scale requires robust network planning. 40-minute check-in delays on day 1 were eliminated by day 3 with staggered reporting times.</p>
<h3>Deployment 3: Tamil Nadu Teacher Eligibility Test</h3>
<p>The TN-TET digital pilot ran in parallel with the paper exam for 18 months. This dual-track approach allowed candidates to opt in voluntarily while building institutional confidence. By year 2, 84% of candidates chose digital. The paper track was retired in year 3.</p>
<h3>Universal lessons</h3>
<p>Every deployment confirmed three things: start with a small-scale pilot, invest in candidate helplines during the exam, and never release results until the review committee has cleared all High severity proctoring flags.</p>',
            ],
            [
                'id'         => 10,
                'slug'       => 'situational-judgement-tests-recruitment',
                'title'      => 'Why Situational Judgement Tests Are the Secret Weapon of Modern Recruiters',
                'category'   => 'Psychometric',
                'excerpt'    => 'SJTs predict real-world performance by presenting workplace scenarios rather than abstract personality questions. Here\'s how to design and deploy them effectively.',
                'image'      => 'https://picsum.photos/seed/sjtest/800/420',
                'created_at' => '2026-04-14 08:00:00',
                'content'    => '<p>Situational Judgement Tests (SJTs) ask candidates to choose the most and least effective response to realistic workplace scenarios. Unlike personality questionnaires, they are harder to fake and directly measure the judgement skills required in the target role.</p>
<h3>Why they work</h3>
<p>SJTs have a predictive validity of r = 0.38 for customer service performance and r = 0.34 for overall job performance — comparable to structured interviews, at a fraction of the cost. More importantly, they show low adverse impact across demographic groups compared to pure cognitive ability tests.</p>
<h3>Designing effective scenarios</h3>
<p>The quality of an SJT depends entirely on the quality of the scenarios. Good scenarios are: specific to the role (not generic), drawn from incidents that actually occur in the job (based on critical incident interviews with high performers), and have a clear "best" response that experts agree on.</p>
<h3>The response format matters</h3>
<p>The "most effective / least effective" forced-choice format is more predictive than a simple ranking format. It forces candidates to think through the worst option — revealing whether they understand what <em>not</em> to do, which often predicts failure more than knowing what to do.</p>
<h3>Combining SJTs with other assessments</h3>
<p>The highest-performing recruitment batteries combine: Cognitive Ability (predicts whether they can do the job), Big Five (predicts how they\'ll do it), and SJT (predicts whether they\'ll handle the messy human situations). Used together, these three instruments can explain up to 60% of the variance in job performance.</p>',
            ],
            [
                'id'         => 11,
                'slug'       => 'exam-platform-selection-guide',
                'title'      => 'How to Choose an Online Exam Platform: 8 Questions Every Institution Should Ask',
                'category'   => 'Guides',
                'excerpt'    => 'With dozens of platforms in the market, choosing the right one for your institution is harder than it should be. These 8 questions cut through the marketing and surface what actually matters.',
                'image'      => 'https://picsum.photos/seed/platform/800/420',
                'created_at' => '2026-04-07 09:30:00',
                'content'    => '<p>The online exam platform market has exploded since 2020. Every vendor promises "AI-powered", "secure", and "scalable". Here are the 8 questions that separate platforms that deliver from platforms that demo well.</p>
<h3>1. What is your 99th-percentile load capacity?</h3>
<p>Any platform handles 100 concurrent users. Ask for evidence of stress tests at your peak concurrent load. Insist on a contractual SLA with penalty clauses for downtime during an exam window.</p>
<h3>2. Is AI proctoring processed on-device or cloud?</h3>
<p>Cloud-based video proctoring requires robust internet connectivity from every candidate. On-device processing works even on 2G connections. In India, this is not a theoretical concern — it\'s a daily reality for candidates in tier-3 cities.</p>
<h3>3. What is your data residency policy?</h3>
<p>DPDPA 2023 requires that sensitive personal data (including biometric data) be stored in India. Ask vendors where exam video and candidate data is stored, and request the Data Processing Agreement (DPA) before signing.</p>
<h3>4. Can I export all my data if I switch vendors?</h3>
<p>Vendor lock-in is the hidden cost of cheap SaaS. Insist on a contractual right to export all question banks, student results, and exam data in a standard format (CSV, JSON) at any time.</p>
<h3>5. How is the question bank versioned and backed up?</h3>
<p>Your question bank represents years of intellectual work. Confirm daily backups, version history, and disaster recovery RTO (Recovery Time Objective). The answer should be under 4 hours.</p>
<h3>6. What happens during a candidate technical failure?</h3>
<p>Power cuts, browser crashes, and lost connectivity happen. Ask the vendor to walk you through exactly what happens: does the exam auto-resume? Is progress saved? Can the invigilator grant extra time?</p>
<h3>7. Is the platform accessible (WCAG 2.1 AA)?</h3>
<p>Legally and ethically, your exam platform must be accessible to candidates with visual, motor, or cognitive disabilities. Request a WCAG 2.1 AA conformance statement and test it with a screen reader before signing.</p>
<h3>8. What does your pricing look like at 10× current volume?</h3>
<p>Most platforms have attractive entry pricing that becomes expensive at scale. Ask for a pricing model at 2×, 5×, and 10× your current volume. Flat-fee or volume-tiered pricing is preferable to per-exam pricing that punishes growth.</p>',
            ],
            [
                'id'         => 12,
                'slug'       => 'exam-result-analytics-rank-list',
                'title'      => 'Beyond the Rank List: 5 Analytical Reports Every Exam Body Should Publish',
                'category'   => 'Analytics',
                'excerpt'    => 'Publishing only a merit list is a missed opportunity. These 5 reports turn raw exam data into insights that improve future exams, help candidates, and build institutional credibility.',
                'image'      => 'https://picsum.photos/seed/ranklist/800/420',
                'created_at' => '2026-03-30 10:00:00',
                'content'    => '<p>The merit list is the exam body\'s primary deliverable. But the data generated by a well-instrumented digital exam contains far more value — for the institution, for candidates, and for the broader education ecosystem.</p>
<h3>1. Topic-level performance report</h3>
<p>Published at the cohort level (no individual data), this report shows average scores by topic across all candidates. It tells coaching institutes, faculty, and curriculum developers where the cohort is weakest — and informs the design of the next exam cycle.</p>
<h3>2. Individual detailed scorecard</h3>
<p>Every candidate should receive a breakdown of their performance by topic, time spent, and question type — not just a total score and rank. Candidates who don\'t get selected deserve to know <em>why</em> and what to work on. This is the right thing to do, and it reduces formal grievances.</p>
<h3>3. Question difficulty and discrimination analysis</h3>
<p>For each question: the percentage of candidates who answered correctly (difficulty), and whether high-performing candidates outperformed low-performing ones on that question (discrimination). Questions with poor discrimination should be flagged for review before the next exam cycle.</p>
<h3>4. Centre-level performance comparison</h3>
<p>For multi-centre exams, comparing centre-level average scores can surface anomalies: a centre with a dramatically higher pass rate than the population average warrants an audit. This is especially important for government recruitment exams where centre-level malpractice is a known risk.</p>
<h3>5. Trend report across exam cycles</h3>
<p>If you run the same exam annually, a trend report showing cohort performance by topic over 3–5 years is invaluable for curriculum bodies. A declining trend in a specific topic over three years is a clear signal that something has changed in how that topic is being taught at the feeder institution level.</p>',
            ],
        ];

        return array_map(function($p) {
            $o = new stdClass;
            foreach ($p as $k => $v) $o->$k = $v;
            $o->status = 'published';
            return $o;
        }, $posts);
    }
}
