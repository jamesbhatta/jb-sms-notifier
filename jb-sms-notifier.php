<?php

/**
 * Plugin Name:       JB SMS Notifier
 * Plugin URI:        https://wordpress.org/plugins/jb-sms-notifier
 * Description:       Send sms notifiation on woocommerce order
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            James Bhatta
 * Author URI:        https://manojbhatta.com.np/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       woocommerce-sms-notifier
 * Domain Path:       /languages
 */

if (!defined('ABSPATH')) {
    exit;
}

require_once plugin_dir_path(__FILE__) . 'includes/menus.php';
require_once plugin_dir_path(__FILE__) . 'includes/settings.php';
require_once plugin_dir_path(__FILE__) . 'includes/sms_service.php';
