zz<?php
   require_once dirname(__FILE__)."/../DataAbstraction/DB.php";
 
class districtDAL {
    //put your code here
   
    public static function create($e) {
        $db=DB::getDB();
        $query="INSERT INTO district (disName)" . "VALUES (:disName)";
        $params=[
          ':disName'=> $e->disName
        ];
        echo 'Record added successfully';
        $res=$db->query($query, $params);
        return($res);
    }
 
    public static function delete($e){
        $db=DB::getDB();
        $query = ('DELETE FROM district WHERE id = :id');
        $db->query($query, [':id'=>$e->id]);
        echo 'Record deleted successfully';
    }
   
    public static function update($e){
        $db=DB::getDB();
        $query=('UPDATE district ' . 'SET  disName=:disName WHERE id = :id');
        $params=[
          ':disName' => $e->disName
        ];
       
        $res=$db->query($query, $params);
        return($res);
    }
   
    public static function retrieveAll() {
        $db=DB::getDB();
        $query="SELECT * FROM district ORDER BY id ASC";
       
        $res=$db->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS, "district");
       
        return($res);
    }    
}