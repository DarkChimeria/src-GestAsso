<?php
/**************************************************************************
Script de cours PHP - MVC - Smarty
**************************************************************************/

require_once 'models/login/login.php';

function login(){
	require_once 'views/login/login.php';
}

function disconnect(){
	session_start();
	$_SESSION = array();
	session_destroy();
	header ("location: index.php");
}

// function read($id){
// 	$idResult = detailshome($id);
// 	$idResult2 = commandehome($id);
// 	require_once '/views/home/homeViewsDetails.php';
// }

// function add(){
// 	require_once '/views/home/homeViewsAjout.php';
// }

// function del($id){
// 	if(isset($_POST['supp'])){
// 		$idResult = suppressionhome($id);
// 	}else{
// 		$idResult = detailshome($id);
// 	}
// 	require_once '/views/home/homeViewsSuppression.php';
// }

// function edit($id){
// 	$idResult = detailshome($id);
// 	require_once '/views/home/homeViewsEdition.php';

// }
