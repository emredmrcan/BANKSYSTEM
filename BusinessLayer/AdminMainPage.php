<?php
session_start();
require_once("../LogicLayer/UserManagement.php");
           //-------------? echo $_SESSION['adminEmail'];

        if(isset($_SESSION['adminEmail'])){
            if (isset($_GET['deleted'])){

                $deleted_id = $_GET['id'];
                $success = UserManagement::deleteUser($deleted_id);
                if ($success){

                    header('Refresh:0; AdminMainPage.php');
                }
            }
            if(isset($_POST["logout"])){

                header( "location: ../logout.php");
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
                        <th><a class="brand" href="AdminMainPage.php">Welcome to admin panel!</th> </a>
                        <th><a class="brand" style="color: blue;" href="AdminMainPage.php">User List</a> </th>
                        <th><a class="brand" style="color: blue" href="AdminTicketPage.php">Purchased Ticket List</a></th>
                        <th><a class="brand" style="color: red; padding-left: 475px; href=" href="../logout.php" >Logout</a></th>
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
                <th>ID</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
            $userList = UserManagement::getUsers();

            for($i = 0; $i < count($userList); $i++) {
                ?>
                <tr>
                    <td><?php echo $userList[$i]->getİd(); ?></td>
                    <td><?php echo $userList[$i]->getFirstname(); ?></td>
                    <td><?php echo $userList[$i]->getLastname(); ?></td>
                    <td>
                        <!--<button class="btn btn-primary btn-xs" ><span class="glyphicon glyphicon-pencil"></span></button>
                        <button class="btn btn-danger btn-xs" ><span class="glyphicon glyphicon-trash"></span></button>
                         !-->
                        <a href="Edit.php?edited=1&id=<?php echo $userList[$i]->getİd(); ?>"><i class="glyphicon glyphicon-edit" style="font-size:15px;color:blue;"></i> </a>
                    </td>
                    <td>
                        <a href="AdminMainPage.php?deleted=1&id=<?php echo $userList[$i]->getİd(); ?>"><i class="glyphicon glyphicon-remove" style="font-size:15px;color:red;"></i></a>
                    </td>
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

