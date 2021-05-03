<?php    
  session_start();

  if(isset($_POST["submit"])) {
    $serverName = "localhost";
    $dBUsername = "root";
    $dBPassword = "";
    $dBName = "property";

    $conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

    if(!$conn){
        die("Connection failed: ".mysqli_connect_error());
    }
    $address = $_POST['address'];
    $seller_number = $_POST['seller_number'];
    $price = $_POST['price'];
    $area_sqft = $_POST['area_sqft'];
    $bedroom = $_POST['bedroom'];
    $description = $_POST['description'];
    $payment_mode = $_POST['payment_mode'];
    $property_for = $_POST['property_for'];

    $display = "select * from apartment";
    $querydis = mysqli_query($conn,$display);
    $result = mysqli_fetch_assoc($querydis);
    $id = $result['id'];
 
    $query = mysqli_query($conn, "UPDATE apartment SET address= '" . $address . "',seller_number = '" . $seller_number . "', price = '" . $price . "', area_sqft = '" . $area_sqft . "', bedroom = '" . $bedroom . "', description = '" . $description . "', payment_mode = '" . $payment_mode . "', property_for = '" . $property_for . "'  where id ='" . $id . "'");
    header("Location: ../profile.php?error=updateSuccessfull");
    mysqli_close($conn);
  }
