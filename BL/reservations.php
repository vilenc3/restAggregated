<?php
    require_once dirname(__FILE__)."/../DAL/reservationsDAL.php";
 
class reservations {
    public $idReserv;
    public $idUser;
    public $idRestaurant;
    public $date;
    public $time;
    public $numberPpl;
    public $comments;
    public $status;
 
    public function create() {
        $res= reservationsDAL::create($this);
        return($res);
    }

    public function update() {
        return(reservationsDAL::update($this));    
    }
   
    public static function retrieveAll(){
        return(reservationsDAL::retrieveAll());
    }
    public function retrieveByUserID(){
        return(reservationsDAL::retrieveByUserID($this));
    }
    public function retrieveByRestID(){
        return(reservationsDAL::retrieveByRestID($this));
    }
}

