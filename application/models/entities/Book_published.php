<?php 
defined("BASEPATH") OR exit("No direct script access allowed");
	require_once("application/models/Crud.php");

	/**
	* This class  is automatically generated based on the structure of the table. And it represent the model of the book_published table.
	*/ 

class Book_published extends Crud {

protected static $tablename = "Book_published"; 
/* this array contains the field that can be null*/ 
static $nullArray = array('author_middlename','date_created');
static $compositePrimaryKey = array();
static $uploadDependency = array();
/*this array contains the fields that are unique*/ 
static $displayField = '';// this display field properties is used as a column in a query if a their is a relationship between this table and another table.In the other table, a field showing the relationship between this name having the name of this table i.e something like this. table_id. We cant have the name like this in the table shown to the user like table_id so the display field is use to replace that table_id.However,the display field name provided must be a column in the table to replace the table_id shown to the user,so that when the other model queries,it will use that field name as a column to be fetched along the query rather than the table_id alone.;
static $uniqueArray = array();
/* this is an associative array containing the fieldname and the type of the field*/ 
static $typeArray = array('lecturer_id' => 'int','author_surname' => 'varchar','author_firstname' => 'varchar','author_middlename' => 'varchar','year_of_publication' => 'varchar','title_of_book' => 'varchar','city_of_publication' => 'varchar','publish_company_name' => 'varchar','total_no_pages' => 'int','isbn_no' => 'varchar','country_publish' => 'varchar','contribution' => 'varchar','date_created' => 'timestamp');
/*this is a dictionary that map a field name with the label name that will be shown in a form*/ 
static $labelArray = array('ID' => '','lecturer_id' => '','author_surname' => '','author_firstname' => '','author_middlename' => '','year_of_publication' => '','title_of_book' => '','city_of_publication' => '','publish_company_name' => '','total_no_pages' => '','isbn_no' => '','country_publish' => '','contribution' => 'Contribution(%)','date_created' => '');
/*associative array of fields that have default value*/ 
static $defaultArray = array('date_created' => 'current_timestamp()');
 // populate this array with fields that are meant to be displayed as document in the format array("fieldname"=>array("filetype","maxsize",foldertosave","preservefilename"))
//the folder to save must represent a path from the basepath. it should be a relative path,preserve filename will be either true or false. when true,the file will be uploaded with it default filename else the system will pick the current user id in the session as the name of the file.
static $documentField = array(); //array containing an associative array of field that should be regareded as document field. it will contain the setting for max size and data type.;
static $relation = array('lecturer' => array('lecturer_id','id')
);
static $tableAction = array('delete' => 'delete/book_published', 'edit' => 'edit/book_published');
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
				<input type='text' name='author_surname' id='author_surname' value='$value' class='form-control' placeholder='list all surnames separated by comma' required />
			</div>";
} 
 function getAuthor_firstnameFormField($value = ''){
	return "<div class='form-group'>
				<label for='author_firstname'>Author Firstname</label>
				<input type='text' name='author_firstname' id='author_firstname' value='$value' class='form-control' placeholder='list all firstname separated by comma' required />
			</div>";
} 
 function getAuthor_middlenameFormField($value = ''){
	return "<div class='form-group'>
				<label for='author_middlename'>Author Middlename</label>
				<input type='text' name='author_middlename' id='author_middlename' value='$value' class='form-control' placeholder='list all middlename separated by comma' />
			</div>";
} 
 function getYear_of_publicationFormField($value = ''){
	$result = "<div class='form-group'>
				<label for='year_of_publication'>Year Of Publication</label>";
				$option = getDropDownYear($value);
	$result.="<select name='year_of_publication' id='year_of_publication' class='form-control' required>
			<option value=''>..choose....</option>
				$option
			</select>";
	$result.="</div>";
	return $result;
} 
 function getTitle_of_bookFormField($value = ''){
	return "<div class='form-group'>
				<label for='title_of_book'>Title Of Book</label>
				<input type='text' name='title_of_book' id='title_of_book' value='$value' class='form-control' required />
			</div>";
} 
 function getCity_of_publicationFormField($value = ''){
	return "<div class='form-group'>
				<label for='city_of_publication'>City Of Publication</label>
				<input type='text' name='city_of_publication' id='city_of_publication' value='$value' class='form-control' required />
			</div>";
} 
 function getPublish_company_nameFormField($value = ''){
	return "<div class='form-group'>
				<label for='publish_company_name'>Publish Company Name</label>
				<input type='text' name='publish_company_name' id='publish_company_name' value='$value' class='form-control' required />
			</div>";
} 
 function getTotal_no_pagesFormField($value = ''){
	return "<div class='form-group'>
				<label for='total_no_pages'>Total No Pages</label>
				<input type='number' name='total_no_pages' id='total_no_pages' value='$value' class='form-control' required />
			</div>";
} 
 function getIsbn_noFormField($value = ''){
	return "<div class='form-group'>
				<label for='isbn_no'>Isbn No</label>
				<input type='text' name='isbn_no' id='isbn_no' value='$value' class='form-control' required />
			</div>";
} 
 function getCountry_publishFormField($value = ''){
	return "<div class='form-group'>
				<label for='country_publish'>Country Publish</label>
				<input type='text' name='country_publish' id='country_publish' value='$value' class='form-control' required />
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