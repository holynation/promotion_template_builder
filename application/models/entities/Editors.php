<?php 
defined("BASEPATH") OR exit("No direct script access allowed");
	require_once("application/models/Crud.php");

	/**
	* This class  is automatically generated based on the structure of the table. And it represent the model of the editors table.
	*/ 

class Editors extends Crud {

protected static $tablename = "Editors"; 
/* this array contains the field that can be null*/ 
static $nullArray = array('date_created','editor_middlename','publish_table_key');
static $compositePrimaryKey = array();
static $uploadDependency = array();
/*this array contains the fields that are unique*/ 
static $displayField = array('editor_surname','editor_firstname'); // this display field properties is used as a column in a query if a their is a relationship between this table and another table.In the other table, a field showing the relationship between this name having the name of this table i.e something like this. table_id. We cant have the name like this in the table shown to the user like table_id so the display field is use to replace that table_id.However,the display field name provided must be a column in the table to replace the table_id shown to the user,so that when the other model queries,it will use that field name as a column to be fetched along the query rather than the table_id alone.;
static $uniqueArray = array();
/* this is an associative array containing the fieldname and the type of the field*/ 
static $typeArray = array('lecturer_id' => 'int','editor_surname' => 'varchar','editor_firstname' => 'varchar','editor_middlename' => 'varchar','publish_table_key' => 'int','date_created' => 'timestamp');
/*this is a dictionary that map a field name with the label name that will be shown in a form*/ 
static $labelArray = array('ID' => '','lecturer_id' => '','editor_surname' => '','editor_firstname' => '','editor_middlename' => '','publish_table_key' => '','date_created' => '');
/*associative array of fields that have default value*/ 
static $defaultArray = array('date_created' => 'current_timestamp()');
 // populate this array with fields that are meant to be displayed as document in the format array("fieldname"=>array("filetype","maxsize",foldertosave","preservefilename"))
//the folder to save must represent a path from the basepath. it should be a relative path,preserve filename will be either true or false. when true,the file will be uploaded with it default filename else the system will pick the current user id in the session as the name of the file.
static $documentField = array(); //array containing an associative array of field that should be regareded as document field. it will contain the setting for max size and data type.;
static $relation = array('lecturer' => array('lecturer_id','id')
);
static $tableAction = array('delete' => 'delete/editors', 'edit' => 'edit/editors');
function __construct($array = array())
{
	parent::__construct($array);
}
 
function getLecturer_idFormField($value = ''){
	return getLecturerOption($value);
}
 function getEditor_surnameFormField($value = ''){
	return "<div class='form-group'>
				<label for='editor_surname'>Editor Surname</label>
				<input type='text' name='editor_surname' id='editor_surname' value='$value' class='form-control' required />
			</div>";
} 
 function getEditor_firstnameFormField($value = ''){
	return "<div class='form-group'>
				<label for='editor_firstname'>Editor Firstname</label>
				<input type='text' name='editor_firstname' id='editor_firstname' value='$value' class='form-control' required />
			</div>";
} 
 function getEditor_middlenameFormField($value = ''){
	return "<div class='form-group'>
				<label for='editor_middlename'>Editor Middlename</label>
				<input type='text' name='editor_middlename' id='editor_middlename' value='$value' class='form-control' />
			</div>";
} 
 function getPublish_table_keyFormField($value = ''){
	return " ";
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
