<?php

// The shortcode function
function kaizen_list_shortcode() {

    ob_start();
    include plugin_dir_path(__FILE__) . 'templates/list.php';
    $string = ob_get_clean();
    return $string;
}

// Register shortcode
add_shortcode('kaizen_list', 'kaizen_list_shortcode');
