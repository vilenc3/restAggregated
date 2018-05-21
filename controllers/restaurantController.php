<?php
require_once dirname(__FILE__).'/../BL/restaurant.php';
require_once dirname(__FILE__).'/../BL/review.php';
require_once dirname(__FILE__).'/../BL/reservations.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RestaurantController
 *
 * @author Rafał Tokarski
 */
class restaurantController {
    public static function process(){
        if(isset($_POST['create-restaurant'])){
            self::createRestaurant();
        }
        if(isset($_POST['delete-restaurant'])){
            self::deleteRestaurant();
        }
        if(isset($_POST['update-restaurant'])){
            self::updateRestaurant();
        }
        if(isset($_POST['review-restaurant'])){
            self::reviewRestaurant();
        }
        if(isset($_POST['reserve-restaurant'])){
            self::reserveRestaurant();
        }
        if(isset($_POST['accept-reservation'])){
            self::acceptReservation();
        }
        if(isset($_POST['decline-reservation'])){
            self::declineReservation();
        }         
}

    public static function createRestaurant(){
        $restaurant = new restaurant();
        $restaurant->name=$_POST['name'];
        $restaurant->description=$_POST['description'];
        $restaurant->phone=$_POST['phone'];
        $restaurant->address=$_POST['address'];
        $restaurant->district_id=$_POST['district_id'];
        #$restaurant->isSponsored=$_POST['isSponsored'];
        $restaurant->create();
    }

    public static function deleteRestaurant(){
        $restaurant = new restaurant();
        $restaurant->id=$_POST['id'];
        $restaurant->delete();
    }

    public static function updateRestaurant(){
        $restaurant = new restaurant();
        $restaurant->id=$_POST['id'];
        $restaurant->name=$_POST['name'];
        $restaurant->description=$_POST['description'];
        $restaurant->phone=$_POST['phone'];
        $restaurant->address=$_POST['address'];
        $restaurant->district_id=$_POST['district_id'];
        $restaurant->update();
    }
    
        public static function reviewRestaurant(){
        $review = new review();
        $review->pricing=$_POST['pricing'];
        $review->speed=$_POST['speed'];
        $review->presentation=$_POST['presentation'];
        $review->quality=$_POST['quality'];   
        $review->description=$_POST['description'];
        $review->restaurant_id=$_POST['restaurant_id'];
        $review->user_id=$_POST['user_id'];
        $review->create();
    }

    public static function reserveRestaurant(){
        $reservations = new reservations();
        $reservations->idUser=$_POST['idUser'];
        $reservations->idRestaurant=$_POST['idRestaurant'];
        $reservations->date=$_POST['date'];   
        $reservations->time=$_POST['time'];
        $reservations->numberPpl=$_POST['numberPpl'];
        $reservations->comments=$_POST['comments'];
        $reservations->status=$_POST['status'];
        $reservations->create();
    }

    public static function acceptReservation(){
        $reservations = new reservations();
        $reservations->idReserv=$_POST['idReserv'];
        $reservations->status=$_POST['status'];
        $reservations->update();
    }

    public static function declineReservation(){
        $reservations = new reservations();
        $reservations->idReserv=$_POST['idReserv'];
        $reservations->status=$_POST['status'];
        $reservations->update();
    }


}
