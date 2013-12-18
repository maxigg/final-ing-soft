<?php 
class WallController extends Controller{
	
	public function __construct(){
		parent::__construct();
		
		if(!$user = Session::getSessionVariable('User')){
			$this->redirect('');
		}
		
	}
	
	public function index(){
		$this->objView->strTitle = APP_NAME;
		$this->objView->renderView('index');
	}
	
}
?>