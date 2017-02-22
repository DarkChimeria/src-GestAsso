<?php
/**************************************************************************
Script de cours PHP - MVC - Smarty
**************************************************************************/
session_start();
require_once 'includes/libs/Smarty/Smarty.class.php';


$template = new Smarty();


if(!isset($_SESSION['login'])){
	$template->assign('nomUser', '');
	Header('Location: index.php');
}

$template->assign('nameConnect', $_SESSION['nom']);
$template->assign('firstnameConnect', $_SESSION['prenom']);
$template->assign('avatarConnect', $_SESSION['avatar']);
$template->assign('idConnect', $_SESSION['id']);

switch ($_SESSION['usertype_id']){
case 3:
$template->assign('menuTypeMembre', '<ul class="sidebar-menu"></ul>');
Header('Location: index.php?gestion=users&action=details&id='. $_SESSION['id']);
break;

case 2:
$template->assign('menuTypeMembre', '<ul class="sidebar-menu">
<li class="header">MENU</li>
<!-- Optionally, you can add icons to the links -->
<li class="active"><a href="index.php"><i class="fa fa-home"></i> <span>Accueil</span></a></li>
<li class="treeview">
	<a href="#"><i class="fa fa-user"></i> <span>Utilisateurs</span>
		<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		</span>
	</a>
	<ul class="treeview-menu">
		<li><a href="index.php?gestion=users&action=liste">Liste des utilisateurs</a></li>
		
	</ul>
</li>
<li class="treeview">
	<a href="#"><i class="fa fa-users"></i> <span>Groupes</span>
		<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		</span>
	</a>
	<ul class="treeview-menu">
		<li><a href="index.php?gestion=groups&action=liste">Liste des groupes</a></li>
		
	</ul>
</li>

</ul>');

break;

case 1:
$template->assign('menuTypeMembre', '<ul class="sidebar-menu">
<li class="header">MENU</li>
<!-- Optionally, you can add icons to the links -->
<li class="active"><a href="index.php"><i class="fa fa-home"></i> <span>Accueil</span></a></li>
<li class="treeview">
	<a href="#"><i class="fa fa-user"></i> <span>Utilisateurs</span>
		<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		</span>
	</a>
	<ul class="treeview-menu">
		<li><a href="index.php?gestion=users&action=liste">Liste des utilisateurs</a></li>
		<li><a href="index.php?gestion=users&action=add">Ajouter un utilisateur</a></li>
	</ul>
</li>
<li class="treeview">
	<a href="#"><i class="fa fa-users"></i> <span>Groupes</span>
		<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		</span>
	</a>
	<ul class="treeview-menu">
		<li><a href="index.php?gestion=groups&action=liste">Liste des groupes</a></li>
		<li><a href="index.php?gestion=groups&action=add">Ajouter un groupe</a></li>
	</ul>
</li>
<li class="treeview">
	<a href="#"><i class="fa fa-gear"></i> <span>Paramètres</span>
		<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		</span>
	</a>
	<ul class="treeview-menu">
		<li><a href="index.php?gestion=asso&action=details&id=1">Editer les paramètres du site</a></li>
		<li><a href="#">Modifier les informations</a></li>
	</ul>
</li>
</ul>');
break;
}

if(!empty($_GET['info'])){

	$template->assign('info',$_GET['info']);
}else{

	$template->assign('info','0');
}


$listeGroups = array();
$i = 0;

// while($row=$idResult->fetch(PDO::FETCH_ASSOC)){
// 	$listeProduits[$i]['reference'] = $row['reference'];
// 	$listeProduits[$i]['designation'] = $row['designation'];
// 	$listeProduits[$i]['descriptif'] = $row['descriptif'];
// 	$listeProduits[$i]['prix_unitaire_HT'] = $row['prix_unitaire_HT'];
// 	$i++;
// }
$nblignes = $idResult->rowCount();
$template->assign('title','Liste des groupes');
$template->assign('fil', 'Liste des groupes');
$template->assign('nblignes',$nblignes);



if(!empty($_GET['success'])){
	$template->assign('success', $_GET['success']);
}else{
	$template->assign('success', '0');
}

if(isset($_POST['nbAafficher']) == 10){

$nbGroups = 10;

}elseif(isset($_POST['nbAafficher']) == 15){

	$nbGroups = 15;
	
}elseif(isset($_POST['nbAafficher']) == 20){

	$nbGroups = 20;

}else{

	$nbGroups = 10;

}



$nbpages = ceil($nblignes / $nbGroups);
$template->assign('nbpages', $nbpages);

if (isset($_GET['page']))
{
    $page = $_GET['page']; // On récupère le numéro de la page indiqué dans l'adresse (livredor.php?page=4)
}
else // La variable n'existe pas, c'est la première fois qu'on charge la page
{
    $page = 1; // On se met sur la page 1 (par défaut)
}
 
// On calcule le numéro du premier message qu'on prend pour le LIMIT de MySQL
$premierMessageAafficher = ($page - 1) * $nbGroups;


$idResult3 = listeCountLimitGroups($premierMessageAafficher,$nbGroups);
$pagination = array();
$a = 0;
while($row=$idResult3->fetch(PDO::FETCH_ASSOC)){
	$pagination[$a]['group_id'] = $row['group_id'];
	$pagination[$a]['group_name'] = $row['group_name'];
	$pagination[$a]['group_description'] = $row['group_description'];
	$pagination[$a]['group_activity'] = $row['group_activity'];
	$a++;
}

$numero = array();

for ($b = 1 ; $b <= $nbpages ; $b++)
{
	$numero[] = $b;
}
$template->assign('numero', $numero);

$template->assign('pagination', $pagination);

// AFFICHAGE PARAMETRES
$idResult7 = settingsAffichage();
$row2=$idResult7->fetch(PDO::FETCH_ASSOC);
$assoName = $row2['asso_name'];
$assoLogo = $row2['asso_image'];
$template->assign('assoName', $assoName);
$template->assign('assoLogo', $assoLogo);
//FIN

//MEMBRES SANS GROUPES
$countMembres = $idResult9->rowCount();
$template->assign('countMembresSansGroupe', $countMembres);

$template->display('templates/header.tpl');
$template->display('templates/groups/list.tpl');
$template->display('templates/footer.tpl');