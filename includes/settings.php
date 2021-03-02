<?php
add_action('admin_init', 'jb_sms_notifier_settings_init');

function jb_sms_notifier_settings_init()
{
    // First, we register a section. This is necessary since all future options must belong to one.
    add_settings_section(
        'jb_sms_notifier_general_settings_section', // ID used to identify this section and with which to register options
        'General Settings', // Title to be displayed on the administration page
        'jb_general_settings_description_callback', // Callback used to render the description of the section
        'jb_sms_notifier_general_settings_page' // Page on which to add this section of options
    );

    // Register the settings
    register_setting(
        'jb_sms_notifier_general_settings_page',
        'sms_provider_api_key',
        [
            'type' => 'string',
            'description' => '',
            'sanitize_callback' => 'sanitize_text_field',
            'show_in_rest' => 'false',
            'default' => ''
        ]
    );

    register_setting(
        'jb_sms_notifier_general_settings_page',
        'sms_provider_api_endpoint',
        [
            'type' => 'string',
            'description' => '',
            'sanitize_callback' => 'sanitize_text_field',
            'show_in_rest' => 'false',
            'default' => 'http://sms.bmpinfology.com/api/v3/sms'
        ]
    );

    register_setting(
        'jb_sms_notifier_general_settings_page',
        'new_order_sms_receipient_mobile',
        [
            'type' => 'string',
            'description' => '',
            'sanitize_callback' => 'sanitize_text_field',
            'show_in_rest' => 'false',
            'default' => '9865720910'
        ]
    );

    // Add settings field
    add_settings_field(
        'sms_provider_api_key',
        'Provider API Key',
        'jb_general_settings_sms_provider_api_key_callback',
        'jb_sms_notifier_general_settings_page',
        'jb_sms_notifier_general_settings_section'
    );

    add_settings_field(
        'sms_provider_api_endpoint',
        'Provider API Endpoint',
        'jb_general_settings_sms_provider_api_endpoint_callback',
        'jb_sms_notifier_general_settings_page',
        'jb_sms_notifier_general_settings_section'
    );

    add_settings_field(
        'new_order_sms_receipient_mobile',
        'New order SMS receipient mobile',
        'jb_general_settings_new_order_sms_receipient_mobile_callback',
        'jb_sms_notifier_general_settings_page',
        'jb_sms_notifier_general_settings_section'
    );
}

// General settings Callback
function jb_general_settings_description_callback()
{
    // No section description here
}


// Field Callbacks
function jb_general_settings_sms_provider_api_key_callback()
{
    $field_key = 'sms_provider_api_key';
    echo '<input type="text" id="' . $field_key . '" name="' . $field_key . '" class="regular-text" value="' . get_option($field_key) . '">';
    echo '<span class="description">The API key provided by the provider</span>';
}

function jb_general_settings_sms_provider_api_endpoint_callback()
{
    $field_key = 'sms_provider_api_endpoint';
    echo '<input type="text" id="' . $field_key . '" name="' . $field_key . '" class="regular-text" value="' . get_option($field_key) . '">';
    echo '<span class="description">The API endpoint (URL)</span>';
}

function jb_general_settings_new_order_sms_receipient_mobile_callback()
{
    $field_key = 'new_order_sms_receipient_mobile';
    echo '<input type="text" id="' . $field_key . '" name="' . $field_key . '" class="regular-text" value="' . get_option($field_key) . '">';
    echo '<span class="description">10 digit mobile number</span>';
}
