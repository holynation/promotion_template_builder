<?php 
defined("BASEPATH") OR exit("No direct script access allowed");
	require_once("application/models/Crud.php");

	/**
	* This class  is automatically generated based on the structure of the table. And it represent the model of the lecturer table.
	*/ 

class Lecturer extends Crud {

protected static $tablename = "Lecturer"; 
/* this array contains the field that can be null*/ 
static $nullArray = array('middlename','maiden_name','address','state_of_origin','lga_of_origin','disability','nationality','img_path','marital_status','religion','status');
static $compositePrimaryKey = array('surname','firstname','middlename');
static $uploadDependency = array();
/*this array contains the fields that are unique*/ 
static $displayField = array('surname','firstname','staff_no');// this display field properties is used as a column in a query if a their is a relationship between this table and another table.In the other table, a field showing the relationship between this name having the name of this table i.e something like this. table_id. We cant have the name like this in the table shown to the user like table_id so the display field is use to replace that table_id.However,the display field name provided must be a column in the table to replace the table_id shown to the user,so that when the other model queries,it will use that field name as a column to be fetched along the query rather than the table_id alone.;
static $uniqueArray = array('staff_no','email','phone_number');
/* this is an associative array containing the fieldname and the type of the field*/ 
static $typeArray = array('title_id' => 'int','surname' => 'varchar','firstname' => 'varchar','middlename' => 'varchar','maiden_name' => 'varchar','staff_no' => 'varchar','department_id' => 'int','email' => 'text','phone_number' => 'text','gender' => 'enum','dob' => 'date','address' => 'varchar','marital_status' => 'enum','state_of_origin' => 'varchar','lga_of_origin' => 'varchar','religion' => 'enum','nationality' => 'varchar','status' => 'tinyint','disability' => 'tinyint','img_path' => 'varchar');
/*this is a dictionary that map a field name with the label name that will be shown in a form*/ 
static $labelArray = array('ID' => '','title_id' => '','surname' => '','firstname' => '','middlename' => '','maiden_name' => '','department_id' => '','email' => '','phone_number' => '','dob' => '','address' => '','state_of_origin' => '','staff_no' => '','lga_of_origin' => '','status' => '','disability' => '','nationality' => '','gender' => '','img_path' => '','marital_status' => '','religion' => '');
/*associative array of fields that have default value*/ 
static $defaultArray = array('status' => '1');
 // populate this array with fields that are meant to be displayed as document in the format array("fieldname"=>array("filetype","maxsize",foldertosave","preservefilename"))
//the folder to save must represent a path from the basepath. it should be a relative path,preserve filename will be either true or false. when true,the file will be uploaded with it default filename else the system will pick the current user id in the session as the name of the file.
static $documentField = array('img_path'=>array(array('jpeg','jpg','png','gif'),'10000888','lecturer/')); //array containing an associative array of field that should be regareded as document field. it will contain the setting for max size and data type.;
static $relation = array('title' => array('title_id','id')
,'department' => array('department_id','id')
);
static $tableAction = array('enable'=>'getEnabled','edit' => 'edit/lecturer','delete' => 'delete/lecturer');
function __construct($array = array())
{
	parent::__construct($array);
	$this->load->model('webSessionManager');
}
 
function getTitle_idFormField($value = ''){
	$fk = array('table'=>'title','display'=>'title_name'); 
 	//change the value of this variable to array('table'=>'title','display'=>'title_name'); if you want to preload the value from the database where the display key is the name of the field to use for display in the table.[i.e the display key is a column name in the table specify in that array it means select id,'title_name' as value from 'title' meaning the display name must be a column name in the table model].It is important to note that the table key can be in this format[array('table' => array('title', 'another table name'))] provided that their is a relationship between these tables. The value param in the function is set to true if the form model is used for editing or updating so that the option value can be selected by default;

		if(is_null($fk)){
			return $result = "<input type='hidden' name='title_id' id='title_id' value='$value' class='form-control' />";
		}

		if(is_array($fk)){
			
			$result ="<div class='form-group'>
			<label for='title_id'>Title Id</label>";
			$option = $this->loadOption($fk,$value);
			//load the value from the given table given the name of the table to load and the display field
			$result.="<select name='title_id' id='title_id' class='form-control'>
						$option
					</select>";
		}
		$result.="</div>";
		return $result;
}
 function getSurnameFormField($value = ''){
	return "<div class='form-group'>
				<label for='surname'>Surname</label>
				<input type='text' name='surname' id='surname' value='$value' class='form-control' required />
			</div>";
} 
 function getFirstnameFormField($value = ''){
	return "<div class='form-group'>
				<label for='firstname'>Firstname</label>
				<input type='text' name='firstname' id='firstname' value='$value' class='form-control' required />
			</div>";
} 
 function getMiddlenameFormField($value = ''){
	return "<div class='form-group'>
				<label for='middlename'>Middlename</label>
				<input type='text' name='middlename' id='middlename' value='$value' class='form-control' />
			</div>";
} 
 function getMaiden_nameFormField($value = ''){
	return "<div class='form-group'>
				<label for='maiden_name'>Maiden Name (this is meant for women)</label>
				<input type='text' name='maiden_name' id='maiden_name' value='$value' class='form-control' />
			</div>";
} 
 function getDepartment_idFormField($value = ''){
	$fk=array('table'=>'department','display'=>'department_name'); 
 	//change the value of this variable to array('table'=>'department','display'=>'department_name'); if you want to preload the value from the database where the display key is the name of the field to use for display in the table.[i.e the display key is a column name in the table specify in that array it means select id,'department_name' as value from 'department' meaning the display name must be a column name in the table model].It is important to note that the table key can be in this format[array('table' => array('department', 'another table name'))] provided that their is a relationship between these tables. The value param in the function is set to true if the form model is used for editing or updating so that the option value can be selected by default;

		if(is_null($fk)){
			return $result = "<input type='hidden' name='department_id' id='department_id' value='$value' class='form-control' />";
		}

		if(is_array($fk)){
			
			$result ="<div class='form-group'>
			<label for='department_id'>Department Id</label>";
			$option = $this->loadOption($fk,$value);
			//load the value from the given table given the name of the table to load and the display field
			$result.="<select name='department_id' id='department_id' class='form-control' required>
						$option
					</select>";
		}
		$result.="</div>";
		return $result;
}
 function getEmailFormField($value = ''){
	return "<div class='form-group'>
				<label for='email'>Email</label>
				<input type='text' name='email' id='email' value='$value' class='form-control' required />
			</div>";
} 
 function getPhone_numberFormField($value = ''){
	return "<div class='form-group'>
				<label for='phone_number'>Phone Number</label>
				<input type='text' name='phone_number' id='phone_number' value='$value' class='form-control' required />
			</div>";
} 
 function getGenderFormField($value = ''){
	$arr =array('Male','Female');
	$option = buildOptionUnassoc($arr,$value);
	return "<div class='form-group'>
	<label for='gender' >Gender</label>
		<select name='gender' id='gender' class='form-control' required>
		$option
		</select>
</div> ";
} 
 function getDobFormField($value = ''){
	return "<div class='form-group'>
				<label for='dob'>Dob</label>
				<input type='date' name='dob' id='dob' value='$value' class='form-control' required />
			</div>";
} 
 function getStatusFormField($value = ''){
	return "<div class='form-group'>
	<label class='form-checkbox'>Status</label>
	<select class='form-control' id='status' name='status'>
		<option value='1' selected='selected'>Yes</option>
		<option value='0'>No</option>
	</select>
	</div> ";
} 
 function getAddressFormField($value = ''){
	return "<div class='form-group'>
				<label for='address'>Address</label>
				<input type='text' name='address' id='address' value='$value' class='form-control' />
			</div>";
} 
 function getState_of_originFormField($value = ''){
	$states = loadStates();
	$option = buildOptionUnassoc($states,$value);
	return "<div class='form-group'>
	<label for='state_of_origin' >State Of Origin</label>
		<select  name='state_of_origin' id='state_of_origin' value='$value' class='form-control autoload' data-child='lga_of_origin' data-load='lga'> 
		<option value=''>..select state...</option>
		$option
		</select>
</div> ";
} 
function getLga_of_originFormField($value = ''){
	$option='';
	if ($value) {
		$arr=array($value);
		$option = buildOptionUnassoc($arr,$value);
	}
	return "<div class='form-group'>
	<label for='lga_of_origin' >Lga Of Origin</label>
		<select type='text' name='lga_of_origin' id='lga_of_origin' value='$value' class='form-control'  >
		<option value=''></option>
		$option
		</select>
</div> ";
}
 function getStaff_noFormField($value = ''){
	return "<div class='form-group'>
				<label for='staff_no'>Staff No</label>
				<input type='text' name='staff_no' id='staff_no' value='$value' class='form-control' required />
			</div>";
}  
 function getMarital_statusFormField($value = ''){
	$arr =array('single','married','divorced','widowed','others');
	$option = buildOptionUnassoc($arr,$value);
	return "<div class='form-group'>
	<label for='gender' >Marital Status</label>
		<select  name='marital_status' id='marital_status'  class='form-control'  >
		$option
		</select>
</div> ";
} 
 function getReligionFormField($value = ''){
	$arr =array('Christianity','Islam','Other');
	$option = buildOptionUnassoc($arr,$value);
	return "<div class='form-group'>
	<label for='religion' >Religion</label>
		<select  name='religion' id='religion'  class='form-control'  >
		$option
		</select>
</div> ";
}
 function getDisabilityFormField($value = ''){
	return "<div class='form-group'>
	<label class='form-checkbox'>Disability</label>
	<select class='form-control' id='disability' name='disability' >
		<option value='1'>Yes</option>
		<option value='0' selected='selected'>No</option>
	</select>
	</div> ";
} 
 function getNationalityFormField($value = ''){
	return "<div class='form-group'>
				<label for='nationality'>Nationality</label>
				<input type='text' name='nationality' id='nationality' value='$value' class='form-control' />
			</div>";
} 
 function getImg_pathFormField($value = ''){
 	$logo= base_url($value);
	return "<div class='form-group'>
	<img src='$logo' alt='logo' class='img-responsive' width='25%'/> <br>
				<label for='img_path'>Img Path</label>
				<input type='file' name='img_path' id='img_path' value='$value' class='form-control' />
			</div>";
}  

protected function getTitle(){
	$query ='SELECT * FROM title WHERE id=?';
	if (!isset($this->array['ID'])) {
		return null;
	}
	$id = $this->array['ID'];
	$result = $this->db->query($query,array($id));
	$result = $result->result_array();
	if (empty($result)) {
		return false;
	}
	include_once('Title.php');
	$resultObject = new Title($result[0]);
	return $resultObject;
}
 protected function getDepartment(){
	$query ='SELECT * FROM department WHERE id=?';
	if (!isset($this->array['ID'])) {
		return null;
	}
	$id = $this->array['ID'];
	$result = $this->db->query($query,array($id));
	$result = $result->result_array();
	if (empty($result)) {
		return false;
	}
	include_once('Department.php');
	$resultObject = new Department($result[0]);
	return $resultObject;
}
protected function getAcademic_appointment(){
	$query ='SELECT * FROM academic_appointment WHERE lecturer_id=?';
	$id = $this->array['ID'];
	$result = $this->db->query($query,array($id));
	$result =$result->result_array();
	if (empty($result)) {
		return false;
	}
	include_once('Academic_appointment.php');
	$resultobjects = array();
	foreach ($result as  $value) {
		$resultObjects[] = new Academic_appointment($value);
	}

	return $resultObjects;
}
protected function getAccepted_books(){
	$query ='SELECT * FROM accepted_books WHERE lecturer_id=?';
	$id = $this->array['ID'];
	$result = $this->db->query($query,array($id));
	$result =$result->result_array();
	if (empty($result)) {
		return false;
	}
	include_once('Accepted_books.php');
	$resultobjects = array();
	foreach ($result as  $value) {
		$resultObjects[] = new Accepted_books($value);
	}

	return $resultObjects;
}
protected function getArticle_appear_in_journal(){
	$query ='SELECT * FROM article_appear_in_journal WHERE lecturer_id=?';
	$id = $this->array['ID'];
	$result = $this->db->query($query,array($id));
	$result =$result->result_array();
	if (empty($result)) {
		return false;
	}
	include_once('Article_appear_in_journal.php');
	$resultobjects = array();
	foreach ($result as  $value) {
		$resultObjects[] = new Article_appear_in_journal($value);
	}

	return $resultObjects;
}
protected function getArticle_in_conference(){
	$query ='SELECT * FROM article_in_conference WHERE lecturer_id=?';
	$id = $this->array['ID'];
	$result = $this->db->query($query,array($id));
	$result =$result->result_array();
	if (empty($result)) {
		return false;
	}
	include_once('Article_in_conference.php');
	$resultobjects = array();
	foreach ($result as  $value) {
		$resultObjects[] = new Article_in_conference($value);
	}

	return $resultObjects;
}
protected function getBook_published(){
	$query ='SELECT * FROM book_published WHERE lecturer_id=?';
	$id = $this->array['ID'];
	$result = $this->db->query($query,array($id));
	$result =$result->result_array();
	if (empty($result)) {
		return false;
	}
	include_once('Book_published.php');
	$resultobjects = array();
	foreach ($result as  $value) {
		$resultObjects[] = new Book_published($value);
	}

	return $resultObjects;
}
protected function getChapter_in_book_published(){
	$query ='SELECT * FROM chapter_in_book_published WHERE lecturer_id=?';
	$id = $this->array['ID'];
	$result = $this->db->query($query,array($id));
	$result =$result->result_array();
	if (empty($result)) {
		return false;
	}
	include_once('Chapter_in_book_published.php');
	$resultobjects = array();
	foreach ($result as  $value) {
		$resultObjects[] = new Chapter_in_book_published($value);
	}

	return $resultObjects;
}
protected function getEditors(){
	$query ='SELECT * FROM editors WHERE lecturer_id=?';
	$id = $this->array['ID'];
	$result = $this->db->query($query,array($id));
	$result =$result->result_array();
	if (empty($result)) {
		return false;
	}
	include_once('Editors.php');
	$resultobjects = array();
	foreach ($result as  $value) {
		$resultObjects[] = new Editors($value);
	}

	return $resultObjects;
}
protected function getHonours_distinctions(){
	$query ='SELECT * FROM honours_distinctions WHERE lecturer_id=?';
	$id = $this->array['ID'];
	$result = $this->db->query($query,array($id));
	$result =$result->result_array();
	if (empty($result)) {
		return false;
	}
	include_once('Honours_distinctions.php');
	$resultobjects = array();
	foreach ($result as  $value) {
		$resultObjects[] = new Honours_distinctions($value);
	}

	return $resultObjects;
}
protected function getMajor_conf_attended(){
	$query ='SELECT * FROM major_conf_attended WHERE lecturer_id=?';
	$id = $this->array['ID'];
	$result = $this->db->query($query,array($id));
	$result =$result->result_array();
	if (empty($result)) {
		return false;
	}
	include_once('Major_conf_attended.php');
	$resultobjects = array();
	foreach ($result as  $value) {
		$resultObjects[] = new Major_conf_attended($value);
	}

	return $resultObjects;
}
protected function getMemberships(){
	$query ='SELECT * FROM memberships WHERE lecturer_id=?';
	$id = $this->array['ID'];
	$result = $this->db->query($query,array($id));
	$result =$result->result_array();
	if (empty($result)) {
		return false;
	}
	include_once('Memberships.php');
	$resultobjects = array();
	foreach ($result as  $value) {
		$resultObjects[] = new Memberships($value);
	}

	return $resultObjects;
}
protected function getPaper_read(){
	$query ='SELECT * FROM paper_read WHERE lecturer_id=?';
	$id = $this->array['ID'];
	$result = $this->db->query($query,array($id));
	$result =$result->result_array();
	if (empty($result)) {
		return false;
	}
	include_once('Paper_read.php');
	$resultobjects = array();
	foreach ($result as  $value) {
		$resultObjects[] = new Paper_read($value);
	}

	return $resultObjects;
}
protected function getPatents_copyright(){
	$query ='SELECT * FROM patents_copyright WHERE lecturer_id=?';
	$id = $this->array['ID'];
	$result = $this->db->query($query,array($id));
	$result =$result->result_array();
	if (empty($result)) {
		return false;
	}
	include_once('Patents_copyright.php');
	$resultobjects = array();
	foreach ($result as  $value) {
		$resultObjects[] = new Patents_copyright($value);
	}

	return $resultObjects;
}
protected function getProfessional_qualifications(){
	$query ='SELECT * FROM professional_qualifications WHERE lecturer_id=?';
	$id = $this->array['ID'];
	$result = $this->db->query($query,array($id));
	$result =$result->result_array();
	if (empty($result)) {
		return false;
	}
	include_once('Professional_qualifications.php');
	$resultobjects = array();
	foreach ($result as  $value) {
		$resultObjects[] = new Professional_qualifications($value);
	}

	return $resultObjects;
}
protected function getProject_thesis_dissertation(){
	$query ='SELECT * FROM project_thesis_dissertation WHERE lecturer_id=?';
	$id = $this->array['ID'];
	$result = $this->db->query($query,array($id));
	$result =$result->result_array();
	if (empty($result)) {
		return false;
	}
	include_once('Project_thesis_dissertation.php');
	$resultobjects = array();
	foreach ($result as  $value) {
		$resultObjects[] = new Project_thesis_dissertation($value);
	}

	return $resultObjects;
}
protected function getQualifications(){
	$query ='SELECT * FROM qualifications WHERE lecturer_id=?';
	$id = $this->array['ID'];
	$result = $this->db->query($query,array($id));
	$result =$result->result_array();
	if (empty($result)) {
		return false;
	}
	include_once('Qualifications.php');
	$resultobjects = array();
	foreach ($result as  $value) {
		$resultObjects[] = new Qualifications($value);
	}

	return $resultObjects;
}
protected function getResearch_completed(){
	$query ='SELECT * FROM research_completed WHERE lecturer_id=?';
	$id = $this->array['ID'];
	$result = $this->db->query($query,array($id));
	$result =$result->result_array();
	if (empty($result)) {
		return false;
	}
	include_once('Research_completed.php');
	$resultobjects = array();
	foreach ($result as  $value) {
		$resultObjects[] = new Research_completed($value);
	}

	return $resultObjects;
}
protected function getResearch_inprogress(){
	$query ='SELECT * FROM research_inprogress WHERE lecturer_id=?';
	$id = $this->array['ID'];
	$result = $this->db->query($query,array($id));
	$result =$result->result_array();
	if (empty($result)) {
		return false;
	}
	include_once('Research_inprogress.php');
	$resultobjects = array();
	foreach ($result as  $value) {
		$resultObjects[] = new Research_inprogress($value);
	}

	return $resultObjects;
}
protected function getResearch_supervision(){
	$query ='SELECT * FROM research_supervision WHERE lecturer_id=?';
	$id = $this->array['ID'];
	$result = $this->db->query($query,array($id));
	$result =$result->result_array();
	if (empty($result)) {
		return false;
	}
	include_once('Research_supervision.php');
	$resultobjects = array();
	foreach ($result as  $value) {
		$resultObjects[] = new Research_supervision($value);
	}

	return $resultObjects;
}
protected function getScholarships(){
	$query ='SELECT * FROM scholarships WHERE lecturer_id=?';
	$id = $this->array['ID'];
	$result = $this->db->query($query,array($id));
	$result =$result->result_array();
	if (empty($result)) {
		return false;
	}
	include_once('Scholarships.php');
	$resultobjects = array();
	foreach ($result as  $value) {
		$resultObjects[] = new Scholarships($value);
	}

	return $resultObjects;
}
protected function getTeaching_experience(){
	$query ='SELECT * FROM teaching_experience WHERE lecturer_id=?';
	$id = $this->array['ID'];
	$result = $this->db->query($query,array($id));
	$result =$result->result_array();
	if (empty($result)) {
		return false;
	}
	include_once('Teaching_experience.php');
	$resultobjects = array();
	foreach ($result as  $value) {
		$resultObjects[] = new Teaching_experience($value);
	}

	return $resultObjects;
}
protected function getTechnical_report(){
	$query ='SELECT * FROM technical_report WHERE lecturer_id=?';
	$id = $this->array['ID'];
	$result = $this->db->query($query,array($id));
	$result =$result->result_array();
	if (empty($result)) {
		return false;
	}
	include_once('Technical_report.php');
	$resultobjects = array();
	foreach ($result as  $value) {
		$resultObjects[] = new Technical_report($value);
	}

	return $resultObjects;
}
protected function getUniversity_education(){
	$query ='SELECT * FROM university_education WHERE lecturer_id=?';
	$id = $this->array['ID'];
	$result = $this->db->query($query,array($id));
	$result =$result->result_array();
	if (empty($result)) {
		return false;
	}
	include_once('University_education.php');
	$resultobjects = array();
	foreach ($result as  $value) {
		$resultObjects[] = new University_education($value);
	}

	return $resultObjects;
}
protected function getWork_experience(){
	$query ='SELECT * FROM work_experience WHERE lecturer_id=?';
	$id = $this->array['ID'];
	$result = $this->db->query($query,array($id));
	$result =$result->result_array();
	if (empty($result)) {
		return false;
	}
	include_once('Work_experience.php');
	$resultobjects = array();
	foreach ($result as  $value) {
		$resultObjects[] = new Work_experience($value);
	}

	return $resultObjects;
}

public function getLecturerIdOption($value=''){
	if($this->webSessionManager->getCurrentUserProp('user_type') == 'admin'):
		loadClass($this->load,'admin');
      $this->admin->ID = $this->webSessionManager->getCurrentUserProp('user_table_id');
      $this->admin->load();

	$query = "select id,concat_ws(' ',surname,' ',firstname,' ',middlename,' (',staff_no,')') as value from lecturer";
	$result ="<div class='form-group'>
		<label for='lecturer_id'>Lecturer </label>";
		$option = buildOptionFromQuery($this->db,$query,null,$value);
		//load the value from the given table given the name of the table to load and the display field
		$result.="<select name='lecturer_id' id='lecturer_id' class='form-control' required>
		<option value=''>..choose....</option>
					$option
				</select>";
	$result.="</div>";
	return $result;
	else:
		loadClass($this->load,'lecturer');
      	$this->lecturer->ID = $this->webSessionManager->getCurrentUserProp('user_table_id');
      	$this->lecturer->load();
		// i can only do this because the lecturer have been loaded using $this->load method in the viewController
		$id = ($this->array['ID'])? $this->array['ID'] : null;
		$value = ($id)? $id : $value;
		return $result = "<input type='hidden' name='lecturer_id' id='lecturer_id' value='$value' class='form-control' />";
	endif;
}

public function getBiodata(){
	$query = "select lecturer.* from lecturer where id=?";
	$result = $this->query($query,array($this->ID));
	if(!$result){
		return false;
	}
	$return = array();
	foreach ($result as $res) {
		$return[]= new Lecturer($res);
	}
	return $return;
}

public function getAcademicAppoint(){
	loadClass($this->load,'academic_appointment');

	$appoint = new Academic_appointment();
	$appRes = $appoint->getWhere(array('lecturer_id' => $this->ID),$c,0,null,false);
	$appRes = $appRes[0];
	return $appRes;
}

public function getFromDbClass($class,$order='order by id'){
	loadClass($this->load,$class);

	$newClass = ucfirst($class);
	$class = new $newClass();
	$result = $class->getWhere(array('lecturer_id' => $this->ID),$c,0,null,false,$order);
	if(!$result){
		return false;
	}
	
	return $result;
}

public function getHonourMember(){
	$query = "select hd.* from honours_distinctions hd join memberships on memberships.lecturer_id = hd.lecturer_id where hd.lecturer_id = ?";
	$result = $this->query($query,array($this->ID));
	if ($result==false) {
		return false;
	}

	include_once('honours_distinctions.php');
	$result = new Honours_distinctions($result);
	print_r($result);exit;
	return $result;
}

}
?>
