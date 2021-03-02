<?php

add_action('woocommerce_order_status_changed', 'jb_send_sms_on_new_order_sms', 10, 4);
function jb_send_sms_on_new_order_sms($order_id, $old_status, $new_status, $order)
{
    // Get the order object
    $order = wc_get_order($order_id);

    // Get first name
    $firstname = $order->get_billing_first_name();

    // Get mobile number
    $mobile = $order->get_billing_phone();

    $message = "Hi $firstname, \n Your order #$order_id is $new_status. Thank you. Meroshringar Team";

    jb_send_sms_using_api($mobile, $message);
}


add_action('woocommerce_order_status_changed', 'jb_send_new_order_sms_to_seller', 10, 1);
function jb_send_new_order_sms_to_seller($order_id)
{
    // Get the order object
    $order = wc_get_order($order_id);

    // Get First name
    $firstname = $order->get_billing_first_name();
    $lastname = $order->get_billing_last_name();

    // Get Mobile number
    $mobile = $order->get_billing_phone();

    $message = "New order has arrived from $firstname $lastname";

    if ($mobile) {
        $message = "$message \n[Mobile: $mobile]";
    }

    jb_send_sms_using_api(get_option('new_order_sms_receipient_mobile'), $message); // Mobile number reterieved from settings
}

//  Send sms
function jb_send_sms_using_api($mobile = null, $message, $sender = 'Meroshringar')
{
    if ($mobile == null) {
        return;
    }

    $token = get_option('sms_provider_api_key');
    $url = get_option('sms_provider_api_endpoint');

    if (is_null($token)) {
        return;
    }

    if (is_null($url)) {
        return;
    }

    $content = [
        'token' => rawurlencode($token),
        'to' => rawurlencode($mobile),
        'sender' => rawurlencode($sender),
        'message' => $message,
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec($ch);
    curl_close($ch);

    return $server_output;
}
