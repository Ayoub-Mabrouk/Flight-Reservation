<?php
class UserController {
    public function getAllFlights(){
        $flights = Flight::getAll();
        return $flights;
    }
}