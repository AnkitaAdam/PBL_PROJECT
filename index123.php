<?php

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Moderna Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <link href="loginstyle.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0"
    rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Moderna
  * Updated: Jan 09 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <style>
    #main-login:hover {
      color: #0097a7;
      background-color: white;
    }
  </style>

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1 class="text-light"><img src="pictlogo.png" class="img-fluid" alt="Responsive image"></a></h1>
        <!-- Uncomment below if you prefer to use an image log50o -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>


      <!--navbar-->

      <nav id="navbar" class="navbar ">
        <ul>
          <li><a class="active " href="index.html">Home</a></li>
          <li><a href="about.html">Timetable</a></li>
          <li><a href="services.html">Services</a></li>
          <li><a href="portfolio.html">Portfolio</a></li>
          <li><a href="team.html">Team</a></li>
          <li><a href="blog.html">Blog</a></li>
          <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>
          <li><a href="contact.html">Contact Us</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-cntent-center align-items-center">
    <div id="heroCarousel" class="container carousel carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

      <!-- Slide 1 -->
      <div class="carousel-item active">
        <div class="carousel-container">
          <h2>Welcome to <span>PICT, Pune</span></h2>
          <p> To be the leading and the most sought after institute of education and research in emerging engineering
            and technology disciplines that attract, retains and sustains gifted individuals of significant potential.
          </p>
          <a href="#" id="show-login main-login" class="login-btn" style="
          background: #4fa6d5;
          color: white;
          padding: 9px 44px;
          border-radius: 22px;
          font-weight: 600;
          border: .5px solid rgba(255, 255, 255, 0.2);
      "> Login </a>
          <!-- Popup form begins from here 
            <div class="popup user">
              <div class="close-btn">&times;</div>
              <div class="form">
                <h2 style="color: #000; font-size: 25px;"><img src="pictlogo.png" class="img-fluid w-25"
                    alt="Responsive image"></h2>
                <div class="form-element">
                  <div style="text-align: left; padding: 5px 0;"><label for="email">Email</label></div>
                  <input type="text" id="email" placeholder="Enter email">
                </div>
                <div class="form-element">
                  <div style="text-align: left; padding: 5px 0;"><label for="password">Password</label></div>
                  <input type="password" id="password" placeholder="Enter Password">
                </div>
                <div class="form-element">
                  <input type="checkbox" id="remember-me">
                  <label for="remember-me">Remember me</label>
                </div>

                <div class="form-element">
                  <button>Sign in</button>
                </div>
                <div class="form-element"></div>
                <a href="#">Forgot password</a>
                <a href="#" class="btn-get-started sub-btn" style="background-color: rgb(26, 172, 208);">Sub-Cordinator Login</a>
              </div>
            </div>
            Popup form ends from here -->
          <div class="blur-bg-overlay"></div>
          <div class="form-popup">
            <span class="close-btn material-symbols-rounded">close</span>
            <div class="form-box login">
              <div class="form-details">

              </div>
              <div class="form-content">
                <h1 style="font-size: 22px;font-family: open-sans, sans-serif;font-weight: 600;padding: 1rem 0;">Teacher
                  Login</h1>
                <form action="#">
                  <div class="input-field">
                    <input type="text" id="user" required>
                    <label>E-mail</label>
                  </div>

                  <div class="input-field">
                    <input type="password" id="pass" requireds>
                    <label>Password</label>
                  </div>
                  
                  <a href="#" class="forgot-pass">Forgot Password</a>
                  <button type="submit" onclick="validate()">Log in</button>
                </form>
                <div class="bottom-link">Are you Subject-Cordinator? <a href="#" id="signup-link">Login</a></div>
              </div>
            </div>
            
            <!--new popup-->
            <div class="form-box signup">

              <div class="form-details">

              </div>
              <div class="form-content">
                <h1 style="font-size: 22px;font-family: open-sans, sans-serif;font-weight: 600;padding: 1rem 0;">
                  Subject-Cordinator Login</h1>
                <form action="#">
                  <div class="input-field">
                    <input type="text" required>
                    <label>E-mail</label>
                  </div>
                  <div class="input-field">
                    <input type="password" required>
                    <label>Password</label>
                  </div>
                  <a href="#" class="forgot-pass">Forgot Password</a>
                  <button type="submit" >Log in</button>
                </form>
                <div class="bottom-link">Are you a Teacher ? <a href="#" id="login-link">Login</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<div class="extra">
</div>
</body>
 
        <script>
          const showPopupBtn = document.querySelector(".login-btn");
          const formPopup = document.querySelector(".form-popup");
          const hidePopupBtn = document.querySelector(".form-popup .close-btn");
          const loginSignupLink = document.querySelectorAll(".form-box .bottom-link a");

          showPopupBtn.addEventListener("click", () => {
            document.body.classList.toggle("show-popup");
          });

          hidePopupBtn.addEventListener("click", () => showPopupBtn.click());

          loginSignupLink.forEach(link => {
            link.addEventListener("click", (e) => {
              e.preventDefault();
              const isSignup = link.id === "signup-link";
              formPopup.classList.toggle("show-signup", isSignup);
              formPopup.classList.toggle("show-login", !isSignup);
            });
          });


          function validate()
          {
            var user=document.getElementById('user').value;
            var pass=document.getElementById('pass').value;
            

          }
</script>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
    class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files-->
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File-->
<script src="assets/js/main.js"></script>

<script>

  document.querySelector("#show-login").addEventListener("click", function () {
    document.querySelector(".popup").classList.add("active");
  });

  document.querySelector(".popup .close-btn").addEventListener("click", function () {
    document.querySelector(".popup").classList.remove("active");
  });

</script>


</html>