<?php

class Model_reg extends Model {

    public function regNewUser() {      

        $login = $_POST['login'];
		$password = $_POST['password'];   
        $user_role = 'user';

        $password = password_hash($password, PASSWORD_DEFAULT);
        
        $mysql = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        $mysql->query("INSERT INTO `users` (`login`, `password`, `role`) VALUES ('$login', '$password', '$user_role')"); 

        $mysql->close();

        return true;
    }

}