<?php
    require_once dirname(__FILE__)."/../DAL/user_has_restaurantDAL.php";
 
class user_has_restaurant {
    public $user_id;
    public $restaurant_id;
 
    public function create() {
        $res= user_has_restaurantDAL::create($this);
        return($res);
    }
   
    public function delete(){
        return(user_has_restaurantDAL::delete($this));        
    }
   
    public function update() {
        return(user_has_restaurantDAL::update($this));    
    }
    public static function retrieveAll(){
        return(user_has_restaurantDAL::retrieveAll());
    }

    public function retrieveOwner(){
        return(user_has_restaurantDAL::retrieveOwner($this));
    }
}