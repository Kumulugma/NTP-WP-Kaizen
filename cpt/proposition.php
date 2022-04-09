<?php

// Register Custom Taxonomy
function labels() {

    $labels = array(
        'name' => _x('Etykiety', 'Taxonomy General Name', 'kaizen'),
        'singular_name' => _x('Etykieta', 'Taxonomy Singular Name', 'kaizen'),
        'menu_name' => __('Etykiety', 'kaizen'),
        'all_items' => __('Wszytkie etykiety', 'kaizen'),
        'parent_item' => __('Etykieta nadrzędna', 'kaizen'),
        'parent_item_colon' => __('Etykieta nadrzętna:', 'kaizen'),
        'new_item_name' => __('Nazwa nowej etykiety', 'kaizen'),
        'add_new_item' => __('Dodaj nową etykietę', 'kaizen'),
        'edit_item' => __('Edytuj etykietę', 'kaizen'),
        'update_item' => __('Aktualizuj etykietę', 'kaizen'),
        'view_item' => __('Zobacz etykietę', 'kaizen'),
        'separate_items_with_commas' => __('Oddziel etykiety przecinkami', 'kaizen'),
        'add_or_remove_items' => __('Dodaj lub usuń etykietę', 'kaizen'),
        'choose_from_most_used' => __('Wybierz z najczęściej używanych', 'kaizen'),
        'popular_items' => __('Popularne etykiety', 'kaizen'),
        'search_items' => __('Szukaj etykiety', 'kaizen'),
        'not_found' => __('Nie znaleziono', 'kaizen'),
        'no_terms' => __('Brak etykiet', 'kaizen'),
        'items_list' => __('Lista etykiet', 'kaizen'),
        'items_list_navigation' => __('Lista etykiet', 'kaizen'),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        'show_in_rest' => true,
    );
    register_taxonomy('etykiety', array('propozycja'), $args);
}

add_action('init', 'labels', 0);

// Register Custom Post Type
function proposition() {

    $labels = array(
        'name' => _x('Propozycje', 'Post Type General Name', 'kaizen'),
        'singular_name' => _x('Propozycja', 'Post Type Singular Name', 'kaizen'),
        'menu_name' => __('Propozycje', 'kaizen'),
        'name_admin_bar' => __('Propozycje', 'kaizen'),
        'archives' => __('Archiwum propozycji', 'kaizen'),
        'attributes' => __('Atrybuty propozycji', 'kaizen'),
        'parent_item_colon' => __('Propozycja nadrzędna', 'kaizen'),
        'all_items' => __('Wszystkie propozycje', 'kaizen'),
        'add_new_item' => __('Dodaj nową propozycję', 'kaizen'),
        'add_new' => __('Dodaj nową', 'kaizen'),
        'new_item' => __('Nowa propozycja', 'kaizen'),
        'edit_item' => __('Edytuj propozycję', 'kaizen'),
        'update_item' => __('Aktualizuj propozycję', 'kaizen'),
        'view_item' => __('Zobacz propozycję', 'kaizen'),
        'view_items' => __('Zobacz propozycje', 'kaizen'),
        'search_items' => __('Szukaj propozycji', 'kaizen'),
        'not_found' => __('Nie znaleziono', 'kaizen'),
        'not_found_in_trash' => __('Brak wyników w koszu', 'kaizen'),
        'featured_image' => __('Obrazek wyróżniający', 'kaizen'),
        'set_featured_image' => __('Ustaw obrazem wyróżniający', 'kaizen'),
        'remove_featured_image' => __('Usuń obrazek wyróżniający', 'kaizen'),
        'use_featured_image' => __('Użyj jako obrazek wyróżniający', 'kaizen'),
        'insert_into_item' => __('Wstaw do propozycji', 'kaizen'),
        'uploaded_to_this_item' => __('Wgrano do tej propozycji', 'kaizen'),
        'items_list' => __('Lista propozycji', 'kaizen'),
        'items_list_navigation' => __('Lista propozycji', 'kaizen'),
        'filter_items_list' => __('Filtruj propozycje na liście', 'kaizen'),
    );
    $args = array(
        'label' => __('Propozycja', 'kaizen'),
        'description' => __('Post Type Description', 'kaizen'),
        'labels' => $labels,
        'supports' => array('title', 'comments', 'revisions'),
        'taxonomies' => array('etykiety'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 103,
        'menu_icon' => 'dashicons-migrate',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => false,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => true,
        'publicly_queryable' => true,
        'capability_type' => 'post',
    );
    register_post_type('propozycja', $args);
}

add_action('init', 'proposition', 0);

// Register Custom Status
function proposition_status_new() {

    $args = array(
        'label' => _x('Nowy', 'Status General Name', 'kaizen'),
        'label_count' => _n_noop('Nowy (%s)', 'Nowe (%s)', 'kaizen'),
        'public' => true,
        'show_in_admin_all_list' => true,
        'show_in_admin_status_list' => true,
        'exclude_from_search' => true,
    );
    register_post_status('nowy', $args);
}

add_action('init', 'proposition_status_new', 0);

// Register Custom Status
function proposition_status_accepted() {

    $args = array(
        'label' => _x('Zaakceptowany', 'Status General Name', 'kaizen'),
        'label_count' => _n_noop('Zaakceptowany (%s)', 'Zaakceptowane (%s)', 'kaizen'),
        'public' => true,
        'show_in_admin_all_list' => true,
        'show_in_admin_status_list' => true,
        'exclude_from_search' => true,
    );
    register_post_status('zaakceptowany', $args);
}

add_action('init', 'proposition_status_accepted', 0);

// Register Custom Status
function proposition_status_rejected() {

    $args = array(
        'label' => _x('Odrzucony', 'Status General Name', 'kaizen'),
        'label_count' => _n_noop('Odrzucony (%s)', 'Odrzucone (%s)', 'kaizen'),
        'public' => true,
        'show_in_admin_all_list' => true,
        'show_in_admin_status_list' => true,
        'exclude_from_search' => true,
    );
    register_post_status('odrzucony', $args);
}

add_action('init', 'proposition_status_rejected', 0);

add_action('admin_footer-post.php', 'kaizen_append_post_status_list');

function kaizen_append_post_status_list() {
    global $post;
    if ($post->post_type == 'propozycja') {
        ?>
        <style>
            #post_status option[value="pending"] {
                display: none;
            }
            #post_status option[value="pending"] {
                display: none;
            }
            #post_status option[value="draft"] {
                display: none;
            }
            #post_status option[value="draft"] {
                display: none;
            }
        </style>
        <?php
        if ($post->post_status == 'nowy') {
            $label_1 = "<span id='post-status-display'> Nowy</span>";
        } else {
            $label_1 = '';
        }
        if ($post->post_status == 'zaakceptowany') {
            $label_2 = "<span id='post-status-display'> Zaakceptowany</span>";
        } else {
            $label_2 = '';
        }
        if ($post->post_status == 'odrzucony') {
            $label_3 = "<span id='post-status-display'> Odrzucony</span>";
        } else {
            $label_3 = '';
        }
        echo '
          <script>
          jQuery(document).ready(function($){
               $("select#post_status").append("<option value=' . "'" . 'nowy' . "'" . ' ' . (($post->post_status == 'nowy') ? " selected='selected'" : '') . '>Nowy</option>");
               $(".misc-pub-section #post-status-display").append("' . $label_1 . '");
               $("select#post_status").append("<option value=' . "'" . 'zaakceptowany' . "'" . ' ' . (($post->post_status == 'zaakceptowany') ? " selected='selected'" : '') . '>Zaakceptowany</option>");
               $(".misc-pub-section #post-status-display").append("' . $label_2 . '");
               $("select#post_status").append("<option value=' . "'" . 'odrzucony' . "'" . ' ' . (($post->post_status == 'odrzucony') ? " selected='selected'" : '') . '>Odrzucony</option>");
               $(".misc-pub-section #post-status-display").append("' . $label_3 . '");
               
               console.log($("#publish"));
               $("#publish").attr("name", "save");
               $("#publish").val("Aktualizuj");
               console.log($("#publish"));
               
               $(".save-post-status").on( "click", function( event ) {
               $("#publish").attr("name", "save");
               $("#publish").val("Aktualizuj");
               });
          });
          </script>
          ';
    }
}

add_filter('views_edit-proposition', 'kaizen_subsubsub');

function kaizen_subsubsub($views) {
    $views['nowy'];
    $views['zaakceptowany'];
    $views['odrzucony'];
}

add_action('admin_footer-edit.php', 'kaizen_status_into_inline_edit');

function kaizen_status_into_inline_edit() { // ultra-simple example
    echo "<script>
	jQuery(document).ready( function() {
		jQuery( 'select[name=\"_status\"]' ).append( '<option value=\"nowy\">Nowy</option>' );
		jQuery( 'select[name=\"_status\"]' ).append( '<option value=\"zaakceptowany\">Zaakceptowany</option>' );
		jQuery( 'select[name=\"_status\"]' ).append( '<option value=\"odrzucony\">Odrzucony</option>' );
                jQuery( 'select[name=\"_status\"] option[value=\"pending\"]' ).remove();
	        jQuery( 'select[name=\"_status\"] option[value=\"draft\"]' ).remove();
		
	});
	</script>";
}

function add_proposition_meta_box() {
    add_meta_box("before-meta-box", "Stan przed", "before_meta_box_markup", "propozycja", "normal", "high", null);
    add_meta_box("after-meta-box", "Stan po", "after_meta_box_markup", "propozycja", "normal", "high", null);
    add_meta_box("process-meta-box", "Przypisane do", "process_meta_box_markup", "propozycja", "side", "high", null);
}

add_action("add_meta_boxes", "add_proposition_meta_box");

function before_meta_box_markup($object) {
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");
    ?>
    <div>
        <p><?= get_post_meta($object->ID, "kaizen_before", true); ?></p>
    </div>
    <?php
}

function after_meta_box_markup($object) {
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");
    ?>
    <div>
        <p><?= get_post_meta($object->ID, "kaizen_after", true); ?></p>
    </div>
    <?php
}

function process_meta_box_markup($object) {
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");
    ?>
    <div>
        <?php $process = get_post_meta($object->ID, "kaizen_process", true); ?>
        <?php if ($process) { ?>
            <p><a href="/wp-admin/post.php?post=<?= $process ?>&action=edit"><?= get_the_title($process); ?></a> </p>
        <?php } else { ?>
            <p><?= __('Brak przypisanego procesu', 'kaizen') ?></p>
        <?php } ?>
    </div>
    <?php
}

function proposition_status_column($column, $post_id) {
    switch ($column) {

        case 'status' :
            switch (get_post_status($post_id)) {
                case 'nowy' :
                    echo '<span style="color:#3b6aad">';
                    echo "Nowy";
                    echo '</span>';
                    break;
                case 'zaakceptowany' :
                    echo '<span style="color:#286922">';
                    echo "Zaakceptowany";
                    echo '</span>';
                    break;
                case 'odrzucony' :
                    echo '<span style="color:#c64141">';
                    echo "Odrzucony";
                    echo '</span>';
                    break;
            }
            break;
    }
}

function set_proposition_status_columns($columns) {
    $columns['status'] = __('Status', 'kaizen');

    return $columns;
}

if (function_exists('add_theme_support')) {
    if (isset($_GET['post_type'])) {
        $post_type = $_GET['post_type'];

        if (in_array($post_type, array('propozycja'))) {
            add_filter('manage_posts_columns', 'set_proposition_status_columns');
            add_action('manage_posts_custom_column', 'proposition_status_column', 10, 2);
            add_filter('manage_posts_columns', 'proposition_column_order');
        }
    }
}

function proposition_column_order($columns) {
    $n_columns = array();
    $move = 'status'; // what to move
    $before = 'taxonomy-etykiety'; // move before this
    foreach ($columns as $key => $value) {
        if ($key == $before) {
            $n_columns[$move] = $move;
        }
        $n_columns[$key] = $value;
    }

    return $n_columns;
}
