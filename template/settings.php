<?php
if (!defined('ABSPATH')) {
    exit;
}
?>

<div class="wrap">
    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>

    <form action="options.php" method="POST">
        <?php
        // Security field
        settings_fields('jb_sms_notifier_general_settings_page');

        // Output settings section here
        do_settings_sections('jb_sms_notifier_general_settings_page');

        // Save button
        submit_button('Save');
        ?>
    </form>
</div>