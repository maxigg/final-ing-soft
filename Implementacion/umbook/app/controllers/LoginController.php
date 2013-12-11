<?php

class LoginController extends Controller{


	private $objUser;

	public function __construct(){
		parent::__construct();
		$this->objUser = $this->loadModel('User');
	}
	
	public function index(){}

	public function validarUser(){
		$errores = array();
		if($_POST){
			$this->objUser->setLogin($_POST['user'], $_POST['pass']);
			if(!$this->esCadena($this->objUser->user))
				$errores['user'] = 'Porfavor introduzca un User valido';
			if(!$this->esCadena($this->objUser->pass))
				$errores['pass'] = 'Porfavor introduzca una password valida';
			if(count($errores))
				$this->error($errores);  //Carga la interfaz formulario error

			if($this->iniciarSesion())
				$this->mostrarInicio();
			else
				$this->error();
		}

	} //REQUEST

	public function iniciarSesion(){
		require_once(DAOS_PATH ."UserDAO.php");
		$objUserDao = new UserDAO();
		if(! $this->id = $objUserDao->checkLogin($this))
			return false;
		Session::set('autenticado', true);
		Session::set('User', $this->user);
		Session::set('id', (int)$this->id);
		return true;
	}

	public function cerrarSesion(){
		Session::destroy();
		$this->redirect('');
	}

	public function mostrarInicio(){
		$this->redirect('inicio');
	}

	public function error($errores = array()){
		$this->objView->strTitle = "Error en el login";
		$this->objView->arrayErrores = $errores;
		$this->objView->objUser = $this->objUser;
		$this->objView->renderView('errorLogin');
	}

}