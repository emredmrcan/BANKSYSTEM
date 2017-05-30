<?php

require_once("../LogicLayer/UserManagement.php");
require_once ("../DataLayer/connectiondb.php");
session_start();
if(isset($_SESSION['email'])) {


    $userLogin = UserManagement::about($_SESSION['email']);

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

if(isset($_POST['btn-change'])) {

    $error = "";
    $first_name = "";
    $last_name = "";


        $new_name = trim($_POST["userName"]);
        $new_surname = trim($_POST["userSurname"]);
        $email = trim($_POST["userEmail"]);
        $password = trim($_POST["userPassword"]);
        if($password != ""){

            $success = UserManagement::editAbout($email, $new_name, $new_surname,$password);
        }
        else{
            echo "<script>
            alert('Please Confirm Your Password!');          
            </script>";
        }


        if ($success) {

            header('Refresh:0; UserAbout.php');
        }


}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <!-- <meta http-equiv="content-type" content="text/html;charset=utf-8">!-->
    <title>Bank System-About Page</title>
    <link rel="stylesheet" type="text/css"  href="../css/table.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">

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
                    <th><a class="brand" style="color: red; padding-left: 300px;" href="Contact.php">Contact</a></th>
                    <th><a class="brand" style="color: red; padding-left: 10px;" href="UserAbout.php">About</a></th>
                    <th><a class="brand" style="color: red; padding-left: 10px;" href="../logout.php">Logout</a></th>
                </tr>

                </tbody></table>
        </div> <!-- /container -->

    </div> <!-- /navbar-inner -->

</div> <!-- /navbar -->
<div class="account-container register">

    <div class="content clearfix">

        <form name="sign-up-form"  id="sign-up-form" method="post" action="UserAbout.php">

            <h1 style="color: #00ba8b">About </h1>

            <div class="login-fields">

                <div class="field">
                    <label for="email">Email Address:</label>
                    <input type="text"  name="userEmail" value="<?php echo $userLogin[0]->getEmail(); ?>" class="login"/>
                </div> <!-- /field -->
                <div class="field">
                    <label for="name">Name:</label>
                    <input type="text"  name="userName"  value="<?php echo $userLogin[0]->getFirstname(); ?>" class="login" />
                </div> <!-- /field -->
                <div class="field">
                    <label for="surname">Surname:</label>
                    <input type="text"  name="userSurname"  value="<?php  echo $userLogin[0]->getLastname(); ?>" class="login"/>
                </div> <!-- /field -->

                <div class="field">
                    <label for="password">Password:</label>
                    <input type="password" name="userPassword" placeholder="Please enter your password for changes!" class="login"/>
                </div> <!-- /field -->

                <!--Iki yöntemide kullanabiliriz-->
                <div class="login-actions">
                    <input class="button btn btn-primary btn-large" type="submit" name="btn-change" value="Save Changes!"/>
                </div> <!-- .actions -->

            </div> <!-- /login-fields -->

            <!-- <div class="login-actions">
                <form action="/banksystem/BusinessLayer/SignIn.php" method="POST">
                    <input class="button btn btn-primary btn-large" type="submit" name="login" value="Sign In!"/>
                </form>
             </div><!-- .actions -->

        </form>

    </div> <!-- /content -->

</div> <!-- /account-container -->


</body>
</html>

