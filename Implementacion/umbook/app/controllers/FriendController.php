<?php

class FriendController extends Controller {
	
	private $objUser;
	private $objFriendDao;
	//private $requests;
	//private $friends;

	public function __construct(){
		error_log(__METHOD__);
        parent::__construct();

        $this->objUser = Session::getSessionVariable('objUser');
		if( !isset($this->objUser) )
			$this->redirect('');

		//$this->requests = $this->objUser->getArrayObjRequests();
		//$this->friends = $this->objUser->getArrayObjFriends();

		require_once DAOS_PATH ."FriendDAO.php";
		$this->objFriendDao = new FriendDAO();
	}
	
	// Shows the LIST of FRIENDS
	public function index(){
		$this->objView->objFriends = array();
		$result = $this->objFriendDao->getFriendsId($this->objUser);
		//print_r($result);
		if(false != $result){
			
			$friends = array();
			$id = $this->objUser->getIntId();
			foreach($result as $friend){
				if($friend[0] == $id)
					array_push($friends, $friend[1]);
				else
					array_push($friends, $friend[0]);
			}
			//print_r($friends);
			$result = $this->objFriendDao->getFriends($friends);
			//print_r($result);
			if(false != $result){
				$Friends = UserModel::resultToUserModel($result);
				$this->objView->objFriends = $Friends;
				//print_r($this->objView->objFriends);die();
			}
		}
		$this->objView->strTitle = "Lista de Amigos";
		$this->objView->renderView("index");
	}

	// Shows the FRIEND page
	/*public function index($id){
		echo "PAGINA DEL AMIGO";die();
		/*
		$this->objView->objFriends = array();
		$result = $this->objFriendDao->getFriendsId($this->objUser);
		//print_r($result);
		if(false != $result){
			
			$friends = array();
			$id = $this->objUser->getIntId();
			foreach($result as $friend){
				if($friend[0] == $id)
					array_push($friends, $friend[1]);
				else
					array_push($friends, $friend[0]);
			}
			//print_r($friends);
			$result = $this->objFriendDao->getFriends($friends);
			//print_r($result);
			if(false != $result){
				$Friends = UserModel::resultToUserModel($result);
				$this->objView->objFriends = $Friends;
				//print_r($this->objView->objFriends);die();
			}
		}
		$this->objView->strTitle = "Lista de Amigos";
		$this->objView->renderView("index");
		
	}*/


	// Shows the LIST of REQUESTS (SENT AND RECEIVED)!!!
	public function listRequests(){
		$this->objView->receivedRequests = array();
		$this->objView->sentRequests = array();
		$result = $this->objFriendDao->getReceivedRequests($this->objUser);
		if(false != $result){
			$objReceived = UserModel::resultToUserModel($result);
			$this->objView->receivedRequests = $objReceived;
		}

		$result = $this->objFriendDao->getSentRequests($this->objUser);
		if(false != $result){
			$objSent = UserModel::resultToUserModel($result);
			$this->objView->sentRequests = $objSent;
		}
		$this->objView->strTitle = "Solicitudes de amistad";
		$this->objView->renderView('requestList');
	}

	// Sends a Request from the session user to another user
	public function SendRequest($id){
		if( isset($id) AND !empty($id) ){

			if(false != $this->objFriendDao->createRequest($this->objUser, $id)){
				/*                   LOADING THE SESSION IS NOT EFFICIENT !!!!!!!!!!!
				$arrayId = array($id);
				$result = $objUser = $this->objFriendDao->getFriends($arrayId);
				if(false != $result){
					$arrayObjSent = UserModel::resultToUserModel($result);
					$objSent = array_shift($arrayObjSent);
					array_push($this->requests, $objSent);
					$this->objUser->setArrayObjRequests($this->requests);
					Session::setSessionVariable('objUser', $this->objUser);
				}
				*/
			//print_r(Session::getSessionVariable('objUser'));die();
			//$this->objView->renderView('index');
			}
		}
		$this->redirect('friend/listRequests');
	}

	// Cancels a sent Request from the session user to another user
	public function CancelSentRequest($id){
		if( isset($id) AND !empty($id) ){

			$result = $this->objFriendDao->removeSentRequest($this->objUser, $id);
			/*                   LOADING THE SESSION IS NOT EFFICIENT !!!!!!!!!!!
			if( false != $result){
				$requests = array();
				foreach ($this->requests as $value) {
					array_push($requests, $value->getIntId());
				}
				$key = array_search($id, $requests);
				array_splice($this->requests, $key, 1);
				//print_r($this->requests);die();
				$this->objUser->setArrayObjRequests($this->requests);
				Session::setSessionVariable('objUser', $this->objUser);
			}
			*/
		}
		$this->redirect('friend/listRequests');
	}

	// Accepts a received request
	public function AcceptRequest($id){
		
		if( isset($id) AND !empty($id) ){
			if(false != $this->objFriendDao->setFriend($this->objUser, $id)){
				/*                   LOADING THE SESSION IS NOT EFFICIENT !!!!!!!!!!!
				$arrayId = array($id);
				$result = $objUser = $this->objFriendDao->getFriends($arrayId);
				$objFriend = UserModel::resultToUserModel($result);
				$arrayFriends = $this->objUser->getArrayObjFriends();
				array_push($arrayFriends, $objFriend);
				//print_r($arrayFriends);die();
				$this->objUser->setArrayObjFriends($arrayFriends);
				Session::setSessionVariable('objUser', $this->objUser);
				*/
			}
			
		}
		$this->redirect('friend/listRequests');
	}

	//Cancels a received request
	public function CancelRequest($id){
		if( isset($id) AND !empty($id) )
			$this->objFriendDao->removeRequest($this->objUser, $id);

		$this->redirect('friend/listRequests');
	}

	//Removes a friend
	public function RemoveFriend($id){
		if( isset($id) AND !empty($id) )
			if(false != $this->objFriendDao->unSetFriend($id, $this->objUser->getIntId())){
				/*                   LOADING THE SESSION IS NOT EFFICIENT !!!!!!!!!!!
				foreach ($this->friends as $key => $value) {
					if($value->getIntId() == $id)
						array_splice($this->friends, $key, 1);
				}

				$this->objUser->setArrayObjFriends($this->friends);
				Session::setSessionVariable('objUser', $this->objUser);
				*/
			}

		$this->redirect('friend/index');
	}

}

?>