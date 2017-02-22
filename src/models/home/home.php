<?php
/**************************************************************************
Script de cours PHP - MVC - Smarty
**************************************************************************/

include 'models/models.php';

function recentsUsers(){
	$cnx = getBD();
	$sql = 'SELECT * FROM users,usertype,listusersgroup,groups,licenses WHERE users.usertype_id=usertype.usertype_id AND listusersgroup.user_id = users.user_id AND listusersgroup.group_id = groups.group_id AND licenses.user_id=users.user_id ORDER BY user_dateCreation DESC LIMIT 0,6 ';
	$idResult  = executeR($cnx,$sql);
	return $idResult;
}

function newUsers($lastmonth,$today){
	$cnx = getBD();
	$sql = 'SELECT COUNT(*) AS new FROM users WHERE user_dateCreation BETWEEN ? AND ? ';
	$idResult  = executeR($cnx,$sql, array($lastmonth,$today));
	return $idResult;
}

function countUsersPerGroup($groupid){
	$cnx = getBD();
	$sql = 'SELECT COUNT(user_id) AS UsersPerGroup FROM listusersgroup WHERE group_id = ? ';
	$idResult7  = executeR($cnx,$sql, array($groupid));
	return $idResult7;
}

function recentsGroups(){
	$cnx = getBD();
	$sql = 'SELECT * FROM groups ORDER BY group_dateCreation DESC LIMIT 0,3';
	$idResult2 = executeR($cnx,$sql);
	return $idResult2;
}

function listUsers(){
	$cnx = getBD();
	$sql = 'SELECT * FROM users';
	$idResult3 = executeR($cnx,$sql);
	return $idResult3;
}

function listGroups(){
	$cnx = getBD();
	$sql = 'SELECT * FROM groups';
	$idResult4 = executeR($cnx,$sql);
	return $idResult4;
}

function sommeTresorerie(){
	$cnx = getBD();
	$sql = 'SELECT SUM(price) AS tresorerie FROM licenses WHERE paid = 1';
	$idResult5 = executeR($cnx,$sql);
	return $idResult5;
}

function settingsAffichage(){
	$cnx = getBD();
	$sql = 'SELECT * FROM settings WHERE asso_id = 1';
	$idResult7 = executeR($cnx,$sql);
	return $idResult7;
}


function usersNotIn(){
	$cnx = getBD();
	$sql = ('SELECT  * FROM users WHERE NOT EXISTS ( SELECT  null  FROM listusersgroup  WHERE listusersgroup.user_id = users.user_id)');
	$idResult9  = executeR($cnx,$sql);
	return $idResult9;
}

function Age($birthday)
{
    $arr1 = explode('-', $birthday);
    $arr2 = explode('-', date('Y-m-d'));
		
    if(($arr1[1] < $arr2[1]) || (($arr1[1] == $arr2[1]) && ($arr1[2] <= $arr2[2])))
    return $arr2[0] - $arr1[0];

    return $arr2[0] - $arr1[0] - 1;
}
