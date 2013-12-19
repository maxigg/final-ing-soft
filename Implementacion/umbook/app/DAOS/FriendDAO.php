<?php
class FriendDAO extends DAO {

public function createRequest($idUser){	
	$sql = "INSERT INTO request (id_receiver, id_sender) VALUES ( ";
	$sql = $sql."'".Session::getSessionVariable('id')."', ";
	$sql = $sql."'".$idUser."') ";
	$result = $this->boolEjecutarModificacionSQL($sql);
	
	return $result;
}

public function setFriend($idUser){
	$sql = "INSERT INTO friend (id_user, id_friend) VALUES ( ";
	$sql = $sql."'".Session::getSessionVariable('id')."', ";
	$sql = $sql."'".$idUser."') ";
	$result = $this->boolEjecutarModificacionSQL($sql);

	return $result;
}

public function removeRequest($idUser){
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

}

?>