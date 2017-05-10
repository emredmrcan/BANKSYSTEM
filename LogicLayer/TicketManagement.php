<?php

/**
 * Created by PhpStorm.
 * User: Emre
 * Date: 6.5.2017
 * Time: 11:28
 */
session_start();
require_once ('../DataLayer/connectiondb.php');
require_once ('../LogicLayer/Ticket.php');

class TicketManagement
{
    public static function getTickets(){

        $conn= new connectiondb();
        $query = "select * from purchased_ticket ORDER by ticked_id";
        $result = $conn->getDataTable($query);
        $allTickets = array();

        //if ($result->num_rows <= 0 ) {
            while ($row = $result->fetch_assoc()) {
                $ticketObj = new Ticket($row["ticket_id"], $row["customer"],$row["category"], NULL,NULL, $row["price"], $row["count"]);
                array_push($allTickets, $ticketObj);
            }
            return $allTickets;
        //}
    }
    /*public static function insertNewUser($userFirstName,$userLastName,$userEmail,$userPassword) {
        $conn = new connectiondb();
        $success = $conn->executeQuery("INSERT INTO users(user_id, first_name, last_name,email,password,date_added) VALUES (NULL, '$userFirstName', '$userLastName', '$userEmail', '$userPassword',CURRENT_DATE )");
        return $success;
    }
    public static function deleteUser($userId) {
        $conn = new connectiondb();
        $success = $conn->executeQuery("DELETE FROM users WHERE user_id = '$userId'");
        return $success;
    }
    public static function editUser($userId,$userFirstName,$userLastName) {
        $conn = new connectiondb();
        $success = $conn->executeQuery("UPDATE users set first_name = '$userFirstName', last_name ='$userLastName' WHERE user_id='$userId'");
        return $success;
    }
    public static function getRow($userId){
        $conn = new connectiondb();
        $con = $conn->getConnection();
        $sql = "SELECT * FROM users WHERE user_id = '$userId'";
        $query = mysqli_query($con,$sql);
        $row = mysqli_fetch_row($query);
        return $row;
    }
    public static function login($email,$password){
        $conn = new connectiondb();
        $con = $conn->getConnection();
        $email = mysqli_real_escape_string($con,$email);
        $password = mysqli_real_escape_string($con,$password);
        $sql = "SELECT * FROM users WHERE email='$email' and password='$password'";
        $result = mysqli_query($con,$sql) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        return $rows;
    }*/
}


?>