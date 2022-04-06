<?php

// The shortcode function
function kaizen_list_shortcode() {

    wp_enqueue_script('owl-carousel', plugin_dir_url(__FILE__) . "../node_modules/owl.carousel2/dist/owl.carousel.min.js", ['jquery']);
    wp_enqueue_script( 'kaizen-list', plugin_dir_url(__FILE__) . "../assets/owl.shortcode.list.js", ['owl-carousel'] );
    wp_enqueue_style( 'kaizen-css', plugin_dir_url(__FILE__) . "../node_modules/owl.carousel2/dist/assets/owl.carousel.min.css");
    wp_enqueue_style( 'kaizen-css', plugin_dir_url(__FILE__) . "../node_modules/owl.carousel2/dist/assets/owl.theme.default.min.css");
    
//    wp_enqueue_script('owl-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', ['jquery']);
//    wp_enqueue_script( 'kaizen-list', plugin_dir_url(__FILE__) . "../assets/owl.shortcode.list.js", ['owl-carousel'] );
//    wp_enqueue_style( 'kaizen-css', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css');
//    wp_enqueue_style( 'kaizen-default', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css');
    
    ob_start();
    include plugin_dir_path(__FILE__) . 'templates/list.php';
    $string = ob_get_clean();
    return $string;
}

// Register shortcode
add_shortcode('kaizen_list', 'kaizen_list_shortcode');
