<?php
   require_once dirname(__FILE__)."/../DataAbstraction/DB.php";
 
class restaurant_has_categoryDAL {
    //put your code here
   
    public static function create($e) {
        $db=DB::getDB();
        $query="INSERT INTO restaurant_has_category (restaurant_id, category_id)" . "VALUES (:restaurant_id, :category_id)";
        $params=[
          ':restaurant_id' => $e->restaurant_id,
          ':category_id'=> $e->category_id
        ];
        echo 'Record added successfully';
        $res=$db->query($query, $params);
        return($res);
    }
 
    public static function delete($e){
        $db=DB::getDB();
        $query = ('DELETE FROM restaurant_has_category WHERE restaurant_id = :restaurant_id');
        $db->query($query, [':restaurant_id'=>$e->restaurant_id]);
        echo 'Record deleted successfully';
    }
   
    public static function update($e){
        $db=DB::getDB();
        $query=('UPDATE restaurant_has_category' . 'SET restaurant_id=:restaurant_id, category_id=:category_id, WHERE restaurant_id = :restaurant_id');
        $params=[
          ':restaurant_id'=> $e->restaurant_id,
          ':category_id' => $e->category_id,
        ];
       
        $res=$db->query($query, $params);
        return($res);
    }
   
    public static function retrieveAll() {
        $db=DB::getDB();
        $query="SELECT * FROM restaurant_has_category ORDER BY restaurant_id ASC";
       
        $res=$db->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS, "restaurant_has_category");
       
        return($res);
    }    
}