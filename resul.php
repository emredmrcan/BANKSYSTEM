<?php

require_once("/LogicLayer/UserManagement.php");
if (isset($_GET['deleted'])){

    echo "delete";
    $conn = new connectiondb();
    $con = $conn->getConnection();

    $deleted_id = $_GET['id'];

    $sql = "DELETE FROM users WHERE user_id='$deleted_id'";
    $query = mysqli_query($con,$sql);
    if ($query){

        header('Refresh:0; resul.php');
    }
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
    <!--action="<?php $_PHP_SELF ?>-->
    <form method="POST" action="">
        <table id="tblUsers">
            <tbody>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Action</th>
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
                        <a href="Edit.php?edited=1&id=<?php echo $userList[$i]->getİd(); ?>">Edit</a>
                        <a href="resul.php?deleted=1&id=<?php echo $userList[$i]->getİd(); ?>">Delete</a>
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

