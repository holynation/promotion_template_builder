<?php 
defined("BASEPATH") OR exit("No direct script access allowed");
	require_once("application/models/Crud.php");

	/**
	* This class  is automatically generated based on the structure of the table. And it represent the model of the article_appear_in_journal table.
	*/ 

class Article_appear_in_journal extends Crud {

protected static $tablename = "Article_appear_in_journal"; 
/* this array contains the field that can be null*/ 
static $nullArray = array('extra_volume','extra_vol_year','date_of_publication','date_created','middlename');
static $compositePrimaryKey = array();
static $uploadDependency = array();
/*this array contains the fields that are unique*/ 
static $displayField = '';// this display field properties is used as a column in a query if a their is a relationship between this table and another table.In the other table, a field showing the relationship between this name having the name of this table i.e something like this. table_id. We cant have the name like this in the table shown to the user like table_id so the display field is use to replace that table_id.However,the display field name provided must be a column in the table to replace the table_id shown to the user,so that when the other model queries,it will use that field name as a column to be fetched along the query rather than the table_id alone.;
static $uniqueArray = array();
/* this is an associative array containing the fieldname and the type of the field*/ 
static $typeArray = array('lecturer_id' => 'int','surname' => 'varchar','firstname' => 'varchar','middlename' => 'varchar','journal_year' => 'varchar','article_title' => 'varchar','journal_name' => 'varchar','volume_no' => 'int','journal_num' => 'int','page_range' => 'varchar','country' => 'varchar','contribution' => 'varchar','extra_volume' => 'varchar','extra_vol_year' => 'varchar','date_of_publication' => 'datetime','date_created' => 'timestamp');
/*this is a dictionary that map a field name with the label name that will be shown in a form*/ 
static $labelArray = array('ID' => '','lecturer_id' => '','surname' => '','firstname' => '','middlename' => '','journal_year' => '','article_title' => '','journal_name' => '','volume_no' => '','journal_num' => '','page_range' => '','country' => '','contribution' => 'Contribution(%)','extra_volume' => '','extra_vol_year' => '','date_of_publication' => '','date_created' => '');
/*associative array of fields that have default value*/ 
static $defaultArray = array('date_created' => 'current_timestamp()');
 // populate this array with fields that are meant to be displayed as document in the format array("fieldname"=>array("filetype","maxsize",foldertosave","preservefilename"))
//the folder to save must represent a path from the basepath. it should be a relative path,preserve filename will be either true or false. when true,the file will be uploaded with it default filename else the system will pick the current user id in the session as the name of the file.
static $documentField = array(); //array containing an associative array of field that should be regareded as document field. it will contain the setting for max size and data type.;
static $relation = array('lecturer' => array('lecturer_id','id')
);
static $tableAction = array('delete' => 'delete/article_appear_in_journal', 'edit' => 'edit/article_appear_in_journal');
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
 function getJournal_yearFormField($value = ''){
	$result = "<div class='form-group'>
				<label for='journal_year'>Journal Year</label>";
				$option = getDropDownYear($value);
	$result.="<select name='journal_year' id='journal_year' class='form-control' required>
			<option value=''>..choose....</option>
				$option
			</select>";
	$result.="</div>";
	return $result;
} 
 function getArticle_titleFormField($value = ''){
	return "<div class='form-group'>
				<label for='article_title'>Article Title</label>
				<input type='text' name='article_title' id='article_title' value='$value' class='form-control' required />
			</div>";
} 
 function getJournal_nameFormField($value = ''){
	return "<div class='form-group'>
				<label for='journal_name'>Journal Name</label>
				<input type='text' name='journal_name' id='journal_name' value='$value' class='form-control' required />
			</div>";
} 
 function getVolume_noFormField($value = ''){
	return "<div class='form-group'>
				<label for='volume_no'>Volume No (just state the number)</label>
				<input type='number' name='volume_no' id='volume_no' value='$value' class='form-control' placeholder='e.g (Vol. 2)' required />
			</div>";
} 
 function getJournal_numFormField($value = ''){
	return "<div class='form-group'>
				<label for='journal_num'>Journal Num (just state the number)</label>
				<input type='number' name='journal_num' id='journal_num' value='$value' class='form-control' placeholder='e.g (No. 1)' required />
			</div>";
} 
 function getPage_rangeFormField($value = ''){
	return "<div class='form-group'>
				<label for='page_range'>Page Range</label>
				<input type='text' name='page_range' id='page_range' value='$value' class='form-control' placeholder='e.g (23-16)' required />
			</div>";
} 
 function getCountryFormField($value = ''){
	return "<div class='form-group'>
				<label for='country'>Country (state in full)</label>
				<input type='text' name='country' id='country' value='$value' class='form-control' placeholder='e.g (Federal Republic Of Nigeria )' required />
			</div>";
} 
 function getContributionFormField($value = ''){
	return "<div class='form-group'>
				<label for='contribution'>Contribution (Contribution in percentage excluding the sign(%))</label>
				<input type='number' name='contribution' id='contribution' value='$value' class='form-control' required />
			</div>";
} 
 function getExtra_volumeFormField($value = ''){
	return "<div class='form-group'>
				<label for='extra_volume'>Current Volume (State if Low volume(1-3) journals)</label>
				<input type='text' name='extra_volume' id='extra_volume' value='$value' class='form-control' />
			</div>";
} 
 function getExtra_vol_yearFormField($value = ''){
	$result = "<div class='form-group'>
				<label for='extra_vol_year'>Current Vol Year (State if Low volume(1-3) journals)</label>";
				$option = getDropDownYear($value);
	$result.="<select name='extra_vol_year' id='extra_vol_year' class='form-control'>
			<option value=''>..choose....</option>
				$option
			</select>";
	$result.="</div>";
	return $result;
} 
 function getDate_of_publicationFormField($value = ''){
	return "<div class='form-group'>
				<label for='date_of_publication'>Date Of Publication (State if Articles was published in Year of Promotion)</label>
				<input type='date' name='date_of_publication' id='date_of_publication' value='$value' class='form-control'/>
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
