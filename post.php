<?php
 session_start();
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
				<a class="nav-item nav-link" href="property.php">What we do</a>
				<a class="nav-item nav-link" href="contact.php">Contact Us </a>
			    <?php
                    if (isset($_SESSION["useruid"])) {
                      echo "<a class='nav-item nav-link active' href='post.php'>Post property <span class='sr-only'>(current)</span></a>";
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
		</nav><br>
    <?php
        if (isset($_SESSION["useruid"])) {
            echo '
            <div class="container">
            <h1 class="text-white bg-dark text-center">
                Post your property
            </h1>
            <div class="col-lg-8 m-auto d-block">
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="address">Address:<i style="color:red">*</i> </label>
                    <input type="text" name="address" id="address" class="form-control" placeholder="Full Address" required>
                </div>
    
                <div class="form-group">
                    <label for="seller_number">Phone Number:<i style="color:red">*</i> </label>
                    <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="seller_number" id="seller_number" class="form-control" placeholder="123-456-7890" required>
                </div>
    
                <div class="form-group">
                    <label for="price">Price &#8377;:<i style="color:red">*</i> </label>
                    <input type="number" name="price" id="price" class="form-control" placeholder="Price in ₹" required>
                </div>
    
                <div class="form-group">
                    <label for="area_sqft">Area sqft:<i style="color:red">*</i> </label>
                    <input type="number" name="area_sqft" id="area_sqft" class="form-control" placeholder="Area in Square foor" required>
                </div>
    
                <div class="form-group">
                    <label for="bedroom">Bedroom:<i style="color:red">*</i></label>
                    <input type="number" name="bedroom" id="bedroom" class="form-control" placeholder="No.of Bedroom" required>
                </div>
    
                <div class="form-group">
                    <label for="description">Property Specification: </label>
                    <input type="text" name="description" id="description" placeholder="E.g Parking, Near by Theatre,Hospital,School etc" class="form-control">
                </div>

                <div class="form-group">
                    <label for="property_for">Property for:<i style="color:red">*</i> </label>
                    <input type="text" name="property_for" id="property_for" placeholder="Sale Or Rent" class="form-control" required>
                </div>
    
                <div class="form-group">
                    <label for="payment_mode">Payment Mode:<i style="color:red">*</i> </label>
                    <input type="text" name="payment_mode" id="payment_mode" placeholder="Cheque OR Cash" class="form-control" required>
                </div>
    
                <div class="form-group">
                    <label for="file">Property Video:<i style="color:red">*</i> </label>
                    <input type="file" name="file" id="file" class="form-control" placeholder="file should not exced 10mb" required>
                </div><br>
    
                <div class="text-center">
                <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-block col-lg-3 m-auto"/>
                <p>Need <a href="property.php">Help?</a></p>
               </div>
            </form>
            </div>
        </div><br>';
        }
        if (isset($_GET["error"])){
            if ($_GET["error"] == "filetoobig"){
                echo '<script>confirm("File should be less than or equal to 10 Mb.")</script>';
            }
            if ($_GET["error"] == "invalidfile"){
                echo '<script>confirm("Only .MP4 file allowed.")</script>';
            }
        }
    ?>
<?php
    include_once 'footer.php';
?>