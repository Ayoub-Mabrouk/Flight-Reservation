<?php
if(isset($_POST['submit'])){
    $flight=new AdminController();
    $flight->add_flight($_POST);
    Redirect::to('allflights');
     
}


