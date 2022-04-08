<?php

$args = array(
    'post_type' => 'proces',
    'post_status' => 'publish',
    'orderby' => 'title',
    'order' => 'ASC',
);

$loop = new WP_Query($args);

$current_user = wp_get_current_user();

echo "<div>";
echo '<form method="post" action="' . get_permalink() . '">';
echo "<h5>" . __('Którego procesu dotyczy pomysł', 'kaizen') . "</h5>";
echo '<select class="select-process" name="Kaizen[process]">';
echo '<option value="--">Propozycja ogólna</option>';

while ($loop->have_posts()) : $loop->the_post();
    echo '<option value="' . get_the_ID() . '">' . get_the_title() . '</option>';
endwhile;
echo '</select>';

wp_reset_postdata();

echo "</div>";

echo "<div>";
echo "<h5>" . __('Nazwa propozycji.', 'kaizen') . "</h5>";
echo '<input type="text" name="Kaizen[title]" value="' . __('Propozycja ', 'kaizen') . esc_html($current_user->user_login) . '"/>';
echo "</div>";

echo "<div>";
echo "<h5>" . __('Opisz jak sytuacja wyglądała przed wprowadzeniem zmiany.', 'kaizen') . "</h5>";
echo '<textarea name="Kaizen[before]"></textarea>';
echo "</div>";

echo "<div>";
echo "<h5>" . __('Opisz jak sytuacja będzie wyglądała po wprowadzeniu zmiany.', 'kaizen') . "</h5>";
echo '<textarea name="Kaizen[after]"></textarea>';
echo "</div>";

echo "<div>";
echo '<input type="submit" name="Kaizen[submit]"/>';
echo '</form>';
echo "</div>";
