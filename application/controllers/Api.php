<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['Blog_model', 'Settings_model']);

        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            $this->_cors();
            exit(0);
        }
    }

    // =========================================================
    //  AUTH
    // =========================================================

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
    //  ADMIN — Enquiries
    // =========================================================

    public function admin_enquiries_list() {
        $this->_cors();
        $this->_auth();

        $this->load->library('apiclient');
        $result = $this->apiclient->get('/public/theme/enquiry');
        if (!$result['ok']) $this->_err($result['error'] ?? 'Failed to load enquiries', $result['status'] ?: 502);

        $this->_ok($result['body']['results'] ?? []);
    }

    // =========================================================
    //  PRIVATE HELPERS
    // =========================================================

    /**
     * Admin login now issues tokens from the external auth service, so verification
     * is delegated there too: the local JWT secret can't validate an externally-signed token.
     */
    private function _auth(): array {
        $token = $this->_bearer();
        if (!$token) $this->_err('Unauthorized — missing token', 401);

        $parts = explode('.', $token);
        if (count($parts) !== 3) $this->_err('Unauthorized — invalid token', 401);

        $payload = json_decode(base64_decode(strtr($parts[1], '-_', '+/')), true);
        if (!is_array($payload)) $this->_err('Unauthorized — invalid token', 401);
        if (isset($payload['exp']) && $payload['exp'] < time()) $this->_err('Unauthorized — token expired', 401);

        $this->load->library('apiclient');
        $verify = $this->apiclient->get('/auth/verify_admin_login', [], ['Authorization' => 'Bearer ' . $token]);
        if (!$verify['ok']) $this->_err('Unauthorized — invalid or expired token', 401);

        return [
            'sub'   => $payload['id']    ?? null,
            'name'  => $payload['name']  ?? null,
            'email' => $payload['email'] ?? null,
            'role'  => $payload['role']  ?? null,
        ];
    }

    private function _bearer(): ?string {
        $h = $_SERVER['HTTP_AUTHORIZATION'] ?? $this->input->get_request_header('Authorization') ?? '';
        return preg_match('/Bearer\s+(.+)/i', $h, $m) ? trim($m[1]) : null;
    }

    private function _body(): array {
        return json_decode(file_get_contents('php://input'), true) ?? [];
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
}
