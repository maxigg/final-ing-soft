<?php


class UserController extends Controller {
	
	private $objUser;
	private $objUserDao; 
	private $objFriendDao;

	public function __construct(){
		error_log(__METHOD__);
		parent::__construct();
		
		$this->objUser = Session::getSessionVariable('objUser');
		if( !isset($this->objUser) )
			$this->redirect('');

		require_once DAOS_PATH ."UserDAO.php";
		$this->objUserDao = new UserDAO();
		require_once DAOS_PATH ."FriendDAO.php";
		$this->objFriendDao = new FriendDAO();
	}
	
	/**
     * Shows the principal page of the user.
     *
     */
	public function index($id = false){ //ACA DEBERIA MOSTRAR LA PAGINA DEL USUARIO, UN AMIGO O UN DESCONOCIDO.....
		$objUser = Session::getSessionVariable('objUser');
		$this->objView->strTitle = "Usuario";
		$this->objView->renderView('index');
	}

	/**
     * Shows the editable profile of the user
     *
     */
	public function editProfile(){
		$this->objView->strTitle = "Configuracion general de su cuenta";
		$this->objView->renderView('profile');
	}

	/**
     * Shows the options to change the user password
     *
     */
	public function editPassword(){
		$this->objView->strTitle = "Cambiar Password";
		$this->objView->renderView('password');
	}

	/**
     * Updates the user configurations
     *
     */
	public function updateUserData(){
		//print_r($_FILES);

		if($_POST){
			if(!isset( $_POST['user'], $_POST['email'], $_POST['notifications'] ) )
				$this->redirect('user/index');

			$user = $this->objUser->getStrUser();
			$email = $this->objUser->getStrEmail();
			$notifications = $this->objUser->getStrPassword();
			
			// check if the variables had changed
			if($_POST['user'] == $user AND $_POST['email'] == $email AND $_POST['notifications'] == $notifications){
				$this->objView->strTitle = "Configuracion general de su cuenta";
				$this->objView->strMessage = "Verifique sus datos";
				$this->objView->renderView('index');
			}
			
            $this->objUser->setstrUser($_POST['user']);
            $this->objUser->setstrEmail($_POST['email']);
        	$this->objUser->setStrNotifications($_POST['notifications']);
			
		//PHOTO
			if(@is_uploaded_file($_FILES['newphoto']['tmp_name'])){
				require_once PHP ."SimpleImage.php";
				$photo = $_FILES['newphoto'];
				try{
					$image = new SimpleImage($photo['tmp_name']); //thows Exception on wrong types

					$photoUploaded = $this->pictureUploader($photo, IMAGE, sha1($this->objUser->getIntId()));
					//print_r($photoUploaded);
					/*
					$image = new SimpleImage($photoUploaded);
					$type = $image->image_type;
					$image->square(400);
					$image->save($photoUploaded, $type, $compression=75, $permissions=null);
					*/
					if(false != $photoUploaded){
						$file = basename($photoUploaded);
						//print_r($file);
						$this->objUser->setStrPathPhoto(IMG.$file);
					}
					//print_r($this->objUser);
				}catch(Exception $e){//no subo la imagen porq el formato no es correcto
					error_log(__METHOD__."-->".$e->getMessage());
					Session::setSessionVariable('imageError', "Error al subir la imagen");
				}
			}
		//PHOTO
			//print_r($this->objUser);die();
			if($this->objUserDao->updateProfile($this->objUser)){

				Session::setSessionVariable('objUser', $this->objUser);

				$this->objView->strTitle = "Configuracion general de su cuenta";
				$this->objView->strMessage = "Los cambios se guardaron correctamente";
				$this->objView->renderView('index');
			}else{
				$this->objView->strTitle = "Configuracion general de su cuenta";
				$this->objView->strMessage = "Ha ocurrido un error!";
				$this->objView->renderView('index');
			}
		}
		$this->redirect('user/profile');
	}
	
	/**
     * Updates the user password
     *
     */
	public function updatePassword(){
		if($_POST){
			if(!isset( $_POST['password'], $_POST['password1'], $_POST['password2'] ) )
				$this->redirect('user');

			$password = $_POST['password']; 
			$password1 = $_POST['password1'];
			$password2 = $_POST['password2'];

			if($password1==$password2 AND $password == $this->objUser->getStrPassword() AND $password != $password1 AND strlen($password1)>0 ){
				echo $password1.".".$password2.".".$password.".".$this->objUser->getStrPassword().".".strlen($password1);
				$this->objUser->strPassword = $password1;
				
				if($this->objUserDao->updatePassword($this->objUser)){					
					$this->objView->strTitle = "Cambiar Password";
					$this->objView->strMessage = "Su password fue guardado correctamente.";
					$this->objView->renderView('password');

				}else{
					$this->objView->strTitle = "Cambiar Password";
					$this->objView->strMessage = "Ha ocurrido un error!";
					$this->objView->renderView('password');
				}
			}else{
				$this->objView->strTitle = "Cambiar Password";
				$this->objView->strMessage = "Verifique sus datos";
				$this->objView->renderView('password');
			}	
		}
		$this->redirect('user');
	}
	
	/**
     * Search for the users in the site
     *
     */
	public function searchUsers(){
		
		if(empty($_POST['search'])){	// Empty search
			$this->objView->strTitle = "Configuracion general de su cuenta";
			$this->objView->renderView('index');
		}

		$search = $this->objView->search = $this->isString($_POST['search']);
		error_log(__METHOD__."/'".$search."'");

		$arrayObjUserSearch = array();
		$this->objView->strTitle = "Busqueda";
		$arrayObjUserSearch = $this->objUserDao->getUsers($search);
		
		if(false == $arrayObjUserSearch){
			$this->objView->strMessage = "No se encontraron Coincidencias";
			$this->objView->renderView('emptySearch');
			return;
		}

		//LOAD FRIENDS
		$this->objView->objFriends = array();
		$result = $this->objFriendDao->getFriendsId($this->objUser);
		if(false != $result){
			$friends = array();
			$id = $this->objUser->getIntId();
			foreach($result as $friend){
				if($friend[0] == $id)
					array_push($friends, $friend[1]);
				else
					array_push($friends, $friend[0]);
			}
			$result = $this->objFriendDao->getFriends($friends);
			if(false != $result){
				$objFriends = UserModel::resultToUserModel($result);
				$this->objView->objFriends = $objFriends;
				//print_r("friends  ");
				//print_r($this->objView->objFriends);
			}
		}
		//LOAD SENT REQUESTS
		$this->objView->sentRequests = array();
		$result = $this->objFriendDao->getSentRequests($this->objUser);
		if(false != $result){
			$objSentRequests = UserModel::resultToUserModel($result);
			$this->objView->sentRequests = $objSentRequests;
			//print_r("sent  ");
			//print_r($objSentRequests);
		}
		//LOAD RECEIVED REQUESTS
		$this->objView->receivedRequests = array();
		$result = $this->objFriendDao->getReceivedRequests($this->objUser);
		if(false != $result){
			$objReceivedRequests = UserModel::resultToUserModel($result);
			$this->objView->receivedRequests = $objReceivedRequests;
			//print_r("received  ");
			//print_r($objReceivedRequests);
		}
		//die();

		$intCount = count($arrayObjUserSearch);
		switch($intCount){
			case 1:
				$this->objView->strMessage = "Se encontró: 1 Coincidencia";
				$this->objView->count = $intCount;
				$this->objView->usersList = $arrayObjUserSearch;
				$this->objView->renderView('usersList');
				return $this;
			default:
				$this->objView->strMessage = "Se encontraron: ".$intCount." Coincidencias";
				$this->objView->count = $intCount;
				$this->objView->usersList = $arrayObjUserSearch;
				$this->objView->renderView('usersList');
				return $this;
		}
	}

}

?>