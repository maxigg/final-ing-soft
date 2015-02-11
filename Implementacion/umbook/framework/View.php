<?php

class View {
    
    private $strController;
    public $strTitle;
       
    public function __construct(Request $objRequest) {
        //error_log(__FILE__  ." ==> ".__METHOD__);
        error_log(__METHOD__);
        $this->strController = $objRequest->getStrController();
        //error_log(__METHOD__ ." --> ".$this->strController);
    }
    
    public function renderView($strView){ 
        
        $strRutaView = APP_PATH . 'VIEWS' . DS . $this->strController . DS . $strView . '.php';
        error_log(__METHOD__." --> ".$strRutaView);

       if(is_readable($strRutaView)){
            include PHP . "header.php";
            include_once $strRutaView;
       }else{
            throw new Exception('View not found ==> '.$strRutaView);
       }
       
       //exit;
    }
    
  
}

?>
