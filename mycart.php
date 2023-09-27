 <!-----Add Request Modal------->
    <div class="modal fade modal-lg" id="myCart" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">My Cart</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" id="customer_cart_form" enctype="multipart/form-data">

                        <input type="hidden" name="idd_customer" value="<?php echo $customer_id; ?>">
                       

                         <div class="card-body">
                          <div class="table-responsive">
                            <table class="table datatable table-light" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                <tr>
                                  <th>No.</th>
                                  <th>Product Name</th>
                                  <th>Price</th>
                                  <th>Quantity</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              
                              <tbody id="table-cart2">
                             

                              </tbody>
                            </table>


                              <p><strong id="total_price_cart">Total: 120</strong></p>
                               <input type="hidden" id="hidden_total_price" name="hidden_total_price">
                               <input type="hidden" name="cash_total" id="cash_total">
                              <input type="hidden" name="exchange_total" id="exchange_total">

                                <div class="text-center">
                                    <button type="submit" id="checkout" class="btn btn-primary">Checkout</button>
                                </div>
                          </div>
                        </div>

                                           
                     
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </form>   
                    </div>
                
                  </div>
                </div>

            </div>

        <!-----------Confirm Payment Modal----------->
              <div class="modal" id="setOrder" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content" style="box-shadow: 0 3px 20px 2px rgb(1 1 1 / 0.98);">
                    <div class="modal-header">
                      <h5 class="modal-title">Comfirm Orders</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="post" id="confirm_payment_form">

                        

                        <label class="form-label">Total Price</label>
                        <input type="number" min="0" readonly="" name="total_pay" id="total_pay" class="form-control">
                     
                      
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <input type="submit" class="btn btn-primary" id="confirm_checkout" name="confirm_checkout" value="Confirm">
                    </div>
                    </form>
                  </div>
                </div>
              </div><!-- End Vertically centered Modal-->

  <!----End of Modal------>
