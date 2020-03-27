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
<body class="hold-transition login-page">
<div class="login-box">
<!--  <div class="login-logo">-->
<!--      <a href="--><?php //echo $base ?><!--"><b style="color: #fff;">RMS</b></a>-->
<!--  </div>-->
  <!-- /.login-logo -->
  <div class="login-box-body">

      <div class="login-logo">
         CV TEMPLATE

      </div>
    <p class="login-box-msg">Create Super Admin Account</p>
      <div class="alert alert-danger alert-dismissible" id="notify">
      </div>
      <div class="alert alert-info">Your Email address will act as your password, after this page supply your username and your password to  login</div>
    <form  method="post" action ="<?php echo  base_url('welcome/setup')?>">
      <div class="form-group has-feedback">
        <input type="lastname" name="lastname" id='lastname' class="form-control" placeholder="lastname" required="">
        <input type="firstname" name="firstname" id='firstname' class="form-control" placeholder="firstname" required="">
        <input type="middlename" name="middlename" id='middlename' class="form-control" placeholder="middlename" required="">
        <input type="phone_number" name="phone_number" id='phone_number' class="form-control" placeholder="phone number" required="">
        <textarea name="address" id="address" placeholder="address" class="form-control"></textarea>
        <input type="email" name="email" id='email' class="form-control" placeholder="email" required="">
        <input id="password" name="password" type="password" class="form-control" placeholder="Password">
        <input id="confirm" name="confirm" type="password" class="form-control" placeholder="confirm password">
        <input type="submit" name="enter" class="btn btn-primary btn-block btn-flat" value="Create Account">
      </div>
        <!-- /.col -->
          
    </form>
    <div class="clearfix"></div>
<input type="hidden" id='base_path' value="<?= $base ?>">
<!--     <a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a> -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<style>
  #notify{
    display: none;
  }
</style>
<!-- jQuery 3 -->
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
      submitAjaxForm(form);
    });
  });

  function ajaxFormSuccess(target,data){
    if (data.status) {
      var path = data.message;
      location.assign(path);
    }
    else{
      $("#notify").show();
      $("#notify").text(data.message).addClass("alert alert-danger alert-dismissible");
    }
  }
</script>
</body>
</html>