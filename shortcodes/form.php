<?php

// The shortcode function
function kaizen_form_shortcode() {
     ob_start();
    include plugin_dir_path(__FILE__) . 'templates/form.php';
    $string = ob_get_clean();
    return $string;
}

// Register shortcode
add_shortcode('kaizen_form', 'kaizen_form_shortcode');
