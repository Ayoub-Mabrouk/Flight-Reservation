<?php
if(isset($_POST['submit'])){
    if(isset($_POST['flight_id'])){
    $admin = new AdminController();
    $edit=$admin->edit_flight($_POST['flight_id'],$_POST['airline'],$_POST['depart'],$_POST['destination'],$_POST['date'],$_POST['price'],$_POST['capacity']);
    Redirect::to('allflights');
}
}
