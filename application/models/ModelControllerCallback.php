<?php 
	/**
	* This class contains  the method for performing extra action performed
	*/
	class ModelControllerCallback extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('webSessionManager');
			$this->load->helper('string');
			$this->load->library('hash_created');
		}

		public function onLecturerInserted($data,$type,&$db,&$message)
		{
			//remember to remove the file if an error occured here
			//the user type should be student_biodata
			loadClass($this->load,'user');
			if ($type=='insert') {
				// this is to update an already user in the user table
				// if($this->webSessionManager->checkActualUserData()){
				// 	$param = array('user_table_id' => $data['LAST_INSERT_ID']);
				// 	$user_id = $this->webSessionManager->getCurrentUserProp('ID');
				// 	$update = $db->update('user', $param, array('ID' => $user_id));
				// 	if($update){
				// 		return true;
				// 	}
				// }else{
					$param = array('user_type'=>'lecturer','username'=>$data['email'],'password'=>$this->hash_created->encode_password($data['staff_no']),'user_table_id'=>$data['LAST_INSERT_ID']);
					$std = new User($param);
					if ($std->insert($db,$message)) {
						return true;
					}
				// }
				echo "$message";exit;
				return false;
			}
			return true;
		}

		public function onadminInserted($data,$type,&$db,&$message)
		{
			//remember to remove the file if an error occured here
			//the user type should be student_biodata
			loadClass($this->load,'user');
			if ($type=='insert') {
				$param = array('user_type'=>'admin','username'=>$data['email'],'password'=>$this->hash_created->encode_password($data['lastname']),'user_table_id'=>$data['LAST_INSERT_ID']);
				$std = new User($param);
				if ($std->insert($db,$message)) {
					return true;
				}
				return false;
			}
			return true;
		}

		public function oneditorsInserted($data,$type,&$db,&$message='Error in performing the operation successfully...')
		{
			//remember to remove the file if an error occured here
			if($type == 'insert'){

				$extra_table = $this->webSessionManager->getCurrentUserProp('extra_model');
				$where_id = $this->webSessionManager->getCurrentUserProp('extra_id');
				$param = array(
					'editors_id' => $data['LAST_INSERT_ID']
				);

				$update = $db->update($extra_table, $param, array('ID' => $where_id));
				if($update){
					$extraParam = array('extra_model','extra_id');
					$this->webSessionManager->unsetContent($extraParam);
					return true;
				}
				echo "$message";exit;
				return false;
			}
			return true;
		}
			
	}

 ?>