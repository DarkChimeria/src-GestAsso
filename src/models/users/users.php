<?php
/**************************************************************************
Script de cours PHP - MVC - Smarty
**************************************************************************/

include 'models/models.php';

function listeUsers(){
	$cnx = getBD();
	$sql = 'SELECT * FROM users WHERE user_active = 1';
	$idResult  = executeR($cnx,$sql);
	return $idResult;
}

function addUsers($user_name,$user_firstname,$user_pseudo,$user_birth,$user_adress,$user_cp,$user_city,$user_phone,$user_mobile,$user_mail,$user_gender,$userpic,$token){
	$cnx = getBD();
	$sql = 'INSERT INTO users(user_name,user_firstname,user_pseudo,user_birth,user_adress,user_cp,user_city,user_phone,user_mobile,user_mail,user_gender,user_profilPicture, user_password, usertype_id,user_active) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,3,1)';
	$idResult  = executeR($cnx,$sql, array($user_name,$user_firstname,$user_pseudo,$user_birth,$user_adress,$user_cp,$user_city,$user_phone,$user_mobile,$user_mail,$user_gender,$userpic,$token));
	Header('Location: index.php?gestion=users&action=add&success=1');
}

function update($user_name,$user_firstname,$user_pseudo,$user_birth,$user_adress,$user_cp,$user_city,$user_phone,$user_mobile,$user_mail,$user_gender,$usertype_id,$userpic,$user_id){
	$cnx = getBD();
	$sql = 'UPDATE users SET user_name=?,user_firstname=?,user_pseudo=?,user_birth=?,user_adress=?,user_cp=?,user_city=?,user_phone=?,user_mobile=?,user_mail=?,user_gender=?,usertype_id=?,user_profilPicture=? WHERE user_id = ?';
	$idResult  = executeR($cnx,$sql, array($user_name,$user_firstname,$user_pseudo,$user_birth,$user_adress,$user_cp,$user_city,$user_phone,$user_mobile,$user_mail,$user_gender,$usertype_id,$userpic,$user_id));
	// Header( 'Location: index.php?success=2' );
}


function listeCountLimitUsers($premierMessageAafficher,$nbproduits){
	$cnx = getBD();
	$idResult3 = $cnx->prepare('SELECT * FROM users LIMIT :start, :fin');
	$idResult3->bindValue('start', $premierMessageAafficher, PDO::PARAM_INT);
	$idResult3->bindValue('fin', $nbproduits, PDO::PARAM_INT);
	$idResult3->execute();
	return $idResult3;
}

function detailsUser($id){
	$cnx = getBD();
	$sql = 'SELECT * FROM users,usertype,listusersgroup,groups,licenses WHERE users.usertype_id=usertype.usertype_id AND listusersgroup.user_id = users.user_id AND listusersgroup.group_id = groups.group_id AND licenses.user_id=users.user_id AND users.user_id = ?';
	$idResult  = executeR($cnx,$sql, array($id));
	return $idResult;
}


function archivageUser($archiver,$userid){

	$cnx = getBD();
	$sql = 'UPDATE users SET user_active=? WHERE user_id = ?';
	$idResult  = executeR($cnx,$sql, array($archiver,$userid));
	Header( 'Location: index.php?gestion=users&action=details&id='. $userid .'&success=2' );

}

function historyUser($id){
	$cnx = getBD();
	$sql = 'SELECT * FROM users,usertype,listusersgroup,groups,licenses WHERE users.usertype_id=usertype.usertype_id AND listusersgroup.user_id = users.user_id AND listusersgroup.group_id = groups.group_id AND licenses.user_id=users.user_id AND users.user_id = ? ORDER BY listusersgroup.datestart DESC LIMIT 0,4';
	$idResult1  = executeR($cnx,$sql, array($id));
	return $idResult1;
}

function usersNotIn(){
	$cnx = getBD();
	$sql = ('SELECT  * FROM users WHERE NOT EXISTS ( SELECT  null  FROM listusersgroup  WHERE listusersgroup.user_id = users.user_id)');
	$idResult9  = executeR($cnx,$sql);
	return $idResult9;
}

function userNotIn($id){
	$cnx = getBD();
	$sql = ('SELECT  COUNT(*) FROM users WHERE NOT EXISTS ( SELECT  null  FROM listusersgroup  WHERE listusersgroup.user_id = users.user_id AND users.user_id = ?)');
	$idResult = executeR($cnx,$sql, array($id));
	return $idResult;
}


function settingsAffichage(){
	$cnx = getBD();
	$sql = 'SELECT * FROM settings WHERE asso_id = 1';
	$idResult7 = executeR($cnx,$sql);
	return $idResult7;
}