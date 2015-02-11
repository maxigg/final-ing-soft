<?php
class FriendDAO extends DAO {
	public function __construct(){
		error_log(__METHOD__);
        parent::__construct();
	}

	/**
     * Create requests
     *
     * @param object UserModel
     * @param integer id of receiver user
     * @return boolean
     */
	public function createRequest(&$objUser, $idUser){
		$sql = "INSERT INTO request (id_receiver, id_sender) VALUES ( ";
		$sql = $sql."'".$idUser."', ";
		$sql = $sql."'".$objUser->getIntId()."') ";
		$result = $this->boolEjecutarModificacionSQL($sql);

		return $result;
	}

	/**
     * Remove Sent request
     *
     * @param object UserModel
     * @param integer id of receiver user
     * @return boolean
     */
	public function removeSentRequest(&$objUser, $idUser){
		$sql = "DELETE FROM request WHERE id_sender='".$objUser->getIntId()."' AND id_receiver='".$idUser."'";
		//print_r($sql);die();	
		$result = $this->boolEjecutarModificacionSQL($sql);
		return $result;
	}

	/**
     * Remove request
     *
     * @param object UserModel
     * @param integer id of sender user
     * @return boolean
     */
	public function removeRequest(&$objUser, $idUser){
		$sql = "DELETE FROM request WHERE id_sender='".$idUser."' AND id_receiver='".$objUser->getIntId()."'";
		$result = $this->boolEjecutarModificacionSQL($sql);
		return $result;
	}

	/**
     * Pull RECEIVED requests
     *
     * @param object UserModel 
     * @return array int
     */
	function getReceivedRequests(&$objUser){
		$receivedRequests = array();
		$sql = "SELECT id_sender FROM request WHERE id_receiver = ".$objUser->getIntId();
		$result = $this->arrayEjecutarConsultaSQL($sql);
		if(!empty($result)){
			foreach($result as $item)
				array_push($receivedRequests, $item['id_sender']);
			//print_r($sentRequests);die();
			$sql = "SELECT id, user, name, last_name, path_photo FROM user WHERE user.id IN(".implode(',', $receivedRequests).")";
			$result = $this->arrayEjecutarConsultaSQL($sql);
			if(0 != count($result)){
				$receivedRequests = array();
				foreach($result as $item)
					array_push($receivedRequests, $item);
					//	print_r($sentRequests);die();
				return $receivedRequests;
			}
		}
		return false;
	}

	/**
     * Pull SENT requests
     *
     * @param object UserModel 
     * @return array int
     */
	function getSentRequests(&$objUser){
		$sentRequests = array();
		$sql = "SELECT id_receiver FROM request WHERE id_sender = ".$objUser->getIntId();
		$result = $this->arrayEjecutarConsultaSQL($sql);
		if(!empty($result)){
			foreach($result as $item)
				array_push($sentRequests, $item['id_receiver']);
			
			//print_r($sentRequests);die();
			$sql = "SELECT id, user, name, last_name, path_photo FROM user WHERE user.id IN(".implode(',', $sentRequests).")";
			$result = $this->arrayEjecutarConsultaSQL($sql);
			if(0 != count($result)){
				$sentRequests = array();
				foreach($result as $item)
					array_push($sentRequests, $item);
					//	print_r($sentRequests);die();
				return $sentRequests;
			}
		}
		return false;
	}

	/**
     * Pull Friends Ids
     *
     * @param object UserModel 
     * @return array int
     */
	public function getFriendsId(&$objUser){
		error_log(__METHOD__);
		$id = $objUser->getIntId();
		$sql = "SELECT id_user, id_friend FROM friend 
			WHERE id_user='".$id."' OR id_friend='".$id."'";
		$result = $this->arrayEjecutarConsultaSQL($sql);
		//print_r($result);
		if(0 == count($result))
			return false;
		else
			return $result;
	}

	/**
     * Pull friends
     *
     * @param array int
     * @return array object UserModel
     */
	function getFriends(&$arrayIds){
		if(0 == count($arrayIds))
			return false;
		elseif(1 == count($arrayIds))
			$usersIds = array_shift($arrayIds);
		else
			$usersIds = implode(',', $arrayIds);

		$sql = "SELECT id, user, name, last_name, path_photo FROM user WHERE user.id IN(".$usersIds.")";
		//print_r($sql);die();
		$result = $this->arrayEjecutarConsultaSQL($sql);
		//print_r($result);
		if(0 != count($result)){
			$friends = array();
			foreach($result as $item)
				array_push($friends, $item);
			//print_r($result);
			return $friends;
		}
		return false;
	}
	

	/**
     * Create new Friendship
     *
     * @param object UserModel 
     * @return boolean
     */
	public function setFriend(&$objUser, $idFriend){
		$idUser = $objUser->getIntId();

		$sql = "DELETE FROM request";
		$sql = $sql ." WHERE (id_sender = ".$idUser." AND id_receiver=".$idFriend.") OR 
							(id_sender = ".$idFriend." AND id_receiver=".$idUser.")";
		//print_r($sql);
		$result = $this->boolEjecutarModificacionSQL($sql);
		if( false != $result ){
			$sql = "INSERT INTO friend (id_user, id_friend) VALUES ( ";
			$sql = $sql ."'".$idUser."', ";
			$sql = $sql ."'".$idFriend."') ";
			//print_r($sql);
			return $this->boolEjecutarModificacionSQL($sql);
		}
		return false;
	}


	public function unSetFriend($idFriend, $idUser){
		$sql = "DELETE FROM friend";
		$sql = $sql ." WHERE (id_user = ".$idUser." AND id_friend=".$idFriend.") OR 
					(id_user = ".$idFriend." AND id_friend=".$idUser.")";

		$result = $this->boolEjecutarModificacionSQL($sql);
		return $result;
	}































	/**
     * Find SENT requests of a user
     *
     * @param object UserModel 
     * @return array int
     */
	/*
	public function getFriendsRequestId($idUser){
		$sql = "SELECT id_receiver, id_sender FROM request WHERE id_receiver='".$idUser."' OR id_sender='".$idUser."'";
		$result = $this->arrayEjecutarConsultaSQL($sql);
		if($result) 
			return $result;
		else 
			return false;	
	}*/
	/*
	public function getFriendsRequest($idUser){
		$sql = "SELECT request.id, user.id, user.user, user.name, user.last_name, user.path_photo FROM request 
		LEFT JOIN user ON request.id_sender=user.id WHERE request.id_receiver='".$idUser->getIntId()."' AND request.state=0";
		$result = $this->arrayEjecutarConsultaSQL($sql);
		print_r($sql);die();
		$searchResults = array();
			foreach($result as $row) {	
				require_once MODELS_PATH ."RequestModel.php";
				require_once MODELS_PATH ."UserModel.php";		 
				$temp = new RequestModel();
				$temp->setintId($row[0]);
				$tempaux = new UserModel();		 
				$tempaux->setintId($row[1]);
				$tempaux->setStrUser($row[2]);
				$tempaux->setStrName($row[3]);
				$tempaux->setStrLastName($row[4]);
				$tempaux->setStrPathPhoto($row[5]);
				$temp->setObjUserOwner($tempaux);			 
				array_push($searchResults, $temp);
			}
		return $searchResults;
	}
	*/

	/*<<<<<<< HEAD
	public function removeRequest($idUser){
		$sql = "UPDATE request SET state = 2";
		$sql = $sql." WHERE (id_receiver = ".Session::getSessionVariable('id')." id_sender=".$idUser.") ";
		$result = $this->boolEjecutarModificacionSQL($sql);
		if ($result != 1) {
			return false;
		}
		return $result;
	}

	=======
	>>>>>>> fc386adb6670936003779ad9baaf47cdad81e52e
	public function unsetFriend($idUser){

	}
	*/
}
?>