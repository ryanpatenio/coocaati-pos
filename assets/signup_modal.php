<div class="modal" id="sign_up" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Sign Up</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      
              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Sign Up!</h5>
                    <p class="text-center small">Create New Account</p>
                  </div>

                  <form class="row g-3" method="POST" id="signup_form">

                     <div class="col-12">
                      <label for="" class="form-label">Full Name</label>
                      <input type="text" name="customerName" class="form-control" id="signup_name" required>
                      <div class="invalid-feedback">Please enter your Full Name!</div>
                    </div>
                    <div class="col-12">
                      <label for="" class="form-label">Address</label>
                      <input type="text" name="address" class="form-control" id="signup_address" required>
                      <div class="invalid-feedback">Please enter your Address!</div>
                    </div>
                    <div class="col-12">
                      <label for="" class="form-label">Contact</label>
                      <input type="text" name="contact1" maxlength="11" class="form-control" id="signup_contact" required>
                      <div class="invalid-feedback">Please enter your Contact No.!</div>
                    </div>

                    <div class="col-12">
                      <label for="" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="cust_username" class="form-control" id="signup_email" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="" class="form-label">Password</label>
                      <input type="password" name="cust_password" class="form-control" id="signup_pass" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>


                    <div class="col-12">
                      
                      <input class="btn btn-primary w-100" type="submit" value="Create New Account">
                    </div>
                    
                   

                  </form>
                   <div class="col-12">
                      
                      <input class="btn btn-secondary w-100 mt-2" type="submit" data-bs-toggle="modal" data-bs-target="#login" value="Already have an account?">
                    </div>

                </div>
              </div>
                  </div>
                </div>
        </div>
    </div><!-- End Vertically centered Modal-->
     