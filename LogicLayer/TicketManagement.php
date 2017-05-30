<?php

/**
 * Created by PhpStorm.
 * User: Emre
 * Date: 6.5.2017
 * Time: 11:28
 */
session_start();


class TicketManagement
{
    public static function getTickets(){

        require_once ('../DataLayer/connectiondb.php');
        require_once ('../LogicLayer/Ticket.php');

        $conn= new connectiondb();
        $result = $conn->getDataTable("SELECT * FROM `ticketemail` ORDER BY ticket_id");

        $allTickets = array();

        //if ($result->num_rows <= 0 ) {
        if($result){
            while ($row = $result->fetch_assoc()) {
                $ticketObj = new Ticket($row["ticket_id"], $row["email"],$row["category"], $row["ticket_location"],$row["ticket_date"], $row["price"], $row["count"]);
                array_push($allTickets, $ticketObj);
            }
            return $allTickets;
        }
        else{
            echo "Isler istedigimiz gibi gitmedi :) Yine mi?";
            //throw new Exception("Database Error ");
        }
    }
    public static function purchasedTicket($email){
        require_once ("../DataLayer/connectiondb.php");
        require_once ("../LogicLayer/Ticket.php");
        $conn = new connectiondb();
        $result = $conn->getDataTable("SELECT * FROM ticketemail WHERE email='$email'");
        $allTickets = array();

        while ($row = $result->fetch_assoc()){
            $ticketObj = new Ticket($row["ticket_id"], $row["email"],$row["category"], $row["ticket_location"],$row["ticket_date"], $row["price"], $row["count"]);
            array_push($allTickets,$ticketObj);
        }
        return $allTickets;
    }
    public static function insertNewTicket($customer,$category,$location,$date,$price,$count) {
        require_once ("../DataLayer/connectiondb.php");
        $conn = new connectiondb();
        $customer2 = self::getCustomerId($customer);
        $success = $conn->executeQuery("INSERT INTO purchased_ticket(ticket_id, customer, category,ticket_location,ticket_date,price,count) VALUES (NULL, '$customer2', '$category', '$location', '$date','$price','$count' )");
        return $success;
    }
    public static function getCustomerId($email) {
        require_once ("../DataLayer/connectiondb.php");
        $conn = new connectiondb();
        $con = $conn->getConnection();
        $sql = "SELECT user_id FROM users WHERE email = '$email'";
        $query = mysqli_query($con,$sql);
        $row = mysqli_fetch_row($query);
        return $row;
    }
}


?>