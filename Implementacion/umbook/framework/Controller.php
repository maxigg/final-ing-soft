<?php



abstract class Controller
{
    protected $objView;
    
    public function __construct($strControlador=false) {
         error_log( __FILE__  ." >  > ".__METHOD__);

        
        if($strControlador){

            $objRequest = new Request($strControlador);

            $this->objView = new View($objRequest);
        }
         else{
            $this->objView = new View(new Request());
         }
    }
    
    abstract public function index();
    
    /**
    *
    * Recibe el nombre del modelo de datos, lo busca. 
    * Si existe lo instancia y lo devueve a quien lo solicito
    * @param Recive el nombre del modelo.
    * @return Devuelve el modelo.
    * @throws Exception.
    *
    **/
        
    protected function objCargarModelo($strNombreModelo){
        error_log( __FILE__  ." >  > ".__METHOD__);
        $strNombreModelo = $strNombreModelo . 'Model';
        $strRutaModelo = APP_PATH . 'models' . DS . $strNombreModelo . '.php';
        
        if(is_readable($strRutaModelo)){
            require_once $strRutaModelo;
            $objModelo = new $strNombreModelo;
            return $objModelo;
        } else {
            throw new Exception('Error de modelo');
        }
    }

   
    /**
    *
    * Redirecciona a una ruta
    * @param String.
    * @return nada
    * @throws Vacio.
    *
    **/
    protected function redireccionar($strURLRelativa = false){
         error_log( __FILE__  ." >  > ".__METHOD__);
        if($strURLRelativa){
            header('location:' . BASE_URL . $strURLRelativa);
            exit;
        }else{
            header('location:' . BASE_URL);
            exit;
        }
    }
}

?>
