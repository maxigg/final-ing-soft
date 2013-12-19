<?php

class IndexController extends Controller{
	
	public function __construct(){
		error_log( __FILE__  ." >  > ".__METHOD__);
        parent::__construct();
	}
	
	public function index(){
		$this->objView->strTitle = "Login Umbook";
		$this->objView->arrayErrors = array();
		$this->objView->renderView('index');
	}
}

?>