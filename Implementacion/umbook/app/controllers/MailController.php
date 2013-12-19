<?php

class MailController extends Controller{
	
	public $objUserDao;

	public function __construct(){
		error_log( __FILE__  ." >  > ".__METHOD__);
        parent::__construct();
		require_once DAOS_PATH ."UserDAO.php";
		$this->objuserdDao = new UserDAO();
	}
	
	public function verifyAndSendMail($id){
	
		$sql = "SELECT notifications FROM user WHERE id='".$id."'";
		$result = $this->arrayEjecutarConsultaSQL($sql);
		$state = false;
		
		foreach($result as $row) {
			if($row[0] == "ALL" or $row[0] == "MAIL"){
				$state = true;
			}
		}

		/* 

		enviar el mail

		*/
	}


}

?>