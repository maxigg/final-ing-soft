<?php 
class WallController extends Controller{
	
	private $objPublication;
	public $objPublicationDao; 

	public function __construct(){
		parent::__construct();
		
		if(!$user = Session::getSessionVariable('User')){
			$this->redirect('');
		}

		/* ------------------------------------------------
		$this->objUser = $this->objLoadModel('User');
		require_once DAOS_PATH ."UserDAO.php";
		$this->objUserDao = new UserDAO();
		*/
		
	}
	
	public function index(){
		$this->objView->strTitle = APP_NAME;
		$this->objView->renderView('index');
	}
	
}
?>