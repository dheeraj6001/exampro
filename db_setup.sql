-- =============================================
-- ExamRankers Database Setup
-- Run this in MySQL BEFORE launching the site
-- =============================================

CREATE DATABASE IF NOT EXISTS `examrankers` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `examrankers`;

-- Admins
CREATE TABLE IF NOT EXISTS `er_admins` (
  `id`         int(11)      NOT NULL AUTO_INCREMENT,
  `name`       varchar(100) NOT NULL,
  `username`   varchar(50)  NOT NULL,
  `email`      varchar(100) NOT NULL,
  `password`   varchar(255) NOT NULL,
  `created_at` timestamp    NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Blog posts
CREATE TABLE IF NOT EXISTS `er_blog_posts` (
  `id`         int(11)      NOT NULL AUTO_INCREMENT,
  `title`      varchar(255) NOT NULL,
  `slug`       varchar(255) NOT NULL,
  `excerpt`    text,
  `content`    longtext,
  `category`   varchar(100) DEFAULT 'General',
  `image`      varchar(255) DEFAULT '',
  `status`     enum('published','draft') NOT NULL DEFAULT 'draft',
  `created_at` timestamp    NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp    NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Site settings
CREATE TABLE IF NOT EXISTS `er_settings` (
  `id`            int(11)      NOT NULL AUTO_INCREMENT,
  `setting_key`   varchar(100) NOT NULL,
  `setting_value` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `setting_key` (`setting_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `er_settings` (`setting_key`, `setting_value`) VALUES
('site_name',      'ExamRankers'),
('site_phone',     '+91 98765 43210'),
('site_email',     'info@examrankers.com'),
('site_address',   'New Delhi, India'),
('facebook_url',   '#'),
('twitter_url',    '#'),
('linkedin_url',   '#'),
('youtube_url',    '#'),
('footer_tagline', 'India\'s most trusted online exam & marking platform.');

-- Testimonials
CREATE TABLE IF NOT EXISTS `er_testimonials` (
  `id`             int(11)    NOT NULL AUTO_INCREMENT,
  `name`           varchar(100) NOT NULL,
  `org`            varchar(150) DEFAULT '',
  `quote`          text         NOT NULL,
  `stars`          int(1)       DEFAULT 5,
  `avatar_initial` char(1)      DEFAULT 'A',
  `avatar_color`   varchar(20)  DEFAULT '#1a56db',
  `status`         enum('active','inactive') DEFAULT 'active',
  `sort_order`     int(11)      DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `er_testimonials` (`name`, `org`, `quote`, `stars`, `avatar_initial`, `avatar_color`, `status`, `sort_order`) VALUES
('Dr. Rajesh Sharma', 'Controller of Exams, NIT Surat',         'The auto-marking engine saved our faculty 200+ hours per semester. Descriptive marking panel is clean and fast.',              5, 'R', '#1a56db', 'active', 1),
('Priya Nair',        'Director, EduVision Academy',             'JEE mock tests for 50,000 students with zero downtime. Rank lists published within seconds of exam end. Rock solid.',          5, 'P', '#0d9488', 'active', 2),
('Amit Verma',        'Head of Certification, SkillBridge',      'Blind marking with double moderation replaced months of manual paper handling with a fully digital, auditable process.',       5, 'A', '#7c3aed', 'active', 3),
('Sunita Gupta',      'CEO, TopRanker Coaching',                 'White-label feature is fantastic. Marking schemes, negative marking, and partial credit work exactly as configured.',          5, 'S', '#ea580c', 'active', 4),
('Mohit Agarwal',     'Talent Head, GlobalEdge Technologies',    'HR team screens 2,000+ applicants a week with auto-graded aptitude tests. Time-to-hire cut by 40%.',                         5, 'M', '#0f766e', 'active', 5),
('Kavitha Rajan',     'Principal, Greenfield College',           'Switched from paper to ExamRankers in 2 weeks. Auto certificates with QR verification have impressed students and employers.', 5, 'K', '#be185d', 'active', 6);

-- FAQs
CREATE TABLE IF NOT EXISTS `er_faqs` (
  `id`         int(11)      NOT NULL AUTO_INCREMENT,
  `question`   varchar(500) NOT NULL,
  `answer`     text         NOT NULL,
  `sort_order` int(11)      DEFAULT 0,
  `status`     enum('active','inactive') DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `er_faqs` (`question`, `answer`, `sort_order`, `status`) VALUES
('Is there a free trial?',                    'Yes — all plans come with a 30-day free trial, no credit card required. You can conduct up to 3 live exams with up to 50 candidates each during the trial.', 1, 'active'),
('How quickly can we go live?',               'Most clients are up and running within 24 hours. Our onboarding team assists with setup, question import, and your first test run.',                         2, 'active'),
('Do you support offline exams?',             'Yes. Our offline mode allows candidates to take exams without a stable internet connection. Responses are synced automatically when connectivity is restored.', 3, 'active'),
('Is the platform secure?',                   'ExamRankers is ISO 27001 certified and SOC 2 Type II compliant. All data is encrypted in transit and at rest. We perform regular penetration tests.',        4, 'active'),
('Can we use our own domain and branding?',   'Absolutely. All Professional and Enterprise plans include a white-label portal with your custom domain, logo, and brand colors.',                           5, 'active');
