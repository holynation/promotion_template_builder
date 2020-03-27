<?php 
$userType= $this->webSessionManager->getCurrentUserProp('user_type');
include "template/header.php";
if ($userType=='admin') {
  include "template/sidebar.php";
}
 ?>

<div class="main-panel">
    <div class="content-wrapper">
    	<div class="row">
    		<div class="col-lg-12 grid-margin stretch-card">
	    		<div class="card">
	    			<div class="card-body">
	    				<h1> Admin Profile
						    <div class="badge badge-dark badge-fw"><?php echo $admin->firstname.' '.$admin->lastname.' '.$admin->middlename; ?></div>
						</h1>
	    			</div>
	    		</div>
	    	</div>
    	</div>
    	
		<div class="row">
	        <div class="col-md-5 col-lg-5 grid-margin stretch-card">
	            <div class="card text-center">
	                <div class="card-body d-flex flex-column">
	                  <div class="wrapper">
	                    <?php if (@$admin->img_path){
	                    	$path = ($admin->img_path != '') ? @$admin->img_path :'assets/images/default-profile.jpg';
	                    } ?>
		                  <img class="img-lg rounded-circle mb-2" src="<?php echo base_url($path); ?>" alt="profile picture">
		                <br /> 
	                    <h4><?php echo $admin->firstname. ' '. $admin->lastname; ?></h4>
	                    <p class="text-muted"><?php echo @$admin->phone_number; ?></p>
	                    <p class="mt-4 card-text"><?php echo @$admin->address; ?></p>
	                    <button class="btn btn-rounded btn-primary btn-sm mt-3 mb-4">Staff No: <?php echo @$admin->staff_no; ?></button>
	                  </div>
	                  	<div class="row border-top pt-3">
		                    <div class="col-6">
		                      <h6 class="font-weight-medium">Email</h6>
		                      <p><?php echo @$admin->email; ?></p>
		                    </div>
		                    <div class="col-6">
		                      <h6 class="font-weight-medium">Faculty</h6>
		                      <p>The Social Science</p>
		                    </div>
		                 </div>
		                 	<div class="wrapper">
		                 		<button class="btn btn-rounded btn-primary btn-sm mt-5" data-toggle='modal' data-target='#center_modal_password'>Change Password</button>
		                 	</div>
	                </div>
	            </div>
	        </div>
	        <div class="col-md-7 col-lg-7 grid-margin stretch-card">
	        	<div class="card">
	        		<div class="card-body">
			        	<h4 class="card-title">Personal Biodata</h4>
			        	<div class="table-responsive">
			              <table class="table table-hover">
			              	<tbody>
			                <tr>
			                  <td>Surname</td>
			                  <td><?php echo $admin->firstname; ?></td>
			                </tr>
			                <tr>
			                  <td>Firstname</td>
			                  <td><?php echo $admin->lastname; ?></td>
			                </tr>
			                <tr>
			                  <td>Middlename</td>
			                  <td><?php echo $admin->middlename; ?></td>
			                </tr>
			                <tr>
			                  <td>Date of Birth</td>
			                  <td><?php echo $admin->dob; ?></td>
			                </tr>
			                <tr>
			                  <td>Phone Number</td>
			                  <td><?php echo format_phone('nig',$admin->phone_number); ?></td>
			                </tr>
			                <tr>
			                  <td>Address</td>
			                  <td><?php echo @$lecturer->address; ?> </td>
			                </tr>
			                </tbody>
			              </table>
			            </div>
			        </div> 
	        	</div> 
	        </div>
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
		                    <div>
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
	  	
  <!-- content-wrapper ends -->
  <!-- partial:partials/_footer.html -->
    <?php include_once 'template/sub_foot.php'; ?>
  <!-- partial -->
</div>
<!-- main-panel ends -->

<!-- note this must not be remove so as to balance the div element -->
</div>
<!-- page-body-wrapper ends -->
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
<?php include "template/footer.php"; ?>