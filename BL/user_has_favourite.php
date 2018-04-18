<?php
    require_once dirname(__FILE__)."/../DAL/user_has_favouriteDAL.php";
 
class user_has_favourite {
    public $user_id;
    public $category_id;
 
    public function create() {
        $res= User_has_favouriteDAL::create($this);
        return($res);
    }
   
    public function delete(){
        return(User_has_favouriteDAL::delete($this));        
    }
   
    public function update() {
        return(User_has_favouriteDAL::update($this));    
    }
    public static function retrieveAll(){
        return(User_has_favouriteDAL::retrieveAll());
    }
}