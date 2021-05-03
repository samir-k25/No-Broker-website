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
				<a class="nav-item nav-link active" href="contact.php">Contact Us <span class='sr-only'>(current)</span></a>
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
                        echo "<p>Hello ". $_SESSION["useruid"] . "!</p>";
                    }
                ?>
				</div>
			</div>
		</nav>
            <br>
            <br>
            <br>
            <div class="container">
                <!--Google map-->
                <div class="col-mb-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1882.303492460604!2d72.84484582175854!3d19.342853220591813!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7ae4c26389807%3A0xa2a2f8604c5bdc7c!2sJV%20Plaza%2C%20Dias%20%26%20Pereira%20Nagar%2C%20Naigaon%20West%2C%20Naigaon%2C%20Maharashtra%20401207!5e0!3m2!1sen!2sin!4v1614971199458!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3" style="position: absolute; top: 150px; right:250px; width: 200px; height: 120px;">
            <h6 class="text-uppercase mb-4 font-weight-bold">Location</h6>
            <p><i class="fas fa-home mr-3"></i> J.V Plaza A/14,<br>Beach Complex, Naigaon(West).</p>
            <p><i class="fas fa-envelope mr-3"></i>samir.khan@avc.ac.in</p>
            <p><i class="fab fa-whatsapp mr-3"></i> + 91 8550 937 730</p>
            <p><i class="fas fa-phone mr-3"></i> + 91 9326 636 764</p>
          </div><br><br><br>
<?php
    include_once 'footer.php';
?>