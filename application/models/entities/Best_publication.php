<?php 
defined("BASEPATH") OR exit("No direct script access allowed");
	require_once("application/models/Crud.php");

	/**
	* This class  is automatically generated based on the structure of the table. And it represent the model of the best_publication table.
	*/ 

class Best_publication extends Crud {

protected static $tablename = "Best_publication"; 
/* this array contains the field that can be null*/ 
static $nullArray = array('lecturer_id','publication_table_id');
static $compositePrimaryKey = array('lecturer_id','publication_table_id','table_name');
static $uploadDependency = array();
/*this array contains the fields that are unique*/ 
static $displayField = '';// this display field properties is used as a column in a query if a their is a relationship between this table and another table.In the other table, a field showing the relationship between this name having the name of this table i.e something like this. table_id. We cant have the name like this in the table shown to the user like table_id so the display field is use to replace that table_id.However,the display field name provided must be a column in the table to replace the table_id shown to the user,so that when the other model queries,it will use that field name as a column to be fetched along the query rather than the table_id alone.;
static $uniqueArray = array();
/* this is an associative array containing the fieldname and the type of the field*/ 
static $typeArray = array('ID' => 'int','lecturer_id' => 'int','publication_table_id' => 'int','table_name' => 'varchar','date_created' => 'datetime');
/*this is a dictionary that map a field name with the label name that will be shown in a form*/ 
static $labelArray = array('ID' => '','lecturer_id' => '','publication_table_id' => '','table_name' => '','date_created' => '');
/*associative array of fields that have default value*/ 
static $defaultArray = array('date_created' => 'current_timestamp()');
 // populate this array with fields that are meant to be displayed as document in the format array("fieldname"=>array("filetype","maxsize",foldertosave","preservefilename"))
//the folder to save must represent a path from the basepath. it should be a relative path,preserve filename will be either true or false. when true,the file will be uploaded with it default filename else the system will pick the current user id in the session as the name of the file.
static $documentField = array(); //array containing an associative array of field that should be regareded as document field. it will contain the setting for max size and data type.;
static $relation = array('lecturer' => array('lecturer_id','id')
,'publication_table' => array('publication_table_id','id')
);
static $tableAction = array('delete' => 'delete/best_publication', 'edit' => 'edit/best_publication');
function __construct($array = array())
{
	parent::__construct($array);
}
 
function getLecturer_idFormField($value = ''){
	$fk = null; 
 	//change the value of this variable to array('table'=>'lecturer','display'=>'lecturer_name'); if you want to preload the value from the database where the display key is the name of the field to use for display in the table.[i.e the display key is a column name in the table specify in that array it means select id,'lecturer_name' as value from 'lecturer' meaning the display name must be a column name in the table model].It is important to note that the table key can be in this format[array('table' => array('lecturer', 'another table name'))] provided that their is a relationship between these tables. The value param in the function is set to true if the form model is used for editing or updating so that the option value can be selected by default;

		if(is_null($fk)){
			return $result = "<input type='hidden' name='lecturer_id' id='lecturer_id' value='$value' class='form-control' />";
		}

		if(is_array($fk)){
			
			$result ="<div class='form-group'>
			<label for='lecturer_id'>Lecturer Id</label>";
			$option = $this->loadOption($fk,$value);
			//load the value from the given table given the name of the table to load and the display field
			$result.="<select name='lecturer_id' id='lecturer_id' class='form-control'>
						$option
					</select>";
		}
		$result.="</div>";
		return $result;
}
 function getPublication_table_idFormField($value = ''){
	$fk = null; 
 	//change the value of this variable to array('table'=>'publication_table','display'=>'publication_table_name'); if you want to preload the value from the database where the display key is the name of the field to use for display in the table.[i.e the display key is a column name in the table specify in that array it means select id,'publication_table_name' as value from 'publication_table' meaning the display name must be a column name in the table model].It is important to note that the table key can be in this format[array('table' => array('publication_table', 'another table name'))] provided that their is a relationship between these tables. The value param in the function is set to true if the form model is used for editing or updating so that the option value can be selected by default;

		if(is_null($fk)){
			return $result = "<input type='hidden' name='publication_table_id' id='publication_table_id' value='$value' class='form-control' />";
		}

		if(is_array($fk)){
			
			$result ="<div class='form-group'>
			<label for='publication_table_id'>Publication Table Id</label>";
			$option = $this->loadOption($fk,$value);
			//load the value from the given table given the name of the table to load and the display field
			$result.="<select name='publication_table_id' id='publication_table_id' class='form-control'>
						$option
					</select>";
		}
		$result.="</div>";
		return $result;
}
 function getTable_nameFormField($value = ''){
	return "<div class='form-group'>
				<label for='table_name'>Table Name</label>
				<input type='text' name='table_name' id='table_name' value='$value' class='form-control' required />
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

public function processPublication($table,$userId,$columnId){
	$updateQuery='';
	$table = $this->db->conn_id->escape_string($table);
	$userId = $this->db->conn_id->escape_string($userId);
	
	$updateQuery = $this->buildUpdateQuery($columnId,$table,$userId);
	if(strpos($updateQuery,"done") !== false){
		return true;
	}else{
		echo "You have already saved this publication...";exit;
	}
}

public function processPublicationRemove($table,$userType,$columnId){
	$remove='';
	$table = $this->db->conn_id->escape_string($table);
	$userType = $this->db->conn_id->escape_string($userType);

	$remove = $this->buildRemoveQuery($table,$userType,$columnId);
	if(strpos($remove,"done") !== false){
		return true;
	}else{
		echo "sorry you can't perform the operation...";exit;
	}
}

private function buildRemoveQuery($table,$userTypeId,$remove){
	$result ='';
	for($i=0;$i<count($remove);$i++){
		$table_publish = $this->db->conn_id->escape_string($remove[$i]['removeColumnId']);
		$query = "delete from best_publication where lecturer_id = ? and publication_table_id = ? and  table_name = ?";
		$result = $this->query($query,array($userTypeId,$table_publish,$table));
		if($result){
			$result.= 'done';
		}else{
			$result.= 'wrong'; // this means an no result was returned
		}
	}
	return $result;
}

private function buildUpdateQuery($update,$table,$userId){
	$result='';
	for($i=0; $i<count($update);$i++) {
		$table_publish = $this->db->conn_id->escape_string($update[$i]['columnId']);
		if(!$this->checkMaxPublication($userId)){
			echo "Sorry,you have reach the maximum publication you can save...";exit;
		}
		$param = array('lecturer_id'=>$userId,'publication_table_id'=>$table_publish,'table_name'=>$table);
		$bp = new Best_publication($param);
		if($bp->insert($this->db,$message)){
			$result.= 'done';
		}else{
			$result.= 'wrong';
		}
	}
	return $result;
}

private function checkMaxPublication($id){
	$query = "select count(*) as amount from best_publication where lecturer_id =?";
	$result = $this->db->query($query,array($id));
	$result = $result->result_array();
	if($result[0]['amount'] >= 10){
		return false;
	}else{
		return true;
	}
}

 
}

?>
