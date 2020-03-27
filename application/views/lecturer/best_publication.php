<?php 
include "template/header.php";
include "template/sidebar_lecturer.php";
?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-sm-12">
          <div class="alert alert-info">This page is for Ten(10) Best Publications that Reflect the Totality of My Contribution to Scholarship</div>
        </div>

        <div class="row">
          <div class="col-lg-12 grid-margin">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Best Publication Lift Page</h4>
                  <?php
                  $dataId = $this->webSessionManager->getCurrentUserProp('user_table_id');
                  $where = " where lecturer.id = $dataId";
                  $tableExclude =array('pg_courses_qualify','lecturer_id');
                  $tableAction ='';
                  $append = array('type'=>'checkbox','class'=>'form-control','name'=>'bp_list');
                  $query = "SELECT bp.ID,bp.title_of_book as list_of_publications from book_published bp UNION ALL SELECT cbp.ID,cbp.title_of_chapter from chapter_in_book_published cbp";
                  $tableData= $this->queryHtmlTableModel->getHtmlTableWithQuery($query,array($dataId),$count,$tableAction,null,false,0,null,null,array(),$append);
                  // $tableData = $this->tableViewModel->getTableHtml($model,$count,$tableExclude,$tableAction,true,0,null,true,$where);
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
