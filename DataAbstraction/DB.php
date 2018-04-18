<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DB
 *
 * @author Rafał Tokarski
 */
class DB {
    private $conn;
    private static $instance = null;


    private function __construct() {
        try {
        $this->conn=new PDO("mysql:host=LAPTOP-L21TG46A;port=3307;dbname=restaurantwebsite; charset=UTF8", "LAPTOP-L21TG46A", "root");
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }
    public static function getDB(){
        if(self::$instance == null){
            self::$instance = new DB();
        }
        return(self::$instance);
    }
    
    public function query($query, $params = []) {
        $statement=$this->conn->prepare($query);
        $statement->execute($params);
        return($statement);
    }
    
    public function lastInsertId(){
        return($this->conn->lastInsertId());
    }
}