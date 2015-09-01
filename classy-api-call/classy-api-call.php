<?php
/*
 * Plugin Name: Classy API Call
 * Plugin URI:
 * Description: A plugin to make calls to Classy's API
 * Author: Eli Lyonhart
 * Version: 1.0
 * Author URI: http://www.EliLyonhart.com
 */

add_action('admin_menu', 'classy_api_call_admin_actions');
function classy_api_call_admin_actions() {
  add_options_page('Classy API Call', 'Classy API Call', 'manage_options', __FILE__, 'classy_api_call_admin');
}

function classy_api_call_admin() {

}

?>