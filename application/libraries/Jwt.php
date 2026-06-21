<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jwt {

    private $secret;
    private $ttl;

    public function __construct() {
        $CI =& get_instance();
        $CI->config->load('jwt', TRUE);
        $this->secret = $CI->config->item('jwt_secret', 'jwt') ?: 'change-me-in-production';
        $this->ttl    = (int)($CI->config->item('jwt_ttl',    'jwt') ?: 86400);
    }

    public function issue(array $claims): string {
        $now     = time();
        $payload = array_merge($claims, ['iat' => $now, 'exp' => $now + $this->ttl]);
        $h = $this->b64u(json_encode(['alg' => 'HS256', 'typ' => 'JWT']));
        $p = $this->b64u(json_encode($payload));
        $s = $this->b64u(hash_hmac('sha256', "$h.$p", $this->secret, true));
        return "$h.$p.$s";
    }

    /** Returns payload array on success, null on invalid/expired token. */
    public function verify(string $token): ?array {
        $parts = explode('.', $token);
        if (count($parts) !== 3) return null;

        [$h, $p, $sig] = $parts;
        $expected = $this->b64u(hash_hmac('sha256', "$h.$p", $this->secret, true));
        if (!hash_equals($expected, $sig)) return null;

        $data = json_decode($this->b64d($p), true);
        if (!is_array($data)) return null;
        if (isset($data['exp']) && $data['exp'] < time()) return null;

        return $data;
    }

    private function b64u(string $data): string {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    private function b64d(string $data): string {
        return base64_decode(strtr($data, '-_', '+/'));
    }
}
