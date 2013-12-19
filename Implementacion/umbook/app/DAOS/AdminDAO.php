<?php

class AdminDAO extends DAO {

	function userDisable($id){

		$sql = "UPDATE user SET state = '0' WHERE  id='".$id."'";
		$result = $this->boolEjecutarModificacionSQL($sql);

		return $result;
	}

	function userEnable($id){

		$sql = "UPDATE user SET state = '1' WHERE  id='".$id."'";
		$result = $this->boolEjecutarModificacionSQL($sql);

		return $result;
	}
	
}

?>