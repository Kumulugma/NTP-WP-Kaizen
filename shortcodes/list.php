<?php

// The shortcode function
function kaizen_list_shortcode() {
    return file_get_contents(plugin_dir_path(__FILE__) . 'templates/form.php');
}

// Register shortcode
add_shortcode('kaizen_list', 'kaizen_list_shortcode');