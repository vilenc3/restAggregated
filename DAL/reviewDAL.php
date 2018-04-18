<?php
   require_once dirname(__FILE__)."/../DataAbstraction/DB.php";
 
class reviewDAL {
    //put your code here
   
    public static function create($e) {
        $db=DB::getDB();
        $query="INSERT INTO review ( pricing, speed, presentation, quality, description, restaurant_id, user_id)" . "VALUES ( :pricing, :speed, :presentation, :quality, :description, :restaurant_id, :user_id)";
        $params=[
          ':pricing'=> $e->pricing,
          ':speed'=> $e->speed,
          ':presentation'=> $e->presentation,
          ':quality'=> $e->quality,
          ':description'=> $e->description,
          ':restaurant_id'=> $e->restaurant_id,
          ':user_id'=> $e->user_id
        ];
        $message = "Your review has been added successfully, thank you!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        $res=$db->query($query, $params);
        return($res);
    }
 
    public static function delete($e){
        $db=DB::getDB();
        $query = ('DELETE FROM review WHERE id = :id');
        $db->query($query, [':id'=>$e->id]);
        echo 'Record deleted successfully';
    }
   
    public static function update($e){
        $db=DB::getDB();
        $query=('UPDATE review ' . 'SET  pricing=:pricing, speed=:speed, presentation=:presentation, quality=:quality, description=:description, restaurant_id=:restaurant_id, user_id=:user_id WHERE id = :id');
        $params=[
          ':pricing' => $e->pricing,
          ':speed'=> $e->speed,
          ':presentation'=> $e->presentation,
          ':quality'=> $e->quality,
          ':description'=> $e->description, 
          ':restaurant_id'=> $e->restaurant_id,
          ':user_id'=> $e->user_id,
        ];
       
        $res=$db->query($query, $params);
        return($res);
    }
   
    public static function retrieveAll() {
        $db=DB::getDB();
        $query="SELECT * FROM review ORDER BY id ASC";
       
        $res=$db->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS, "review");
       
        return($res);
    }    
}