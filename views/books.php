<?php
    include("connect.php");
    include("../components/header.php");
    if(!isset($_SESSION["id"])){
        header("Location: login.php");
    }
    if($_SESSION["id"] == 0){
        $admin = true;
    }else{
        $admin = false;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/table.css">
    <title>Books</title>
</head>
<body>
    <?php
        $sql = "SELECT * FROM books";
        $result = $conn -> query($sql);
        if($result->num_rows > 0){
            echo "<table>
                    <tr>
                        <th>Book_id</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Publisher</th>
                        <th>Published_date</th>
                        <th>Language</th>";
            if($admin){
                echo "<th>Actions</th>";
            }
            echo "</tr>";
            while ($row = $result->fetch_assoc()) {
                $book_id = $row["Book_id"];
                echo "<tr>
                        <td>" . $row["Book_id"] . "</td>
                        <td>" . $row["Title"] . "</td>
                        <td>" . $row["Author"] . "</td>
                        <td>" . $row["Publisher"] . "</td>
                        <td>" . $row["Date_of_publication"] . "</td>
                        <td>" . $row["Language"] . "</td>";
                if($admin){
                    $sql_id = "SELECT id FROM borrowing WHERE Book_id = $book_id";
                    $result_id = $conn -> query($sql_id);
                    $row_borrow = $result_id -> fetch_assoc();
                    if($row_borrow == NULL){
                        echo "<td><a href='give.php?id=$book_id' 
                            style='color: green;'>Give</a></td>";
                    }else{
                        echo "<td style='color: red;'>Taken</td>";
                    }
                }
                echo"</tr>";
            }
            echo "</table>";
        }else{
            echo "No books!!!!";
        }
    ?>
</body>
</html>
