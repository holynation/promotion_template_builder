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
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auto-form-wrapper">
              <!-- this is the notification div -->
              <?php  if(isset($type) && $type == 'register'){ ?>
              <h3 class="text-center">Account Verification Page</h3><br/>
              <?php if(isset($success)): ?>
              <div class="alert alert-success">
                <p class="text-center mt-2"><?php echo $success; ?></p>
              </div>
              <?php endif; } ?>

              <?php if(isset($error)): ?>
              <div class="alert alert-danger">
                <p class="text-center mt-3"><?php echo $error; ?></p>
              </div>
              <?php endif;  ?>

               <!-- this is for the forget password page -->
              <?php if(isset($type) && $type == 'forget'){ ?>
              <h3 class="text-center">Reset Password</h3><br/>
              <div id="notify"></div>
              <form action="<?php echo base_url('auth/forgetPassword'); ?>" method="post" role="form" id="signForm">
                <?php if(isset($email_hash, $email_code)) { ?>
                <input type="hidden" name="email_hash" id="email_hash" value="<?php echo $email_hash; ?>" />
                <input type="hidden" name="email_code" id="email_code" value="<?php echo $email_code; ?>" />
                <?php  } ?>
                <div class="form-group">
                  <label class="label">Email</label>
                  <div class="input-group">
                    <input type="email" class="form-control" placeholder="Email" name="email" id="email" value="<?php echo (isset($email)) ? $email : '';?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label class="label">New Password</label>
                  <div class="input-group">
                    <input type="password" class="form-control" placeholder="New Password" name="password" id="password">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="label">Confirm Password</label>
                  <div class="input-group">
                    <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password" id="confirm_password">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary submit-btn btn-block">Reset</button>
                </div>
                <input type="hidden" name="isajax">
                <input type="hidden" id='base_path' value="<?php echo $base; ?>">
                <input type="hidden" name="task" value="update">
              </form>
              <?php } ?>
            </div>
            <p class="footer-text text-center">copyright © 2018 <a href="http://technodesolutions.com/" target="_blank">Technode Solutions</a>. All rights reserved.</p>
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
      $("#notify").removeClass('alert alert-warning');
      $("#notify").html("<p>"+data.message+"</p>").addClass("alert alert-success alert-dismissible").delay(3000);
      $('#signForm').trigger('reset');
      location.assign("<?php echo base_url('auth/login'); ?>");
    }
    else{
      $("#notify").show();
      $("#notify").removeClass('alert alert-success');
      $("#notify").html("<p>"+data.message+"</p>").addClass("alert alert-danger alert-dismissible");
      $('button').removeClass('disabled');
      $('button').prop('disabled', false);
    }
  }
</script>
</body>
</html>