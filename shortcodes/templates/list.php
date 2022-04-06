<?php

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
    echo '<a href="'.get_option('kaizen_form_page').'" class="btn btn-primary">'.__('Dodaj propozycję.').'</a>';
    echo '</div>';
endwhile;
echo '</div>';

wp_reset_postdata();

?>
