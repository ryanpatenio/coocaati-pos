 </main><!-- End #main -->


  <footer id="footer" class="footer">

    <div class="container">
      <div class="row gy-3">
        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-geo-alt icon"></i>
          <div>
            <h4>Address</h4>
            <p style="color: cyan;">
           
            Zone 1, near old Jolibee, beside Avon & Digibox, Iba, Zambales, Philippines<br>
            </p>
          </div>

        </div>

        <div class="col-lg-3 col-md-6 footer-links d-flex">
          <i class="bi bi-telephone icon"></i>
          <div>
            <h4>Reservations</h4>
            <p>
              <strong>Phone:</strong><a href="javascript:void()" style="color: cyan;"> +63 981 8574 753</a> <br>
              <strong>Email:</strong> <a href="javascript:void()" style="color: cyan;">coocaati@gmail.com</a><br>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 footer-links d-flex">
          <i class="bi bi-clock icon"></i>
          <div>
            <h4>Opening Hours</h4>
            <p>
              <strong style="color: cyan;">Mon-Sat: 8AM - 9PM</strong> <br>
             <strong style="color:rgb(219, 58, 58)"> Sunday: Closed</strong>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Follow Us</h4>
          <div class="social-links d-flex">
            
            <a href="https://www.facebook.com/tagpuanIba" class="facebook" style="color: cyan;"><i class="bi bi-facebook"></i></a>
            <a href="https://www.instagram.com/coocaati/" class="instagram" style="color:cyan"><i class="bi bi-instagram"></i></a>
           
          </div>
        </div>

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        <strong><span style="color: cyan;">Coocaati</span></strong>. All Rights Reserved <?php $year = (new DateTime)->format("Y"); echo $year; ?>
      </div>
      <div class="credits">
      </div>
    </div>

  </footer><!-- End Footer -->
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>
  <div id="loading"></div>

  <!-- Vendor JS Files -->
  <script src="<?php echo WEB_ROOT; ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo WEB_ROOT; ?>assets/vendor/aos/aos.js"></script>
  <script src="<?php echo WEB_ROOT; ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?php echo WEB_ROOT; ?>assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="<?php echo WEB_ROOT; ?>assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?php echo WEB_ROOT; ?>assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo WEB_ROOT; ?>assets/js/main.js"></script>
<script type="text/javascript" src="<?php echo WEB_ROOT; ?>admin/allScript/sweet.js"></script>
<script type="text/javascript" src="<?php echo WEB_ROOT; ?>admin/allScript/customer-side.js"></script>

</body>

</html>

  <!---- log out page modal---->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <a class="btn btn-primary" href="assets/logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

<script type="text/javascript">

    function message($text='',$msg_type=''){
     swal($text, {
                icon: $msg_type,
              }).then((confirmed)=>{
                 window.location.reload();

         });
  }

function msg($text='',$msg_type=''){
     swal($text, {
                icon: $msg_type,
              });
  }
  $(document).on('click','#sign_out_btn',function(e){
    e.preventDefault();

    $('#logoutModal').modal('show');

  });


</script>

