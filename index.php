<?php include 'assets/header.php'; ?>

<?php include 'assets/home_section.php'; ?>
    <!-- ======= Menu Section ======= -->
    <?php include 'product.php'; ?>
  <!-- End Menu Section -->

    <!-- ======= Events Section ======= -->

    <?php include 'best_selling_prod.php'; ?>

  <!-- End Events Section -->


    <!-- ======= Contact Section ======= -->
    <?php include 'contact.php'; ?>
   <!-- End Contact Section -->

    <!-- ======= About Section ======= -->

    <?php include 'about.php'; ?>

    <!-- End About Section -->
    <?php include('profile.php'); ?>
    <?php require_once('mycart.php'); ?>



  <!-- ======= Footer ======= -->
<?php include 'assets/footer.php'; ?>

 <?php
    #require only if SESSION customer id
    if(!isset($_SESSION['customer_id'])){

    }else{
      require_once('myTransaction.php');
    }


     ?>

