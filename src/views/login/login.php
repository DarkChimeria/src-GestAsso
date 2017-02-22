<?php
/**************************************************************************
Script de cours PHP - MVC - Smarty
**************************************************************************/

require_once 'includes/libs/Smarty/Smarty.class.php';


$template = new Smarty();



if(isset($_POST['connect'])){

	$tmplogin = $_POST['user_pseudo'];
	$tmppw = $_POST['user_password'];

	echo 'entrée';
	$idResult = connect($tmplogin);


	if($idResult->rowCount() == 1){

		$row = $idResult->fetch(PDO::FETCH_NUM);
		$droite = "tk!@";
		$gauche = "ar30o&b%";
		$token = hash('ripemd128',"$gauche.$tmppw.$droite");

		if($token == $row[13]){
			session_start();
			$_SESSION['login'] = $tmplogin;
			$_SESSION['id'] = $row[0];
			$_SESSION['nom'] = $row[1];
			$_SESSION['prenom'] = $row[2];
			$_SESSION['avatar'] = $row[12];
			$_SESSION['usertype_id'] = $row[14];
			Header('Location: index.php');

		}else{
			echo ("Pas le bon mdp");
		}

	}else{

		echo ("Pas le bon login");
	}

}

if(!isset($_SESSION['login'])){

	$template->assign('idlog','0');

}





$template->assign('title','Login');



$template->display('templates/login/login.tpl');
