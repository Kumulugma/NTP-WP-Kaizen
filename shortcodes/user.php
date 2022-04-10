<?php
// The shortcode function
function kaizen_user_list_shortcode() {

    ob_start();
    include plugin_dir_path(__FILE__) . 'templates/user.php';
    $string = ob_get_clean();
    return $string;
}

// Register shortcode
add_shortcode('kaizen_user_list', 'kaizen_user_list_shortcode');