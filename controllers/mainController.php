<?php
require_once dirname(__FILE__).'/registerController.php';
require_once dirname(__FILE__).'/loginController.php';
require_once dirname(__FILE__).'/restaurantController.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MainController
 *
 * @author Rafał Tokarski
 */
class mainController {
    public static function process(){
        session_start();
        registerController::process();
        loginController::process();
        restaurantController::process();
    }
}
