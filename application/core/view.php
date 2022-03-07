<?php

class View {

    function generate($content_view, $template_view, $date = null){
        
        include($_SERVER["DOCUMENT_ROOT"].'/application/views/'.$template_view);        
    }

    function popup_success(){
        include($_SERVER["DOCUMENT_ROOT"].'/application/views/popup_success_view.php');        
    }

    function popup_error(){
        include($_SERVER["DOCUMENT_ROOT"].'/application/views/popup_error_view.php');        
    }

    function vk_link(string $href, array $params){
        include($_SERVER["DOCUMENT_ROOT"].'/application/views/vk_auth_view.php');        
    }
}