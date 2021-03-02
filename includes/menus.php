<?php

// Add setting menu
add_action('admin_menu', 'jb_add_admin_page', 10);

function jb_add_admin_page()
{
    add_menu_page('JB SMS Notifier', 'JB SMS Notifier', 'manage_options', 'jb_sms_notifier_general_settings_page', 'jb_sms_notifier_settings_template_callback', 'dashicons-email-alt', 110);
}

function jb_sms_notifier_settings_template_callback()
{
    // load settings template
    require_once plugin_dir_path(__FILE__) . '../template/settings.php';
}
