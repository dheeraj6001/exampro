<style>
.legal-hero { background:linear-gradient(135deg,#0b1437,#111b47); padding:60px 0 40px; }
.legal-wrap { max-width:820px; margin:0 auto; }
.legal-wrap h2 { color:#0b1437; font-weight:700; font-size:1.25rem; margin-top:2.5rem; margin-bottom:.75rem; }
.legal-wrap h3 { color:#1e40af; font-weight:600; font-size:1rem; margin-top:1.5rem; }
.legal-wrap p, .legal-wrap li { color:#374151; line-height:1.8; font-size:.93rem; }
.legal-wrap ul { padding-left:1.4rem; }
.legal-wrap table { width:100%; border-collapse:collapse; margin:1rem 0; font-size:.87rem; }
.legal-wrap table th, .legal-wrap table td { border:1px solid #e2e8f0; padding:10px 14px; }
.legal-wrap table th { background:#f8fafc; font-weight:600; color:#0b1437; }
.updated-badge { background:#eff6ff; color:#1e40af; font-size:.8rem; padding:6px 16px; border-radius:20px; display:inline-block; }
</style>

<div class="legal-hero text-center">
  <div class="container">
    <h1 class="fw-800 text-white mb-2">Privacy Policy</h1>
    <p class="text-muted mb-3">How we collect, use, and protect your information</p>
    <span class="updated-badge">Last updated: <?= date('d F Y') ?></span>
  </div>
</div>

<section class="py-5">
  <div class="container">
    <div class="legal-wrap">

      <p>ExamRankers Technologies Pvt. Ltd. ("ExamRankers", "we", "us", or "our") operates the ExamRankers platform available at examrankers.com and associated subdomains (the "Platform"). This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you use our Platform.</p>
      <p>Please read this policy carefully. If you disagree with its terms, please discontinue use of the Platform.</p>

      <h2>1. Information We Collect</h2>

      <h3>1.1 Information You Provide</h3>
      <ul>
        <li><strong>Account information:</strong> Name, email address, phone number, organisation name, and password when you register.</li>
        <li><strong>Exam content:</strong> Questions, answer keys, marking schemes, and candidate data uploaded by institutions.</li>
        <li><strong>Candidate responses:</strong> Answers submitted during exams, along with timestamps and session metadata.</li>
        <li><strong>Payment information:</strong> Billing details processed via Razorpay. We do not store card numbers or CVV codes.</li>
        <li><strong>Support communications:</strong> Messages sent to our support team via email, chat, or phone.</li>
      </ul>

      <h3>1.2 Information Collected Automatically</h3>
      <ul>
        <li><strong>Device information:</strong> Browser type, operating system, screen resolution, and device identifiers.</li>
        <li><strong>Log data:</strong> IP address, access times, pages viewed, referring URLs, and error logs.</li>
        <li><strong>Exam session data:</strong> Tab-switch events, focus loss, copy-paste attempts, and webcam feeds (when proctoring is enabled).</li>
        <li><strong>Cookies:</strong> Session tokens, preference settings, and analytics cookies (see Section 7).</li>
      </ul>

      <h2>2. How We Use Your Information</h2>
      <table>
        <thead><tr><th>Purpose</th><th>Legal Basis</th></tr></thead>
        <tbody>
          <tr><td>Provide and maintain the Platform</td><td>Contract performance</td></tr>
          <tr><td>Process payments and issue invoices</td><td>Contract performance</td></tr>
          <tr><td>Detect and prevent fraud or malpractice</td><td>Legitimate interests</td></tr>
          <tr><td>Improve platform features and performance</td><td>Legitimate interests</td></tr>
          <tr><td>Send service notifications and security alerts</td><td>Contract performance</td></tr>
          <tr><td>Send marketing communications (with consent)</td><td>Consent</td></tr>
          <tr><td>Comply with legal obligations</td><td>Legal obligation</td></tr>
        </tbody>
      </table>

      <h2>3. Data Sharing and Disclosure</h2>
      <p>We do not sell your personal data. We may share data with:</p>
      <ul>
        <li><strong>Service providers:</strong> Cloud hosting (AWS/GCP), payment processing (Razorpay), email delivery (SendGrid), and analytics (Google Analytics). All processors are bound by data processing agreements.</li>
        <li><strong>Institutions:</strong> Candidate exam data is accessible to the institution that administered the exam.</li>
        <li><strong>Law enforcement:</strong> When required by applicable law, court order, or governmental authority.</li>
        <li><strong>Business transfers:</strong> In the event of a merger, acquisition, or sale of assets, data may be transferred to the successor entity.</li>
      </ul>

      <h2>4. Data Retention</h2>
      <ul>
        <li><strong>Account data:</strong> Retained for the duration of the subscription plus 2 years.</li>
        <li><strong>Exam and candidate data:</strong> Retained for 3 years from the date of the exam, or longer if required by the institution's regulatory obligations.</li>
        <li><strong>Proctoring recordings:</strong> Retained for 6 months unless flagged for review, in which case up to 3 years.</li>
        <li><strong>Payment records:</strong> Retained for 7 years as required by Indian tax law.</li>
      </ul>

      <h2>5. Data Security</h2>
      <p>We implement industry-standard security measures including:</p>
      <ul>
        <li>AES-256 encryption for data at rest</li>
        <li>TLS 1.3 for all data in transit</li>
        <li>ISO 27001-certified information security management</li>
        <li>SOC 2 Type II compliance (annual audit)</li>
        <li>Annual penetration testing by an independent security firm</li>
        <li>Multi-factor authentication for all admin accounts</li>
      </ul>

      <h2>6. Your Rights</h2>
      <p>Under the Digital Personal Data Protection Act 2023 (DPDPA) and applicable regulations, you have the right to:</p>
      <ul>
        <li><strong>Access:</strong> Request a copy of the personal data we hold about you.</li>
        <li><strong>Correction:</strong> Request correction of inaccurate personal data.</li>
        <li><strong>Erasure:</strong> Request deletion of your personal data, subject to legal retention obligations.</li>
        <li><strong>Grievance redressal:</strong> Lodge a complaint with our Data Protection Officer.</li>
      </ul>
      <p>To exercise any of these rights, email <a href="mailto:privacy@examrankers.com">privacy@examrankers.com</a>. We will respond within 30 days.</p>

      <h2>7. Cookies</h2>
      <p>We use the following categories of cookies:</p>
      <ul>
        <li><strong>Strictly necessary:</strong> Session tokens and security cookies required for the Platform to function. Cannot be disabled.</li>
        <li><strong>Analytics:</strong> Google Analytics cookies to understand Platform usage. You may opt out via your browser settings or <a href="https://tools.google.com/dlpage/gaoptout" target="_blank" rel="noopener">Google's opt-out tool</a>.</li>
        <li><strong>Preferences:</strong> Cookies storing your display and language preferences.</li>
      </ul>

      <h2>8. Children's Privacy</h2>
      <p>The Platform is not directed to individuals under 13 years of age. Where institutions use ExamRankers for candidates under 18, the institution is responsible for obtaining appropriate parental consent in accordance with applicable law.</p>

      <h2>9. International Data Transfers</h2>
      <p>Your data is primarily stored on servers in India. Where data is transferred to processors outside India (e.g., for email delivery), we ensure appropriate safeguards are in place, including standard contractual clauses.</p>

      <h2>10. Changes to This Policy</h2>
      <p>We may update this Privacy Policy periodically. We will notify registered users by email at least 14 days before any material change takes effect. Continued use of the Platform after the effective date constitutes acceptance of the updated policy.</p>

      <h2>11. Contact Us</h2>
      <p>For privacy-related queries or to exercise your rights:</p>
      <ul>
        <li><strong>Data Protection Officer:</strong> <a href="mailto:privacy@examrankers.com">privacy@examrankers.com</a></li>
        <li><strong>Postal address:</strong> ExamRankers Technologies Pvt. Ltd., New Delhi, India</li>
        <li><strong>Grievance Officer:</strong> Available within the Platform under Help → Contact Support</li>
      </ul>

    </div>
  </div>
</section>
