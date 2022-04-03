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
add_action('init', 'k3e_plugin_init');

function k3e_plugin_init() {
    do_action('k3e_plugin_init');
    if (current_user_can('manage_options')) {
//        K3eUpdater::init();
    }
}

function k3e_plugin_activate() {
    
}

register_activation_hook(__FILE__, 'k3e_plugin_activate');

function k3e_plugin_deactivate() {
    
}

register_deactivation_hook(__FILE__, 'k3e_plugin_deactivate');
