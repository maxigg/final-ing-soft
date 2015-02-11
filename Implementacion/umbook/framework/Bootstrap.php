<?php

class Bootstrap{
    
    /**
    *
    *  Verifica e instancia el Controller, llamando al método con argunmentos. Verifica la concordancia de los mismos y si existe se ejecuta  
    *
    * @param Request
    * @return Nada
    * @throws Exception.
    *
    **/
    static public function run(Request $objRequest){
        //error_log( __FILE__  ." ==> ".__METHOD__);
        error_log(__METHOD__);

        $strNameController = $objRequest->getStrController() . 'Controller';
        $strRutaController = APP_PATH . 'CONTROLLERS' . DS . $strNameController . '.php';
        $strNameMethod = $objRequest->getStrMethod();
        $arrayNameArguments = $objRequest->getArrayArguments();
        
        if(is_readable($strRutaController)){
            require_once $strRutaController;
            $objController = new $strNameController; //php te permite crear código que crea código basado en vars de string - en el caso de instancias NO agregar ()

            
            if( !is_callable( array($objController, $strNameMethod) ) )
                $strNameMethod = DEFAULT_METHOD;
            
            if(isset($arrayNameArguments) && sizeof($arrayNameArguments) > 0){
                error_log(__METHOD__." --> ".$strNameController."/".$strNameMethod."/".implode('&', $arrayNameArguments));
                call_user_func_array(array($objController, $strNameMethod), $arrayNameArguments); //es para llamar a un método (código creado por código) de forma dinámica, pasarle Arguments
            }else{
                error_log(__METHOD__." --> ".$strNameController."/".$strNameMethod);
                call_user_func(array($objController, $strNameMethod));
            }
            
        }else{
            throw new Exception('Controller not found: '.$strNameController.' ==> Method: '.$strNameMethod);
        }
    }
}

?>