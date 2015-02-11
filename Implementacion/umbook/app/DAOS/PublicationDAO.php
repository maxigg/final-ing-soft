<?php
require_once MODELS_PATH ."PublicationModel.php";
require_once MODELS_PATH ."CommentModel.php";
class PublicationDAO extends DAO {

	private $arrayObjPublications = array();
	private $arrayObjComments = array();

	public function getPublications(&$objUser){

		$sql = "SELECT `id`, `message`, `date` FROM publication WHERE
		id_owner='".$objUser->getIntid()."' ORDER BY date DESC";
		//print_r($sql);die();
		$result = $this->arrayEjecutarConsultaSQL($sql);
		
		foreach($result as $row) {		 
			
			$objPublication = new PublicationModel();
		
			$objPublication->setIntId($row[0]);;
			$objPublication->setStrMessage($row[1]);
			$objPublication->setStrDate($row[2]);
			$objPublication->setIntIdOwner($objUser->getIntid());

			array_push($this->arrayObjPublications, $objPublication);
		}
		
		return $this->arrayObjPublications;
	}

	public function getComments(&$objPublication){

		$sql = "SELECT * FROM comment WHERE id_resource='".$objPublication->getIntId()."'
		AND resource_type='1' ";

		$result = $this->arrayEjecutarConsultaSQL($sql);

		if(sizeof($result)){
			foreach($result as $row) {		 
				$objComment = new CommentModel();
			
				$objComment->setIntId($row[0]);
				$objComment->setIntIdResource($row[1]);
				$objComment->setObjUserOwner($row[2]);
				$objComment->setStrMessage($row[3]);
				$objComment->setStrDate($row[4]);
				$objComment->setIntResourceType($row[5]);

				array_push($this->arrayObjComments, $objComment);
			}
		}
		$objPublication->setArrayObjComments($this->arrayObjComments);

		$this->arrayObjComments = array(); // flushes the array
		return $objPublication;

	}
}

?>