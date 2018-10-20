<?php 
defined("BASEPATH") OR exit("No direct script access allowed");
	require_once("application/models/Crud.php");

	/**
	* This class  is automatically generated based on the structure of the table. And it represent the model of the major_conf_attended table.
	*/ 

class Major_conf_attended extends Crud {

public static $tablename = "Major_conf_attended"; 
/* this array contains the field that can be null*/ 
static $nullArray = array('date_created','end_date');
static $compositePrimaryKey = array();
static $uploadDependency = array();
/*this array contains the fields that are unique*/ 
static $displayField = 'conf_name';// this display field properties is used as a column in a query if a their is a relationship between this table and another table.In the other table, a field showing the relationship between this name having the name of this table i.e something like this. table_id. We cant have the name like this in the table shown to the user like table_id so the display field is use to replace that table_id.However,the display field name provided must be a column in the table to replace the table_id shown to the user,so that when the other model queries,it will use that field name as a column to be fetched along the query rather than the table_id alone.;
static $uniqueArray = array();
/* this is an associative array containing the fieldname and the type of the field*/ 
static $typeArray = array('lecturer_id' => 'int','conf_name' => 'varchar','start_date' => 'varchar','end_date' => 'varchar','month' => 'varchar','year_attended' => 'varchar','city_of_conf' => 'varchar','country_of_conf' => 'varchar','date_created' => 'timestamp');
/*this is a dictionary that map a field name with the label name that will be shown in a form*/ 
static $labelArray = array('ID' => '','lecturer_id' => '','conf_name' => '','start_date' => '','end_date' => '','month' => '','year_attended' => '','city_of_conf' => '','country_of_conf' => '','date_created' => '');
/*associative array of fields that have default value*/ 
static $defaultArray = array('date_created' => 'current_timestamp()');
 // populate this array with fields that are meant to be displayed as document in the format array("fieldname"=>array("filetype","maxsize",foldertosave","preservefilename"))
//the folder to save must represent a path from the basepath. it should be a relative path,preserve filename will be either true or false. when true,the file will be uploaded with it default filename else the system will pick the current user id in the session as the name of the file.
static $documentField = array(); //array containing an associative array of field that should be regareded as document field. it will contain the setting for max size and data type.;
static $relation = array('lecturer' => array('lecturer_id','id')
);
static $tableAction = array('delete' => 'delete/major_conf_attended', 'edit' => 'edit/major_conf_attended');
function __construct($array = array())
{
	parent::__construct($array);
}
 
function getLecturer_idFormField($value = ''){
	return getLecturerOption($value);
}
 function getConf_nameFormField($value = ''){
	return "<div class='form-group'>
				<label for='conf_name'>Conf Name</label>
				<input type='text' name='conf_name' id='conf_name' value='$value' class='form-control' required />
			</div>";
} 
 function getStart_dateFormField($value = ''){
 	$result = "<div class='form-group'>
				<label for='start_date'>Start Date</label>";
				$option = getDropDays($value);
	$result.="<select name='start_date' id='start_date' class='form-control' required>
			<option value=''>..choose....</option>
				$option
			</select>";
	$result.="</div>";
	return $result;
} 
 function getEnd_dateFormField($value = ''){
 	$result = "<div class='form-group'>
				<label for='end_date'>End Date (choose only if necessary)</label>";
				$option = getDropDays($value);
	$result.="<select name='end_date' id='end_date' class='form-control'>
			<option value=''>..choose....</option>
				$option
			</select>";
	$result.="</div>";
	return $result;
} 
 function getMonthFormField($value = ''){
 	$arr = array('January','February','March','April','May','June', 'July','August','September','October','November','December');
 	$option = buildOptionUnassoc($arr,$value);
			return "<div class='form-group'>
	<label for='month' >Month</label>
		<select name='month' id='month' class='form-control' required>
		$option
		</select>
</div> ";
} 
 function getYear_attendedFormField($value = ''){
	$result = "<div class='form-group'>
				<label for='year_attended'>Year Attended</label>";
				$option = getDropDownYear($value);
	$result.="<select name='year_attended' id='year_attended' class='form-control' required>
			<option value=''>..choose....</option>
				$option
			</select>";
	$result.="</div>";
	return $result;
} 
 function getCity_of_confFormField($value = ''){
	return "<div class='form-group'>
				<label for='city_of_conf'>City Of Conf</label>
				<input type='text' name='city_of_conf' id='city_of_conf' value='$value' class='form-control' required />
			</div>";
} 
 function getCountry_of_confFormField($value = ''){
	return "<div class='form-group'>
				<label for='country_of_conf'>Country Of Conf</label>
				<input type='text' name='country_of_conf' id='country_of_conf' value='$value' class='form-control' required />
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
