<?php
session_start();

require_once("../LogicLayer/UserManagement.php");
require_once ("../DataLayer/connectiondb.php");
$error="";
$id="0";
$first_name="";
$last_name="";
    if (isset($_GET['edited'])){
        $row = UserManagement::getRow($_GET['id']);
        $id = $row[0];
        $first_name = $row[1];
        $last_name = $row[2];
    }
    if(isset($_POST['btn-edit'])){
        $new_name = trim($_POST["firstName"]);
        $new_surname = trim($_POST["lastName"]);
        $email = trim($_POST["email"]);
        $password = trim($_POST["password"]);
        $success = UserManagement::editUser($id,$new_name,$new_surname);

           if ($success){

               header('Refresh:0; AdminMainPage.php');
           }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <title>PHP :: 3 Tier Architecture</title>
    <link rel="stylesheet" type="text/css" href="/banksystem/css/table.css">

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

            <a class="brand" href="SignIn.php">
                Just do what you want!
            </a>

        </div> <!-- /container -->

    </div> <!-- /navbar-inner -->

</div> <!-- /navbar -->
<div id="dvMain">
    <form method="POST" action="">
        <table id="tblUsers">
            <tbody>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Surname</th>
            </tr>
            <?php
            ?>
            <tr>
                <td>
                    <?php echo $id ?>
                </td>
                <td>
                    <input type="text" name="firstName" value="<?php echo $first_name ?>" required />
                </td>
                <td>
                    <input type="text" name="lastName" value="<?php echo $last_name ?>" required />
                    <input type="submit" name="btn-edit" value="Edit!"/>
                    <?php
                    if(isset($errorMeesage)) {
                        echo "<br>" . "<span style='color: red;'>" . $errorMeesage . "</span>";
                    }
                    ?>
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</div>
</body>
</html>

