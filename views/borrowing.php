<?php 
    if (session_status() == PHP_SESSION_NONE) {
            session_start();
    }    
    if(!isset($_SESSION["id"])){
        header("Location: login.php");
    }
    if($id == 0){
        $sql = "SELECT * FROM borrowing";
        $admin = true;
    }else{
        $sql = "SELECT * FROM borrowing where user_id = '$id'";
        $admin = false;
    }
    $result = $conn -> query($sql);
    if($result->num_rows > 0){
        $current_date = new DateTime();
        if(!$admin){
            echo "<table>
                    <tr>
                        <th>Txn_id</th>
                        <th>Book_id</th>
                        <th>Date_borrowed</th>
                        <th>Due_date (Fine)</th>
                    </tr>";
        }else{
            echo "<table>
                    <tr>
                        <th>Txn_id</th>
                        <th>User_id</th>
                        <th>Book_id</th>
                        <th>Date_borrowed</th>
                        <th>Due_date (Fine)</th>
                        <th>Option</th>
                    </tr>";
        }
        while ($row = $result->fetch_assoc()) {
            $due_date = new DateTime($row["Date_borrowed"]);
            $interval = $current_date->diff($due_date);
            if($interval->days > 15){
                $fine = "(Rs. " . $interval->days - 15 . ")";
            }else{
                $fine = "";
            }
            $txn_id = $row["id"];
            if(!$admin){
                echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["Book_id"] . "</td>
                        <td>" . $row["Date_borrowed"] . "</td>
                        <td>" . $row["Due_date"] . " " . $fine . "</td>
                        </tr>";
            }else{
                echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["User_id"] . "</td>
                        <td>" . $row["Book_id"] . "</td>
                        <td>" . $row["Date_borrowed"] . "</td>
                        <td>" . $row["Due_date"] . " " . $fine . "</td>
                        <td><a href='return.php?id=$txn_id' style='color: green;'>Return</a></td>
                        </tr>";
            }
            
        }
        echo "</table>";
    }
?>
<html>
    <link rel="stylesheet" href="../assets/styles/table.css">
</html>