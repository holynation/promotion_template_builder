<?php 
include "template/header.php";
include "template/sidebar_lecturer.php";
?>

<div class="main-panel">
    <div class="content-wrapper">
		<div class="page print-content">
<style type="text/css">
  	 body{font-family: 'Times New Roman';font-size: 1.12rem;}
		table {width:100%; background-color: #fff;border: 2px solid #3FBBC0;font-size:1rem;}

 .tableHeader {padding-bottom: 0}
 .tableLabel { padding: 0 0 5px 5px}

 .tableData, .tableText {padding: 1px 0 0 0}
 .results .tableData {text-align:center; padding: 0 5px}
 .results .tableText {text-align:left; padding: 0 5px;}
 .table1Data {padding: 0px}
 .table1DataHeader {text-decoration: underline solid;}
 .tableDataHeader {padding-bottom: 0}
 .tableData, .tableText {padding-bottom: 0}
	div.page {margin: 0 auto; width: 100%;background-color: #fff;}
	  .sub-header{
	    text-transform: uppercase;
	    text-align: center;
	  }
	  h4.p-header{
	    margin-bottom: 1.2rem;
	  }
	  ul li{
	  	margin-bottom: 13px;
	  	line-height: 1.4;
	  }

	  #push-left{
	  	padding-left: 45px;
	  }
	  td > span{
	  	text-decoration: underline;
	  }
	  #push-edu{
	  	padding:1% 10% 0%;
	  }
/*	
	@counter-style bracketAlpha{
	  system: alphabetic;
	  symbols: (a) (b) (c) (d) (e) (f) (g) (h) (i) (j) (k) (l) (m) (n) (o) (p) (q) (r) (s) (t) (u) (v) (w) (x) (y) (z);
	  suffix: " ";
	  fallback: lower-alpha;
	}*/

	  .divDataHeader{
	  	margin:0;
	  	padding:0;
	  }
	  .divDataHead > p, .divDataSubHead > p,.divDataSubHead > li > p{
		text-decoration: underline solid;
		font-size: 1.05rem;
	  }
	  .divData > ul,.divData1 > ul{
	  	list-style: lower-roman;
	  	margin:0 2%;
	  	padding:0 6.5% 0;
	  }
	  .divData > ul > li,.divData1 > ul > li{
	  	padding-bottom:8px;
	  	font-size: 1rem;
	  	padding-left: 3.4%;
	  	margin-left:-10px;
	  }
	  .divData1 > ul > li{
	  	padding-bottom: 0px;
	  }
	  .divDataSubHead > li > p{
	  	padding-left:3.4%;
	  }
	  .divDataSubHead > li >ul>li{
	  	padding-left:2%;
	  	padding-top: -10px;
	  	line-height: 0.6;
	  }
	  .divDataSubHead >li>ul>#listSub{
	  	font-size: 15.4px;
	  	line-height: 0.6;
	  }
	  #to-span{
	  	font-size: 17.5px;
	  }
	  .narrow{
	  	max-width: 70%;
	  }
	  .breakWord{
	  	word-break: break-word;
	  }

	  #nil-value{
	  	color:inherit;
	  	font-size: 16px;
	  	margin-top:-13px;
	  	margin-left:2.3%;
	  }
	  
  </style>
			<div class="sub-header">
	    		<h4 class="p-header"><?php echo date('Y'); ?> promotions exercise</h4>
	    		<h4>Curriculum Vitae</h4>
	    	</div>
	    	<div>
	    		<?php
	    			// print_r($lecturers);exit;
	    		$lecturer=array();
	    		if(isset($lecturers)){
	    			$lecturer = $lecturers[0];
	    		}

	    		?>
	    		<ul style="list-style-type: upper-roman;margin:0 2%;padding:1% 4%;">
	    			<li>
	    				<table width="750" border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td class="table1Data" id="push-left" width="95"> (a)</td>
								<td class="table1DataHeader">Name:</td>
								<td class="table1Data"><?php echo ucwords($lecturer->firstname .' '.$lecturer->middlename); ?> <span><?php echo ucwords($lecturer->surname); ?></span></td>
							</tr>
							<tr>
								<td class="table1Data" id="push-left" width="95"> (b)</td>
								<td class="table1DataHeader" width="350">Date Of Birth:</td>
								<td class="table1Data"><?php echo dateFormatter($lecturer->dob); ?></td>
							</tr>
							<tr>
								<td class="table1Data" id="push-left" width="95"> (c)</td>
								<td class="table1DataHeader" width="350">Department:</td>
								<td class="table1Data"><?php echo ucwords($lecturer->department->department_name); ?></td>
							</tr>
							<tr>
								<td class="table1Data" id="push-left" width="95"> (d)</td>
								<td class="table1DataHeader" width="350">Faculty:</td>
								<td class="table1Data"><?php echo ucwords($lecturer->department->faculty->faculty_name); ?></td>
							</tr>
						</table>
	    			</li>
	    			<li>
	    				<table width="750" border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td class="table1Data" id="push-left" width="95"> (a)</td>
								<td class="table1DataHeader">First Academic Appointment:</td>
								<td class="table1Data"><?php echo ucwords($appointment->first_academic_appointment); ?> (<?php echo dateFormatter($appointment->date_of_appointment); ?>)</td>
							</tr>
							<tr>
								<td class="table1Data" id="push-left" width="95"> (b)</td>
								<td class="table1DataHeader" width="350">Present Post:</td>
								<td class="table1Data"><?php echo ucwords($appointment->present_post); ?> (<?php echo dateFormatter($appointment->date_of_present_post); ?>)</td>
							</tr>
							<tr>
								<td class="table1Data" id="push-left" width="95"> (c)</td>
								<td class="table1DataHeader" width="250">Date of last Promotion:</td>
								<td class="table1Data"><?php echo dateFormatter($appointment->date_of_last_promotion); ?></td>
							</tr>
							<tr>
								<td class="table1Data" id="push-left" width="95"> (d)</td>
								<td class="table1DataHeader" width="450">Date last considered (in cases where promotion was not through:</td>
								<td class="table1Data"><?php echo ($appointment->date_last_considered)?  dateFormatter($appointment->date_last_considered): 'Not Applicable' ; ?></td>
							</tr>
						</table>
	    			</li>
	    			<!-- this is the unversity education format -->
	    			<li>
	    				<table width="750" border="0" cellpadding="0" cellspacing="0">
	    					<tr>
	    						<td class="table1DataHeader" id="push-left" width="95">University Education (with dates):</td>
	    					</tr>
	    					<?php
		    					foreach($education as $edu):
		    				?>
	    					<tr>
								<td class="table1Data" width="500" id="push-edu"><?php echo $edu->university_name; ?>, <?php echo $edu->location; ?></td>
								<td class="table1Data" id="push-edu1"><?php echo $edu->start_date; ?> - <?php echo $edu->end_date; ?></td>
							</tr>
							<?php endforeach; ?>
	    				</table>
	    			</li>
	    			<li>
	    				<table width="750" border="0" cellpadding="0" cellspacing="0">
	    					<tr>
	    						<td class="table1DataHeader" id="push-left" width="95">Academic Qualifications (with dates and granting institutions): </td>
	    					</tr>
	    					<?php
		    					foreach($qualification as $qua):
		    				?>
	    					<tr>
								<td class="table1Data" width="500" id="push-edu"><?php echo $qua->academic_qualification; ?> (<?php echo ucwords($qua->school_granted); ?>)</td>
								<td class="table1Data" id="push-edu1"><?php echo $qua->date_granted; ?></td>
							</tr>
							<?php endforeach; ?>
	    				</table>
	    			</li>
	    			<li>
	    				<table width="750" border="0" cellpadding="0" cellspacing="0">
	    					<tr>
	    						<td class="table1DataHeader" id="push-left" width="95">Professional qualifications and Diplomas (with date): </td>
	    					</tr>
	    					<?php
	    						if(!empty($professional)){
	    							foreach($professional as $profess){ ?>
										<tr>
											<td class="table1Data" width="450" id="push-edu"><?php echo ucfirst($profess->qualifications); ?>; <?php echo ucfirst($profess->school_granted); ?>; <?php echo $profess->date_granted; ?></td>
										</tr>
	    							<?php }
	    						}else{ ?>
	    							<tr><td class="table1Data" width="450" style="padding:0 10%;">Nil</td></tr>
	    						<?php } ?>
	    				</table>
	    			</li>
	    			<li>
	    				<div class="divDataHeader">
    						<div class="divDataHead" id="push-left">
    						 	<p>Scholarships, Fellowships and Prizes (with dates) in respect of Undergraduate and <br/>Postgraduate work only:</p>
    						</div>
    						<div class="divData">
	    						<ul>
	    					<?php
	    						if(!empty($scholarships)){
	    							foreach($scholarships as $scholar){
	    							?>
									<li class="breakWord narrow"><?php echo ucfirst($scholar->title_name); ?>
										<?php 
											echo ($scholar->start_date && $scholar->end_date) ? " - ". $scholar->start_date ." <span id='to-span'>to</span> ". $scholar->end_date : ' ';
										?>
									</li>
						<?php } ?>
	    				<?php } else{ ?>
	    							<p id="nil-value">Nil</p>
	    				<?php } ?>
			    				</ul>
			    			</div>
	    				</div>
	    			</li>
	    			<li>
	    				<div class="divDataHeader">
    						<div class="divDataHead" id="push-left">
    						 	<p>Honours, Distinction and Membership of Learned Societies:</p>
    						</div>
    						<div class="divData1">
	    						<ul>
	    					<?php
	    						if(!empty($honours)){
	    							foreach($honours as $honour){
	    							?>
									<li class="breakWord narrow"><?php echo ucfirst($honour->title_name); ?>;
										<?php echo $honour->date_awarded;?>
									</li>
						<?php } } ?>
						<?php
							if(!empty($memberships)){
								foreach($memberships as $member){ ?>
									<li class="breakWord narrow"><?php echo $member->office_held; ?>, <?php echo ucfirst($member->society_name); echo ($member->start_date) ? "; $member->start_date - $member->end_date" : ' '; ?>
									</li>
								<?php } } ?>
	    					<?php
	    						if(empty($honours) && empty($memberships)){
	    							echo '<p id="nil-value">Nil</p>';
	    						}
	    					?>
			    				</ul>
			    			</div>
	    				</div>
	    			</li>
	    			<!-- this is the teaching experience section -->
	    			<li>
	    				<div class="divDataHeader">
    						<div class="divDataHead" id="push-left">
    						 	<p>Details of Teaching / Work Experience:</p>
    						</div>
	    						<ul style="list-style-type: lower-alpha;margin-left:5%;font-size: 1.035rem;">
	    							<div class="divDataSubHead">
		    							<li>
				    						<p>Work Experience:</p>
				    						<ul>
				    						<?php
					    						if(!empty($experiences)){
					    							foreach($experiences as $exp){
					    							?>
					    							<?php
					    							 if($exp->within_a_year){ ?>
														<li id="listSub"><?php echo ucfirst($exp->post_held); ?>, <?php echo ucfirst($exp->institute_name); ?> <?php echo $exp->within_a_year; ?>
														</li> 
					    							 <?php }else{
					    							?>
													<li id="listSub"><?php echo ucfirst($exp->post_held); ?>, <?php echo ucfirst($exp->institute_name); ?> <?php echo ($exp->start_date) ? "$exp->start_date to $exp->end_date" : ' ' ; ?>
													</li> 
											<?php } } } ?>
											</ul>
		    							</li>
		    							<li>
				    						<p>Courses taught at Undergraduate:</p>
				    						<ul>
				    						<?php
					    						if(!empty($experiences)){
					    							foreach($experiences as $exp){
					    							?>
					    							<?php
					    							 if($exp->within_a_year){ ?>
														<li id="listSub"><?php echo ucfirst($exp->post_held); ?>, <?php echo ucfirst($exp->institute_name); ?> <?php echo $exp->within_a_year; ?>
														</li> 
					    							 <?php }else{
					    							?>
													<li id="listSub"><?php echo ucfirst($exp->post_held); ?>, <?php echo ucfirst($exp->institute_name); ?> <?php echo ($exp->start_date) ? "$exp->start_date to $exp->end_date" : ' ' ; ?>
													</li> 
											<?php } } } ?>
											</ul>
		    							</li>
	    							</div>
		    					</ul>
    						<div class="divData1">
	    						<ul>
	    					

	    					<?php
	    						if(empty($experiences)){
	    							echo '<p id="nil-value">Nil</p>';
	    						}
	    					?>
			    				</ul>
			    			</div>
	    				</div>
	    			</li>
	    		</ul>
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
