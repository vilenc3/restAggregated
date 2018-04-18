<?php
require_once dirname(__FILE__)."/../DAL/userDAL.php";
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
 *
 * @author bash
 */
class user {
    //put your code here
    public $id;
    public $username;
    public $password;
    public $email;
    public $isRestaurator;
    public $isAdmin;
 
    public function create() {
        $res=userDAL::create($this);
        return($res);
    }
   
    public function delete(){
        return(userDAL::delete($this));        
    }
   
    public function update() {
        return(userDAL::update($this));    
    }
    public static function retrieveAll(){
        return(userDAL::retrieveAll());
    }
    
    public function retrieveByLogin(){
    return(userDAL::retrieveByLogin($this));
    }
}
