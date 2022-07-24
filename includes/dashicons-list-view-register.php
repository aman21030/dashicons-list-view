<?php
class Dashicons_List_View_Register {
    public function __construct() {
        $this->page_render();
    }

    private function page_render() {
        $html  = '<h1>タイトル</h1>';
        $html .= '<p>内容</p>';
        echo $html;
    }
}
