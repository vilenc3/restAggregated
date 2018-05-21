<?php
   require_once dirname(__FILE__)."/../DataAbstraction/DB.php";
 
class reservationsDAL {
   
    public static function create($e) {
        $db=DB::getDB();
        $query="INSERT INTO reservations ( idUser, idRestaurant, date, time, numberPpl, comments, status)" . "VALUES ( :idUser, :idRestaurant, :date, :time, :numberPpl, :comments, :status)";
        $params=[
          ':idUser'=> $e->idUser,
          ':idRestaurant'=> $e->idRestaurant,
          ':date'=> $e->date,
          ':time'=> $e->time,
          ':numberPpl'=> $e->numberPpl,
          ':comments'=> $e->comments,
          ':status'=> $e->status
        ];
        $res=$db->query($query, $params);
        return($res);
    }

    public static function update($e){
        $db=DB::getDB();
        $query=('UPDATE reservations ' . 'SET  status=:status WHERE idReserv = :idReserv
          ');
        $params=[
          ':status' => $e->status,
          ':idReserv'=> $e->idReserv,
        ];
       
        $res=$db->query($query, $params);
        return($res);
    }


        public static function retrieveAll() {
        $db=DB::getDB();
        $query="SELECT * FROM reservations ORDER BY idReserv ASC";
       
        $res=$db->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS, "reservations");
       
        return($res);
    }    

        public static function retrieveByUserID($e){
        $db=DB::getDB();
        $query="SELECT name, phone, date, time, numberPpl, comments, CASE WHEN status = 1 THEN 'Pending' WHEN status = 2 THEN 'Rejected' WHEN status = 3 THEN 'Accepted!' END AS status FROM reservations
          INNER JOIN restaurant ON reservations.idRestaurant = restaurant.id
            INNER JOIN user ON reservations.idUser = user.id
                    WHERE idUser= :idUser ORDER BY idReserv DESC";
        $params=[
          ':idUser' => $e->idUser,
        ];
        
        $res=$db->query($query, $params); 
        $res->setFetchMode(PDO::FETCH_CLASS, "reservations");
        return($res);
    }




        public static function retrieveByRestID($e){
        $db=DB::getDB();
        $query="SELECT idReserv, username, email, date, time, numberPpl, comments, CASE WHEN status = 1 THEN 'Pending' WHEN status = 2 THEN 'Rejected' WHEN status = 3 THEN 'Accepted!' END AS status FROM reservations
          INNER JOIN restaurant ON reservations.idRestaurant = restaurant.id
            INNER JOIN user ON reservations.idUser = user.id
                    WHERE idRestaurant = 3 ORDER BY idReserv DESC";
        $params=[
          ':idRestaurant' => $e->idRestaurant,
        ];
        
        $res=$db->query($query, $params); 
        $res->setFetchMode(PDO::FETCH_CLASS, "reservations");
        return($res);
    }

  }