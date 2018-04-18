<?php
   require_once dirname(__FILE__)."/../DataAbstraction/DB.php";
 
class restaurantDAL {
    //put your code here
   
    public static function create($e) {
        $db=DB::getDB();
        $query="INSERT INTO restaurant ( name, description, phone, address, district_id)" . "VALUES (:name, :description, :phone, :address, :district_id)";
        $params=[
          ':name'=> $e->name,
          ':description'=> $e->description,
          ':phone'=> $e->phone,
          ':address'=> $e->address,
          ':district_id'=> $e->district_id
        ];
        echo 'Record added successfully';
        $res=$db->query($query, $params);
        return($res);
    }
 
    public static function delete($e){
        $db=DB::getDB();
        $query = ('DELETE FROM restaurant WHERE id = :id');
        $db->query($query, [':id'=>$e->id]);
        echo 'Record deleted successfully';
    }
   
    public static function update($e){
        $db=DB::getDB();
        $query=('UPDATE actor ' . 'SET  name=:name, description=:description, phone=:phone, address=:address, district_id=:district_id  WHERE id = :id');
        $params=[
          ':name'=> $e->name,
          ':description'=> $e->description,
          ':phone'=> $e->phone,
          ':address'=> $e->address,
          ':district_id'=> $e->district_id
        ];
       
        $res=$db->query($query, $params);
        return($res);
    }
   
    public static function retrieveAll() {
        $db=DB::getDB();
        $query="SELECT * FROM restaurant INNER JOIN grade ON restaurant.id = grade.restaurant_id ORDER BY restaurant.id ASC";
       
        $res=$db->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS, "restaurant");
       
        return($res);
    }    
    
    public static function retrieveByFilters($e){
        $db=DB::getDB();
        $query="SELECT * FROM restaurant INNER JOIN grade ON restaurant.id = grade.restaurant_id" ;
        $params=[];
        
        $cond=[];
        if(isset($e->name) && !empty($e->name)){
            $cond[]="name=':name'";
            $params[':name'] = $e->name;
        }
        if(isset($e->average_pricing) && !empty($e->average_pricing) ){
            $cond[]="average_pricing>=:average_pricing";
            $params[':average_pricing'] = $e->average_pricing;
        }
        if(isset($e->average_speed) && !empty($e->average_speed) ){
            $cond[]="average_speed>=:average_speed";
            $params[':average_speed']= $e->average_speed;
        }
        if(isset($e->average_presentation) && !empty($e->average_presentation) ){
            $cond[]="average_presentation>=:average_presentation";
            $params[':average_presentation']= $e->average_presentation;
        }
        if(isset($e->average_quality) && !empty($e->average_quality) ){
            $cond[]="average_quality>=:average_quality";
            $params[':average_quality']= $e->average_quality;
        }
        $cond_str=implode(" AND ", $cond);
        if(!empty($cond_str)){
            $query.=" WHERE ".$cond_str;
         }
        $res=$db->query($query, $params); 
        $res->setFetchMode(PDO::FETCH_CLASS, "restaurant");
        return($res);
    }

        public static function retrieveByType($e){
        $db=DB::getDB();
        $query="SELECT restaurant.id, restaurant.name FROM restaurant
            INNER JOIN restaurant_has_category ON restaurant.id = restaurant_has_category.restaurant_id
                INNER JOIN category ON category.id = restaurant_has_category.category_id
                    INNER JOIN grade ON restaurant.id = grade.restaurant_id
                    WHERE category.name = :type
                        ORDER BY average_pricing + average_speed + average_presentation + average_quality DESC ";
        $params=[
          ':type' => $e->type,
        ];
        
        $res=$db->query($query, $params); 
        $res->setFetchMode(PDO::FETCH_CLASS, "restaurant");
        return($res);
    }

    
    public static function retrieveByID($e){
        $db=DB::getDB();
        $query="SELECT restaurant.id, name, description, address, phone, disName, average_pricing, average_speed, average_presentation, average_quality FROM restaurant
                    INNER JOIN district ON restaurant.district_id = district.id
                        INNER JOIN grade ON restaurant.id = grade.restaurant_id
                  WHERE restaurant.id = :idRestaurant";
        $params=[
          ':idRestaurant' => $e->idRestaurant,
        ];
        
        $res=$db->query($query, $params); 
        $res->setFetchMode(PDO::FETCH_CLASS, "restaurant");
        $row=$res->fetch();
        if($row){
            $e->id = $row->id;
            $e->name = $row->name;
            $e->description = $row->description;
            $e->address=$row->address;
            $e->phone=$row->phone;
            $e->disName=$row->disName;
            $e->average_pricing=$row->average_pricing;
            $e->average_speed=$row->average_speed;
            $e->average_presentation=$row->average_presentation;
            $e->average_quality=$row->average_quality;
        }
        $res->closeCursor();
        return($row);
    }

        public static function retrieveReviews($e){
        $db=DB::getDB();
        $query="SELECT username, pricing, speed, presentation, quality, review.description "
                . "FROM review INNER JOIN restaurant ON restaurant.id=review.restaurant_id "
                . "INNER JOIN user ON review.user_id = user.id WHERE restaurant.id= :idRestaurant ORDER BY review.id DESC LIMIT 5";
        $params=[
          ':idRestaurant' => $e->idRestaurant,
        ];
        
        $res=$db->query($query, $params); 
        $res->setFetchMode(PDO::FETCH_CLASS, "restaurant");
        return($res);
    }
}