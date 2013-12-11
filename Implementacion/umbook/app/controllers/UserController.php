<?php

class UserController extends Controller{
	
	public $_UserDao; 
	
	
	public function __construct(){
		parent::__construct();
		
		$this->loadModel('User');
		require_once DAOS_PATH . 'UserDao.php';
		
		$this->_UserDao = new UserDao();
	
		if(!$User = Session::get('User')){
			$this->redirect('');
		}
	}
	
	public function index(){
		
		$this->mostrarDatos();
	}
	
	
	private function mostrarDatos(){
		$this->_User = new UserModel();
		$this->_User = $this->_UserDao->load(Session::get('id'));		
		$this->_view->_User = $this->_User;
		$this->_view->Title = "Configuracion general de su cuenta";
		$this->_view->renderView('index');
		exit;
	}
	
	public function setPass(){
		$this->_view->Title = "Cambiar clave";
		$this->_view->renderView('clave');
		exit;
	}
	
	public function guardarClave(){
		if($_POST){
			$this->_User = new UserModel();
			$this->_User = $this->_UserDao->load(Session::get('id'));
			$clave = $_POST['claveactual']; 
			$pass1 = $_POST['pass1'];
			$pass2 = $_POST['pass2'];
			
			if($pass1==$pass2 && $clave == $this->_User->pass  && strlen($pass1)>0 ){
				
				$this->_User->pass = $pass1;
				if($this->_UserDao->setPass($this->_User)){
					
					$this->_view->Title = "Cambiar password";
					$this->_view->mensaje = "Su password fue guardado correctamente.";
					$this->_view->renderView('clave');
					exit;
				}
			}
			else {
				$this->_view->Title = "Cambiar password";
				$this->_view->mensaje = "Verifique sus datos";
				$this->_view->renderView('clave');
				exit;
			}
				
		}
		
		$this->_view->Title = "Usted no deberia estar aqui";
		$this->_view->renderView('estado');
		exit;
	}
	
	
	public function guardar(){
		
		if($_POST){
			$this->_User = new UserModel();
			$this->_User->setUser($_POST['user']);

				if($this->_UserDao->savePerfil($this->_User)){
				$this->_view->_User = $this->_User;
				$this->_view->Title = "Configuracion general de su cuenta";
				$this->_view->mensaje = "Los cambios se guardaron correctamente";
				$this->_view->renderView('index');
				exit;
			}
			
		}
		
		$this->_view->Title = "Usted no deberia estar aqui";
		$this->_view->renderView('estado');
		exit;
	}
	
}

?>