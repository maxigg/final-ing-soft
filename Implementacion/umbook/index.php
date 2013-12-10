<?php



require_once './app/config/config.php';


require_once './framework/includes.php';

	

error_log("- - - - INICIO APP - - - - \n\r");
error_log( __FILE__  ." >  > ".__METHOD__);


Session::init();


try{
    Bootstrap::run(new Request());
  }	
catch(Exception $objException){
    echo $objException->getMessage();
}


error_log("- - - - FIN APP - - - - ");


//FALTA Limpiar session, ver modelo, crear una DAO....

?>