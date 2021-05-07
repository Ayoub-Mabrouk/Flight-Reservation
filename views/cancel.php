<?php
if(isset($_POST['flight_id'])){
    $user = new UserController();
    $cancel=$user->cancel_reservation($_POST['flight_id']);
    Redirect::to('myreservations');
}