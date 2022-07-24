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
	private $text_domain;

	public function __construct () {
		$data = get_file_data( __FILE__, array( 'version' => 'Version', 'text_domain' => 'Text Domain' ) );
		$this->text_domain = isset( $data['text_domain'] ) ? $data['text_domain'] : '';
		// TODO 07/24 三項演算子をif文で書いたら下記のようになる（後で消す）
		// if(isset( $data['text_domain'])) {
		// 	$this->text_domain = $data['text_domain'];
		// }else{
		// 	$this->text_domain = '';
		// }
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
	}

	public function admin_menu () {
		add_menu_page(
			esc_html__( 'Dashicons List View', $this->text_domain ),
			esc_html__( 'Dashicons List View', $this->text_domain ),
			'manage_options',
			plugin_basename( __FILE__ ),
			array( $this, 'register_page_render' )
		);
	}

	public function register_page_render () {
		require_once( plugin_dir_path (__FILE__) . 'includes/dashicons-list-view-register.php' );
		new Dashicons_List_View_Register();
	}
}