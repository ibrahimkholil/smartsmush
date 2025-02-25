<?php
namespace SmartSmush;

if (!defined('ABSPATH')) {
    exit;
}

class Core {
    private static $instance = null;

    public static function get_instance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct() {
        $this->includes();
        $this->hooks();
    }

    private function includes() {
        new Optimizer();
        new Settings();
        new License();
    }

    private function hooks() {
        add_action('admin_menu', [$this, 'register_admin_menu']);
    }

    public function register_admin_menu() {
        add_menu_page(
            __('SmartSmush', 'smartsmush'),
            __('SmartSmush', 'smartsmush'),
            'manage_options',
            'smartsmush-settings',
            [$this, 'render_settings_page'],
            'dashicons-image-filter'
        );
    }

    public function render_settings_page() {
        echo '<div class="wrap"><h1>' . esc_html__('SmartSmush Settings', 'smartsmush') . '</h1></div>';
    }
}
