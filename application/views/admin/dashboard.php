<?php 
include "template/header.php";
include "template/sidebar.php";
?>

<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
          <div class="card card-statistics">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left">
                  <i class="mdi mdi-cube text-danger icon-lg"></i>
                </div>
                <div class="float-right">
                  <p class="mb-0 text-right">Users</p>
                  <div class="fluid-container">
                    <h3 class="font-weight-medium text-right mb-0"><?php echo $users; ?></h3>
                  </div>
                </div>
              </div>
              <p class="text-muted mt-3 mb-0">
                <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> All Users
              </p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
          <div class="card card-statistics">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left">
                  <i class="mdi mdi-receipt text-warning icon-lg"></i>
                </div>
                <div class="float-right">
                  <p class="mb-0 text-right">Scholarships</p>
                  <div class="fluid-container">
                    <h3 class="font-weight-medium text-right mb-0"><?php echo $scholarship; ?></h3>
                  </div>
                </div>
              </div>
              <p class="text-muted mt-3 mb-0">
                <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> All Scholarships
              </p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
          <div class="card card-statistics">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left">
                  <i class="mdi mdi-poll-box text-success icon-lg"></i>
                </div>
                <div class="float-right">
                  <p class="mb-0 text-right">Publications</p>
                  <div class="fluid-container">
                    <h3 class="font-weight-medium text-right mb-0"><?php echo $publication; ?></h3>
                  </div>
                </div>
              </div>
              <p class="text-muted mt-3 mb-0">
                <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> All publications
              </p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
          <div class="card card-statistics">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left">
                  <i class="mdi mdi-account-location text-info icon-lg"></i>
                </div>
                <div class="float-right">
                  <p class="mb-0 text-right">Department</p>
                  <div class="fluid-container">
                    <h3 class="font-weight-medium text-right mb-0"><?php echo $department; ?></h3>
                  </div>
                </div>
              </div>
              <p class="text-muted mt-3 mb-0">
                <i class="mdi mdi-reload mr-1" aria-hidden="true"></i> All Department
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <div class="row d-none d-sm-flex mb-4">
                <div class="col-4">
                  <h5 class="text-primary">Unique Visitors</h5>
                  <p>34657</p>
                </div>
                <div class="col-4">
                  <h5 class="text-primary">Bounce Rate</h5>
                  <p>45673</p>
                </div>
                <div class="col-4">
                  <h5 class="text-primary">Active session</h5>
                  <p>45673</p>
                </div>
              </div>
              <div class="chart-container">
                <canvas id="dashboard-area-chart" height="80"></canvas>
              </div>
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
