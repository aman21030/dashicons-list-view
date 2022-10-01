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
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		add_shortcode( $this->text_domain, array( $this, 'short_code_init' ) );
	}

	public function admin_menu () {
		$list_view_register = add_menu_page(
			esc_html__( 'Dashicons List View', $this->text_domain ),
			esc_html__( 'Dashicons List View', $this->text_domain ),
			'manage_options',
			plugin_basename( __FILE__ ),
			array( $this, 'register_page_render' )
		);
		add_action( 'admin_print_styles-'  . $list_view_register, array( $this, 'admin_style' ) );
		add_action( 'admin_print_scripts-' . $list_view_register, array( $this, 'admin_scripts') );
	}

	public function admin_style () {
		wp_enqueue_style( 'wp-color-picker' );
	}

	public function admin_scripts () {
		wp_enqueue_script( 'color-picker-main-js', plugins_url( 'js/color-picker-main.js', __FILE__ ), array( 'jquery', 'wp-color-picker' ) );
	}

	public function register_page_render () {
		require_once( plugin_dir_path (__FILE__) . 'includes/dashicons-list-view-register.php' );
		new Dashicons_List_View_Register();
	}

	public function short_code_init() {
		$sns = get_option( 'dashicons-list-view' );
		var_dump($sns);
		$html  = '';
		if ( $sns ){
			$html .= '<ul>';
			$html .= '<li>';
			$html .= '<a href="https://twitter.com/' . $sns['twitter_account'] . ' target="_blank">';
			$html .= '<span class="dashicons dashicons-twitter footer-icon" style="color:' . $sns['twitter_color'] . '"></span>';
			$html .= '<span style="color:' . $sns['twitter_color'] . '">' . $sns['twitter_account'] . '</span>';
			$html .= '</a>';
			$html .= '</li>';
			$html .= '<li>';
			$html .= '<a href="https://twitter.com/' . $sns['twitter_account'] . ' target="_blank">';
			$html .= '<span class="dashicons dashicons-twitter footer-icon" style="color:' . $sns['twitter_color'] . '"></span>';
			$html .= '<span style="color:' . $sns['twitter_color'] . '">' . $sns['twitter_account'] . '</span>';
			$html .= '</a>';
			$html .= '</li>';
			$html .= '</ul>';
		}
		return $html;
	}
}