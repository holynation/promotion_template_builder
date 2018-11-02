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
        <div class="col-sm-12">
          <div class="alert alert-info">This page is for details of Teaching at Undergraduate & Postgraduate level</div>
        </div>
        <div class="row purchace-popup">
          <div class="col-12">
            <span class="d-flex alifn-items-center">
              <p>Administrative <?php echo removeUnderscore($model); ?></p>
              <div class="col-md-3 col-sm-3">
                <button type="button" class="btn btn-dark btn-block" data-toggle="modal" data-target="#basic_modal" data-animate-modal="zoomInDown">Add
                </button>
            </div>
            </span>
          </div>
        </div>

        <div class="row">
          <div id="basic_modal" class="modal fade animated" role="dialog">
              <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                          <?php echo removeUnderscore($model);  ?> Entry Form
                        </h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    </div>
                      <div class="modal-body">
                        <p>
                          <div class="card-body" id="card-more">
                            <div id="notify"></div>
                              <form class="forms-sample" id="teaching-form" action="<?php echo base_url('mc/insert_academic') ?>" method='post'>
                                <?php echo getLecturerOption(); ?>
                                    <div class="form-group">
                                      <label for="course_code">Course Code</label>
                                      <input type="text" class="form-control" id="course_code" name="course_code" placeholder="Course Code" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="course_title">Course Title</label>
                                      <input type="text" class="form-control" id="course_title" name="course_title" placeholder="Course Title" required>
                                    </div>
                                    <div id="multi-data">
                                      <div class="row" >
                                        <div class="col-sm-8">
                                          <div class="form-group">
                                            <label for="session_name">Academic Session Name</label>
                                            <?php $option = dropDownSession(); ?>
                                              <select name="session_name[]" id="session_name[]" class="form-control">
                                                <option value=''>..choose session....</option>
                                                 <?php echo $option; ?>
                                              </select>
                                          </div>
                                        </div>
                                        <div class="col-sm-4">
                                          <div class="form-group">
                                          <a class="btn btn-success mr-2" id="next" style="margin:17% 0 0;color:#fff;" onclick="addMoreExist();">Add More</a>
                                        </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="total_person">Number of persons</label>
                                      <input type="number" name="total_person" id="total_person" class="form-control" placeholder="number of person that took the course" required/>
                                    </div>
                                    <?php 
                                    $arr =array('Undergraduate','Postgraduate');
                                    $option = buildOptionUnassoc($arr); ?>
                                    <div class='form-group'>
                                      <label for='category' >Category</label>
                                      <select name='category' id='category' class='form-control' required>
                                      <?php echo $option ?>
                                      </select>
                                    </div>
                                    <input type="hidden" id='base_path' value="<?= $base ?>">
                                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                                    <button type="button" class="btn btn-danger mr-2 float-right" id="btnReset">Reset</button>
                                  </form>
                                <script type="text/javascript">
                                  var j = 1;
                                  var option = "<?php echo dropDownSession(); ?>";
                                  function addMoreExist(){
                                    if(j < 8){
                                      var session = "<div class=\"col-sm-8\"><div class=\"form-group\"><label for=\"session_name\">Session Name</label><select name=\"session_name[]\" id=\"session_name[]\" class=\"form-control\"><option value=''>..choose session....</option><option>till date</option>"+option+"</select></div></div>"; 
                                      var remove_sign = "<div class='col-sm-3'><div class='form-group'><label>&nbsp;&nbsp;</label><i style='cursor:pointer;' class='mdi mdi bookmark-remove form-control remove-flight'> remove</i></div></div>";

                                      var btn_add = '<div class="col-sm-5"><div class="form-group"><a class="btn btn-success mr-2" style="margin:7% 0 0;" id="prev" onclick="addMoreExist();">Add More</a></div></div>';

                                      $('#card-more').find('#multi-data').append('<div class="row" id="multi-data">' + session + remove_sign  + '</div>');
                                      j = j +  1;
                                      }
                                  }
                                  $('body').on('click', '.remove-flight', function (e) {
                                     e.preventDefault();
                                      j--;
                                     $(this).closest("#multi-data").remove();
                                  });
                                  $('#btnReset').on('click',function(){
                                      $('#teaching-form').trigger('reset');
                                  });
                                </script>
                          </div>
                        </p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" id="close" data-dismiss="modal">Close
                        </button>
                      </div>
                  </div>
              </div>
          </div>
        </div>

        <!-- this is for the edit -->
        <div class="row">
          <div id="modal-edit" class="modal fade animated" role="dialog">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title"></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                      </div>
                      <div class="modal-body">
                        <div id="notify"></div>
                          <p id="edit-container">

                        </p>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" id="close" data-dismiss="modal">Close
                          </button>
                      </div>
                  </div>
              </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12 grid-margin">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title"><?php echo 'Detail Teaching Table'; ?></h4>
                  <?php
                  $tableData ='';
                  $dataId = $this->webSessionManager->getCurrentUserProp('user_table_id');
                  $where = " where lecturer.id = $dataId order by ID desc";
                  $tableExclude =array('pg_courses_qualify','lecturer_id');
                  $tableAction =array('delete' => 'delete/teaching_experience', 'edit' => 'edit/teaching_experience');
                  if($this->webSessionManager->getCurrentUserProp('user_type') == 'lecturer'):
                  $tableData = $this->tableViewModel->getTableHtml($model,$count,$tableExclude,$tableAction,true,0,null,true,$where);
                else:
                  if(!empty($tableExclude)){
                    $remove = 'lecturer_id';
                    if(in_array($remove,$tableExclude)){
                      unset($tableExclude[array_search($remove,$tableExclude)]);
                    }
                  }
                  $tableData = $this->tableViewModel->getTableHtml($model,$count,$tableExclude,$tableAction,true,0,null,true);
                 endif;
                 echo $tableData;
                ?>
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
<?php 
include "template/footer.php";
?>
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

  var inserted=false;
    $(document).ready(function($) {
      $('.modal').on('hidden.bs.modal', function (e) {
        if (inserted) {
          inserted = false;
          location.reload();
        }
    });
    $('.close,#close').click(function(event) {
      if (inserted) {
        inserted = false;
        location.reload();
      }
    });

      $('li[data-ajax-edit=1] a').click(function(event){
        event.preventDefault();
        var link = $(this).attr('href');
        var action = $(this).text();
        sendAjax(null,link,'','get',showUpdateForm);
      });

    });

    function showUpdateForm(target,data) {
      var data = JSON.parse(data);
      if (data.status==false) {
        showNotification(false,data.message);
        return;
      }
       var container = $('#edit-container');
       container.html(data.message);
       //rebind the autoload functions inside
       $('#modal-edit').modal();
    }

  function ajaxFormSuccess(target,data) {
      if (data.status) {
        inserted=true;
      }
      showNotification(data.status,data.message);
      if (typeof target ==='undefined') {
        location.reload();
      }
    }
</script>
