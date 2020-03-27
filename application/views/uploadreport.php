<?php 
include "template/header.php";
include "template/sidebar.php";
?>

<div class="main-panel">
    <div class="content-wrapper">
      <div class="col-sm-12">
        <h3 class="undeline-title"><?php echo removeUnderscore(ucfirst($model));?> Upload Report</h3>
        <?php if ($status): ?>
          <div class="alert alert-success"><?php echo  wordwrap(ucfirst($message), 100 , "\n", true);  ?></div>
          <?php else: ?>
            <div class="alert alert-danger"><?php echo ucfirst($message); ?></div>
        <?php endif; ?>
      </div>
      <br>
      <a href="<?php echo (@$backLink)? @$backLink : $_SERVER['HTTP_REFERER']; ?>" class="btn btn-dark btn-block">
        <i class="fa fa-back"></i> Back
      </a>
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
