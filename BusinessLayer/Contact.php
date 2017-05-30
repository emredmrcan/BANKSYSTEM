<?php
/**
 * Created by PhpStorm.
 * User: Emre
 * Date: 10.5.2017
 * Time: 16:26
 */
?>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <title>Bank System-Contact</title>
    <link rel="stylesheet" type="text/css" href="../css/contact.css">   <!-- !-->

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
                    <th><a class="brand" style="color: blue" href="#">Purchased Tickets</a></th>
                    <th><a class="brand" style="color: red; padding-left: 300px;" href="Contact.php">Contact</a></th>
                    <th><a class="brand" style="color: red; padding-left: 10px;" href="UserAbout.php">About</a></th>
                    <th><a class="brand" style="color: red; padding-left: 10px;" href="../logout.php">Logout</a></th>
                </tr>
                </tbody></table>
        </div> <!-- /container -->

    </div> <!-- /navbar-inner -->

</div> <!-- /navbar -->
<section id="contact" style="">
    <div class="container">
        <div class="row">
            <div class="about_our_company" style="margin-bottom: 20px;">
                <h1 style="color:#fff;">Write Your Message</h1>
                <div class="titleline-icon"></div>
                <p style="color:#fff;">Get in touch with us </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <form name="sentMessage" id="contactForm" novalidate="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your Name *" id="name" required="" data-validation-required-message="Please enter your name.">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Your Email *" id="email" required="" data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input type="tel" class="form-control" placeholder="Your Phone *" id="phone" required="" data-validation-required-message="Please enter your phone number.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Your Message *" id="message" required="" data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-12 text-center">
                            <div id="success"></div>
                            <button type="submit" class="btn btn-xl get">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <p style="color:#fff;">
                    <strong><i class="fa fa-map-marker"></i> Address</strong><br>
                    Dokuz Eylul Universty, Tınaztepe Campus 35390 TURKEY
                </p>
                <p style="color:#fff;"><strong><i class="fa fa-phone"></i> Phone Number</strong><br>
                    (+90)538 7123456</p>
                <p style="color:#fff;">
                    <strong><i class="fa fa-envelope"></i>  Email Address</strong><br>
                    Email@info.com</p>
                <p></p>
            </div>
        </div>
    </div>
</section>
</body>
</html>