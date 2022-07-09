<?php
/*
Plugin Name: Dashicons List View
Plugin URI: https://github.com/aman21030/dashicons-list-view
Description: SNSアイコンをリストで出す
Version: 1.0.0
Author: Tomomi Aman
Author URI: https://aman13.com/
License: GPLv2 or later
Text Domain: dashicons-list-view
Domain Path: /languages
*/

new Dashicons_List_View();

class Dashicons_List_View {
	public function __construct () {
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
	}
	public function admin_menu () {
		add_menu_page(
			'DLV',
			'DLV2',
			'manage_options',
			plugin_basename( __FILE__ ),
			''
		);
	}
}