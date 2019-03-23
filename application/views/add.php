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
$removeMultipleCheckbox = ($configData && array_key_exists('removeMultipleCheckbox', $configData))?$configData['removeMultipleCheckbox']:false;
// $showStatus = ($configData && array_key_exists('show_add', $configData))?$configData['show_add']:true;

$show_add = ($this->webSessionManager->getCurrentUserProp('user_type') == 'lecturer' && $model == 'lecturer') ? false : true;
$append = ($showAppendForm) ? array('type'=>'checkbox','class'=>'form-control','name'=>'bp_list') : '';

$search = ($configData && array_key_exists('search', $configData))?$configData['search']:"";
$filter = ($configData && array_key_exists('filter', $configData))?$configData['filter']:"";
$where ='';

if ($filter) {
  foreach ($filter as $item) {
    $display = (isset($item['filter_display'])&&$item['filter_display'])?$item['filter_display']:$item['filter_label'];

    if (isset($_GET[$display]) && $_GET[$display]) {
      $value = $this->db->conn_id->escape_string($_GET[$display]);
      $where.= $where?" and {$item['filter_label']}='$value' ":"where {$item['filter_label']}='$value' ";
    }
  }
}

if ($search) {
   $val = isset($_GET['q'])?$_GET['q']:'';
   $val = $this->db->conn_id->escape_string($val);
   if (isset($_GET['q']) && $_GET['q']) {
        $temp=$where?" and (":" where (";
        $count =0;
        foreach ($search as $criteria) {
          $temp.=$count==0?" $criteria like '%$val%'":" or $criteria like '%$val%' ";
          $count++;
        }
        $temp.=')';
        $where.=$temp;
   }
}

if (isset($_GET['export'])) {
    $this->queryHtmlTableModel->export=true;
    $this->tableViewModel->export=true;
}

// this are the empty parameter for the model
$tableData = '';
$dataId='';
$parentModel='';
//  end parameter model

// this is the lecturer section
if($this->webSessionManager->getCurrentUserProp('user_type') == 'lecturer'){
// $tableData= $this->queryHtmlTableModel->getHtmlTableWithQuery($query,array($dataId),$count,$tableAction,null,true,0,50,$parentModel,$tableExclude);

    if($model == 'lecturer')
    {
      $dataId = $this->webSessionManager->getCurrentUserProp('user_table_id');
      $where .= $where ? " and lecturer.id = $dataId" : " where lecturer.id = $dataId";
      $count = 1;
      $query .= ' '. $where;
      $parentModel='';
    }
    else
    {
      $dataId = $this->webSessionManager->getCurrentUserProp('user_table_id');
      $where .= $where ? " and lecturer.id = $dataId" : " where lecturer.id = $dataId";
    }

    if($model == 'chapter_in_book_published' && $this->webSessionManager->getCurrentUserProp('user_type') == 'lecturer'){
      $tableExclude = array('editors_id');
    }

    if(!empty($tableExclude)){
      $tableExclude = array_merge(array('date_created','lecturer_id'),$tableExclude);
    }else{
      $tableExclude = array('date_created','lecturer_id');
    }
    $order = " order by ID desc ";
    $tableData = $this->tableViewModel->getTableHtml($model,$count,$tableExclude,$tableAction,true,0,null,true,$order,$where,$append,!$removeMultipleCheckbox);
}

// this is for the admin section
else
{
  if ($model == 'role') {
    $tableData= $this->queryHtmlTableModel->getHtmlTableWithQuery($query,array($dataId),$count,$tableAction);
  }else{
    // $where = ' ';
    $where .= $where ? " order by ID desc" : " order by ID desc";
    $tableData = $this->tableViewModel->getTableHtml($model,$count,$tableExclude,$tableAction,true,0,20,true,$where,'',array(),!$removeMultipleCheckbox);
  }
}

?>

<div>
<?php 
    $formContent= $this->modelFormBuilder->start($model.'_table')
    ->appendInsertForm($model,true,$hidden,'',$showStatus,$exclude)
    ->addSubmitLink()
    ->appendResetButton('Reset','btn-danger')
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
      <div class="row alert alert-info">
        <div class="col-6">
          <p>
            <b>Note:</b> Click the checkbox to choose the best publication amidst other publications.<br/>
            <b>Note:</b> However, make sure to click the save as best button to save what you have checked.
          </p>
        </div>
        <div class="col-6">
          <?php if($showAsteriskInfo): ?>
          <ul>
            <li><b>Note:</b> Use One asterisk for publications appearing after last promotion.</li>
            <li><b>Note:</b> Use Two asterisks for publications appearing since last failed attempt.</li>
          </ul>
        <?php endif; ?>
        </div>
      </div>
    <?php endif; ?>

    	<div class="row purchace-popup">
	        <div class="col-12">
            <h4>Administrative <?php echo removeUnderscore($model); ?></h4>
	          <span class="d-flex align-items-center">
              <?php if($show_add): ?>
              <div class="col-7">
                <div class="row">
                    <?php 
                      $where='';
                     ?>
                     <?php if ($filter): ?>
                    <form action="">
                      <div class="d-flex flex-row justify-content-between" style="">
                        <?php foreach ($filter as $item): ?>
                           <?php $display = (isset($item['filter_display'])&&$item['filter_display'])?$item['filter_display']:$item['filter_label']; ?>
                          <?php 
                            if (isset($_GET[$display]) && $_GET[$display]) {
                              $value = $this->db->conn_id->escape_string($_GET[$display]);
                              $where.= $where?" and {$item['filter_label']}='$value' ":"where {$item['filter_label']}='$value' ";
                            }
                          ?>
                          <select class="form-control <?php echo isset($item['child'])?'autoload':'' ?>" name="<?php echo $display; ?>" id="<?php echo $display; ?>" <?php echo isset($item['child'])?"data-child='{$item['child']}'":""?> <?php echo isset($item['load'])?"data-load='{$item['load']}'":""?> >
                            <option value="">..select <?php echo removeUnderscore(rtrim($display,'_id')) ?>...</option>
                            <?php if (isset($item['preload_query'])&& $item['preload_query']): ?>
                              <?php echo buildOptionFromQuery($this->db,$item['preload_query'],null,isset($_GET[$display])?$_GET[$display]:''); ?>
                            <?php endif; ?>
                          </select>
                        <?php endforeach; ?>
                      <?php endif; ?>

                    <?php if ($search): ?>

                      <?php 
                        $placeholder=" search by : ".implode(',', $search);
                        $val = isset($_GET['q'])?$_GET['q']:'';
                        $val = $this->db->conn_id->escape_string($val);
                       ?>
                      <input class="form-control" type="text" name="q" placeholder="<?php echo $placeholder; ?>" value="<?php echo $val; ?>">
                     
                    <?php endif; ?>
                    
                        <?php if ($search || $filter): ?>
                         <input type="submit" value="Filter" class="btn btn-primary">
                      </div>
                    </form>
                <?php endif; ?>
                    <!-- <div style="margin-top: 15px;" class="alert alert-info">Load the data to export with the necessary parameter before clicking export button</div>
                    <?php 
                      //$queryString= $_SERVER['QUERY_STRING'];
                     ?>
                   <a target="_blank" href="<?php //echo $queryString?('?'.$queryString.'&export=yes'):'?export=yes'; ?>" style="margin-top: 15px;" class="btn btn-primary pull-right" id="export-btn">Export Data</a>
                   <div class="clear"></div> -->
                   <br>
                </div>
              </div>
              
                <div class="row col-5 justify-content-end">
                  <div class="col-md-3 col-sm-3">
                    <button type="button" class="btn btn-dark btn-block" data-toggle="modal" data-target="#basic_modal" data-animate-modal="zoomInDown">Add
                    </button>
                  </div>
                  <!-- <div class="col-md-3 col-sm-3">
                    <button type="button" class="btn btn-dark" data-toggle='modal' data-target='#modal-upload' data-animate-modal="zoomInDown">Batch Upload</button>
                  </div> -->
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

        <?php if ($configData==false || array_key_exists('has_upload', $configData)==false || $configData['has_upload']): ?>
          <div class="modal modal-default fade" id="modal-upload">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title"><?php echo removeUnderscore($model) ?> Batch Upload</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div >
                      <a  class='btn btn-info' href="<?=base_url("mc/template/$model?exc=name")?>">Download Template</a>
                    </div>
                    <br/>
                    <h3>Upload <?php echo removeUnderscore($model) ?></h3>
                    <form method="post" action="<?php echo base_url('mc/sFile/'.$model) ?>" enctype="multipart/form-data">
                    <div class="form-group">
                      <input type="file" name="bulk-upload" class="form-control">
                      <input type="hidden" name="MAX_FILE_SIZE" value="300000">
                    </div>
                     <div class="form-group">
                        <input type="submit" class='btn btn-success' name="submit" value="Upload">
                      </div>
                    </form>
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->
        <?php endif ?>

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
              <div class="col-sm-4" style="margin:10px;">
                <div class="dropdown">
                  <button type="button" class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Action
                  </button>
                  <div>
                    <input type="hidden" name="modelAction" id="modelAction" value="<?php echo $model; ?>">
                    <input type="hidden" name="actionUrl" id="actionUrl" value='<?php echo base_url("ac/multipleAction/$model");?>'>
                  </div>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="javascript:void(0);" name="multipleDelete" id="multipleDelete">
                      <i class="fa fa-reply fa-fw"></i>Delete
                    </a>
                  </div>
                </div>
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
        if (confirm("are you sure you want to save best publication (s) ?")) {
          submitAjaxForm($(this));
        }
        
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
