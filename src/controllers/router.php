<?php
/**************************************************************************
Script de cours PHP - MVC - Smarty
**************************************************************************/
// LOGIN
$login = 'login';
$disconnect = 'disconnect';
// USERS AND GROUPS
$add = 'add';
$list = 'liste';
$details = 'details';

switch($gestion){
	case  'home':
	require_once 'home/' . $gestion . '.php';
	break;
	case  'login':
	require_once 'login/' . $gestion . '.php';
	break;
	case  'users':
	require_once 'users/' . $gestion . '.php';
	break;
	case  'groups':
	require_once 'groups/' . $gestion . '.php';
	break;
	case  'asso':
	require_once 'asso/' . $gestion . '.php';
	break;
	default:
	echo 'Impossible !';
}


if(isset($_GET['action'])){
	$val = $_GET['action'];
}else{
	$val = '';
}



if($val == $login){
	login();
}elseif($val == $disconnect){
	disconnect();
}elseif($val == $list){
	liste();
}elseif($val == $details){
	$id = $_GET['id'];
	details($id);
}elseif($val == $add){
	add();
}elseif(empty($val)){
	home();
}
