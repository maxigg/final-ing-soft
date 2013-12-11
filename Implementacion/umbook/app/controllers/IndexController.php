<?php

class IndexController extends Controller{
	
	public function __construct(){
		error_log( __FILE__  ." >  > ".__METHOD__);
        parent::__construct();
	}
	
	public function index(){
		$this->objView->strTitle = "Login Umbook";
		$this->objView->renderView('index');
	}


	public function iniciarSesion(){
		
		$objUserDao = new UserDao();
		if(! $this->id = $objUserDao->checkLogin($this))
			return false;
		Session::set('autenticado', true);
		Session::set('User', $this->user);
		Session::set('id', (int)$this->id);
		return true;
	}
	
	public function registrar(){	
		$objUserDao = new UserDao();	
		if(!$objUserDao->create($this))
				return false;
		return true;
	}
	
}

?>