<?php

if (is_user_logged_in()) {
    $args = array(
        'author' => get_current_user_id(),
        'post_type' => 'propozycja',
        'orderby' => 'ID',
        'order' => 'ASC',
    );

    $loop = new WP_Query($args);

    echo '<div>';
    echo '<ul>';
    while ($loop->have_posts()) : $loop->the_post();
        echo '<li>';
        echo '<div><h5 style="margin-bottom: 0px;">' . get_the_title() . '</h5></div>';
        echo '<div>' . proposition_labels(get_post_status(get_the_ID())) . '</div>';
        echo '<div style="border-top: 1px dashed black;"><b>' . __("Opis sytuacji przed") . '</b><p style="margin-top: 3px;">' . get_post_meta(get_the_ID(), 'kaizen_before', true) . '</p></div>';
        echo '<div style="border-top: 1px dashed black;"><b>' . __("Opis sytuacji po") . '</b><p style="margin-top: 3px;">' . get_post_meta(get_the_ID(), 'kaizen_after', true) . '</p></div>';
        echo "<hr>";
        echo '</li>';

    endwhile;
    echo '</ul>';
    echo '</div>';

    wp_reset_postdata();
} else {
    echo '<p>' . __('Tylko zalogowani mają listę propozycji.', 'kaizen') . '</p>';
}
?>
