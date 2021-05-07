<?php
require_once './app/classes/Redirect.php';
class AdminController
{
    public function index($page)
    {
        include('views/dashboard.php');
    }
    public function auth()
    {
        if (isset($_POST['submit'])) {
            $admin_email = $_POST['email'];
            $password = $_POST['password'];
            $role = $_POST['role'];
            if ($role == 'admin') {
                $admin = Admin::login($admin_email);
                if (!empty($admin)) {
                    if ($admin->email == $admin_email && $admin->password == $password) {
                        $_SESSION['admin'] = true;
                        $_SESSION['id'] = $admin->admin_id;
                        $_SESSION['email'] = $admin->email;
                        $_SESSION['first_name'] = $admin->first_name;
                        $_SESSION['last_name'] = $admin->last_name;
                        Redirect::to('dashboard');
                    } else {
                        Redirect::to('login');
                    }
                }
            } else {
            }
        }
    }
    public function delete_flight($flight_id){
        $fligth= Flight::delete_flight($flight_id);
    }
    public function edit_flight($flight_id,$airline,$depart,$destination,$date,$price,$capacity){
        $flight=Flight::edit_flight($flight_id,$airline,$depart,$destination,$date,$price,$capacity);
    }
    public function add_flight($data){     
        $fligth= Flight::add_flight($data);
    }
}
