<?php

class UsuarioController extends Controller{
	
	public $_usuarioDao; 
	
	
	public function __construct(){
		parent::__construct();
		
		$this->loadModel('usuario');
		require_once ROOT . 'dao' . DS . 'usuarioDao.php';
		
		$this->_usuarioDao = new usuarioDao();
	
		if(!$usuario = Session::get('usuario')){
			$this->redireccionar('');
		}
	}
	
	public function index(){
		
		$this->mostrarDatos();
	}
	
	
	private function mostrarDatos(){
		$this->_usuario = new usuarioModel();
		$this->_usuario = $this->_usuarioDao->load(Session::get('id'));		
		$this->_view->_usuario = $this->_usuario;
		$this->_view->titulo = "Configuracion general de su cuenta";
		$this->_view->renderizar('index');
		exit;
	}
	
	public function setPass(){
		$this->_view->titulo = "Cambiar clave";
		$this->_view->renderizar('clave');
		exit;
	}
	
	public function guardarClave(){
		if($_POST){
			$this->_usuario = new usuarioModel();
			$this->_usuario = $this->_usuarioDao->load(Session::get('id'));
			$clave = $_POST['claveactual']; 
			$pass1 = $_POST['pass1'];
			$pass2 = $_POST['pass2'];
			
			if($pass1==$pass2 && $clave == $this->_usuario->pass  && strlen($pass1)>0 ){
				
				$this->_usuario->pass = $pass1;
				if($this->_usuarioDao->setPass($this->_usuario)){
					
					$this->_view->titulo = "Cambiar password";
					$this->_view->mensaje = "Su password fue guardado correctamente.";
					$this->_view->renderizar('clave');
					exit;
				}
			}
			else {
				$this->_view->titulo = "Cambiar password";
				$this->_view->mensaje = "Verifique sus datos";
				$this->_view->renderizar('clave');
				exit;
			}
				
		}
		
		$this->_view->titulo = "Usted no deberia estar aqui";
		$this->_view->renderizar('estado');
		exit;
	}
	
	
	public function guardar(){
		
		if($_POST){
			$this->_usuario = new usuarioModel();
			$this->_usuario->setUser($_POST['user']);

				if($this->_usuarioDao->savePerfil($this->_usuario)){
				$this->_view->_usuario = $this->_usuario;
				$this->_view->titulo = "Configuracion general de su cuenta";
				$this->_view->mensaje = "Los cambios se guardaron correctamente";
				$this->_view->renderizar('index');
				exit;
			}
			
		}
		
		$this->_view->titulo = "Usted no deberia estar aqui";
		$this->_view->renderizar('estado');
		exit;
	}
	
}

?>