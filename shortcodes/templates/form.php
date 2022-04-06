<?php

$args = array(
    'post_type' => 'proces',
    'post_status' => 'publish',
    'orderby' => 'title',
    'order' => 'ASC',
);

echo "<div>";

$loop = new WP_Query($args);
echo "<h5>".__('Którego procesu dotyczy pomysł', 'kaizen')."</h5>";
echo '<select class="select-process" name="Kaizen[proces]">';
while ($loop->have_posts()) : $loop->the_post();
    echo '<option value="' . get_the_ID() . '">' . get_the_title() . '</option>';
endwhile;
echo '</select>';

wp_reset_postdata();

echo "</div>";

echo "<div>";
echo "<h5>".__('Opisz swój pomysł', 'kaizen')."</h5>";
echo '<textarea name="Kaizen[content]"></textarea>';
echo "</div>";

echo "<div>";
echo '<input type="submit" name="Kaizen[submit]"/>';
echo "</div>";