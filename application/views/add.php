<?php 
include "template/header.php";
include "template/sidebar.php";

//sectiofn for the form parameter
$exclude = ($configData && array_key_exists('exclude', $configData))?$configData['exclude']:array();
$has_upload = ($configData && array_key_exists('has_upload', $configData))?$configData['has_upload']:array();
$hidden = ($configData && array_key_exists('hidden', $configData))?$configData['hidden']:array();
$showStatus = ($configData && array_key_exists('show_status', $configData))?$configData['show_status']:false;
$submitLabel = ($configData && array_key_exists('submit_label', $configData))?$configData['submit_label']:"Save";
$tableAction = ($configData && array_key_exists('table_action', $configData))?$configData['table_action']:$model::$tableAction;
$tableExclude = ($configData && array_key_exists('table_exclude', $configData))?$configData['table_exclude']:array();
$query = ($configData && array_key_exists('query', $configData))?$configData['query']:array();
$tableTitle = ($configData && array_key_exists('table_title', $configData)) ? $configData['table_title'] : removeUnderscore($model) . ' Table';
$extraForm = ($configData && array_key_exists('extra_form', $configData))?$configData['extra_form']:'';
$page_hint = ($configData && array_key_exists('page_hint', $configData))?$configData['page_hint']:'';
$form_hint = ($configData && array_key_exists('form_hint', $configData))?$configData['form_hint']:'';
$showAppendForm = ($configData && array_key_exists('showAppendForm', $configData))?$configData['showAppendForm']:false;
$showAsteriskInfo = ($configData && array_key_exists('asterisk_info', $configData))?$configData['asterisk_info']:false;
// $showStatus = ($configData && array_key_exists('show_add', $configData))?$configData['show_add']:true;

$show_add = '';
if($this->webSessionManager->getCurrentUserProp('user_type') == 'lecturer' && $model == 'lecturer'){
  $show_add = false;
}else{
  $show_add = true;
}

$append='';
if($showAppendForm){
$append = array('type'=>'checkbox','class'=>'form-control','name'=>'bp_list');
}

// this are the empty parameter for the model
$tableData = '';
$where='';
$dataId='';
$parentModel='';
//  end parameter model
if($model == 'lecturer'){
$dataId = $this->webSessionManager->getCurrentUserProp('user_table_id');
// $where.= " where lecturer.id = $dataId";
$where = " where lecturer.id = $dataId";
$count = 1;
$query .= ' '. $where;
$parentModel='';
}else{
  $dataId = $this->webSessionManager->getCurrentUserProp('user_table_id');
  // $query = "select * from $model where $model.lecturer_id = ?";
  // $parentModel = $model;
$where = " where lecturer.id = $dataId";
}
if($model == 'chapter_in_book_published' && $this->webSessionManager->getCurrentUserProp('user_type') == 'lecturer'){
  $tableExclude = array('editors_id');
}

if($this->webSessionManager->getCurrentUserProp('user_type') == 'lecturer'){
// $tableData= $this->queryHtmlTableModel->getHtmlTableWithQuery($query,array($dataId),$count,$tableAction,null,true,0,50,$parentModel,$tableExclude);
if(!empty($tableExclude)){
  $tableExclude = array_merge(array('date_created','lecturer_id'),$tableExclude);
}else{
  $tableExclude = array('date_created','lecturer_id');
}
$order = " order by ID desc ";
$tableData = $this->tableViewModel->getTableHtml($model,$count,$tableExclude,$tableAction,true,0,null,true,$order,$where,$append);
}
else{
  if ($model == 'role') {
    $tableData= $this->queryHtmlTableModel->getHtmlTableWithQuery($query,array($dataId),$count,$tableAction);
  }else{
    $tableData = $this->tableViewModel->getTableHtml($model,$count,$tableExclude,$tableAction,true,0,null,true);
  }
}

?>

<div>
<?php 
    $formContent= $this->modelFormBuilder->start($model.'_table')
    ->appendInsertForm($model,true,$hidden,'',$showStatus,$exclude)
    ->addSubmitLink()
    ->appendSubmitButton($submitLabel,'btn btn-success')
    ->build();
?>
</div>

<div class="main-panel">
    <div class="content-wrapper">
    	<?php if($page_hint != ''): ?>
    	<div class="alert alert-info"><?php echo $page_hint; ?></div>
    <?php endif; ?>
    <?php if($append): ?>
      <div class="alert alert-info">
        <p>
          Note: Click the checkbox to choose the best publication amidst other publications.<br/>
          Note: However, make sure to click the save as best button to save what you have checked.
        </p>
    </div>
    <?php endif; ?>
    	<div class="row purchace-popup">
	        <div class="col-12">
	          <span class="d-flex alifn-items-center">
	            <p>Administrative <?php echo removeUnderscore($model); ?></p>
              <?php 
              // $disable = '';
              //   if(isset($checkExists)){
              //     $disable = ($checkExists && $model=='lecturer') ? "disabled" : '';
              //   }
               ?>
               <?php if($show_add): ?>
	            <div class="col-md-3 col-sm-3">
		            <button type="button" class="btn btn-dark btn-block" data-toggle="modal" data-target="#basic_modal" data-animate-modal="zoomInDown">Add
		            </button>
		          </div>
            <?php endif; ?>
              <?php if($showAsteriskInfo): ?>
                <div class="col-md-6 col-sm-6 alert alert-info">
                  <ul>
                    <li>One asterisk for publications appearing after last promotion.</li>
                    <li>Two asterisks for publications appearing since last failed attempt.</li>
                  </ul>
                </div>
              <?php endif; ?>
	          </span>
	        </div>
      </div>
        <!-- this is the add form  -->
      	<div class="row">
      		<div id="basic_modal" class="modal fade animated" role="dialog">
	            <div class="modal-dialog">
	                <div class="modal-content">
	                    <div class="modal-header">
	                        <h4 class="modal-title">
                            <?php echo removeUnderscore($model);  ?> Entry Form
                            <label class="text-muted" style="font-size: 15px;"><?php echo ($form_hint != '') ? $form_hint : ' '; ?></label>
                          </h4>
	                  		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                    		<span aria-hidden="true">&times;</span></button>
	                    </div>
	                    <div class="modal-body">
	                        <p>
		                    	<?php echo $formContent; ?>
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

        <!-- this is the extra form for addition action -->
        <div class="row">
          <div id="basic_modal-editors" class="modal fade animated" role="dialog">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title">Best Publication Table</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                      </div>
                      <div class="modal-body">
                        <?php if($append != ''): ?>
                          <?php
                            // $dataId1 = $this->webSessionManager->getCurrentUserProp('user_table_id');
                            // $tableExclude1 = array('lecturer_id','date_created','asterisks');
                            // $tableAction1 = '';
                            // $append1 = array('type'=>'checkbox','class'=>'form-control','attrClass'=>'form-check-input','name'=>'bp_remove_list');
                            // $query1 = "SELECT bp.ID,sub.* from best_publication bp join $model sub on sub.ID = bp.publication_table_id where bp.table_name = '$model' and bp.lecturer_id = ?";
                            // // $query1 = "SELECT * from $model where ID in (select publication_table_id from best_publication where lecturer_id = ? and table_name='$model')";
                            // $home = $this->db->query($query1,array($dataId));
                            // if($home->num_rows() > 0){
                            //     $tableData1 = $this->queryHtmlTableModel->getHtmlTableWithQuery($query1,array($dataId1),$count,$tableAction1,null,false,0,null,$model,$tableExclude1,$append1);
                            //  echo $tableData1;
                            // }else{
                            //   echo "No record found";
                            // }

                          ?>
                        <?php endif; ?>
                        <form id="perm_remove_form" action="<?php echo base_url('ajaxData/savePublication'); ?>" method="post">
                          <input type="hidden" value="<?php echo $model; ?>" name="tableModel" id="tableModel">
                          <input type="hidden" value="<?php echo $dataId; ?>" name="userType" id="userType">
                          <input type="hidden" name="remove" id="perm_remove">
                          <input type='submit' value='Remove' name='best_remove_pub' class="btn btn-primary float-right">
                        </form>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" id="close" data-dismiss="modal">Close
                          </button>
                      </div>
                  </div>
              </div>
          </div>
        </div>

      	<!-- this is the view table for each model -->
      	<div class="row">
	      	<div class="col-lg-12 grid-margin">
	      		<div class="card">
	      			<div class="card-body">
	      				<h4 class="card-title"><?php echo $tableTitle; ?></h4>
	      					<?php
						       echo $tableData;
						    ?>
	      			</div>
	      		</div>
	      	</div>
      	</div>
        <?php if($append != ''): ?>
        <div class="row">
          <div class="col-lg-12">
            <form id="perm_form" action="<?php echo base_url('ajaxData/savePublication'); ?>" method="post">
              <input type="hidden" value="<?php echo $model; ?>" name="tableModel" id="tableModel">
              <input type="hidden" value="<?php echo $dataId; ?>" name="userId" id="userId">
              <!-- <input type="hidden" name="remove" id="perm_remove"> -->
              <input type="hidden" name="update" id="perm_update">
              <input type='submit' value='Save as best' name='best_pub' class="btn btn-primary float-right">
            </form>
            <!-- <button class="btn btn-danger float-right" data-toggle="modal" data-target="#basic_modal-editors" style="margin-top:-0px;">Remove as best</button> -->
          </div>
        </div>
      <?php endif; ?>
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
    var inserted=false;
    $(document).ready(function($) {
      // this is to remove publication
      $('#perm_remove_form').submit(function(event) {
        event.preventDefault();
        var remove=[];

        $('.append-content').each(function(index, el) {
          var removeColumnId = $(this).find(':checked').val();
          var tableModel = $('#tableModel').val(),
              userType = $('#userType').val();
          if(typeof removeColumnId !== "undefined"){
            remove.push({removeColumnId:removeColumnId,tableModel:tableModel,userType:userType});
          }
        });

        var removeString = JSON.stringify(remove);
        $('#perm_remove').val(removeString);
        submitAjaxForm($(this));

      });

      // this is to add the save publication
      $('#perm_form').submit(function(event) {
        event.preventDefault();
        var update=[];

        $('.best-content').each(function(index, el) {
          var columnId = $(this).find(':checked').val();
          if(typeof columnId !== "undefined"){
            update.push({columnId:columnId});
          }
        });

        var updateString = JSON.stringify(update);
        $('#perm_update').val(updateString);
        submitAjaxForm($(this));

      });

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

      $('li[data-ajax-editor=1] a').click(function(event){
        event.preventDefault();
        var link = $(this).attr('href');
        var action = $(this).text();
        sendAjax(null,link,'','get',getExtraForm);
      });

    });

    function getExtraForm(target,data){
    	var data = JSON.parse(data);
      if (data.status==false) {
        showNotification(false,data.message);
        return;
      }
       var container = $('#edit-container-extra');
       container.html(data.message);
       //rebind the autoload functions inside
    	$("#basic_modal-editors").modal();
    }

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
<?php 
include "template/footer.php";
?>
