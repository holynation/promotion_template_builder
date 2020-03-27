<?php 
defined("BASEPATH") OR exit("No direct script access allowed");
	require_once("application/models/Crud.php");

	/**
	* This class  is automatically generated based on the structure of the table. And it represent the model of the appointment_category table.
	*/ 

class Appointment_category extends Crud {

protected static $tablename = "Appointment_category"; 
/* this array contains the field that can be null*/ 
static $nullArray = array('status');
static $compositePrimaryKey = array();
static $uploadDependency = array();
/*this array contains the fields that are unique*/ 
static $displayField = 'category_name'; // this display field properties is used as a column in a query if a their is a relationship between this table and another table.In the other table, a field showing the relationship between this name having the name of this table i.e something like this. table_id. We cant have the name like this in the table shown to the user like table_id so the display field is use to replace that table_id.However,the display field name provided must be a column in the table to replace the table_id shown to the user,so that when the other model queries,it will use that field name as a column to be fetched along the query rather than the table_id alone.;
static $uniqueArray = array('category_name','appointment_order');
/* this is an associative array containing the fieldname and the type of the field*/ 
static $typeArray = array('category_name' => 'varchar','appointment_order' => 'int','status' => 'tinyint');
/*this is a dictionary that map a field name with the label name that will be shown in a form*/ 
static $labelArray = array('ID' => '','category_name' => '','appointment_order' => '','status' => '');
/*associative array of fields that have default value*/ 
static $defaultArray = array('status' => '1');
 // populate this array with fields that are meant to be displayed as document in the format array("fieldname"=>array("filetype","maxsize",foldertosave","preservefilename"))
//the folder to save must represent a path from the basepath. it should be a relative path,preserve filename will be either true or false. when true,the file will be uploaded with it default filename else the system will pick the current user id in the session as the name of the file.
static $documentField = array(); //array containing an associative array of field that should be regareded as document field. it will contain the setting for max size and data type.;
static $relation = array();
static $tableAction = array('enable'=>'getEnabled','delete' => 'delete/appointment_category', 'edit' => 'edit/appointment_category');
function __construct($array = array())
{
	parent::__construct($array);
}
 
function getCategory_nameFormField($value = ''){
	return "<div class='form-group'>
				<label for='category_name'>Category Name</label>
				<input type='text' name='category_name' id='category_name' value='$value' class='form-control' required />
			</div>";
} 
 function getAppointment_orderFormField($value = ''){
	return "<div class='form-group'>
				<label for='appointment_order'>Appointment Order</label>
				<input type='number' min='0' name='appointment_order' id='appointment_order' value='$value' class='form-control' required />
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


 
}

?>
