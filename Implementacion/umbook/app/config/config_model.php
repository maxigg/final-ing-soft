<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT','C:\\wamp\\www\\umbook\\');  // con barra inicial en linux; CON barra final . Ej WIN: C:\\xampp\\htdocs\\MVC_LIMPIO1\\ Ejemplo LINUX: /mnt/hgfs/MVC_LIMPIO1/


//depende orden
define('FRAMEWORK_PATH', ROOT . 'framework' . DS);
define('APP_PATH', ROOT . 'app' . DS);
//FIN depende orden


define('DEFAULT_CONTROLLER', 'index');
define('DEFAULT_METODO', 'index');


define('DEFAULT_LAYOUT', 'default');
define('BASE_URL', 'http://localhost/umbook/'); //base url termina en barra


define('APP_NAME', 'Umbook');
define('APP_SLOGAN', 'Soluciones Informaticas');
define('APP_COMPANY', 'cibeles.net');
define('SESSION_TIME', 1);

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '1234');
define('DB_NAME', 'mvc');
define('DB_CHAR', 'utf8');

/*
Ejemplo_
define('MIDE_PDF',"/usr/bin/midepdf"); //Documentar y dar ejemplo...
*/

?>