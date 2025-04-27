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
              <h4>Donuts</h4>
            </a>
          </li><!-- End tab nav item -->

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-breakfast">
              <h4>Meals</h4>
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
            <h3>Donuts</h3>
          </div>

          <div class="row gy-5">

            <?php
            $dataDonuts = getProductDonuts();
            if($dataDonuts) {
              foreach ($dataDonuts as $dataRes) {
            ?>

              <div class="col-xl-4 col-lg-3 col-md-5 col-sm-5 menu-item"> 
                <div class="card h-100 border-0">
                  <a href="#" class="glightbox d-block">
                    <img src="admin/assets/avatar/<?php echo $dataRes['avatar']; ?>" 
                        class="menu-img img-fluid rounded" 
                        style="height: 250px; width: 100%; object-fit: cover;
                        border-radius:10px;
                        " 
                        alt="<?php echo $dataRes['prod_name']; ?>">
                  </a>
                  <div class="card-body p-2"> 
                    <h4 class="h5"><?php echo $dataRes['prod_name']; ?></h4> 
                    <p class="ingredients small text-muted">
                      <?php echo $dataRes['prod_desc']; ?>
                    </p>
                    <p class="price fw-bold">
                      ₱<?php echo number_format($dataRes['prod_price'], 2); ?>
                    </p>
                    <button type="button" class="btn btn-md btn-danger w-100" 
                            id="add_to_cart" 
                            data-id="<?php echo $dataRes['prod_id']; ?>">
                      Add to Cart
                    </button>
                  </div>
                </div>
              </div>

            <?php
              }
            }
            ?>

          </div>
        </div>

          <div class="tab-pane fade" id="menu-breakfast">

            <div class="tab-header text-center">
              <p>Products</p>
              <h3>Meals</h3> <!--Meals-->
            </div>

            <div class="row gy-5">

              <?php

              $dataMeals = getProductMeals();
              if($dataMeals){

                foreach ($dataMeals as $dataRes2) {
                  ?>

                <div class="col-xl-4 col-lg-3 col-md-5 col-sm-5 menu-item"> 
                  <div class="card h-100 border-0">
                    <a href="#" class="glightbox d-block">
                      <img src="admin/assets/avatar/<?php echo $dataRes2['avatar']; ?>" 
                          class="menu-img img-fluid rounded" 
                          style="height: 250px; width: 100%; object-fit: cover;
                          border-radius:10px;
                          " 
                          alt="<?php echo $dataRes2['prod_name']; ?>">
                    </a>
                    <div class="card-body p-2"> <!-- Added card body for content -->
                      <h4 class="h5"><?php echo $dataRes2['prod_name']; ?></h4> <!-- Added h5 class -->
                      <p class="ingredients small text-muted">
                        <?php echo $dataRes2['prod_desc']; ?>
                      </p>
                      <p class="price fw-bold">
                        ₱<?php echo number_format($dataRes2['prod_price'], 2); ?>
                      </p>
                      <button type="button" class="btn btn-md btn-danger w-100" 
                              id="add_to_cart" 
                              data-id="<?php echo $dataRes2['prod_id']; ?>">
                        Add to Cart
                      </button>
                    </div>
                  </div>
                </div>
                  <?php
                }

              }

               ?>


            </div>
          </div><!-- End Meals Menu Content -->

          <div class="tab-pane fade" id="menu-lunch">

            <div class="tab-header text-center">
              <p>Products</p>
              <h3>Drinks</h3> <!--Drinks-->
            </div>

            <div class="row gy-5">

              <?php

              $dataDrinks = getProductDrinks();
              if($dataDrinks){
                foreach ($dataDrinks as $dataRes3) {
                  ?>
                  <div class="col-xl-4 col-lg-3 col-md-5 col-sm-5 menu-item"> 
                    <div class="card h-100 border-0">
                      <a href="#" class="glightbox d-block">
                        <img src="admin/assets/avatar/<?php echo $dataRes3['avatar']; ?>" 
                            class="menu-img img-fluid rounded" 
                            style="height: 250px; width: 100%; object-fit: cover;
                            border-radius:10px;
                            " 
                            alt="<?php echo $dataRes3['prod_name']; ?>">
                      </a>
                      <div class="card-body p-2"> 
                        <h4 class="h5"><?php echo $dataRes3['prod_name']; ?></h4> 
                        <p class="ingredients small text-muted">
                          <?php echo $dataRes3['prod_desc']; ?>
                        </p>
                        <p class="price fw-bold">
                          ₱<?php echo number_format($dataRes3['prod_price'], 2); ?>
                        </p>
                        <button type="button" class="btn btn-md btn-danger w-100" 
                                id="add_to_cart" 
                                data-id="<?php echo $dataRes3['prod_id']; ?>">
                          Add to Cart
                        </button>
                      </div>
                    </div>
                  </div>
                  <?php
                }
              }

               ?>

            </div>
          </div><!-- End Lunch Menu Content -->

          <div class="tab-pane fade" id="menu-dinner">

            <div class="tab-header text-center">
              <p>Products</p>
              <h3>Desserts</h3> <!--Donuts-->
            </div>

            <div class="row gy-5">

              <?php

              $dataDessert = getProductDesserts();
              if($dataDessert){
                foreach ($dataDessert as $dataRes4) {
                  ?>
                <div class="col-xl-4 col-lg-3 col-md-5 col-sm-5 menu-item"> 
                      <div class="card h-100 border-0">
                        <a href="#" class="glightbox d-block">
                          <img src="admin/assets/avatar/<?php echo $dataRes4['avatar']; ?>" 
                              class="menu-img img-fluid rounded" 
                              style="height: 250px; width: 100%; object-fit: cover;
                              border-radius:10px;
                              " 
                              alt="<?php echo $dataRes4['prod_name']; ?>">
                        </a>
                        <div class="card-body p-2"> <!-- Added card body for content -->
                          <h4 class="h5"><?php echo $dataRes4['prod_name']; ?></h4> <!-- Added h5 class -->
                          <p class="ingredients small text-muted">
                            <?php echo $dataRes4['prod_desc']; ?>
                          </p>
                          <p class="price fw-bold">
                            ₱<?php echo number_format($dataRes4['prod_price'], 2); ?>
                          </p>
                          <button type="button" class="btn btn-md btn-danger w-100" 
                                  id="add_to_cart" 
                                  data-id="<?php echo $dataRes4['prod_id']; ?>">
                            Add to Cart
                          </button>
                        </div>
                      </div>
                    </div>
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

function getProductDonuts(){
  global $mydb;

  $mydb->setQuery("select p.prod_id,p.prod_name,p.prod_price,p.avatar,p.prod_desc from product p,category c where p.cat_id = c.cat_id and c.name='Donuts'");
  $cur = $mydb->executeQuery();
  $numrows = $mydb->num_rows($cur);


  if($numrows > 0){
    return $cur;
  }else{
    return false;
  }

}

function getProductMeals(){
  global $mydb;

  $mydb->setQuery("select p.prod_id,p.prod_name,p.prod_price,p.avatar,p.prod_desc from product p,category c where p.cat_id = c.cat_id and c.name = 'Meals'");
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

  $mydb->setQuery("select p.prod_id,p.prod_name,p.prod_price,p.avatar,p.prod_desc from product p,category c where p.cat_id = c.cat_id and c.name = 'Drinks'");
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

  $mydb->setQuery("select p.prod_id,p.prod_name,p.prod_price,p.avatar,p.prod_desc from product p,category c where p.cat_id = c.cat_id and c.name = 'Desserts'");
  $cur = $mydb->executeQuery();
  $numrows = $mydb->num_rows($cur);


  if($numrows > 0){
    return $cur;
  }else{
    return false;
  }

}


 ?>