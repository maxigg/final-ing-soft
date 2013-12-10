<?php




class View
{
    private $strControlador;
    public $strTitulo;
       
    public function __construct(Request $objRequest) {
         error_log( __FILE__  ." >  > ".__METHOD__);
        $this->strControlador = $objRequest->getStrControlador();
        error_log("seteado strControlador en view: " . $this->strControlador);
       
    }
    
    public function armaPathParaCargarView($strVista){   
        error_log( __FILE__  ." >  > ".__METHOD__);

        $strRutaView = APP_PATH . 'views' . DS . $this->strControlador . DS . $strVista . '.php';

        error_log(">>>>>>>> strRutaView: " . $strRutaView);

       if(is_readable($strRutaView)){
            include_once $strRutaView;
       }else{
            throw new Exception('Error de vista');
       }
   
    }
    
  
}

?>
