<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= isset($page_title) ? $page_title . ' | ExamRankers' : 'ExamRankers – Online Exam Software with Smart Marking' ?></title>
  <meta name="description" content="<?= isset($meta_desc) ? $meta_desc : 'ExamRankers — conduct online exams with auto-marking, AI proctoring, and instant rank lists. Trusted by 3,500+ organisations.' ?>">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>

<nav class="navbar navbar-expand-lg site-navbar sticky-top">
  <div class="container">
    <a class="navbar-brand" href="<?= base_url() ?>">Exam<span>Rankers</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav mx-auto gap-1">
        <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('about') ?>">About Us</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('services') ?>">Features</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('pricing') ?>">Pricing</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('case-studies') ?>">Case Studies</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('blog') ?>">Blog</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('contact') ?>">Contact Us</a></li>
      </ul>
      <div class="d-flex align-items-center gap-3 mt-2 mt-lg-0">
        <a href="#" class="nav-link text-white-50 fw-medium" style="font-size:.9rem;">Login</a>
        <a href="<?= base_url('contact') ?>" class="btn btn-demo">Request Demo</a>
      </div>
    </div>
  </div>
</nav>
