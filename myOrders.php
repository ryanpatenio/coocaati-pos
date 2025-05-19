<?php include 'assets/nav-Header-MyOrders.php'; ?>


    <!-- ======= Menu Section ======= -->
  
    <!--========This Section is storing hidden customer id because I did not add the product.php
      =============-->

      <input type="hidden" id="hidden_customer_id" name="" value="<?php if(!isset($_SESSION['customer_id'])){

echo 'null';

}else{

  echo $_SESSION['customer_id'];
} ?>">

      <!----=======End of Customer ID===========-->

  <!-- End Menu Section -->

    <!-- ======= Events Section ======= -->






 <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          
          <p>My Orders</p>
        </div>



  <div class="card mb-3">
     <div class="card-header">
            <i class="fas fa-table"></i>
      </div>

          <div class="card-body">
            <div class="table-responsive">
              <table class="table datatable table-light" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Transaction Code</th>
                    <th>Total Price</th>
                    <th>Products</th>
                    <th>Action</th>
                  </tr>
                </thead>
                
                <tbody>

                  <?php
                  $myOrder = getMyOrders($_SESSION['customer_id']);

                  if($myOrder){
                    $i =1;
                   foreach ($myOrder as $data_order) {
                      ?>

                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $data_order['order_code']; ?></td>
                    <td><?php echo $data_order['order_total']; ?></td>
                    <td>
                        
                    <button class="btn btn-primary btn-sm btnDisplayMyOrderlist" type="button" data-id="<?php echo $data_order['order_id']; ?>"  aria-expanded="false">
                      View Order
                    </button>
                      
                      <!--   <ul class="dropdown-menu myOrderListDisplay">
                          <li><a href="#" class="dropdown-item">ChocoLate Hills | 2pcs.</a></li>
                          <li><a href="#" class="dropdown-item">Choco Mocho | 3pcs.</a></li>
                        </ul> -->
                   
                  
                    </td>
                    <td>

                      <?php
                      if($data_order['status'] == '0'){
                        //pending orders
                        echo ' <button type="button" class="btn btn-warning bi bi-send-exclamation disabled" id="" > Pending...</button>

                        ';

                        ?>
                         <button type="button" data-id="<?php echo $data_order['order_id']; ?>" class="btn btn-danger bi bi-x-octagon cancelMyOrder"> Cancel</button>
                        <?php
                      }else if($data_order['status'] == '1'){
                        //approved Orders
                         echo ' <button type="button" class="btn btn-success bi bi-check disabled" id="" >Approved! </button>

                        ';
                      }else if($data_order['status'] == '2'){
                        echo ' <button type="button" class="btn btn-success bi bi-check disabled" id="" >Claimed! </button>

                        ';                        
                      }

                       ?>
                                          
                    </td>
                  </tr>




                      <?php

                  $i++; }

                  }


                   ?>
                  


                </tbody>
              </table>
            </div>
          </div>
    </div> 


      </div>
    </section>


<!--Drafted Orders--->
 <section id="contact2" class="contact2">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          
          <p>Drafted Orders</p>
        </div>

  <div class="card mb-3">
     <div class="card-header">
            <i class="fas fa-table"></i>
      </div>

          <div class="card-body">
            <div class="table-responsive">
              <table class="table datatable table-light" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Transaction Code</th>
                    <th>Total Price</th>
                    <th>Products</th>
                    <th>Action</th>
                  </tr>
                </thead>
                
                <tbody>

                  <?php
                  $DraftOrder = getDraftOrders($_SESSION['customer_id']);

                  if($DraftOrder){
                    $i =1;
                   foreach ($DraftOrder as $data_order) {
                      ?>

                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $data_order['order_code']; ?></td>
                    <td><?php echo $data_order['order_total']; ?></td>
                    <td>
                        
                    <button class="btn btn-primary btn-sm btnDisplayMyOrderlist" type="button" data-id="<?php echo $data_order['order_id']; ?>"  aria-expanded="false">
                      View Orders
                    </button>
                      
                      <!--   <ul class="dropdown-menu myOrderListDisplay">
                          <li><a href="#" class="dropdown-item">ChocoLate Hills | 2pcs.</a></li>
                          <li><a href="#" class="dropdown-item">Choco Mocho | 3pcs.</a></li>
                        </ul> -->
                   
                  
                    </td>
                    <td>

                      <button type="button" data-id="<?php echo $data_order['order_id']; ?>" class="btn btn-success bi bi-check BtnReOrder"> ReOrder</button>
                    </td>
                  </tr>




                      <?php

                  $i++; }

                  }


                   ?>
                  


                </tbody>
              </table>
            </div>
          </div>
    </div> 


      </div>
    </section>





    <!-- End About Section -->
    <?php include('profile.php'); ?>
    <?php require_once('mycart.php'); ?>
    <?php require_once('assets/signup_modal.php'); ?>
    <?php require_once('assets/login_modal.php'); ?>



<!--------------MODAL--------------->
              <div class="modal fade" id="viewMyOrdersModal" tabindex="-1">
                <div class="modal-dialog modal-dialog-scrollable">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">My Order List</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                      <div class="row mb-2">
                        <div class="col">
                          <label for="">Transaction Code : <strong id="transaction-code">123</strong></label>
                        </div>
                        <div class="col">
                          <label for="">Date : <strong id="date">May 12</strong></label>
                        </div>
                      </div>
                      <div class="d-flex justify-content-center align-items-center mt-4 mb-5">
                        <strong>Purchase</strong>
                      </div>

                     <table class="table table-bordered">
                          <th>No.</th>
                          <th>Product Name</th>
                         
                          <th>Quantity</th>
                          <th>Price</th>

                      <tbody id="ListOfMyOrders">
                               
                      </tbody>

                    </table>

                    <div class="row mt-4 mb-2">
                       <div class="col">
                        <label for="">Total Price : <strong id="total-price">1000</strong></label>
                       </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <label for="">Discounted ? : <strong id="discounted">No</strong></label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <label for="">Discounted Type : <strong id="discounted-type">PWD</strong> <strong id="percent" class="text-danger"> (2%)</strong></label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <label for="">Cash : <strong id="cash">0</strong></label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <label for="">Exchange : <strong id="exchange">0</strong></label>
                      </div>
                    </div>
                    
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      
                    </div>
                  </div>
                </div>
              </div><!-- End View Modal-->


  <!-- ======= Footer ======= -->
<?php include 'assets/footer.php'; ?>

 <?php
    #require only of SESSION customer id
    if(!isset($_SESSION['customer_id'])){

    }else{
      require_once('myTransaction.php');
    }


    function getMyOrders($customer_id){
      global $mydb;
      $mydb->setQuery("select o.order_id,o.order_code,o.order_total,o.order_date,o.`status` from customer c,orders o where c.customer_id = o.customer_id and c.customer_id = {$customer_id} and o.`status` in('0','1','2')");
      $cur = $mydb->executeQuery();
      $numrows = $mydb->num_rows($cur);

      if($numrows > 0){
        return $cur;
      }else{
        return false;
      }


    }

    

function getDraftOrders($customer_id){
global $mydb;
      $mydb->setQuery("select o.order_id,o.order_code,o.order_total,o.order_date,o.`status` from customer c,orders o where c.customer_id = o.customer_id and c.customer_id = {$customer_id} and o.`status` = 4");
      $cur = $mydb->executeQuery();
      $numrows = $mydb->num_rows($cur);

      if($numrows > 0){
        return $cur;
      }else{
        return false;
      }


}


     ?>
<script type="text/javascript">
    $(document).ready(function(){

        $(document).on('click','.btnDisplayMyOrderlist',function(e){
          let order_id = $(this).attr('data-id');
            
           // alert(order_id)
          $.ajax({
            url:'admin/include/customerServer.php?action=getMyOrderList',
            method:'POST',
            data:{order_id:order_id},

            beforeSend:function(){

            },
            success:function(data){
              //console.log(data);
              $('#ListOfMyOrders').html(data);
              getSelectedOrdersData(order_id);            
             
            },
            complete:function(){
               $('#viewMyOrdersModal').modal('show');
            },

            error:function(xhr,status,error){
              alert(xhr.responseText);
            }



          });

        });

$(document).on('click','.cancelMyOrder',function(e){
   e.preventDefault();

    let order_id = $(this).attr('data-id');

          swal({
            title: "Are you sure you want Cancel Your Order!?",
            text:'Once you cancel your Order it will move into your draft!',
            icon: "info",
            buttons: true,
            dangerMode: true,
            }).then((willconfirmed) => {

              if(willconfirmed){
                $.ajax({
                    url:'admin/include/customerServer.php?action=cancelMyOrder',
                    method:'POST',
                    data:{order_id:order_id},

                    beforeSend:function(){

                    },
                    success:function(data){
                      if(data == 1){
                        message('Order Canceled Successfully!','success');
                      }
                    },

                    error:function(xhr,status,error){
                        alert(xhr.responseText);
                    }

                });
              }



            });

        });




$(document).on('click','.BtnReOrder',function(e){
   e.preventDefault();

    let order_id = $(this).attr('data-id');

          swal({
            title: "Are you sure you want Restore Your Order!?",
            text:'Once you restore your Order it will move into your My Order List!',
            icon: "info",
            buttons: true,
            dangerMode: true,
            }).then((willconfirmed) => {

              if(willconfirmed){
                $.ajax({
                    url:'admin/include/customerServer.php?action=restoreMyOrder',
                    method:'POST',
                    data:{order_id:order_id},

                    beforeSend:function(){

                    },
                    success:function(data){
                      if(data == 1){
                        message('Order Restored Successfully!','success');
                      }
                      //console.log(data);
                    },

                    error:function(xhr,status,error){
                        alert(xhr.responseText);
                    }

                });
              }



            });

        });

       });
       

       function getSelectedOrdersData(id){

          $.ajax({
                    url:'admin/include/customerServer.php?action=getOrderListData',
                    method:'POST',
                    data:{order_id: id},
                    dataType:'json',

                    beforeSend:function(){

                    },
                    success:function(data){
                      
                     // console.log(data);
                        $('#total-price').text(data?.order_total);
                        $('#discounted').text(data?.is_discounted);
                        $('#discounted-type').text(data?.title ?? "No");
                        $('#cash').text(data?.cash ?? 0);
                        $('#percent').text(`(${data?.percent ?? 0} %)`)
                        $('#exchange').text(data?.exchange ?? 0);

                        const options = {
                          year : 'numeric',
                          month : 'long',
                          day : 'numeric'
                        }

                        $('#date').text(new Date(data?.order_date).toLocaleDateString('en-PH',options));
                        $('#transaction-code').text(data?.order_code);


                      if(data == 2){
                        msg('Internal Server Error!','error');
                      }
                    },

                    error:function(xhr,status,error){
                        alert(xhr.responseText);
                    }

                });
       }


     </script>


