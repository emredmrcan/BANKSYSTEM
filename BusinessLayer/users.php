<?php
require_once ("../DataLayer/connectiondb.php");
session_start();
//****************************************************************WEB SERVİCE*******************************
if(isset($_POST['quantity'])){
    // connect DB
    /*$servername = "localhost";
    $username = "root";
    $password = "12345678";
    $dbname = "bank_system";*/

     $servername = "mysql.hostinger.web.tr";
     $username = "u489359084_emre";
     $password = "2012510016";
     $dbname = "u489359084_bank";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection error: " . $conn->connect_error);
    }
    $conn->set_charset("utf8");
    $format = "json"; // json is the default
    //$id = 1;
    $quantity = $_POST['quantity'];
    $stmt = $conn->prepare("SELECT ticket_id, customer, category,count FROM purchased_ticket WHERE ticket_id=?");
    $stmt->bind_param("i", $quantity); // si: string - integer
    $stmt->execute();
    $stmt->bind_result($ticketid, $customer, $category,$count);
    $tickets = array();
    while ($stmt->fetch()) {
        array_push( $tickets, array("TicketId"=>$ticketid, "Customer"=>$customer, "Category"=>$category,"Count"=>$count));
    }
    $stmt->close(); // close statement
    if($format == 'json') { // JSON output
        header('Content-type: application/json');
        $arr = json_encode(array('tickets' => $tickets));
    }

    file_put_contents("ticket.txt", "");
    $file = 'ticket.txt';
    $içerik = file_get_contents($file);
    $içerik = $arr;
    file_put_contents($file, $içerik);

    header( "location: UserCreditInfo.php");

    $conn->close(); // close DB connection

}
/*$json_url = file_get_contents('http://194.27.102.207/WebServiceLayer/Airport_Json.php');
$obj = json_decode($json_url,true);
$item = $obj;
$fligtnumber = $item['FlightNumber'];
echo $fligtnumber;*/

//*****************************************************************************************************************
?>
