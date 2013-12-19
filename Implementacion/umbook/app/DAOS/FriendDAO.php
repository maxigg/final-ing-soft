<?php
class FriendDAO extends DAO {

public function createRequest($idUser){	
	$sql = "INSERT INTO request (id_receiver, id_sender) VALUES ( ";
	$sql = $sql."'".$idUser."', ";
	$sql = $sql."'".Session::getSessionVariable('id')."') ";
	$result = $this->boolEjecutarModificacionSQL($sql);
	
	return $result;
}

public function setFriend($idUser){
	$sql = "UPDATE request SET state = 1";
	$sql = $sql." WHERE (id_sender = ".$idUser." AND id_receiver=".Session::getSessionVariable('id').") ";
	$result = $this->boolEjecutarModificacionSQL($sql);
	if ($result != 1) {
		return false;
	}
	$sql2 = "INSERT INTO friend (id_user, id_friend) VALUES ( ";
	$sql2 = $sql2."'".Session::getSessionVariable('id')."', ";
	$sql2 = $sql2."'".$idUser."') ";
	$result = $this->boolEjecutarModificacionSQL($sql2);

	return $result;
}

public function removeRequest($idUser){
	$sql = "UPDATE request SET state = 2";
	$sql = $sql." WHERE (id_receiver = ".Session::getSessionVariable('id')." id_sender=".$idUser.") ";
	$result = $this->boolEjecutarModificacionSQL($sql);
	if ($result != 1) {
		return false;
	}
	return $result;
}

public function unsetFriend($idUser){
}

public function getFriendsId($idUser){
	$sql = "SELECT id_user, id_friend FROM friend WHERE id_user='".$idUser."' OR id_friend='".$idUser."'";
	$result = $this->arrayEjecutarConsultaSQL($sql);
	if($result) return $result;
	else return false;	
}

public function getFriendsRequestId($idUser){
	$sql = "SELECT id_receiver, id_sender FROM request WHERE id_receiver='".$idUser."' OR id_sender='".$idUser."'";
	$result = $this->arrayEjecutarConsultaSQL($sql);
	if($result) return $result;
	else return false;	
}

public function getFriendsRequest($idUser){
	$sql = "SELECT  request.id, user.id, user.user, user.name, user.last_name, user.path_photo FROM request LEFT JOIN user 
	ON request.id_sender=user.id WHERE request.id_receiver='".$idUser."' AND request.state=0";
	$result = $this->arrayEjecutarConsultaSQL($sql);

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

}

?>