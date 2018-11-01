<?php 
	/**
	* This class like other controller class will have full access control capability
	*/
	class ActionController extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('crud');
			$this->load->model('webSessionManager');
			if ($this->webSessionManager->getCurrentUserprop('user_type')=='admin') {
				loadClass($this->load,'role');
				$role = new Role();
				$role->checkWritePermission();
			}
		}

		public function edit($model,$id){

		}
		public function disable($model,$id){
			$this->load->model("entities/$model");
			//check that model is actually a subclass
			if ( empty($id)===false && is_subclass_of($this->$model,'Crud' )) {
				if($this->$model->disable($id,$this->db)){

					echo createJsonMessage('status',true,'message',"item disable successfully");
				}else{
					echo createJsonMessage('status',false,'message',"cannot disable item");
				}
			}
			else{
				echo createJsonMessage('status',false,'message',"cannot disable item");
			}
		}
		public function enable($model,$id){
			$this->load->model("entities/$model");
			//check that model is actually a subclass
			if ( !empty($id) && is_subclass_of($this->$model,'Crud' ) && $this->$model->enable($id,$this->db)) {
				echo createJsonMessage('status',true,'message',"item enabled successfully");
			}
			else{
				echo createJsonMessage('status',false,'message',"cannot enable item");
			}
		}
		public function view($model,$id){

		}
		public function delete($model,$id){
			//kindly verify this action before performing it
			$this->load->model("entities/$model");
			//check that model is actually a subclass
			if ( !empty($id) && is_subclass_of($this->$model,'Crud' )&&$this->$model->delete($id)) {
				echo createJsonMessage('status',true,'message',"item deleted successfully");
			}
			else{
				echo createJsonMessage('status',false,'message',"cannot delete item");
			}
		}
	}
 ?>