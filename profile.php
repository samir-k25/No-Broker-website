<?php
 session_start();
 include_once 'include/dbh.inc.php';
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
    body{
      color: #1a202c;
      text-align: left;
      background-color: #e2e8f0;
    } 
    .main-body {
      padding: 15px;
    }

    .card {
      position: relative;
      display: flex;
      flex-direction: column;
      min-width: 0;
      word-wrap: break-word;
      background-color: #fff;
      background-clip: border-box;
      border: 0 solid rgba(0,0,0,.125);
      border-radius: .25rem;
    }

    .card-body {
      flex: 1 1 auto;
      min-height: 1px;
      padding: 1rem;
    }

    .gutters-sm {
      margin-right: -8px;
      margin-left: -8px;
    }

    .gutters-sm>.col, .gutters-sm>[class*=col-] {
      padding-right: 8px;
      padding-left: 8px;
    }
    .mb-3, .my-3 {
      margin-bottom: 1rem!important;
    }

    .bg-gray-300 {
      background-color: #e2e8f0;
    }
    .h-100 {
      height: 100%!important;
    }
    .shadow-none {
      box-shadow: none!important;
    }
    /*Profile Pic Start*/
    .picture-container{
      position: relative;
      cursor: pointer;
      text-align: center;
    }
    .picture{
      width: 106px;
      height: 106px;
      background-color: #999999;
      border: 4px solid #CCCCCC;
      color: #FFFFFF;
      border-radius: 50%;
      margin: 0px auto;
      overflow: hidden;
      transition: all 0.2s;
      -webkit-transition: all 0.2s;
    }
    .picture:hover{
      border-color: #2ca8ff;
    }
    .content.ct-wizard-green .picture:hover{
      border-color: #05ae0e;
    }
    .content.ct-wizard-blue .picture:hover{
      border-color: #3472f7;
    }
    .content.ct-wizard-orange .picture:hover{
      border-color: #ff9500;
    }
    .content.ct-wizard-red .picture:hover{
      border-color: #ff3b30;
    }
    .picture input[type="file"] {
      cursor: pointer;
      display: block;
      height: 100%;
      left: 0;
      opacity: 0 !important;
      position: absolute;
      top: 0;
      width: 100%;
    }
    .picture-src{
      width: 100%;
    }
    /*Profile Pic End*/   
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light " style="background-color: #45526e">
	<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
	  <div class="navbar-nav">
	  	<a class="nav-item nav-link" href="index.php">Home <span class='sr-only'>(current)</span></span></a>
			<a class="nav-item nav-link" href="property.php">What we do</a>
			<a class="nav-item nav-link " href="contact.php">Contact Us </a>
		  <?php
        if (isset($_SESSION["useruid"])) {
          echo "<a class='nav-item nav-link' href='post.php'>Post property</a>";
          echo "<a class='nav-item nav-link active' href='profile.php'>Profile</a>";
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
</nav><br><br>
<div class="container">
  <div class="main-body">
    <div class="row gutters-sm">
      <div class="col-lg-3 md-4 mb-3">
        <div class="card">
          <div class="card-body">
            <div class="d-flex flex-column align-items-center text-center">
              <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="user_profile_pic" class="rounded-circle" width="150">
              <div class="mt-3">
              <h4>
                <?php
                  $display = "select * from users where usersUid = '".$_SESSION['useruid']."'";
                  $querydis = mysqli_query($conn,$display);
                    while($result = mysqli_fetch_array($querydis)){
                      echo $result['usersName'];
                    }
                  ?>
                </h4>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-9">
        <div class="card mb-3">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Full Name</h6>
              </div>
              <div class="col-sm-9 text-secondary">
              <?php
                $display = "select * from users where usersUid = '".$_SESSION['useruid']."'";
                $querydis = mysqli_query($conn,$display);
                while($result = mysqli_fetch_array($querydis)){
                  echo $result['usersName'];
                }
              ?>                      
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <h6 class="mb-0">Email</h6>
            </div>
            <div class="col-sm-9 text-secondary">
              <?php
                $display = "select * from users where usersUid = '".$_SESSION['useruid']."'";
                $querydis = mysqli_query($conn,$display);
                while($result = mysqli_fetch_array($querydis)){
                  echo $result['usersEmail'];
                }
              ?> 
            </div>
          </div>
          <hr>
          <div class="row">
          <div class="col-sm-3">
            <h6 class="mb-0">Phone</h6>
          </div>
          <div class="col-sm-9 text-secondary">
            <?php
              $display = "select * from users where usersUid = '".$_SESSION['useruid']."'";
              $querydis = mysqli_query($conn,$display);
              while($result = mysqli_fetch_array($querydis)){
                echo "+91 ".$result['usersPhone'];
              }
            ?>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <h6 class="mb-0">Address</h6>
          </div>
          <div class="col-sm-9 text-secondary">
            <?php
              $display = "select * from users where usersUid = '".$_SESSION['useruid']."'";
              $querydis = mysqli_query($conn,$display);
              while($result = mysqli_fetch_array($querydis)){
                echo $result['usersAddress'];
              }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="d-flex justify-content-center">
  <form action="pwd.php">
    <input type="submit" class="btn btn-primary" value="Change Password">
  </form>
  <form action="delete.php">
    <input type="submit" onClick='javascript: return confirm("Are you sure you want to delete your account?");' class="btn btn-danger" value="Delete Account">
  </form>
</div>
<br><br> 

  
<h1 class="text-dark bg-white text-center">your property</h1>

<div clas="container">
<div class="card-columns">
<?php
$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'property');
$id = $_SESSION["useruid"];
$display = "select * from apartment where seller_name ='" . $id . "' ORDER by id DESC";
$querydis = mysqli_query($con,$display);
//$row = mysqli_num_rows($querydis);
while($result = mysqli_fetch_assoc($querydis)){
?>    
        <div class="card bg-light h-500">
            <div class="card-body text-center">
            <p class="card-text"><video class="card-img-top" height="200px" width="200px" controls> <source src="<?php echo$result['image']; ?>" type="video/mp4"></video></p>
            <div class="row">
            <div><h6 class="mb-0" style="padding: 5px;">Address:</h6></div>
            <div class="col-sm-6 text-secondary" style="padding: 5px;">
              <?php echo$result['address']; ?></div>
            </div><hr>
            <div class="row">
            <div><h6 class="mb-0" style="padding: 5px;">Contact_no:  <h6></div>
            <div class="col-sm-6 text-secondary" style="padding: 5px;">
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
                <div><h6 class="mb-0" style="padding: 5px;">Price &#8377;:<h6></div>
                <div class="col-sm-6 text-secondary" style="padding: 5px;">
                <?php echo "&#8377; ".$result['price']; ?></div>
            </div><hr>
            <div class="row">
                <div><h6 class="mb-0" style="padding: 5px;">Area Sqft:<h6></div>
                <div class="col-sm-4 text-secondary" style="padding: 5px;">
                <?php echo$result['area_sqft']; ?></div>
            </div><hr>
            <div class="row">
                <div><h6 class="mb-0" style="padding: 5px;">Bedroom:<h6></div>
                <div class="col-sm-4 text-secondary" style="padding: 5px;">
                <?php echo$result['bedroom']; ?></div>
            </div><hr>
            <div class="row">
                <div><h6 class="mb-0" style="padding: 5px;">Specification:<h6></div>
                <div class="col-sm-5 text-secondary" style="padding: 5px;">
                <?php echo$result['description']; ?></div>
            </div><hr>
            <div class="row">
                <div><h6 class="mb-0" style="padding: 5px;">Property For:<h6></div>
                <div class="col-sm-4 text-secondary" style="padding: 5px;">
                <?php echo$result['property_for']; ?></div>
            </div><hr>
            <div class="row">
                <div><h6 class="mb-0" style="padding: 5px;">Payment in:<h6></div>
                <div class="col-sm-4 text-secondary" style="padding: 5px;">
                <?php echo$result['payment_mode']; ?></div>
            </div><br>
        <div class="d-flex justify-content-center">
          <form action="post.edit.php">
            <input type="submit" class="btn btn-primary" value="Edit">
          </form>
          <form action="del.php">
            <input onClick='javascript: return confirm("Are you sure you want to delete this post?");' type="submit" class="btn btn-danger" value="Delete">
          </form>
        </div>
        </div>
        </div>
        <?php
            }
        ?>
    </div>
</div>

  <?php
    if (isset($_GET["error"])){
      if ($_GET["error"] == "postdeleted"){
        echo '<script>alert("Successfully deleted your post!")</script>';
      }
      if ($_GET["error"] == "successfull"){
        echo '<script>alert("Password successfully changed.")</script>';
      }
    }
  ?>



</div>
</div>
<?php
    include_once 'footer.php';
?>