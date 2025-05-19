<?php require_once('include/initialize.php'); ?>
<!DOCTYPE html>
<html lang="en">
<!---sadasd---->
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
</head>

<body>
<div class="container-fluid vh-100">
    <div class="d-flex justify-content-center align-items-center h-100">
        <div class="card shadow-lg px-2 py-4" style="width: 400px; height:auto">                
            <div class="card-body">
                <div class="row mt-2">
                    <div class="d-flex flex-column justify-content-center align-items-center mb-1">
                        <h2>Login</h2>
                        <p>Enter your Username and Password to Login</p>
                    </div>
                </div>
                <!---Login Form---->
                <form  method="POST" id="master_lg">
                 
                    <div class="row ">
                        <div class="col">
                            <label for="" class="form-label">Username</label>
                            <div class="input-group">
                                <span class="input-group-text d-flex justify-content-center " style="width: 40px;">@</span>
                                <input type="email" class="form-control py-2" name="myemail" placeholder="username" required>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="" class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text d-flex justify-content-center" style="width: 40px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
                                        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2M5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1"/>
                                    </svg>
                                </span>
                                <input type="password" name="mypassword" class="form-control py-2" placeholder="Password" required>
                            </div>                          
                        </div>
                    </div>
                    <!----Login Button---->
                    <div class="row mt-2">
                        <div class="col mt-3">
                            <button type="submit" class="btn btn-primary w-100">Login</button>                                                
                        </div>
                    </div>
                  
                </form>                
            </div>
        </div>
    </div>
</div>

  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<script src="assets/vendor/jquery-min.js"></script>

<script type="text/javascript">
const resetForm = (thisForm)=>{
    thisForm.get(0).reset();
  }





  $(document).on('submit','#master_lg',function(e){
    e.preventDefault();
    //$("#master_lg").get(0).reset();
    $.ajax({
        url:'include/loginserver.php?action=master',
        method:'POST',
        data:$(this).serialize(),
        async:true,
        cache:false,
        dataType:'json',

        beforeSend:function(){
          
        },
        success:function(data){
         //$("#master_lg").get(0).reset();
          console.log(data);
          if(data.lg_success){
            location.replace('index.php');
          }
          if(data.lg_denied){
            alert('Invalid Username and Password!');
          }
          return false;
        },

        error:function(jqXHR, textStatus, errorThrown){
          console.log(jqXHR.responseText);
        }


      });

  });


</script>