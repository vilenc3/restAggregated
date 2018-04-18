<?php
   require_once dirname(__FILE__)."/../DataAbstraction/DB.php";
 
class user_has_favouriteDAL {
    //put your code here
   
    public static function create($e) {
        $db=DB::getDB();
        $query="INSERT INTO user_has_favourite ( user_id, category_id)" . "VALUES (:user_id, :category_id)";
        $params=[
          ':user_id'=> $e->user_id,
          ':category_id'=> $e->category_id
        ];
        echo 'Record added successfully';
        $res=$db->query($query, $params);
        return($res);
    }
 
    public static function delete($e){
        $db=DB::getDB();
        $query = ('DELETE FROM user_has_favourite WHERE user_id = :user_id');
        $db->query($query, [':user_id'=>$e->user_id]);
        echo 'Record deleted successfully';
    }
   
    public static function update($e){
        $db=DB::getDB();
        $query=('UPDATE user_has_favourite ' . 'SET user_id=:user_id,  category_id=:category_id, WHERE user_id = :user_id');
        $params=[
          ':user_id'=> $e->user_id,
          ':category_id' => $e->category_id,
        ];
       
        $res=$db->query($query, $params);
        return($res);
    }
   
    public static function retrieveAll() {
        $db=DB::getDB();
        $query="SELECT * FROM user_has_favourite ORDER BY user_id ASC";
       
        $res=$db->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS, "user_has_favourite");
       
        return($res);
    }    
}