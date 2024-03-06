<?php
    include("connect.php");
    include("../components/header.php");
    if(!isset($_SESSION["id"])){
        header("Location: login.php");
    }
    if($_SESSION["id"] != 0){
        header("Location: home.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/table.css">
    <title>Users</title>
</head>
<body>
    <?php
        $sql = "SELECT * FROM users";
        $result = $conn -> query($sql);
        if($result->num_rows > 0){
            echo "<table>
                    <tr>
                        <th>User_id</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["User_id"] . "</td>
                        <td>" . $row["Username"] . "</td>
                        <td>" . $row["Name"] . "</td>
                        <td>" . $row["Email"] . "</td>
                    </tr>";
            }
            echo "</table>";
        }else{
            echo "No Users";
        }
    ?>
</body>
</html>
