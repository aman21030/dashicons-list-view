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
                unset($_POST['list_view_field']);
                unset($_POST['_wp_http_referer']);
                unset($_POST['submit']);
                $this->update_flag = update_option( $this->option, $_POST );
            }  
        }
    }

    private function init_data() {
        $sns = ['twitter', 'facebook', 'instagram', 'youtube', 'pinterest','line'];
        $args = [];
        foreach($sns as $value){
            $args[$value]['account'] = '';
            $args[$value]['size_w']  = '';
            $args[$value]['size_h']  = '';
            $args[$value]['color']   = '';
        }
        return $args;
    }

    private function page_render() {
        $args = get_option( $this->option );
        var_dump($args);
        if ( !$args ) {
            $args = $this->init_data();
        }
        if( !array_search('line', array_column($args, 0)) ) {
            $args['line']['size_w']  = '';
            $args['line']['size_h']  = '';
            $args['line']['account'] = '';
            $args['line']['color']   = '';
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
        $html .= '<thead>';
        $html .= '<tr>';
        $html .= '<th>No.</th>';
        $html .= '<th>SNS</th>';
        $html .= '<th>Enabled</th>';
        $html .= '<th>Account</th>';
        $html .= '<th>Size</th>';
        $html .= '<th>Color</th>';
        $html .= '</tr>';
        $html .= '</thead>';
        $html .= '<tbody id="sort">';
        echo $html;
        

        $num = 1;
        foreach ($args as $index => $value) {
            echo $this->table_row( $num++, $index, $value );
        }
        $html  = '</tbody>';
        $html .= '</table>';
        $html .= '<input type="submit" value="update" name="submit">';
        $html .= '</form>';
        $html .= '</div>';
        echo $html;
    }

    private function table_row ( $index, $value, $args ) {
        $html  = '';
        $html .= '<tr>';
        $html .= '<th name="num">' . $index;
        $html .= '<input type="hidden" value="' . $value . '[num]">';
        $html .= '</th>';
        $html .= '<th><label for="account">' . $value . '</label></th>';
        echo $html;
        $html  = '<td><input type="checkbox" name="' . $value . '[display]" id="display"';
        if ( isset( $args['display'] ) && $args['display'] === 'on' ) {
            $html .= ' checked>';
        } else {
            $html .= '>';
        }
        $html .= '<label for="display">Enabled</label></td>';
        $html .= '<td><input type="text" name="' . $value . '[account]" id="account" maxlength="30" value="' . $args['account'] . '"></td>';
        $html .= '<td>W:<input type="number" name="' . $value . '[size_w]" maxlength="3" value="' . $args['size_w'] . '">';
        $html .= 'H:<input type="number" name="' . $value . '[size_h]" maxlength="3" value="' . $args['size_h'] . '"></td>';
        $html .= '<td><input type="color" name="' . $value . '[color]" value="' . $args['color'] . '"></td>';
        $html .= '</tr>';

        return $html;
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
