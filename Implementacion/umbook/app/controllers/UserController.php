<?php

class UserController extends Controller
{
	
	private $objUser;
	public $objUserDao; 
	
	
	public function __construct(){
		parent::__construct();
		
		$this->objUser = $this->objLoadModel('User');
		require_once DAOS_PATH ."UserDAO.php";
		$this->objUserDao = new UserDAO();
	}
	
	public function index(){
		
		$this->showUserData();
	}
	
	
	private function showUserData(){
		$this->objUser = $this->objUserDao->load(Session::getSessionVariable('id'));		
		$this->objView->objUser = $this->objUser;
		$this->objView->strTitle = "Configuracion general de su cuenta";
		$this->objView->renderView('index');
		exit;
	}
			

	public function Register(){
		$errors = array();
		if($_POST){
			$this->objUser->setUserModel();
			if(!$this->isString($this->objUser->getStrName()))
				$errors['name'] = 'Por favor introduzca un nombre valido';
			if(!$this->isString($this->objUser->getStrLastName()))
				$errors['lastname'] = 'Por favor introduzca un apellido valido';
			if(!$this->isString($this->objUser->getStrEmail()))
				$errors['email'] = 'Por favor introduzca una direccion de correo valido';
			if(!$this->isString($this->objUser->getStrUser()))
				$errors['user'] = 'Por favor introduzca un usuario valido';
			if(!$this->isString($this->objUser->getStrPassword()))
				$errors['password'] = 'Por favor introduzca una contraseña valida';
			if(!$this->isString($this->objUser->getStrBirthday()))
				$errors['birthday'] = 'Por favor introduzca una fecha valida';
			if($this->objUserDao->create($this->objUser)){
				$this->objView->objUser = $this->objUser;
				$this->objView->strTitle = "Configuracion general de su cuenta";
				if(count($errors)){
					$this->objView->arrayErrors = $errors; //Carga la interfaz formulario error
					$this->objView->strMessage = "Los cambios  no se guardaron correctamente";
					$this->redirect('wall');
				}
				Session::setSessionVariable('autenticate', true);
				Session::setSessionVariable('User', $this->objUser->getStrUser());
				Session::setSessionVariable('id', (int)$this->objUserDao->lastInsertId());
				$this->objView->renderView('index');
				exit;
			}	
		}
	}
	
	public function editPassword(){
		$this->objView->strTitle = "Cambiar clave";
		$this->objView->renderView('password');
		exit;
	}
	
	public function updatePassword(){
		if($_POST){
			$this->objUser = $this->objUserDao->load(Session::getSessionVariable('id'));
			$password = $_POST['password']; 
			$password1 = $_POST['password1'];
			$password2 = $_POST['password2'];
			if($password1==$password2 && $password == $this->objUser->strPassword  && strlen($password1)>0 ){
				$this->objUser->strPassword = $password1;
				if($this->objUserDao->setStrPassword($this->objUser)){
					$this->objView->strTitle = "Cambiar password";
					$this->objView->strMessage = "Su password fue guardado correctamente.";
					$this->objView->renderView('clave');
					exit;
				}
			}else{
				$this->objView->strTitle = "Cambiar password";
				$this->objView->strMessage = "Verifique sus datos";
				$this->objView->renderView('password');
				exit;
			}		
		}
	}
	
	
	public function updateUserData(){
		
		if($_POST){
			$this->objUser->setUser($_POST['user']);

				if($this->objUserDao->updateProfile($this->objUser)){
				$this->objView->objUser = $this->objUser;
				$this->objView->strTitle = "Configuracion general de su cuenta";
				$this->objView->strMessage = "Los cambios se guardaron correctamente";
				$this->objView->renderView('index');
				exit;
			}
			
		}
	}

	public function searchUsers(){
		if($_POST){
			require_once DAOS_PATH ."FriendDAO.php";
			$this->objFriendDao = new FriendDAO();
			$arrayObjUserSearch = $this->objUserDao->getUsers($_POST['search']);
			$arrayFlagsId = array();
			$i=0;
			$arrayFlagsId[$i] = 0;
			foreach ($arrayObjUserSearch as $UserSearch) {
				$arrayFriendsId = $this->objFriendDao->getFriendsId(Session::getSessionVariable('id'));
				foreach ($arrayFriendsId as $FriendsId) {
					if(($FriendsId[0] == $UserSearch->intId) || ($FriendsId[1] == $UserSearch->intId)){
						$arrayFlagsId[$i] = 2;
					}
				}
				$arrayFriendsRequestId = $this->objFriendDao->getFriendsRequestId(Session::getSessionVariable('id'));
				foreach ($arrayFriendsRequestId as $FriendsRequestId) {
					if(($FriendsRequestId[0] == $UserSearch->intId) || ($FriendsRequestId[1] == $UserSearch->intId)){
						if($arrayFlagsId[$i]!=2)
							$arrayFlagsId[$i] = 1;
					}
				}
				$i++;
			}
			$this->objView->strTitle = "Lista de Usuarios";
			$intCount = count($arrayObjUserSearch);
			if($intCount>0){
				$this->objView->strMessage = "Se encontraron: ".$intCount." coincidencias";
			}else{
				$this->objView->strMessage = "No se encontraron coincidencias";
			}
			$this->objView->flagsId = $arrayFlagsId;
			$this->objView->usersList = $arrayObjUserSearch;
			$this->objView->renderView('usersList');
			exit;
		}
	}
	
}

?>