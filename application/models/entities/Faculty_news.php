<?php 
defined("BASEPATH") OR exit("No direct script access allowed");
	require_once("application/models/Crud.php");

	/**
	* This class  is automatically generated based on the structure of the table. And it represent the model of the faculty_news table.
	*/ 

class Faculty_news extends Crud {

protected static $tablename = "Faculty_news"; 
/* this array contains the field that can be null*/ 
static $nullArray = array('date_posted');
static $compositePrimaryKey = array('new_title','new_body');
static $uploadDependency = array();
/*this array contains the fields that are unique*/ 
static $displayField = 'new_title';// this display field properties is used as a column in a query if a their is a relationship between this table and another table.In the other table, a field showing the relationship between this name having the name of this table i.e something like this. table_id. We cant have the name like this in the table shown to the user like table_id so the display field is use to replace that table_id.However,the display field name provided must be a column in the table to replace the table_id shown to the user,so that when the other model queries,it will use that field name as a column to be fetched along the query rather than the table_id alone.;
static $uniqueArray = array('new_title');
/* this is an associative array containing the fieldname and the type of the field*/ 
static $typeArray = array('new_title' => 'varchar','new_body' => 'text','img_path' => 'varchar','date_posted' => 'timestamp');
/*this is a dictionary that map a field name with the label name that will be shown in a form*/ 
static $labelArray = array('ID' => '','new_title' => 'News Title','new_body' => 'New Body','img_path' => '','date_posted' => '');
/*associative array of fields that have default value*/ 
static $defaultArray = array('date_posted' => 'current_timestamp()');
 // populate this array with fields that are meant to be displayed as document in the format array("fieldname"=>array('type'=>array('jpeg','jpg','png','gif'),'size'=>'1048576','directory'=>'pastDeans/','preserve'=>false,'max_width'=>'1000','max_height'=>'500'))
//the folder to save must represent a path from the basepath. it should be a relative path,preserve filename will be either true or false. when true,the file will be uploaded with it default filename else the system will pick the current user id in the session as the name of the file.The max_width and max_height is use to check the dimension of upload files.By default,it value is 0 respectively.
static $documentField = array("img_path"=>array('type'=>array('jpeg','jpg','png','gif'),'size'=>'1048576','directory'=>'facultySlider/','preserve'=>false,'max_width'=>'2000','max_height'=>'700')); //array containing an associative array of field that should be regareded as document field. it will contain the setting for max size and data type.;
static $relation = array();
static $tableAction = array('delete' => 'delete/faculty_news', 'edit' => 'edit/faculty_news');
function __construct($array = array())
{
	parent::__construct($array);
}
 
function getNew_titleFormField($value = ''){
	return "<div class='form-group'>
				<label for='new_title'>News Title</label>
				<textarea name='new_title' id='new_title' class='form-control' required>$value</textarea>
			</div>";
} 
 function getNew_bodyFormField($value = ''){
	return "<div class='form-group'>
				<label for='new_body'>News Body</label>
				<textarea name='new_body' id='new_body' class='form-control' style='height:200px;' required>$value</textarea>
			</div>";
} 
 function getImg_pathFormField($value = ''){
	$profile= base_url($value);
	return "<div class='form-group'>
	<img src='$profile' alt='faculty image' class='img-responsive' width='25%'/> <br>
				<label for='img_path'></label>
				<input type='file' name='img_path' id='img_path' value='$value' class='form-control' />
			</div>";
} 
 function getDate_postedFormField($value = ''){
	return "";
} 

public function checkLimit(){
	$sql = "select count(*) as total from faculty_news";
	$query = $this->db->query($sql);
	return ($query->num_rows() > 0) ? $query->result_array()[0]['total'] : 0 ;
}
 
}

?>
