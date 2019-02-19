<?php 
defined("BASEPATH") OR exit("No direct script access allowed");
	require_once("application/models/Crud.php");

	/**
	* This class  is automatically generated based on the structure of the table. And it represent the model of the patents_copyright table.
	*/ 

class Patents_copyright extends Crud {

protected static $tablename = "Patents_copyright"; 
/* this array contains the field that can be null*/ 
static $nullArray = array('patent_year','date_created');
static $compositePrimaryKey = array();
static $uploadDependency = array();
/*this array contains the fields that are unique*/ 
static $displayField = '';// this display field properties is used as a column in a query if a their is a relationship between this table and another table.In the other table, a field showing the relationship between this name having the name of this table i.e something like this. table_id. We cant have the name like this in the table shown to the user like table_id so the display field is use to replace that table_id.However,the display field name provided must be a column in the table to replace the table_id shown to the user,so that when the other model queries,it will use that field name as a column to be fetched along the query rather than the table_id alone.;
static $uniqueArray = array();
/* this is an associative array containing the fieldname and the type of the field*/ 
static $typeArray = array('lecturer_id' => 'int','author_names' => 'varchar','patent_year' => 'varchar','title_of_patent' => 'varchar','patent_no' => 'varchar','country' => 'varchar','contribution' => 'varchar','date_created' => 'timestamp');
/*this is a dictionary that map a field name with the label name that will be shown in a form*/ 
static $labelArray = array('ID' => '','lecturer_id' => '','author_names' => '','patent_year' => '','title_of_patent' => '','patent_no' => '','country' => '','contribution' => 'Contribution(%)','date_created' => '');
/*associative array of fields that have default value*/ 
static $defaultArray = array('date_created' => 'current_timestamp()');
 // populate this array with fields that are meant to be displayed as document in the format array("fieldname"=>array("filetype","maxsize",foldertosave","preservefilename"))
//the folder to save must represent a path from the basepath. it should be a relative path,preserve filename will be either true or false. when true,the file will be uploaded with it default filename else the system will pick the current user id in the session as the name of the file.
static $documentField = array(); //array containing an associative array of field that should be regareded as document field. it will contain the setting for max size and data type.;
static $relation = array('lecturer' => array('lecturer_id','id')
);
static $tableAction = array('delete' => 'delete/patents_copyright', 'edit' => 'edit/patents_copyright');
function __construct($array = array())
{
	parent::__construct($array);
}
 
function getLecturer_idFormField($value = ''){
	return getLecturerOption($value);
}
 function getAuthor_namesFormField($value = ''){
	return "<div class='form-group'>
				<label for='author_names'>Author Names (e.g Abdukadir, A.A. and Ogunlola, S.K.)</label>
				<textarea name='author_names' id='author_names' class='form-control' placeholder='please list all the names of author separated by commas' required>$value</textarea>
			</div>";
}
 function getPatent_yearFormField($value = ''){
	$result = "<div class='form-group'>
				<label for='patent_year'>Patent Year</label>";
				$option = getDropDownYear($value);
	$result.="<select name='patent_year' id='patent_year' class='form-control' required>
			<option value=''>..choose....</option>
				$option
			</select>";
	$result.="</div>";
	return $result;
} 
 function getTitle_of_patentFormField($value = ''){
	return "<div class='form-group'>
				<label for='title_of_patent'>Title Of Patent</label>
				<input type='text' name='title_of_patent' id='title_of_patent' value='$value' class='form-control' required />
			</div>";
} 
 function getPatent_noFormField($value = ''){
	return "<div class='form-group'>
				<label for='patent_no'>Patent No</label>
				<input type='text' name='patent_no' id='patent_no' value='$value' class='form-control' required />
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
				<input type='number' min='0' name='contribution' id='contribution' value='$value' class='form-control' required />
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
