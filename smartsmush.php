<?php
/**
 * Plugin Name: SmartSmush – Image Optimization
 * Plugin URI: https://example.com/smartsmush
 * Description: Optimize images, enable WebP conversion, and improve performance with SmartSmush.
 * Version: 1.0.0
 * Author: Orangetoolz
 * License: GPLv2 or later
 * Text Domain: smartsmush
 */

if (!defined('ABSPATH')) {
    exit;
}

// Define constants
define('SMARTSMUSH_VERSION', '1.0.0');
define('SMARTSMUSH_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('SMARTSMUSH_PLUGIN_URL', plugin_dir_url(__FILE__));

// Load Composer Autoload
if (file_exists(SMARTSMUSH_PLUGIN_DIR . 'vendor/autoload.php')) {
    require SMARTSMUSH_PLUGIN_DIR . 'vendor/autoload.php';
}

// Initialize the plugin
function smartsmush_init() {
    \SmartSmush\Core::get_instance();
}
add_action('plugins_loaded', 'smartsmush_init');
