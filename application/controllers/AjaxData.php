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
			$exclude=array('changePassword','savePermission','approve','disapprove');
			$page = $this->getMethod($segments);
			if ($this->webSessionManager->getCurrentUserProp('user_type')=='admin' && in_array($page, $exclude)) {
				loadClass($this->load,'role');
				$this->role->checkWritePermission();
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

		public function checkAppointment($dateAppointId,$firstAppointmentId){
			// i wanna use sql to perform the check between this parameters,read more about
			// $sql = "select appointment_order as appoint_order from appointment_category ac where ac.category_name = ? and ac.appointment_order >= (select appointment_order from appointment_category ac2 where ac2.category_name = ?)";
			$sql = "select appointment_order as orderFirst from appointment_category ac where ac.id = ?";
			$query = $this->db->query($sql, array($dateAppointId));
			$sql1 = "select appointment_order as orderSecond from appointment_category ac where ac.id = ?";
			$query1 = $this->db->query($sql1, array($firstAppointmentId));
			if($query->num_rows() > 0 and $query1->num_rows() > 0){
				$orderFirst = $query->result_array()[0]['orderFirst'];
				$orderSecond = $query1->result_array()[0]['orderSecond'];

				// echo $orderFirst ."||".$orderSecond;
				if($orderFirst < $orderSecond){
					echo createJsonMessage('status',false,'message','Sorry your Present Post cannot be lesser than your First Academic appointment...');exit;
				}
				
			}
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
		public function faculty(){
			$query = "select id, faculty_name as value from faculty";
			echo $this->returnJsonFromQueryResult($query);
		}
		public function department($faculty=''){
			$qTemp=false;
			if ($this->webSessionManager->getCurrentUserProp('user_type')=='admin') {
				loadClass($this->load,'role');
				$currentRole = new Role(array('ID'=>$this->webSessionManager->getCurrentUserProp('role_id')));//exam officer role for testing
				$currentRole->load();
				$roleDepartment=$currentRole->getDepartment(true);
				  if ($roleDepartment) {
				   $qTemp= combineForInQuery(fetchField($roleDepartment,'department_id'));
				  }
			}
			$where ='';
			$data = array();
			if ($faculty) {
				$where = ' where faculty_ID=?';
				$data[]= $faculty;
			}
			$extra=	'';
			if ($qTemp) {
					$extra=$where?" and department.id in $qTemp ":" where department.id in $qTemp ";
				}	
			$query = "select id, department_name as value from department $where $extra";
			echo $this->returnJsonFromQueryResult($query,$data);
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
					echo createJsonMessage('status',false,'message','new password does not match with the confirmaton','flagAction',true);exit;
				}
				//check that this user owns the password
				loadClass($this->load,'user');
				$this->user->user_ID = $this->webSessionManager->getCurrentUserProp('ID');
				$result = $this->user->changePassword($old,$new,$message);
				// $this->application_log->log('profile module',$message);
				echo createJsonMessage('status',$result,'message',$message,'flagAction',true);
			}
		}

		public function level($value='')
		{
			$query="select id,level_name as value from level";
			echo $this->returnJsonFromQueryResult($query);
		}
		public function savePermission()
		{
			
			if (isset($_POST['sub'])) {
				$role = $_POST['role'];
				if (!$role) {
					echo createJsonMessage('status',false,'message','error occured while saving permission','flagAction',false);
				}
				loadClass($this->load,'role');
				try {
					$removeList = json_decode($_POST['remove'],true);
					$updateList = json_decode($_POST['update'],true);
					$this->role->ID=$role;
					$result=$this->role->processPermission($updateList,$removeList);
					echo createJsonMessage('status',$result,'message','permission updated successfully','flagAction',true);
				} catch (Exception $e) {
					echo createJsonMessage('status',false,'message','error occured while saving permission','flagAction',false);
				}
				
			}
		}
		public function savePublication(){
			if(isset($_POST['best_pub'])){
				$table = $_POST['tableModel'];
				$userTypeId = $_POST['userId'];
				loadClass($this->load,'best_publication');
				
				try{
					$updateList = json_decode($_POST['update'],true);
					if(empty($updateList)){
						echo createJsonMessage('status',false,'message','You have not chosen any publication','flagAction',false);
						exit;
					}
					$result = $this->best_publication->processPublication($table,$userTypeId,$updateList); 
					echo createJsonMessage('status',$result,'message','Your publication is successfully saved...','flagAction',true);
				}catch(Exception $e){
					echo createJsonMessage('status',false,'message','error occured while saving best publication','flagAction',false);
				}
			}

			if(isset($_POST['best_remove_pub'])){
				$tableModel = $_POST['tableModel'];
				$userType = $_POST['userType'];
				loadClass($this->load,'best_publication');

				try{
					$removeList = json_decode($_POST['remove'],true);
					$result = $this->best_publication->processPublicationRemove($tableModel,$userType,$removeList);
					echo createJsonMessage('status',$result,'message','You have successfully remove the publication...');
				}catch(Exception $e){
					echo createJsonMessage('status',false,'message','error occured while saving best publication');
				}

			}
		}

	}
 ?>
