<?php


    session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['email'])){

        require_once("../LogicLayer/UserManagement.php");
       // require_once ("DataLayer/connectiondb.php");

        $email = stripslashes($_REQUEST['email']); // removes backslashes
        $password = stripslashes($_REQUEST['password']);
        $newpassword = md5($password);
        $rows = UserManagement::login($email,$newpassword);
        if($rows==1){
            $_SESSION['email'] = $email;
            header("Location: /banksystem/BusinessLayer/UserMainPage.php"); // Redirect user to index.php

        }else{
            echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='../BusinessLayer/SignIn.php'>Login</a></div>";
        }
    }else{}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Bank System-Login User</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <link href="/banksystem/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/banksystem/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />

    <link href="/banksystem/css/font-awesome.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">

    <link href="/banksystem/css/style.css" rel="stylesheet" type="text/css">
    <link href="/banksystem/css/signin.css" rel="stylesheet" type="text/css">
    <style>
        #error-msg{ display:none }
        #success-msg{ display:none }
    </style>
</head>

<body>
<div class="navbar navbar-fixed-top">

    <div class="navbar-inner">

        <div class="container">

            <a class="brand" href="/banksystem/BusinessLayer/SignIn.php">
                Welcome to our bank system!
            </a>

        </div> <!-- /container -->

    </div> <!-- /navbar-inner -->

</div> <!-- /navbar -->

<div class="account-container register">

    <div class="content clearfix">

        <form name="sign-up-form"  id="sign-up-form" method="post" action="">

            <h1 style="color: #00ba8b">LOGIN </h1>

            <div class="login-fields">

                <div class="field">
                    <label for="email">Email Address:</label>
                    <input type="text"  name="email"  placeholder="Email" class="login" required/>
                </div> <!-- /field -->

                <div class="field">
                    <label for="password">Password:</label>
                    <input type="password" name="password" placeholder="Password" class="login" required/>
                </div> <!-- /field -->

                <!--Iki yöntemide kullanabiliriz-->
                <div class="login-actions">
                    <input class="button btn btn-primary btn-large" type="submit" name="btn-login" value="Sign In!"/>
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
    Don't you have an account? <a href="/banksystem/BusinessLayer/SignUp.php">
    <div>
        Create your free account!
    </div>
    </a>
</div> <!-- /login-extra -->
<div class="login-extra">
    For Admin Panel! <a href="/banksystem/BusinessLayer/LoginAdmin.php">
        <div>
            Login Admin
        </div>
    </a>
</div> <!-- /login-extra -->

<script src="../js/jquery-1.7.2.min.js"></script>
<script src="../js/bootstrap.js"></script>

<script src="../js/signup.js"></script>

</body>

</html>


