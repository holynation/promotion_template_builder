<?php 
defined("BASEPATH") OR exit("No direct script access allowed");
	require_once("application/models/Crud.php");

	/**
	* This class  is automatically generated based on the structure of the table. And it represent the model of the faculty table.
	*/ 

class Faculty extends Crud {

protected static $tablename = "Faculty"; 
/* this array contains the field that can be null*/ 
static $nullArray = array('faculty_color','slogan','description','date_created');
static $compositePrimaryKey = array();
static $uploadDependency = array();
/*this array contains the fields that are unique*/ 
static $displayField = 'faculty_name';// this display field properties is used as a column in a query if a their is a relationship between this table and another table.In the other table, a field showing the relationship between this name having the name of this table i.e something like this. table_id. We cant have the name like this in the table shown to the user like table_id so the display field is use to replace that table_id.However,the display field name provided must be a column in the table to replace the table_id shown to the user,so that when the other model queries,it will use that field name as a column to be fetched along the query rather than the table_id alone.;
static $uniqueArray = array('faculty_name');
/* this is an associative array containing the fieldname and the type of the field*/ 
static $typeArray = array('faculty_name' => 'varchar','faculty_color' => 'varchar','slogan' => 'varchar','date_created' => 'timestamp','description' => 'text');
/*this is a dictionary that map a field name with the label name that will be shown in a form*/ 
static $labelArray = array('ID' => '','faculty_name' => '','faculty_color' => '','slogan' => '','date_created' => '','description' => '');
/*associative array of fields that have default value*/ 
static $defaultArray = array('date_created' => 'current_timestamp()');
 // populate this array with fields that are meant to be displayed as document in the format array("fieldname"=>array("filetype","maxsize",foldertosave","preservefilename"))
//the folder to save must represent a path from the basepath. it should be a relative path,preserve filename will be either true or false. when true,the file will be uploaded with it default filename else the system will pick the current user id in the session as the name of the file.
static $documentField = array(); //array containing an associative array of field that should be regareded as document field. it will contain the setting for max size and data type.;
static $relation = array();
static $tableAction = array('delete' => 'delete/faculty', 'edit' => 'edit/faculty');
function __construct($array = array())
{
	parent::__construct($array);
}
 
function getFaculty_nameFormField($value = ''){
	return "<div class='form-group'>
				<label for='faculty_name'>Faculty Name</label>
				<input type='text' name='faculty_name' id='faculty_name' value='$value' class='form-control' required />
			</div>";
} 
 function getFaculty_colorFormField($value = ''){
	return "<div class='form-group'>
				<label for='faculty_color'>Faculty Color</label>
				<input type='text' name='faculty_color' id='faculty_color' value='$value' class='form-control' />
			</div>";
} 
 function getSloganFormField($value = ''){
	return "<div class='form-group'>
				<label for='slogan'>Slogan</label>
				<input type='text' name='slogan' id='slogan' value='$value' class='form-control' />
			</div>";
} 
 function getDate_createdFormField($value = ''){
	return " ";
} 
 function getDescriptionFormField($value = ''){
	return "<div class='form-group'>
				<label for='description'>Description</label>
				<textarea type='text' name='description' id='description' class='form-control' required>$value</textarea>
			</div>";
} 


 
}

?>
