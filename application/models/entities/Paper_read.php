<?php 
defined("BASEPATH") OR exit("No direct script access allowed");
	require_once("application/models/Crud.php");

	/**
	* This class  is automatically generated based on the structure of the table. And it represent the model of the paper_read table.
	*/ 

class Paper_read extends Crud {

protected static $tablename = "Paper_read"; 
/* this array contains the field that can be null*/ 
static $nullArray = array('middlename','date_created','author_names');
static $compositePrimaryKey = array('major_conf_attended_id','title_of_paper');
static $uploadDependency = array();
/*this array contains the fields that are unique*/ 
static $displayField = '';// this display field properties is used as a column in a query if a their is a relationship between this table and another table.In the other table, a field showing the relationship between this name having the name of this table i.e something like this. table_id. We cant have the name like this in the table shown to the user like table_id so the display field is use to replace that table_id.However,the display field name provided must be a column in the table to replace the table_id shown to the user,so that when the other model queries,it will use that field name as a column to be fetched along the query rather than the table_id alone.;
static $uniqueArray = array();
/* this is an associative array containing the fieldname and the type of the field*/ 
static $typeArray = array('lecturer_id' => 'int','major_conf_attended_id' => 'int','author_names' => 'varchar','title_of_paper' => 'varchar','date_created' => 'timestamp');
/*this is a dictionary that map a field name with the label name that will be shown in a form*/ 
static $labelArray = array('ID' => '','lecturer_id' => '','major_conf_attended_id' => '','author_names' => '','title_of_paper' => '','date_created' => '');
/*associative array of fields that have default value*/ 
static $defaultArray = array('date_created' => 'current_timestamp()');
 // populate this array with fields that are meant to be displayed as document in the format array("fieldname"=>array("filetype","maxsize",foldertosave","preservefilename"))
//the folder to save must represent a path from the basepath. it should be a relative path,preserve filename will be either true or false. when true,the file will be uploaded with it default filename else the system will pick the current user id in the session as the name of the file.
static $documentField = array(); //array containing an associative array of field that should be regareded as document field. it will contain the setting for max size and data type.;
static $relation = array('lecturer' => array('lecturer_id','id')
,'major_conf_attended' => array('major_conf_attended_id','id')
);
static $tableAction = array('delete' => 'delete/paper_read', 'edit' => 'edit/paper_read');
function __construct($array = array())
{
	parent::__construct($array);
	$this->load->model('webSessionManager');
}
 
function getLecturer_idFormField($value = ''){
	$where='';
	if($this->webSessionManager->getCurrentUserProp('user_type') != 'admin'){
		$id = $this->webSessionManager->getCurrentUserProp('user_table_id');
		$where = ($id) ? "where lecturer.ID = $id" : " ";
	}
	$query = "select id,concat(surname,' ',firstname,' ',middlename,' (',staff_no,')') as value from lecturer $where";
	$result ="<div class='form-group'>
		<label for='lecturer_id'>Lecturer </label>";
		$option = buildOptionFromQuery($this->db,$query,null,$value);
		//load the value from the given table given the name of the table to load and the display field
		$result.="<select name='lecturer_id' id='lecturer_id' class='form-control autoload' data-child='major_conf_attended_id' data-load='getConfById' required>
		<option value=''>..choose....</option>
					$option
				</select>";
	$result.="</div>";
	return $result;
}
 function getMajor_conf_attended_idFormField($value = ''){
 	// this should be based on the lecturer id chosen in the lecturer_id form field
 	// so has to prevent loading all the major conf in the option field
 	$option ='';
 	if ($value) {
 		$query = "select id,conf_name as value from major_conf_attended";
 		$arr = array($value);
		$option = buildOptionFromQuery($this->db,$query,$arr,$value);
	}
		$result ="<div class='form-group'>
			<label for='major_conf_attended_id'>Major Conf Attended</label>";
		$result.="<select name='major_conf_attended_id' id='major_conf_attended_id' class='form-control'>
						$option
					</select>";
		$result.="</div>";
		return $result;
}
 function getAuthor_namesFormField($value = ''){
	return "<div class='form-group'>
				<label for='author_names'>Reader's Names (e.g Abdukadir, A.A. and Ogunlola, S.K.)</label>
				<textarea name='author_names' id='author_names' class='form-control' placeholder='please list all the names of author separated by commas'>$value</textarea>
			</div>";
}  
 function getTitle_of_paperFormField($value = ''){
	return "<div class='form-group'>
				<label for='title_of_paper'>Title Of Paper</label>
				<textarea name='title_of_paper' id='title_of_paper' class='form-control' required>$value</textarea>
			</div>";
} 
 function getDate_createdFormField($value = ''){
	return " ";
} 

protected function getLecturer(){
	$query ='SELECT * FROM lecturer WHERE id=?';
	if (!isset($this->array['ID'])) {
		return null;
	}
	$id = $this->array['ID'];
	$result = $this->db->query($query,array($id));
	$result = $result->result_array();
	if (empty($result)) {
		return false;
	}
	include_once('Lecturer.php');
	$resultObject = new Lecturer($result[0]);
	return $resultObject;
}
 protected function getMajor_conf_attended(){
	$query ='SELECT * FROM major_conf_attended WHERE id=?';
	if (!isset($this->array['ID'])) {
		return null;
	}
	$id = $this->array['ID'];
	$result = $this->db->query($query,array($id));
	$result = $result->result_array();
	if (empty($result)) {
		return false;
	}
	include_once('Major_conf_attended.php');
	$resultObject = new Major_conf_attended($result[0]);
	return $resultObject;
}

 
}

?>
