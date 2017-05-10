<?php

require_once("../LogicLayer/UserManagement.php");
require_once ("../DataLayer/connectiondb.php");
session_start();
    if(isset($_SESSION['email'])) {
        if(isset($_POST["logout"])){

            header( "location: ../logout.php");
        }


    }
    else{
        echo "<script>
            alert('Please Login Again!');
            window.location.href='SignIn.php';
            </script>";
    }
   //****************************************************************WEB SERVİCE*******************************
/*if(isset($_POST['quantity'])){
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
    $count = $_POST['quantity'];
    //$id = 1;
    $stmt = $conn->prepare("SELECT ticket_id, customer, category FROM purchased_ticket WHERE ticket_id=?");
    $stmt->bind_param("s", $count); // si: string integer
    $stmt->execute();
    $stmt->bind_result($id, $customer, $category);

    $tickets = array();
    while ($stmt->fetch()) {
        array_push( $tickets, array("TicketId"=>$id, "Customer"=>$customer, "Category"=>$category) );
    }

    $stmt->close(); // close statement

    // if($format == 'json') { // JSON output
    header('Content-type: application/json');
    echo json_encode(array('tickets'=>$tickets));
    // }
    //$conn->close(); // close DB connection
}*/
    //*****************************************************************************************************************
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <title>Bank System-Main Page</title>
    <link rel="stylesheet" type="text/css" href="/banksystem/css/table.css">   <!-- !-->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link href="/banksystem/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/banksystem/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />

    <link href="/banksystem/css/font-awesome.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">

    <link href="/banksystem/css/style.css" rel="stylesheet" type="text/css">
    <link href="/banksystem/css/pages/signin.css" rel="stylesheet" type="text/css">
    <style>
        #error-msg{ display:none }
        #success-msg{ display:none }
    </style>

</head>
<body>
<div class="navbar navbar-fixed-top">

    <div class="navbar-inner">

        <div class="container">
            <table><tbody>
                <tr>
                    <th><a class="brand" href="UserMainPage.php">Welcome to Bank System!</a></th>
                    <th><a class="brand" style="color: blue;" href="UserMainPage.php">Buy Ticket</a> </th>
                    <th><a class="brand" style="color: blue" href="#">Purchased Tickets</a></th>
                    <th><a class="brand" style="color: red; padding-left: 350px;" href="Contact.php">Contact</a></th>
                    <th><a class="brand" style="color: red; padding-left: 10px;" href="../logout.php">Logout</a></th>
                </tr>

                </tbody></table>
        </div> <!-- /container -->

    </div> <!-- /navbar-inner -->

</div> <!-- /navbar -->
<div id="dvMain">
    <!--action="<?php $_PHP_SELF ?>-->
    <form method="POST" action="users.php">
        <table id="tblUsers">
            <tbody>
            <tr>
                <th>E-mail</th>
                <th>Category</th>
                <th>Location</th>
                <th>Date</th>
                <th>Price</th>
                <th>Count</th>
            </tr>
            <tr>
                <th>ardam368@hotmail.com</th>
                <th>Concert</th>
                <th>Sabancı Kültür Merkezi</th>
                <th>06/06/2017</th>
                <th>30.00</th>
                <th><form action="users.php.php">
                        <input type="number" name="quantity" min="1" max="10">
                        <input type="submit" name="send" value="Send">
                    </form></th>
            </tr>
           <!-------------------------------------------------------WEB SERVICES-------------------------------------------------------!-->
            <script>
                // JQuery
                $(document).ready(function() { // when DOM is ready, this will be executed

                    $("#send").click(function(e) { // click event for "btnCallSrvc"
                        var retType = "json";
                        //var count = $("#txtNum").val(); // get desired country count

                        $.ajax({ // start an ajax POST
                            type	: "post",
                            url		: "users.php",
                            data	:  {
                                "code"	: 35,
                                "format": retType,
                                "num"	: 10
                            },
                            error   : function(err) { // some unknown error happened
                                console.log(err);
                                alert(" There is an error! Please try again. " + err);
                            }
                        });

                    });

                });
            </script>
            </tbody>
        </table>
    </form>
</div>
</body>
</html>

