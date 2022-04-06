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
require_once 'NTP-Kaizen.php';
require_once 'ui/admin.php';
require_once 'cpt/department.php';
require_once 'cpt/proposition.php';
add_action('init', 'k3e_plugin_init');

function k3e_plugin_init() {
    do_action('k3e_plugin_init');
    if (current_user_can('manage_options')) {
        if(is_admin()) {
            Kaizen::run();
        }
    }
}

function k3e_plugin_activate() {
    
}

register_activation_hook(__FILE__, 'k3e_plugin_activate');

function k3e_plugin_deactivate() {
    
}

register_deactivation_hook(__FILE__, 'k3e_plugin_deactivate');
