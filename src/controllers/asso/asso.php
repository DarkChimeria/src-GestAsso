<?php
/**************************************************************************
Script de cours PHP - MVC - Smarty
**************************************************************************/

require_once 'models/asso/asso.php';

function details($id){
	$idResult = detailParamAsso($id);
	$idResult9 = usersNotIn();
	require_once 'asso/details.php';
}
