<?php

/**
 * Created by PhpStorm.
 * User: Emre
 * Date: 6.5.2017
 * Time: 11:28
 */


    class UserManagement
    {
        public static function getUsers(){
                require_once ("../DataLayer/connectiondb.php");
                require_once ("../LogicLayer/User.php");
                $conn= new connectiondb();
                $result = $conn->getDataTable( "select user_id, first_name, last_name, email from users ORDER by user_id ");

                $allUsers = array();

                while ($row = $result->fetch_assoc()){
                    $userObj = new User($row["user_id"],$row["first_name"],$row["last_name"],$row["email"]);
                    array_push($allUsers,$userObj);
                }
                 return $allUsers;

        }
        public static function insertNewUser($userFirstName,$userLastName,$userEmail,$userPassword) {
            require_once ("../DataLayer/connectiondb.php");
            $conn = new connectiondb();
            $success = $conn->executeQuery("INSERT INTO users(user_id, first_name, last_name,email,password,date_added) VALUES (NULL, '$userFirstName', '$userLastName', '$userEmail', '$userPassword',CURRENT_DATE )");
            return $success;
        }
        public static function deleteUser($userId) {
            require_once ("../DataLayer/connectiondb.php");
            $conn = new connectiondb();
            $success = $conn->executeQuery("DELETE FROM users WHERE user_id = '$userId'");
            return $success;
        }
        public static function editUser($userId,$userFirstName,$userLastName) {
            require_once ("../DataLayer/connectiondb.php");
            $conn = new connectiondb();
            $success = $conn->executeQuery("UPDATE users set first_name = '$userFirstName', last_name ='$userLastName' WHERE user_id='$userId'");
            return $success;
        }
        public static function getRow($userId){
            require_once ("../DataLayer/connectiondb.php");
            $conn = new connectiondb();
            $con = $conn->getConnection();
            $sql = "SELECT * FROM users WHERE user_id = '$userId'";
            $query = mysqli_query($con,$sql);
            $row = mysqli_fetch_row($query);
            return $row;
        }
        public static function login($email,$password){
            require_once ("../DataLayer/connectiondb.php");
            $conn = new connectiondb();
            $con = $conn->getConnection();
            $email = mysqli_real_escape_string($con,$email);
            $password = mysqli_real_escape_string($con,$password);
            $sql = "SELECT * FROM users WHERE email='$email' and password='$password'";
            $result = mysqli_query($con,$sql) or die(mysql_error());
            $rows = mysqli_num_rows($result);
            return $rows;
        }
    }


?>