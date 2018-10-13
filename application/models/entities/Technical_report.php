<?php 
defined("BASEPATH") OR exit("No direct script access allowed");
	require_once("application/models/Crud.php");

	/**
	* This class  is automatically generated based on the structure of the table. And it represent the model of the technical_report table.
	*/ 

class Technical_report extends Crud {

protected static $tablename = "Technical_report"; 
/* this array contains the field that can be null*/ 
static $nullArray = array('date_created','middlename');
static $compositePrimaryKey = array();
static $uploadDependency = array();
/*this array contains the fields that are unique*/ 
static $displayField = 'report_year';// this display field properties is used as a column in a query if a their is a relationship between this table and another table.In the other table, a field showing the relationship between this name having the name of this table i.e something like this. table_id. We cant have the name like this in the table shown to the user like table_id so the display field is use to replace that table_id.However,the display field name provided must be a column in the table to replace the table_id shown to the user,so that when the other model queries,it will use that field name as a column to be fetched along the query rather than the table_id alone.;
static $uniqueArray = array();
/* this is an associative array containing the fieldname and the type of the field*/ 
static $typeArray = array('lecturer_id' => 'int','surname' => 'varchar','firstname' => 'varchar','middlename' => 'varchar','report_year' => 'varchar','report_title' => 'varchar','organisation_report_submitted' => 'varchar','total_page' => 'varchar','country' => 'varchar','contribution' => 'varchar','date_created' => 'timestamp');
/*this is a dictionary that map a field name with the label name that will be shown in a form*/ 
static $labelArray = array('ID' => '','lecturer_id' => '','surname' => '','firstname' => '','middlename' => '','report_year' => '','report_title' => '','organisation_report_submitted' => '','total_page' => '','country' => '','contribution' => 'Contribution(%)','date_created' => '');
/*associative array of fields that have default value*/ 
static $defaultArray = array('date_created' => 'current_timestamp()');
 // populate this array with fields that are meant to be displayed as document in the format array("fieldname"=>array("filetype","maxsize",foldertosave","preservefilename"))
//the folder to save must represent a path from the basepath. it should be a relative path,preserve filename will be either true or false. when true,the file will be uploaded with it default filename else the system will pick the current user id in the session as the name of the file.
static $documentField = array(); //array containing an associative array of field that should be regareded as document field. it will contain the setting for max size and data type.;
static $relation = array('lecturer' => array('lecturer_id','id')
);
static $tableAction = array('delete' => 'delete/technical_report', 'edit' => 'edit/technical_report');
function __construct($array = array())
{
	parent::__construct($array);
}
 
function getLecturer_idFormField($value = ''){
	return getLecturerOption($value);
}
 function getSurnameFormField($value = ''){
	return "<div class='form-group'>
				<label for='surname'>Surname</label>
				<input type='text' name='surname' id='surname' value='$value' class='form-control' placeholder=\"list all surname's separated by comma\" required />
			</div>";
} 
 function getFirstnameFormField($value = ''){
	return "<div class='form-group'>
				<label for='firstname'>Firstname</label>
				<input type='text' name='firstname' id='firstname' value='$value' class='form-control' placeholder=\"list all firstname's separated by comma\" required />
			</div>";
} 
 function getMiddlenameFormField($value = ''){
	return "<div class='form-group'>
				<label for='middlename'>Middlename</label>
				<input type='text' name='middlename' id='middlename' value='$value' class='form-control' placeholder=\"list all middlename's separated by comma\" />
			</div>";
}  
 function getReport_yearFormField($value = ''){
	$result = "<div class='form-group'>
				<label for='report_year'>Report Year</label>";
				$option = getDropDownYear($value);
	$result.="<select name='report_year' id='report_year' class='form-control' required>
			<option value=''>..choose....</option>
				$option
			</select>";
	$result.="</div>";
	return $result;
} 
 function getReport_titleFormField($value = ''){
	return "<div class='form-group'>
				<label for='report_title'>Report Title</label>
				<input type='text' name='report_title' id='report_title' value='$value' class='form-control' required />
			</div>";
} 
 function getOrganisation_report_submittedFormField($value = ''){
	return "<div class='form-group'>
				<label for='organisation_report_submitted'>Organisation Report Submitted</label>
				<input type='text' name='organisation_report_submitted' id='organisation_report_submitted' value='$value' class='form-control' required />
			</div>";
} 
 function getTotal_pageFormField($value = ''){
	return "<div class='form-group'>
				<label for='total_page'>Total No. Of Pages</label>
				<input type='number' name='total_page' id='total_page' value='$value' class='form-control' required />
			</div>";
} 
 function getCountryFormField($value = ''){
	return "<div class='form-group'>
				<label for='country'>Country</label>
				<input type='text' name='country' id='country' value='$value' class='form-control' required />
			</div>";
} 
 function getContributionFormField($value = ''){
	return "<div class='form-group'>
				<label for='contribution'>Contribution (Contribution in percentage excluding the sign(%))</label>
				<input type='number' name='contribution' id='contribution' value='$value' class='form-control' required />
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

 
}

?>
