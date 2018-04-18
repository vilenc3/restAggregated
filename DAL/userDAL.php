<?php
   require_once dirname(__FILE__)."/../DataAbstraction/DB.php";
 
class UserDAL {
    //put your code here
   
    public static function create($e) {
        $db=DB::getDB();
        $query="INSERT INTO user (username, password, email, isRestaurator)" . "VALUES (:username, :password, :email, :isRestaurator)";
        $params=[
          ':username' => $e->username,
          ':password'=> $e->password,
          ':email'=> $e->email,
          ':isRestaurator'=> $e->isRestaurator,
        ];
        echo 'Record added successfully';
        $res=$db->query($query, $params);
        return($res);
    }
 
    public static function delete($e){
        $db=DB::getDB();
        $query = ('DELETE FROM user WHERE id = :id');
        $db->query($query, [':id'=>$e->id]);
        echo 'Record deleted successfully';
    }
   
    public static function update($e){
        $db=DB::getDB();
        $query=('UPDATE user ' . 'SET  username=:username, password=:password, email=:email, isRestaurator=:isRestaurator, isAdmin=:isAdmin WHERE id = :id');
        $params=[
          ':username' => $e->username,
          ':password'=> $e->password,
          ':email'=> $e->email,
          ':isRestaurator'=> $e->isRestaurator,
          ':isAdmin'=> $e->isAdmin, 
        ];
       
        $res=$db->query($query, $params);
        return($res);
    }
   
    public static function retrieveAll() {
        $db=DB::getDB();
        $query="SELECT * FROM user ORDER BY id ASC";
       
        $res=$db->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS, "User");
       
        return($res);
    }
    public static function retrieveByLogin($e){
        $db=DB::getDB();
        $query="SELECT * FROM user WHERE username = :username AND password =:password";
        $params=[
          ':username' => $e->username,
          ':password' => $e->password,
        ];

        $res=$db->query($query, $params); 
       
        $res->setFetchMode(PDO::FETCH_CLASS, "user");
        $row=$res->fetch();
        if($row){
            $e->isAdmin=$row->isAdmin;
            $e->isRestaurator=$row->isRestaurator;
            $e->id=$row->id;
        }
        $takeIsAdmin=$e->isAdmin;
        $takeIsRestaurator=$e->isRestaurator;
        $takeID=$e->id;
        $res->closeCursor();
        
        $count=$res->rowCount();
   
           if ($count != 0){
            $_SESSION['username'] = $_POST["username"];
            $_SESSION['id'] = $takeID;
            $_SESSION['isAdmin'] = $takeIsAdmin;
            $_SESSION['isRestaurator'] = $takeIsRestaurator;
            $messageNOT = "Credits okay, logged in";
            echo "<script type='text/javascript'>alert('$messageNOT');</script>";
            header("Location: index.php"); /* Redirect browser */
           }
           else{
               $messageNOT = "Wrong data, please try again";
               echo "<script type='text/javascript'>alert('$messageNOT');</script>";
               }
            }    
}      

