<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * JWT configuration
 * IMPORTANT: Change jwt_secret to a long random string before going live.
 * Generate one: php -r "echo bin2hex(random_bytes(32));"
 */
$config['jwt_secret'] = 'CHANGE_THIS_TO_A_LONG_RANDOM_SECRET_32CHARS_MIN';
$config['jwt_ttl']    = 86400; // token lifetime in seconds (24 hours)
