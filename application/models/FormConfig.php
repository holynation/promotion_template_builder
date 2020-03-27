<?php 
/**
* this class help save the configuration needed by the form in order to use a single file for all the form code.
* you only need to include the configuration data that matters. the default value will be substituted for other configuration value that does not have a key  for a particular entity.
*/
class FormConfig extends CI_Model
{
	private  $insertConfig;
	private $updateConfig;
	public $currentRole;
	
	function __construct($currentRole=false)
	{
		$this->currentRole=$currentRole;
		if ($currentRole) {
			$this->buildInsertConfig();
			$this->buildUpdateConfig();
		}
		
	}
	public function getDepartmentQuery()
	{
		$roleDepartment=$this->currentRole->getDepartment(true);
		$qTemp=false;
		  if ($roleDepartment) {
		   $qTemp= combineForInQuery(fetchField($roleDepartment,'department_id'));
		  }
		  return $qTemp?((isset($_GET['faculty'])&& $_GET['faculty'])?"select id,department_name as value from department where department.faculty_ID='{$_GET['faculty']}' and department.id in $qTemp ":false):((isset($_GET['faculty'])&& $_GET['faculty'])?"select id,department_name as value from department where department.faculty_ID='{$_GET['faculty']}'":false);
	}
	private function alternateAction(){
		$action = array();
		$userType = $this->webSessionManager->getCurrentUserProp('user_type');
		if($userType == 'lecturer'){
			$action = array('edit' => 'edit/lecturer','profile' => 'vc/lecturer/profile');
		}else{
			$action = array('enable'=>'getEnabled','edit' => 'edit/lecturer','delete' => 'delete/lecturer','profile'=>'vc/lecturer/profile','print report'=>'vc/lecturer/printApp');
		}
		return $action;
	}

	/**
	 * this is the function to change when an entry for a particular entitiy needed to be addded. this is only necessary for entities that has a custom configuration for the form.Each of the key for the form model append insert option is included. This option inculde:
	 * form_name the value to set as the name and as the id of the form. The value will be overridden by the default value if the value if false.
	 * has_upload this field is used to determine if the form should include a form upload section for the table form list
	 * hidden this  are the field that should be pre-filled. This must contain an associative array where the key of the array is the field and the value is the value to be pre-filled on the value.
	 * showStatus field is used to show the status flag on the form. once the value is true the status field will be visible on the form and false otherwise.
	 * exclude contains the list of entities field name that should not be shown in the form. The filed for this form will not be display on the form.
	 * submit_label is the label that is going to be displayed on the submit button
	 * 	table_exclude is the list of field that should be removed when displaying the table.
	 * table_action contains an associative arrays action to be displayed on the action table and the link to perform the action.
	 * the query paramete is used to specify a query for getting the data out of the entity
	 * upload_param contains the name of the function to be called to perform
	 * 
	 */ 
	private function buildInsertConfig()
	{
		$this->insertConfig= array
		(
			'lecturer'=>array
			(
				'table_exclude'=>array('img_path','disability','status'),
				'table_action' => $this->alternateAction(),
				'submit_label' => 'Save',
				'table_title' => 'Lecuturer Table',
				'search'=>array('firstname','surname','middlename','email','staff_no'),
				'show_status' => true,
				'query' => 'select distinct lecturer.ID,title_name,staff_no,surname,firstname,middlename,maiden_name,faculty_name,department_name,email,phone_number,dob as date_of_birth,gender,marital_status,address,state_of_origin,lga_of_origin,religion,nationality,img_path,disability,lecturer.status from lecturer left join department on department.id = lecturer.department_id left join faculty on faculty.id=department.faculty_id left join title on title.id = lecturer.title_id'
			),
			'academic_appointment' => array
			(
				'table_exclude'=> array('date_created','status')
			),
			'admin'=>array
			(
				'table_title' => 'Admin Table',
				'show_status' => true
			),
			'role'=>array(
				'query'=>'select * from role where ID<>1'
			),
			'faculty' => array
			(
				'exclude' => array('date_created')
			),
			'scholarships' =>array
			(
				'page_hint' => 'This page is for Scholarships, Fellowships and Prizes (with dates) in respect of Undergraduate and Postgraduate work only',
				'form_hint' => 'Please enter your information in a chronological order'
			),
			'book_published' =>array
			(
				'form_hint' => 'Names must be in the same orders as in the book.',
				'showAppendForm' => true,
				'asterisk_info' => true,
				'removeMultipleCheckbox' => true
			),
			'chapter_in_book_published' => array
			(
				'table_action' => array('delete' => 'delete/chapter_in_book_published', 'edit' => 'edit/chapter_in_book_published'),
				'showAppendForm' => true,
				'asterisk_info' => true,
				'removeMultipleCheckbox' => true
			),
			'article_in_conference' => array
			(
				// 'table_action' => array('editor' => 'extra/editors/article_in_conference','delete' => 'delete/article_in_conference', 'edit' => 'edit/article_in_conference')
				'table_action' => array('delete' => 'delete/article_in_conference', 'edit' => 'edit/article_in_conference'),
				'page_hint' => 'This page is for Articles that have Already Appeared in Refereed Conference Proceedings',
				'showAppendForm' => true,
				'asterisk_info' => true,
				'removeMultipleCheckbox' => true
			),
			'article_appear_in_journal' => array
			(
				'page_hint' => 'This page is for Articles that have already appeared in learned journals',
				'showAppendForm' => true,
				'asterisk_info' => true,
				'removeMultipleCheckbox' => true
			),
			'accepted_books' => array
			(
				'page_hint' => 'This page is for Books, Chapters in Books and Articles Already Accepted for Publication',
				'showAppendForm' => true,
				'asterisk_info' => true,
				'removeMultipleCheckbox' => true
			),
			'technical_report' => array
			(
				'page_hint' => 'This page is for Technical Reports and Monographs',
				'showAppendForm' => true,
				'asterisk_info' => true,
				'removeMultipleCheckbox' => true
			),
			'major_conf_attended' => array
			(
				'page_hint' => 'This page is for Major Conferences Attended with Papers Read (in the last 5 years):'
			),
			'editors'=>array
			(
				'table_exclude' => array('publish_table_key')
			)
		//add new entry to this array
		);
	}

	private function getFilter($tablename)
	{
		$result= array(
			'lecturer'=>array
			(
				array(
					'filter_label'=>'department.ID',
					'preload_query'=>"select id,department_name as value from department ",
					'filter_display'=>'department'
				),
			)
		);

		if (array_key_exists($tablename, $result)) {
			return $result[$tablename];
		}
		return false;
	}
	/**
	 * This is the configuration for the edit form of the entities.
	 * exclude take an array of fields in the entities that should be removed from the form.
	 */
	private function buildUpdateConfig()
	{
		$this->updateConfig= array
		(
		'lecturer'=>array
			(
				'exlude'=>array()		
			),
		//add new entry to this array
		);
	}
	function getInsertConfig($entities)
	{
		if (array_key_exists($entities, $this->insertConfig)) {
			$result=$this->insertConfig[$entities];
			if (($fil=$this->getFilter($entities))) {
				$result['filter']=$fil;
			}
			return $result;
		}
		if (($fil=$this->getFilter($entities))) {
			return array('filter'=>$fil);
		}
		return false;
	}

	function getUpdateConfig($entities)
	{
		if (array_key_exists($entities, $this->updateConfig)) {
			$result=$this->updateConfig[$entities];
			if (($fil=$this->getFilter($entities))) {
				$result['filter']=$fil;
			}
			return $result;
		}
		if (($fil=$this->getFilter($entities))) {
			return array('filter'=>$fil);
		}
		return false;
	}
}
 ?>