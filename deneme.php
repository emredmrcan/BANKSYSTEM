<?php
//require_once("LogicLayer/TicketManagement.php");
require_once ("DataLayer/connectiondb.php");
session_start();
//****************************************************************WEB SERVİCE*******************************
if(isset($_POST['quantity'])){
    // connect DB
    $servername = "localhost";
    $username = "root";
    $password = "12345678";
    $dbname = "bank_system";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection error: " . $conn->connect_error);
    }
    $conn->set_charset("utf8");
    $format = "json"; // json is the default
    $id = 1;
    $quantity = $_POST['quantity'];
    $stmt = $conn->prepare("SELECT ticket_id, customer, category,count FROM purchased_ticket WHERE ticket_id=?");
    $stmt->bind_param("i", $id); // si: string - integer
    $stmt->execute();
    $stmt->bind_result($ticketid, $customer, $category,$count);
    $tickets = array();
    while ($stmt->fetch()) {
        array_push( $tickets, array("TicketId"=>$ticketid, "Customer"=>$customer, "Category"=>$category,"Count"=>$count));
    }
    $stmt->close(); // close statement
    if($format == 'json') { // JSON output
        header('Content-type: application/json');
        echo json_encode(array('tickets'=>$tickets));
    }
    $conn->close(); // close DB connection
}
//*****************************************************************************************************************
?>