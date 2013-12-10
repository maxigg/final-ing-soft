<?php

class LoginController extends Controller{


	private $objUsuario;

	public function __construct(){
		parent::__construct();
		$this->objUsuario = $this->loadModel('usuario');
	}
	
	public function index(){}

	public function validarUsuario(){
		$errores = array();
		if($_POST){
			$this->objUsuario->setLogin($_POST['user'], $_POST['pass']);
			if(!$this->esCadena($this->objUsuario->user))
				$errores['user'] = 'Porfavor introduzca un usuario valido';
			if(!$this->esCadena($this->objUsuario->pass))
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
		require_once(HELPERS_PATH."daos". DS ."UsuarioDAO.php");
		$objUsuarioDao = new UsuarioDAO();
		if(! $this->id = $objUsuarioDao->checkLogin($this))
			return false;
		Session::set('autenticado', true);
		Session::set('usuario', $this->user);
		Session::set('id', (int)$this->id);
		return true;
	}

	public function cerrarSesion(){
		Session::destroy();
		$this->redireccionar('');
	}

	public function mostrarInicio(){
		$this->redireccionar('inicio');
	}

	public function error($errores = array()){
		$this->objView->strTitulo = "Error en el login";
		$this->objView->arrayErrores = $errores;
		$this->objView->objUsuario = $this->objUsuario;
		$this->objView->armaPathParaCargarView('errorLogin');
	}

}