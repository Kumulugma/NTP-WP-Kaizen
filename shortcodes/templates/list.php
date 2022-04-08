<?php

if (is_user_logged_in()) {
    $args = array(
        'post_type' => 'proces',
        'post_status' => 'publish',
        'orderby' => 'title',
        'order' => 'ASC',
    );

    $loop = new WP_Query($args);

    echo '<div class="owl-carousel-kaizen-list owl-carousel owl-theme">';
    while ($loop->have_posts()) : $loop->the_post();
        echo '<div class="item">';
        echo '<h4>' . get_the_title() . '</h4>';
        echo '<p>' . get_the_content() . '</p>';
        if (get_option('kaizen_form_page') == null || get_option('kaizen_form_page') == 0) {
            echo '<b>Przypisz stronę z formularzem!</b>';
        } else {
            echo '<a href="' . get_permalink(get_option('kaizen_form_page')) . '" class="btn btn-primary">' . __('Dodaj propozycję.', 'kaizen') . '</a>';
        }
        echo '</div>';
    endwhile;
    echo '</div>';

    wp_reset_postdata();
} else {
    echo '<p>' . __('Tylko zalogowani mogą przeglądać procesy.', 'kaizen') . '</p>';
}
?>
