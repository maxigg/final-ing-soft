<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT','C:\\wamp\\www\\umbook\\');  

//depende orden
define('FRAMEWORK_PATH', ROOT . 'FRAMEWORK' . DS);
define('APP_PATH', ROOT . 'app' . DS);
define('DAOS_PATH', APP_PATH .  'DAOS' . DS);
define('RESOURCES_PATH', APP_PATH .  'RESOURCES' . DS);
define('MODELS_PATH', APP_PATH . 'MODELS' . DS);
//FIN depende orden

define('DEFAULT_CONTROLLER', 'Index');
define('DEFAULT_METHOD', 'index');

define('BASE_URL', 'http://localhost/umbook/'); //base url termina en barra

/* Path recursos User */
define('CSS', BASE_URL . 'APP/RESOURCES/css/');
define('IMG', BASE_URL . 'APP/RESOURCES/img/');
define('JS', BASE_URL . 'APP/RESOURCES/js/');

/* Path recursos externos */
define('PUBLIC', BASE_URL . 'APP/PUBLIC/');

define('APP_NAME', 'Umbook');

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'contra');
define('DB_NAME', 'umbook');
define('DB_CHAR', 'utf8');

/*
Ejemplo_
define('MIDE_PDF',"/usr/bin/midepdf"); //Documentar y dar ejemplo...
*/

?>