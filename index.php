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
        <style>
        </style>
        </head>
        <body style="color: #1a202c; text-align: left; background-color: #e2e8f0;">
		<nav class="navbar navbar-expand-lg navbar-light bg-light "
			style="background-color: #45526e">
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav">
				<a class="nav-item nav-link active" href="index.php">Home <span class='sr-only'>(current)</span></span></a>
				<a class="nav-item nav-link" href="property.php">What we do</a>
				<a class="nav-item nav-link " href="contact.php">Contact Us </a>
			    <?php
                    if (isset($_SESSION["useruid"])) {
                      echo "<a class='nav-item nav-link' href='post.php'>Post property</a>";
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
                        echo "<p>Hello! ". $_SESSION["useruid"] . "</p>";
                    }
                ?>
                </section>
			</div>
			</div>
		</nav>
        <br><br>

<div class="text-center">
    <?php
        if (isset($_SESSION["useruid"])) {
            echo '<form action="post.php">';
            echo '<p>----Are you a Property Owner?----</p><button type="submit" name="post" class="btn btn-primary btn-block col-lg-3 m-auto d-block">Post your property for free</button>';
            echo '</form>';
        }
        else{
            echo '<form action="login.php">';
            echo '<p>----Are you a Property Owner?----</p><button type="submit" name="post" class="btn btn-primary btn-block col-lg-3 m-auto d-block">Post your property for free</button>';
            echo '</form>';
        }
    ?>
    
</div><br><br> 

<h1 class="text-dark bg-white text-center">Property for SALE / RENT</h1>

<div clas="container">
<div class="card-columns">
<?php
$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'property');
$display = "select * from apartment ORDER by id DESC";
$querydis = mysqli_query($con,$display);
//$row = mysqli_num_rows($querydis);
while($result = mysqli_fetch_assoc($querydis)){
?>

    
        <div class="card bg-light h-500">
            <div class="card-body text-center">
            <p class="card-text"><video class="card-img-top" height="200px" width="200px" controls> <source src="<?php echo$result['image']; ?>" type="video/mp4"></video></p>
            <div class="row">
            <div><h6 class="mb-0">Address:</h6></div>
            <div class="col-sm-9 text-secondary"><?php echo$result['address']; ?></div>
            </div><hr>
            <div class="row">
            <div><h6 class="mb-0">Seller ID:<h6></div>
            <div class="col-sm-9 text-secondary">
                <?php 
                        if (isset($_SESSION["useruid"])) {
                            echo $result['seller_name']; ?> </td><?php
                        }
                        else{
                            echo "****";
                        }

                        ?></div>
            </div><hr>
            <div class="row">
            <div><h6 class="mb-0">Contact_no:  <h6></div>
            <div class="col-sm-9 text-secondary">
                    <?php 
                        if (isset($_SESSION["useruid"])) {
                            echo "+91 " . $result['seller_number']; ?> </td><?php
                        }
                        else{
                            echo "+91*******";
                        }
                        ?></div>
            </div><hr>
            <div class="row">
                <div><h6 class="mb-0">Price &#8377; :<h6></div>
                <div class="col-sm-9 text-secondary">
                <?php echo "&#8377; " . $result['price']; ?></div>
            </div><hr>
            <div class="row">
                <div><h6 class="mb-0">Area Sqft:<h6></div>
                <div class="col-sm-8 text-secondary">
                <?php echo$result['area_sqft']; ?></div>
            </div><hr>
            <div class="row">
                <div><h6 class="mb-0">Bedroom:<h6></div>
                <div class="col-sm-8 text-secondary">
                <?php echo$result['bedroom']; ?></div>
            </div><hr>
            <div class="row">
                <div><h6 class="mb-0">Specification:<h6></div>
                <div class="col-sm-9 text-secondary">
                <?php echo$result['description']; ?></div>
            </div><hr>
            <div class="row">
                <div><h6 class="mb-0">Property For:<h6></div>
                <div class="col-sm-9 text-secondary">
                <?php echo$result['property_for']; ?></div>
            </div><hr>
            <div class="row">
                <div><h6 class="mb-0">Payment in:<h6></div>
                <div class="col-sm-9 text-secondary">
                <?php echo$result['payment_mode']; ?></div>
            </div><br>
            <div class="text-left">
                <?php
                if (isset($_SESSION["useruid"])) {
                    ?>
                    <form action="tel:<?php echo $result['seller_number']; ?>">
                        <button type="submit" class="btn btn-primary">Call <?php echo "+91 " . $result['seller_number']; ?></button>
                    </form>
                    <?php
                }
                else{
                    echo 'For more Information <a href="login.php">Login </a>';
                }
                ?>
            </div>
            </div>
        </div>
        <?php
            }
        ?>
    </div>
</div>


        <!--<br>
        <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover text-center">
            <thead class="text-white" style="background-color: #45526e">
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
                /*$con = mysqli_connect('localhost','root');
                mysqli_select_db($con,'property');
                $display = "select * from apartment";
                $querydis = mysqli_query($con,$display);
                //$row = mysqli_num_rows($querydis);
                while($result = mysqli_fetch_assoc($querydis)){
                ?>
                <tr>
                    <td><?php echo$result['address']; ?> </td>
                    <td><?php 
                        if (isset($_SESSION["useruid"])) {
                            echo $result['seller_name']; ?> </td><?php
                        }
                        else{
                            echo "****";
                        }

                        ?>
                    <td><?php 
                        if (isset($_SESSION["useruid"])) {
                            echo "+91 " . $result['seller_number']; ?> </td><?php
                        }
                        else{
                            echo "+91*******";
                        }
                        ?>
                    <td><?php echo$result['price']; ?> </td>
                    <td><?php echo$result['area_sqft']; ?> </td>
                    <td><?php echo$result['bedroom']; ?> </td>
                    <td><?php echo$result['description']; ?> </td>
                    <td><?php echo$result['property_for']; ?> </td>
                    <td><?php echo$result['payment_mode']; ?> </td>
                    <td><video height="200px" width="200px" controls> <source src="<?php echo$result['image']; ?>" type="video/mp4"></video> </td>
                </tr>
                <?php
                }
                */?>
            </tbody>
        </table>    
        </div>-->
    </div><br><br>
    <?php
        if (isset($_GET["error"])){
            if ($_GET["error"] == "UploadSuccessfull"){
                echo '<script>alert("Successfully Uploded your property!!")</script>';
            }
            if ($_GET["error"] == "accountdeleted"){
                echo '<script>confirm("Sorry to see you go 😔")</script>';
            }
        }
    ?>

<?php
    include_once 'footer.php'
?>