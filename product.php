<section id="product" class="menu">
<input type="hidden" id="hidden_customer_id" name="" value="<?php if(!isset($_SESSION['customer_id'])){

echo 'null';

}else{

  echo $_SESSION['customer_id'];
} ?>">  
  <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Our Product</h2>
          <p>Check Our <span>Products</span></p>
        </div>

        <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">

          <li class="nav-item">
            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#menu-starters">
              <h4>Cakes</h4>
            </a>
          </li><!-- End tab nav item -->

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-breakfast">
              <h4>Breads</h4>
            </a><!-- End tab nav item -->

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-lunch">
              <h4>Drinks</h4>
            </a>
          </li><!-- End tab nav item -->

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-dinner">
              <h4>Desserts</h4>
            </a>
          </li><!-- End tab nav item -->

        </ul>


        <div class="tab-content" data-aos="fade-up" data-aos-delay="300">

          <div class="tab-pane fade active show" id="menu-starters">

            <div class="tab-header text-center">
              <p>Products</p>
              <h3>Cakes</h3>
            </div>

            <div class="row gy-5">

              <?php

              $dataCakes = getProductCakes();
              if($dataCakes){
                foreach ($dataCakes as $dataRes) {
                  # code...
                  ?>

              <div class="col-lg-4 menu-item">
                <a href="#"  class="glightbox"><img src="admin/assets/avatar/<?php echo $dataRes['avatar']; ?>" class="menu-img img-fluid" alt=""></a>
                <h4><?php echo $dataRes['prod_name']; ?></h4>
                <p class="ingredients">
                  <?php echo $dataRes['prod_desc']; ?>
                </p>
                <p class="price">
                ₱  <?php echo $dataRes['prod_price']; ?>
                </p>
                <button type="button" class="btn btn-md btn-danger" id="add_to_cart" data-id="<?php echo $dataRes['prod_id']; ?>"> add to cart</button>
              </div><!-- Menu Item -->


                  <?php

                }
              }

               ?>


            </div>
          </div><!-- End Starter Menu Content -->




          <div class="tab-pane fade" id="menu-breakfast">

            <div class="tab-header text-center">
              <p>Products</p>
              <h3>Breads</h3>
            </div>

            <div class="row gy-5">

              <?php

              $dataBread = getProductBreads();
              if($dataBread){

                foreach ($dataBread as $dataRes2) {
                  ?>

              <div class="col-lg-4 menu-item">
                <a href="#" class="glightbox"><img  src="admin/assets/avatar/<?php echo $dataRes2['avatar']; ?>" class="menu-img img-fluid" alt=""></a>
                <h4><?php echo $dataRes2['prod_name']; ?></h4>
                <p class="ingredients">
                  <?php echo $dataRes2['prod_desc']; ?>
                </p>
                <p class="price">
                 ₱ <?php echo $dataRes2['prod_price']; ?>
                </p>
               
                 <button type="button" class="btn btn-md btn-danger" id="add_to_cart" data-id="<?php echo $dataRes2['prod_id']; ?>"> add to cart</button>
              </div><!-- Menu Item -->

                  <?php
                }

              }

               ?>


            </div>
          </div><!-- End Bread Menu Content -->





          <div class="tab-pane fade" id="menu-lunch">

            <div class="tab-header text-center">
              <p>Products</p>
              <h3>Drinks</h3>
            </div>

            <div class="row gy-5">

              <?php

              $dataDrinks = getProductDrinks();
              if($dataDrinks){
                foreach ($dataDrinks as $dataRes3) {
                  ?>
              <div class="col-lg-4 menu-item">
                <a href="#" class="glightbox"><img src="admin/assets/avatar/<?php echo $dataRes3['avatar']; ?>" class="menu-img img-fluid" alt=""></a>
                <h4><?php echo $dataRes3['prod_name']; ?></h4>
                <p class="ingredients">
                  <?php echo $dataRes3['prod_desc']; ?>
                </p>
                <p class="price">
                ₱ <?php echo $dataRes3['prod_price']; ?>
                </p>
               <button type="button" class="btn btn-md btn-danger" id="add_to_cart" data-id="<?php echo $dataRes3['prod_id']; ?>"> add to cart</button>
              </div><!-- Menu Item -->


                  <?php
                }
              }

               ?>

            </div>
          </div><!-- End Lunch Menu Content -->




          <div class="tab-pane fade" id="menu-dinner">

            <div class="tab-header text-center">
              <p>Products</p>
              <h3>Desserts</h3>
            </div>

            <div class="row gy-5">

              <?php

              $dataDessert = getProductDesserts();
              if($dataDessert){
                foreach ($dataDessert as $dataRes4) {
                  ?>
              <div class="col-lg-4 menu-item">
                <a href="#" class="glightbox"><img src="admin/assets/avatar/<?php echo $dataRes4['avatar']; ?>" class="menu-img img-fluid" alt=""></a>
                <h4><?php echo $dataRes4['prod_name']; ?></h4>
                <p class="ingredients">
                  <?php echo $dataRes4['prod_desc']; ?>
                </p>
                <p class="price">
                 ₱ <?php echo $dataRes4['prod_price']; ?>
                </p>
               <button type="button" class="btn btn-md btn-danger" id="add_to_cart" data-id="<?php echo $dataRes4['prod_id']; ?>"> add to cart</button>
              </div><!-- Menu Item -->                  


                  <?php
                }
              }


               ?>


            </div>
          </div><!-- End Dinner Menu Content -->

        </div>

      </div>

</section>


<!-------------ADD QUANTITY MODAL---------------->

        <div class="modal" id="addQtyModalCus" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">add to cart</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="post" id="add_to_cart_form2">

                        <input type="hidden" name="hidden_customer_id2" id="hidden_customer_id2">
                        <input type="hidden" name="hidden_prod_id" id="hidden_prod_id">

                        <div class="row-2">
                          <div class="col">
                            <img src="" width="100" id="prod_avatar" alt="Profile">

                          </div>
                          <div class="col mt-1">
                            <label class="form-label" id="prod_name">Product Name : <strong>Dark Chocolates</strong></label>
                           
                          </div>
                          <div class="col mt-1">
                            <label class="form-label" >Price : <strong id="prod_price"></strong></label>

                           
                          </div>
                                                 
                        </div>

                        <div class="row">
                           <div class="col">
                            <label class="form-label">Quantity</label>
                        <input type="number" min="0" name="quantity2" required="" id="quantity2" class="form-control">
                          </div>
                        </div>

                      
                      
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <input type="submit" class="btn btn-primary" id="add_to_cart2" name="add_to_cart2" value="add">
                    </div>
                    </form>
                  </div>
                </div>
              </div><!-- End Vertically centered Modal-->

<?php

function getProductCakes(){
  global $mydb;

  $mydb->setQuery("select p.prod_id,p.prod_name,p.prod_price,p.avatar,p.prod_desc from product p,category c where p.cat_id = c.cat_id and c.cat_id = 1");
  $cur = $mydb->executeQuery();
  $numrows = $mydb->num_rows($cur);


  if($numrows > 0){
    return $cur;
  }else{
    return false;
  }

}

function getProductBreads(){
  global $mydb;

  $mydb->setQuery("select p.prod_id,p.prod_name,p.prod_price,p.avatar,p.prod_desc from product p,category c where p.cat_id = c.cat_id and c.cat_id = 2");
  $cur = $mydb->executeQuery();
  $numrows = $mydb->num_rows($cur);


  if($numrows > 0){
    return $cur;
  }else{
    return false;
  }

}

function getProductDrinks(){
  global $mydb;

  $mydb->setQuery("select p.prod_id,p.prod_name,p.prod_price,p.avatar,p.prod_desc from product p,category c where p.cat_id = c.cat_id and c.cat_id = 13");
  $cur = $mydb->executeQuery();
  $numrows = $mydb->num_rows($cur);


  if($numrows > 0){
    return $cur;
  }else{
    return false;
  }

}

function getProductDesserts(){
  global $mydb;

  $mydb->setQuery("select p.prod_id,p.prod_name,p.prod_price,p.avatar,p.prod_desc from product p,category c where p.cat_id = c.cat_id and c.cat_id = 14");
  $cur = $mydb->executeQuery();
  $numrows = $mydb->num_rows($cur);


  if($numrows > 0){
    return $cur;
  }else{
    return false;
  }

}


 ?>