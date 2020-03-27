<?php 
/**
* This is the class that manages all information and data retrieval needed by the admin section of this application.
*/
class AdminData extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->loadAdmin();
	}

	private function loadAdmin()
	{
		$id = $this->webSessionManager->getCurrentUserProp('user_table_id');
		loadClass($this->load,'admin');
		$this->lecturer = new Admin(array('ID'=>$id));
		$this->lecturer->load();
	}

	public function loadDashboardData()
	{
		$result = array();
		$result['users'] = $this->admin->getDasboardCount('lecturer','lect_total');
		$result['scholarship'] = $this->admin->getDasboardCount('scholarships','sch_total');
		$result['department'] = $this->admin->getDasboardCount('department','depart_total');
		$result['publication'] = $this->admin->getPublicationCount();

		// this is to get the publication data chart
		$result['book_data'] = $this->admin->getPublicationData('book_published');
		$result['cbp_data'] = $this->admin->getPublicationData('chapter_in_book_published');
		$result['ac_data'] = $this->admin->getPublicationData('article_in_conference');
		$result['pc_data'] = $this->admin->getPublicationData('patents_copyright');
		$result['aaj_data'] = $this->admin->getPublicationData('article_appear_in_journal');
		$result['ab_data'] = $this->admin->getPublicationData('accepted_books');
		$result['tr_data'] = $this->admin->getPublicationData('technical_report');
		$jsonArray = array_merge($result['book_data'],$result['cbp_data'],$result['ac_data'],$result['pc_data'],$result['aaj_data'],$result['ab_data'],$result['tr_data']);

		$result['buildDataJson'] = json_encode($jsonArray);

		return $result;
	}

	public function getAdminSidebar()
	{
		loadClass($this->load,'role');
		$role = new Role();
		return $role->getModules();
	}
	public function getCanViewPages($role)
	{
		$result =array();
		$allPages =$this->getAdminSidebar();
		$permissions = $role->getPermissionArray();
		foreach ($allPages as $module => $pages) {
			$has = $this->hasModule($permissions,$pages,$inter);
			$allowedModule =$this->getAllowedModules($inter,$pages['children']);
			$allPages[$module]['children']=$allowedModule;
			$allPages[$module]['state']=$has;
		}
		return $allPages;
	}

	private function getAllowedModules($includesPermission,$children)
	{
		$result = $children;
		$result=array();
		foreach ($children as $key=>$child) {
			if (in_array($child, $includesPermission)) {
				$result[$key]=$child;
			}
		}
		return $result;
	}

	private function hasModule($permission,$module,&$res)
	{
		$res =array_intersect(array_keys($permission), array_values($module['children']));
		if (count($res)==count($module['children'])) {
			return 2;
		}
		if (count($res)==0) {
			return 0;
		}
		else{
			return 1;
		}

	}

}

 ?>