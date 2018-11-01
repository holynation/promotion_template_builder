<?php 
include "template/header.php";
include "template/sidebar.php";
?>

<div class="main-panel">
    <div class="content-wrapper">
      <div class="col-md-10 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title">Settings</h3>
            <?php 
            loadClass($this->load,'dev_app');
            $school= $this->dev_app->all();
            if ($school) {
              echo $this->modelFormBuilder->start('app_table')
              ->appendUpdateForm('dev_app',true,$school[0]->ID)
              ->addSubmitLink(null,false)
              ->appendSubmitButton("Update",'btn btn-success')
              ->build();
            }
            else{
              echo $this->modelFormBuilder->start('app_table')
              ->appendInsertForm('dev_app',true,array('id'=>''))
              ->addSubmitLink()
              ->appendSubmitButton("Save",'btn btn-success')
              ->build();
            }
           ?>
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
