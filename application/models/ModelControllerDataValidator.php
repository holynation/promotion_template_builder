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
}
 ?>