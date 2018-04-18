<?php
    require_once dirname(__FILE__)."/../DAL/districtDAL.php";
 
class district {
    public $id;
    public $disName;
 
    public function create() {
        $res= districtDAL::create($this);
        return($res);
    }
   
    public function delete(){
        return(districtDAL::delete($this));        
    }
   
    public function update() {
        return(districtDAL::update($this));    
    }
    public static function retrieveAll(){
        return(districtDAL::retrieveAll());
    }
}