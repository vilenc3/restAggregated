<?php
   require_once dirname(__FILE__)."/../DataAbstraction/DB.php";
 
class user_has_restaurantDAL {
    //put your code here
   
    public static function create($e) {
        $db=DB::getDB();
        $query="INSERT INTO user_has_restaurant ( user_id,restaurant_id)" . "VALUES (:user_id, :restaurant_id)";
        $params=[
          ':user_id'=> $e->user_id,
          ':restaurant_id'=> $e->restaurant_id
        ];
        echo 'Record added successfully';
        $res=$db->query($query, $params);
        return($res);
    }
 
    public static function delete($e){
        $db=DB::getDB();
        $query = ('DELETE FROM user_has_restaurant WHERE user_id = :user_id');
        $db->query($query, [':user_id'=>$e->user_id]);
        echo 'Record deleted successfully';
    }
   
    public static function update($e){
        $db=DB::getDB();
        $query=('UPDATE user_has_restaurant ' . 'SET user_id=:user_id,  restaurant_id=:restaurant_id, WHERE user_id = :user_id');
        $params=[
          ':restaurant_id' => $e->restaurant_id,
        ];
       
        $res=$db->query($query, $params);
        return($res);
    }
   
    public static function retrieveAll() {
        $db=DB::getDB();
        $query="SELECT * FROM user_has_restaurant ORDER BY user_id ASC";
       
        $res=$db->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS, "user_has_restaurant");
       
        return($res);
    }    

    public static function retrieveOwner($e){ 
        $db=DB::getDB();
        $query="SELECT user_id, restaurant_id FROM user_has_restaurant WHERE user_id = :user_id ";
        $params=[
          ':user_id' => $e->user_id,
        ];

        $res=$db->query($query, $params); 
       
        $res->setFetchMode(PDO::FETCH_CLASS, "user_has_restaurant");
        $row=$res->fetch();
        if($row){
            $e->restaurant_id=$row->restaurant_id;
        }
        $takeRestaurantID=$e->restaurant_id;
        $res->closeCursor();
        $_SESSION['idRestaurant'] = $takeRestaurantID;
    }
}