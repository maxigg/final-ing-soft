<?php
require_once MODELS_PATH ."PublicationModel.php";

class PublicationDAO extends DAO {

	function getPublications($idUser){

		$sql = "SELECT `id`, `id_publisher`, `message`, `date` FROM publication WHERE id_owner='".$idUser."'";
		
		$result = $this->arrayEjecutarConsultaSQL($sql);

		$searchResults = array();
		
		foreach($result as $row) {		 
			
			$publication = new PublicationModel();
		
			$publication->setIntId($row[0]);
			$publication->setStrPublisher($row[1]);
			$publication->setStrMessage($row[2]);
			$publication->setStrDate($row[3]);
			
			array_push($searchResults, $publication);
		}

		return $searchResults;

	
	}

	
}

?>