<?php

// Register Custom Post Type
function process() {

    $labels = array(
        'name' => _x('Procesy', 'Post Type General Name', 'kaizen'),
        'singular_name' => _x('Proces', 'Post Type Singular Name', 'kaizen'),
        'menu_name' => __('Procesy', 'kaizen'),
        'name_admin_bar' => __('Procesy', 'kaizen'),
        'archives' => __('Archiwum procesów', 'kaizen'),
        'attributes' => __('Atrybuty procesu', 'kaizen'),
        'parent_item_colon' => __('Proces nadrzędny:', 'kaizen'),
        'all_items' => __('Wszystkie procesy', 'kaizen'),
        'add_new_item' => __('Dodaj nowy proces', 'kaizen'),
        'add_new' => __('Nowy proces', 'kaizen'),
        'new_item' => __('Nowy proces', 'kaizen'),
        'edit_item' => __('Edytuj proces', 'kaizen'),
        'update_item' => __('Aktualizuj proces', 'kaizen'),
        'view_item' => __('Zobacz proces', 'kaizen'),
        'view_items' => __('Zobacz procesy', 'kaizen'),
        'search_items' => __('Szukaj procesu', 'kaizen'),
        'not_found' => __('Brak wyników', 'kaizen'),
        'not_found_in_trash' => __('Brak wyników w koszu', 'kaizen'),
        'featured_image' => __('Obrazek wyróżniający', 'kaizen'),
        'set_featured_image' => __('Ustaw obrazem wyróżniający', 'kaizen'),
        'remove_featured_image' => __('Usuń obrazek wyróżniający', 'kaizen'),
        'use_featured_image' => __('Użyj jako obrazek wyróżniający', 'kaizen'),
        'insert_into_item' => __('Wstaw do procesu', 'kaizen'),
        'uploaded_to_this_item' => __('Wgrano do tego procesu', 'kaizen'),
        'items_list' => __('Lista procesów', 'kaizen'),
        'items_list_navigation' => __('Lista procesów', 'kaizen'),
        'filter_items_list' => __('Filtruj procesy na liście', 'kaizen'),
    );
    $args = array(
        'label' => __('Proces', 'kaizen'),
        'description' => __('Post Type Description', 'kaizen'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'revisions'),
        'taxonomies' => array('dzial'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 102,
        'menu_icon' => 'dashicons-admin-links',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('proces', $args);
}

add_action('init', 'process', 0);

// Register Custom Taxonomy
function department() {

    $labels = array(
        'name' => _x('Działy', 'Taxonomy General Name', 'kaizen'),
        'singular_name' => _x('Dział', 'Taxonomy Singular Name', 'kaizen'),
        'menu_name' => __('Działy', 'kaizen'),
        'all_items' => __('Wszystkie działy', 'kaizen'),
        'parent_item' => __('Dział nadrzędny', 'kaizen'),
        'parent_item_colon' => __('Dział nadrzędny:', 'kaizen'),
        'new_item_name' => __('Nazwa nowego działu', 'kaizen'),
        'add_new_item' => __('Dodaj nowy dział', 'kaizen'),
        'edit_item' => __('Edytuj dział', 'kaizen'),
        'update_item' => __('Aktualizuj dział', 'kaizen'),
        'view_item' => __('Zobacz dział', 'kaizen'),
        'separate_items_with_commas' => __('Oddziel działy przecinkami', 'kaizen'),
        'add_or_remove_items' => __('Dodaj lub usuń dział', 'kaizen'),
        'choose_from_most_used' => __('Wybierz z najczęściej używanych', 'kaizen'),
        'popular_items' => __('Popularne działy', 'kaizen'),
        'search_items' => __('Szukaj działu', 'kaizen'),
        'not_found' => __('Nie znaleziono', 'kaizen'),
        'no_terms' => __('Brak działów', 'kaizen'),
        'items_list' => __('Lista działów', 'kaizen'),
        'items_list_navigation' => __('Lista działów', 'kaizen'),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
    );
    register_taxonomy('dzial', array('proces'), $args);
}

add_action('init', 'department', 0);

function add_process_meta_box() {
    add_meta_box("new-proposition-meta-box", "Nowe propozycje zmian", "new_proposition_meta_box_markup", "proces", "side", "high", null);
    add_meta_box("accepted-proposition-meta-box", "Zaakceptowane propozycje zmian", "accepted_proposition_meta_box_markup", "proces", "side", "high", null);
    add_meta_box("rejected-proposition-meta-box", "Odrzucone propozycje zmian", "rejected_proposition_meta_box_markup", "proces", "side", "high", null);
    add_meta_box("steps-meta-box", "Kroki procesu", "steps_meta_box_markup", "proces", "normal", "high", null);
}

add_action("add_meta_boxes", "add_process_meta_box");

function rejected_proposition_meta_box_markup($object) {
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");
    ?>
    <div>
        <?php
        $args = array(
            'post_type' => 'propozycja',
            'post_status' => 'publish',
            'post_status' => 'odrzucony',
            'order' => 'ASC',
        );

        $loop = new WP_Query($args);
        ?>
        <ul>
            <?php
            while ($loop->have_posts()) : $loop->the_post();
                echo '<li>';
                echo '<p><a href=/wp-admin/post.php?action=edit&post=' . get_the_ID() . '> ' . get_the_title() . '</a></p>';
                echo '</li>';
            endwhile;
            echo '</ul>';

            wp_reset_postdata();
            ?>
    </div>
    <?php
}

function accepted_proposition_meta_box_markup($object) {
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");
    ?>
    <div>
        <?php
        $args = array(
            'post_type' => 'propozycja',
            'post_status' => 'publish',
            'post_status' => 'zaakceptowany',
            'order' => 'ASC',
        );

        $loop = new WP_Query($args);
        ?>
        <ul>
            <?php
            while ($loop->have_posts()) : $loop->the_post();
                echo '<li>';
                echo '<p><a href=/wp-admin/post.php?action=edit&post=' . get_the_ID() . '> ' . get_the_title() . '</a></p>';
                echo '</li>';
            endwhile;
            echo '</ul>';

            wp_reset_postdata();
            ?>
    </div>
    <?php
}

function new_proposition_meta_box_markup($object) {
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");
    ?>
    <div>
        <?php
        $args = array(
            'post_type' => 'propozycja',
            'post_status' => 'publish',
            'post_status' => 'nowy',
            'order' => 'ASC',
        );

        $loop = new WP_Query($args);
        ?>
        <ul>
            <?php
            while ($loop->have_posts()) : $loop->the_post();
                echo '<li>';
                echo '<p><a href=/wp-admin/post.php?action=edit&post=' . get_the_ID() . '> ' . get_the_title() . '</a></p>';
                echo '</li>';
            endwhile;
            echo '</ul>';

            wp_reset_postdata();
            ?>
    </div>
    <?php
}

function steps_meta_box_markup($object) {
    ?>
    <div>
        Kroki procesu
    </div>
    <?php
}
