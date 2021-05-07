<?php
class Db
{
    static public function connect()
    {
        $db = new PDO("mysql:host=localhost;dbname=flight_reservation", "root", "toor123");
        $db->exec("set names utf8");
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING); 
        return $db;
    }
}
