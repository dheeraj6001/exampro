<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin controller — renders HTML shells only.
 * All data loading and mutations happen via the REST API (Api.php)
 * using JavaScript fetch() calls in each view.
 * Authentication is token-based (localStorage), checked by admin.js.
 */
class Admin extends CI_Controller {

    private function _page($view, $title = 'Dashboard') {
        $data['page_title']  = $title;
        $data['api_base']    = base_url('api/');
        $data['admin_base']  = base_url('admin/');
        $data['site_base']   = base_url();
        $this->load->view('admin/_header', $data);
        $this->load->view('admin/' . $view,  $data);
        $this->load->view('admin/_footer');
    }

    public function login()       { $this->load->view('admin/login',       ['site_base' => base_url(), 'api_base' => base_url('api/'), 'admin_base' => base_url('admin/')]); }
    public function dashboard()   { $this->_page('dashboard',   'Dashboard');   }
    public function blog()        { $this->_page('blog_list',   'Blog Posts');   }
    public function blog_create() { $this->_page('blog_form',   'New Post');     }
    public function blog_edit($id){ $this->_page('blog_form',   'Edit Post');    }
    public function settings()    { $this->_page('settings',    'Site Settings');}
    public function testimonials(){ $this->_page('testimonials','Testimonials'); }
    public function faqs()        { $this->_page('faqs',        'FAQs');         }
    public function logout()      {
        // Token logout handled by JS; this just redirects
        redirect('admin/login');
    }
}
