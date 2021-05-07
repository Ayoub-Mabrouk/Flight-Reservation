<?php
require_once './autoload.php';
$home = new HomeController();

$pages = ['home','edit-flight','reservemulti','allflights','register','addflight','search', 'admin','dashboard', 'myreservations', 'login', 'np', 'logout', 'reserve', 'add', 'update','cancel', 'delete-flight'];
if (isset($_GET['page'])) {
    if (in_array($_GET['page'], $pages)) {
        $page = $_GET['page'];
        if ($page == "admin" || $page ==  'admin/dashboard') {
            $admin = new AdminController();
            $admin->index($page);
        } else {            
            $home->index($page);
        }
    } else {
        include('views/includes/404.php');
    }
} else {
    $home->index('home');
}
