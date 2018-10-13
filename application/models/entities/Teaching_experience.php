<?php 
defined("BASEPATH") OR exit("No direct script access allowed");
	require_once("application/models/Crud.php");

	/**
	* This class  is automatically generated based on the structure of the table. And it represent the model of the teaching_experience table.
	*/ 

class Teaching_experience extends Crud {

protected static $tablename = "Teaching_experience"; 
/* this array contains the field that can be null*/ 
static $nullArray = array('pg_courses_qualify','date_created');
static $compositePrimaryKey = array();
static $uploadDependency = array();
/*this array contains the fields that are unique*/ 
static $displayField = '';// this display field properties is used as a column in a query if a their is a relationship between this table and another table.In the other table, a field showing the relationship between this name having the name of this table i.e something like this. table_id. We cant have the name like this in the table shown to the user like table_id so the display field is use to replace that table_id.However,the display field name provided must be a column in the table to replace the table_id shown to the user,so that when the other model queries,it will use that field name as a column to be fetched along the query rather than the table_id alone.;
static $uniqueArray = array();
/* this is an associative array containing the fieldname and the type of the field*/ 
static $typeArray = array('lecturer_id' => 'int','course_title' => 'varchar','course_name' => 'varchar','session_name' => 'varchar','total_person' => 'varchar','category' => 'varchar','pg_courses_qualify' => 'varchar','date_created' => 'timestamp');
/*this is a dictionary that map a field name with the label name that will be shown in a form*/ 
static $labelArray = array('ID' => '','lecturer_id' => '','course_title' => '','course_name' => '','session_name' => 'Academic Session','total_person' => '','category' => '','pg_courses_qualify' => '','date_created' => '');
/*associative array of fields that have default value*/ 
static $defaultArray = array('date_created' => 'current_timestamp()');
 // populate this array with fields that are meant to be displayed as document in the format array("fieldname"=>array("filetype","maxsize",foldertosave","preservefilename"))
//the folder to save must represent a path from the basepath. it should be a relative path,preserve filename will be either true or false. when true,the file will be uploaded with it default filename else the system will pick the current user id in the session as the name of the file.
static $documentField = array(); //array containing an associative array of field that should be regareded as document field. it will contain the setting for max size and data type.;
static $relation = array('lecturer' => array('lecturer_id','id')
);
static $tableAction = array('delete' => 'delete/teaching_experience', 'edit' => 'edit/teaching_experience');
function __construct($array = array())
{
	parent::__construct($array);
}
 
function getLecturer_idFormField($value = ''){
	return getLecturerOption($value);
}
 function getCourse_nameFormField($value = ''){
	return "<div class='form-group'>
				<label for='course_name'>Course Name</label>
				<input type='text' name='course_name' id='course_name' value='$value' class='form-control' required />
			</div>";
} 
 function getCourse_titleFormField($value = ''){
	return "<div class='form-group'>
				<label for='course_title'>Course Title</label>
				<input type='text' name='course_title' id='course_title' value='$value' class='form-control' required />
			</div>";
}
 function getSession_nameFormField($value = ''){
	$result = "<div class='form-group'>
				<label for='session_name'>Academic Session</label>";
			$option = getDropDownYear($value);
	$result.="<select name='session_name' id='session_name' class='form-control'>
			<option value=''>..choose....</option>
					 $option
				</select>";
	$result.="</div>";
	return $result;
} 
 function getTotal_personFormField($value = ''){
	return "<div class='form-group'>
				<label for='total_person'>Total Person (number of persons that taught the course)</label>
				<input type='text' name='total_person' id='total_person' value='$value' class='form-control' required />
			</div>";
} 
 function getPg_courses_qualifyFormField($value = ''){
	return " ";
} 
 function getCategoryFormField($value = ''){
 	$arr =array('Undergraduate','Postgraduate');
	$option = buildOptionUnassoc($arr,$value);
	return "<div class='form-group'>
	<label for='category' >Category</label>
		<select name='category' id='category'  class='form-control' required>
		$option
		</select>
</div> ";
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

 
}

?>
