<?php




class View
{
    private $strController;
    public $strTitle;
       
    public function __construct(Request $objRequest) {
         error_log( __FILE__  ." >  > ".__METHOD__);
        $this->strController = $objRequest->getStrController();
        error_log("seteado strController en view: " . $this->strController);
       
    }
    
    public function renderView($strView){   
        error_log( __FILE__  ." >  > ".__METHOD__);

        $strRutaView = APP_PATH . 'VIEWS' . DS . $this->strController . DS . $strView . '.php';

        error_log(">>>>>>>> strRutaView: " . $strRutaView);

       if(is_readable($strRutaView)){
            include PHP . "header.php";
            include_once $strRutaView;
       }else{
            throw new Exception('Error view');
       }
   
    }
    
  
}

?>
