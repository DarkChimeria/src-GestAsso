<?php
/**************************************************************************
Script de cours PHP - MVC - Smarty
**************************************************************************/
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$root = dirname(__FILE__) . DIRECTORY_SEPARATOR ;
// var_dump($_POST);
set_include_path('.' . 
    PATH_SEPARATOR . $root . 'controllers' . DIRECTORY_SEPARATOR .
    PATH_SEPARATOR . $root . 'includes' . DIRECTORY_SEPARATOR . 
    PATH_SEPARATOR . $root . 'models' . DIRECTORY_SEPARATOR . 
    PATH_SEPARATOR . $root . 'templates' . DIRECTORY_SEPARATOR . 
    PATH_SEPARATOR . $root . 'templates_c' . DIRECTORY_SEPARATOR . 
    PATH_SEPARATOR . $root . 'upload_files' . DIRECTORY_SEPARATOR . 
    PATH_SEPARATOR . $root . 'views' . DIRECTORY_SEPARATOR .
    PATH_SEPARATOR . get_include_path() 
);

require_once 'includes/config.php';

if(isset($_REQUEST['gestion'])){
	$gestion=$_REQUEST['gestion'];
}else{
	$gestion='home';
}
require_once 'controllers/router.php';
