<?php
 $userType = $this->webSessionManager->getCurrentUserProp('user_type');
 if($userType == 'lecturer'){
 	include_once 'template/sidebar_lecturer.php';
 }
?>
<?php if ($userType=='admin'): ?>
<div class="container-fluid page-body-wrapper">
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <li class="nav-item nav-profile">
          <div class="nav-link">
            <div class="user-wrapper">
              <div class="profile-image">
                <img src="<?php echo base_url($admin->img_path); ?>" alt="profile image">
              </div>
              <div class="text-wrapper">
                <p class="profile-name"><?php echo $admin->firstname .' '.$admin->lastname; ?></p>
                <div>
                  <small class="designation text-muted"><?php echo $this->webSessionManager->getCurrentUserProp('user_type'); ?></small>
                  <span class="status-indicator online"></span>
                </div>
              </div>
            </div>
            <button class="btn btn-success btn-block" style="margin-top:-10px;">Subscribe
              <i class="mdi mdi-plus"></i>
            </button>
          </div>
        </li>
        <!-- this is the beginning of the nav bar -->

        <?php foreach ($canView as $key => $value): ?>
	       <?php 
	           $state='';
	            if ($canView[$key]['state']===0) {
	             continue;
	           }
	        ?>
          <?php if($key == 'Dashboard'): ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('vc/admin/dashboard'); ?>">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <?php else: ?>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#<?php echo $value['class']; ?>-dash" aria-expanded="false" aria-controls="<?php echo $value['class']; ?>-dash">
              <i class="menu-icon mdi <?php echo $value['class']; ?>"></i>
              <span class="menu-title"><?php echo $key; ?></span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="<?php echo $value['class']; ?>-dash">
              <ul class="nav flex-column sub-menu">
              <?php foreach ($value['children'] as $label =>$link): ?>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url($link); ?>"><?php echo $label; ?></a>
                </li>
                <?php endforeach; ?>
              </ul>
            </div>
          </li>
        <?php endif; ?>
    <?php endforeach; ?>
      </ul>
  </nav>
<?php endif; ?>