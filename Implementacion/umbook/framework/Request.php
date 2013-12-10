<?php



class Request
{
    private $strControlador;
    private $strMetodo;
    private $arrayArgumentos;

    /**
    *
    * Crea un objeto que representa la URL; seteando controlador (primer componente de la URL), método y argumentos  
    *
    * @param Nada
    * @return Request
    * @throws Vacio.
    *
    **/
    public function __construct($strParametroControlador=false) {

         error_log( __FILE__  ." >  > ".__METHOD__);


        if(!$strParametroControlador){
            if(isset($_GET['url'])){
                
                $strURL = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
                $arrayURL = explode('/', $strURL);         
                $arrayURL = array_filter($arrayURL);                   
                $this->strControlador = strtolower(array_shift($arrayURL));
                $this->strMetodo = strtolower(array_shift($arrayURL));
                $this->arrayArgumentos = $arrayURL;
            }       
            
            if(!$this->strControlador){
                $this->strControlador = DEFAULT_CONTROLLER;
            }
            
            if(!$this->strMetodo){
                $this->strMetodo = DEFAULT_METODO;
            }
            
        }else{
            $this->strControlador = $strParametroControlador;
            $this->strMetodo = "no_es_necesario";        
        }

        if(!isset($this->arrayArgumentos)){
            $this->arrayArgumentos = array();
        }
    }
    
    public function getStrControlador(){
         error_log( __FILE__  ." >  > ".__METHOD__);
        return $this->strControlador;
    }
    
    public function getStrMetodo(){
         error_log( __FILE__  ." >  > ".__METHOD__);
        return $this->strMetodo;
    }
    
    public function getArrayArgumentos(){
         error_log( __FILE__  ." >  > ".__METHOD__);
        return $this->arrayArgumentos;
    }
}

?>