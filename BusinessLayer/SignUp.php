<?php
/**
 * Created by PhpStorm.
 * User: Emre
 * Date: 6.5.2017
 * Time: 16:11
 */
require_once("D:\AppServ\www\banksystem\LogicLayer\UserManagement.php");

$errorMeesage = "";
    if (isset($_POST["register"])) {
        if (isset($_POST["first_name"]) && isset($_POST["last_name"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["password2"])) {
           // if ($password == $password2) {
                $first_name = trim($_POST["first_name"]);
                $last_name = trim($_POST["last_name"]);
                $email = trim($_POST["email"]);
                $password = trim($_POST["password"]);
                $errorMeesage = "";
                $result = UserManagement::insertNewUser($first_name, $last_name, $email, $password);
                if (!$result) {
                    $errorMeesage = "Sign Up is failed!";
                }
           // }
        }
        header("Location: SignIn.php");
    }
    else if (isset($_POST["login"]))
    {
        header("Location: SignIn.php");
        echo "asddsadasd";
    }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sign Up</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">

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

            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <a class="brand" href="index.html">
                Welcome to our bank system!
            </a>

            <div class="nav-collapse">
                <ul class="nav pull-right">
                    <li class="">
                        <a href="SignIn.php" class="" name="login">
                            Already have an account? Login now
                        </a>

                    </li>

                </ul>

            </div><!--/.nav-collapse -->

        </div> <!-- /container -->

    </div> <!-- /navbar-inner -->

</div> <!-- /navbar -->

<div class="account-container register">

    <div class="content clearfix">

        <form name="sign-up-form"  id="sign-up-form" method="post" action="">

            <h1>Signup for Free Account</h1>

                <div class="login-fields">
                        <p>Create your free account:</p>

                        <div class="field">

                            <label for="firstname">First Name:</label>
                            <input type="text"  name="first_name"  placeholder="First Name" class="login" required/>
                        </div> <!-- /field -->

                        <div class="field">
                            <label for="lastname">Last Name:</label>
                            <input type="text"  name="last_name"  placeholder="Last Name" class="login" required/>
                        </div> <!-- /field -->


                        <div class="field">
                            <label for="email">Email Address:</label>
                            <input type="text"  name="email"  placeholder="Email" class="login" required/>
                        </div> <!-- /field -->

                        <div class="field">
                            <label for="password">Password:</label>
                            <input type="password" name="password" placeholder="Password" class="login" required/>
                        </div> <!-- /field -->

                        <div class="field">
                            <label for="confirm_password">Confirm Password:</label>
                            <input type="password" name="password2"  placeholder="Confirm Password" class="login" required/>
                        </div> <!-- /field -->

                        <!--Iki yöntemide kullanabiliriz-->
                        <div class="login-actions">
                            <input class="button btn btn-primary btn-large" type="submit" name="register" value="Register!"/>
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


<!-- Text Under Box -->
<div class="login-extra">
    Already have an account? <a href="SignIn.php">Login to your account</a>
</div> <!-- /login-extra -->


<script src="../js/jquery-1.7.2.min.js"></script>
<script src="../js/bootstrap.js"></script>

<script src="../js/signup.js"></script>

</body>

</html>


