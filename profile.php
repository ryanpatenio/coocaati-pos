 <?php if(!isset($_SESSION['customer_id'])){
  //msgBox('ID Not found! Error!');

 }else{
  
  $customer_id = $_SESSION['customer_id'];
  $customerData = $member->getCustomerData($customer_id);
 }
 

  ?>


 <!-----Add Request Modal------->
    <div class="modal fade modal-lg" id="myProfile" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">My Profile</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      
                <div class="card-body">
               	  <div class="row">
               	  	<div class="col">

                  <!-- Profile Edit Form -->
                  <form method="POST" id="updateCustomerProfile" enctype="multipart/form-data">

                    <input type="hidden" id="customer_id" name="customer_id" value="<?php echo $customerData->customer_id ?>" > 

                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="admin/assets/avatar/<?php echo $customerData->avatar ?>" id="customer_display_avatar" width="150" id="display_avatar" alt="Profile">
                        <div class="pt-2">

                        <input type="hidden" name="hidden_customer_avatar" value="<?php echo $customerData->avatar ?>">
                      
                          <input type="file" id="customer_avatar" name="customer_avatar" accept="image/*" class="form-control" title="Upload new profile image">
                          <!-- <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a> -->
                        </div>
                      </div>
                    </div>

                    
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="customer_name" type="text" class="form-control" id="customer_name" value="<?php echo $customerData->name ?>">
                      </div>

                      <label  for="contact" class="col-md-4 col-lg-3 col-form-label">Contact No.</label>
                      <div class="col-md-8 col-lg-9 mt-2">
                        <input name="contactNumber" type="text" maxlength="11" class="form-control"  value="<?php echo $customerData->contact ?>">
                      </div>
                      <label  for="address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                      <div class="col-md-8 col-lg-9 mt-2">
                        <input name="customer_address" type="text" class="form-control"  value="<?php echo $customerData->address ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Job" class="col-md-6 col-lg-3 col-form-label">Old Password</label>
                      <div class="col-md-8 col-lg-9">
                      	<input type="password" class="form-control" name="oldPassword">
	                       
                      </div>
                      
                    </div>
                   

                    <div class="row mb-3">
                      <label for="Job" class="col-md-6 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                      	<input type="password" class="form-control" id="newPassword" name="newPassword">
	                       
                      </div>

                    </div>
                    <span id="error_message"></span>

                    <div class="row mb-3">
                      <label for="Job" class="col-md-6 col-lg-3 col-form-label">Confirm Password</label>
                      <div class="col-md-8 col-lg-9">
                      	<input type="password" class="form-control" id="conPassword" name="conPassword">
	                       
                      </div>
                      
                    </div>
                    <span id="error_message"></span>
				</div>


                    </div>
                  <!--   <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div> -->
                     </div>                       
                     
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <input type="submit" class="btn btn-primary" name="save" id="save" value="Save">
                    </div>
                </form>
                  </div>
                </div>

            </div>

  <!----End of Modal------>

  <script type="text/javascript">

    $('#customer_avatar').change(function(e){
    e.preventDefault();
    let output_img = document.getElementById("customer_display_avatar");
      output_img.src=URL.createObjectURL(event.target.files[0]);
        output_img.onload = function(){
          URL.revokeObjectURL(output_img.src);
        };
       
  });

  $(document).on('submit','#updateCustomerProfile',function(e){
    e.preventDefault();

    let newP = $('#newPassword').val();
    let conP = $('#conPassword').val();

    let fd = new FormData($(this)[0]);
    let file = $('#customer_display_avatar')[0].files;


    if(newP != conP){
      msg('New Password And Confirm Password Not Match!','warning');
    }else{
      $.ajax({
        url:'admin/include/customerServer.php?action=updateCustomerProfile',
        method:'POST',
        data: fd,
        cache:false,
        async:false,        
        contentType:false,
        processData:false,

        success:function(data){
          //console.log(data);
            if(data == 1 || data == 1010){
                message('Profile Update successfully!','success');
            }
           
            if(data == 100){
                message('Unexpected error 100!','error');
            }
            if(data == 200){
                message('Unexpected error 200!','error');
            }
            if(data == 400){
               message('Unexpected error 200!','error');
            }
            if(data == 900){
              msg('Old Password Not Match!','error');
            }
            
        },

        error:function(xhr,status,error){
            alert(xhr.responseText);
        }
        

    });
    }


  });

$(document).on('keyup','#conPassword',function(e){
    e.preventDefault();

    let newPass = $('#newPassword').val();
    let rePass = $(this).val();

    if(newPass != ''){
        if(newPass != rePass){
            $('#error_message').text('Password Not Match!');
            $('#error_message').attr('class','text-danger');
        }else{
            $('#error_message').text('Password Match!');
            $('#error_message').attr('class','text-success');
        }
    }else{
        $('#error_message').text('');
        $('error_message').attr('class','');
    }

});
$(document).on('keyup','#newPassword',function(e){
    e.preventDefault();

    let rePass = $('#conPassword').val();
    let newPass = $(this).val();

    if(rePass != ''){
        if(rePass != newPass){
            $('#error_message').text('Password Not Match!');
            $('#error_message').attr('class','text-danger');
        }else{
            $('#error_message').text('Password Match!');
            $('#error_message').attr('class','text-success');
        }
    }
    else{
        $('#error_message').text('');
        $('#error_message').attr('class','');
    }

});




  </script>
