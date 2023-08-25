<?php
function shaiadul_hello_world_widget($widgets_manager)
{

    require_once(__DIR__ . '/widget.php');
    $widgets_manager->register(new \Shaiadul_team_members());

}
add_action('elementor/widgets/register', 'shaiadul_hello_world_widget');