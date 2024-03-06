<?php 
    include("connect.php");
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $user = $_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="head">
        <p class="greet"><a href="home.php"><?= htmlspecialchars($user) ?></a></p>
        <a href="books.php">Books</a>
        <?php
            if($user == "Admin"){
                echo "<a href='users.php'>Users</a>
                        <a href='returns.php'>Returns</a>";
            }
        ?>
        <a href='logout.php'>Logout</a>
    </div>
</body>
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    .head{
        display: flex;
        background-color: #A25772;
        justify-content: right;
        padding: 20px 30px;
        font-size: 16px;
    }
    a{
        color: white;
        margin: 0 10px;
        text-decoration: none;
    }
    .greet{
        position: absolute;
        left: 0;
        padding-left: 20px;
        color: white;
    }
</style>
</html>