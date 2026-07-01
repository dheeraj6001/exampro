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
    public function enquiries()   { $this->_page('enquiries',  'Enquiries');   }
    public function logout()      {
        // Token logout handled by JS; this just redirects
        redirect('admin/login');
    }

    /** JSON proxy for the admin login form: forwards to the external admin-login API. */
    public function login_submit()
    {
        header('Content-Type: application/json; charset=UTF-8');

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['success' => false, 'message' => 'Method not allowed']);
            return;
        }

        $body = json_decode(file_get_contents('php://input'), true) ?? [];
        if (empty($body['email']) || empty($body['password'])) {
            http_response_code(422);
            echo json_encode(['success' => false, 'message' => 'Email and password are required']);
            return;
        }

        $this->load->library('apiclient');
        $result = $this->apiclient->post('/auth/admin-login', [
            'email'    => $body['email'],
            'password' => $body['password'],
        ]);

        http_response_code($result['status'] ?: 502);
        echo json_encode([
            'success' => $result['ok'],
            'message' => $result['error'] ?? ($result['body']['detail'] ?? ($result['ok'] ? 'Login successful' : 'Invalid credentials')),
            'data'    => $result['ok'] ? [
                'token' => $result['body']['token'] ?? null,
                'user'  => $result['body']['user']  ?? null,
            ] : null,
        ]);
    }
}
