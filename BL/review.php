<?php
    require_once dirname(__FILE__)."/../DAL/reviewDAL.php";
 
class review {
    public $id;
    public $pricing;
    public $speed;
    public $presentation;
    public $quality;
    public $description;
    public $restaurant_id;
    public $user_id;
 
    public function create() {
        $res= reviewDAL::create($this);
        return($res);
    }
   
    public function delete(){
        return(reviewDAL::delete($this));        
    }
   
    public function update() {
        return(reviewDAL::update($this));    
    }
    public static function retrieveAll(){
        return(reviewDAL::retrieveAll());
    }
}