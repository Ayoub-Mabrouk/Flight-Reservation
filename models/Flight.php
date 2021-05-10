<?php
class Flight
{
    static public function getAll()
    {
        $stmt = Db::connect()->prepare('Select * from flight');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }
    static public function searchflight($place)
    {
        $stmt = Db::connect()->prepare("Select * from flight where depart like '%$place%' or destination like '%$place%' ");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }
    static public function delete_flight($flight_id)
    {
        $sql = "delete from flight where flight_id=$flight_id";
        $stmt = Db::connect()->prepare($sql);
        $stmt->execute();
        $stmt = null;
    }
    static public function edit_flight($flight_id, $airline, $depart, $destination, $date, $price, $capacity)
    {
        $sql = "UPDATE flight
        SET airline='$airline', depart='$depart',destination='$destination',f_Date='$date',price='$price',capacity='$capacity'
        WHERE flight_id='$flight_id'";
        $stmt = Db::connect()->prepare($sql);
        $stmt->execute();
        $stmt = null;
    }
    static public function add_flight($data)
    {
        $date=date("y-m-d h:i:s", strtotime($data['date']));  
        $sql = "insert into flight( airline, depart, destination, f_date, price, capacity ) values( '$data[airline]', '$data[depart]', '$data[destination]', '$date', '$data[price]', '$data[capacity]' )";
        $stmt = Db::connect()->prepare($sql);
        $stmt->execute();
        $stmt = null;
    }
    static public function allreservations(){
        $stmt = Db::connect()->prepare('SELECT u.first_name, u.last_name, airline,depart,destination,f_Date,price,capacity from flight f,reservation r,user u where f.flight_id=r.flight_id and u.user_id=r.user_id');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }
}
