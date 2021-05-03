<?php

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdrepeat = $_POST["pwdrepeat"];

    require_once 'dbh.inc.php';
    require_once 'function.inc.php';

    // Given password
    $password = $_POST["pwd"];

    // Validate password strength
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
        header("Location: ../signup.php?error=password");
        exit();
    }
    
    if (invaidUid($username) !== false){
        header("location: ../signup.php?error=invaliduid");
        exit();
    }
    if (invaidEmail($email) !== false){
        header("location: ../signup.php?error=invalidemail");
        exit();
    }
    if (pwdMatch($pwd, $pwdrepeat) == false){
        header("location: ../signup.php?error=passwordsdontmatch");
        exit();
    }
    if (uidExists($conn, $username, $email) !== false){
        header("location: ../signup.php?error=usernametaken");
        exit();
    }
    if($_POST["pwd"] == $_POST["pwdrepeat"]) {
        $password = $_POST["pwd"];
        $cpassword = $_POST["pwdrepeat"];
        if (strlen($_POST["password"]) <= '8') {
            header("Location: ../signup.php?error=character");
        }
        elseif(!preg_match("#[0-9]+#",$password)) {
            header("Location: ../signup.php?error=number");
        }
        elseif(!preg_match("#[A-Z]+#",$password)) {
            header("Location: ../signup.php?error=capital");;
        }
        elseif(!preg_match("#[a-z]+#",$password)) {
            header("Location: ../signup.php?error=lower");
        }
    }
    else {
         $passwordErr = "Please enter password   ";
    }

    createUser( $conn, $name, $phone, $address, $email, $username, $pwd);
}
else {
    header("location: ../signup.php");
}