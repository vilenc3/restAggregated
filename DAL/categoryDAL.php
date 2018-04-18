<?php
   require_once dirname(__FILE__)."/../DataAbstraction/DB.php";
 
class categoryDAL {
    //put your code here
   
    public static function create($e) {
        $db=DB::getDB();
        $query="INSERT INTO category (name, type)" . "VALUES (:name, :type)";
        $params=[
          ':name'=> $e->name,
          ':type'=> $e->type
        ];
        echo 'Record added successfully';
        $res=$db->query($query, $params);
        return($res);
    }
 
    public static function delete($e){
        $db=DB::getDB();
        $query = ('DELETE FROM category WHERE id = :id');
        $db->query($query, [':id'=>$e->id]);
        echo 'Record deleted successfully';
    }
   
    public static function update($e){
        $db=DB::getDB();
        $query=('UPDATE category ' . 'SET  name=:name, type=:type WHERE id = :id');
        $params=[
          ':name' => $e->name,
          ':type' => $e->type,
        ];
       
        $res=$db->query($query, $params);
        return($res);
    }
   
    public static function retrieveAll() {
        $db=DB::getDB();
        $query="SELECT * FROM category ORDER BY id ASC";
       
        $res=$db->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS, "category");
       
        return($res);
    }    

        public static function retrieveByPlace() {
        $db=DB::getDB();
        $query="SELECT * FROM category WHERE type='place' ORDER BY name ASC";
       
        $res=$db->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS, "category");
       
        return($res);
    }    

    public static function retrieveByCuisine() {
        $db=DB::getDB();
        $query="SELECT * FROM category WHERE type='cuisine' ORDER BY name ASC";
       
        $res=$db->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS, "category");
       
        return($res);
    }    

    public static function retrieveByStyle() {
        $db=DB::getDB();
        $query="SELECT * FROM category WHERE type='style' ORDER BY name ASC";
       
        $res=$db->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS, "category");
       
        return($res);
    }

    public static function retrieveByRestrictions() {
        $db=DB::getDB();
        $query="SELECT * FROM category WHERE type='restrictions' ORDER BY name ASC";
       
        $res=$db->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS, "category");
       
        return($res);
    }
}