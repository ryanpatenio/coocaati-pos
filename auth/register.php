<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="../admin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../admin/assets/vendor/jquery-min.js"></script>
</head>
<body>
    
    <div class="container-fluid min-vh-100 mt-2 mb-2">
        <div class="d-flex justify-content-center align-items-center h-100">

            <div class="card shadow-lg" style="width: 500px;">                
                <div class="card-body px-5 py-5">
                    <div class="row mb-3">
                       <div class="d-flex flex-column justify-content-center  align-items-center">
                            <h2 class="mb-2">Registration Form</h2>                           
                       </div>
                       <div class="flex-column justify-content-center">
                           
                       </div>
                    </div>
                <form class="row g-3" method="POST" id="signup_form">
                    <div class="row mt-2">
                        <div class="col">
                            <label for="" class="form-label">Full Name</label>
                            <div class="input-group">
                                
                                <input type="text" class="form-control py-2" name="customerName" placeholder="Full Name"required>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="" class="form-label">Address</label>
                            <div class="input-group">                          
                                <input type="text" class="form-control py-2" name="address" placeholder="Indo st." required>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="" class="form-label">Contact</label>
                            <div class="input-group">
                                
                                <input type="text" class="form-control py-2" name="contact1" maxlength="11" placeholder="+63" required>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="" class="form-label">Username</label>
                            <div class="input-group">
                                <span class="input-group-text" >@</span>
                                <input type="email" class="form-control py-2" name="cust_username" placeholder="E-mail" required>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="" class="form-label">Password</label>
                            <div class="input-group">
                                
                               <span class="input-group-text">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
                                        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2M5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1"/>
                                    </svg>
                               </span>
                                <input type="password" name="cust_password" class="form-control py-2" placeholder="Password" required>
                            </div>                          
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col mt-3">
                            <button type="submit" class="btn btn-primary w-100">Register</button>                                                
                        </div>
                    </div>
                </form>
                    <div class="row">
                        <div class="d-flex  justify-content-center align-items-center mt-2">
                            <p> Already have an account? <a href="login.php">Login here!</a></p>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="../admin/allScript/sweet.js"></script>

<script>
    const msg = (message='',type='') =>{
        swal(message, {
            icon: type,
        });
    }
    const msgThenRedirect = (text='',msg_type='',location) =>{
        swal(text, {
            icon: msg_type,
            }).then((confirmed)=>{
                window.location.href=location;

            });
        }
    

        $(document).ready(function(){
          $(document).on('submit','#signup_form',function(e){
            e.preventDefault();

            $.ajax({
              url:'../admin/include/loginserver.php?action=customer_signup',
              method:'POST',
              data:$(this).serialize(),
              cache:false,
              async:false,

              beforeSend:function(){

              },
              success:function(data){
              if(data == 1){
                msgThenRedirect('Sign up successfully!','success','login.php');
               }
               if(data == 2){
                msg('Invalid Username or Password!','error');
               }
              //console.log(data);
                             
              },

              error:function(xhr,status,error){
                alert(xhr.responseText);
              }

            });
          });

        });


</script>
</body>
</html>