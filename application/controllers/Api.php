<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('jwt');
        $this->load->model(['Blog_model', 'Settings_model']);

        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            $this->_cors();
            exit(0);
        }
    }

    // =========================================================
    //  AUTH
    // =========================================================

    public function auth_login() {
        $this->_cors();
        $this->_method('POST');

        $b     = $this->_body();
        $admin = $this->db->get_where('er_admins', ['username' => $b['username'] ?? ''])->row();

        if (!$admin || !password_verify($b['password'] ?? '', $admin->password)) {
            $this->_err('Invalid username or password', 401);
        }

        $token = $this->jwt->issue([
            'sub'   => $admin->id,
            'name'  => $admin->name,
            'email' => $admin->email,
        ]);

        $this->_ok([
            'token'      => $token,
            'expires_in' => 86400,
            'admin'      => ['id' => $admin->id, 'name' => $admin->name, 'email' => $admin->email],
        ], 'Login successful');
    }

    public function auth_logout() {
        $this->_cors();
        $this->_ok([], 'Logged out');
    }

    public function auth_me() {
        $this->_cors();
        $claims = $this->_auth();
        $this->_ok(['id' => $claims['sub'], 'name' => $claims['name'], 'email' => $claims['email']]);
    }

    // =========================================================
    //  PUBLIC — Blog
    // =========================================================

    public function blog_index() {
        $this->_cors();
        $this->_ok($this->Blog_model->get_all('published'));
    }

    public function blog_show($slug) {
        $this->_cors();
        $post = $this->Blog_model->get_by_slug($slug);
        if (!$post) $this->_err('Post not found', 404);
        $this->_ok($post);
    }

    // =========================================================
    //  PUBLIC — Testimonials / FAQs / Settings
    // =========================================================

    public function testimonials_index() {
        $this->_cors();
        $rows = $this->db->where('status', 'active')->order_by('sort_order', 'ASC')->get('er_testimonials')->result();
        $this->_ok($rows);
    }

    public function faqs_index() {
        $this->_cors();
        $rows = $this->db->where('status', 'active')->order_by('sort_order', 'ASC')->get('er_faqs')->result();
        $this->_ok($rows);
    }

    public function settings_index() {
        $this->_cors();
        $this->_ok($this->Settings_model->get_all());
    }

    // =========================================================
    //  ADMIN — Blog
    // =========================================================

    public function admin_blog_list() {
        $this->_cors();
        $this->_auth();
        $m = $_SERVER['REQUEST_METHOD'];

        if ($m === 'GET') {
            $this->_ok($this->Blog_model->get_all());

        } elseif ($m === 'POST') {
            $b = $this->_body();
            if (empty($b['title'])) $this->_err('Title is required');
            $id = $this->Blog_model->insert([
                'title'    => $b['title'],
                'excerpt'  => $b['excerpt']  ?? '',
                'content'  => $b['content']  ?? '',
                'category' => $b['category'] ?? 'General',
                'image'    => $b['image']    ?? '',
                'status'   => $b['status']   ?? 'draft',
            ]);
            $this->_ok(['id' => $id], 'Post created', 201);

        } else {
            $this->_err('Method not allowed', 405);
        }
    }

    public function admin_blog_single($id) {
        $this->_cors();
        $this->_auth();
        $m = $_SERVER['REQUEST_METHOD'];

        if ($m === 'GET') {
            $post = $this->Blog_model->get_by_id($id);
            if (!$post) $this->_err('Not found', 404);
            $this->_ok($post);

        } elseif ($m === 'PUT') {
            $b = $this->_body();
            $this->Blog_model->update($id, [
                'title'    => $b['title']    ?? '',
                'excerpt'  => $b['excerpt']  ?? '',
                'content'  => $b['content']  ?? '',
                'category' => $b['category'] ?? 'General',
                'image'    => $b['image']    ?? '',
                'status'   => $b['status']   ?? 'draft',
            ]);
            $this->_ok([], 'Post updated');

        } elseif ($m === 'DELETE') {
            $this->Blog_model->delete($id);
            $this->_ok([], 'Post deleted');

        } else {
            $this->_err('Method not allowed', 405);
        }
    }

    // =========================================================
    //  ADMIN — Testimonials
    // =========================================================

    public function admin_testimonials_list() {
        $this->_cors();
        $this->_auth();
        $m = $_SERVER['REQUEST_METHOD'];

        if ($m === 'GET') {
            $this->_ok($this->db->order_by('sort_order', 'ASC')->get('er_testimonials')->result());

        } elseif ($m === 'POST') {
            $this->db->insert('er_testimonials', $this->_testi_row($this->_body()));
            $this->_ok(['id' => $this->db->insert_id()], 'Testimonial created', 201);

        } else {
            $this->_err('Method not allowed', 405);
        }
    }

    public function admin_testimonials_single($id) {
        $this->_cors();
        $this->_auth();
        $m = $_SERVER['REQUEST_METHOD'];

        if ($m === 'PUT') {
            $this->db->update('er_testimonials', $this->_testi_row($this->_body()), ['id' => $id]);
            $this->_ok([], 'Updated');

        } elseif ($m === 'DELETE') {
            $this->db->delete('er_testimonials', ['id' => $id]);
            $this->_ok([], 'Deleted');

        } else {
            $this->_err('Method not allowed', 405);
        }
    }

    // =========================================================
    //  ADMIN — FAQs
    // =========================================================

    public function admin_faqs_list() {
        $this->_cors();
        $this->_auth();
        $m = $_SERVER['REQUEST_METHOD'];

        if ($m === 'GET') {
            $this->_ok($this->db->order_by('sort_order', 'ASC')->get('er_faqs')->result());

        } elseif ($m === 'POST') {
            $this->db->insert('er_faqs', $this->_faq_row($this->_body()));
            $this->_ok(['id' => $this->db->insert_id()], 'FAQ created', 201);

        } else {
            $this->_err('Method not allowed', 405);
        }
    }

    public function admin_faqs_single($id) {
        $this->_cors();
        $this->_auth();
        $m = $_SERVER['REQUEST_METHOD'];

        if ($m === 'PUT') {
            $this->db->update('er_faqs', $this->_faq_row($this->_body()), ['id' => $id]);
            $this->_ok([], 'Updated');

        } elseif ($m === 'DELETE') {
            $this->db->delete('er_faqs', ['id' => $id]);
            $this->_ok([], 'Deleted');

        } else {
            $this->_err('Method not allowed', 405);
        }
    }

    // =========================================================
    //  ADMIN — Settings
    // =========================================================

    public function admin_settings() {
        $this->_cors();
        $this->_auth();
        $m = $_SERVER['REQUEST_METHOD'];

        if ($m === 'GET') {
            $this->_ok($this->Settings_model->get_all());

        } elseif ($m === 'PUT') {
            $b       = $this->_body();
            $allowed = ['site_name','site_phone','site_email','site_address',
                        'facebook_url','twitter_url','linkedin_url','youtube_url','footer_tagline'];
            $save = [];
            foreach ($allowed as $k) { if (isset($b[$k])) $save[$k] = $b[$k]; }
            $this->Settings_model->save($save);
            $this->_ok([], 'Settings updated');

        } else {
            $this->_err('Method not allowed', 405);
        }
    }

    // =========================================================
    //  PRIVATE HELPERS
    // =========================================================

    private function _auth(): array {
        $token  = $this->_bearer();
        $claims = $token ? $this->jwt->verify($token) : null;
        if (!$claims) $this->_err('Unauthorized — invalid or expired token', 401);
        return $claims;
    }

    private function _bearer(): ?string {
        $h = $_SERVER['HTTP_AUTHORIZATION'] ?? $this->input->get_request_header('Authorization') ?? '';
        return preg_match('/Bearer\s+(.+)/i', $h, $m) ? trim($m[1]) : null;
    }

    private function _body(): array {
        return json_decode(file_get_contents('php://input'), true) ?? [];
    }

    private function _method(string $required): void {
        if ($_SERVER['REQUEST_METHOD'] !== $required) $this->_err('Method not allowed', 405);
    }

    private function _cors(): void {
        header('Content-Type: application/json; charset=UTF-8');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Authorization');
    }

    private function _ok($data = [], string $message = 'OK', int $code = 200): void {
        http_response_code($code);
        echo json_encode(['success' => true, 'message' => $message, 'data' => $data]);
        exit;
    }

    private function _err(string $message, int $code = 400): void {
        http_response_code($code);
        echo json_encode(['success' => false, 'message' => $message, 'data' => null]);
        exit;
    }

    private function _testi_row(array $b): array {
        return [
            'name'           => $b['name']            ?? '',
            'org'            => $b['org']              ?? '',
            'quote'          => $b['quote']            ?? '',
            'stars'          => (int)($b['stars']      ?? 5),
            'avatar_initial' => strtoupper(substr($b['name'] ?? 'A', 0, 1)),
            'avatar_color'   => $b['avatar_color']     ?? '#1a56db',
            'status'         => $b['status']           ?? 'active',
            'sort_order'     => (int)($b['sort_order'] ?? 0),
        ];
    }

    private function _faq_row(array $b): array {
        return [
            'question'   => $b['question']            ?? '',
            'answer'     => $b['answer']              ?? '',
            'sort_order' => (int)($b['sort_order']    ?? 0),
            'status'     => $b['status']              ?? 'active',
        ];
    }
}
