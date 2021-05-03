  <!-- Footer -->
  <footer class="text-center text-lg-start text-white"
          style="background-color: #45526e"
          >
    <!-- Grid container -->
    <div class="container p-4 pb-0">
      <!-- Section: Links -->
      <section class="">
        <!--Grid row-->
        <div class="row">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">
              No MITM
            </h6>
            <p>
              Using this website, the respective user can post their property and find a genuine buyer and vice versa,
              Hope you enjoy it.
            </p>
          </div>
          <!-- Grid column -->

          <hr class="w-100 clearfix d-md-none" />

          <!-- Grid column -->
          
          <!-- Grid column -->

          <hr class="w-100 clearfix d-md-none" />

          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">
              Useful links
            </h6>
            <p>
              <a class="text-white" href="index.php">Home</a>
            </p>
            <p>
              <a class="text-white" href="post.php">Property</a>
            </p>
            <p>
              <a class="text-white" href="contact.php">Contact Us</a>
            </p>
            <?php
                if (!isset($_SESSION["useruid"])) {
                    echo '<p>
                    <a class="text-white" href="signup.php">Register</a>
                  </p>';
                  echo '<p>
                    <a class="text-white" href="login.php">Log In</a>
                  </p>';
                }
            ?>
            <?php
                if (isset($_SESSION["useruid"])) {
                    echo '<p>
                    <a class="text-white" href="post.php">Post Property</a>
                  </p>';
                  echo '<p>
                    <a class="text-white" href="include/logout.inc.php">Log Out</a>
                  </p>';
                }
            ?>
          </div>

          <!-- Grid column -->
          <hr class="w-100 clearfix d-md-none" />

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
            <p><i class="fas fa-home mr-3"></i> J.V Plaza A/14,<br>Beach Complex Naigaon(West)</p>
            <p><i class="fas fa-envelope mr-3"></i> samir.khan@avc.ac.in</p>
            <p><i class="fab fa-whatsapp mr-3"></i> + 91 8550 937 730</p>
            <p><i class="fas fa-phone mr-3"></i> + 91 9326 636 764</p>
          </div>
          <!-- Grid column -->
        </div>
        <!--Grid row-->
      </section>
      <!-- Section: Links -->

      <hr class="my-3">

      <!-- Section: Copyright -->
      <section class="p-3 pt-0">
        <div class="row d-flex align-items-center">
          <!-- Grid column -->
          <div class="col-md-7 col-lg-8 text-center text-md-start">
            <!-- Copyright -->
            <div class="p-3">
              © 2021 Copyright:
              <a class="text-white" href="index.php"
                 >No MITM</a
                >
            </div>
            <!-- Copyright -->
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-5 col-lg-4 ml-lg-0 text-center text-md-end">
            <!-- Facebook -->
            <a
                href="https://www.facebook.com/profile.php?id=100001978313510"
               class="btn btn-outline-light btn-floating m-1"
               class="text-white"
               role="button"
               >
               <i class="fab fa-facebook-f"></i>
            </a>

            <!-- Google -->
            <a
                href="https://www.linkedin.com/in/samir-khan-2b3411187/"
               class="btn btn-outline-light btn-floating m-1"
               class="text-white"
               role="button"
               ><i class="fab fa-linkedin-in"></i
              ></a>

            <!-- Instagram -->
            <a
                href="https://www.instagram.com/_samir_2501/"
               class="btn btn-outline-light btn-floating m-1"
               class="text-white"
               role="button"
               ><i class="fab fa-instagram"></i
              ></a>
          </div>
          <!-- Grid column -->
        </div>
      </section>
      <!-- Section: Copyright -->
    </div>
    <!-- Grid container -->
  </footer>
  <!-- Footer -->
</body>
</html>