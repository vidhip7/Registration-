<?php
session_start();
if(!isset($_SESSION['user'])){
    header('location:adminlogin.php');
}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <?php include 'links.php' ?>
    
</head>
<body>

<div class="container center-div shadow">
    <div class="heading text-center text-uppercase text-white mb-5"> Hey, you are successfully
        <?php echo $_SESSION['user']?> login
    </div>
    <a href="logout.php" class="btn btn-danger"> Logout</a>
</div>   


</body>
</html>