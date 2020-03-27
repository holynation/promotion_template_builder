<?php 
/**
* 
*/
class Auth extends CI_Controller
{
	private $_mailType = array(1=>'register',2=>'forget');
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
				echo createJsonMessage('status',false,'message',"empty field detected.please fill all required field and try again");
				return;
			}
			
			$find = $this->user->find($email);
			$checkPass = md5(trim($password)) == $this->user->data()[0]['password'];
			// $checkPass = $this->hash_created->decode_password(trim($password), $this->user->data()[0]['password']);
			if($checkPass){
				$array = array('username'=>$email,'password'=>md5($password),'status'=>1);
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

	public function forgetPassword(){
		if(isset($_POST) && count($_POST) > 0 && !empty($_POST)){
			if($_POST['task'] == 'reset'){
				$email = trim($this->input->post('email',true));
				if (!isNotEmpty($email)) {
			        echo createJsonMessage('status',false,"message","empty field detected.please fill all required field and try again");
			        return;
			    }
				if(filter_var($email, FILTER_VALIDATE_EMAIL) == FALSE){
					$arr['status'] = false;
					$arr['message'] = 'email is not valid';
					echo json_encode($arr);
					return;
				}
				$find = $this->user->find($email);
				if(!$find){
					$arr['status'] = false;
					$arr['message'] = 'email address not registered with us!';
					echo json_encode($arr);
					return;
				}
				$sendMail = ($this->sendVerification($email,'Request to Reset your Password at the Faculty of The Social Science CV-Template. !',2)) ? true : false;
				$message = "A link to reset your password has been sent to $email.If you don't see it, be sure to check your spam folders too!";
				$arr['status'] = ($sendMail) ? true : false;
				$arr['message'] = ($sendMail) ? $message : 'error occured while performing the operation,please check your network and try again later.';
				echo json_encode($arr);
				return;
			}
			else if ($_POST['task'] == 'update'){
				if(isset($_POST['email'], $_POST['email_hash']))
                {
                	if($_POST['email_hash'] !== sha1($_POST['email'] . $_POST['email_code'])){
                		// either a hacker or they changed their mail in the mail field, just die
	                    $arr['status'] = false;
						$arr['message'] = 'Oops,error updating your password';
						echo json_encode($arr);
						return;
                	}
                	$new = trim($_POST['password']);
				    $confirm = trim($_POST['confirm_password']);
				    $email = trim($_POST['email']);

				    if (!isNotEmpty($new,$confirm)) {
				        echo createJsonMessage('status',false,"message","empty field detected.please fill all required field and try again");
				        return;
				    }
				 //    if(strlen($new) <= 5 ){
					// 	$arr['status'] = false;
					// 	$arr['message'] = 'password should be greater than five characters';
					// 	echo json_encode($arr);
					// 	return;
					// }
				    if ($new !== $confirm) {
				       echo createJsonMessage('status',false,'message','new password does not match with the confirmation password');return;
				    }
				    $this->load->model('entities/user');
				    $updatePassword = $this->user->updatePassword($email,$new);
				    if($updatePassword){
				    	$arr['status'] = true;
						$arr['message'] = 'your password has been reset! You may now login.';
						echo json_encode($arr);
						return;
				    }else{
				    	loadClass($this->load,'dev_app');
				        $appConfig = $this->dev_app->all();
				        $appConfig = ($appConfig) ? $appConfig[0] : false;

				        if(!$appConfig){
				        	echo createJsonMessage('status',false,'message','Contact the Administrator for Mailing issues...');
				        	return;
				        }
						$arr['status'] = false;
						$arr['message'] = "error occured while updating your password. Please contact Administrator {$appConfig->app_email}";
						echo json_encode($arr);
						return;
				    }
                    
                }
                
			}
		}
		$this->forget();
	}

	public function verify($email,$hash,$type){
		if(isset($email,$hash,$type)){
			$email = urldecode(trim($email));
			$email = str_replace(array('~az~','~09~'),array('@','.com'),$email);
			$hash = urldecode(trim($hash));
			$email_hash = sha1($email . $hash);

			$user = $this->user->find($email);
			$data = array();
			if(!$user){
				$data['error'] = 'sorry we don\'t seems to have that email account on our platform.';
				$this->load->view('verify',$data);return;
			}

			$check = md5($this->config->item('salt') . $email) == $hash;
			if(!$check){
				$data['error'] = 'there seems to be an error in validating your email account,try again later.';
				$this->load->view('verify',$data);return;
			}

			if($user && $check){
				$mailType = $this->_mailType;
				if($mailType[$type] == 'register'){
					$id = $this->user->data()[0]['ID'];
					$result = $this->user->updateStatus($id,$email);
					$data['type'] = $mailType[$type];
					if($result){
						$data['success'] = 'Account has been verified.Thank you!'; 
					}else{
						$data['error'] = 'There seems to an error in performing the operation...';
					}
				}else if($mailType[$type] == 'forget'){
					$data['type'] = $mailType[$type];
					$data['email_hash'] = $email_hash;
					$data['email_code'] = $hash;
					$data['email'] = $email;
				}
				$this->load->view('verify',$data);return;
			}
			
		}
	}

	public function sendVerification($recipient='',$subject='',$type=''){
        $message = $this->formatMsg($recipient,$type);
        $recipient = trim($recipient);
        $this->load->library('email');
        loadClass($this->load,'dev_app');
        $appConfig = $this->dev_app->all();
        $appConfig = ($appConfig) ? $appConfig[0] : false;

        if(!$appConfig){
        	echo createJsonMessage('status',false,'message','Contact the Administrator for Mailing issues...');
        	return;
        }

        $config['protocol'] = 'smtp';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = false;
        $config['smtp_host'] = 'smtp.gmail.com';
        $config['smtp_port'] = 587;
        $config['smtp_crypto'] = 'tls';
        $config['smtp_user'] = trim($appConfig->app_mail);
        $config['smtp_pass'] = $this->config->item('forwardAuth');
        $config['mailtype'] = 'html';
        $config['crlf'] = "\r\n";
        $config['newline'] = "\r\n";
        
        $this->email->initialize($config);

        $this->email->from($appConfig->app_mail, $appConfig->app_name);
        $this->email->to($recipient); // which will be the user email account

        $this->email->subject($subject);
        $this->email->message($message);

        if(!$this->email->send()){
        	// echo "error sending";
            return false;
            // return "error sending";
        }else{
            return true;
        }
    }

    public function formatMsg($recipient='',$type=''){
    	if($recipient){
	        $msg = '';
	        $msg .= $this->mailHeader();

	        $msg .= $this->mailBody($recipient,$type);

	        $msg .= $this->mailFooter();

	        return $msg;
	        // echo $msg;
	    }
    }

    private function mailHeader(){
    	$msg = '';
    	$msg .= '<!DOCTYPE html><html lang="en"><head>
                 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                 </head><body style="margin:10px;">';
        $msg .= '<div style="background-color:#262836;width:auto;height:95px;padding:15px;text-align:center;margin:0 auto;">';
        $msg .= '<div style="color:#fff;font-size:25px;font-family:"futura_ltbold", sans-serif;text-align:center;"><p style="letter-spacing:1px;color:#fff;font-size:25px;padding-top:-15px;">Faculty of The Social Science CV-Template</p></div></div>';
	     return $msg;
    }

    private function mailBody($recipient='',$type=''){
    	$mailType = $this->_mailType;
    	$email = str_replace(array('@','.com'), array('~az~','~09~'), $recipient);
    	$temp = md5($this->config->item('salt') . $recipient);
    	// echo $temp ."||". $email;
    	$link = base_url("auth/verify/$email/$temp/$type");
    	$headerText = '';
    	$mailText = '';
    	$btnText = '';
    	if($mailType[$type] == 'register'){
    		$headerText = 'Before we get started...';
    		$mailText = 'Please take a second to make sure we\'ve got your email right.';
    		$btnText = 'Verify email';
    	}else if($mailType[$type] == 'forget'){
    		$headerText = 'You requested that you want to reset your password,ignore if you didn\'t.';
    		$mailText = 'Click the button below to reset your password.';
    		$btnText = 'Reset Password';
    	}

    	$msg = '';
    	$msg .= '<div style="margin:0 20%;">';
        $msg .= '<p>Dear '. $recipient . ','. '</p>';
        $msg .= '<p style="font-size:17px;"><b>'.$headerText.'</b></p>';
        $msg .= '<p style="letter-spacing:1px;line-height:1;">'.$mailText.'</p>';
        $msg .= '<div style="background-color:#787A83;font-size:16px;font-weight:bold;text-transform:uppercase;width:auto;height:35px;color:#000;border-radius:10px;line-height:1.42857143;text-align:center;white-space: nowrap;vertical-align: middle;border: 1px solid transparent;padding-top:10px;"><a style="cursor: pointer;text-decoration:none;color:#fff;letter-spacing:2px;" href="'.$link.'" target="_blank">'.$btnText.'</a></div>';
        $msg .= '<p>Thank you!</p>';
        $msg .= '</div>';
    	return $msg;
    }

    private function mailFooter(){
    	$msg = '';
		$msg .= '<div style="background-color:#262836;width:auto;height:95px;padding:20px;text-align:center;margin:0 auto;">';
		$msg .= '<div style="color:#fff;font-size:15px;font-family:cursive;text-align:center;"><p>Address,<br/>University of Ibadan,Ibadan. </p></div>';
		$msg .= '<p style="color:#999;">&copy;Copyright - Faculty of The Social Science</p>';
        $msg .= '</div>';
        $msg .= '</body></html>';
	    return $msg;

    }

	public function forget($data = ''){
		$this->load->view('forget_password',$data);
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