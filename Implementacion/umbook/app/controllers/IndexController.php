<?php

class IndexController extends Controller {
	
	public function __construct(){
		error_log(__METHOD__);
        parent::__construct();
	}
	
	public function index(){

		$this->objUser = Session::getSessionVariable('objUser');
		
		if( isset($this->objUser) )
			$this->redirect('user');

		$this->objView->arrayErrors = array();
		$this->objView->renderView('index');
	}
}

?>