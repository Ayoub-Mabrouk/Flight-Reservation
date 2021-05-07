<?php
if(isset($_POST['add_passenger'])){
    $new_reservation = new UserController();
    $new_reservation->reserveMulti($_POST['flight_id']);
Redirect::to('reserve');
}else {
    include('../views/includes/404.php');
}