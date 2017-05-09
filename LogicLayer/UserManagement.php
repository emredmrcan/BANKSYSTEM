<?php

/**
 * Created by PhpStorm.
 * User: Emre
 * Date: 6.5.2017
 * Time: 11:28
 */
    require_once ("D:\AppServ\www\banksystem\DataLayer\connectiondb.php");
    require_once ("D:\AppServ\www\banksystem\LogicLayer\User.php");

    class UserManagement
    {
        public static function getUsers(){
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
            $conn = new connectiondb();
            $success = $conn->executeQuery("INSERT INTO users(user_id, first_name, last_name,email,password,date_added) VALUES (NULL, '$userFirstName', '$userLastName', '$userEmail', '$userPassword',CURRENT_DATE )");
            return $success;
        }
        /*public static function deleteUser($userId) {
            $conn = new connectiondb();
            $success = $conn->executeQuery("DELETE FROM users WHERE user_id = '$userId'");
            return $success;
        }*/
        public static function editUser($userId,$userFirstName,$userLastName) {
            $conn = new connectiondb();
            $success = $conn->executeQuery("UPDATE users set first_name = '$userFirstName', last_name ='$userLastName' WHERE user_id='$userId'");
            return $success;
        }
    }


?>