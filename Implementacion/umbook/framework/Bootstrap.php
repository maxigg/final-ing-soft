<?php


class Bootstrap
{
    /**
    *
    *  Verifica e instancia el controlador, llamando al método con argunmentos. Verifica la concordancia de los mismos y si existe se ejecuta  
    *
    * @param Request
    * @return Nada
    * @throws Exception.
    *
    **/
    static public function run(Request $objRequest){
        error_log( __FILE__  ." >  > ".__METHOD__);
        
        $strNombreControlador = $objRequest->getStrControlador() . 'Controller';
        $strRutaControlador = APP_PATH . 'controllers' . DS . $strNombreControlador . '.php';
        $strNombreMetodo = $objRequest->getStrMetodo();
        $arrayNombreArgumentos = $objRequest->getArrayArgumentos();
        
        if(is_readable($strRutaControlador)){
            require_once $strRutaControlador;
            $objController = new $strNombreControlador; //php te permite crear código que crea código basado en vars de string - en el caso de instancias NO agregar ()

            
            if( !is_callable( array($objController, $strNombreMetodo) ) )
                $strNombreMetodo = DEFAULT_METODO;
             
            if(isset($arrayNombreArgumentos) && sizeof($arrayNombreArgumentos) > 0){
                call_user_func_array(array($objController, $strNombreMetodo), $arrayNombreArgumentos); //es para llamar a un método (código creado por código) de forma dinámica, pasarle argumentos
            }else{
                call_user_func(array($objController, $strNombreMetodo));
            }
            
        }else{
            throw new Exception('controlador no encontrado');
        }
    }
}

?>