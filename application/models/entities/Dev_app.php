<?php 
defined("BASEPATH") OR exit("No direct script access allowed");
	require_once("application/models/Crud.php");

	/**
	* This class  is automatically generated based on the structure of the table. And it represent the model of the dev_app table.
	*/ 

class Dev_app extends Crud {

protected static $tablename = "Dev_app"; 
/* this array contains the field that can be null*/ 
static $nullArray = array('app_name','app_logo','slogan','location','description','company_name','app_mail');
static $compositePrimaryKey = array();
static $uploadDependency = array();
/*this array contains the fields that are unique*/ 
static $displayField = 'app_name';// this display field properties is used as a column in a query if a their is a relationship between this table and another table.In the other table, a field showing the relationship between this name having the name of this table i.e something like this. table_id. We cant have the name like this in the table shown to the user like table_id so the display field is use to replace that table_id.However,the display field name provided must be a column in the table to replace the table_id shown to the user,so that when the other model queries,it will use that field name as a column to be fetched along the query rather than the table_id alone.;
static $uniqueArray = array();
/* this is an associative array containing the fieldname and the type of the field*/ 
static $typeArray = array('app_name' => 'varchar','app_logo' => 'varchar','slogan' => 'text','location' => 'text','description' => 'text','company_name' => 'varchar','app_mail' => 'varchar');
/*this is a dictionary that map a field name with the label name that will be shown in a form*/ 
static $labelArray = array('ID' => '','app_name' => '','app_logo' => '','slogan' => '','location' => '','description' => '','company_name' => '','app_mail' => '');
/*associative array of fields that have default value*/ 
static $defaultArray = array();
 // populate this array with fields that are meant to be displayed as document in the format array("fieldname"=>array("filetype","maxsize",foldertosave","preservefilename"))
//the folder to save must represent a path from the basepath. it should be a relative path,preserve filename will be either true or false. when true,the file will be uploaded with it default filename else the system will pick the current user id in the session as the name of the file.
static $documentField = array('app_logo'=>array(array('jpeg','jpg','png','gif','ico'),'10000888','app/logo/')); //array containing an associative array of field that should be regareded as document field. it will contain the setting for max size and data type.;
static $relation = array();
static $tableAction = array('delete' => 'delete/dev_app', 'edit' => 'edit/dev_app');
function __construct($array = array())
{
	parent::__construct($array);
}
 
function getApp_nameFormField($value = ''){
	return "<div class='form-group'>
				<label for='app_name'>App Name</label>
				<input type='text' name='app_name' id='app_name' value='$value' class='form-control' />
			</div>";
} 
 function getApp_logoFormField($value = ''){
 	$logo= base_url($value);
	return "<div class='form-group'>
	<img src='$logo' alt='logo' class='img-responsive' width='10%'/> <br>
				<label for='app_logo'>App Logo</label>
				<input type='file' name='app_logo' id='app_logo' value='$value' class='form-control' />
			</div>";
} 
 function getSloganFormField($value = ''){
	return "<div class='form-group'>
				<label for='slogan'>Slogan</label>
				<input type='text' name='slogan' id='slogan' value='$value' class='form-control' />
			</div>";
} 
 function getLocationFormField($value = ''){
	return "<div class='form-group'>
				<label for='location'>Location</label>
				<textarea class='form-control' name='location' id='location exampleTextarea1' rows='2'>$value</textarea>
			</div>";
} 
 function getDescriptionFormField($value = ''){
	return "<div class='form-group'>
				<label for='description'>Description</label>
				<textarea class='form-control' name='description' id='description exampleTextarea1' rows='2'>$value</textarea>
			</div>";
} 
 function getCompany_nameFormField($value = ''){
	return "<div class='form-group'>
				<label for='company_name'>Company Name</label>
				<input type='text' name='company_name' id='company_name' value='$value' class='form-control' />
			</div>";
} 
 function getApp_mailFormField($value = ''){
	return "<div class='form-group'>
				<label for='app_mail'>App Mail</label>
				<input type='text' name='app_mail' id='app_mail' value='$value' class='form-control' />
			</div>";
} 


 
}

?>
