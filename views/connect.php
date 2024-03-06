<?php 
    $db_server = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_db = "library";
    try{
        $conn = new mysqli($db_server, $db_user, $db_password, $db_db);
    }catch(mysqli_sql_exception){
        echo "Cannot connect to the database";
    }
?>