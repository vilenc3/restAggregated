<?php
    require_once dirname(__FILE__)."/../DAL/categoryDAL.php";
 
class category {
    public $id;
    public $name;
    public $type;
 
    public function create() {
        $res= categoryDAL::create($this);
        return($res);
    }
   
    public function delete(){
        return(categoryDAL::delete($this));        
    }
   
    public function update() {
        return(categoryDAL::update($this));    
    }
    public static function retrieveAll(){
        return(categoryDAL::retrieveAll());
    }

    public static function retrieveByPlace(){
        return(categoryDAL::retrieveByPlace());
    }
    public static function retrieveByCuisine(){
        return(categoryDAL::retrieveByCuisine());
    }
    public static function retrieveByStyle(){
        return(categoryDAL::retrieveByStyle());
    }
    public static function retrieveByRestrictions(){
        return(categoryDAL::retrieveByRestrictions());
    }
}
