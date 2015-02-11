<?php

require_once './APP/CONFIG/config.php';
require_once './FRAMEWORK/Includes.php';
require_once MODELS_PATH.'UserModel.php';// por problemas para llenar el modelo antes de Session::init();

error_log("--------START REQUEST--------".date('Y-m-d H:i:s'));
//error_log( __FILE__  ." ==> ".__METHOD__);

Session::init();

try{
    Bootstrap::run(new Request());
  }	
catch(Exception $objException){
    echo $objException->getMessage();
    error_log("Exception: ".$objException->getMessage()." --> ".$objException->getFile().":".$objException->getLine());
    //error_log($objException->__toString());
}

error_log("--------END REQUEST--------");


//FALTA Limpiar session, ver Model, crear una DAO....

?>