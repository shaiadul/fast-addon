


<?php
if (in_array('elementor/elementor.php', get_option('active_plugins'))) {
    // Elementor is active
    // Your code here for when Elementor is active
    require_once('elementor-addons/addons.php'); 
} else {
    // Add admin notice only when Elementor is not active
    function my_custom_admin_notice() {
        $message = 'This theme requires Elementor to be installed.';
        echo '<div class="notice notice-warning is-dismissible"><p>' . $message . '</p></div>';
    }
    add_action('admin_notices', 'my_custom_admin_notice');
}