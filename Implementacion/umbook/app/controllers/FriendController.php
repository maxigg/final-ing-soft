<?php

class FriendController extends Controller
{
	
	public $objFriendDao;

	public function __construct(){
		error_log( __FILE__  ." >  > ".__METHOD__);
        parent::__construct();
		require_once DAOS_PATH ."FriendDAO.php";
		$this->objFriendDao = new FriendDAO();
	}
	
	public function index(){
		$this->objView->strTitle = "Listar amigos";
		$arrayObjRequests = $this->objFriendDao->getFriends(Session::getSessionVariable('id'));
		$this->objView->renderView("index");
	}

	public function ListRequest(){
		$this->objView->strTitle = "Listar solicitudes de amistad";
		$arrayObjRequests = $this->objFriendDao->getFriendsRequest(Session::getSessionVariable('id'));
		$this->objView->friendRequestList = $arrayObjRequests;
		$this->objView->renderView("requestList");
	}

	public function SendRequest($id){
		if($id){
			$booleanFlag = $this->objFriendDao->createRequest($id);
			$this->objView->strTitle = "Envio solicitud";
			$this->objView->strMessage = "Se envio la solicitud de amistad";
			$this->objView->renderView("index");
			exit;		
		}
	}

	public function AcceptRequest($id){
		if($id){
			$booleanFlag = $this->objFriendDao->setFriend($id);
			$this->objView->strTitle = "Listar solicitudes de amistad";
			$this->objView->strMessage = "Se acepto la solicitud de amistad";
			$this->objView->renderView("requestList");	
			exit;
		}
	}

	public function CancelRequest($id){
		if($id){
			$booleanFlag = $this->objFriendDao->setFriend($id);
			$this->objView->strTitle = "Listar solicitudes de amistad";
			$this->objView->strMessage = "Se acepto la solicitud de amistad";
			$this->objView->renderView("requestList");	
			exit;
		}
	}
}

?>