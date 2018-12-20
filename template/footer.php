</div> 
<!-- container-scroller -->
  <!-- plugins:js -->

  <script src="<?php echo $base; ?>assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="<?php echo $base; ?>assets/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <script src="<?php echo base_url('assets/vendors/airdatepicker/dist/js/datepicker.js'); ?>"></script>
   <script src="<?php echo base_url('assets/vendors/airdatepicker/dist/js/i18n/datepicker.en.js'); ?>"></script>

  <!-- Plugin js for this page-->
  <script type="text/javascript" src="<?php echo $base; ?>assets/js/advanced_modals.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="<?php echo $base; ?>assets/js/off-canvas.js"></script>
  <script src="<?php echo $base; ?>assets/js/misc.js"></script>
  <!-- endinject -->

  <!-- this is for the toastr -->
  <script type="text/javascript" src="<?php echo base_url('assets/vendors/toastr/js/toastr.min.js.pagespeed.js'); ?>"></script>
  <!-- <script type="text/javascript" src="<?php //echo base_url('assets/js/toastr_notifications.js'); ?>"></script> -->
  <!-- end of toastr -->

  <!-- Custom js for this page-->
  <script src="<?php echo $base; ?>assets/js/dashboard.js"></script>
  <!-- End custom js for this page-->
      <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
  <script type="text/javascript" src="<?php echo base_url('assets/js/custom.js'); ?>"></script>
  <script type="text/javascript">
    var inserted=false;
    $('.close,#close').click(function(event) {
      if (inserted) {
        inserted = false;
        location.reload();
      }
    });

    function ajaxFormSuccess(target,data) {
      if (data.status) {
        inserted=true;
        $('#form_change_password').trigger('reset');
      }
      showNotification(data.status,data.message);
      if (typeof target ==='undefined') {
        location.reload();
      }
    }

    $(document).ready(function(){
      var data_notify = $('#data_notify');
      $("#form_change_password").submit(function(e){
        e.preventDefault();
        var data_password = $('#data_password').val(),
            data_curr_password = $('#data_current_password').val(),
          confirm_password = $('#data_confirm_password').val();

          if(data_password == '' || confirm_password == '' || data_curr_password == ''){
              data_notify.html('<p class="alert alert-warning" style="width:45%;margin:0 auto;">All field is required...</p>');
              return false;
          }
          else if(data_password != confirm_password ){
            data_notify.html('<p class="alert alert-warning" style="width:90%;margin:0 auto;">New password does not match with the confirmation password</p>');
            return false;
          }else{
            submitAjaxForm($(this));
          }
       });
    });
    
  </script>
</body>
</html>