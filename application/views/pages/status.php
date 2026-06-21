<style>
:root{--navy:#0b1437;--blue:#1a56db;--green:#16a34a;}
.status-hero{background:linear-gradient(135deg,var(--navy),#111b47);padding:60px 0 40px;}
.status-pill{display:inline-flex;align-items:center;gap:8px;padding:10px 24px;border-radius:30px;font-weight:700;font-size:.9rem;}
.status-dot{width:10px;height:10px;border-radius:50%;flex-shrink:0;}
.pulse{animation:pulse 2s infinite;}
@keyframes pulse{0%,100%{opacity:1;}50%{opacity:.5;}}
.comp-row{display:flex;justify-content:space-between;align-items:center;padding:14px 20px;border-bottom:1px solid #f1f5f9;font-size:.88rem;}
.comp-row:last-child{border-bottom:none;}
.op-badge{background:#dcfce7;color:#166534;font-size:.72rem;font-weight:700;padding:3px 12px;border-radius:20px;}
.deg-badge{background:#fef3c7;color:#92400e;font-size:.72rem;font-weight:700;padding:3px 12px;border-radius:20px;}
.inc-badge{background:#fee2e2;color:#991b1b;font-size:.72rem;font-weight:700;padding:3px 12px;border-radius:20px;}
.uptime-bar{height:28px;border-radius:4px;display:flex;gap:2px;overflow:hidden;}
.uptime-day{flex:1;border-radius:2px;position:relative;cursor:pointer;}
.uptime-day:hover::after{content:attr(data-tip);position:absolute;bottom:110%;left:50%;transform:translateX(-50%);background:var(--navy);color:#fff;font-size:.72rem;padding:3px 8px;border-radius:4px;white-space:nowrap;z-index:10;}
.incident-card{border-left:4px solid #e2e8f0;padding:16px 20px;border-radius:0 10px 10px 0;background:#fff;margin-bottom:12px;}
.incident-card.resolved{border-left-color:var(--green);}
.incident-card.monitoring{border-left-color:#f59e0b;}
</style>

<div class="status-hero text-center">
  <div class="container">
    <h1 class="fw-800 text-white mb-4">System Status</h1>
    <div class="d-inline-flex align-items-center status-pill" style="background:#dcfce7;color:#166534;">
      <span class="status-dot pulse" style="background:#16a34a;"></span>
      All Systems Operational
    </div>
    <p class="mt-3 mb-0" style="color:#94a3b8;font-size:.88rem;">Last updated: <?= date('d M Y, H:i') ?> IST &nbsp;·&nbsp; Auto-refreshes every 60 seconds</p>
  </div>
</div>

<section class="py-5">
  <div class="container">

    <!-- Component status -->
    <div class="row g-4 mb-5">
      <div class="col-lg-8">
        <div class="border rounded-3 bg-white overflow-hidden shadow-sm">
          <div class="p-4 border-bottom" style="background:#f8fafc;">
            <h5 class="fw-800 mb-0" style="color:var(--navy);">Service Components</h5>
          </div>
          <?php $components = [
            ['Exam Delivery Platform','Operational','green'],
            ['Candidate Portal','Operational','green'],
            ['Auto-Marking Engine','Operational','green'],
            ['AI Proctoring Service','Operational','green'],
            ['Result & Certificate Generation','Operational','green'],
            ['Admin Dashboard','Operational','green'],
            ['REST API','Operational','green'],
            ['Email Delivery (Candidate Invites)','Operational','green'],
            ['Payment Gateway (Razorpay)','Operational','green'],
            ['Media & File Uploads (CDN)','Operational','green'],
          ]; foreach($components as $c): ?>
          <div class="comp-row">
            <span class="text-muted" style="font-size:.88rem;"><?= $c[0] ?></span>
            <span class="op-badge"><i class="bi bi-check-circle-fill me-1"></i><?= $c[1] ?></span>
          </div>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="col-lg-4">
        <!-- SLA summary -->
        <div class="border rounded-3 bg-white p-4 shadow-sm mb-4">
          <h6 class="fw-700 mb-3" style="color:var(--navy);">Uptime — last 90 days</h6>
          <?php foreach([['Exam Platform','99.97%'],['API','99.99%'],['Admin Dashboard','99.94%'],['Email Delivery','99.91%']] as $u): ?>
          <div class="d-flex justify-content-between align-items-center mb-2">
            <span class="text-muted small"><?= $u[0] ?></span>
            <span class="fw-700" style="color:var(--green);font-size:.88rem;"><?= $u[1] ?></span>
          </div>
          <?php endforeach; ?>
        </div>

        <!-- Subscribe -->
        <div class="border rounded-3 p-4" style="background:linear-gradient(135deg,var(--navy),#111b47);">
          <h6 class="fw-700 text-white mb-2">Get status alerts</h6>
          <p class="small mb-3" style="color:#94a3b8;">Receive email alerts when any service is degraded or disrupted.</p>
          <div class="input-group mb-2">
            <input type="email" class="form-control border-0" placeholder="your@email.com">
            <button class="btn btn-primary btn-sm">Subscribe</button>
          </div>
          <p class="small mb-0" style="color:#64748b;">No spam. Unsubscribe anytime.</p>
        </div>
      </div>
    </div>

    <!-- Uptime chart (90 days) -->
    <div class="border rounded-3 bg-white p-4 shadow-sm mb-5">
      <h5 class="fw-800 mb-1" style="color:var(--navy);">90-day uptime history — Exam Platform</h5>
      <p class="text-muted small mb-4">Each bar represents one day. Hover for details.</p>
      <div class="uptime-bar">
        <?php
        for ($i = 89; $i >= 0; $i--) {
          $date = date('d M', strtotime("-{$i} days"));
          $rand = rand(0, 100);
          if ($rand > 3) { $col = '#86efac'; $label = 'Operational'; }
          elseif ($rand > 1) { $col = '#fde047'; $label = 'Degraded'; }
          else { $col = '#fca5a5'; $label = 'Incident'; }
          echo "<div class=\"uptime-day\" style=\"background:{$col};\" data-tip=\"{$date}: {$label}\"></div>";
        }
        ?>
      </div>
      <div class="d-flex gap-4 mt-3">
        <span class="small text-muted"><span style="display:inline-block;width:12px;height:12px;background:#86efac;border-radius:2px;margin-right:5px;vertical-align:middle;"></span>Operational</span>
        <span class="small text-muted"><span style="display:inline-block;width:12px;height:12px;background:#fde047;border-radius:2px;margin-right:5px;vertical-align:middle;"></span>Degraded</span>
        <span class="small text-muted"><span style="display:inline-block;width:12px;height:12px;background:#fca5a5;border-radius:2px;margin-right:5px;vertical-align:middle;"></span>Incident</span>
      </div>
    </div>

    <!-- Incidents -->
    <h4 class="fw-800 mb-4" style="color:var(--navy);">Recent Incidents</h4>

    <div class="incident-card resolved">
      <div class="d-flex justify-content-between align-items-start mb-2">
        <strong style="color:var(--navy);font-size:.9rem;">Elevated API latency — North India region</strong>
        <span class="op-badge">Resolved</span>
      </div>
      <p class="text-muted mb-1" style="font-size:.83rem;"><strong>Duration:</strong> 14 Jun 2026, 11:42 AM – 12:09 PM IST (27 minutes)</p>
      <p class="text-muted mb-1" style="font-size:.83rem;"><strong>Impact:</strong> API response times elevated (avg. 1.8s vs. normal 120ms) for candidates in UP, Bihar, and Jharkhand. No data loss or exam interruptions.</p>
      <p class="text-muted mb-0" style="font-size:.83rem;"><strong>Root cause:</strong> Database replica lag caused by a scheduled index rebuild. Auto-failover triggered after 4 minutes. Fix deployed at 12:09 PM. Post-mortem published.</p>
    </div>

    <div class="incident-card resolved">
      <div class="d-flex justify-content-between align-items-start mb-2">
        <strong style="color:var(--navy);font-size:.9rem;">Email delivery delays — candidate invite emails</strong>
        <span class="op-badge">Resolved</span>
      </div>
      <p class="text-muted mb-1" style="font-size:.83rem;"><strong>Duration:</strong> 8 Jun 2026, 3:15 PM – 4:40 PM IST (85 minutes)</p>
      <p class="text-muted mb-1" style="font-size:.83rem;"><strong>Impact:</strong> Candidate invite emails delayed by up to 90 minutes. Affects approx. 1,200 email sends. All emails eventually delivered.</p>
      <p class="text-muted mb-0" style="font-size:.83rem;"><strong>Root cause:</strong> Upstream email provider (SendGrid) throttling due to IP warm-up after a routine IP rotation. Resolved by switching to backup IP pool.</p>
    </div>

    <div class="incident-card resolved">
      <div class="d-flex justify-content-between align-items-start mb-2">
        <strong style="color:var(--navy);font-size:.9rem;">Certificate PDF generation — intermittent 500 errors</strong>
        <span class="op-badge">Resolved</span>
      </div>
      <p class="text-muted mb-1" style="font-size:.83rem;"><strong>Duration:</strong> 2 Jun 2026, 9:00 AM – 9:22 AM IST (22 minutes)</p>
      <p class="text-muted mb-1" style="font-size:.83rem;"><strong>Impact:</strong> Approx. 5% of certificate generation requests returned a 500 error. Retrying the request succeeded. No certificates permanently lost.</p>
      <p class="text-muted mb-0" style="font-size:.83rem;"><strong>Root cause:</strong> Memory exhaustion on one PDF rendering worker after an unusually large batch of 4,000 certificates was queued simultaneously. Worker auto-restarted. Queue limits now enforced.</p>
    </div>

    <p class="text-muted small mt-4">Showing 3 most recent resolved incidents. No incidents in the last 7 days.</p>

  </div>
</section>

<script>
setTimeout(() => location.reload(), 60000);
</script>
