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
        <body style="color: #1a202c; text-align: left; background-color: #e2e8f0;">
		<nav class="navbar navbar-expand-lg navbar-light bg-light"
			style="background-color: #45526e">
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav">
				<a class="nav-item nav-link" href="index.php">Home</a>
				<a class="nav-item nav-link" href="property.php">What we do</a>
				<a class="nav-item nav-link" href="contact.php">Contact Us </a>
			    <?php
                    if (isset($_SESSION["useruid"])) {
                      echo "<a class='nav-item nav-link' href='post.php'>Post property</a>";
                      echo "<a class='nav-item nav-link' href='profile.php'>Profile</a>";
                      echo "<a class='nav-item nav-link' href='include/logout.inc.php'>Log Out</a>";
                    }
                    else {
                        echo "<a class='nav-item nav-link' href='signup.php'>Register </a>";
                        echo "<a class='nav-item nav-link active' href='login.php'>Log In <span class='sr-only'>(current)</span></a>";
                    }
                ?>
				</div>
			</div>
		</nav>
    <section class="text-center"><br><br><br>
      <h2>Log In</h2>
      <div class="signup-form d-flex justify-content-center">
      <form action="include/login.inc.php" method="post">
        <div class="form-outline mb-4">
          <i class="fa fa-user" aria-hidden="true"></i>
          <input class="input-1" type="text" name="uid" placeholder="User Name OR Email" class="form-control" required><i style="color:red">*</i>
        </div>
        <div class="form-outline mb-4">
          <i class="fa fa-key" aria-hidden="true"></i>
          <input class="input-2" type="password" name="pwd" placeholder="Password" class="form-control" id="myInput" required><i style="color:red">*</i>
         </div>
         <div class="text-left">
         <input type="checkbox" onclick="myFunction()"> Show Password
         </div>
         <button type="submit" name="submit" class="btn btn-primary btn-block">Log In</button>
         <div class="text-center">
          <p>Not a member? <a href="signup.php">Register</a></p>
         </div>  
      </form>
      </div>
    </section>
<?php
        if (isset($_GET["error"])){
          if ($_GET["error"] == "emptyinput"){
            echo '<script>alert("Fill the required data")</script>';
          }
          else if ($_GET["error"] == "wronglogin"){
            echo '<script>alert("Incorrect Log In details...try again!")</script>';
          }
          else if ($_GET["error"] == "incorrectpassword"){
            echo '<script>alert("Incorrect password")</script>';
          }
        }
    ?>

<?php
    include_once 'footer.php'
?>