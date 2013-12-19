<?php 
class WallController extends Controller{
	
	public $objPublicationDao; 
	

	public function __construct(){
		parent::__construct();
		
		if(!$user = Session::getSessionVariable('User')){
			$this->redirect('');
		}

		require_once DAOS_PATH ."PublicationDAO.php";
		
		$this->objPublicationDao = new PublicationDAO();
		
	}
	
	public function index(){
		$id = Session::getSessionVariable('id');
		$wall = array();

		$wall = $this->objPublicationDao->getPublications($id);
		$this->objView->publications = $wall;

		$this->objView->strTitle = APP_NAME;
		$this->objView->renderView('index');
	}
	
}
?>