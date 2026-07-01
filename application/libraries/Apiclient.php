<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Thin cURL wrapper for calling the external psofts API.
 * Provides get/post/put/delete (CRUD) helpers around a single base request method.
 */
class Apiclient {

    private $baseUrl;
    private $tenantDomain;
    private $timeout;

    public function __construct() {
        $CI =& get_instance();
        $CI->config->load('api', TRUE);

        $this->baseUrl      = rtrim($CI->config->item('api_base_url', 'api'), '/');
        $this->tenantDomain = $CI->config->item('api_tenant_domain', 'api');
        $this->timeout      = (int)($CI->config->item('api_timeout', 'api') ?: 15);
    }

    public function get(string $path, array $query = [], array $headers = []): array {
        if ($query) $path .= (strpos($path, '?') === false ? '?' : '&') . http_build_query($query);
        return $this->request('GET', $path, null, $headers);
    }

    public function post(string $path, array $body = [], array $headers = []): array {
        return $this->request('POST', $path, $body, $headers);
    }

    public function put(string $path, array $body = [], array $headers = []): array {
        return $this->request('PUT', $path, $body, $headers);
    }

    public function delete(string $path, array $body = [], array $headers = []): array {
        return $this->request('DELETE', $path, $body, $headers);
    }

    /**
     * Returns ['ok' => bool, 'status' => int, 'body' => array|null, 'error' => string|null].
     */
    private function request(string $method, string $path, ?array $body, array $headers): array {
        $url = $this->baseUrl . '/' . ltrim($path, '/');

        $defaultHeaders = [
            'Content-Type: application/json',
            'x-tenant-domain: ' . $this->tenantDomain,
        ];
        foreach ($headers as $key => $value) {
            $defaultHeaders[] = "$key: $value";
        }

        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_CUSTOMREQUEST  => $method,
            CURLOPT_HTTPHEADER     => $defaultHeaders,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT        => $this->timeout,
            CURLOPT_SSL_VERIFYPEER => true,
        ]);
        if ($body !== null) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
        }

        $raw    = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error  = curl_error($ch);
        curl_close($ch);

        if ($raw === false) {
            return ['ok' => false, 'status' => 0, 'body' => null, 'error' => $error ?: 'Request failed'];
        }

        $decoded = json_decode($raw, true);
        return [
            'ok'     => $status >= 200 && $status < 300,
            'status' => $status,
            'body'   => is_array($decoded) ? $decoded : null,
            'error'  => null,
        ];
    }
}
