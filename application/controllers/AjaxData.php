<?php
	/**
	* model for loading extra data needed by pages through ajax
	*/
	class AjaxData extends CI_Controller
	{

		function __construct()
		{
			parent::__construct();
			$this->load->model("modelFormBuilder");
			$this->load->database();
			$this->load->model('webSessionManager');
			// $this->load->model('entities/application_log');
			$this->load->helper('string');
			$this->load->helper('array');
			if (!$this->webSessionManager->isSessionActive()) {
				echo "session expired please re login to continue";
				exit;
			}
		}

		private function getMethod(&$allSegment)
		{
			$path = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
			$base = base_url();
			$left = ltrim($path,$base);
			$result = explode('/', $left);
			$allSegment=$result;
			return $result[0];
		}

		public function lga($state){
			$state = urldecode($state);
			$result = loadLga($state);
			echo $this->returnJSONFromNonAssocArray($result);
		}

		private function returnJSONFromNonAssocArray($array){
			//process if into id and value then
			$result =array();
			for ($i=0; $i < count($array); $i++) {
				$current =$array[$i];
				$result[]=array('id'=>$current,'value'=>$current);
			}
			return json_encode($result);
		}

		public function getConfById($id){
			$query = $this->getConfByLecturer('major_conf_attended');
			echo $this->returnJsonFromQueryResult($query, array($id),'Sorry,you don\'t have any major conference attended yet...');
		}

		public function getConfByLecturer($table){
			$query = "select id,conf_name as value from $table where lecturer_id = ?";
			return $query;
		}

		protected function returnJsonFromQueryResult($query,$data=array(),$message=''){
			$result = $this->db->query($query,$data);
			if ($result->num_rows() > 0) {
				$result = $result->result_array();
				return  json_encode($result);
			}
			else{
				if($message != ''){
					$dataParam = array(
						'value' => $message
					);
					return  json_encode(array($dataParam));
				}
				return "";
			}
		}

		//function for changing the password for user.
		function changePassword(){
			// $this->application_log->log('profile module','changing password');
			if (isset($_POST['ajax-sub'])) {
				$old = $_POST['oldpassword'];
				$new = $_POST['newpassword'];
				$confirm = $_POST['confirmPassword'];
				if ($new !==$confirm) {
					// $this->application_log->log('profile module','password does not match');
					echo createJsonMessage('status',false,'message','new password does not match with the confirmaton');exit;
				}
				//check that this user owns the password
				loadClass($this->load,'user');
				$this->user->user_ID = $this->webSessionManager->getCurrentUserProp('ID');
				$result = $this->user->changePassword($old,$new,$message);
				// $this->application_log->log('profile module',$message);
				echo createJsonMessage('status',$result,'message',$message);
			}
		}

		public function level($value='')
		{
			$query="select id,level_name as value from level";
			echo $this->returnJsonFromQueryResult($query);
		}
	}
 ?>
