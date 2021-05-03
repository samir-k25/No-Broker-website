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
      box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
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
  </style>
</head>
 <body>
 <nav class="navbar navbar-expand-lg navbar-light bg-light "
			style="background-color: #45526e">
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav">
				<a class="nav-item nav-link" href="index.php">Home <span class='sr-only'>(current)</span></span></a>
				<a class="nav-item nav-link" href="property.php">Property</a>
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
        <form method="post" action="include/changepwd.php">
    <div class="main-body">
      <div class="row gutters-sm">
          <div class="col-md-9">
            <div class="card mb-3">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">User Name</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                      
                    <?php
                      $display = "select * from users where usersUid = '".$_SESSION['useruid']."'";
                      $querydis = mysqli_query($conn,$display);
                      while($result = mysqli_fetch_array($querydis)){
                          ?>
                        <input type="text" name="usersuid" value="<?php echo $result['usersUid']; ?>">
                        <?php
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
                        ?>
                        <input type="text" name="usersemail" value="<?php echo $result['usersEmail']; ?>">
                        <?php
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
                        ?>
                        <input type="text" name="usersphone" value="<?php echo "+91 ".$result['usersPhone']; ?>">
                        <?php
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
                        ?>
                        <input type="text" name="usersaddress" value="<?php echo $result['usersAddress']; ?>">
                        <?php
                    }
                  ?>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-9">
      <div class="card mb-3">
        <div class="card-body">
        <form method="post" action="include/changepwd.php">
          Current Password:<br>
          <input type="password" name="currentPassword"><span id="currentPassword" class="required"></span>
          <br>
          New Password:<br>
          <input type="password" name="newPassword"><span id="newPassword" class="required"></span>
          <br>
          Confirm Password:<br>
          <input type="password" name="confirmPassword"><span id="confirmPassword" class="required"></span>
          <br><br>
          <input type="submit">
        </form>
          <form action="index.php">
          <button type="submit" class="btn btn-primary btn-block col-lg-2 m-auto d-block">Update</button>
          </form>
        </div>
       </div>
      </div>
        </div>
      </div>
    </div>
    </form>
  </div>
    

<?php
    include_once 'footer.php';
?>