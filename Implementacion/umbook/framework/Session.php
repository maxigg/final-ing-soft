<?php

class Session {

    /**
    *
    * Inicia session
    * @param Nada.
    * @return Nada.
    * @throws Vacio.
    *
    **/
    static public function init(){
        //error_log( __FILE__  ." ==> ".__METHOD__);
        error_log(__METHOD__);
        session_start();        
    }
    


    /**
    *
    * Limpia las variables de session. Se le puede pasar un array. Si no recibe parametro destruye todo.
    * @param String o Array
    * @return Nada.
    * @throws Vacio.
    *
    **/
    static public function destroySession($clave = false){
        error_log(__METHOD__);
        if($clave){
            if(is_array($clave)){
                for($i = 0; $i < count($clave); $i++){
                    if(isset($_SESSION[$clave[$i]])){
                        unset($_SESSION[$clave[$i]]);
                    }
                }
            }else{
                if(isset($_SESSION[$clave])){
                    unset($_SESSION[$clave]);
                }
            }
        }else{
            session_destroy();
        }
    }
    

    /**
    *
    * Setea una nueva variable de session
    * @param strClave, valor
    * @return nada
    * @throws vacio.
    *
    **/
    static public function setSessionVariable($strClave, $valor){

        error_log(__METHOD__." ".$strClave);
        if(!empty($strClave))
            $_SESSION[$strClave] = $valor;
    }

     /**
    *
    * Devuelve una nueva variable de session
    * @param string.
    * @return Array o variable
    * @throws vacio.
    *
    **/
    static public function getSessionVariable($strClave){
        error_log(__METHOD__." ".$strClave);
        if(isset($_SESSION[$strClave]))
            return $_SESSION[$strClave];
    }
    
}

?>