<?php 
include "template/header.php";
include "template/sidebar_lecturer.php";
?>

<div class="main-panel">
    <div class="content-wrapper">
		<div class="page print-content">
<style type="text/css">
  	 body{font-family: 'Times New Roman';font-size: 1.125rem;}
	table {width:100%; background-color: #fff;font-size:1.125rem;font-family: 'Times New Roman';}
 .table1Data {padding: 0px}
 .table1DataHeader {text-decoration: underline solid;}
 .tableDataHeader {padding-bottom: 0}
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
	  .divData>ul>li{
	  	color:inherit;
	  	font-size: 1.09rem;
	  }
	  .divData1 > ul > li{
	  	padding-bottom: 0px;
	  	font-size: 1.09rem;
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
	  	font-size: 1.09rem;
	  	line-height: 1;
	  }
	  .divDataSubHead >li>ul>#listSub>p,.divDataSubHead>ol>#listSub>p,.divData>ul>#listSub>p{
	  	font-size: 1.09rem;
	  	line-height: 1;
	  }
	  .divData>ul>#listSub>p{
	  	margin-bottom: 0px;
	  }
	  .divDataSubHead >ol>#listSub{
	  	font-size: 1rem;
	  	padding-left:2%;
	  	margin-left: 1%;
	  	padding-top: 10px;
	  }
	  #single-listSub{
	  	padding-left: 2%;
	  	padding-top: 1.8%;
	  	font-size: 1.09rem;
	  	margin-left: 1%;
	  }
	  #asterisks-id{
	  	padding-top: 20.9px;
	  }
	  .divDataSubHead>ol>li{
	  	list-style-type: decimal;
	  	position: relative;
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

	  #nil-value,#publications>#nil-value{
	  	color:inherit;
	  	font-size: 16px;
	  	margin-top:-13px;
	  	margin-left:2.3%;
	  }
	  #publications #nil-value{
	  	margin:0 4.5% 1%;
	  }
	    .signature{
		  padding:10px;
		  margin-left:5%;
		  text-align: center;
		  width: 220px;
		}
		.date-sign{
			margin-right: 5%;
		}
	  
  </style>
			<div class="sub-header">
	    		<h4 class="p-header"><?php echo date('Y'); ?> promotions exercise</h4>
	    		<h4>Curriculum Vitae</h4>
	    	</div>
	    	<div>
	    		<?php
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
	    			<!-- this is the academic qualification section -->
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
	    			<!-- this is the professional qualification and diplomas -->
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
	    			<!-- this is scholarship section -->
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
	    			<!-- this is the honour section -->
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
										<?php } } }else{ echo '<p id="nil-value">Nil</p>'; } ?>
										</ul>
	    							</li>
	    							<?php
	    							$teachData =array();
    								if(!empty($teachings)){
    									$teachData = $teachings;
    								}
	    							?>
	    							<li>
			    						<p>Courses taught at Undergraduate:</p>
			    						<ul>
			    						<?php
				    						if(!empty($teachData)){
				    							foreach($teachData as $teach){ ?>
				    							<?php
				    							if(strtolower($teach->category) == 'undergraduate'){ ?>
			    									<li id="listSub">
														<table width="750" border="0" cellpadding="0" cellspacing="0">
															<tr>
															<td class="divData1" width="90"><?php echo ucfirst($teach->course_code); ?></td>
															<td class="divData1" width="300"><?php echo ucfirst($teach->course_title); ?></td>
															<td class="divData1">
															<?php 
															$session = $teach->session_name;
															$last = strrchr($session,",");
															if($last != false){
																if(strpos($last,"till") !== false){
																	$pos = strpos($session, $last);
																	$session = "(".substr_replace($session," - ",$pos,1). "); ";
																}else{
																	$pos = strpos($session, $last);
																	$session = "(".substr_replace($session," & ",$pos,1). "); ";
																}
																
															}else{
																$session = "(".$session."); ";
															}
																echo $session;
																echo ($teach->total_person > 1) ? $teach->total_person ." persons" : $teach->total_person.  " person";
															 ?>
															 </td>
														</tr>
														</table>
													</li> 
												
										<?php } } }else{ echo '<p id="nil-value">Nil</p>'; } ?>
										</ul>
	    							</li>
	    							<li>
			    						<p>Courses taught at Postgraduate:</p>
			    						<ul>
			    						<?php
				    						if(!empty($teachData)){
				    							foreach($teachData as $teach){
				    							?>
				    							<?php
				    								if(strtolower($teach->category) == 'postgraduate'){ ?>
				    									<li id="listSub">
															<table width="750" border="0" cellpadding="0" cellspacing="0">
																<tr>
																<td class="divData1" width="90"><?php echo ucfirst($teach->course_code); ?></td>
																<td class="divData1" width="300"><?php echo ucfirst($teach->course_title); ?></td>
																<td class="divData1">
																<?php 
																$session = $teach->session_name;
																$last = strrchr($session,",");
																if($last != false){
																	if(strpos($last,"till") !== false){
																		$pos = strpos($session, $last);
																		$session = "(".substr_replace($session," - ",$pos,1). "); ";
																	}else{
																		$pos = strpos($session, $last);
																		$session = "(".substr_replace($session," & ",$pos,1). "); ";
																	}
																	
																}else{
																	$session = "(".$session."); ";
																}
																	echo $session;
																	echo ($teach->total_person > 1) ? $teach->total_person ." persons" : $teach->total_person.  " person";
																 ?>
																 </td>
															</tr>
															</table>
														</li> 
				    								<?php } ?>
												
										<?php  } }else{ echo '<p id="nil-value">Nil</p>'; } ?>
										</ul>
	    							</li>
	    							<li>
	    								<p>Research Supervision:</p>
	    								<ul style="list-style: none;margin-left:-6px;margin-top:-5px;">
	    									<?php 
	    										$superData = array();
	    										if(!empty($supervision)){
	    											$superData = $supervision;
	    										}
	    									 ?>
	    									<li>
	    										<table width="750" border="0" cellpadding="6" cellspacing="0">
													<tr>
													<?php
					    								foreach($superData as $super){
					    							?>
														<?php if($super->category == 'completed'): ?>
														<td class="divData1" width="100">M.Sc.</td>
														<td class="divData1" width="100">Completed:</td>
														<td class="divData1" width="80"><?php echo ($super->msc_total != '')? $super->msc_total: 'Nil'; ?></td>
														<?php else: ?>
														<td class="divData1" width="100">M.Sc.</td>
														<td class="divData1" width="100">Ongoing:</td>
														<td class="divData1"><?php echo ($super->msc_total != '') ? $super->msc_total : 'Nil'; ?></td>
														<?php endif; ?>
														<?php } ?>
													</tr>
													<tr>
														<?php
						    								foreach($superData as $super){
						    							?>
						    							<?php if($super->category == 'completed'): ?>
														<td class="divData1" width="90">M.Phil/PhD</td>
														<td class="divData1" width="95">Completed:</td>
														<td class="divData1" width="80"><?php echo ($super->phd_total != '') ? $super->phd_total : 'Nil'; ?></td>
														<?php else: ?>
														<td class="divData1" width="90">M.Phil/PhD</td>
														<td class="divData1" width="85">Ongoing:</td>
														<td class="divData1"><?php echo ($super->phd_total != '') ? $super->phd_total : 'Nil'; ?></td>
														<?php endif; ?>
														<?php } ?>
													</tr>
												</table>
	    									</li>
	    								</ul>
	    							</li>
	    							<li>
					    				<div class="divDataHeader" id="publications">
				    						<div class="divDataHead" style="margin-left: 30px;">
				    						 	<p>Community Service and Administrative Responsibilities:</p>
				    						</div>
			    							<div class="divDataSubHead">
				    							<ul style="margin-left:6%;font-size: 1.035rem;">
			    									<div class="divDataHead" style="margin-left: -4.4%;margin-top:-5px;">
						    						 	<p>Community Service:</p>
						    						</div>
			    									<?php
							    						if(!empty($community)){
							    							foreach($community as $comm){
							    						?>
								    					<div class="row" style="margin-left:-2%;">
								    						<div class="col-sm-12" style="margin-left:-5.4%;">
								    							<li style="padding-left:13px;font-size: 1.09rem;margin-bottom: 15px;margin-top: -15px;">
								    								<?php echo punctuateStr($comm->office_held,','); ?>
								    								<?php echo $comm->society_name; ?>
								    								<?php echo $comm->session_period; ?>
																</li>
															</div>
								    					</div>
							    						<?php } }else{ ?>
														<p id="nil-value" style="margin:-10px -10px 10px;">Nil</p>
														<?php }  ?>
														<!-- end of community -->
												</ul>
			    							</div>
			    							<div class="divDataSubHead">
				    							<ul style="margin-left:6%;font-size: 1.035rem;">
			    									<div class="divDataHead" style="margin-left: -4.4%;">
						    						 	<p>Administrative duties:</p>
						    						</div>
			    									<?php
							    						if(!empty($administrative)){
							    							foreach($administrative as $admini){
							    						?>
								    					<div class="row" style="margin-left:-2%;">
								    						<div class="col-sm-12" style="margin-left:-5.4%;">
								    							<li style="padding-left:13px;font-size: 1.09rem;margin-bottom: 15px;margin-top: -15px;">
								    								<?php echo punctuateStr($admini->office_held,','); ?>
								    								<?php echo $admini->society_name; ?>
								    								<?php echo $admini->session_period; ?>
																</li>
															</div>
								    					</div>
							    						<?php } }else{ ?>
														<p id="nil-value" style="margin: -10px;">Nil</p>
														<?php }  ?>
														<!-- end of administrative -->
												</ul>
			    							</div>
					    				</div>
	    							</li>
    							</div>
	    					</ul>
	    				</div>
	    			</li>
	    			<!-- this is the research section -->
	    			<li style="page-break-before: always;">
	    				<div class="divDataHeader">
    						<div class="divDataHead" id="push-left">
    						 	<p>Research:</p>
    						</div>
    						<ul style="list-style-type: lower-alpha;margin-left:5%;font-size: 1.035rem;">
    							<div class="divDataSubHead">
	    							<li>
			    						<p>Completed:</p>
			    						<ul style="list-style-type: lower-roman;">
			    						<?php
				    						if(!empty($research_com)){
				    							foreach($research_com as $complete){
				    						?>
											<li id="listSub"><p><?php echo ucfirst($complete->topic_name); ?></p></li> 
										<?php } }else{ ?>
											<p id="nil-value">Nil</p>
										<?php }  ?>
										</ul>
	    							</li>
	    							<li>
			    						<p>In Progess:</p>
			    						<ul style="list-style-type: lower-roman;">
			    						<?php
				    						if(!empty($research_in)){
				    							foreach($research_in as $progress){
				    						?>
											<li id="listSub">
												<p>
												<?php echo ucfirst($progress->topic_name); ?><br/>
												<?php echo ucfirst($progress->importance); ?> 
												<?php echo ucfirst($progress->current_doing); ?>
												<?php echo ($progress->significance) ? ucfirst($progress->significance): " " ; ?>
												<?php echo ucfirst($progress->progress_of_research); ?>
												</p>
											</li> 
										<?php } }else{ ?>
											<p id="nil-value">Nil</p>
										<?php }  ?>
										</ul>
	    							</li>
	    							<li>
	    								<p>Project, Dissertation and Thesis:</p>
			    						<ul style="list-style-type: lower-roman;">
			    						<?php
			    						$userInitial = $this->webSessionManager->getNameInitial();
				    						if(!empty($project_thesis)){
				    							foreach($project_thesis as $project){
				    						?>
											<li id="listSub">
												<?php echo $userInitial; ?> <?php echo "(" .$project->year_research .")." ; ?>
												<?php echo $project->research_name; ?>
												<?php echo $project->research_category; ?>
												<?php echo $project->sch_of_research; ?>
											</li> 
										<?php } }else{ ?>
											<p id="nil-value">Nil</p>
										<?php }  ?>
										</ul>
	    							</li>
    							</div>
	    					</ul>
	    				</div>
	    			</li>
	    			<!-- this is the publication section -->
	    			<li style="page-break-before: always;">
	    				<div class="divDataHeader" id="publications">
    						<div class="divDataHead" id="push-left">
    						 	<p>Publications:</p>
    						</div>
    						<ul style="list-style-type: lower-alpha;margin-left:5%;font-size: 1.035rem;">
    							<div class="divDataSubHead">
	    							<ol>
    									<table style="margin-left: -34px;" width="750" border="0" cellpadding="0" cellspacing="0">
											<tr>
												<td class="table1Data" width="50"> (a)</td>
												<td class="table1DataHeader">Books already published:</td>
											</tr>
    									</table>
    									<?php
				    						if(!empty($book_publish)){
				    							foreach($book_publish as $bp){
				    						?>
				    						<?php
				    							$padding='';
		    									$padAsterisk = '';
		    									if($bp->asterisks == 1){
		    										$padding = "4px";
		    										$padAsterisk = "*";
		    									}else if($bp->asterisks == 2){
		    										$padding = "-4px";
		    										$padAsterisk = "**";
		    									}
		    								?>
					    					<div class="row" style="margin-left:-4%;">
					    						<div class="col-sm-1">
					    							<?php if($bp->asterisks != ''): ?>
				    								<p style="margin-left:<?php echo $padding; ?>;" id="asterisks-id">
				    									<?php echo $padAsterisk; ?>
				    								</p>
				    								<?php endif; ?>
					    						</div>
					    						<div class="col-sm-11" style="margin-left:-6%;">
					    							<li id="single-listSub">
														<?php echo $bp->author_names ;?> 
														<?php echo punctuateStr(addParenthesis($bp->year_of_publication,'(',')')); ?>
														<?php echo "<i>". punctuateStr($bp->title_of_book,'.') ."</i>"; ?>
														<?php echo punctuateStr($bp->city_of_publication,':') ?>
														<?php echo punctuateStr($bp->publish_company_name,'.') ?>
														<?php echo punctuateStr(appendAtEnd($bp->total_no_pages,'pp'),'.') ?>
														<?php echo punctuateStr(appendAtFront($bp->isbn_no,'isbn'),'.'); ?>
														<?php echo addParenthesis($bp->country_publish,'(',')'); ?>
														<?php echo punctuateStr(addParenthesis($bp->contribution,'(Contribution: ','%)'),'.'); ?>
													</li>
												</div>
					    					</div>
				    						<?php } }else{ ?>
											<p id="nil-value">Nil</p>
											<?php }  ?>
										<!-- end the books published -->

										<table style="margin-left: -34px;" width="750" border="0" cellpadding="0" cellspacing="0">
											<tr>
												<td class="table1Data" width="50"> (b)</td>
												<td class="table1DataHeader">Chapters in books already published:</td>
											</tr>
										</table>
											<?php
				    						 if(!empty($chapters_books)){
				    							foreach($chapters_books as $chapters){
				    						?>
				    						<?php
				    							$padding='';
		    									$padAsterisk = '';
		    									if($chapters->asterisks == 1){
		    										$padding = "4px";
		    										$padAsterisk = "*";
		    									}else if($chapters->asterisks == 2){
		    										$padding = "-4px";
		    										$padAsterisk = "**";
		    									}
		    								?>
		    								<div class="row" style="margin-left:-4%;">
												<div class="col-sm-1">
													<?php if($chapters->asterisks != ''): ?>
													<p style="margin-left:<?php echo $padding; ?>;" id="asterisks-id">
														<?php echo $padAsterisk; ?>
													</p>
													<?php endif; ?>
												</div>
												<div class="col-sm-11" style="margin-left:-6%;">
													<li id="single-listSub">
													 	<?php echo ucfirst($chapters->author_names); ?>
													 	<?php echo punctuateStr(addParenthesis($chapters->year_of_publication,'(',')')); ?>
													 	<?php echo punctuateStr($chapters->title_of_chapter,'.'); ?>
													 	<?php $editors = "In $chapters->editor_names (Eds.)";
													 		echo ($editors)?$editors : " ";
													 	?>
													 	<?php echo "<i>". punctuateStr($chapters->title_of_book,'.') ."</i>"; ?>
													 	<?php echo punctuateStr($chapters->city_of_publication,':') ?>
													 	<?php echo punctuateStr($chapters->publish_company_name,'.') ?>
													 	<?php echo punctuateStr(appendAtEnd($chapters->chapter_page_range,'pp'),'.') ?>
													 	<?php echo punctuateStr(appendAtFront($chapters->isbn_no,'isbn'),'.'); ?>
													 	<?php echo addParenthesis($chapters->country_publish,'(',')'); ?>
														<?php echo punctuateStr(addParenthesis($chapters->contribution,'(Contribution: ','%)'),'.'); ?>
													</li>
												</div>
											</div> 
										<?php } }else{ ?>
											<p id="nil-value">Nil</p>
										<?php }  ?>
										<!-- end chapters_books -->

										<table style="margin-left: -34px;" width="750" border="0" cellpadding="0" cellspacing="0">
											<tr>
												<td class="table1Data" width="50"> (c)</td>
												<td class="table1DataHeader">Article that have already appeared in refereed conference proceedings:</td>
											</tr>
										</table>
    									<?php
				    						if(!empty($article_conf)){
				    							foreach($article_conf as $conf){
				    						?>
				    						<?php
				    							$padding='';
		    									$padAsterisk = '';
		    									if($conf->asterisks == 1){
		    										$padding = "4px";
		    										$padAsterisk = "*";
		    									}else if($conf->asterisks == 2){
		    										$padding = "-4px";
		    										$padAsterisk = "**";
		    									}
		    								?>
		    								<div class="row" style="margin-left:-4%;">
												<div class="col-sm-1">
													<?php if($conf->asterisks != ''): ?>
													<p style="margin-left:<?php echo $padding; ?>;" id="asterisks-id">
														<?php echo $padAsterisk; ?>
													</p>
													<?php endif; ?>
												</div>
												<div class="col-sm-11" style="margin-left:-6%;">
													<li id="single-listSub">
														<?php echo ucfirst($conf->author_names); ?>
														<?php echo punctuateStr(addParenthesis($conf->year_publish,'(',')'),'.'); ?>
														<?php echo punctuateStr($conf->article_title); ?>
													<?php $editors = "In $chapters->editor_names (Eds.).";
											 		echo ($editors)?$editors : " "; ?>
											 		<?php echo "<i>".punctuateStr($conf->conference_theme,':')."</i>"; ?>
											 		<?php echo "<i>".punctuateStr($conf->name_of_proceedings). "</i>"; ?>
											 		<?php echo punctuateStr(puncDate($conf->start_date,$conf->end_date,$conf->month,$conf->year_of_conference),'.'); ?>
											 		<?php echo punctuateStr($conf->city_publish,':'); ?>
											 		<?php echo punctuateStr($conf->publishing_company,'.'); ?>
											 		<?php echo punctuateStr(appendAtEnd($conf->page_range,'pp'),'.') ?>
											 		<?php echo addParenthesis($conf->country,'(',')'); ?>
													<?php echo punctuateStr(addParenthesis($conf->contribution,'(Contribution: ','%)'),'.'); ?>
													</li>
												</div>
											</div>
										<?php } }else{ ?>
											<p id="nil-value">Nil</p>
										<?php }  ?>
										<!-- end article_conf -->

										<table style="margin-left: -34px;" width="750" border="0" cellpadding="0" cellspacing="0">
											<tr>
												<td class="table1Data" width="50"> (d)</td>
												<td class="table1DataHeader">Patents and Copyrights:</td>
											</tr>
										</table>
										<?php
				    						if(!empty($patents)){
				    							foreach($patents as $patent){
				    						?>
											<li id="listSub">
												<p>
													<?php echo ucfirst($patent->author_names); ?>
													<?php echo punctuateStr(addParenthesis($patent->patent_year,'(',')'),'.'); ?>	
													<?php echo "<i>".punctuateStr($patent->title_of_patent,'.')."</i>"; ?>
													<?php echo punctuateStr($patent->patent_no,'.'); ?>
													<?php echo addParenthesis($patent->country,'(',')'); ?>
												<?php echo punctuateStr(addParenthesis($patent->contribution,'(Contribution: ','%)'),'.'); ?>
												</p>
											</li> 
										<?php } }else{ ?>
											<p id="nil-value">Nil</p>
										<?php }  ?>
										<!-- end patents -->

										<table style="margin-left: -34px;" width="750" border="0" cellpadding="0" cellspacing="0">
											<tr>
												<td class="table1Data" width="50"> (e)</td>
												<td class="table1DataHeader">Articles that have already appeared in learned journals:</td>
											</tr>
										</table>
										<?php
				    						if(!empty($article_journal)){
				    							foreach($article_journal as $journal){
				    						?>
				    						<?php
				    							$padding='';
		    									$padAsterisk = '';
		    									if($journal->asterisks == 1){
		    										$padding = "4px";
		    										$padAsterisk = "*";
		    									}else if($journal->asterisks == 2){
		    										$padding = "-4px";
		    										$padAsterisk = "**";
		    									}
		    								?>
		    								<div class="row" style="margin-left:-4%;">
												<div class="col-sm-1">
													<?php if($journal->asterisks != ''): ?>
													<p style="margin-left:<?php echo $padding; ?>;" id="asterisks-id">
														<?php echo $padAsterisk; ?>
													</p>
													<?php endif; ?>
												</div>
												<div class="col-sm-11" style="margin-left:-6%;">
													<li id="single-listSub">
											 		<?php echo ucfirst($journal->author_names); ?>
											 		<?php echo punctuateStr(addParenthesis($journal->journal_year,'(',')'),'.'); ?>
											 		<?php echo punctuateStr($journal->article_title,'.'); ?>
											 		<?php echo "<i>".$journal->journal_name ."</i>"; ?>
											 		<?php echo punctuateStr(appendAtFront($journal->volume_no,'Vol.',true),'.'); ?>
											 		<?php 
											 			$page_range = ($journal->page_range) ? ": $journal->page_range" ."." : '.';
											 		echo appendAtFront($journal->journal_num,'No.',true) ."$page_range"; ?>
											 		<?php echo addParenthesis($journal->country,'(',')'); ?>
											 		<?php echo addParenthesis($journal->contribution,'(Contribution: ','%)'); 
											 			// &nbsp;&nbsp;
											 			$current_yr = ($journal->extra_vol_year) ? "in $journal->extra_vol_year" : "";
											 		$extra='';
											 		$publish_yr = $journal->date_of_publication;
											 		// i wanna check for empty date validation
											 		$formatDate = addParenthesis(appendAtFront(dateFormatter($publish_yr),'Published ',true),'(',')');
											 		$pub_yr = (!emptyDate($publish_yr)) ? $formatDate : '';

											 		$current_vol = appendAtFront($journal->extra_volume,'Vol.',true); 
											 			echo ($current_vol || $current_yr) ? " ($current_vol $current_yr) $pub_yr." : ".";
											 		?>
											 	
													</li>
												</div>
											</div>
										<?php } }else{ ?>
											<p id="nil-value">Nil</p>
										<?php }  ?>
										<!-- end article_journal -->

										<table style="margin-left: -34px;" width="750" border="0" cellpadding="0" cellspacing="0">
											<tr>
												<td class="table1Data" width="50"> (f)</td>
												<td class="table1DataHeader">Books, Chapters in Books and Articles Already Accepted for Publication:</td>
											</tr>
										</table>
										<?php
				    						if(!empty($accepted_book)){
				    							foreach($accepted_book as $accept_book){
				    						?>
				    						<?php
				    							$padding='';
		    									$padAsterisk = '';
		    									if($accept_book->asterisks == 1){
		    										$padding = "4px";
		    										$padAsterisk = "*";
		    									}else if($accept_book->asterisks == 2){
		    										$padding = "-4px";
		    										$padAsterisk = "**";
		    									}
		    								?>
		    								<div class="row" style="margin-left:-4%;">
												<div class="col-sm-1">
													<?php if($accept_book->asterisks != ''): ?>
													<p style="margin-left:<?php echo $padding; ?>;" id="asterisks-id">
														<?php echo $padAsterisk; ?>
													</p>
													<?php endif; ?>
												</div>
												<div class="col-sm-11" style="margin-left:-6%;">
													<li id="single-listSub">
												 		<?php echo ucfirst($accept_book->author_names); ?>
												 		<?php echo punctuateStr($accept_book->article_title,'.'); ?>
												 		<?php echo "<i>".$accept_book->journal_name ."</i>"; ?>
												 		<?php echo addParenthesis($accept_book->country,'(',')'); ?>
												 		<?php echo addParenthesis($accept_book->contribution,'(Contribution: ','%)');
												 		$accepted = dateFormatter($accept_book->accepted_year);
												 			$current_yr = ($accept_book->accepted_year) ? "$accepted" : "."; 
												 			echo ($current_yr) ? " (Accepted $current_yr)." : "$current_yr";
												 		?>
													</li>
												</div>
											</div>
										<?php } }else{ ?>
											<p id="nil-value">Nil</p>
										<?php }  ?>
										<!-- end accepted_book -->

										<table style="margin-left: -34px;" width="750" border="0" cellpadding="0" cellspacing="0">
											<tr>
												<td class="table1Data" width="50"> (g)</td>
												<td class="table1DataHeader">Technical Reports and Monographs:</td>
											</tr>
										</table>
										<?php
				    						if(!empty($tech_report)){
				    							foreach($tech_report as $report){
				    						?>
				    						<?php
				    							$padding='';
		    									$padAsterisk = '';
		    									if($report->asterisks == 1){
		    										$padding = "4px";
		    										$padAsterisk = "*";
		    									}else if($report->asterisks == 2){
		    										$padding = "-4px";
		    										$padAsterisk = "**";
		    									}
		    								?>
		    								<div class="row" style="margin-left:-4%;">
												<div class="col-sm-1">
													<?php if($report->asterisks != ''): ?>
													<p style="margin-left:<?php echo $padding; ?>;" id="asterisks-id">
														<?php echo $padAsterisk; ?>
													</p>
													<?php endif; ?>
												</div>
												<div class="col-sm-11" style="margin-left:-6%;">
													<li id="single-listSub">
												 		<?php echo ucfirst($report->author_names); ?>
												 		<?php echo punctuateStr(addParenthesis($report->report_year,'(',')'),'.'); ?>
												 		<?php echo punctuateStr($report->report_title,'.'); ?>
												 		<?php echo punctuateStr($report->organisation_report_submitted,'.'); ?>
												 		<?php echo punctuateStr(appendAtEnd($report->total_page,'pp'),'.'); ?>
												 		<?php echo addParenthesis($report->country,'(',')'); ?>
												 		<?php echo punctuateStr(addParenthesis($report->contribution,'(Contribution: ','%)'),'.');
												 		?>
													</li>
												</div>
											</div> 
										<?php } }else{ ?>
											<p id="nil-value">Nil</p>
										<?php }  ?>
										<!-- end technical report -->
    								</ol>
    							</div>
	    					</ul>
	    				</div>
	    			</li>
	    			<!-- this is the major conference section on a new page -->
	    			<li style="page-break-before: always;">
	    				<div class="divDataHeader">
    						<div class="divDataHead" id="push-left">
    						 	<p>Major Conferences Attended with Papers Read (in the last 5 years):</p>
    						</div>
    						<div class="divData">
	    						<ul>
	    					<?php
	    						if(!empty($major_conf)){
	    							foreach($major_conf as $conf){
	    							?>
									<li>
										<?php echo punctuateStr(ucfirst($conf->conf_name),','); ?>
										<?php 
											$startDate = $conf->start_date;
											$endDate = ($conf->end_date) ? "-$conf->end_date" : "";
											$mnth = $conf->month;
											$yrs = $conf->year_attended;
											$buildDate = "$startDate$endDate $mnth, $yrs";
											echo punctuateStr($buildDate,',');
										 ?>
										 <?php echo punctuateStr($conf->city_of_conf,','); ?>
										 <?php echo punctuateStr($conf->country_of_conf,'.'); ?>
										 <br/>
										 <?php
										 	loadClass($this->load,'paper_read');
										 	$paper_read = new Paper_read();
										 	$papers = $paper_read->getWhere(array('major_conf_attended_id'=>$conf->ID,'lecturer_id'=>$conf->lecturer_id),$c,0,null,false);
										 	if(!empty($papers)){
										 		foreach($papers as $paper){ ?>
										 		<b>Paper presented:</b> <?php echo $paper->title_of_paper. " (with $paper->author_names)"; ?> 
										 		<br>
										<?php } } ?>
									</li>
							<?php } ?>
		    				<?php } else{ ?>
		    						<p id="nil-value">Nil</p>
		    				<?php } ?>
			    				</ul>
			    			</div>
	    				</div>
	    			</li>
	    			<?php if($exist_publication): ?>
	    			<li style="page-break-before: always;">
	    				<div class="divDataHeader">
    						<div class="divDataHead" id="push-left">
    						 	<p>Ten Best Publications that Reflect the Totality of My Contribution to Scholarship:</p>
    						</div>
    						<div class="divData">
	    						<ul style="list-style-type: decimal;">
	    					<?php if(!empty($best_publish_bp)){
	    							foreach($best_publish_bp as $bp){
	    							?>
									<li id="listSub">
										<p>
										<?php echo $bp->author_names ;?> 
										<?php echo punctuateStr(addParenthesis($bp->year_of_publication,'(',')')); ?>
										<?php echo "<i>". punctuateStr($bp->title_of_book,'.') ."</i>"; ?>
										<?php echo punctuateStr($bp->city_of_publication,':') ?>
										<?php echo punctuateStr($bp->publish_company_name,'.') ?>
										<?php echo punctuateStr(appendAtEnd($bp->total_no_pages,'pp'),'.') ?>
										<?php echo punctuateStr(appendAtFront($bp->isbn_no,'isbn'),'.'); ?>
										<?php echo addParenthesis($bp->country_publish,'(',')'); ?>
										<?php echo punctuateStr(addParenthesis($bp->contribution,'(Contribution: ','%)'),'.'); ?>
										</p>
									</li> 
							<?php } } ?>

							<?php if(!empty($best_publish_cbp)){
								foreach($best_publish_cbp as $cbp){ ?>
									<li id="listSub">
									 	<p>
									 	<?php echo ucfirst($cbp->author_names); ?>
									 	<?php echo punctuateStr(addParenthesis($cbp->year_of_publication,'(',')')); ?>
									 	<?php echo punctuateStr($cbp->title_of_chapter,'.'); ?>
									 	<?php $editors = "In $cbp->editor_names (Eds.)";
									 		echo ($editors)?$editors : " ";
									 	?>
									 	<?php echo "<i>". punctuateStr($cbp->title_of_book,'.') ."</i>"; ?>
									 	<?php echo punctuateStr($cbp->city_of_publication,':') ?>
									 	<?php echo punctuateStr($cbp->publish_company_name,'.') ?>
									 	<?php echo punctuateStr(appendAtEnd($cbp->chapter_page_range,'pp'),'.') ?>
									 	<?php echo punctuateStr(appendAtFront($cbp->isbn_no,'isbn'),'.'); ?>
									 	<?php echo addParenthesis($cbp->country_publish,'(',')'); ?>
										<?php echo punctuateStr(addParenthesis($cbp->contribution,'(Contribution: ','%)'),'.'); ?>
									 	</p>
									 </li> 
							<?php } } ?>

							<?php if(!empty($best_publish_ac)){
								foreach($best_publish_ac as $ac){ ?>
									<li id="listSub">
										<p>
										<?php echo ucfirst($ac->author_names); ?>
										<?php echo punctuateStr(addParenthesis($ac->year_publish,'(',')'),'.'); ?>
										<?php echo punctuateStr($ac->article_title); ?>
										<?php $editors = "In $chapters->editor_names (Eds.).";
									 		echo ($editors)?$editors : " ";
									 	?>
									 	<?php echo "<i>".punctuateStr($ac->conference_theme,':')."</i>"; ?>
									 	<?php echo "<i>".punctuateStr($ac->name_of_proceedings). "</i>"; ?>
									 	<?php echo punctuateStr(puncDate($ac->start_date,$ac->end_date,$ac->month,$ac->year_of_conference),'.'); ?>
									 	<?php echo punctuateStr($ac->city_publish,':'); ?>
									 	<?php echo punctuateStr($ac->publishing_company,'.'); ?>
									 	<?php echo punctuateStr(appendAtEnd($ac->page_range,'pp'),'.') ?>
									 	<?php echo addParenthesis($ac->country,'(',')'); ?>
										<?php echo punctuateStr(addParenthesis($ac->contribution,'(Contribution: ','%)'),'.'); ?>
										</p>
									</li>
							<?php } } ?>

							<?php if(!empty($best_publish_aaj)){
								foreach($best_publish_aaj as $aaj){ ?>
									<li id="listSub">
									 	<p>
									 		<?php echo ucfirst($aaj->author_names); ?>
									 		<?php echo punctuateStr(addParenthesis($aaj->journal_year,'(',')'),'.'); ?>
									 		<?php echo punctuateStr($aaj->article_title,'.'); ?>
									 		<?php echo "<i>".$aaj->journal_name ."</i>"; ?>
									 		<?php echo punctuateStr(appendAtFront($aaj->volume_no,'Vol.',true),'.'); ?>
									 		<?php 
									 			$page_range = ($aaj->page_range) ? ": $aaj->page_range" ."." : '.';
									 		echo appendAtFront($aaj->journal_num,'No.',true) ."$page_range"; ?>
									 		<?php echo addParenthesis($aaj->country,'(',')'); ?>
									 		<?php echo addParenthesis($aaj->contribution,'(Contribution: ','%)'); 
									 			// &nbsp;&nbsp;
									 			$current_yr = ($aaj->extra_vol_year) ? "in $aaj->extra_vol_year" : "";
									 		$extra='';
									 		$publish_yr = $aaj->date_of_publication;
									 		// i wanna check for empty date validation
									 		$formatDate = addParenthesis(appendAtFront(dateFormatter($publish_yr),'Published ',true),'(',')');
									 		$pub_yr = (!emptyDate($publish_yr)) ? $formatDate : '';

									 		$current_vol = appendAtFront($aaj->extra_volume,'Vol.',true); 
									 			echo ($current_vol || $current_yr) ? " ($current_vol $current_yr) $pub_yr." : ".";
									 		?>
									 	</p>
									</li>
							<?php } } ?>

							<?php if(!empty($best_publish_ab)){
									foreach($best_publish_ab as $ab){ ?>
										<li id="listSub">
										 	<p>
										 		<?php echo ucfirst($ab->author_names); ?>
										 		<?php echo punctuateStr($ab->article_title,'.'); ?>
										 		<?php echo "<i>".$ab->journal_name ."</i>"; ?>
										 		<?php echo addParenthesis($ab->country,'(',')'); ?>
										 		<?php echo addParenthesis($ab->contribution,'(Contribution: ','%)');
										 		$accepted = dateFormatter($ab->accepted_year);
										 			$current_yr = ($ab->accepted_year) ? "$accepted" : "."; 
										 			echo ($current_yr) ? " (Accepted $current_yr)." : "$current_yr";
										 		?>
										 	</p>
										</li>
							<?php } } ?>

							<?php if(!empty($best_publish_tr)){
								foreach($best_publish_tr as $tr){ ?>
										<li id="listSub">
										 	<p>
										 		<?php echo ucfirst($tr->author_names); ?>
										 		<?php echo punctuateStr(addParenthesis($tr->report_year,'(',')'),'.'); ?>
										 		<?php echo punctuateStr($tr->report_title,'.'); ?>
										 		<?php echo punctuateStr($tr->organisation_report_submitted,'.'); ?>
										 		<?php echo punctuateStr(appendAtEnd($tr->total_page,'pp'),'.'); ?>
										 		<?php echo addParenthesis($tr->country,'(',')'); ?>
										 		<?php echo punctuateStr(addParenthesis($tr->contribution,'(Contribution: ','%)'),'.');
										 		?>
										 	</p>
										</li>
							<?php } } ?>
			    				</ul>
			    			</div>
	    				</div>
	    			</li>
	    			<?php endif; ?>
	    		</ul>
	    		<div style="margin-bottom:10%;">&nbsp;</div>
    			<div>
					<div class="signature">
						<h5>Signature</h5>
					</div>
					<div class="date-sign float-right">
						<h5>Date</h5>
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
<div class="btn btn-primary float-right print">Print</div>
</div>
</div>
<!-- page-body-wrapper ends -->
<?php 
include "template/footer.php";
?>
