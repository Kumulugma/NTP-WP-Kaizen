<?php

class KaizenWidget {

    public static function run() {
        add_action('wp_dashboard_setup', 'awaiting_process_dashboard_widget');

        function awaiting_process_dashboard_widget() {
            global $wp_meta_boxes;

            wp_add_dashboard_widget('awaiting_help_widget', 'Oczekujące propozycje zmian', 'awaiting_proposition_dashboard');
        }

        function awaiting_proposition_dashboard() {
            ?>
            <div>
                <?php
                $args = array(
                    'post_type' => 'propozycja',
                    'post_status' => 'nowy',
                    'order' => 'ASC',
                );

                $loop = new WP_Query($args);
                ?>
                <table style="width:100%;">
                    <thead>
                        <tr>
                            <th style="text-align: left;"><?= __("Tytuł", 'kaizen') ?></th>
                            <th style="text-align: left;"><?= __("Ilość komentarzy", 'kaizen') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($loop->have_posts()) : $loop->the_post();
                            echo "<tr>";
                            echo '<td>';
                            echo '<a href=/wp-admin/post.php?action=edit&post=' . get_the_ID() . ' style="text-decoration: none;"> ' . get_the_title() . '</a>';
                            echo '</td>';
                            echo '<td>';
                            echo get_comments_number(get_the_ID());
                            echo '</td>';
                            echo "</tr>";
                        endwhile;

                        wp_reset_postdata();
                        ?>
                    </tbody>
                </table>
            </div>
            <?php
        }

        add_action('wp_dashboard_setup', 'new_process_dashboard_widget');

        function new_process_dashboard_widget() {
            global $wp_meta_boxes;

            wp_add_dashboard_widget('new_help_widget', 'Najnowsze propozycje zmian', 'new_proposition_dashboard');
        }

        function new_proposition_dashboard() {
            ?>
            <div>
                <?php
                $args = array(
                    'post_type' => 'propozycja',
                    'order' => 'ASC',
                );

                $loop = new WP_Query($args);
                ?>
                <table style="width:100%;">
                    <thead>
                        <tr>
                            <th style="text-align: left;"><?= __("Tytuł", 'kaizen') ?></th>
                            <th style="text-align: left;"><?= __("Aktualny status", 'kaizen') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($loop->have_posts()) : $loop->the_post();
                            echo "<tr>";
                            echo '<td>';
                            echo '<a href=/wp-admin/post.php?action=edit&post=' . get_the_ID() . ' style="text-decoration: none;"> ' . get_the_title() . '</a>';
                            echo '</td>';
                            echo '<td>';
                            echo status_color(get_post_status());
                            echo '</td>';
                            echo "</tr>";
                        endwhile;

                        wp_reset_postdata();
                        ?>
                    </tbody>
                </table>
            </div>
            <?php
        }

        add_action('wp_dashboard_setup', 'department_process_dashboard_widget');

        function department_process_dashboard_widget() {
            global $wp_meta_boxes;

            wp_add_dashboard_widget('department_help_widget', 'Propozycje dla działów', 'department_proposition_dashboard');
        }

        function department_proposition_dashboard() {
            ?>
            <div>
                <?php
                $taxonomies = get_terms(array(
                    'taxonomy' => 'dzial',
                    'hide_empty' => false,
                ));
                ?>
                <table style="width:100%;">
                    <thead>
                        <tr>
                            <th style="text-align: left;"><?= __("Dział firmy", 'kaizen') ?></th>
                            <th style="text-align: left;"><?= __("Ilość propozycji", 'kaizen') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($taxonomies as $term) {

                            $count_args = array(
                                'post_type' => 'proces',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'dzial',
                                        'field' => 'term_id',
                                        'terms' => $term->term_id
                                    )
                                )
                            );
                            $count = new WP_Query($count_args);

                            echo "<tr>";
                            echo '<td>';
                            echo '<a href=/wp-admin/edit.php?post_type=proces&dzial=' . $term->slug . ' style="text-decoration: none;"> ' . $term->name . '</a>';
                            echo '</td>';
                            echo '<td>';
                            echo $count->post_count;
                            echo '</td>';
                            echo "</tr>";
                        }

                        wp_reset_postdata();
                        ?>
                    </tbody>
                </table>
            </div>
            <?php
        }

    }

}
?>