<?php 
    include("connect.php");
    $username = "";
    $email = "";
    $password = "";
    $cpassword = "";
    $name = "";
    if(isset($_POST["register"])){
        extract($_POST);
        $passwordhash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users(Username, Name, Password, Email) 
                VALUES ('$username', '$name', '$passwordhash', '$email')";
        if($password == $cpassword){
            try{
                $conn->query($sql);
                echo "<script>alert('User Created Successfully')";
                header("Location: login.php");
                die();
            }catch(mysqli_sql_exception){
                echo "Username Already exists";
            }
        }else{
            echo "Passwords do not match";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../assets/styles/register.css">

</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form method="POST" name="freg" id="freg">
            Name : <input type="text" name="name" value="<?= htmlspecialchars($name) ?>" required> <br>
            Email : <input type="email" name="email" value="<?= htmlspecialchars($email) ?>" required> <br>
            Username : <input type="text" name="username" value="<?= htmlspecialchars($username) ?>" required> <br>
            Password : <input type="password" name="password" value="<?= htmlspecialchars($password) ?>" required> <br>
            Confirm Password : <input type="password" name="cpassword" value="<?= htmlspecialchars($cpassword) ?>" required> <br>
            <input type="submit" name="register" value="Register">
        </form>
    </div>
</body>
</html>
