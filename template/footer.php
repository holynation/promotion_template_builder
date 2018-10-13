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