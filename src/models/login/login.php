<?php
/**************************************************************************
Script de cours PHP - MVC - Smarty
**************************************************************************/

include 'models/models.php';

function connect($tmplogin){
	$cnx = getBD();
	$sql = "SELECT * FROM users WHERE user_pseudo = ?";
	$idResult  = executeR($cnx,$sql,array($tmplogin));
	return $idResult;
}