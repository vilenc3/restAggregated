<?php
   require_once dirname(__FILE__)."/../DataAbstraction/DB.php";
 
class gradeDAL {
    //put your code here
   
    public static function create($e) {
        $db=DB::getDB();
        $query="INSERT INTO grade (average_pricing, average_speed, average_presentation, average_quality, restaurant_id)" . "VALUES (:average_pricing, :average_speed, :average_presentation,:average_quality,:restaurant_id)";
        $params=[
          ':average_pricing'=> $e->average_pricing,
          ':average_speed'=> $e->average_speed,
          ':average_presentation'=> $e->average_presentation,
          ':average_quality'=> $e->average_quality,
          ':restaurant_id'=> $e->restaurant_id
        ];
        echo 'Record added successfully';
        $res=$db->query($query, $params);
        return($res);
    }
 
    public static function delete($e){
        $db=DB::getDB();
        $query = ('DELETE FROM grade WHERE id = :id');
        $db->query($query, [':id'=>$e->id]);
        echo 'Record deleted successfully';
    }
   
    public static function update($e){
        $db=DB::getDB();
        $query=('UPDATE grade ' . 'SET  average_pricing=:average_pricing, average_speed=:average_speed, average_presentation=:average_presentation, average_quality=:average_quality, restaurant_id=:restaurant_id  WHERE id = :id');
        $params=[
          ':average_pricing' => $e->average_pricing,
          ':average_speed'=> $e->average_speed,
          ':average_presentation'=> $e->average_presentation,
          ':average_quality'=> $e->average_quality,
          ':restaurant_id'=> $e->restaurant_id, 
        ];
       
        $res=$db->query($query, $params);
        return($res);
    }
   
    public static function retrieveAll() {
        $db=DB::getDB();
        $query="SELECT * FROM grade ORDER BY id ASC";
       
        $res=$db->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS, "grade");
       
        return($res);
    }    
}