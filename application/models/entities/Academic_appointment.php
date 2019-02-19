<?php 
defined("BASEPATH") OR exit("No direct script access allowed");
	require_once("application/models/Crud.php");

	/**
	* This class  is automatically generated based on the structure of the table. And it represent the model of the academic_appointment table.
	*/ 

class Academic_appointment extends Crud {

protected static $tablename = "Academic_appointment"; 
/* this array contains the field that can be null*/ 
static $nullArray = array('date_of_last_promotion','date_last_considered','status','date_created');
static $compositePrimaryKey = array();
static $uploadDependency = array();
/*this array contains the fields that are unique*/
static $displayField = 'date_of_appointment';// this display field properties is used as a column in a query if a their is a relationship between this table and another table.In the other table, a field showing the relationship between this name having the name of this table i.e something like this. table_id. We cant have the name like this in the table shown to the user like table_id so the display field is use to replace that table_id.However,the display field name provided must be a column in the table to replace the table_id shown to the user,so that when the other model queries,it will use that field name as a column to be fetched along the query rather than the table_id alone.;
static $uniqueArray = array();
/* this is an associative array containing the fieldname and the type of the field*/ 
static $typeArray = array('lecturer_id' => 'int','first_academic_appointment' => 'varchar','date_of_appointment' => 'date','present_post' => 'varchar','date_of_present_post' => 'date','date_of_last_promotion' => 'date','date_last_considered' => 'date','status' => 'tinyint','date_created' => 'timestamp');
/*this is a dictionary that map a field name with the label name that will be shown in a form*/ 
static $labelArray = array('ID' => '','lecturer_id' => '','first_academic_appointment' => '','date_of_appointment' => '','present_post' => '','date_of_present_post' => '','date_of_last_promotion' => '','date_last_considered' => '','status' => '','date_created' => '');
/*associative array of fields that have default value*/ 
static $defaultArray = array('status' => '1','date_created' => 'current_timestamp()');
 // populate this array with fields that are meant to be displayed as document in the format array("fieldname"=>array("filetype","maxsize",foldertosave","preservefilename"))
//the folder to save must represent a path from the basepath. it should be a relative path,preserve filename will be either true or false. when true,the file will be uploaded with it default filename else the system will pick the current user id in the session as the name of the file.
static $documentField = array(); //array containing an associative array of field that should be regareded as document field. it will contain the setting for max size and data type.;
static $relation = array('lecturer' => array('lecturer_id','id')
);
static $tableAction = array('delete' => 'delete/academic_appointment', 'edit' => 'edit/academic_appointment');
function __construct($array = array())
{
	parent::__construct($array);
}
 
function getLecturer_idFormField($value = ''){
	return getLecturerOption($value);
}
 function getFirst_academic_appointmentFormField($value = ''){
	$fk=array('table'=>'appointment_category','display'=>'category_name'); 
 	//change the value of this variable to array('table'=>'department','display'=>'department_name'); if you want to preload the value from the database where the display key is the name of the field to use for display in the table.[i.e the display key is a column name in the table specify in that array it means select id,'department_name' as value from 'department' meaning the display name must be a column name in the table model].It is important to note that the table key can be in this format[array('table' => array('department', 'another table name'))] provided that their is a relationship between these tables. The value param in the function is set to true if the form model is used for editing or updating so that the option value can be selected by default;

		if(is_null($fk)){
			return $result = "<input type='hidden' name='first_academic_appointment' id='first_academic_appointment' value='$value' class='form-control' />";
		}

		if(is_array($fk)){
			
			$result ="<div class='form-group'>
			<label for='first_academic_appointment'>First Academic Appointment</label>";
			$option = $this->loadOption($fk,$value,'','appointment_order',true);
			//load the value from the given table given the name of the table to load and the display field
			$result.="<select name='first_academic_appointment' id='first_academic_appointment' class='form-control' required>
						$option
					</select>";
		}
		$result.="</div>";
		return $result;
} 
 function getDate_of_appointmentFormField($value = ''){
	return "<div class='form-group'>
				<label for='date_of_appointment'>Date Of Appointment</label>
				<input type='date' name='date_of_appointment' id='date_of_appointment' value='$value' class='form-control' required />
			</div>";
} 
 function getPresent_postFormField($value = ''){
	$fk=array('table'=>'appointment_category','display'=>'category_name'); 
 	//change the value of this variable to array('table'=>'department','display'=>'department_name'); if you want to preload the value from the database where the display key is the name of the field to use for display in the table.[i.e the display key is a column name in the table specify in that array it means select id,'department_name' as value from 'department' meaning the display name must be a column name in the table model].It is important to note that the table key can be in this format[array('table' => array('department', 'another table name'))] provided that their is a relationship between these tables. The value param in the function is set to true if the form model is used for editing or updating so that the option value can be selected by default;

		if(is_null($fk)){
			return $result = "<input type='hidden' name='present_post' id='present_post' value='$value' class='form-control' />";
		}

		if(is_array($fk)){
			
			$result ="<div class='form-group'>
			<label for='present_post'>Present Post</label>";
			$option = $this->loadOption($fk,$value,'','appointment_order',true);
			//load the value from the given table given the name of the table to load and the display field
			$result.="<select name='present_post' id='present_post' class='form-control autoload'
			data-load='checkAppointment' data-depend='first_academic_appointment' required>
				$option
			</select>";
		}
		$result.="</div>";
		return $result;
} 
 function getDate_of_present_postFormField($value = ''){
	return "<div class='form-group'>
				<label for='date_of_present_post'>Date Of Present Post</label>
				<input type='date' name='date_of_present_post' id='date_of_present_post' value='$value' class='form-control' required />
			</div>";
} 
 function getDate_of_last_promotionFormField($value = ''){
	return "<div class='form-group'>
				<label for='date_of_last_promotion'>Date Of Last Promotion</label>
				<input type='date' name='date_of_last_promotion' id='date_of_last_promotion' value='$value' class='form-control' required />
			</div>";
} 
 function getDate_last_consideredFormField($value = ''){
	return "<div class='form-group'>
				<label for='date_last_considered'>Date Last Considered (in case where promotion wasn't through)</label>
				<input type='date' name='date_last_considered' id='date_last_considered' value='$value' class='form-control' />
			</div>";
} 
 function getStatusFormField($value = ''){
	return "<div class='form-group'>
	<label class='form-checkbox'>Status</label>
	<select class='form-control' id='status' name='status' >
		<option value='1'>Yes</option>
		<option value='0' selected='selected'>No</option>
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
