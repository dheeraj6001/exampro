<style>
:root{--navy:#0b1437;--blue:#1a56db;}
.api-hero{background:linear-gradient(135deg,var(--navy),#111b47);padding:60px 0 40px;}
.api-sidebar{position:sticky;top:80px;max-height:calc(100vh - 100px);overflow-y:auto;}
.api-nav-link{display:block;padding:6px 14px;font-size:.83rem;color:#94a3b8;text-decoration:none;border-left:2px solid transparent;transition:.12s;}
.api-nav-link:hover,.api-nav-link.active{color:#fff;border-left-color:var(--blue);}
.api-nav-head{font-size:.7rem;text-transform:uppercase;letter-spacing:1px;color:#475569;padding:14px 14px 4px;font-weight:700;}
.method-badge{font-size:.72rem;font-weight:700;padding:3px 10px;border-radius:5px;font-family:monospace;}
.get{background:#dcfce7;color:#166534;}
.post{background:#dbeafe;color:#1e40af;}
.put{background:#fef3c7;color:#92400e;}
.del{background:#fee2e2;color:#991b1b;}
.code-block{background:#0f172a;border-radius:10px;padding:20px;font-family:monospace;font-size:.83rem;line-height:1.7;overflow-x:auto;}
.code-block .kw{color:#7dd3fc;}
.code-block .str{color:#86efac;}
.code-block .num{color:#fda4af;}
.code-block .cm{color:#64748b;}
.endpoint-row{background:#fff;border:1px solid #e2e8f0;border-radius:10px;padding:16px 20px;margin-bottom:10px;}
.endpoint-path{font-family:monospace;font-size:.87rem;color:var(--navy);font-weight:600;}
</style>

<div class="api-hero">
  <div class="container">
    <div class="d-flex align-items-center gap-3 mb-3">
      <span class="badge py-2 px-3" style="background:#1e293b;color:#7dd3fc;font-size:.78rem;font-family:monospace;">REST API v1</span>
      <span class="badge py-2 px-3" style="background:#1e293b;color:#86efac;font-size:.78rem;">JSON · JWT Auth</span>
    </div>
    <h1 class="fw-800 text-white mb-2">API Documentation</h1>
    <p style="color:#94a3b8;">Base URL: <code style="background:#1e293b;color:#7dd3fc;padding:3px 10px;border-radius:5px;">https://examrankers.com/api/</code></p>
  </div>
</div>

<section class="py-5">
  <div class="container-fluid px-4">
    <div class="row g-4">

      <!-- Sidebar -->
      <div class="col-lg-2 d-none d-lg-block">
        <div class="api-sidebar" style="background:var(--navy);border-radius:12px;padding:12px 0;">
          <div class="api-nav-head">Overview</div>
          <a href="#auth" class="api-nav-link active">Authentication</a>
          <a href="#errors" class="api-nav-link">Error Codes</a>
          <a href="#rate" class="api-nav-link">Rate Limits</a>
          <div class="api-nav-head">Auth</div>
          <a href="#ep-login" class="api-nav-link">POST /auth/login</a>
          <a href="#ep-me" class="api-nav-link">GET /auth/me</a>
          <div class="api-nav-head">Blog</div>
          <a href="#ep-blog" class="api-nav-link">GET /blog</a>
          <a href="#ep-blog-show" class="api-nav-link">GET /blog/:slug</a>
          <div class="api-nav-head">Admin</div>
          <a href="#ep-admin-blog" class="api-nav-link">Admin Blog CRUD</a>
          <a href="#ep-admin-settings" class="api-nav-link">Admin Settings</a>
          <a href="#ep-admin-testimonials" class="api-nav-link">Testimonials</a>
          <a href="#ep-admin-faqs" class="api-nav-link">FAQs</a>
        </div>
      </div>

      <!-- Content -->
      <div class="col-lg-10">

        <!-- Auth section -->
        <div id="auth" class="mb-5">
          <h3 class="fw-800 mb-3" style="color:var(--navy);">Authentication</h3>
          <p class="text-muted mb-4">ExamRankers uses JWT (JSON Web Token) Bearer authentication for all admin endpoints. Public endpoints (blog list, testimonials, FAQs) require no authentication.</p>

          <h5 class="fw-700 mb-3" style="color:var(--navy);">Getting a token</h5>
          <div class="code-block mb-4">
<span class="kw">POST</span> /api/auth/login

<span class="cm">// Request body</span>
{
  <span class="str">"email"</span>: <span class="str">"admin@yoursite.com"</span>,
  <span class="str">"password"</span>: <span class="str">"your_password"</span>
}

<span class="cm">// Response 200</span>
{
  <span class="str">"success"</span>: <span class="kw">true</span>,
  <span class="str">"token"</span>: <span class="str">"eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9..."</span>,
  <span class="str">"admin"</span>: { <span class="str">"id"</span>: <span class="num">1</span>, <span class="str">"name"</span>: <span class="str">"Admin"</span>, <span class="str">"email"</span>: <span class="str">"admin@yoursite.com"</span> }
}
          </div>

          <h5 class="fw-700 mb-3" style="color:var(--navy);">Using the token</h5>
          <div class="code-block mb-4">
<span class="cm">// Pass the JWT in the Authorization header</span>
Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9...
          </div>

          <h5 class="fw-700 mb-3" style="color:var(--navy);">JavaScript example</h5>
          <div class="code-block">
<span class="kw">const</span> token = localStorage.getItem(<span class="str">'er_token'</span>);

<span class="kw">const</span> res = <span class="kw">await</span> fetch(<span class="str">'/api/admin/blog'</span>, {
  method: <span class="str">'GET'</span>,
  headers: {
    <span class="str">'Authorization'</span>: <span class="str">`Bearer ${token}`</span>,
    <span class="str">'Content-Type'</span>: <span class="str">'application/json'</span>
  }
});
<span class="kw">const</span> data = <span class="kw">await</span> res.json();
          </div>
        </div>

        <!-- Error codes -->
        <div id="errors" class="mb-5">
          <h3 class="fw-800 mb-3" style="color:var(--navy);">Error Codes</h3>
          <div class="table-responsive">
            <table class="table table-bordered" style="font-size:.87rem;">
              <thead style="background:#f8fafc;">
                <tr><th>Status</th><th>Code</th><th>Meaning</th></tr>
              </thead>
              <tbody>
                <?php foreach([
                  ['200','OK','Request succeeded'],
                  ['201','Created','Resource created successfully'],
                  ['400','Bad Request','Missing or invalid request body'],
                  ['401','Unauthorized','Missing or invalid JWT token'],
                  ['403','Forbidden','Valid token but insufficient permissions'],
                  ['404','Not Found','Resource does not exist'],
                  ['422','Unprocessable','Validation failed — check field errors in response'],
                  ['500','Server Error','Unexpected error — contact support'],
                ] as $e): ?>
                <tr>
                  <td><span class="badge" style="background:<?= $e[0]<300?'#dcfce7':($e[0]<500?'#fef3c7':'#fee2e2') ?>;color:<?= $e[0]<300?'#166534':($e[0]<500?'#92400e':'#991b1b') ?>;"><?= $e[0] ?></span></td>
                  <td><code><?= $e[1] ?></code></td>
                  <td class="text-muted"><?= $e[2] ?></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Rate limits -->
        <div id="rate" class="mb-5">
          <h3 class="fw-800 mb-3" style="color:var(--navy);">Rate Limits</h3>
          <p class="text-muted mb-3">API requests are rate-limited per IP address. Response headers include your current usage.</p>
          <div class="code-block mb-3">
X-RateLimit-Limit: <span class="num">120</span>
X-RateLimit-Remaining: <span class="num">117</span>
X-RateLimit-Reset: <span class="num">1719000000</span>
          </div>
          <div class="row g-3">
            <?php foreach([['Public endpoints','120 req / minute'],['Admin endpoints','60 req / minute'],['Auth endpoints','10 req / minute']] as $r): ?>
            <div class="col-md-4">
              <div class="border rounded-3 p-3 bg-white text-center">
                <div class="fw-700" style="color:var(--navy);"><?= $r[1] ?></div>
                <div class="text-muted small"><?= $r[0] ?></div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- Endpoints -->
        <h3 class="fw-800 mb-4" style="color:var(--navy);">Endpoints</h3>

        <!-- Blog public -->
        <div id="ep-blog" class="mb-5">
          <h5 class="fw-700 mb-3" style="color:var(--navy);">Blog (Public)</h5>
          <?php $endpoints = [
            ['GET','post','GET /api/blog','List published blog posts','?limit=10&offset=0&category=Tips'],
            ['GET','post','GET /api/blog/:slug','Get a single post by slug',null],
            ['GET','get','GET /api/testimonials','List published testimonials',null],
            ['GET','get','GET /api/faqs','List published FAQs',null],
            ['GET','get','GET /api/settings','Get public site settings',null],
          ]; foreach($endpoints as $ep): ?>
          <div class="endpoint-row">
            <div class="d-flex align-items-center gap-3 mb-2">
              <span class="method-badge <?= $ep[1] ?>"><?= $ep[0] ?></span>
              <span class="endpoint-path"><?= $ep[2] ?></span>
            </div>
            <p class="text-muted mb-0 small"><?= $ep[3] ?><?= $ep[4]?' &nbsp;·&nbsp; <code class=\"text-muted\">'.$ep[4].'</code>':'' ?></p>
          </div>
          <?php endforeach; ?>
        </div>

        <!-- Admin blog -->
        <div id="ep-admin-blog" class="mb-5">
          <h5 class="fw-700 mb-3" style="color:var(--navy);">Admin — Blog <span class="badge ms-2 py-1 px-2" style="background:#faf5ff;color:#7c3aed;font-size:.72rem;">JWT Required</span></h5>
          <?php $admin_ep = [
            ['GET','get','GET /api/admin/blog','List all blog posts (inc. drafts)',null],
            ['POST','post','POST /api/admin/blog','Create a new blog post',null],
            ['GET','get','GET /api/admin/blog/:id','Get a single post by ID',null],
            ['PUT','put','PUT /api/admin/blog/:id','Update a post',null],
            ['DELETE','del','DELETE /api/admin/blog/:id','Delete a post',null],
          ]; foreach($admin_ep as $ep): ?>
          <div class="endpoint-row">
            <div class="d-flex align-items-center gap-3 mb-2">
              <span class="method-badge <?= $ep[1] ?>"><?= $ep[0] ?></span>
              <span class="endpoint-path"><?= $ep[2] ?></span>
            </div>
            <p class="text-muted mb-0 small"><?= $ep[3] ?></p>
          </div>
          <?php endforeach; ?>

          <h6 class="fw-700 mt-4 mb-2" style="color:var(--navy);">POST /api/admin/blog — Request body</h6>
          <div class="code-block">
{
  <span class="str">"title"</span>:      <span class="str">"My Blog Post Title"</span>,      <span class="cm">// required</span>
  <span class="str">"content"</span>:    <span class="str">"&lt;p&gt;HTML content here&lt;/p&gt;"</span>, <span class="cm">// required</span>
  <span class="str">"excerpt"</span>:    <span class="str">"Short summary"</span>,             <span class="cm">// optional</span>
  <span class="str">"category"</span>:   <span class="str">"Tips"</span>,                      <span class="cm">// optional</span>
  <span class="str">"cover_image"</span>:<span class="str">"https://..."</span>,              <span class="cm">// optional</span>
  <span class="str">"status"</span>:     <span class="str">"published"</span>                  <span class="cm">// "published" | "draft"</span>
}
          </div>
        </div>

        <!-- Admin settings -->
        <div id="ep-admin-settings" class="mb-5">
          <h5 class="fw-700 mb-3" style="color:var(--navy);">Admin — Settings <span class="badge ms-2 py-1 px-2" style="background:#faf5ff;color:#7c3aed;font-size:.72rem;">JWT Required</span></h5>
          <div class="endpoint-row mb-2">
            <div class="d-flex align-items-center gap-3 mb-2">
              <span class="method-badge get">GET</span>
              <span class="endpoint-path">GET /api/admin/settings</span>
            </div>
            <p class="text-muted mb-0 small">Get all site settings as key→value object</p>
          </div>
          <div class="endpoint-row">
            <div class="d-flex align-items-center gap-3 mb-2">
              <span class="method-badge put">PUT</span>
              <span class="endpoint-path">PUT /api/admin/settings</span>
            </div>
            <p class="text-muted mb-0 small">Update settings. Send any subset of keys to update only those fields.</p>
          </div>
        </div>

        <!-- CTA -->
        <div class="border rounded-3 p-4 text-center" style="background:linear-gradient(135deg,var(--navy),#111b47);">
          <h5 class="fw-700 text-white mb-2">Need help integrating?</h5>
          <p class="mb-3" style="color:#94a3b8;">Our team can help you connect ExamRankers to your systems.</p>
          <a href="<?= base_url('contact') ?>" class="btn btn-primary px-4">Contact Support →</a>
        </div>

      </div>
    </div>
  </div>
</section>
