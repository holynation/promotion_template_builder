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
  <!-- <link rel="stylesheet" href="<?php //echo base_url(); ?>assets/vendors/bootstrapValidator/css/bootstrapValidator.min.css"> -->
  <link href="<?php echo base_url(); ?>assets/css/vendors%2c_iCheck%2c_css%2c_all.css%2bcss%2c_passtrength%2c_passtrength.css%2bcss%2c_custom.css%2bvendors%2c_sweetalert2%2c_css%2c_sweetalert2.min.css%2bvendors%2c_bootstrapvalidator%2c_css%2c_bootstra" rel="stylesheet"/>
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <h2 class="text-center mb-4" style="color:#fff;">Register</h2>
            <div class="auto-form-wrapper">
              <!-- this is the notification div -->
                <div id="notify"></div>
              <form action="<?php echo base_url('auth/register'); ?>" method="post" role="form" id="signForm">
                <div class="form-group">
                  <div class="input-group">
                    <input type="email" class="form-control" placeholder="Email" name="email" id="email" required>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="password" class="form-control" placeholder="Password" name="password" id="password" required>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password" id="confirm_password" required>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <!-- <div class="form-group d-flex justify-content-center">
                  <div class="form-check form-check-flat mt-0">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" checked> I agree to the terms
                    </label>
                  </div>
                </div> -->
                <div class="form-group">
                  <button class="btn btn-primary submit-btn btn-block">Register</button>
                </div>
                <div class="text-block text-center my-3">
                  <span class="text-small font-weight-semibold">Already have and account ?</span>
                  <a href="<?php echo base_url('auth/login'); ?>" class="text-black text-small">Login</a>
                </div>
                <input type="hidden" name="isajax">
                <input type="hidden" id='base_path' name="base_path" value="<?php echo $base; ?>">
              </form>
            </div>
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
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js.pagespeed.jm.6svL6oFoHD.js"></script>
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
      submitAjaxForm(form);
    });

  });

  function ajaxFormSuccess(target,data){
    if (data.status) {
      $("#notify").show();
      $("#notify").text(data.message).addClass("alert alert-success alert-dismissible");
      $('#signForm').trigger('reset');
    }
    else{
      $("#notify").show();
      $("#notify").text(data.message).addClass("alert alert-danger alert-dismissible");
    }
  }
</script>
</body>
</html>