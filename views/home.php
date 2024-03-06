<?php 
    include("connect.php");
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    } 
    if(isset($_SESSION["id"])){
        $id = $_SESSION["id"];
    }else{
        header("Location: login.php");
        die();
    }
    include("../components/header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <?php 
        include("borrowing.php")
    ?>
</body>
</html>