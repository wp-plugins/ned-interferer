<?php
/*
Plugin Name: NED_Stoerer
Plugin URI: http://development.nedeco.de/blog/
Description: Plugin to place an interferer onto your Wordpress Blog
Version: 1.0
Author: Alexander Balsam
Author URI: http://development.nedeco.de
License: GPL2
*/
/*  Copyright 2011  Alexander Balsam  (email : a.balsam@nedeco.de)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function wp_gear_manager_admin_scripts() {
wp_enqueue_script('media-upload');
wp_enqueue_script('thickbox');
wp_enqueue_script('jquery');
}

function wp_gear_manager_admin_styles() {
wp_enqueue_style('thickbox');
}

add_action('admin_print_scripts', 'wp_gear_manager_admin_scripts');
add_action('admin_print_styles', 'wp_gear_manager_admin_styles');



// return the path to where this plugin is currently installed
function get_plugin_url_ned_stoerer() {
	// WP < 2.6
	if ( !function_exists('plugins_url') )
		return get_option('siteurl') . '/wp-content/plugins/' . plugin_basename(dirname(__FILE__));

	return plugins_url(plugin_basename(dirname(__FILE__)));
}


function ned_stoerer_init() {
	if (get_option('ned_stoerer_active')=='true')
		require_once("ned_stoerer_show_stoerer.php");

}


function ned_stoerer_menu_setup(){
	add_options_page('ned_stoerer', 'NED_Interferer', 10, __FILE__, 'ned_stoerer_page');
}


function ned_stoerer_page(){	
	require_once "ned_stoerer_page.php";
}

add_action('admin_menu', 'ned_stoerer_menu_setup');

add_action( 
  'get_footer', // hook into get_footer
  'ned_stoerer_init' 
);


?>
