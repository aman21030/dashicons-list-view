<?php
class Dashicons_List_View_Register {
    private $option = 'dashicons_list_view';
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
                update_option( $this->option, $_POST );
            }  
        }
    }

    private function page_render() {
        $args = get_option( $this->option );
        $html  = '<div class="wrap">';
        $html .= '<h1>Dashicons List View Register</h1>';
        $html .= '<form method="POST" action="">';
        echo $html;
        wp_nonce_field( 'list_view_action', 'list_view_field' );
        $html  = '<table>';
        $html .= '<tr>';
        $html .= '<th>&nbsp;</th>';
        $html .= '<th>Account</th>';
        $html .= '<th>Size</th>';
        $html .= '<th>Color</th>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<th><label for="twitter_account">Twitter</label></th>';
        $html .= '<td><input type="text" name="twitter_account" id="twitter_account" maxlength="30" value="' . $args['twitter_account'] . '"></td>';
        $html .= '<td>W:<input type="number" name="twitter_size_w" maxlength="3">H:<input type="number" name="twitter_size_h" maxlength="3"></td>';
        $html .= '<td><input type="text" name="twitter_color" id="twitter-color-picker"></td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<th><label for="facebook_account">Facebook</label></th>';
        $html .= '<td><input type="text" name="facebook_account" id="facebook_account" maxlength="30"></td>';
        $html .= '<td>W:<input type="number" name="facebook_size_w" maxlength="3">H:<input type="number" name="facebook_size_h" maxlength="3"></td>';
        $html .= '<td><input type="text" name="facebook_color" id="facebook-color-picker"></td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<th><label for="instagram_account">Instagram</label></th>';
        $html .= '<td><input type="text" name="instagram_account" id="instagram_account" maxlength="30"></td>';
        $html .= '<td>W:<input type="number" name="instagram_size_w" maxlength="3">H:<input type="number" name="instagram_size_h" maxlength="3"></td>';
        $html .= '<td><input type="text" name="instagram_color" id="instagram-color-picker"></td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<th><label for="youtube_account">YouTube</label></th>';
        $html .= '<td><input type="text" name="youtube_account" id="youtube_account" maxlength="30"></td>';
        $html .= '<td>W:<input type="number" name="youtube_size_w" maxlength="3">H:<input type="number" name="youtube_size_h" maxlength="3"></td>';
        $html .= '<td><input type="text" name="youtube_color" id="youtube-color-picker"></td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<th><label for="pinterest_account">Pinterest</label></th>';
        $html .= '<td><input type="text" name="pinterest_account" id="pinterest_account" maxlength="30"></td>';
        $html .= '<td>W:<input type="number" name="pinterest_size_w" maxlength="3">H:<input type="number" name="pinterest_size_h" maxlength="3"></td>';
        $html .= '<td><input type="text" name="pinterest_color" id="pinterest-color-picker"></td>';
        $html .= '</tr>';
        $html .= '</table>';
        $html .= '<input type="submit" value="update" name="submit">';
        $html .= '</form>';
        $html .= '</div>';
        echo $html;
    }
}
