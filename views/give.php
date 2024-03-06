<?php
    $id = $_GET["id"];
    $msg = "";
    include("connect.php");
    include("../components/header.php");
    if($user != "Admin"){
        header("Location: home.php");
    }
    if(isset($_POST["submit"])){
        extract($_POST);
        $sql = "SELECT * FROM users WHERE User_id = $stdId";
        $result = $conn -> query($sql);
        $row = $result -> fetch_assoc();
        if($row != NULL){
            $currentDate = new DateTime();
            $dateBorrowed = $currentDate->format("Y-m-d");
            $currentDate->modify('+15 days');
            $dueDate = $currentDate->format('Y-m-d');
            $sql_add_borrow = "INSERT INTO borrowing(User_id, Book_id, Date_borrowed, Due_date) 
                VALUES($stdId, $id, '$dateBorrowed', '$dueDate')";
            $conn -> query($sql_add_borrow);
            header("location: books.php");
        }else{
            $msg = "User does not exist";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<body>
<form action="give.php?id=<?php echo $id ?>" method="POST" style="margin: 20px;">
        <label for="userId">Enter student ID:</label>
        <input type="text" id="userId" name="stdId" required
            style="width: 50px; border: 1px solid #7C93C3;">
        <br>
        <input type="submit" name="submit" value="Submit" style="border: none; 
            background-color: white; font-size: 14px; color: green;
            margin-top: 5px;">
    </form>
    <p style="margin-left: 20px;"><?php echo $msg;?></p>
</body>
</html>