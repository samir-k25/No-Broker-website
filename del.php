<?php
    session_start();
    include_once 'dbh.php';

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $display = "select * from apartment ORDER by id DESC";
    $querydis = mysqli_query($conn,$display);
    $result = mysqli_fetch_assoc($querydis);
    $id = $result['id'];
    $sql = "DELETE FROM `apartment` WHERE id ='" . $id . "';";
    if (mysqli_query($conn, $sql)) {
        header("Location: profile.php?error=postdeleted");
     } 
    else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
    mysqli_close($conn);
