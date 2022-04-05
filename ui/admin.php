<?php

class Kaizen {

    
    public static function run() {

        add_action('admin_menu', 'kaizen_menu');

        function kaizen_menu() {
            add_menu_page(
                    __('Kaizen', 'kaizen'), //Title
                    __('Kaizen', 'kaizen'), //Name
                    'manage_options',
                    'kaizen',
                    'kaizen_content',
                    'dashicons-email-alt2',
                    3
            );

            /* Dostępne pozycje
              2 – Dashboard
              4 – Separator
              5 – Posts
              10 – Media
              15 – Links
              20 – Pages
              25 – Comments
              59 – Separator
              60 – Appearance
              65 – Plugins
              70 – Users
              75 – Tools
              80 – Settings
              99 – Separator
             */
        }

        function kaizen_content() {
            include plugin_dir_path(__FILE__) . 'templates/index.php';
        }

    }

    public static function save() {
        if (isset($_POST['Form'])) {
            
        }
    }

}