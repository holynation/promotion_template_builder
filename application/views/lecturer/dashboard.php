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
                  <i class="mdi mdi-school text-danger icon-lg"></i>
                </div>
                <div class="float-right">
                  <p class="mb-0 text-right">Qualification</p>
                  <div class="fluid-container">
                    <h3 class="font-weight-medium text-right mb-0"><?php echo $qualification; ?></h3>
                  </div>
                </div>
              </div>
              <p class="text-muted mt-3 mb-0">
                <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i>All Qualifications
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
                <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i>All Scholarships
              </p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
          <div class="card card-statistics">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left">
                  <i class="mdi mdi-book-open-page-variant text-success icon-lg"></i>
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
                  <i class="mdi mdi-file-presentation-box text-info icon-lg"></i>
                </div>
                <div class="float-right">
                  <p class="mb-0 text-right">Conferences</p>
                  <div class="fluid-container">
                    <h3 class="font-weight-medium text-right mb-0"><?php echo $conference; ?></h3>
                  </div>
                </div>
              </div>
              <p class="text-muted mt-3 mb-0">
                <i class="mdi mdi-reload mr-1" aria-hidden="true"></i> Conference(s) Attended
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <div class="chart-container">
                <canvas id="myChart" width="400" height="150"></canvas>
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
<script src="<?php echo base_url('assets/vendors/charts/src/chart.js') ?>"></script>
<?php include "template/footer.php"; ?>
<script type="text/javascript">
var ctx = document.getElementById("myChart");
var dataVal = JSON.parse('<?php echo $buildDataJson; ?>');
console.log(dataVal);

var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Book Published", "Chapter in books", "Article in Conf", "Patents", "Article in Journal", "Book Accepted","Technical"],
        datasets: [{
            label: 'Publications Available',
            data: dataVal,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 159, 64, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>
