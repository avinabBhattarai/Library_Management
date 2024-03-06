<?php 
    include("connect.php");
    $id = $_GET['id'];
    $sql = "SELECT * FROM borrowing WHERE id=$id";
    $result = $conn -> query($sql);
    $data = $result -> fetch_assoc();
    $borrow_id = $data["id"];
    $user_id = $data["User_id"];
    $book_id = $data["Book_id"];
    $date_returned = new DateTime();
    $d_b = new DateTime($data["Date_borrowed"]);
    $interval = $date_returned->diff($d_b);
    $due_date = new Datetime($data["Due_date"]);
    $fine_amt = ($interval->days - 15);
    if($fine_amt<0){
        $fine_amt = 0;
    }
    $fine = "Rs. " . $fine_amt;
    $due_date = $due_date->format('Y-m-d');
    $date_returned = $date_returned->format('Y-m-d');
    $sql = "INSERT INTO returns VALUES($borrow_id, $user_id, $book_id, '$date_returned', '$due_date', '$fine')";
    $conn -> query($sql);
    $sql = "DELETE FROM borrowing WHERE id=$id";
    $conn -> query($sql);
    header("Location: home.php");
?>