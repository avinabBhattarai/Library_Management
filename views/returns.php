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
    <title>Returns</title>
</head>
<body>
    <?php
        $sql = "SELECT * FROM returns";
        $result = $conn -> query($sql);
        if($result->num_rows > 0){
            echo "<table>
                    <tr>
                        <th>Txn_id</th>
                        <th>User_id</th>
                        <th>Book_id</th>
                        <th>Date_returned</th>
                        <th>Due_date</th>
                        <th>Fine</th>
                    </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["Borrow_id"] . "</td>
                        <td>" . $row["User_id"] . "</td>
                        <td>" . $row["Book_id"] . "</td>
                        <td>" . $row["Date_returned"] . "</td>
                        <td>" . $row["Due_date"] . "</td>
                        <td>" . $row["Fine"] . "</td>
                    </tr>";
            }
            echo "</table>";
        }else{
            echo "No transactions";
        }
    ?>
</body>
</html>
