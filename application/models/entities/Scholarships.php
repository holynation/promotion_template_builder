<?php 
defined("BASEPATH") OR exit("No direct script access allowed");
	require_once("application/models/Crud.php");

	/**
	* This class  is automatically generated based on the structure of the table. And it represent the model of the scholarships table.
	*/ 

class Scholarships extends Crud {

protected static $tablename = "Scholarships"; 
/* this array contains the field that can be null*/ 
static $nullArray = array('date_created','granting_bodies','start_date','end_date');
static $compositePrimaryKey = array();
static $uploadDependency = array();
/*this array contains the fields that are unique*/ 
static $displayField = '';// this display field properties is used as a column in a query if a their is a relationship between this table and another table.In the other table, a field showing the relationship between this name having the name of this table i.e something like this. table_id. We cant have the name like this in the table shown to the user like table_id so the display field is use to replace that table_id.However,the display field name provided must be a column in the table to replace the table_id shown to the user,so that when the other model queries,it will use that field name as a column to be fetched along the query rather than the table_id alone.;
static $uniqueArray = array();
/* this is an associative array containing the fieldname and the type of the field*/ 
static $typeArray = array('lecturer_id' => 'int','title_name' => 'varchar','granting_bodies' => 'varchar','start_date' => 'varchar','end_date' => 'varchar','date_created' => 'timestamp');
/*this is a dictionary that map a field name with the label name that will be shown in a form*/ 
static $labelArray = array('ID' => '','lecturer_id' => '','title_name' => '','granting_bodies' => '','start_date' => '','end_date' => '','date_created' => '');
/*associative array of fields that have default value*/ 
static $defaultArray = array('date_created' => 'current_timestamp()');
 // populate this array with fields that are meant to be displayed as document in the format array("fieldname"=>array("filetype","maxsize",foldertosave","preservefilename"))
//the folder to save must represent a path from the basepath. it should be a relative path,preserve filename will be either true or false. when true,the file will be uploaded with it default filename else the system will pick the current user id in the session as the name of the file.
static $documentField = array(); //array containing an associative array of field that should be regareded as document field. it will contain the setting for max size and data type.;
static $relation = array('lecturer' => array('lecturer_id','id')
);
static $tableAction = array('delete' => 'delete/scholarships', 'edit' => 'edit/scholarships');
function __construct($array = array())
{
	parent::__construct($array);
}
 
function getLecturer_idFormField($value = ''){
	return getLecturerOption($value);
}
 function getTitle_nameFormField($value = ''){
	return "<div class='form-group'>
				<label for='title_name'>Title Name</label>
				<textarea name='title_name' id='title_name' class='form-control' required>$value</textarea>
			</div>";
} 
 function getGranting_bodiesFormField($value = ''){
	return "<div class='form-group'>
				<label for='granting_bodies'>Granting Bodies (only state if necessary)</label>
				<input type='text' name='granting_bodies' id='granting_bodies' value='$value' class='form-control' />
			</div>";
} 
 function getStart_dateFormField($value = ''){
	$result = "<div class='form-group'>
				<label for='start_date'>Start Date (only state if necessary)</label>";
			$option = getDropDownYear($value);
	$result.="<select name='start_date' id='start_date' class='form-control'>
			<option value=''>..choose....</option>
					 $option
				</select>";
	$result.="</div>";
	return $result;
} 
 function getEnd_dateFormField($value = ''){
	$result = "<div class='form-group'>
				<label for='end_date'>End Date (only state if necessary)</label>";
			$option = getDropDownYear($value);
	$result.="<select name='end_date' id='end_date' class='form-control'>
			<option value=''>..choose....</option>
					 $option
				</select>";
	$result.="</div>";
	return $result;
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
