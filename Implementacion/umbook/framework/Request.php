<?php



class Request
{
    private $strController;
    private $strMethod;
    private $arrayArguments;

    /**
    *
    * Crea un objeto que representa la URL; seteando Controller (primer componente de la URL), método y Arguments  
    *
    * @param Nada
    * @return Request
    * @throws Vacio.
    *
    **/
    public function __construct($strParametroController=false) {

         error_log( __FILE__  ." >  > ".__METHOD__);


        if(!$strParametroController){
            if(isset($_GET['url'])){
                
                $strURL = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
                $arrayURL = explode('/', $strURL);         
                $arrayURL = array_filter($arrayURL);                   
                $this->strController = strtolower(array_shift($arrayURL));
                $this->strMethod = strtolower(array_shift($arrayURL));
                $this->arrayArguments = $arrayURL;
            }       
            
            if(!$this->strController){
                $this->strController = DEFAULT_CONTROLLER;
            }
            
            if(!$this->strMethod){
                $this->strMethod = DEFAULT_METHOD;
            }
            
        }else{
            $this->strController = $strParametroController;
            $this->strMethod = "not necesary";        
        }

        if(!isset($this->arrayArguments)){
            $this->arrayArguments = array();
        }
    }
    
    public function getStrController(){
         error_log( __FILE__  ." >  > ".__METHOD__);
        return $this->strController;
    }
    
    public function getStrMethod(){
         error_log( __FILE__  ." >  > ".__METHOD__);
        return $this->strMethod;
    }
    
    public function getArrayArguments(){
         error_log( __FILE__  ." >  > ".__METHOD__);
        return $this->arrayArguments;
    }
}

?>