<?php 
defined("BASEPATH") OR exit("No direct script access allowed");
	require_once("application/models/Crud.php");

	/**
	* This class  is automatically generated based on the structure of the table. And it represent the model of the department table.
	*/ 

class Department extends Crud {

protected static $tablename = "Department"; 
/* this array contains the field that can be null*/ 
static $nullArray = array('date_created');
static $compositePrimaryKey = array();
static $uploadDependency = array();
/*this array contains the fields that are unique*/ 
static $displayField = 'department_name';// this display field properties is used as a column in a query if a their is a relationship between this table and another table.In the other table, a field showing the relationship between this name having the name of this table i.e something like this. table_id. We cant have the name like this in the table shown to the user like table_id so the display field is use to replace that table_id.However,the display field name provided must be a column in the table to replace the table_id shown to the user,so that when the other model queries,it will use that field name as a column to be fetched along the query rather than the table_id alone.;
static $uniqueArray = array('department_name');
/* this is an associative array containing the fieldname and the type of the field*/ 
static $typeArray = array('department_name' => 'varchar','faculty_id' => 'int','date_created' => 'datetime');
/*this is a dictionary that map a field name with the label name that will be shown in a form*/ 
static $labelArray = array('ID' => '','department_name' => '','faculty_id' => '','date_created' => '');
/*associative array of fields that have default value*/ 
static $defaultArray = array('date_created'=>'currrent_timestamp()');
 // populate this array with fields that are meant to be displayed as document in the format array("fieldname"=>array("filetype","maxsize",foldertosave","preservefilename"))
//the folder to save must represent a path from the basepath. it should be a relative path,preserve filename will be either true or false. when true,the file will be uploaded with it default filename else the system will pick the current user id in the session as the name of the file.
static $documentField = array(); //array containing an associative array of field that should be regareded as document field. it will contain the setting for max size and data type.;
static $relation = array('faculty' => array('faculty_id','id')
);
static $tableAction = array('delete' => 'delete/department', 'edit' => 'edit/department');
function __construct($array = array())
{
	parent::__construct($array);
}
 
function getDepartment_nameFormField($value = ''){
	return "<div class='form-group'>
				<label for='department_name'>Department Name</label>
				<input type='text' name='department_name' id='department_name' value='$value' class='form-control' required />
			</div>";
} 
 function getFaculty_idFormField($value = ''){
	$fk = array('table' => 'faculty','display' => 'faculty_name'); 
 	//change the value of this variable to array('table'=>'faculty','display'=>'faculty_name'); if you want to preload the value from the database where the display key is the name of the field to use for display in the table.[i.e the display key is a column name in the table specify in that array it means select id,'faculty_name' as value from 'faculty' meaning the display name must be a column name in the table model].It is important to note that the table key can be in this format[array('table' => array('faculty', 'another table name'))] provided that their is a relationship between these tables. The value param in the function is set to true if the form model is used for editing or updating so that the option value can be selected by default;

		if(is_null($fk)){
			return $result = "<input type='hidden' name='faculty_id' id='faculty_id' value='$value' class='form-control' />";
		}

		if(is_array($fk)){
			
			$result ="<div class='form-group'>
			<label for='faculty_id'>Faculty</label>";
			$option = $this->loadOption($fk,$value);
			//load the value from the given table given the name of the table to load and the display field
			$result.="<select name='faculty_id' id='faculty_id' class='form-control'>
						$option
					</select>";
		}
		$result.="</div>";
		return $result;
}
 function getDate_createdFormField($value = ''){
	return " ";
} 

protected function getFaculty(){
	$query ='SELECT * FROM faculty WHERE id=?';
	if (!isset($this->array['ID'])) {
		return null;
	}
	$id = $this->array['ID'];
	$result = $this->db->query($query,array($id));
	$result = $result->result_array();
	if (empty($result)) {
		return false;
	}
	include_once('Faculty.php');
	$resultObject = new Faculty($result[0]);
	return $resultObject;
}

 
}

?>
