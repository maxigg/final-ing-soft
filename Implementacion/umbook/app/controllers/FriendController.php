<?php

class FriendController extends Controller
{
	
	public $objFriendDao;

	public function __construct(){
		error_log( __FILE__  ." >  > ".__METHOD__);
        parent::__construct();
		require_once DAOS_PATH ."FriendDAO.php";
		$this->objFriendDao = new FriendDAO();
	}
	
	public function index(){}

	public function SendRequest(){
		if($id){
			$this->objFriendDao->createRequest($id);
			$this->objView->strTitle = "Envio solicitud";
			$this->objView->strMessage = "Se envio la solicitud de amistad";
			$this->objView->renderView("index");		
		}
	}
}

?>