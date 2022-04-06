<?php

// The shortcode function
function kaizen_form_shortcode() {
    
    wp_enqueue_script('select2', plugin_dir_url(__FILE__) . "../node_modules/select2/dist/js/select2.min.js", ['jquery']);
    wp_enqueue_style( 'select2-css', plugin_dir_url(__FILE__) . "../node_modules/select2/dist/css/select2.min.css");
    wp_enqueue_script( 'select2-config', plugin_dir_url(__FILE__) . "../assets/select2.form.js" );
    
    ob_start();
    include plugin_dir_path(__FILE__) . 'templates/form.php';
    $string = ob_get_clean();
    return $string;
}

// Register shortcode
add_shortcode('kaizen_form', 'kaizen_form_shortcode');
