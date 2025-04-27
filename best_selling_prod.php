    <section id="best-selling-products" class="events">
      <div class="container-fluid" data-aos="fade-up">

        <div class="section-header">
          <h2>Best Selling Products</h2>
          <p>Check <span>Our</span> Best Selling Products</p>
        </div>

        <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <?php

            $bestSelling = $dashboard->bestSellingOverAll();

            if($bestSelling){

              foreach ($bestSelling as $bestProd) {
                ?>

            <div class="swiper-slide event-item d-flex flex-column justify-content-end" style="background-image: url(admin/assets/avatar/<?php echo $bestProd['avatar']; ?>)">
              <h3><?php echo $bestProd['prod_name']; ?></h3>
              <div class="price align-self-start">₱<?php echo $bestProd['prod_price']; ?></div>\ <h3 style="color: yellow;"><strong> Over <?php echo $bestProd['sold']; ?> Piece(s) SOLD</strong></h3><br>
              <p class="description">
                <?php echo $bestProd['prod_desc']; ?>
              
              </p>
            </div><!-- End Event item -->                

                <?php
              }
            }


             ?>


<!-- 
            <div class="swiper-slide event-item d-flex flex-column justify-content-end" style="background-image: url(assets/img/events-2.jpg)">
              <h3>Private Parties</h3>
              <div class="price align-self-start">$289</div>
              <p class="description">
                In delectus sint qui et enim. Et ab repudiandae inventore quaerat doloribus. Facere nemo vero est ut dolores ea assumenda et. Delectus saepe accusamus aspernatur.
              </p>
            </div> --><!-- End Event item -->

           <!--  <div class="swiper-slide event-item d-flex flex-column justify-content-end" style="background-image: url(assets/img/events-3.jpg)">
              <h3>Birthday Parties</h3>
              <div class="price align-self-start">$499</div>
              <p class="description">
                Laborum aperiam atque omnis minus omnis est qui assumenda quos. Quis id sit quibusdam. Esse quisquam ducimus officia ipsum ut quibusdam maxime. Non enim perspiciatis.
              </p>
            </div> --><!-- End Event item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section>