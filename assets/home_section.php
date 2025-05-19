<!-- ======= Hero Section ======= -->
  <section id="home" class="hero d-flex align-items-center section-bg">
    <div class="container">
      <div class="row justify-content-between gy-5">
        <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
        <h2 data-aos="fade-up">Hand Crafted Coffee and Donut!<br></h2>
          <p data-aos="fade-up" data-aos-delay="100">One bite and you'll overrule all objections. Open from <strong style="color: red;">8am</strong> To <strong style="color: red;">9pm</strong> Everyday!</p>
          

          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">

            <?php
            //lets create a condition if the customer is already log in or Not

            if(!isset($_SESSION['customer_id'])){
              //false lets echo the button "Sign Up!"
              ?>
               <a href="auth/register.php" id="sign_up_btn"class="btn-book-a-table">Sign Up Now!</a>

              <?php
            }

             ?>
           
          </div>
        </div>
        <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
          <img src="assets/img/front/front.jpg" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="300">
        </div>
      </div>
    </div>
  </section><!-- End Hero Section -->