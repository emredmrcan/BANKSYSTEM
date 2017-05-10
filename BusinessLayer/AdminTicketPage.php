<?php
session_start();
require_once("../LogicLayer/TicketManagement.php");


    if(isset($_SESSION['adminEmail'])){
        if(isset($_POST["logout"])){

            header( "location: logout.php");
        }
    }
    else{
        echo "<script>
                    alert('Please Login Again!');
                    window.location.href='LoginAdmin.php';
                    </script>";
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <title>Bank System-Admin Page</title>
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
                <th><a class="brand" href="SignIn.php">Welcome to admin panel!</th> </a>
                <th><a class="brand" style="color: blue;" href="AdminMainPage.php">User List</a> </th>
                <th><a class="brand" style="color: blue" href="AdminTicketPage.php">Purchased Ticket List</a></th>
                <th><a class="brand" style="color: red; padding-left: 475px; href="href="../logout.php">Logout</a></th>
                <!--<input class="button btn btn-primary btn-large" type="submit" onclick="location.href='../logout.php';" value="Logout!"/>!-->
            </tr>


                </tbody></table>




        </div> <!-- /container -->

    </div> <!-- /navbar-inner -->

</div> <!-- /navbar -->
<div id="dvMain">
    <!--action="<?php $_PHP_SELF ?>-->
    <form method="POST" action="">
        <table id="tblUsers">
            <tbody>
            <tr>
                <th>Ticket_ID</th>
                <th>Customer Email</th>
                <th>Category</th>
                <th>Price</th>
                <th>Count</th>
            </tr>
            <?php

            $ticketList = TicketManagement::getTickets();
            for($i = 0; $i < count($ticketList); $i++) {
                ?>
                <tr>
                    <td><?php echo $ticketList[$i]->getTicketİd(); ?></td>
                    <td><?php echo $ticketList[$i]->getTicketCustomer(); ?></td>
                    <td><?php echo $ticketList[$i]->getTicketCategory(); ?></td>
                    <td><?php echo $ticketList[$i]->getTicketPrice(); ?></td>
                    <td><?php echo $ticketList[$i]->getTicketCount(); ?></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </form>
</div>
</body>
</html>

