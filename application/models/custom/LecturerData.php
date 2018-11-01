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
		$result = array();
		$result['qualification'] = $this->lecturer->getDasboardCount('qualifications','qualify_total');
		$result['scholarship'] = $this->lecturer->getDasboardCount('scholarships','sch_total');
		$result['conference'] = $this->lecturer->getDasboardCount('major_conf_attended','conf_total');
		$result['publication'] = $this->lecturer->getPublicationCount();

		$result['book_data'] = $this->lecturer->getPublicationData('book_published');
		$result['cbp_data'] = $this->lecturer->getPublicationData('chapter_in_book_published');
		$result['ac_data'] = $this->lecturer->getPublicationData('article_in_conference');
		$result['pc_data'] = $this->lecturer->getPublicationData('patents_copyright');
		$result['aaj_data'] = $this->lecturer->getPublicationData('article_appear_in_journal');
		$result['ab_data'] = $this->lecturer->getPublicationData('accepted_books');
		$result['tr_data'] = $this->lecturer->getPublicationData('technical_report');
		$jsonArray = array_merge($result['book_data'],$result['cbp_data'],$result['ac_data'],$result['pc_data'],$result['aaj_data'],$result['ab_data'],$result['tr_data']);

		$result['buildDataJson'] = json_encode($jsonArray);
		return $result;
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
		$result['community'] = $this->lecturer->getFromDbDuties('community_service','order by session_period asc');
		$result['administrative'] = $this->lecturer->getFromDbDuties('community_service','order by session_period asc','Administrative Duties');
		$result['project_thesis'] = $this->lecturer->getFromDbClass('project_thesis_dissertation','order by year_research asc');
		// this is where the publication section start
		$result['book_publish'] = $this->lecturer->getFromDbClass('book_published','order by year_of_publication asc');
		$result['chapters_books'] = $this->lecturer->getFromDbClass('chapter_in_book_published','order by year_of_publication asc');
		$result['article_conf'] = $this->lecturer->getFromDbClass('article_in_conference','order by year_publish asc');
		$result['patents'] = $this->lecturer->getFromDbClass('patents_copyright','order by patent_year asc');
		$result['article_journal'] = $this->lecturer->getFromDbClass('article_appear_in_journal','order by journal_year asc');
		$result['accepted_book'] = $this->lecturer->getFromDbClass('accepted_books','order by accepted_year asc');
		$result['tech_report'] = $this->lecturer->getFromDbClass('technical_report','order by report_year asc');
		$result['major_conf'] = $this->lecturer->getFromDbClass('major_conf_attended','order by year_attended asc');
		$check = $this->checkPublication($this->webSessionManager->getCurrentUserProp('user_table_id'));
		if($check){
			$result['exist_publication'] = 'bp_exists';
			$result['best_publish_bp'] = $this->lecturer->getBestPublication('book_published');
			$result['best_publish_cbp'] = $this->lecturer->getBestPublication('chapter_in_book_published');
			$result['best_publish_ac'] = $this->lecturer->getBestPublication('article_in_conference');
			$result['best_publish_aaj'] = $this->lecturer->getBestPublication('article_appear_in_journal');
			$result['best_publish_ab'] = $this->lecturer->getBestPublication('accepted_books');
			$result['best_publish_tr'] = $this->lecturer->getBestPublication('technical_report');
		}

		return $result;
	}

	private function checkPublication($id){
		$query = "SELECT count(*) as amount from best_publication where lecturer_id = ?";
		$result = $this->db->query($query,array($id));
		$result = $result->result_array();
		if($result[0]['amount'] > 0){
			return true;
		}else{
			return false;
		}
	}

}

 ?>