<?php
/**************************************************************************
Script de cours PHP - MVC - Smarty
**************************************************************************/

include 'models.php';

function listeGroups(){
	$cnx = getBD();
	$sql = 'SELECT * FROM groups';
	$idResult  = executeR($cnx,$sql);
	return $idResult;
}


function listeCountLimitGroups($premierMessageAafficher,$nbGroups){
    $cnx = getBD();
    $idResult3 = $cnx->prepare('SELECT * FROM groups LIMIT :start, :fin');
    $idResult3->bindValue('start', $premierMessageAafficher, PDO::PARAM_INT);
    $idResult3->bindValue('fin', $nbGroups, PDO::PARAM_INT);
    $idResult3->execute();
    return $idResult3;
}

function detailsGroup($id){
	$cnx = getBD();
	$sql = 'SELECT * FROM users,usertype,listusersgroup,groups,licenses WHERE users.usertype_id=usertype.usertype_id AND listusersgroup.user_id = users.user_id AND listusersgroup.group_id = groups.group_id AND licenses.user_id=users.user_id AND groups.group_id = ?';
	$idResult  = executeR($cnx,$sql, array($id));
	return $idResult;
}


function addGroups($group_name,$group_description,$group_activity,$group_avatar,$group_cover,$today){
	$cnx = getBD();
	$sql = 'INSERT INTO groups(group_name,group_description,group_activity,group_avatar,group_cover,group_dateCreation) VALUES(?,?,?,?,?,?)';
	$idResult  = executeR($cnx,$sql, array($group_name,$group_description,$group_activity,$group_avatar,$group_cover,$today));
	Header('Location: index.php?gestion=groups&action=add&success=1');
}

function update($group_name,$group_description,$group_activity,$tsrc,$tsrc2,$group_id){
	$cnx = getBD();
	$sql = 'UPDATE groups SET group_name=?,group_description=?,group_activity=?,group_avatar=?,group_cover=? WHERE group_id = ?';
	$idResult  = executeR($cnx,$sql, array($group_name,$group_description,$group_activity,$tsrc,$tsrc2,$group_id));
	// Header( 'Location: index.php?success=2' );
}

function historyGroup($id){
	$cnx = getBD();
	$sql = 'SELECT * FROM users,usertype,listusersgroup,groups,licenses WHERE users.usertype_id=usertype.usertype_id AND listusersgroup.user_id = users.user_id AND listusersgroup.group_id = groups.group_id AND licenses.user_id=users.user_id AND groups.group_id = ? ORDER BY listusersgroup.datefinish DESC LIMIT 0,4';
	$idResult1  = executeR($cnx,$sql, array($id));
	return $idResult1;
}


function actifsGroup($id){
	$cnx = getBD();
	$sql = 'SELECT * FROM users,usertype,listusersgroup,groups,licenses WHERE users.usertype_id=usertype.usertype_id AND listusersgroup.user_id = users.user_id AND listusersgroup.group_id = groups.group_id AND licenses.user_id=users.user_id AND groups.group_id = ? AND listusersgroup.datefinish IS NULL ORDER BY listusersgroup.datestart DESC LIMIT 0,4';
	$idResult2  = executeR($cnx,$sql, array($id));
	return $idResult2;
}

function usersNotIn(){
	$cnx = getBD();
	$sql = ('SELECT  * FROM users WHERE NOT EXISTS ( SELECT  null  FROM listusersgroup  WHERE listusersgroup.user_id = users.user_id)');
	$idResult10  = executeR($cnx,$sql);
	return $idResult10;
}


function settingsAffichage(){
	$cnx = getBD();
	$sql = 'SELECT * FROM settings WHERE asso_id = 1';
	$idResult7 = executeR($cnx,$sql);
	return $idResult7;
}


