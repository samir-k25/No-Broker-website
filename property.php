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
    <section style="border:1px; display: block; padding:15px; margin:10px; padding: 15px 0; background-color: #f5f5f5; text-align: center;">
    <div class="nb__288Ss" style="-webkit-box-orient: horizontal; -webkit-box-direction: reverse; -ms-flex-direction: row-reverse; flex-direction: row-reverse;">
    <h4 class="heading-4 font-semi-bold">How it Works </h4>
    <div class="nb__2dUfA" style="-webkit-box-orient: horizontal; -webkit-box-direction: reverse; -ms-flex-direction: row-reverse; flex-direction: row-reverse;">
    <div>
    <img src="https://assets.nobroker.in/static/img/listing/search.jpg" alt="Simple Listing Process">
    </div>
    <div class="nb__1za8g" style="-webkit-box-orient: horizontal; -webkit-box-direction: reverse; -ms-flex-direction: row-reverse; flex-direction: row-reverse;">
    <h4 class="font-semi-bold heading-4">Simple Listing Process</h4>
    <div class="font-light heading-6">
        As an owner you can list your property in a few minutes. Just fill out our super simple form and your property will go live.
    </div>
    </div>
    </div>
    <div class="nb__2dUfA" style="-webkit-box-orient: horizontal; -webkit-box-direction: reverse; -ms-flex-direction: row-reverse; flex-direction: row-reverse;">
    <div>
        <img src="https://assets.nobroker.in/static/img/listing/phonecall.jpg" alt="Tenant Selects Property and Schedules an Appointment"></div>
    <div class="nb__1za8g">
    <h4 class="font-semi-bold heading-4">Tenant Selects Property and Schedules an Appointment</h4>
    <div class="font-light heading-6">
    If a tenant likes your property they will contact you. Both parties will then arrange for a visit.
    </div>
    </div>
    </div>
    <div class="nb__2dUfA" style="-webkit-box-orient: horizontal; -webkit-box-direction: reverse; -ms-flex-direction: row-reverse; flex-direction: row-reverse;">
    <div>
        <img src="https://assets.nobroker.in/static/img/listing/shakeHands.jpg" alt="Deal Closure">
    </div>
    <div class="nb__1za8g" style="-webkit-box-orient: horizontal; -webkit-box-direction: reverse; -ms-flex-direction: row-reverse; flex-direction: row-reverse;">
        <h4 class="font-semi-bold heading-4">Deal Closure</h4>
        <div class="font-light heading-6">
            Owner and tenant meet to close the deal directly.
        </div>
        </div>
        </div>
    </div>
    </section>
    <br><br>

<?php
    include_once 'footer.php';
?>