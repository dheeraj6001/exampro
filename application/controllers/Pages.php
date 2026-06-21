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

    private function _render($page, $data = array())
    {
        $this->load->view('templates/header', $data);
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }
}
