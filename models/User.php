<?php
class User
{
    static public function login($user_email)
    {
        $user_email = strtolower($user_email);
        $sql = "select * from user where email='$user_email'";
        $stmt = Db::connect()->prepare($sql);
        $stmt->execute();
        $user = $stmt->fetch(pdo::FETCH_OBJ);
        return $user;
        $stmt = null;
    }


    static public function reserve($user_id, $flight_id, $roundtrip)
    {
        if ($roundtrip) {
            $sql = "insert into reservation  (user_id,flight_id,r_date)values('$user_id','$flight_id',CURRENT_TIMESTAMP())";
            $stmt = Db::connect()->prepare($sql);
            $stmt->execute();                                                                                                                                                                                              sleep(1);
            $sql = "insert into reservation  (user_id,flight_id,r_date)values('$user_id','$flight_id',CURRENT_TIMESTAMP())";
            $stmt = Db::connect()->prepare($sql);
            $stmt->execute();
            $stmt = null;
        } else {
            $sql = "insert into reservation  (user_id,flight_id,r_date)values('$user_id','$flight_id',CURRENT_TIMESTAMP())";
            $stmt = Db::connect()->prepare($sql);
            $stmt->execute();
            $stmt = null;
        }
    }
    static public function reserveMulti($user_id, $flight_id, $firstname, $lastname, $birthdate)
    {
        $db = Db::connect();
        $sql = "insert into reservation  (user_id,flight_id,r_date)values('$user_id','$flight_id',CURRENT_TIMESTAMP())";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        for ($i = 0; $i < count($firstname); $i++) {
            $date = date("y-m-d", strtotime($birthdate[$i]));
            $sql = "insert into passenger (user_id,flight_id,first_name,last_name,birth_date)values('$user_id','$flight_id','$firstname[$i]','$lastname[$i]','$date')";
            $stmt = $db->prepare($sql);
            $stmt->execute();
        }
    }

    static public function allreservations($id)
    {
        $sql = "Select f.flight_id,f.airline,f.depart,f.destination,f.f_Date,f.price  from flight f,reservation r where r.user_id='$id' and r.flight_id=f.flight_id ";
        $stmt = Db::connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }
    static public function cancel_reservation($user_id, $flight_id)
    {
        $sql = "delete from reservation where user_id='$user_id' and flight_id='$flight_id' ";
        $stmt = Db::connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }
    static public function register($data)
    {
        $sql = "insert into user(first_name,last_name,birth_date,email,password) values ( '$data[firstname]', '$data[lastname]', '$data[birthdate]', '$data[email]', '$data[password]' )";
        $stmt = Db::connect()->prepare($sql);
        $stmt->execute();
        $stmt = null;
    }
}
