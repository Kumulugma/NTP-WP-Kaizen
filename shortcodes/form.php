<?php

// The shortcode function
function kaizen_form_shortcode() {
    return file_get_contents(plugin_dir_path(__FILE__) . 'templates/form.php');
}

// Register shortcode
add_shortcode('kaizen_form', 'kaizen_form_shortcode');
