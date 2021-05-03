<?php
session_start();
include_once 'dbh.inc.php';

$id = $_SESSION["useruid"];/* userid of the user */
if(count($_POST)>0) {
$result = mysqli_query($conn,"SELECT *from users WHERE usersUid='" . $id . "'");
$row=mysqli_fetch_array($result);
/*$usersuid = $_POST["usersuid"];
$usersemail = $_POST["usersemail"];
$usersphone = $_POST["usersphone"];
$usersaddress = $_POST["usersaddress"];
mysqli_query($conn,"UPDATE users set usersUid='" . $_POST['usersuid'] . "', usersEmail='" . $_POST['usersemail'] . "', usersPhone='" . $_POST['usersphone'] . "', usersAddress='" . $_POST['usersaddress'] . "' WHERE usersUid='" . $id . "'");*/
$Cpwd = $_POST["currentPassword"];
$hashedpwd = $row["usersPwd"];
if(password_verify($Cpwd, $hashedpwd) && $_POST["newPassword"] == $_POST["confirmPassword"] ) {
    $hashedPwd = password_hash($_POST["newPassword"], PASSWORD_DEFAULT);
mysqli_query($conn,"UPDATE users set usersPwd='" . $hashedPwd . "' WHERE usersUid='" . $id . "'");
$message = "Password Changed Sucessfully";
header("Location: ../profile.php?error=successfull");
} else{
    header("Location: ../profile.php?error=unsuccessfull");
 $message = "Password is not correct";
}
}
?>