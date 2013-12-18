<?php

class LoginController extends Controller{


	private $objUser;

	public function __construct(){
		parent::__construct();
		$this->objUser = $this->objLoadModel('User');
	}
	
	public function index(){}

	public function validateUser(){
		$errors = array();
		if($_POST){
			$this->objUser->setStrUser($_POST['user']);
			$this->objUser->setstrPassword($_POST['password']);
			if(!$this->isString($this->objUser->getStrUser()))
				$errors['user'] = 'Por favor introduzca un usuario valido';
			if(!$this->isString($this->objUser->getStrPassword()))
				$errors['password'] = 'Por favor introduzca una contraseña valida';
			if(count($errors))
				$this->error($errors);  //Carga la interfaz formulario error

			if($this->login())
				$this->showWall();
			else{
				$this->error();
			}
		}

	} //REQUEST

	public function login(){
		require_once(DAOS_PATH ."UserDAO.php");
		$objUserDao = new UserDAO();
		if(! $this->id = $objUserDao->checkLogin($this->objUser))
			return false;
		Session::setSessionVariable('autenticate', true);
		Session::setSessionVariable('User', $this->objUser->getStrUser());
		Session::setSessionVariable('id', (int)$this->id);
		return true;
	}

	public function logout(){
		Session::destroySession();
		$this->redirect('');
	}

	public function showWall(){
		$this->redirect('wall');
	}

	public function error($errors = array()){
		$this->objView->strTitle = "Error en el login";
		$this->objView->arrayErrors = $errors;
		$this->objView->objUser = $this->objUser;
		$this->objView->renderView('errorLogin');
	}

}