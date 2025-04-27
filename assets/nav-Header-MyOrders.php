<?php 

//Initialize all function-------------->
require_once 'admin/include/initialize.php';

$member = new user();
$dashboard = new dash();
 ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>CooCaati</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo2.jpg" rel="icon">
  <link href="assets/img/logo2.jpg" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">


   <script src="admin/assets/vendor/jquery-min.js"></script>
  <!-- =======================================================
  * Template Name: Yummy
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>CooCaati<span></span></h1>
      </a>



    <!---------------Nav Bar Area----------------->
       <nav id="navbar" class="navbar">
        <ul>
          <li style="padding-right: 500px;"><a href="<?php echo WEB_ROOT; ?>#home">Home</a></li>


        </ul>
      </nav><!-- .navbar -->
    <!-------------End of Nav Bar------------------->

   
   


  <!-- <a class="rounded-circle"style="background-color: red;" href="#myCart" style=""><span class="bi bi-cart-fill">1</span></a> -->


  <?php
  //lets create a condition * check if the customer already   or Not

  if(!isset($_SESSION['customer_id'])){
    //false * lets echo the sign in button
    ?>
      <a class="btn-book-a-table-d" href="#Login" data-bs-toggle="modal" data-bs-target="#login"><span class="bi bi-lock"></span> Login</a>

    <?php
  }else{
    //true * lets echo the profile button

    ?>


        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">

          <?php $cust_avatar = $member->getCustomerAvatar($_SESSION['customer_id']); ?>
            <img src="<?php echo WEB_ROOT; ?>admin/assets/avatar/<?php echo $cust_avatar; ?>" alt="Profile" class="rounded-circle" style="width: 40px;">
            <span class="d-none d-md-block dropdown-toggle ps-2">
               <?php if(!isset($_SESSION['customer_id'])){

               }else{
                echo $_SESSION['customer_name'];
               } ?> 

            </span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          
            <li>
              <a class="dropdown-item d-flex align-items-center"data-bs-toggle="modal" data-bs-target="#myProfile">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
           <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" id="sign_out_btn">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->

    <?php
  }


   ?>




      

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>


    </div>
  </header><!-- End Header -->

 

  <main id="main">
