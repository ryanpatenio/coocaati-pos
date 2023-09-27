 <!-----Add Request Modal------->

    <div class="modal fade modal-lg" id="myTransaction" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                    <div class="modal-header">
                      <h5 class="modal-title">Transaction History</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                      <!--  <label class="form-label">Search</label>
                          <input type="text" class="form-control mb-3" name="search" id="search-input" placeholder="Search"> -->

                      <div class="card-body">
                        <div class="table-responsive">

                          <table class="table datatable table-light " id="dataTable" width="100%" cellspacing="0">
                            <thead>
                              <tr>
                                <th>Transaction Code</th>
                                <!-- <th>Name</th>  -->
                                <th>Date</th>
                                             
                                <th>Action</th>
                              </tr>
                            </thead>
                            
                            <tbody>

                              <?php

                              $data = show_transaction($customer_id);

                              if($data !='0'){
                                foreach ($data as $res) {
                                  ?>

                                <tr>
                                      <td><?php echo $res['order_code'];  ?></td>
                                      <!-- <td><?php echo $res['name']; ?></td> -->
                                      <td><?php echo date("d M Y",strtotime($res['order_date'])); ?></td>
                                      
                                     
                                      <td>
                                        <button type="button" class="btn btn-primary bi bi-search" id="btn_view_transaction" data-id="<?php echo $res['order_id']; ?>"> View</button>
                                        
                                      </td>
                                </tr>

                                  <?php
                                }
                              }

                               ?>

                             

                            </tbody>
                          </table>
                        </div>


                      </div>                      
                <!--     <nav aria-label="...">
                    <ul class="pagination">
                      <li class="page-item disabled">
                        <span class="page-link">Previous</span>
                      </li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item active" aria-current="page">
                        <span class="page-link">2</span>
                      </li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                      </li>
                    </ul>
                  </nav> -->
                    </div>


                    <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  
                    </div>
                
        </div>
    </div>
</div>


<!------------------MODAL--------------------->

              <div class="modal fade" id="viewModal" tabindex="-1">
                <div class="modal-dialog modal-dialog-scrollable">
                  <div class="modal-content" style="box-shadow: 0 3px 20px 2px rgb(1 1 1 / 0.98);">
                    <div class="modal-header">
                      <h5 class="modal-title">Transaction Details</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                  <input  type="hidden" id="hidden_od_id" name="hidden_od_id" >

                      <div class="card-body">
                        <div class="row">
                         <div class="col">
                            <label class="form-label">Transaction Code : </label>
                            <label class="form-label" ><strong id="od_code">203992</strong></label>
                        </div>
                        <div class="col">
                          <label class="form-label">Date</label>
                          <label ><strong id="od_date"> : August 19,2020</strong></label>
                        </div>
                       </div>
                       <div class="row">
                         <div class="col">
                           <label class="form-label">Customer Name</label>
                           <label class="form-label" ><strong id="od_name">: Romeo</strong></label>
                         </div>
                       </div>
                       <div class="row">
                         <div class="col">
                           <label class="text-center" style="position: relative;margin-left: 40%;margin-right: 40%;"><strong>Purchase</strong></label>
                           <hr>
                           <table class="table table-bordered">
                            <th>No.</th>
                             <th>Product Name</th>
                             <th>Price</th>
                             <th>Quantity</th>

                             <tbody id="trans_table_display">
                               
                             </tbody>

                           </table>
                           <div class="row">
                             <div class="col">
                                <label class="form-label">Total Price</label>
                                <label class="form-label" ><strong id="tt_price">: 400</strong></label>
                             </div>
                           </div>

                           <div class="row">
                             <div class="col">
                               <label class="form-label">Cash</label>
                               <label class="form-label" ><strong id="od_cash"> : 500</strong></label>
                             </div>
                           </div>
                           <div class="row">
                             <div class="col">
                               <label class="form-label">Exchange</label>
                               <label class="form-label" ><strong id="od_exchange">: 100</strong></label>
                             </div>
                           </div>
                         </div>
                       </div>
                      </div>                     
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      
                    </div>
                  </div>
                </div>
              </div><!-- End Basic Modal-->
     

  <?php


function show_transaction($id){
    global $mydb;
    $mydb->setQuery("select o.order_id,o.order_code,c.name,o.order_date from customer c,orders o where c.customer_id = o.customer_id and o.customer_id = {$id} order by o.order_date desc");
    $cur = $mydb->executeQuery();
    $numrows = $mydb->num_rows($cur);

    if($numrows > 0){
      return $cur;
    }else{
      return 0;
    }
  }

   ?>  
