<?php $base=base_url(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo getTitlePage(); ?></title>
  <!-- plugins:css -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendors/airdatepicker/dist/css/datepicker.css'); ?>">
  <link rel="stylesheet" href="<?php echo $base; ?>assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo $base; ?>assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?php echo $base; ?>assets/vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo $base; ?>assets/css/style.css">
  
  <link rel="stylesheet" type="text/css" href="<?php echo $base; ?>assets/css/A.vendors%2c%2c_animate%2c%2c_animate.min.css%2bcss%2c%2c_custom_css%2c%2c_advanced_modals.css%2cMcc.y5G3zLmBWR.css.pagespeed.cf.FkvOREn9M1.css"/>
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo $base; ?>assets/images/favicon.png" />
  <script src="<?php echo base_url('assets/js/jquery-2.1.4.min.js'); ?>"></script>

</head>
<body>
<div class="container-scroller">
  <input type="hidden" value="<?php echo base_url(); ?>" id='baseurl'>
<!-- this is the navbar -->
  <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <?php 
          $userType = $this->webSessionManager->getCurrentUserProp('user_type');
          if($userType == 'lecturer'):
        ?>
        <a class="navbar-brand brand-logo" href="<?php echo base_url('vc/lecturer/dashboard'); ?>">
          <img src="<?php echo base_url('assets/images/logo.svg'); ?>" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="<?php echo base_url('vc/lecturer/dashboard'); ?>">
          <img src="<?php echo base_url('assets/images/logo-mini.svg'); ?>" alt="logo" />
        </a>
        <?php else: ?>
            <a class="navbar-brand brand-logo" href="<?php echo base_url('vc/admin/dashboard'); ?>">
              <img src="<?php echo base_url('assets/images/logo.svg'); ?>" alt="logo" />
            </a>
            <a class="navbar-brand brand-logo-mini" href="<?php echo base_url('vc/admin/dashboard'); ?>">
              <img src="<?php echo base_url('assets/images/logo-mini.svg'); ?>" alt="logo" />
            </a>
        <?php endif; ?>
      </div>
      <!-- this is section deals with the header for each page -->
      <?php if(isSessionActive()): ?>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
          <?php 
            $userType = $this->webSessionManager->getCurrentUserProp('user_type');
            if($userType == 'lecturer'):
          ?>
          <li class="nav-item">
            <a href="<?php echo base_url('vc/lecturer/dashboard'); ?>" class="nav-link">Lecturer
              <span class="badge badge-primary ml-1">New</span>
            </a>
          </li>
          <li class="nav-item active">
            <a href="#" class="nav-link">
              <i class="mdi mdi-elevation-rise"></i>Reports</a>
          </li>
          <?php else: ?>
            <li class="nav-item">
              <a href="<?php echo base_url('vc/admin/dashboard'); ?>" class="nav-link">Admin Dashboard
                <span class="badge badge-primary ml-1">New</span>
              </a>
            </li>
            <li class="nav-item active">
              <a href="#" class="nav-link">
                <i class="mdi mdi-elevation-rise"></i>Reports</a>
            </li>
          <?php endif; ?>
        </ul>
        
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <?php
              $fullname='';
              $path='';
                if($this->webSessionManager->getCurrentUserProp('user_type') == 'admin'):
                  if(isset($admin)){
                    $fullname =  $admin->firstname .' '.$admin->lastname;
                    $path = $admin->img_path;
                  }
              ?>
              <span class="profile-text">Hello, <?php echo $fullname; ?> !</span>
              <img class="img-xs rounded-circle" src="<?php echo base_url($path); ?>" alt="Profile image">
              <?php else: 
                  if(isset($lecturer)):
                  $fullname = $lecturer->surname .' '.$lecturer->firstname;
                  $path = $lecturer->img_path;
                  endif;
                ?>
                <span class="profile-text"><?php echo $fullname ; ?> !</span>
                <img class="img-xs rounded-circle" src="<?php echo base_url($path); ?>" alt="Profile image">
              <?php endif; ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <a class="dropdown-item p-0">
                <div class="d-flex border-bottom">
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                  </div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                    <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                  </div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                  </div>
                </div>
              </a>
              <a class="dropdown-item" href="<?php echo base_url('auth/logout'); ?>">
                Sign Out
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas" style="height: 25px;">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
      <?php else: ?>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-right header-links d-none d-md-flex">
          <li class="nav-item active">
            <a href="<?php echo base_url('auth/web'); ?>" class="nav-link"><i class="mdi mdi-account-multiple"></i> Login</a>
          </li>
          <!-- <li class="nav-item">
            <a href="<?php //echo base_url('auth/register'); ?>" class="nav-link">
              <i class="mdi mdi-account-outline"></i>Register</a>
          </li> -->
        </ul>
      </div>
    <?php endif; ?>
  </nav>
  <style type="text/css">
    #notification{
      display: none;
      position: absolute;
      z-index: 2000;
      text-align: center;
      width: 50%;
      top: -5px;
    }
  </style>
<div id="notification" class="text-center"></div>