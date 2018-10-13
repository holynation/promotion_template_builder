<?php 

/**
* The controller that validate forms that should be inserted into a table based on the request url.
each method wil have the structure validate[modelname]Data
*/
class ModelControllerDataValidator extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('webSessionManager');
	}

	public function validateWork_experienceData(&$data,$type,&$message)
	{
		if(isset($data['within_a_year']) && !empty($data['within_a_year'])){
			if(!empty($data['start_date']) || !empty($data['end_date'])){
				$message="You cannot fill start date or end date once you have filled '<b>within a year</b>' field";
				return false;
			}
		}
		return true;
	}

	public function validateCourse_scoreData(&$data,$type,&$message)
	{
		if (!$data['ca_score'] && !$data['exam_score']) {
			$message='empty value  not allowed';
			return false;
		}
		loadClass($this->load,'course_score');
		$_POST['previous']='_,_';
		if ($type=='update') {
			$temp = $this->course_score->getWhere(array('student_course_registration_id'=>$data['student_course_registration_id']),$c,0,null,false);
			$temp = @$temp[0];
			if ($temp->ca_score==$data['ca_score'] && $temp->exam_score==$data['exam_score']) {
				$message='no changes made';
				return false;
			}
			$_POST['previous']=$temp->ca_score.','.$temp->exam_score;
		}
		$ca = $data['ca_score'];
		$exam = $data['exam_score'];
		$total=$ca+$exam;
		if ($total > 100) {
			$message="invalid result score, score must not be more than 100";
			return false;
		}
		$data['score']=$total;
		return true;
	}
}
 ?>