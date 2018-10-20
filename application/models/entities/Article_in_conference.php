<?php 
defined("BASEPATH") OR exit("No direct script access allowed");
	require_once("application/models/Crud.php");

	/**
	* This class  is automatically generated based on the structure of the table. And it represent the model of the article_in_conference table.
	*/ 

class Article_in_conference extends Crud {

protected static $tablename = "Article_in_conference"; 
/* this array contains the field that can be null*/ 
static $nullArray = array('end_date','date_created','editor_names');
static $compositePrimaryKey = array();
static $uploadDependency = array();
/*this array contains the fields that are unique*/ 
static $displayField = '';// this display field properties is used as a column in a query if a their is a relationship between this table and another table.In the other table, a field showing the relationship between this name having the name of this table i.e something like this. table_id. We cant have the name like this in the table shown to the user like table_id so the display field is use to replace that table_id.However,the display field name provided must be a column in the table to replace the table_id shown to the user,so that when the other model queries,it will use that field name as a column to be fetched along the query rather than the table_id alone.;
static $uniqueArray = array();
/* this is an associative array containing the fieldname and the type of the field*/ 
static $typeArray = array('lecturer_id' => 'int','author_names' => 'varchar','editor_names' => 'varchar','year_publish'=>'varchar','article_title' => 'varchar','conference_theme' => 'varchar','name_of_proceedings' => 'varchar','start_date' => 'varchar','end_date' => 'varchar','month' => 'varchar','year_of_conference' => 'varchar','city_publish' => 'varchar','publishing_company' => 'varchar','page_range' => 'varchar','country' => 'varchar','contribution' => 'varchar','date_created' => 'timestamp');
/*this is a dictionary that map a field name with the label name that will be shown in a form*/ 
static $labelArray = array('ID' => '','lecturer_id' => '','author_names' => '','editor_names' => '','year_publish' => '','article_title' => '','conference_theme' => '','name_of_proceedings' => '','start_date' => '','end_date' => '','month' => '','year_of_conference' => '','city_publish' => '','publishing_company' => '','page_range' => '','country' => '','contribution' => 'Contribution(%)','date_created' => '');
/*associative array of fields that have default value*/ 
static $defaultArray = array('date_created' => 'current_timestamp()');
 // populate this array with fields that are meant to be displayed as document in the format array("fieldname"=>array("filetype","maxsize",foldertosave","preservefilename"))
//the folder to save must represent a path from the basepath. it should be a relative path,preserve filename will be either true or false. when true,the file will be uploaded with it default filename else the system will pick the current user id in the session as the name of the file.
static $documentField = array(); //array containing an associative array of field that should be regareded as document field. it will contain the setting for max size and data type.;
static $relation = array('lecturer' => array('lecturer_id','id')
);
static $tableAction = array('delete' => 'delete/article_in_conference', 'edit' => 'edit/article_in_conference');
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
 function getEditor_namesFormField($value = ''){
	return "<div class='form-group'>
				<label for='editor_names'>Editor Names (e.g Babajide, A.A. and Otuoke, S.K.)</label>
				<textarea name='editor_names' id='editor_names' class='form-control' placeholder='please list all the names of editor separated by commas'>$value</textarea>
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
 function getYear_of_conferenceFormField($value = ''){
	$result = "<div class='form-group'>
				<label for='year_of_conference'>Year of Conference</label>";
				$option = getDropDownYear($value);
	$result.="<select name='year_of_conference' id='year_of_conference' class='form-control' required>
			<option value=''>..choose....</option>
				$option
			</select>";
	$result.="</div>";
	return $result;
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
				<label for='page_range'>Page in Range</label>
				<input type='text' name='page_range' id='page_range' value='$value' class='form-control' placeholder='e.g: 23-45' required />
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
