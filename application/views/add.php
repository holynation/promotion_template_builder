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
  $tableExclude = array_merge(array('date_created'),$tableExclude);
}else{
  $tableExclude = array('date_created');
}
$tableData = $this->tableViewModel->getTableHtml($model,$count,$tableExclude,$tableAction,true,0,null,true,$where);
}
else{
$tableData = $this->tableViewModel->getTableHtml($model,$count,$tableExclude,$tableAction,true,0,null,true);
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
        <!-- this is the add form  -->
      	<div class="row">
      		<div id="basic_modal" class="modal fade animated" role="dialog">
	            <div class="modal-dialog">
	                <div class="modal-content">
	                    <div class="modal-header">
	                        <h4 class="modal-title">
                            <?php echo removeUnderscore($model);  ?> Entry Form
                                <label class="text-muted"><?php echo ($form_hint != '') ? $form_hint : ' '; ?></label>
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
        <!-- this is the extra form for addition action -->
      	<div class="row">
      		<div id="basic_modal-editors" class="modal fade animated" role="dialog">
	            <div class="modal-dialog">
	                <div class="modal-content">
	                    <div class="modal-header">
	                        <h4 class="modal-title"><?php echo 'Editors';  ?> Entry Form</h4>
	                  		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                    		<span aria-hidden="true">&times;</span></button>
	                    </div>
	                    <div class="modal-body">
	                        <p id="edit-container-extra">

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

        <!-- <input type="text" data-range="true" data-multiple-dates-separator=" - " data-language="en" class="datepicker-here"/> -->

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
