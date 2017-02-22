<?php
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

$template->assign('fil','Edition des paramètres');

// //MEMBRES SANS GROUPES

// $countMembres = $idResult3->rowCount();
// $template->assign('countMembresSansGroupe', $countMembres);

$row=$idResult->fetch(PDO::FETCH_ASSOC);
// VARIABLES BDD GROUPS
$asso_id = $row['asso_id'];
$asso_name = $row['asso_name'];
$asso_description = $row['asso_description'];
$asso_mail = $row['asso_mail'];
$asso_Image = $row['asso_image'];
$asso_adress = $row['asso_adress'];
$asso_mobile = $row['asso_mobile'];
$asso_domainName = $row['asso_domainName'];
$asso_dateCreation = $row['asso_dateCreation'];
$asso_rna = $row['asso_rna'];


// VARIABLES SMARTY ASSO
$template->assign('asso_id', $asso_id);
$template->assign('asso_name', $asso_name);
$template->assign('asso_description', $asso_description);
$template->assign('asso_mail', $asso_mail);
$template->assign('asso_image', $asso_Image);
$template->assign('asso_adress', $asso_adress);
$template->assign('asso_mobile', $asso_mobile);
$template->assign('asso_domainName', $asso_domainName);
$template->assign('asso_dateCreation', $asso_dateCreation);
$template->assign('asso_rna', $asso_rna);


// AFFICHAGE PARAMETRES
$idResult2 = detailParamAsso($id);
$row2=$idResult2->fetch(PDO::FETCH_ASSOC);
$assoName = $row2['asso_name'];
$assoLogo = $row2['asso_image'];
$template->assign('assoName', $assoName);
$template->assign('assoLogo', $assoLogo);
//FIN

if(!empty($_GET['success'])){
	$template->assign('success', $_GET['success']);

}elseif( !empty($_GET['error'])){
	$template->assign('success', '0');
	$template->assign('error', $_GET['error']);
}else{
	$template->assign('success', '0');
	$template->assign('error', '0');
}


//MEMBRES SANS GROUPES
$countMembres = $idResult9->rowCount();
$template->assign('countMembresSansGroupe', $countMembres);

$template->display('templates/header.tpl');
$template->display('templates/asso/details.tpl');
$template->display('templates/footer.tpl');
?>