<?php
// require_once '../app/classes/Redirect.php';
class UserController
{
        public function auth()
        {
                if (isset($_POST['submit'])) {
                        $user_email = $_POST['email'];
                        $password = $_POST['password'];
                        $role = $_POST['role'];
                        if ($role == 'user') {
                                $user = User::login($user_email);
                                if (!empty($user)) {
                                        if ($user->email == $user_email && $user->password == $password) {
                                                $_SESSION['user_logged'] = true;
                                                $_SESSION['id'] = $user->user_id;
                                                $_SESSION['email'] = $user->email;
                                                $_SESSION['first_name'] = $user->first_name;
                                                $_SESSION['last_name'] = $user->last_name;
                                                Redirect::to('home');
                                        } else {
                                                Redirect::to('login');
                                        }
                                }
                        } else {
                        }
                }
        }
        public function reserve($user_id, $flight_id,$roundtrip)
        {
                $reservation = User::reserve($user_id, $flight_id,$roundtrip);
        }
        public function reserveMulti($flight_id){
                $firstname=$_POST['firstname'];
                $lastname=$_POST['lastname'];
                $birthdate=$_POST['birthdate'];
                $reservation = User::reserveMulti($_SESSION['id'], $flight_id,$firstname,$lastname,$birthdate);
        }
        public function myreservations()
        {
                $reservations = User::allreservations($_SESSION['id']);
                return $reservations;
        }
        public function cancel_reservation($flight_id)
        {
                $cancel = User::cancel_reservation($_SESSION['id'], $flight_id);
        }
        public function register($data){
                $user=User::register($data);
        }
}
