<?php



abstract class Controller
{
    protected $objView;
    
    public function __construct($strController=false) {
         error_log( __FILE__  ." >  > ".__METHOD__);

        
        if($strController){

            $objRequest = new Request($strController);

            $this->objView = new View($objRequest);
        }
         else{
            $this->objView = new View(new Request());
         }
    }
    
    abstract public function index();
    
    /**
    *
    * Recibe el Name del Model de datos, lo busca. 
    * Si existe lo instancia y lo devueve a quien lo solicito
    * @param Recive el Name del Model.
    * @return Devuelve el Model.
    * @throws Exception.
    *
    **/
        
    protected function objLoadModel($strNameModel){
        error_log( __FILE__  ." >  > ".__METHOD__);
        $strNameModel = $strNameModel . 'Model';
        $strRutaModel = APP_PATH . 'MODELS' . DS . $strNameModel . '.php';
        
        if(is_readable($strRutaModel)){
            require_once $strRutaModel;
            $objModel = new $strNameModel;
            return $objModel;
        } else {
            throw new Exception('Error Model');
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
    protected function redirect($strRelativeURL = false){
         error_log( __FILE__  ." >  > ".__METHOD__);
        if($strRelativeURL){
            header('location:' . BASE_URL . $strRelativeURL);
            exit;
        }else{
            header('location:' . BASE_URL);
            exit;
        }
    }



    public function isInteger($integer){
        if(isset($integer) && !empty($integer)){
            $integer = filter_input($integer, FILTER_VALIDATE_INT);
            return $integer;
        }
        return 0;
    }
    
    public function isString($string){
        if(isset($string) && !empty($string)){
            $string = htmlspecialchars($string, ENT_QUOTES);
            return $string;
        }
        return '';
    }
}

?>
