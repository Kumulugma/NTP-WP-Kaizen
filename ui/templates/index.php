<?php
    $args = array(
        'post_type' => 'page',
        'post_status' => 'publish',
        'orderby' => 'title',
        'order' => 'ASC',
    );

    $pages = new WP_Query($args);
    
    $form_page = get_option('kaizen_form_page');
?>

<div class="wrap" id="kaizen-page">
    <h1 class="wp-heading-inline">
        <?php esc_html_e('Konfiguracja Kaizen', 'kaizen'); ?>
    </h1>

    <div id="dashboard-widgets-wrap">
        <div id="dashboard-widgets" class="metabox-holder">
            <div class="postbox-container" width="25%">
                <div class="card" style="margin:2px">

                    <h2 class="wp-heading-inline">
                        <?php esc_html_e('Wybierz stronę z formularzem', 'kaizen'); ?>
                    </h2>

                    <form method="post" action="admin.php?page=kaizen&save=form">
                        <fieldset>

                            <?php
                            echo "<select name='Kaizen[form]'>";
                                echo "<option value='--'>" . __('-- Brak strony --','kaizen'). "</option>";
                            while ($pages->have_posts()) : $pages->the_post();
                                echo "<option value='" . get_the_ID() . "' ".($form_page == get_the_ID() ? 'selected="selected"' : '').">" . get_the_title() . "</option>";
                            endwhile;
                            echo "</select>";
                            ?>

                            <button class="button button-primary" type="submit">Zapisz</button>
                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="postbox-container" width="25%"></div>
            <div class="postbox-container" width="25%"></div>
            <div class="postbox-container" width="25%"></div>
        </div>
    </div>


</div>