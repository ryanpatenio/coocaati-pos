<?php
  $user_class = new user();
  $user_data = $user_class->getUserData($_SESSION['user_id']);
              
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
  <link href="../assets/img/logo2.jpg" rel="icon">
  <link href="../assets/img/logo2.jpg" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <script src="assets/vendor/jquery-min.js"></script>

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center bg-dark">

  <div class="d-flex align-items-center justify-content-between">
    <i class="bi bi-list toggle-sidebar-btn me-1" style="color: white; position: relative; left: -10px"></i>

    <a href="<?php echo WEB_ROOT."admin/"; ?>" class="logo d-flex align-items-center">
      <span class="d-lg-none d-block" style="color: white;">Coocaati</span> <!-- Show on mobile -->
      <span class="d-none d-lg-block" style="color: white;">Coocaati</span> <!-- hide on mobile -->
    </a>
  </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <!-- <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button> -->
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <!-- <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a> -->
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <?php

              $dashboard_data = new dash();
              $notif_count = $dashboard_data->getCountNotifications();
              $notif_count_today = $dashboard_data->getCountNotificationsToday();

           ?>


           <?php

           if($user_data['type'] == 1){
            echo '

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell" style="color: white;"></i>
            <span class="badge bg-primary badge-number"> '.$notif_count_today.'</span>
          </a>

            ';

           }


            ?>

         <!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications ">
            <li class="dropdown-header">
              <?php

              if($user_data['type'] == 1){
                 $with_ = '';

                  if($notif_count_today > 1){
                    $with_ = 's';
                  }else{
                    $with_ = '';
                  }

                  echo '
                   You have  '.$notif_count_today.' new notification '.$with_.' Today!

                  ';

                  echo '
                  <a href="index.php?page=messages"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                  ';


                  echo '

                    </li>
                    
                    <div class="display_notif">
                      
                    </div>
                  ';



              echo '

                 <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li class="dropdown-footer">
                    <a href="index.php?page=messages">Show all notifications</a>
                  </li>

               
              ';
             
              }



               ?>
             
            </ul>
           

<!--             <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li> -->

<!--             <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="index.php?page=messages">Show all notifications</a>
            </li>

          </ul> -->


          <!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

       <!--  <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text" style="color: white;"></i>
            <span class="badge bg-success badge-number">3</span>
          </a> --><!-- End Messages Icon -->

         <!--  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul>< End Messages Dropdown Items -->

        </li> <!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <div class="avatar-container" style="width: 38px; height: 38px; border-radius: 50%; overflow: hidden;">
              <img src="assets/avatar/<?php echo $user_data['avatar']; ?>" alt="Profile" 
              style="width: 100%; height: 100%; object-fit: cover;">
          </div>
          <span class="d-none d-md-block dropdown-toggle ps-2" style="color: white; font-weight: 500;">
          <?php echo $_SESSION['account_name']; ?>
          </span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile" style="min-width: 220px;">
        <li class="dropdown-header">
            <div class="d-flex align-items-center" style="gap: 10px;"> <!-- Reduced gap -->
                <div style="width: 36px; height: 36px; border-radius: 50%; overflow: hidden; flex-shrink: 0;">
                    <img src="assets/avatar/<?php echo $user_data['avatar']; ?>" alt="Profile" 
                        style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div>
                    <h6 class="mb-0" style="line-height: 1.2;"><?php echo $user_data['account_name']; ?></h6>
                    <small class="text-muted" style="font-size: 0.75rem;">
                        <?php echo ($user_data['type'] == 1) ? "Administrator" : "User"; ?>
                    </small>
                </div>
            </div>
        </li>
        <li><hr class="dropdown-divider m-0"></li>

          <li>
              <a class="dropdown-item d-flex align-items-center py-2" href="index.php?page=profile">
                  <i class="bi bi-person me-2" style="width: 20px; text-align: center;"></i>
                  <span>My Profile</span>
              </a>
          </li>
       <li><hr class="dropdown-divider m-0"></li>

    <li>
        <a class="dropdown-item d-flex align-items-center py-2" id="sign_out_btn_ad">
            <i class="bi bi-box-arrow-right me-2" style="width: 20px; text-align: center;"></i>
            <span>Sign Out</span>
        </a>
    </li>
</ul>
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->


<script type="text/javascript">
  


</script>