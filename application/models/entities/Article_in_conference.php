<?php 
defined("BASEPATH") OR exit("No direct script access allowed");
	require_once("application/models/Crud.php");

	/**
	* This class  is automatically generated based on the structure of the table. And it represent the model of the article_in_conference table.
	*/ 

class Article_in_conference extends Crud {

protected static $tablename = "Article_in_conference"; 
/* this array contains the field that can be null*/ 
static $nullArray = array('year_publish','date_created','author_middlename','editors_id');
static $compositePrimaryKey = array();
static $uploadDependency = array();
/*this array contains the fields that are unique*/ 
static $displayField = '';// this display field properties is used as a column in a query if a their is a relationship between this table and another table.In the other table, a field showing the relationship between this name having the name of this table i.e something like this. table_id. We cant have the name like this in the table shown to the user like table_id so the display field is use to replace that table_id.However,the display field name provided must be a column in the table to replace the table_id shown to the user,so that when the other model queries,it will use that field name as a column to be fetched along the query rather than the table_id alone.;
static $uniqueArray = array();
/* this is an associative array containing the fieldname and the type of the field*/ 
static $typeArray = array('lecturer_id' => 'int','editors_id' => 'int','author_surname' => 'varchar','author_firstname' => 'varchar','author_middlename' => 'varchar','year_publish' => 'varchar','article_title' => 'varchar','conference_theme' => 'varchar','name_of_proceedings' => 'varchar','date_of_conference' => 'varchar','city_publish' => 'varchar','publishing_company' => 'varchar','page_range' => 'varchar','country' => 'varchar','contribution' => 'varchar','date_created' => 'timestamp');
/*this is a dictionary that map a field name with the label name that will be shown in a form*/ 
static $labelArray = array('ID' => '','lecturer_id' => '','editors_id' => '','author_surname' => '','author_firstname' => '','author_middlename' => '','year_publish' => '','article_title' => '','conference_theme' => '','name_of_proceedings' => '','date_of_conference' => '','city_publish' => '','publishing_company' => '','page_range' => '','country' => '','contribution' => 'Contribution(%)','date_created' => '');
/*associative array of fields that have default value*/ 
static $defaultArray = array('date_created' => 'current_timestamp()');
 // populate this array with fields that are meant to be displayed as document in the format array("fieldname"=>array("filetype","maxsize",foldertosave","preservefilename"))
//the folder to save must represent a path from the basepath. it should be a relative path,preserve filename will be either true or false. when true,the file will be uploaded with it default filename else the system will pick the current user id in the session as the name of the file.
static $documentField = array(); //array containing an associative array of field that should be regareded as document field. it will contain the setting for max size and data type.;
static $relation = array('lecturer' => array('lecturer_id','id')
,'editors' => array('editors_id','id')
);
static $tableAction = array('delete' => 'delete/article_in_conference', 'edit' => 'edit/article_in_conference');
function __construct($array = array())
{
	parent::__construct($array);
}
 
function getLecturer_idFormField($value = ''){
	return getLecturerOption($value);
}
 function getAuthor_surnameFormField($value = ''){
	return "<div class='form-group'>
				<label for='author_surname'>Author Surname</label>
				<input type='text' name='author_surname' id='author_surname' value='$value' class='form-control' placeholder=\"list all surname's separated by comma\" required />
			</div>";
} 
 function getAuthor_firstnameFormField($value = ''){
	return "<div class='form-group'>
				<label for='author_firstname'>Author Firstname</label>
				<input type='text' name='author_firstname' id='author_firstname' value='$value' class='form-control' placeholder=\"list all firstname's separated by comma\" required />
			</div>";
} 
 function getAuthor_middlenameFormField($value = ''){
	return "<div class='form-group'>
				<label for='author_middlename'>Author Middlename</label>
				<input type='text' name='author_middlename' id='author_middlename' value='$value' class='form-control' placeholder=\"list all middlename's separated by comma\" />
			</div>";
} 
 function getYear_publishFormField($value = ''){
	$result = "<div class='form-group'>
				<label for='year_publish'>Year Of Publication</label>";
				$option = getDropDownYear($value);
	$result.="<select name='year_publish' id='year_publish' class='form-control' required>
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
 function getConference_themeFormField($value = ''){
	return "<div class='form-group'>
				<label for='conference_theme'>Conference Theme</label>
				<input type='text' name='conference_theme' id='conference_theme' value='$value' class='form-control' required />
			</div>";
} 
 function getName_of_proceedingsFormField($value = ''){
	return "<div class='form-group'>
				<label for='name_of_proceedings'>Name Of Proceedings</label>
				<input type='text' name='name_of_proceedings' id='name_of_proceedings' value='$value' class='form-control' required />
			</div>";
} 
 function getDate_of_conferenceFormField($value = ''){
	return "<div class='form-group'>
				<label for='date_of_conference'>Date Of Conference</label>
				<input type='date' name='date_of_conference' id='date_of_conference' value='$value' class='form-control' required />
			</div>";
} 
 function getCity_publishFormField($value = ''){
	return "<div class='form-group'>
				<label for='city_publish'>City Publish</label>
				<input type='text' name='city_publish' id='city_publish' value='$value' class='form-control' required />
			</div>";
} 
 function getPublishing_companyFormField($value = ''){
	return "<div class='form-group'>
				<label for='publishing_company'>Publishing Company</label>
				<input type='text' name='publishing_company' id='publishing_company' value='$value' class='form-control' required />
			</div>";
} 
 function getPage_rangeFormField($value = ''){
	return "<div class='form-group'>
				<label for='page_range'>Page Range</label>
				<input type='text' name='page_range' id='page_range' value='$value' class='form-control' required />
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
				<input type='text' name='contribution' id='contribution' value='$value' class='form-control' required />
			</div>";
} 
function getEditors_idFormField($value=''){
	$fk= array('table'=>'editors','display'=>'editor_surname'); 

	if (is_null($fk)) {
		return $result="<input type='hidden' value='$value' name='editors_id' id='editors_id' class='form-control' />
			";
	}
	if (is_array($fk)) {
		$result ="<div class='form-group'>
		<label for='editors_id'>Editors</label>";
		$option = $this->loadOption($fk,$value);
		//load the value from the given table given the name of the table to load and the display field
		$result.="<select name='editors_id' id='editors_id' class='form-control'>
			$option
		</select>";
	}
	$result.="</div>";
	return  " ";

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
protected function getEditors(){
	$query ='SELECT * FROM editors WHERE id=?';
	if (!isset($this->array['ID'])) {
		return null;
	}
	$id = $this->array['ID'];
	$result = $this->db->query($query,array($id));
	$result = $result->result_array();
	if (empty($result)) {
		return false;
	}
	include_once('Editors.php');
	$resultObject = new Editors($result[0]);
	return $resultObject;
}

 
}

?>
