<?php

class IndexController extends Controller{
	
	public function __construct(){
		error_log( __FILE__  ." >  > ".__METHOD__);
        parent::__construct();
	}
	
	public function index(){
		$this->objView->strTitulo = "Login Umbook";
		$this->objView->armaPathParaCargarView('index');
	}


	public function iniciarSesion(){
		
		$objUsuarioDao = new UsuarioDao();
		if(! $this->id = $objUsuarioDao->checkLogin($this))
			return false;
		Session::set('autenticado', true);
		Session::set('usuario', $this->user);
		Session::set('id', (int)$this->id);
		return true;
	}
	
	public function registrar(){	
		$objUsuarioDao = new UsuarioDao();	
		if(!$objUsuarioDao->create($this))
				return false;
		return true;
	}
	
}

?>