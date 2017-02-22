<?php

include 'models.php';

function detailParamAsso($id){
    $cnx = getBD();
    $sql = 'SELECT * FROM settings WHERE asso_id = ?';
    $idResult  = executeR($cnx,$sql,array($id));
	return $idResult;
}

function usersNotIn(){
	$cnx = getBD();
	$sql = ('SELECT  * FROM users WHERE NOT EXISTS ( SELECT  null  FROM listusersgroup  WHERE listusersgroup.user_id = users.user_id)');
	$idResult9  = executeR($cnx,$sql);
	return $idResult9;
}

function updateParamAsso($id_asso, $asso_name, $asso_description, $asso_mail, $asso_image, $asso_adress, $asso_mobile, $asso_domainName, $asso_dateCreation, $asso_rna){
	$cnx = getBD();
	$sql = 'UPDATE settings SET asso_name=?,asso_description=?,asso_mail=?,asso_image=?,asso_adress=?,asso_mobile=?,asso_domainName=?,asso_dateCreation=?,asso_rna=? WHERE asso_id = ?';
	$idResult2  = executeR($cnx,$sql, array($id_asso,$asso_name, $asso_description, $asso_mail, $asso_image, $asso_adress, $asso_mobile, $asso_domainName, $asso_dateCreation, $asso_rna));
}

