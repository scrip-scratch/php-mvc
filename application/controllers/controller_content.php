<?php

class Controller_content extends Controller {

    function action_index(){

        if(isset($_COOKIE["auth"])){
            // если есть и пользователь авторизован отправляем на страницу с контентом
            if($_COOKIE["auth"] == "authorized"){
                $this -> view -> generate('content_view.php', 'template_view.php');
                exit();
            }
        } else {
            header('Location: /enter');
            exit();
        }
    }

}