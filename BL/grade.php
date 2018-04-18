<?php
    require_once dirname(__FILE__)."/../DAL/gradeDAL.php";
 
class grade {
    public $id;
    public $average_pricing;
    public $average_speed;
    public $average_presentation;
    public $average_quality;
    public $restaurant_id;
 
    public function create() {
        $res= gradeDAL::create($this);
        return($res);
    }
   
    public function delete(){
        return(gradeDAL::delete($this));        
    }
   
    public function update() {
        return(gradeDAL::update($this));    
    }
    public static function retrieveAll(){
        return(gradeDAL::retrieveAll());
    }
}