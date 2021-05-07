<?php
class Admin {
    static public function login($admin_email)
    {
        $admin_email = strtolower($admin_email);
        $sql = "select * from admin where email='$admin_email'";
        $stmt = Db::connect()->prepare($sql);
        $stmt->execute();
       $admin= $stmt->fetch(pdo::FETCH_OBJ);
        return $admin;
        $stmt = null;
        

    }
}