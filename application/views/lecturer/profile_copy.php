<?php 
$userType= $this->webSessionManager->getCurrentUserProp('user_type');
include "template/header.php";
if ($userType=='admin') {
  include "template/sidebar.php";
}
else{
  include "template/sidebar_lecturer.php";
}
 ?>

<div class="main-panel">
    <div class="content-wrapper">
    	<h1> Lecturer Profile
		    <small><?php echo $lecturer->surname.' '.$lecturer->firstname.' '.$lecturer->middlename; ?></small>
		</h1>
    </div>
    <div class="row">
        <div class="col-md-3">
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
                 <?php if (@$lecturer->img_path): ?>
                <img class="img-responsive img-circle" src="<?php echo base_url($lecturer->img_path) ?>" alt="lecturer profile picture">
                <?php else: ?>
                  <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('assets/images/default-profile.jpg'); ?>" alt="profile picture">
                <br /> 
              	<?php endif ?>
                  	<div class="showupload btn btn-primary btn-block">change photo</div>
                  	<div class="form">
	                    <div class="upload-control" style="display: none; width: 205px;margin:0 auto;">
	                      <form method="post" enctype="multipart/form-data" action="<?php echo base_url('mc/update/lecturer/'.$lecturer->ID.'/1') ?>">
	                      <label for="">
	                        choose file to upload <br>
	                        <input type="file" name="img_path" id="img_path" class="form-control">
	                      </label>
	                      <input type="submit" value="Upload Photo" name="submit-btn" class="btn btn-primary">
	                      </form>
	                    </div>
	                </div>
                <div class="push-down"></div>
              <h3 class="profile-username text-center"><?php echo $lecturer->surname. ' '. $lecturer->firstname; ?></h3>

              <p class="text-muted text-center"><b>Email: <?php echo $lecturer->email;  ?></b></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Department</b> <a class="pull-right"><?php echo $lecturer->department->department_name; ?></a>
                </li>
              </ul>
              <a href="#" data-toggle='modal' data-target='#center_modal_password' class="btn btn-primary">Change Password</a>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-9">
	        <div class="box">
	            <div class="box-header">
	              <h3 class="box-title">Bio-Data</h3>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body table-responsive no-padding">
	              <table class="table table-hover">
	              	<tbody>
	                <tr>
	                  <td>Surname</td>
	                  <td><?php echo $lecturer->surname; ?></td>
	                </tr>
	                <tr>
	                  <td>Firstname</td>
	                  <td><?php echo $lecturer->firstname; ?></td>
	                </tr>
	                <tr>
	                  <td>Middlename</td>
	                  <td><?php echo $lecturer->middlename; ?></td>
	                </tr>
	                <tr>
	                  <td>Gender</td>
	                  <td><?php echo $lecturer->gender; ?></td>
	                </tr>
	                <tr>
	                  <td>Date of Birth</td>
	                  <td><?php echo $lecturer->dob; ?></td>
	                </tr>
	                <tr>
	                  <td>Marital Status</td>
	                  <td><?php echo @$lecturer->marital_status; ?></td>
	                </tr>
	                <tr>
	                  <td>Religion</td>
	                  <td><?php echo @$lecturer->religion; ?></td>
	                </tr>
	                <tr>
	                  <td>Phone Number</td>
	                  <td><?php echo format_phone('nig',$lecturer->phone_number); ?></td>
	                </tr>
	                <tr>
	                  <td>Address</td>
	                  <td><?php echo $lecturer->address; ?> </td>
	                </tr>
	                <tr>
	                  <td>Department</td>
	                  <td><?php echo $lecturer->department->department_name; ?></td>
	                </tr>
	                <tr>
	                  <td>State Of Origin</td>
	                  <td><?php echo $lecturer->state_of_origin; ?></td>
	                  </tr>
	                  <tr>
	                    <td>LGA Of Origin</td>
	                    <td><?php echo $lecturer->lga_of_origin; ?></td>
	                    </tr>
	                </tbody>
	              </table>
	            </div>
	                    <!-- /.box-body -->
	        </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- this is for the change of password -->
	  <div class="row">
	    <div id="center_modal_password" class="modal fade animated" role="dialog">
	      <div class="modal-dialog">
	        <!-- <form action="" method="post"> -->
	          <div class="modal-content">
	              <div class="modal-header">
	                <h4 class="modal-title">Change Password</h4>
	                  <button type="button" class="close" data-dismiss="modal">&times;</button>
	              </div>
	              <div class="modal-body">
	                  <form  class="form-horizontal" id="form_change_password" name="form_change_password" action="<?php echo base_url('vc/changePassword'); ?>">
	                    <div id="data_notify"></div><br>
	                    <div class="box-body">
	                      <div class="form-group">
	                        <label for="data_current_password" class="col-sm-5 control-label">Current Password</label>
	                        <div class="col-sm-10">
	                          <input type="password" class="form-control" id="data_current_password" name="data_current_password" placeholder="Current Password">
	                        </div>
	                      </div>
	                      <div class="form-group">
	                        <label for="data_password" class="col-sm-5 control-label">Password</label>
	                        <div class="col-sm-10">
	                          <input type="password" class="form-control" id="data_password" name="data_password" placeholder="Password">
	                        </div>
	                      </div>
	                      <div class="form-group">
	                        <label for="data_confirm_password" class="col-sm-5 control-label">Confirm Password</label>
	                        <div class="col-sm-10">
	                          <input type="password" class="form-control" id="data_confirm_password" name="data_confirm_password" placeholder="Confirm Password">
	                        </div>
	                      </div>
	                    </div>
	                    <!-- /.box-body -->
	                    <div class="box-footer">
	                      <button type="submit" class="btn btn-info pull-right">Change</button>
	                    </div>
	                    <!-- /.box-footer -->
	                  </form>
	              </div>
	          </div>
	        <!-- </form> -->
	      </div>
	    </div>
	  </div>
	  <div class="col-md-6 col-lg-4 grid-margin stretch-card">
              <div class="card text-center">
                <div class="card-body d-flex flex-column">
                  <div class="wrapper">
                    <img src="../../../assets/images/faces/face10.jpg" class="img-lg rounded-circle mb-2" alt="profile image" />
                    <h4>Elsie Reed</h4>
                    <p class="text-muted">Developer</p>
                    <p class="mt-4 card-text"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo
                      ligula eget dolor. Lorem </p>
                    <button class="btn btn-rounded btn-primary btn-sm mt-3 mb-4">Follow</button>
                  </div>
                  <div class="row border-top pt-3 mt-auto">
                    <div class="col-4">
                      <h6 class="font-weight-medium">5896</h6>
                      <p>Post</p>
                    </div>
                    <div class="col-4">
                      <h6 class="font-weight-medium">1596</h6>
                      <p>Followers</p>
                    </div>
                    <div class="col-4">
                      <h6 class="font-weight-medium">7896</h6>
                      <p>Likes</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
  <!-- content-wrapper ends -->
  <!-- partial:partials/_footer.html -->
    <?php include_once 'template/sub_foot.php'; ?>
  <!-- partial -->
</div>
<!-- main-panel ends -->

<!-- note this must not be remove so as to balance the div element -->
</div>
<!-- page-body-wrapper ends -->
<?php include "template/footer.php"; ?>
<script>
     function addMoreEvent() {
      $('.showupload').click(function(event) {
        $(this).hide();
        $('.upload-control').show();
      });

       $("#data_profile_change").submit(function(e){
        e.preventDefault();
        submitAjaxForm($(this));
       });
     }
  function ajaxFormSuccess(target,data) {
    reportAndRefresh(target,data);
  }
 </script>