<?php

class LoginController extends Controller {

	private $objUser;
	private $objUserDao;
	//private $objFriendDao;

	public function __construct(){
		error_log(__METHOD__);
		parent::__construct();

		$this->objUser = $this->objLoadModel('User');
		require_once(DAOS_PATH ."UserDAO.php");
		$this->objUserDao = new UserDAO();
	}
	
	public function index(){
		$this->redirect('');
		//$this->objView->renderView('index');
	}	

	public function register(){
		//print_r($_POST);

		$errors = array();
		$this->objView->arrayErrors = $errors;
		if($_POST){
			$this->objUser->setUserModel();
			if(!$this->isString($this->objUser->getStrName()))
				$errors['name'] = 'Por favor introduzca un nombre valido';
			if(!$this->isString($this->objUser->getStrLastName()))
				$errors['lastname'] = 'Por favor introduzca un apellido valido';
			if(!$this->isString($this->objUser->getStrEmail()))
				$errors['email'] = 'Por favor introduzca una direccion de correo valido';
			if(!$this->isString($this->objUser->getStrUser()))
				$errors['userR'] = 'Por favor introduzca un usuario valido';
			if(!$this->isString($this->objUser->getStrPassword()))
				$errors['passwordR'] = 'Por favor introduzca una contraseña valida';
			//if(!$this->isString($this->objUser->getStrBirthday()))
			//	$errors['birthday'] = 'Por favor introduzca una fecha valida';
			
			/*
			if(!$this->objUserDao->checkEmail($this->objUser)){
				$this->objView->registerStrMessage = "El email esta asociado a una cuenta";
				$this->objView->renderView('index');
				return;
			}*/

			if(count($errors)){
				$this->objView->arrayErrors = $errors;
				$this->objView->registerStrMessage = "Verifique los Datos";
				$this->objView->renderView('index');
				return;
			}

			if(1 == $this->objUserDao->create($this->objUser)){				
				$this->objView->registerStrMessage = "Complete el formulario de Login";
				$this->objView->renderView('index');
			}else{
				$this->objView->registerStrMessage = "Intentelo Nuevamente más tarde";
				$this->objView->renderView('index');
			}
			return;
		}
		$this->redirect('');
		//$this->objView->renderView('index');
	}

	public function validateUser(){
		$errors = array();
		$this->objView->arrayErrors = $errors;
		$strMessage = '';
		$this->objView->loginStrMessage = $strMessage;
		if($_POST){

			if(!$this->isString($_POST['userL']))
				$errors['userL'] = 'Por favor introduzca un usuario valido';
			if(!$this->isString($_POST['passwordL']))
				$errors['passwordL'] = 'Por favor introduzca una contraseña valida';
			
			$this->objUser->setStrUser($_POST['userL']);
			$this->objUser->setstrPassword($_POST['passwordL']);

			if(count($errors)){		// Error if user or password are empty or ilegal
				$this->objView->arrayErrors = $errors;
				$this->objView->loginStrMessage = 'Verifique los Datos';
				$this->objView->renderView('index');
				return;
			}
			if($this->login()){		// If login returns true then shows the "wall"
				$this->redirect('wall');
			}else{					// Error if user or password are wrong
				$this->objView->loginStrMessage = 'Usuario o Password Incorrectos!';
				$this->objView->renderView('index');
				
			}
			return;
		}
		$this->redirect('');
		//$this->objView->renderView('index');
	}

	public function logout(){
		error_log(__METHOD__);
		Session::destroySession();
		$this->redirect('Index');
	}

/*****************HELPERS**********************/

	private function login(){

		if(!$result = $this->objUserDao->checkLogin($this->objUser)){
			return false;
		}
		Session::setSessionVariable('objUser', $this->objUser);
		//print_r(Session::getSessionVariable('objUser'));die();
		return true;
		
		/*                   LOADING THE SESSION IS NOT EFFICIENT !!!!!!!!!!!
		//FRIENDS
		require_once(DAOS_PATH ."FriendDAO.php");
		$this->objFriendDao = new FriendDAO(); 
		$result = $this->objFriendDao->getFriendsId($objUser);
		if(false != $result){
			$friends = array();
			$id = $objUser->getIntId();
			foreach($result as $friend){
				if($friend[0] == $id)
					array_push($friends, $friend[1]);
				else
					array_push($friends, $friend[0]);
			}
//************************************************************cambiar UsserModel		
			$result = $this->objFriendDao->getFriends($friends);
			if(false != $result){
				$friends = array();
				$friend = new UserModel();
				foreach ($result as $value) {
					$friend->setIntId($value['id']);
					$friend->setStrUser($value['user']);
					$friend->setStrName($value['name']);
					$friend->setStrLastName($value['last_name']);
					$friend->setStrPathPhoto($value['path_photo']);
					array_push($friends, $friend);
					$friend = new UserModel();
				}
				$this->objUser->setArrayObjFriends($friends);
				//print_r($this->objUser);die();
				Session::setSessionVariable('objUser', $this->objUser);
			}
		}

		//SENT REQUESTS
		$result = $this->objFriendDao->getSentRequests($this->objUser);
		if(false != $result){	
			$requests = array();
			$request = new UserModel();	
			foreach ($result as $value) {
				$request->setIntId($value['id']);
				$request->setStrUser($value['user']);
				$request->setStrName($value['name']);
				$request->setStrLastName($value['last_name']);
				$request->setStrPathPhoto($value['path_photo']);
				array_push($requests, $request);
				$request = new UserModel();
			}
			$this->objUser->setArrayObjRequests($requests);
			Session::setSessionVariable('objUser', $this->objUser);
		}
		//print_r(Session::getSessionVariable('objUser'));die();
		*/
		
	}

/*****************HELPERS**********************/

}