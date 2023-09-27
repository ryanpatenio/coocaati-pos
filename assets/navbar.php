      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="#home">Home</a></li>
          
          <li><a href="#product">Products</a></li>
          <li><a href="#best-selling-products">Best Selling</a></li>
        
          <li><a href="#contact">Contact</a></li>
          <li><a href="#about">About</a></li>
           <?php
           if(!isset($_SESSION['customer_id'])){

           }else{
           	?>
            <li><a href="myOrders.php" id="">Orders
          <span class="badge bg-danger badge-pill badge-number rounded-circle" id="myOrderCount" style="margin-left: 4px;">2</span>
            </a></li>
           	<li><a href="#" id="trans_btn">Transaction</a></li>


             <li><a class="" href="#"data-bs-toggle="modal" data-bs-target="#myCart">My Cart
              
            <span class="badge bg-danger badge-pill badge-number rounded-circle" id="cust-cart-count2" style="margin-left: 4px;margin-right: 5px;"></span>
          </a></li>


           	<?php
           }


            ?>
        </ul>
      </nav><!-- .navbar -->