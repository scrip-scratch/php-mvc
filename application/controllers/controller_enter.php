<?php

class Controller_enter extends Controller {
    
    function __construct(){        
        $this-> view = new View();
        $this-> model = new Model_enter();
    }
    
    function action_index(){
  
        // проверяем, есть ли в куках данные об авторизации
        if(isset($_COOKIE["auth"])){
            // если есть и пользователь авторизован отправляем на страницу с контентом
            if($_COOKIE["auth"] == "authorized"){
                header('Location: /content');
                exit();
            }
        }  
        
        session_start();
        // обьявляем переменную статуса авторизации
        $authSuccess = false;                                

        if(!empty($_POST)) {
            // проверяем соответсвует ли токен формы сохраненному в сессии
            if($_POST["token"] == $_SESSION["CSRF"]) {
                // если да, запускаем метод Модели авторизации (возварщает true/false)
                $authSuccess = $this-> model -> authUser();
            }
            // если статус авторизации true   
            if($authSuccess){
                // если стоит галочка "Запомнить меня"
                if($_POST["remember_me"] == 1){
                    // сохраняем рандомный токен в куки на 3600 сек
                    $remember_me_token = md5(random_int(0,999999));
                    setcookie('remember_token', $remember_me_token, time() + 3600, "/");
                }
                // созраняем куки с авторизацией и переходим на страницу контента 
                setcookie('auth', 'authorized', time() + 3600, "/");
                header('Location: /content');
                exit();
            // если авторизации false выводим поп-ап окно с сообщением об ошибке                                      
            } else {              
                $this -> model -> addLog($_POST['login'], $_POST['password']);  
                $this -> view -> popup_error();
            }    
		} 
                                        
        $this -> view -> generate('enter_view.php', 'template_view.php');         

        
    }

}