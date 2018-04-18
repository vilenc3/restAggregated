<?php
    require_once dirname(__FILE__)."/../DAL/restaurant_has_categoryDAL.php";
 
class restaurant_has_category {
    public $restaurant_id;
    public $category_id;
 
    public function create() {
        $res= restaurant_has_categoryDAL::create($this);
        return($res);
    }
   
    public function delete(){
        return(restaurant_has_categoryDAL::delete($this));        
    }
   
    public function update() {
        return(restaurant_has_categoryDAL::update($this));    
    }
    public static function retrieveAll(){
        return(restaurant_has_categoryDAL::retrieveAll());
    }
}