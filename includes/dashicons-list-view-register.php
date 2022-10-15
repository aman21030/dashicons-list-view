<?php
class Dashicons_List_View_Register {
    private $option = 'dashicons-list-view';
    private $update_flag = false;
    public function __construct() {
        $this->update();
        $this->page_render();
    }

    private function update() {
        if ( isset ( $_POST['submit'] ) && $_POST['submit'] === 'update' ) {
            if ( ! isset( $_POST['list_view_field'] ) || ! wp_verify_nonce( $_POST['list_view_field'], 'list_view_action' ) ) {
            //    print 'Sorry, your nonce did not verify.';
               exit;
            } else {  
                $this->update_flag = update_option( $this->option, $_POST );
            }  
        }
    }

    private function init_data() {
        $args['twitter_account']   = '';
        $args['twitter_size_w']    = '';
        $args['twitter_size_h']    = '';
        $args['twitter_color']     = '';
        $args['facebook_account']  = '';
        $args['facebook_size_w']   = '';
        $args['facebook_size_h']   = '';
        $args['facebook_color']    = '';
        $args['instagram_account'] = '';
        $args['instagram_size_w']  = '';
        $args['instagram_size_h']  = '';
        $args['instagram_color']   = '';
        $args['youtube_account']   = '';
        $args['youtube_size_w']    = '';
        $args['youtube_size_h']    = '';
        $args['youtube_color']     = '';
        $args['pinterest_account'] = '';
        $args['pinterest_size_w']  = '';
        $args['pinterest_size_h']  = '';
        $args['pinterest_color']   = '';
        return $args;
    }

    private function page_render() {
        $args = get_option( $this->option );
        if ( !$args ) {
            $args = $this->init_data();
        }

        $html  = '<div class="wrap">';
        $html .= '<h1>Dashicons List View Register</h1>';
        echo $html;
        if ( $this->update_flag ) {
            $this->information_render();
            $this->update_flag = false;
        }
        $html  = '<form method="POST" action="">';
        echo $html;
        wp_nonce_field( 'list_view_action', 'list_view_field' );
        $html  = '<table>';
        $html .= '<tr>';
        $html .= '<th>&nbsp;</th>';
        $html .= '<th>Enabled</th>';
        $html .= '<th>Account</th>';
        $html .= '<th>Size</th>';
        $html .= '<th>Color</th>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<th><label for="twitter_account">Twitter</label></th>';
        echo $html;
        $html  = '<td><input type="checkbox" name="twitter_display" id="twitter_display"';
        if ( isset( $args['twitter_display'] ) && $args['twitter_display'] === 'on' ) {
            $html .= ' checked>';
        } else {
            $html .= '>';
        }
        $html .= '<label for="twitter_display">Enabled</label></td>';
        $html .= '<td><input type="text" name="twitter_account" id="twitter_account" maxlength="30" value="' . $args['twitter_account'] . '"></td>';
        $html .= '<td>W:<input type="number" name="twitter_size_w" maxlength="3" value="' . $args['twitter_size_w'] . '">';
        $html .= 'H:<input type="number" name="twitter_size_h" maxlength="3" value="' . $args['twitter_size_h'] . '"></td>';
        $html .= '<td><input type="color" name="twitter_color" value="' . $args['twitter_color'] . '"></td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<th><label for="facebook_account">Facebook</label></th>';
        echo $html;
        $html  = '<td><input type="checkbox" name="facebook_display" id="facebook_display"';
        if ( isset( $args['facebook_display'] ) && $args['facebook_display'] === 'on' ) {
            $html .= ' checked>';
        } else {
            $html .= '>';
        }
        $html .= '<label for="facebook_display">Enabled</label></td>';
        $html .= '<td><input type="text" name="facebook_account" id="facebook_account" maxlength="30" value="' . $args['facebook_account'] . '"></td>';
        $html .= '<td>W:<input type="number" name="facebook_size_w" maxlength="3" value="' . $args['facebook_size_w'] . '">';
        $html .= 'H:<input type="number" name="facebook_size_h" maxlength="3" value="' . $args['facebook_size_h'] . '"></td>';
        $html .= '<td><input type="color" name="facebook_color" value="' . $args['facebook_color'] . '"></td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<th><label for="instagram_account">Instagram</label></th>';
        echo $html;
        $html  = '<td><input type="checkbox" name="instagram_display" id="instagram_display"';
        if ( isset( $args['instagram_display'] ) && $args['instagram_display'] === 'on' ) {
            $html .= ' checked>';
        } else {
            $html .= '>';
        }
        $html .='<label for="instagram_display">Enabled</label></td>';
        $html .= '<td><input type="text" name="instagram_account" id="instagram_account" maxlength="30" value="' . $args['instagram_account'] . '"></td>';
        $html .= '<td>W:<input type="number" name="instagram_size_w" maxlength="3" value="' . $args['instagram_size_w'] . '">';
        $html .= 'H:<input type="number" name="instagram_size_h" maxlength="3" value="' . $args['instagram_size_h'] . '"></td>';
        $html .= '<td><input type="color" name="instagram_color" value="' . $args['instagram_color'] . '"></td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<th><label for="youtube_account">YouTube</label></th>';
        echo $html;
        $html  = '<td><input type="checkbox" name="youtube_display" id="youtube_display"';
        if ( isset( $args['youtube_display'] ) && $args['youtube_display'] === 'on' ) {
            $html .= ' checked>';
        } else {
            $html .= '>';
        }
        $html .= '<label for="youtube_display">Enabled</label></td>';
        $html .= '<td><input type="text" name="youtube_account" id="youtube_account" maxlength="30" value="' . $args['youtube_account'] . '"></td>';
        $html .= '<td>W:<input type="number" name="youtube_size_w" maxlength="3" value="' . $args['youtube_size_w'] . '">';
        $html .= 'H:<input type="number" name="youtube_size_h" maxlength="3" value="' . $args['youtube_size_h'] . '"></td>';
        $html .= '<td><input type="color" name="youtube_color" value="' . $args['youtube_color'] . '"></td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<th><label for="pinterest_account">Pinterest</label></th>';
        echo $html;
        $html  = '<td><input type="checkbox" name="pinterest_display" id="pinterest_display"';
        if ( isset( $args['pinterest_display'] ) && $args['pinterest_display'] === 'on' ) {
            $html .= ' checked>';
        } else {
            $html .= '>';
        }
        $html .= '<label for="pinterest_display">Enabled</label></td>';
        $html .= '<td><input type="text" name="pinterest_account" id="pinterest_account" maxlength="30" value="' . $args['pinterest_account'] . '"></td>';
        $html .= '<td>W:<input type="number" name="pinterest_size_w" maxlength="3" value="' . $args['pinterest_size_w'] . '">';
        $html .= 'H:<input type="number" name="pinterest_size_h" maxlength="3" value="' . $args['pinterest_size_h'] . '"></td>';
        $html .= '<td><input type="color" name="pinterest_color" value="' . $args['pinterest_color'] . '"></td>';
        $html .= '</tr>';
        $html .= '</table>';
        $html .= '<input type="submit" value="update" name="submit">';
        $html .= '</form>';
        $html .= '</div>';
        echo $html;
    }
    private function information_render () {
		$html  = '<div id="message" class="updated notice notice-success is-dismissible below-h2">';
		$html .= '<p>Information Update.</p>';
		$html .= '<button type="button" class="notice-dismiss">';
		$html .= '<span class="screen-reader-text">Information Update.</span>';
		$html .= '</button>';
		$html .= '</div>';

		echo $html;
	}
}
