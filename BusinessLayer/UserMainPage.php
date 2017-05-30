<?php

require_once("../LogicLayer/UserManagement.php");
require_once ("../DataLayer/connectiondb.php");
session_start();

echo "quantity1 : ".$_POST['quantity'];

    if(isset($_SESSION['email']) || isset($_POST['takeTicket'])) {
        echo "quantity2 : ".$_POST['quantity'];
        if(isset($_POST['takeTicket'])){
            $json_url = file_get_contents('http://tiyatrodunyasi.tk/PresentationLayer/webService.txt');
            //echo $json_url;
            $obj = json_decode($json_url,true);
            $item = $obj;
            //echo "quantity : ".$_POST['quantity'];
            $category = "Theatre";
            $count = $_POST['quantity'];
            $tName = $item['activities'][0]['name'];
            $tEmail = $item['activities'][0]['email'];
            $_SESSION['email'] = $tEmail;
            $tDate = $item['activities'][0]['date'];
            $tPlace = $item['activities'][0]['place'];
            $tPrice = $item['activities'][0]['price'];
            $_SESSION['count'] = $count;
            $_SESSION['takeTicket'] = $_POST['takeTicket'];
        }

        if(isset($_POST["logout"])){

            header( "location: ../logout.php");
        }
    }
    else{
        echo "<script>
            alert('Please Login Again!');
            window.location.href='../index.php';
            </script>";
    }



    //*****************************************************************************************************************
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <title>Bank System-Main Page</title>
    <link rel="stylesheet" type="text/css" href="../css/table.css">   <!-- !-->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />

    <link href="../css/font-awesome.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">

    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <link href="../css/signin.css" rel="stylesheet" type="text/css">
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
                    <th><a class="brand" style="color: blue" href="UserPurchasedTicketPage.php">Purchased Tickets</a></th>
                    <th><a class="brand" style="color: red; padding-left: 330px;" href="Contact.php">Contact</a></th>
                    <th><a class="brand" style="color: red; padding-left: 10px;" href="UserAbout.php">About</a></th>
                    <th><a class="brand" style="color: red; padding-left: 10px;" href="../logout.php">Logout</a></th>
                </tr>

                </tbody></table>
        </div> <!-- /container -->

    </div> <!-- /navbar-inner -->

</div> <!-- /navbar -->
<div class="container">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="../img/SlideShowUser/Lviv1.jpg" alt="Lviv" style="width:100%;">
            </div>

            <div class="item">
                <img src="../img/SlideShowUser/Lviv2.jpg" alt="Lviv" style="width:100%;">
            </div>

            <div class="item">
                <img src="../img/SlideShowUser/Rome.jpg" alt="Rome" style="width:100%;">
            </div>

            <div class="item">
                <img src="../img/SlideShowUser/snowboard.jpg" alt="Snowboard" style="width:100%;">
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<div id="dvMain">
    <!--action="<?php $_PHP_SELF ?>-->
   <!-- <form method="POST" action="http://tiyatrodunyasi.tk/LogicLayer/reservation.php">!-->
    <!--user.php!-->
    <form method="POST" action="users.php">
    <!--  http://tiyatodunyasi.tk/blabla.php  !-->
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
                <th><?php echo $tEmail;?></th>
                <th><?php echo $tName; ?></th>
                <th><?php echo $tPlace; ?></th>
                <th><?php echo $tDate; ?></th>
                <th><?php echo $tPrice; ?></th>
                <th><form method="post" action="users.php">
                        <input type="number" name="quantity" min="1" max="10">
                        <input type="submit" name="send" value="Send">
                    </form></th>
            </tr>
           <!-------------------------------------------------------WEB SERVICES-------------------------------------------------------!-->
            </tbody>
        </table>
    </form>
</div>
</body>
</html>

