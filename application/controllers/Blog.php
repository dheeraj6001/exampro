<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Blog_model');
    }

    public function index() {
        $data['page_title'] = 'Blog';
        $data['meta_desc']  = 'Read the latest articles on online exams, auto-marking, AI proctoring, and assessment strategies from ExamRankers.';
        $data['posts']      = $this->Blog_model->get_all('published');
        $data['categories'] = $this->Blog_model->get_categories();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/blog', $data);
        $this->load->view('templates/footer');
    }

    public function post($slug) {
        $post = $this->Blog_model->get_by_slug($slug);
        if (!$post) show_404();

        $data['page_title'] = $post->title;
        $data['meta_desc']  = $post->excerpt
            ? strip_tags($post->excerpt)
            : substr(strip_tags($post->content), 0, 160);
        $data['post']       = $post;
        $data['related']    = $this->Blog_model->get_all('published', 3);

        $this->load->view('templates/header', $data);
        $this->load->view('pages/blog_post', $data);
        $this->load->view('templates/footer');
    }
}
