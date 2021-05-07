<?php
if(isset($_POST['flight_id'])){
    $admin = new AdminController();
    $delete=$admin->delete_flight($_POST['flight_id']);
    Redirect::to('allflights');
}