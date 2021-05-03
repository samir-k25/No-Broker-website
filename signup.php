<?php
 session_start();
?>
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
        <script>
          function myFunction() {
            var x = document.getElementById("myInput");
            if (x.type === "password") {
              x.type = "text";
            } else {
              x.type = "password";
            }
          }
        </script>
        </head>
        <body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light"
			style="background-color: #45526e">
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav">
				<a class="nav-item nav-link" href="index.php">Home </span></a>
				<a class="nav-item nav-link" href="property.php">What-we-do</a>
				<a class="nav-item nav-link" href="contact.php">Contact Us </a>
			    <?php
                    if (isset($_SESSION["useruid"])) {
                      echo "<a class='nav-item nav-link' href='post.php'>Post property</a>";
                      echo "<a class='nav-item nav-link' href='profile.php'>Profile</a>";
                      echo "<a class='nav-item nav-link' href='include/logout.inc.php'>Log Out</a>";
                    }
                    else {
                        echo "<a class='nav-item nav-link active' href='signup.php'>Register <span class='sr-only'>(current)</span></a>";
                        echo "<a class='nav-item nav-link' href='login.php'>Log In</a>";
                    }
                ?>
				</div>
			</div>
		</nav>
    <section class="text-center"><br><br><br>
        <h2>Sign Up</h2><br>
        <div class="signup-form d-flex justify-content-center">
        <form action="include/signup.inc.php" method="post">
            <div class="form-outline mb-4">
                <p>
                <i class="fa fa-user" aria-hidden="true"></i>
                <input class="input-1" type="text" name="name" placeholder="Full Name" class="form-control" required><i style="color:red">*</i>
                </p>
            </div>
            <div class="form-outline mb-4">
                <p>
                <i class="fa fa-phone" aria-hidden="true"></i>
                <input class="input-2" type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="phone" placeholder="123-456-7890" class="form-control" required><i style="color:red">*</i>
                </p>
            </div>

            <div class="form-outline mb-4">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <input class="input-3" type="text" name="address" placeholder="Address" class="form-control" required><i style="color:red">*</i>
            </div>

            <div class="form-outline mb-4">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <input class="input-4" type="text" name="email" placeholder="Email" class="form-control" required><i style="color:red">*</i>
            </div>
            <div class="form-outline mb-4">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input class="input-5" type="text" name="uid" placeholder="User Name" class="form-control" required><i style="color:red">*</i>
            </div>
            <div class="form-outline mb-4">
                <i class="fa fa-key" aria-hidden="true"></i>
                <input class="input-6" type="password" name="pwd" placeholder="Password" class="form-control" id="myInput" required><i style="color:red">*</i>
            </div>
            <div class="form-outline mb-4">
                <p>
                <i class="fa fa-key" aria-hidden="true"></i>
                <input class="input-7" type="text" name="pwdrepeat" placeholder="Confirm Password" class="form-control" required><i style="color:red">*</i>
                </p>
                <input style="text-align: left;" type="checkbox" onclick="myFunction()"> Show Password
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
			<div class="text-center">
        <p>Already a member? <a href="login.php">Log In</a></p>
      </div>
        </form>
        </div>
    </section>

    <?php
        if (isset($_GET["error"])){
            if ($_GET["error"] == "emptyinput"){
                echo '<script>alert("Fill the required data")</script>';
            }
            else if ($_GET["error"] == "invaliduid"){
                echo '<script>alert("Invalid username try again!")</script>';
            }
            else if ($_GET["error"] == "invalidemail"){
                echo '<script>alert("Email address is invalid.")</script>';
            }
            else if ($_GET["error"] == "usernametaken"){
                echo '<script>alert("Username already exists.")</script>';
            }
            else if ($_GET["error"] == "passwordsdontmatch"){
                echo '<script>alert("Password dont match...try again!!")</script>';
            }
            else if ($_GET["error"] == "stmtfailed"){
                echo '<script>alert("Something went wrong, try again in sometime.")</script>';
            }
            else if ($_GET["error"] == "character"){
                echo '<script>prompt("Your Password Must Contain At Least 8 Characters!")</script>';
            }
            else if ($_GET["error"] == "number"){
                echo '<script>prompt("Your Password Must Contain At Least 1 Number!")</script>';
            }
            else if ($_GET["error"] == "capital"){
                echo '<script>prompt("Your Password Must Contain At Least 1 Capital Letter!")</script>';
            }
            else if ($_GET["error"] == "lower"){
                echo '<script>prompt("Your Password Must Contain At Least 1 Lowercase Letter!")</script>';
            }
            else if ($_GET["error"] == "password"){
                echo '<script>alert("Password Must Contain At Least 8 Characters, AtLeast 1 Number, 1 Capital Letter, 1 Lowercase Letter!")</script>';
            }
            else if ($_GET["error"] == "none"){
                echo '<script>alert("You have successfully signed up!")</script>';
            }
        }
    ?>

<?php
    include_once 'footer.php'
?>