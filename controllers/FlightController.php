<?php
class FlightController {
    public function getAllFlights(){
        $flights = Flight::getAll();
        return $flights;
    }
    public function searchflight($place){
$flights= Flight::searchflight($place);
return $flights;
    }
}