<?php
    session_start();
    include_once 'dbh.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>No MITB</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
        </head>
        <body style="color: #1a202c; text-align: left; background-color: #e2e8f0;">
		<nav class="navbar navbar-expand-lg navbar-light bg-light"
			style="background-color: #45526e">
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav">
				<a class="nav-item nav-link" href="index.php">Home </span></a>
				<a class="nav-item nav-link active" href="property.php">What we do</a>
				<a class="nav-item nav-link" href="contact.php">Contact Us </a>
			    <?php
                    if (isset($_SESSION["useruid"])) {
                      echo "<a class='nav-item nav-link' href='post.php'>Post property <span class='sr-only'>(current)</span></a>";
                      echo "<a class='nav-item nav-link' href='profile.php'>Profile</a>";
                      echo "<a class='nav-item nav-link' href='include/logout.inc.php'>Log Out</a>";
                    }
                    else {
                        echo "<a class='nav-item nav-link' href='signup.php'>Register</a>";
                        echo "<a class='nav-item nav-link' href='login.php'>Log In</a>";
                    }
                ?>
                <section class="index-intro" style="position: absolute; right: 250px; top:15px">
                <?php
                    if (isset($_SESSION["useruid"])) {
                        echo "<p>Hello ". $_SESSION["useruid"] . "!</p>";
                    }
                ?>
				</div>
			</div>
		</nav>
    <br>
    <div clas="container">
        <h1 class="text-center text-white bg-dark">Property For Sale / Rent</h1>
        <br>
        <div class="table-responsive">
        <table class="table table-bordered table-stripped table-hover text-center">
            <thead class="bg-dark text-white">
                <th>Address</th>
                <th>Seller ID</th>
                <th>Seller Contact_no</th>
                <th>Price</th>
                <th>Area Sqft</th>
                <th>No.of Bedroom</th>
                <th>Specification</th>
                <th>Property For</th>
                <th>Payment Accepted in</th>
                <th>Property</th>
            </thead>

            <tbody>
                <?php
                $con = mysqli_connect('localhost','root');
                mysqli_select_db($con,'property');

                $seller_name = $_SESSION["useruid"];

                if(isset($_POST['submit'])){
                    $address = $_POST['address'];
                    $seller_number = $_POST['seller_number'];
                    $price = $_POST['price'];
                    $area_sqft = $_POST['area_sqft'];
                    $bedroom = $_POST['bedroom'];
                    $description = $_POST['description'];
                    $payment_mode = $_POST['payment_mode'];
                    $property_for = $_POST['property_for'];
                    $files = $_FILES['file'];

                    $filename = $files['name'];
                    $fileerror = $files['error'];
                    $filetmp = $files['tmp_name'];
                    $filesize = $files['size'];

                    $fileext = explode('.',$filename);
                    $filecheck = strtolower(end($fileext));

                    $fileextstored = array('mp4');

                    if(in_array($filecheck,$fileextstored)){
                        if ($fileerror === 0){
                            if ($filesize < 10000000){

                                $destinationfile = 'upload/' . $filename;
                                move_uploaded_file($filetmp,$destinationfile);

                                $q = "INSERT INTO `apartment`(`address`, `seller_name`, `seller_number`, `price`, `area_sqft`, `bedroom`, `description`, `payment_mode`, `image`, `property_for`) 
                                VALUES ('$address','$seller_name','$seller_number','$price','$area_sqft','$bedroom','$description','$payment_mode','$destinationfile','$property_for')";

                                $query = mysqli_query($con, $q);
                                header("Location: index.php?error=UploadSuccessfull");
                                $display = "select * from apartment";
                                $querydis = mysqli_query($con,$display);

                                //$row = mysqli_num_rows($querydis);
                                while($result = mysqli_fetch_assoc($querydis)){

                                    ?>
                                    <tr>
                                        <td><?php echo$result['address']; ?> </td>
                                        <td><?php echo$result['seller_name']; ?> </td>
                                        <td><?php echo$result['seller_number']; ?> </td>
                                        <td><?php echo$result['price']; ?> </td>
                                        <td><?php echo$result['area_sqft']; ?> </td>
                                        <td><?php echo$result['bedroom']; ?> </td>
                                        <td><?php echo$result['description']; ?> </td>
                                        <td><?php echo$result['property_for']; ?> </td>
                                        <td><?php echo$result['payment_mode']; ?> </td>
                                        <td><video height="100px" width="100px" controls> <source src="<?php echo$result['image']; ?>" type="video/mp4"></video> </td>
                                    </tr>
                                <?php
                                }
                            }
                            else{
                                header("Location:post.php?error=filetoobig");
                            }
                        }
                    }
                    else{
                        header("Location:post.php?error=invalidfile");
                    }
                }
                ?>
            </tbody>
        </table>    
        </div>
    </div>

<?php
    include_once 'footer.php';
?>