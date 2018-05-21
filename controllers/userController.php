<?php
require_once dirname(__FILE__).'/../BL/user.php';

class userController {

        public static function process(){
        if(isset($_POST['delete-user'])){
            self::deleteUser();
        }
        if(isset($_POST['update-user'])){
            self::updateUser();
        }        
}      

    public static function deleteUser(){
        $user = new user();
        $user->id=$_POST['id'];
        $user->delete();
    }

    public static function updateUser(){
        $user = new user();
        $user->id=$_POST['id'];
        $user->username=$_POST['username'];
        $user->password=$_POST['password'];
        $user->email=$_POST['email'];
        $user->isRestaurator=$_POST['isRestaurator'];
        $user->update();
    }
}
?>