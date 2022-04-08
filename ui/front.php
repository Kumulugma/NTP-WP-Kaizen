<?php

class Kaizen {

    public static function run() {
        Kaizen::save();
    }

    public static function save() {
        if (isset($_POST['Kaizen'])) {
            wp_enqueue_script('sweetalert2', plugin_dir_url(__FILE__) . "../node_modules/sweetalert2/dist/sweetalert2.all.min.js", ['jquery']);
            wp_enqueue_style('sweetalert2-css', plugin_dir_url(__FILE__) . "../node_modules/sweetalert2/dist/sweetalert2.min.css");
            wp_enqueue_script('sweetalert2-watcher', plugin_dir_url(__FILE__) . "../assets/sweetalert.form.js");

            if (isset($_POST['Kaizen']['process'])) {
                if (!empty($_POST['Kaizen']['before'])) {
                    if (!empty($_POST['Kaizen']['after'])) {
                        if (!empty($_POST['Kaizen']['title'])) {

                            $title = sanitize_text_field($_POST['Kaizen']['title']);
                            $before = sanitize_text_field($_POST['Kaizen']['before']);
                            $after = sanitize_text_field($_POST['Kaizen']['after']);
                            $process = intval($_POST['Kaizen']['process']);

                            $post = array(
                                'post_title' => $title,
                                'post_status' => 'nowy',
                                'post_type' => 'propozycja'
                            );

                            $new_post_id = wp_insert_post($post, 10, 1);
                            add_post_meta($new_post_id, 'kaizen_process', $process);
                            add_post_meta($new_post_id, 'kaizen_before', $before);
                            add_post_meta($new_post_id, 'kaizen_after', $after);
                            ?>
                            <div class="kaizen-notice-success" style="display: none;"><?php _e('Propozycja została zapisana'); ?>.</div>
                            <?php
                        } else {
                            ?>
                            <div class="kaizen-notice-error" style="display: none;"><?php _e('Uzupełnij tytuł propozycji'); ?>.</div>
                            <?php
                        }
                    } else {
                        ?>
                        <div class="kaizen-notice-error" style="display: none;"><?php _e('Opisz nowe rozwiązanie'); ?>.</div>
                        <?php
                    }
                } else {
                    ?>
                    <div class="kaizen-notice-error" style="display: none;"><?php _e('Opisz aktualny stan rzeczy'); ?>.</div>
                    <?php
                }
            } else {
                ?>
                <div class="kaizen-notice-error" style="display: none;"><?php _e('Wybierz proces, którego dotyczy propozycja'); ?>.</div>
                <?php
            }
        }
    }

}
