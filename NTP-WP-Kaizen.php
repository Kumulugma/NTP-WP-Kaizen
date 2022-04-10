<?php

/*
  Plugin name: NTP - Kaizen
  Plugin URI:
  Description: System zbierania sugestii pracowniczych.
  Author: Michał Biel
  Author URI: https://www.k3e.pl/
  Text Domain:
  Domain Path:
  Version: 0.0.1a
 */
require_once 'cpt/proces.php';
require_once 'cpt/proposition.php';
add_action('init', 'kaizen_plugin_init');

function kaizen_plugin_init() {
    do_action('kaizen_plugin_init');
    if (current_user_can('manage_options')) {
        if (is_admin()) {
            require_once 'ui/admin.php';
            require_once 'widgets/KaizenWidget.php';
            KaizenWidget::run();
            Kaizen::run();
        } else {
            require_once 'ui/front.php';
            Kaizen::run();
            require_once 'shortcodes/form.php';
            require_once 'shortcodes/list.php';
            require_once 'shortcodes/user.php';
        }
    } else {
        if (!is_admin()) {
            require_once 'ui/front.php';
            Kaizen::run();
            require_once 'shortcodes/form.php';
            require_once 'shortcodes/list.php';
            require_once 'shortcodes/user.php';
        }
    }
}

function kaizen_plugin_activate() {
    
}

register_activation_hook(__FILE__, 'kaizen_plugin_activate');

function kaizen_plugin_deactivate() {
    
}

register_deactivation_hook(__FILE__, 'kaizen_plugin_deactivate');
