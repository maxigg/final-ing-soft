<?php
class FriendDAO extends DAO {

public function createRequest($idUser){
	$sql = "INSERT INTO friend (id_user, id_friend) VALUES ( ";
	$sql = $sql."'".Session::getSessionVariable('id')."', ";
	$sql = $sql."'".$idUser."') ";
	$result = $this->boolEjecutarModificacionSQL($sql);

	return $result;
}

public function setFriend($idUser)
{
	# code...
}

public function removeRequest($idUser){
	# code...
}

public function unsetFriend($idUser)
{
	# code...
}
}

?>