<?php
    require_once dirname(__FILE__)."/../DAL/restaurantDAL.php";
 
class restaurant {
    public $id;
    public $name;
    public $description;
    public $phone;
    public $address;
    public $district_id;
    
 
    public function create() {
        $res=restaurantDAL::create($this);
        return($res);
    }
    
    public function delete(){
        return(restaurantDAL::delete($this));        
    }
   
    public function update() {
        return(restaurantDAL::update($this));    
    }
    public static function retrieveAll(){
        return(restaurantDAL::retrieveAll());
    }
    public function retrieveByFilters(){
        return(restaurantDAL::retrieveByFilters($this));
    }
    public function retrieveByType(){
        return(restaurantDAL::retrieveByType($this));
    }
    public function retrieveByID(){
        return(restaurantDAL::retrieveByID($this));
    }
    public function retrieveReviews() {
        return(restaurantDAL::retrieveReviews($this));
    }

}