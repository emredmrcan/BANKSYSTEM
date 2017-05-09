<?php

require_once("/LogicLayer/UserManagement.php");
require_once ("/DataLayer/connectiondb.php");
$error="";
$id="0";
$first_name="";
$last_name="";
if (isset($_GET['edited'])){
    $conn = new connectiondb();
    $con = $conn->getConnection();

    $sql = "SELECT * FROM users WHERE user_id = '{$_GET['id']}'";
    $query = mysqli_query($con,$sql);
    $row = mysqli_fetch_row($query);
    $id = $row[0];
    $first_name = $row[1];
    $last_name = $row[2];

}
if(isset($_POST['btn-edit'])){
    $conn = new connectiondb();
    $con = $conn->getConnection();
    $new_name = trim($_POST["firstName"]);
    $new_surname = trim($_POST["lastName"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $sql = "UPDATE users SET first_name = '$new_name', last_name ='$new_surname' WHERE user_id='$id'";
    $query = mysqli_query($con,$sql);
   if ($query){

       header('Refresh:0; resul.php');
   }

    /*$result = UserManagement::editUser($id,$first_name, $last_name);
    if (!$result) {
        $errorMeesage = "Sign Up is failed!";
    }*/

}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <title>PHP :: 3 Tier Architecture</title>
    <link rel="stylesheet" type="text/css" href="/banksystem/css/site.css">
</head>
<body>
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
            /*$userList = UserManagement::getUsers();

            for($i = 0; $i < count($userList); $i++) {
                ?>
                <tr>
                    <td><?php echo $userList[$i]->getİd(); ?></td>
                    <td><?php echo $userList[$i]->getFirstname(); ?></td>
                    <td><?php echo $userList[$i]->getLastname(); ?></td>
                </tr>
                <?php
            }*/
            ?>
            <tr>
                <td></td>
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

