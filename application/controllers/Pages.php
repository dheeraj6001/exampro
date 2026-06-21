<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
    }

    public function index()
    {
        $data['page_title'] = 'Online Exam Software';
        $data['meta_desc']  = 'ExamRankers — conduct secure online exams with AI proctoring, instant analytics, and white-label branding. Trusted by 3,500+ organisations.';
        $this->_render('home', $data);
    }

    public function about()
    {
        $data['page_title'] = 'About Us';
        $data['meta_desc']  = 'Learn about ExamRankers — the team, mission, and values behind India\'s most trusted online exam platform.';
        $this->_render('about', $data);
    }

    public function services()
    {
        $data['page_title'] = 'Features';
        $data['meta_desc']  = 'AI proctoring, question bank, live analytics, white-label portal and more — explore all ExamRankers features.';
        $this->_render('services', $data);
    }

    public function contact()
    {
        $data['page_title'] = 'Request a Demo';
        $data['meta_desc']  = 'Book a free ExamRankers demo. Our team responds within 30 minutes during business hours.';
        $this->_render('contact', $data);
    }

    public function psychometric()
    {
        $data['page_title'] = 'Psychometric Assessments';
        $data['meta_desc']  = 'Scientifically validated psychometric assessments — personality, cognitive ability, emotional intelligence, and situational judgement. Hire and develop with confidence.';
        $this->_render('psychometric', $data);
    }

    public function ai_proctoring()
    {
        $data['page_title'] = 'AI Proctoring';
        $data['meta_desc']  = 'Catch cheating without punishing honest students. AI-powered proctoring with webcam monitoring, browser lockdown, and behavioural analysis.';
        $this->_render('ai_proctoring', $data);
    }

    public function question_bank()
    {
        $data['page_title'] = 'Question Bank';
        $data['meta_desc']  = 'Build, organise, and reuse a smart question bank. Tag by subject, chapter, difficulty, and type. Import from Excel. Power intelligent randomisation.';
        $this->_render('question_bank', $data);
    }

    public function live_exams()
    {
        $data['page_title'] = 'Live Exams';
        $data['meta_desc']  = 'Conduct live online exams for thousands of simultaneous candidates. Auto-scaling, browser lockdown, real-time monitoring, and instant results.';
        $this->_render('live_exams', $data);
    }

    public function certificates()
    {
        $data['page_title'] = 'Digital Certificates';
        $data['meta_desc']  = 'Auto-generate QR-verified digital certificates instantly after exam results. Branded, tamper-proof, and shareable on LinkedIn.';
        $this->_render('certificates', $data);
    }

    public function analytics()
    {
        $data['page_title'] = 'Analytics & Reporting';
        $data['meta_desc']  = 'Deep exam analytics — rank lists, topic-wise performance, cohort trends, and one-click data export. Turn exam data into actionable insight.';
        $this->_render('analytics', $data);
    }

    public function use_case($slug = '')
    {
        $cases = $this->_use_cases();
        if (!isset($cases[$slug])) show_404();
        $data = $cases[$slug];
        $data['all_cases']  = $cases;
        $data['page_title'] = $data['title'];
        $data['meta_desc']  = $data['subtitle'];
        $this->_render('use_case', $data);
    }

    public function help()
    {
        $data['page_title'] = 'Help Centre';
        $data['meta_desc']  = 'Find answers to common questions about ExamRankers — getting started, exam setup, marking, billing, and more.';
        $this->_render('help', $data);
    }

    public function docs()
    {
        $data['page_title'] = 'Documentation';
        $data['meta_desc']  = 'ExamRankers platform documentation — quick start guides, exam setup, API reference, and integration guides.';
        $this->_render('docs', $data);
    }

    public function api_docs()
    {
        $data['page_title'] = 'API Documentation';
        $data['meta_desc']  = 'ExamRankers REST API reference — authentication, endpoints, request/response formats, and code examples.';
        $this->_render('api_docs', $data);
    }

    public function status()
    {
        $data['page_title'] = 'System Status';
        $data['meta_desc']  = 'Live status of ExamRankers platform services — uptime, incidents, and maintenance windows.';
        $this->_render('status', $data);
    }

    private function _use_cases()
    {
        return [
            'coaching' => [
                'title'     => 'ExamRankers for Coaching Institutes',
                'subtitle'  => 'Run JEE, NEET, UPSC, and board mock tests at scale. Instant rank lists, detailed analytics, and your own branded portal.',
                'tag'       => 'Coaching Institutes',
                'icon'      => 'bi-mortarboard-fill',
                'color'     => '#1a56db',
                'bg'        => '#eff6ff',
                'hero_img'  => 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?w=1200&q=80',
                'challenges'=> [
                    ['Crash-prone systems during peak exam traffic of 10,000+ simultaneous users', 'bi-exclamation-triangle'],
                    ['Rank lists taking 48+ hours to publish after exam end', 'bi-clock'],
                    ['Students seeing repeated questions across mock tests due to thin question banks', 'bi-files'],
                    ['No brand consistency — students see vendor branding instead of institute identity', 'bi-person-badge'],
                ],
                'features'  => [
                    ['bi-lightning-fill','Auto-Scaling Infrastructure','Handle 1 lakh concurrent exam-takers with zero downtime — auto-scales in seconds during traffic spikes.'],
                    ['bi-bar-chart-fill','Instant Rank Lists','Rank lists, percentiles, and topic-wise reports published within 90 seconds of the last submission.'],
                    ['bi-shuffle','Smart Randomisation','Draw from a deep question bank with difficulty-balanced randomisation. No two students see the same paper.'],
                    ['bi-palette-fill','White-Label Portal','Your logo, your domain, your brand. Students never see ExamRankers branding anywhere.'],
                    ['bi-graph-up','Detailed Analytics','Topic-wise accuracy, time-per-question, peer comparison, and improvement trend — for every student.'],
                    ['bi-wifi-off','Offline Mode','Students in areas with poor connectivity can take exams offline. Answers sync when connectivity returns.'],
                ],
                'stats'     => [['50,000+','Concurrent exam-takers supported'],['90 sec','Rank list generation time'],['3×','Faster result publication'],['40%','Reduction in student queries']],
                'quote'     => 'JEE mock tests for 50,000 students with zero downtime. Rank lists published within seconds of exam end. Rock solid.',
                'quote_by'  => 'Priya Nair, Director — EduVision Academy',
            ],
            'universities' => [
                'title'     => 'ExamRankers for Universities & Colleges',
                'subtitle'  => 'Replace paper-based end-semester exams with a secure, auditable digital assessment system that satisfies UGC and NAAC requirements.',
                'tag'       => 'Universities & Colleges',
                'icon'      => 'bi-bank',
                'color'     => '#0d9488',
                'bg'        => '#f0fdfa',
                'hero_img'  => 'https://images.unsplash.com/photo-1562774053-701939374585?w=1200&q=80',
                'challenges'=> [
                    ['Paper exam logistics — printing, distribution, collection, and secure storage', 'bi-file-earmark-text'],
                    ['Evaluator bias and inconsistency across large marking pools', 'bi-person-x'],
                    ['Grievance management consuming weeks of administrative time', 'bi-chat-square-text'],
                    ['No audit trail for accreditation bodies like NAAC and NBA', 'bi-shield-x'],
                ],
                'features'  => [
                    ['bi-person-fill-slash','Blind Marking','Evaluators never see student names. Double moderation flags divergent scores automatically.'],
                    ['bi-journal-check','Digital Audit Trail','Every answer, mark, and moderator comment is timestamped and permanently archived for NAAC compliance.'],
                    ['bi-file-earmark-pdf','Auto Certificates','QR-verified digital certificates issued within 60 seconds of result finalisation.'],
                    ['bi-laptop','Secure Browser','Full browser lockdown, copy-paste prevention, and tab-switch logging for every exam.'],
                    ['bi-people-fill','Batch Management','Manage multiple departments, semesters, and exam types from one dashboard.'],
                    ['bi-graph-up-arrow','NEP 2020 Ready','Built for continuous assessment — run formative tests, mid-sems, and finals in one platform.'],
                ],
                'stats'     => [['78%','Reduction in evaluation time'],['100%','Audit-ready documentation'],['3 weeks → 60s','Certificate turnaround'],['Zero','Paper storage required']],
                'quote'     => 'The auto-marking engine saved our faculty 200+ hours per semester. Descriptive marking panel is clean and fast.',
                'quote_by'  => 'Dr. Rajesh Sharma, Controller of Exams — NIT Surat',
            ],
            'corporate' => [
                'title'     => 'ExamRankers for Corporate Learning & Development',
                'subtitle'  => 'Assess skills, certify employees, and measure L&D ROI — all in one platform that integrates with your existing HR stack.',
                'tag'       => 'Corporate L&D',
                'icon'      => 'bi-briefcase-fill',
                'color'     => '#7c3aed',
                'bg'        => '#faf5ff',
                'hero_img'  => 'https://images.unsplash.com/photo-1552664730-d307ca884978?w=1200&q=80',
                'challenges'=> [
                    ['Proving training effectiveness to leadership with data, not anecdotes', 'bi-graph-down'],
                    ['Managing certifications across thousands of employees in multiple locations', 'bi-geo-alt'],
                    ['Integrating assessment results with LMS, HRMS, and talent systems', 'bi-diagram-3'],
                    ['Keeping question banks up to date as products, processes, and compliance requirements change', 'bi-arrow-repeat'],
                ],
                'features'  => [
                    ['bi-award-fill','Employee Certification','Issue verifiable digital certificates tied to exam performance. Track expiry and auto-remind for re-certification.'],
                    ['bi-plug-fill','HRMS Integration','REST API connects ExamRankers to SAP SuccessFactors, Workday, Darwinbox, and any LMS via SCORM or xAPI.'],
                    ['bi-bar-chart-line-fill','L&D ROI Dashboard','Pre/post training score comparison, cohort trends, and skill gap heatmaps for every business unit.'],
                    ['bi-shield-lock-fill','Compliance Assessments','Schedule mandatory compliance tests (POSH, GDPR, safety) with automatic escalation for non-completions.'],
                    ['bi-translate','Multi-language','Deploy assessments in Hindi, Tamil, Telugu, Bengali, and 12 other Indian languages.'],
                    ['bi-calendar-check-fill','Scheduled Assessments','Auto-schedule quarterly skill checks and send calendar invites directly to employees.'],
                ],
                'stats'     => [['40%','Reduction in time-to-competency'],['60%','Lower certification admin cost'],['2×','Better L&D ROI visibility'],['100%','Compliance completion rates']],
                'quote'     => 'HR team screens 2,000+ applicants a week with auto-graded aptitude tests. Time-to-hire cut by 40%.',
                'quote_by'  => 'Mohit Agarwal, Talent Head — GlobalEdge Technologies',
            ],
            'government' => [
                'title'     => 'ExamRankers for Government & PSU Exams',
                'subtitle'  => 'Conduct high-stakes recruitment and departmental exams with military-grade security, full auditability, and RTI-compliant record-keeping.',
                'tag'       => 'Government & PSU',
                'icon'      => 'bi-buildings-fill',
                'color'     => '#0b1437',
                'bg'        => '#f1f5f9',
                'hero_img'  => 'https://images.unsplash.com/photo-1529107386315-e1a2ed48a620?w=1200&q=80',
                'challenges'=> [
                    ['Preventing paper leaks and malpractice in recruitment exams', 'bi-file-earmark-lock'],
                    ['Handling lakhs of applications with fair, transparent shortlisting', 'bi-people'],
                    ['Maintaining RTI-compliant records accessible for years after the exam', 'bi-archive'],
                    ['Deploying securely in low-bandwidth locations across rural India', 'bi-wifi'],
                ],
                'features'  => [
                    ['bi-shield-fill-check','Zero Paper Leak','Encrypted question delivery, per-candidate randomisation, and secure browser prevent any possibility of paper leak.'],
                    ['bi-file-earmark-lock-fill','RTI-Ready Archive','Every answer script, score, and evaluator action is archived with tamper-proof timestamps for 10+ years.'],
                    ['bi-fingerprint','Biometric Integration','Supports Aadhaar-based e-KYC and biometric attendance logging at exam centres.'],
                    ['bi-diagram-2-fill','Multi-Stage Selection','Configure screening test → mains → interview shortlisting in a single workflow with automated cutoff filters.'],
                    ['bi-hdd-fill','On-Premise Option','Deploy ExamRankers within your own data centre for exams requiring air-gapped or sovereign cloud environments.'],
                    ['bi-translate','22 Languages','Full support for all 22 scheduled languages under the 8th Schedule of the Constitution.'],
                ],
                'stats'     => [['0','Paper leak incidents'],['10 years','Archive retention'],['22','Supported languages'],['99.99%','SLA for critical exams']],
                'quote'     => 'Switched from paper to ExamRankers in 2 weeks. Auto certificates with QR verification have impressed students and employers.',
                'quote_by'  => 'Kavitha Rajan, Principal — Greenfield College',
            ],
            'recruitment' => [
                'title'     => 'ExamRankers for Recruitment & Talent Assessment',
                'subtitle'  => 'Screen hundreds of applicants in hours, not weeks. Objective aptitude tests and skill assessments that predict job performance.',
                'tag'       => 'Recruitment',
                'icon'      => 'bi-person-check-fill',
                'color'     => '#ea580c',
                'bg'        => '#fff7ed',
                'hero_img'  => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=1200&q=80',
                'challenges'=> [
                    ['CV screening is slow, biased, and does not predict on-the-job performance', 'bi-file-person'],
                    ['Interview panels wasting time on clearly under-qualified candidates', 'bi-camera-video-off'],
                    ['No standardised way to compare candidates across different interview panels', 'bi-arrows-angle-expand'],
                    ['Poor candidate experience damaging employer brand', 'bi-emoji-frown'],
                ],
                'features'  => [
                    ['bi-clipboard-data-fill','Aptitude & Psychometric','Validate cognitive ability, personality, and domain skills with scientifically validated question banks.'],
                    ['bi-code-slash','Coding Assessments','Auto-graded coding challenges across 30+ languages with real-time code execution and test case validation.'],
                    ['bi-robot','AI Shortlisting','Set minimum score thresholds to automatically move candidates to the next pipeline stage — no manual review needed.'],
                    ['bi-phone-fill','Mobile-First Experience','Candidates can take assessments on any device. No app download required.'],
                    ['bi-graph-up-arrow','Predictive Analytics','Benchmark candidates against high performers already in your organisation using historic score data.'],
                    ['bi-plug','ATS Integration','Push scores directly to Greenhouse, Lever, Zoho Recruit, or any ATS via webhook or API.'],
                ],
                'stats'     => [['40%','Faster time-to-hire'],['70%','Reduction in unqualified interviews'],['5×','More candidates screened per recruiter'],['94%','Candidate satisfaction score']],
                'quote'     => 'HR team screens 2,000+ applicants a week with auto-graded aptitude tests. Time-to-hire cut by 40%.',
                'quote_by'  => 'Mohit Agarwal, Talent Head — GlobalEdge Technologies',
            ],
            'cbt' => [
                'title'     => 'ExamRankers for CBT Centres',
                'subtitle'  => 'Power your Computer Based Testing centre with enterprise-grade software. Multi-client, multi-exam, fully auditable.',
                'tag'       => 'CBT Centres',
                'icon'      => 'bi-pc-display',
                'color'     => '#be185d',
                'bg'        => '#fdf2f8',
                'hero_img'  => 'https://images.unsplash.com/photo-1587620962725-abab19836100?w=1200&q=80',
                'challenges'=> [
                    ['Running exams for multiple client organisations on the same infrastructure securely', 'bi-people-fill'],
                    ['Synchronising exams across hundreds of workstations simultaneously', 'bi-pc-display'],
                    ['Handling poor or intermittent connectivity at remote CBT locations', 'bi-wifi-off'],
                    ['Generating client-specific reports with CBT centre branding', 'bi-file-earmark-bar-graph'],
                ],
                'features'  => [
                    ['bi-building','Multi-Tenant Architecture','Serve multiple client organisations from a single platform. Data is completely isolated between clients.'],
                    ['bi-hdd-network-fill','Local Network Mode','Run exams over the local LAN without internet dependency — critical for rural and semi-urban CBT centres.'],
                    ['bi-display','Kiosk Mode','Full-screen lockdown, no task switching, no external device access — purpose-built for CBT hall environments.'],
                    ['bi-camera-video-fill','Biometric + CCTV Integration','Connect biometric terminals and CCTV feeds directly to the platform for attendance and proctoring.'],
                    ['bi-file-earmark-bar-graph-fill','Client-Branded Reports','Generate score reports with your client\'s logo and letterhead automatically.'],
                    ['bi-headset','24/7 Exam Day Support','Dedicated support line on exam day for CBT centre operators — we are with you through every session.'],
                ],
                'stats'     => [['500+','CBT centres using ExamRankers'],['Multi-client','Fully isolated per client'],['LAN mode','No internet required'],['24/7','Exam day support']],
                'quote'     => 'Blind marking with double moderation replaced months of manual paper handling with a fully digital, auditable process.',
                'quote_by'  => 'Amit Verma, Head of Certification — SkillBridge',
            ],
        ];
    }

    public function pricing()
    {
        $data['page_title'] = 'Pricing';
        $data['meta_desc']  = 'Simple, transparent pricing for every organisation. Start free for 30 days — no credit card required.';
        $this->_render('pricing', $data);
    }

    public function case_studies()
    {
        $data['page_title'] = 'Case Studies';
        $data['meta_desc']  = 'See how 3,500+ organisations use ExamRankers to run faster, fairer exams. Real results from real institutions.';
        $this->_render('case_studies', $data);
    }

    public function privacy_policy()
    {
        $data['page_title'] = 'Privacy Policy';
        $data['meta_desc']  = 'ExamRankers Privacy Policy — how we collect, use, and protect your data.';
        $this->_render('privacy_policy', $data);
    }

    public function terms()
    {
        $data['page_title'] = 'Terms of Service';
        $data['meta_desc']  = 'ExamRankers Terms of Service — the rules governing use of our platform.';
        $this->_render('terms', $data);
    }

    private function _render($page, $data = array())
    {
        $this->load->view('templates/header', $data);
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }
}
