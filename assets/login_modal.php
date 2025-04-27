<div class="modal" id="login" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Sign In</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      
              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                  </div>

                  <form class="row g-3" method="POST" id="cust_login_form">

                    <div class="col-12">
                      <label for="" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="signin_customer_email" class="form-control" id="signin_email" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="" class="form-label">Password</label>
                      <input type="password" name="signin_customer_password" class="form-control" id="signin_customer_password" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>


                    <div class="col-12">
                      
                      <input class="btn btn-primary w-100" type="submit" value="Login">
                    </div>

                  </form>

                </div>
              </div>
                  </div>
                </div>
        </div>
      </div><!-- End Vertically centered Modal-->
    