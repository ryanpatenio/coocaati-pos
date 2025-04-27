<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="../admin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../admin/assets/vendor/jquery-min.js"></script>
</head>
<body>
    
    <div class="container-fluid vh-100">
        <div class="d-flex justify-content-center align-items-center h-100">

            <div class="card shadow-lg" style="width: 500px; height:auto">                
                <div class="card-body px-5 py-5">
                    <div class="row mt-2">
                       <div class="d-flex flex-column justify-content-center  align-items-center mb-4">
                            <h2>Login</h2>
                            <p>Enter you Username and Password to Login</p>
                       </div>
                       <div class="flex-column justify-content-center">
                           
                       </div>
                    </div>
                    <!---Login Form---->
                    <form class="row g-3" method="POST" id="LoginForm">
                        <div class="row mt-2">
                            <div class="col">
                                <label for="" class="form-label">Username</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                    <input type="email" class="form-control py-2" name="signin_customer_email" placeholder="username" required>
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
                                    <input type="password" name="signin_customer_password" class="form-control py-2" placeholder="Password" required>
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
                    <div class="row">
                        <div class="d-flex  justify-content-center align-items-center mt-2">
                            <p> No account yet? <a href="register.php">Register here!</a></p>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="../admin/allScript/sweet.js"></script>

<script>
    $(document).ready(function(){
        $(document).on('submit','#LoginForm',function(e){
        e.preventDefault();

        $.ajax({
            url:'../admin/include/loginserver.php?action=customer_login',
            method:'POST',
            data:$(this).serialize(),
            cache:false,
            async:false,

            beforeSend:function(){

            },

            success:function(data){
            console.log(data)
            if(data == 1){
                window.location.href="../";
            }else{
                msg('Invalid Username or Password!','error');
            }
                        
            },

            error:function(xhr,status,error){
            alert(xhr.responseText);
            }

        });
        });

    });

    
const msg = (message='',type='') =>{
    swal(message, {
        icon: type,
    });
}
      </script>
</body>
</html>