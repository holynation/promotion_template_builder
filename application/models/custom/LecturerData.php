<?php 
/**
* This is the class that manages all information and data retrieval needed by the student section of this application.
*/
class LecturerData extends CI_Model
{
	private $lecturer;

	function __construct()
	{
		parent::__construct();
		//load the lecturer object
		$this->loadLecturer();
	}

	private function loadLecturer()
	{
		$id = $this->webSessionManager->getCurrentUserProp('user_table_id');
		loadClass($this->load,'lecturer');
		$this->lecturer = new Lecturer(array('ID'=>$id));
		$this->lecturer->load();
	}

	public function loadDashboardData()
	{
		return array();
	}

	public function loadAllData(){
		$result = array();
		$result['lecturers'] = $this->lecturer->getBiodata();
		$result['appointment'] = $this->lecturer->getAcademicAppoint();
		$result['education'] = $this->lecturer->getFromDbClass('university_education','order by start_date asc');
		$result['qualification'] = $this->lecturer->getFromDbClass('qualifications','order by date_granted asc');
		$result['professional'] = $this->lecturer->getFromDbClass('professional_qualifications','order by date_granted asc');
		$result['scholarships'] = $this->lecturer->getFromDbClass('scholarships','order by start_date asc');
		$result['honours'] = $this->lecturer->getFromDbClass('honours_distinctions','order by date_awarded asc');
		$result['memberships'] = $this->lecturer->getFromDbClass('memberships','order by start_date asc');
		$result['experiences'] = $this->lecturer->getFromDbClass('work_experience','order by start_date asc');
		$result['teachings'] = $this->lecturer->getFromDbClass('teaching_experience','order by course_code asc');
		$result['supervision'] = $this->lecturer->getFromDbClass('research_supervision','order by category asc');
		$result['research_com'] = $this->lecturer->getFromDbClass('research_completed','order by topic_name asc');
		$result['research_in'] = $this->lecturer->getFromDbClass('research_inprogress','order by topic_name asc');
		$result['project_thesis'] = $this->lecturer->getFromDbClass('project_thesis_dissertation','order by year_research asc');

		return $result;
	}

}

 ?>