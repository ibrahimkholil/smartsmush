<?php
namespace SmartSmush;

if (!defined('ABSPATH')) {
    exit;
}

class License {
    public function __construct() {
        add_action('admin_init', [$this, 'check_license_status']);
    }

    public function check_license_status() {
        $license_key = get_option('smartsmush_license_key', '');
        
        if ($license_key && $this->validate_license($license_key)) {
            define('SMARTSMUSH_PRO', true);
        } else {
            define('SMARTSMUSH_PRO', false);
        }
    }

    private function validate_license($license_key) {
        $response = wp_remote_get('https://api.example.com/validate?key=' . $license_key);
        if (is_wp_error($response)) {
            return false;
        }

        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);
        return isset($data['valid']) && $data['valid'] === true;
    }
}

new License();
