<?php
require_once dirname(__FILE__).'/../BL/user.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RegistrationContoller
 *
 * @author Rafał Tokarski
 */
class registerController {
     public static function process(){
        if(isset($_POST['create-user'])){
            self::createUser();
        } 
    }
    public static function createUser(){
         $user = new User();
         $user->username=$_POST['username'];
         $user->email=$_POST['email'];
         $user->password=$_POST['password'];
         if (isset($_POST['isRestaurator']) && ($_POST['isRestaurator'] == "1")) {
         $user->isRestaurator=$_POST['isRestaurator'];
         }
         else{
         $_POST['isRestaurator'] = 0;
         $user->isRestaurator=$_POST['isRestaurator'];
         }
         $user->create();

    }
}
