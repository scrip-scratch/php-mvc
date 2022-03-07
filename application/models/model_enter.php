<?php

class Model_enter extends Model {

    public function authUser() {      
        $login = $_POST['login'];
        $password = $_POST['password'];                   
        
        $mysql = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        $result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login'");

        $user = $result->fetch_assoc();

        if($user != NULL){
            $hash = $user["password"];

            if (password_verify($password, $hash)) {
                return true;
            } else {
                return false;
            }
        }

        $mysql->close();                   
    }

    public function addLog($login, $password) {
        $commentFilePath = $_SERVER["DOCUMENT_ROOT"].'/application/logs/logs.txt';

        $newLog = date('d.m.y H:i') . ' ' . 'Попытка войти: login: ' . $login . ', password: ' . $password;

        file_put_contents($commentFilePath,  $newLog . "\n", FILE_APPEND);

    }

}