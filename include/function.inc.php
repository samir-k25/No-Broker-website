<?php
session_start();
function invaidUid($username) {
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invaidEmail($email) {
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdrepeat) {
    $result;
    if ($pwd == $pwdrepeat) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function uidExists($conn, $username, $email) {
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;"; 
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }  

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $phone, $address, $email, $username, $pwd) {
    $sql = "INSERT INTO users (usersName, usersPhone, usersAddress, usersEmail, usersUid, usersPWD) VALUES (?, ?, ?, ?, ?, ?);"; 
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssss", $name, $phone, $address, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../login.php?error=none");
}
function emptyInputLogin($username, $pwd) {
    $result;
    if (empty($username) || empty($pwd)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}
function loginUser($conn, $username, $pwd) {
    $uidExists = uidExists($conn, $username, $username);

    if ($uidExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];

    if (password_verify($pwd, $pwdHashed)) {
        session_start();
        $_SESSION["userid"] = $uidExists["usersID"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        header("location: ../index.php");
        exit();
    }
    else {
        header("location: ../login.php?error=incorrectpassword");
        exit();
    }
}
function changepwd($conn, $oldpwd, $newpwd, $repeatpwd){
    $oldpwd = $_POST["oldpassword"];
    $newpwd = $_POST["newpassword"];
    $repeatpwd = $_POST["confirmpassword"];
    
    $hashedPwd = password_hash($oldpwd, PASSWORD_DEFAULT);

    $getpwd = "SELECT `usersPwd` FROM `users` WHERE usersUid = '".$_SESSION['useruid']."'";
    $querydis = mysqli_query($conn,$getpwd);
    while($result = mysqli_fetch_assoc($querydis)){
        $pwd = $result ['usersPwd'];
        if (password_verify($oldpwd, $hashedPwd))  {
            if($newpwd == $repeatpwd){
                $hashedPwd = password_hash($newpwd, PASSWORD_DEFAULT);
                $sql = "UPDATE users SET usersPwd = '$hashedPwd' WHERE usersUid = '".$_SESSION['useruid']."'";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("location: ../signup.php?error=stmtfailed");
                    exit();
                }
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                header("location: ../profile.php?error=successfullyupdatedpwd");
            }
            else{
                echo "<script>alert('Confirm password does not match')</script>";    
            }
        }
        else {
            echo "<script>alert('Current Password does not match!')</script>";
        }
    }
}
