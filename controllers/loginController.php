<?php
require_once dirname(__FILE__).'/../BL/user.php';

class loginController {
    public static function process(){
        if (isset($_POST['login-user'])){
                self::loginUser();
        }   
}
        
public static function loginUser(){
    $user = new user();
        $user->username=$_POST['username'];
        $user->password=$_POST['password'];
        $user->retrieveByLogin();
    }
}