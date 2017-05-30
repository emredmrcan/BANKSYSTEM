<?php
session_start();
require_once("../LogicLayer/TicketManagement.php");


if(isset($_SESSION['email'])){
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
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <title>Bank System-User Purchased Ticket Page</title>
    <link rel="stylesheet" type="text/css" href="../css/table.css">   <!-- !-->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

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
<div id="dvMain">
    <!--action="<?php $_PHP_SELF ?>-->
    <form method="POST" action="">
        <table id="tblUsers">
            <tbody>
            <tr>
                <th>Ticket_ID</th>
                <th>Customer Email</th>
                <th>Category</th>
                <th>Location</th>
                <th>Date</th>
                <th>Price</th>
                <th>Count</th>
            </tr>
            <?php
            $ticketList = TicketManagement::purchasedTicket($_SESSION['email']);
            for($i = 0; $i < count($ticketList); $i++) {
                ?>
                <tr>
                    <td><?php echo $ticketList[$i]->getTicketİd(); ?></td>
                    <td><?php echo $ticketList[$i]->getTicketCustomer(); ?></td>
                    <td><?php echo $ticketList[$i]->getTicketCategory(); ?></td>
                    <td><?php echo $ticketList[$i]->getTicketLocation(); ?></td>
                    <td><?php echo $ticketList[$i]->getTicketDate(); ?></td>
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

