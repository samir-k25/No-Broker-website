<?php
    session_start();
    include_once 'include/dbh.inc.php';

    $id = $_SESSION["useruid"];
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $sql = "DELETE FROM users WHERE usersUid='" . $id . "'";
    
    $serverName = "localhost";
    $dBUsername = "root";
    $dBPassword = "";
    $dBName = "property";

    $con = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);
    $display = "select * from apartment where seller_name ='" . $id . "'";
    $querydis = mysqli_query($con,$display);
    $result = mysqli_fetch_assoc($querydis);
    $aptid = $result['id'];
    $query = "DELETE FROM `apartment` WHERE id ='" . $aptid . "';";
    mysqli_query($con, $query);
    if (mysqli_query($conn, $sql)) {
        session_unset();
        session_destroy();
        header("Location: index.php?error=accountdeleted");
     } 
    else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
    mysqli_close($conn);

    session_abort();
