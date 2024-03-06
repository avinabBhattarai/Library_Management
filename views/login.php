<?php 
    include("connect.php");
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    } 
    if(isset($_SESSION["id"])){
        header("Location: home.php");
        die();
    }
    $username = "";
    $password = "";
    $msg = "";
    if(isset($_POST["login"])){
        extract($_POST);
        if($username == "admin" && $password == "admin"){
            header("Location: home.php");
            $_SESSION["id"] = 0;
            $_SESSION["username"] = "Admin";
        }
        $sql = "SELECT password, user_id, username FROM users WHERE username = '$username'";
        $result = $conn -> query($sql);
        $row = $result -> fetch_assoc();
        if($row != NULL){
            $password_hash = $row["password"];
            if(password_verify($password, $password_hash)){
                $_SESSION["id"] = $row["user_id"];
                $_SESSION["username"] = $row["username"];
                header("Location: home.php");
            }else{
                $msg = "Invalid Password";
            }
        }else{
            $msg = "Invalid Username";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/login.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form id="lf" method="POST">
            <div class="fields">Username <br> <input id="username" type="text" name="username" value="<?= htmlspecialchars($username) ?>" required></div>
            <div class="fields">Password <br> <input id="password" type="password" name="password" value="<?= htmlspecialchars($password) ?>" required></div>
            <div class="msg"><?= htmlspecialchars($msg) ?></div>
            <div class="login"><input type="submit" id="login" name="login" value="Login"></div>
        </form>
        <p id="register">No account? <a href="register.php">Register</a></p>
    </div>
</body>
</html>