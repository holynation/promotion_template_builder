<?php 
include "template/header.php";
include "template/sidebar_lecturer.php";
?>

<div class="main-panel">
    <div class="content-wrapper">
    	<div class="row">
            <div class="col-lg-8">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body" id="card-more">
                      <h4 class="card-title">Entry form</h4>
                      <form class="forms-sample">
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
	                        	<div class="col-sm-5">
	                        		<div class="form-group">
	                        			<label for="course_title">Session Name</label>
	                        			<?php $option = dropDownSession(); ?>
	                          			<select name="course_title" id="course_title" class="form-control">
	                          				<option value=''>..choose session....</option>
	                          				 <?php echo $option; ?>
	                          			</select>
	                        		</div>
	                    		</div>
	                        	<div class="col-sm-5">
	                        		<div class="form-group">
		                    			<a class="btn btn-success mr-2" id="next" style="margin:7% 0 0;" onclick="addMoreExist();">Add More</a>
		                    		</div>
	                        	</div>
	                        </div>
                        </div>
                        <div class="form-group">
                        	<label for="num_of_person">Number of persons</label>
                        	<input type="number" name="num_of_person" id="num_of_person" class="form-control" placeholder="number of person that took the course" required/>
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
                        
                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                      </form>
                      	<script type="text/javascript">
                    		var j = 1;
                    		var option = "<?php echo dropDownSession(); ?>";
                    		function addMoreExist(){
                    			if(j < 8){
								        var session = "<div class=\"col-sm-5\"><div class=\"form-group\"><label for=\"course_title\">Session Name</label><select name=\"course_title\" id=\"course_title\" class=\"form-control\"><option value=''>..choose session....</option>"+option+"</select></div></div>";

								        var remove_sign = "<div class='col-sm-2'><div class='form-group'><label>&nbsp;&nbsp;</label><i style='cursor:pointer;' class='mdi mdi bookmark-remove form-control remove-flight'> remove</i></div></div>";

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
                    	</script>
                    </div>
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
