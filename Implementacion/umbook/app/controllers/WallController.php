<?php

class WallController extends Controller {
	
	private $objUser;
	private $arrayObjPublications = array(); 
	private $objPublicationDao;

	public function __construct(){
		error_log(__METHOD__);
		parent::__construct();

		$this->objUser = Session::getSessionVariable('objUser');
		if( !isset($this->objUser) )
			$this->redirect('');

		require_once DAOS_PATH ."PublicationDAO.php";
		$this->objPublicationDao = new PublicationDAO();
	}
	
	public function index(){

		$arrayObjPublications = array();
		$arrayObjPublications = $this->objPublicationDao->getPublications($this->objUser);
		
		//print_r($arrayObjPublications);die();

		foreach ($arrayObjPublications as $objPublication) {
			$objLoadedPublication = new PublicationModel();
			$objLoadedPublication = $this->objPublicationDao->getComments($objPublication);
			array_push($this->arrayObjPublications, $objLoadedPublication);
		}
		
		//print_r($this->arrayObjPublications);die();
		
		$this->objView->arrayObjPublications = $this->arrayObjPublications;
		$this->objView->strTitle = "Muro";
		$this->objView->renderView('index');
	}
	
}
?>