
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


// custom post type
function shaiadul_custom_post_type() {
    register_post_type('team-members',
        array(
            'labels'      => array(
                'name'          => __('Team Members',),
            ),
            'public'      => false,
            'show_ui'     => true,
            'supports'    => array('title', 'editor', 'thumbnail'),
        )
    );
}
add_action('init', 'shaiadul_custom_post_type');


//short code 
function my_test_shortcode(){
    
 $query = new WP_Query(array(
        'post_type' => 'team-members',
        'posts_per_page' => -1,
    ));

    $html = '';
    while ($query->have_posts()) {
        $query->the_post();
        $html .= '<h2>' . get_the_title() . '</h2>';
    }

    wp_reset_postdata();
}
add_shortcode('my_test', 'my_test_shortcode');