 <!-----My Cart Modal------->
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
                            <div class="row mb-2">
                              <div class="col">
                                  <button class="btn btn-sm btn-success" id="showDiscountBtn">Apply Discount</button>
                                  <button class="btn btn-sm btn-danger" id="cancelDiscountBtn" style="display: none;">Cancel</button>
                                </div>
                            </div>

                              <div class="mt-3 mb-2" id="discountForm" style="display: none;">
                                 <div class="row">
                                    <div class="col">
                                      <select class="form-control" name="discount" id="discountSelect" >
                                        <option value="">-- Select Discount --</option>
                                        <?php
                                        $discountData = showDiscount();
                                        foreach ($discountData as $data) {
                                          ?>
                                         <option value="<?=$data['discount_id']?>" data-percent=<?=$data['percent'] ?> data-type=<?= strtolower(trim($data['title'])) ?> ><?= $data['title'] ?> <?=$data['percent'].'%' ?></option>

                                        <?php
                                        }
                                        
                                        ?>
                                     </select>
                                    </div>
                                    
                                 </div>
                               
                              </div>
                              <hr>

                              <!----For ID FORM---->
                              <div id="extraFields" class="" style="display: none;">
                                <label for="cardID">Card ID Number</label>
                                <input type="text" name="cardId" class="form-control mb-2" id="cardId" placeholder="Enter ID Number">

                              </div>

                                <div class="row mt-3">
                                  <div class="col">
                                    <p style="margin-bottom: -5px;"><strong id="total_price_cart">Original Price: 120</strong></p>
                                    <p"><strong>Discounted Price :</strong><strong id="discountedPrice" style="display: none;"></strong></p>
                                  </div>
                                  <div class="col">                                    
                                    <input type="hidden" id="hidden_total_price" name="hidden_total_price">
                                    <input type="hidden" id="hidden_discounted_price" name="hidden_discounted_price">
                                    <input type="hidden" name="cash_total" id="cash_total">
                                    <input type="hidden" name="exchange_total" id="exchange_total">
                                  </div>
                                  
                                </div>
                          </div>
                        </div>

                                           
                     
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" id="checkout" class="btn btn-primary">Checkout</button>
                      
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
<?php

function showDiscount(){
  global $mydb;

  $mydb->setQuery("select * from discount");
  $cur = $mydb->executeQuery();
  $numrows = $mydb->num_rows($cur);

  if($numrows > 0 ){
    return $cur;
  }else{
    return [];
  }
}

?>



<script>
  $(document).ready(function(){

    $('#showDiscountBtn').click(function(e){
      e.preventDefault();

      $(this).css('display','none');
      $('#cancelDiscountBtn').css('display','inline-block')
      $('#discountForm').css('display','inline-block');
      $('#discountSelect').css('display','inline-block')
      $('#discountedPrice').css('display','inline-block');
    });

    $('#cancelDiscountBtn').click(function(e){
      e.preventDefault();

      $(this).css('display','none');

      $('#showDiscountBtn').css('display','inline-block');
      $('#discountForm').css('display','none');
      $('#extraFields').css('display','none');
      $('#discountSelect').css('display','none');
      $('#cardId').val('');
      $('#cardImage').val('');
      $('#discountedPrice').css('display','none');
      $('#hidden_discounted_price').val('0');
      $('#discountSelect').val('');
    })

    $('#discountSelect').on('change',function(e){
      e.preventDefault();

      $('#hidden_discounted_price').val();//set the discounted price into 0


      const selectedOption = $(this).find(':selected');
      const type = selectedOption.data('type');

      if(type === 'pwd' || type === 'student' || type === 'senior'){
        $('#extraFields').css('display','inline-block');
      }else{
        $('#extraFields').css('display','none');
      }

      const percent = parseFloat(selectedOption.data('percent'));
      const original = parseFloat($('#hidden_total_price').val());
      
      const discounted = original - (original * (percent / 100));

      const hidden_discounted_price = $('#hidden_discounted_price').val(); //store discounted price for confirm checkout Modal
      
      $('#hidden_discounted_price').val(discounted); //set the value in the hidden total price
      
      $('#discountedPrice').text(` ${discounted.toFixed(2)}`);

    });

  });
</script>