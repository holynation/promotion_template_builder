<?php 
/**
* 
*/
class Auth extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('entities/user');
		$this->load->model('webSessionManager');
		$this->load->library('hash_created');
	}

	public function signup($data = ''){
		$this->load->view('register', $data);
	}

	public function login($data = ''){
		$this->load->view('login', $data );
	}

	public function register(){
		if(isset($_POST) && count($_POST) > 0 && !empty($_POST)){
			$data = $_POST;
			$email = trim($data['email']);
			$password = trim($data['password']);
			$conf_password = trim($data['confirm_password']);

			if (!isNotEmpty($email,$password,$conf_password)) {
				echo "empty field detected . please fill all required field and try again";
				return;
			}

			if(filter_var($email, FILTER_VALIDATE_EMAIL) == FALSE){
				$arr['status'] = false;
				$arr['message'] = 'email is not valid';
				echo json_encode($arr);
				return;
			}

			if($password != $conf_password){
				$arr['status'] = false;
				$arr['message'] = 'Confirm Password should match with password';
				echo json_encode($arr);
				return;
			}

			$result = $this->user->postUser($email,$password);

			switch ($result) {
				case 1:
					$arr['status'] = true;
					$arr['message']= 'You have successfully created an account.Login please';
					echo json_encode($arr);
					return;
				break;

				case 3:
					$arr['status'] = false;			
					$arr['message']= "email already exists.use another email";
					echo json_encode($arr);
					return;
				break;

				case 2:
				$arr['status'] = false;
					$arr['message']= "error performing the operation";
					echo json_encode($arr);
					return;
				break;
			}
		}
		$this->signup();
	}

	public function web(){
		$isAjax =  isset($_POST['isajax']);
		if(isset($_POST) && count($_POST) > 0 && !empty($_POST)){
			$email = $this->input->post('email',true);
			$password = $this->input->post('password',true);

			if (!isNotEmpty($email,$password)) {
				echo "empty field detected . please fill all required field and try again";
				return;
			}

			$find = $this->user->find($email);
			$checkPass = $this->hash_created->decode_password(trim($password), $this->user->data()[0]['password']);
			if($checkPass){
				$array = array('username'=>$email,'status'=>1);
				$user = $this->user->getWhere($array,$count,0,null,false," order by field('user_type','admin','lecturer')");
				if($user == false) {	
					if ($isAjax) {
						$arr['status']=false;
						$arr['message']= "invalid username or password";
						echo  json_encode($arr);
						return;
					}
					else{
						redirect(base_url());
					}
				}
				else{
					$user = $user[0];
					$baseurl = base_url();
					$this->webSessionManager->saveCurrentUser($user,true);
					$baseurl.=$this->getUserPage($user);
					if ($isAjax) {
						$arr['status']=true;
						$arr['message']= $baseurl;
						// echo $baseurl;exit;
						echo  json_encode($arr);
						return;
					}else{
						redirect($baseurl);exit;
					}
				}
			}else{
				$arr['status']=false;
				$arr['message'] = 'invalid username or password';
				echo json_encode($arr);exit;
			}
		}

		$this->login();
	}

	private function getUserPage($user){
		$link= array('lecturer'=>'vc/lecturer/dashboard','admin'=>'vc/admin/dashboard');
		$roleName = $user->user_type;
		return $link[$roleName];
	}

	public function logout1(){
		$this->user->logout();
		redirect('/welcome/','refresh');
	}

	public function logout(){
		$link ='';
		$base = base_url();
		$this->webSessionManager->logout();
		$path = $base.$link;
		header("location:$path");exit;
	}

}
 ?>