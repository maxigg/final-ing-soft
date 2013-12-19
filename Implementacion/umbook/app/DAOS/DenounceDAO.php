<?php

class DenounceDAO extends DAO {

// ADMIN
	// LISTAR DENUNCIAS
	function listDenouncements(){
	
	$sql = "SELECT * FROM denouncement";
		$result = $this->arrayEjecutarConsultaSQL($sql);
		$searchResults = array();
		$userDAO = new UserDAO();
		
		foreach($result as $row) {		 
			$temp = new DenouncementModel();		 
			$temp->setIntId($row[0]);
			$temp->setIntIdResource($row[1])
			$user = $userDAO->load($row[2]);
			$temp->setObjUserUser($user);
			$temp->setStrType($row[3]);
			array_push($searchResults, $temp);
		}
		return $searchResults;
	
	}

	//TRAER UNA DENUNCIA
	function getDenouncement($id){
	
	$sql = "SELECT * FROM denouncement WHERE id='".$id."'";
		$result = $this->arrayEjecutarConsultaSQL($sql);
		$searchResults = array();
		$userDAO = new UserDAO();
		
		foreach($result as $row) {		 
			$temp = new DenouncementModel();		 
			$temp->setIntId($row[0]);
			$temp->setIntIdResource($row[1])
			$user = $userDAO->load($row[2]);
			$temp->setObjUserUser($user);
			$temp->setStrType($row[3]);
			
		}
		return $temp;
	
	}

	//ELIMINAR DENUNCIA Y RECURSO ASOCIADO (FOTO, COMENTARIO, PUBLICACION)
	function deleteDenouncement($idDenouncement, $idResource){
		$denounce = new DenouncementModel();
		$denounce = $this->getDenouncement($id);
		
		// obtengo la tabla de la que necesito eliminar el recurso
		$type = $denouncement->getStrType();
		
		$sql = "DELETE * FROM denouncement WHERE id='".$idDenouncement."' LIMIT 1";
		$result = $this->boolEjecutarModificacionSQL($sql);
		if($result == false)
			return false;
		$sql = "DELETE * FROM ".$type." WHERE id='".$idResource."' LIMIT 1";
		$result = $this->boolEjecutarModificacionSQL($sql);
	
	return $result;
	}
	

// USER
	// DENUNCIAR
	function createDenounce($idResource, $idUser, $type){
	
		$sql = "INSERT INTO denouncement (id, id_resource, id_user, type) VALUES ( ";
		$sql = $sql."'NULL', ";
		$sql = $sql."'".$idResource)."', ";
		$sql = $sql."'".$idUser."', ";
		$sql = $sql."'".$type."') ";

		$result = $this->boolEjecutarModificacionSQL($sql);

		return $result;
	}
	
}

?>
