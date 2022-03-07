<?php

class Controller_vk_auth extends Controller {
    
    function __construct(){        
        $this-> view = new View();        
    }

    // ЭТА ЧАСТЬ ЗАДАНИЯ ЯВЛЯЕТСЯ ВЕСЬМА УСЛОВНОЙ, ТАК КАК БЕЗ ВЫГРУЗКИ НА ХОСТИНГ РАБОТАТЬ НЕ БУДЕТ 
    
    function action_index(){
        session_start(); // Токен храним в сессии

        // Параметры приложения
        $clientId     = '1111111'; // ID приложения
        $redirectUri  = 'http://mydev.com/vk_auth'; // Адрес, на который будет переадресован пользователь после прохождения авторизации
        $clientSecret = 'mysecret'; // Защищённый ключ

        if(isset($_GET['code'])){
            $params = array(
                'client_id'     => $clientId,
                'client_secret' => $clientSecret,
                'code'          => $_GET['code'],
                'redirect_uri'  => $redirectUri
            );
         
            if (!$content = @file_get_contents('https://oauth.vk.com/access_token?' . http_build_query($params))) {
                $error = error_get_last();
                throw new Exception('HTTP request failed. Error: ' . $error['message']);
            }
         
            $response = json_decode($content);
         
            // Если при получении токена произошла ошибка
            if (isset($response->error)) {
                throw new Exception('При получении токена произошла ошибка. Error: ' . $response->error . '. Error description: ' . $response->error_description);
            }
            //А вот здесь выполняем код, если все прошло хорошо
            $token = $response->access_token; // Токен
            $expiresIn = $response->expires_in; // Время жизни токена
            $userId = $response->user_id; // ID авторизовавшегося пользователя
         
            // Сохраняем токен в сессии
            $_SESSION['vk_token'] = $token;
            header('Location: /content');
            exit();
        }         
        
        // Формируем ссылку для авторизации
        $params = array(
            'client_id'     => $clientId,
            'redirect_uri'  => $redirectUri,
            'response_type' => 'code',
            'v'             => '5.126', 
            'scope'         => 'photos,offline',
        );
        
        // Выводим на экран ссылку для открытия окна диалога авторизации   
        $this -> view -> vk_link('http://oauth.vk.com/authorize?', $params);

                
    }
}
