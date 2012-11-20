<?php   
 
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));

$url = $_GET['url'];


//incluir los archivos de inicio de la aplicación
require_once (ROOT . DS . 'library' . DS . 'bootstrap.php');