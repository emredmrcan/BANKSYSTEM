<?php

/**
 * Created by PhpStorm.
 * User: Emre
 * Date: 6.5.2017
 * Time: 11:28
 */


class AdminManagement
{
    public static function login($email,$password){
        require_once ("../DataLayer/connectiondb.php");
        $conn = new connectiondb();
        $con = $conn->getConnection();
        $email = mysqli_real_escape_string($con,$email);
        $password = mysqli_real_escape_string($con,$password);
        $sql = "SELECT * FROM admins WHERE email='$email' and password='$password'";
        $result = mysqli_query($con,$sql) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        return $rows;
    }
}


?>