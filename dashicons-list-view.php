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
		add_action( 'admin_print_scripts-'  . $list_view_register, array( $this, 'admin_script' ) );
	}

	public function admin_style () {
		wp_enqueue_style( 'list_view_style', plugins_url( 'style.css', __FILE__ ) );
	}

	public function admin_script () {
		wp_enqueue_script( 'jquery-ui-sortable' );
		wp_enqueue_script( 'register-list-js', plugins_url( 'script.js', __FILE__ ), array( 'jquery', 'jquery-ui-sortable' ), '1.0.0', true );
	}

	public function register_page_render () {
		require_once( plugin_dir_path (__FILE__) . 'includes/dashicons-list-view-register.php' );
		new Dashicons_List_View_Register();
	}

	public function short_code_init() {
		$sns = get_option( $this->text_domain );
		$html  = '';
		if ( $sns ){
			$html .= '<ul>';
			if ( isset( $sns['twitter_display'] ) && $sns['twitter_display'] === 'on' ) {
				$html .= '<li>';
				$html .= '<a href="https://twitter.com/' . $sns['twitter_account'] . ' target="_blank">';
				$html .= '<span class="dashicons dashicons-twitter footer-icon" style="color:' . $sns['twitter_color'] . '"></span>';
				$html .= '<span style="color:' . $sns['twitter_color'] . '">' . $sns['twitter_account'] . '</span>';
				$html .= '</a>';
				$html .= '</li>';
			}
			if ( isset( $sns['facebook_display'] ) && $sns['facebook_display'] === 'on' ) {
				$html .= '<li>';
				$html .= '<a href="https://www.facebook.com/' . $sns['facebook_account'] . ' target="_blank">';
				$html .= '<span class="dashicons dashicons-facebook footer-icon" style="color:' . $sns['facebook_color'] . '"></span>';
				$html .= '<span style="color:' . $sns['facebook_color'] . '">' . $sns['facebook_account'] . '</span>';
				$html .= '</a>';
				$html .= '</li>';
			}
			if ( isset( $sns['instagram_display'] ) && $sns['instagram_display'] === 'on' ) {
				$html .= '<li>';
				$html .= '<a href="https://www.instagram.com/' . $sns['instagram_account'] . ' target="_blank">';
				$html .= '<span class="dashicons dashicons-instagram footer-icon" style="color:' . $sns['instagram_color'] . '"></span>';
				$html .= '<span style="color:' . $sns['instagram_color'] . '">' . $sns['instagram_account'] . '</span>';
				$html .= '</a>';
				$html .= '</li>';
			}
			if ( isset( $sns['pinterest_display'] ) && $sns['pinterest_display'] === 'on' ) {
				$html .= '<li>';
				$html .= '<a href="https://www.pinterest.jp/' . $sns['pinterest_account'] . ' target="_blank">';
				$html .= '<span class="dashicons dashicons-pinterest footer-icon" style="color:' . $sns['pinterest_color'] . '"></span>';
				$html .= '<span style="color:' . $sns['pinterest_color'] . '">' . $sns['pinterest_account'] . '</span>';
				$html .= '</a>';
				$html .= '</li>';
			}
			if ( isset( $sns['youtube_display'] ) && $sns['youtube_display'] === 'on' ) {
				$html .= '<li>';
				$html .= '<a href="https://www.youtube.com/' . $sns['youtube_account'] . ' target="_blank">';
				$html .= '<span class="dashicons dashicons-youtube footer-icon" style="color:' . $sns['youtube_color'] . '"></span>';
				$html .= '<span style="color:' . $sns['youtube_color'] . '">' . $sns['youtube_account'] . '</span>';
				$html .= '</a>';
				$html .= '</li>';
			}
			$html .= '</ul>';
		}
		return $html;
	}
}