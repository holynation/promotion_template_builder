<?php $base=base_url(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo getTitlePage(); ?></title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/iconfonts/puse-icons-feather/feather.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
  <!-- endinject -->
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $base; ?>assets/images/favicon-32x32.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auto-form-wrapper">
              <!-- this is the notification div -->
              <div class="text-center mt-4 ml-3" id="notify"></div> 
              <form action="<?php echo base_url('auth/forgetPassword'); ?>" method="post" role="form" id="signForm">
                <div class="form-group">
                  <label class="label">Email</label>
                  <div class="input-group">
                    <input type="email" class="form-control" placeholder="Username" name="email" id="email">
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary submit-btn btn-block">Reset</button>
                </div>
                <a href="<?php echo base_url(); ?>" class="text-center">Back Home</a>
                <input type="hidden" name="isajax">
                <input type="hidden" id='base_path' value="<?= $base ?>">
                <input type="hidden" name="task" value="reset">
              </form>
            </div>
            <p class="footer-text text-center">copyright © <?php echo date('Y'); ?> <a href="http://technodesolutions.com/" target="_blank">Technode Solutions</a>. All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  
  <script src="<?php echo base_url('assets/js/jquery-2.1.4.min.js'); ?>"></script>
  <script src="<?php echo base_url(); ?>assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="<?php echo base_url(); ?>assets/js/off-canvas.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/misc.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/custom.js'); ?>"></script>
  <!-- endinject -->
<script>
  $(function () {
    var form =$('form');
    form.submit(function(event) {
      event.preventDefault();
      var note = $("#notify");
      note.text('');
      note.hide();
      $('button').addClass('disabled');
      $('button').prop('disabled', true);
      submitAjaxForm(form);
    });
  });

  function ajaxFormSuccess(target,data){
    if (data.status) {
      $("#notify").show();
      $("#notify").html("<p>"+data.message+"</p>").addClass("alert alert-success alert-dismissible");
      $('#signForm').trigger('reset');
    }
    else{
      $("#notify").show();
      $("#notify").html("<p>"+data.message+"</p>").addClass("alert alert-danger alert-dismissible");
      $('button').removeClass('disabled');
      $('button').prop('disabled', false);
    }
  }
</script>
</body>
</html>