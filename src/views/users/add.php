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
Header('Location: index.php');
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

if(!isset($_POST['user_name']) && !isset($_POST['user_pseudo'])){
	$user_name = '';
	$user_pseudo = '';

}elseif (empty($_POST['user_name'])){
	Header( 'Location: index.php?gestion=users&action=add&error=1' );

}else{

	// ASSIGNATION DES VALEURS POST AUX VARIABLES
	$user_name = $_POST['user_name'];
	$user_firstname = $_POST['user_firstname'];
	$user_birth = $_POST['user_birth'];
	$user_pseudo = $_POST['user_pseudo'];
	$user_adress = $_POST['user_adress'];
	$user_cp = $_POST['user_cp'];
	$user_city = $_POST['user_city'];
	$user_phone = $_POST['user_phone'];
	$user_mobile = $_POST['user_mobile'];
	$user_gender = $_POST['user_gender'];
	$user_mail = $_POST['user_mail'];
	$user_password = $_POST['user_password'];
	$usertype_id = $_POST['usertype_id'];
	$userpic = '';
	// $user_profilPicture = $_POST['user_profilPicture'];

	// SABLAGE DU PASSWORD
	$right = "tk!@";
	$left = "ar30o&b%";
	$token = hash('ripemd128',"$left.$user_password.$right");




	// RECUPERATION DES INFORMATIONS DE L'IMAGE AVATAR
	$imgFile = $_FILES['user_profilPicture']['name'];
	$tmp_dir = $_FILES['user_profilPicture']['tmp_name'];
	$imgType = $_FILES['user_profilPicture']['type'];
	// $userpic = 'upload_files/user_avatar/default.png';


$userpic="upload_files/user_avatar/" .rand(1000,1000000). $_FILES['user_profilPicture']['name']; // the path with the file name where the file will be stored, upload is the directory name. 
//echo $userpic;
if(move_uploaded_file ($_FILES['user_profilPicture']['tmp_name'],$userpic)){
echo "Successfully uploaded the mage";
chmod("$userpic",0777);

}elseif(empty($imgFile)){
$tsrc="upload_files/user_avatar/thumbs/default.png"; 	
$idResult = addUsers($user_name,$user_firstname,$user_pseudo,$user_birth,$user_adress,$user_cp,$user_city,$user_phone,$user_mobile,$user_mail,$user_gender,$tsrc,$token,$usertype_id);
$idResult1 = addLicence();

}else{
echo "Failed to upload file Contact Site admin to fix the problem";
exit;
}

///////// Start the thumbnail generation//////////////
$n_width=256;          // Fix the width of the thumb nail images
$n_height=256;         // Fix the height of the thumb nail imaage
////////////////////////////////////////////

$tsrc="upload_files/user_avatar/thumbs/" .rand(1000,1000000).$_FILES['user_profilPicture']['name'];   // Path where thumb nail image will be stored
//echo $tsrc;
if (!($_FILES['user_profilPicture']['type'] =="image/jpeg" OR $_FILES['user_profilPicture']['type']=="image/gif" OR $_FILES['user_profilPicture']['type']=="image/png")){echo "Your uploaded file must be of JPG or GIF. Other file types are not allowed<BR>";
exit;}
/////////////////////////////////////////////// Starting of GIF thumb nail creation///////////
if($_FILES['user_profilPicture']['type']=="image/png"){
	$im=ImageCreateFromPNG($userpic); 
	$width=ImageSx($im);              // Original picture width is stored
	$height=ImageSy($im);             // Original picture height is stored
	$n_height=($n_width/$width) * $height; // Add this line to maintain aspect ratio
	$newimage=imagecreatetruecolor($n_width,$n_height);                 
	imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
	ImagePng($newimage,$tsrc);
	chmod("$tsrc",0777);
}elseif(@$_FILES['user_profilPicture']['type']=="image/gif"){
	$im=ImageCreateFromGIF($userpic);
	$width=ImageSx($im);              // Original picture width is stored
	$height=ImageSy($im);                  // Original picture height is stored
	$n_height=($n_width/$width) * $height; // Add this line to maintain aspect ratio
	$newimage=imagecreatetruecolor($n_width,$n_height);
	imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
	ImagePng($newimage,$tsrc);
	chmod("$tsrc",0777);
}elseif($_FILES['user_profilPicture']['type']=="image/jpeg"){
	$im=ImageCreateFromJPEG($userpic); 
	$width=ImageSx($im);             
	$height=ImageSy($im);             // Original picture height is stored
	$n_height=($n_width/$width) * $height; // Add this line to maintain aspect ratio
	$newimage=imagecreatetruecolor($n_width,$n_height);                 
	imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
	ImagePng($newimage,$tsrc);
	chmod("$tsrc",0777);
}

if (file_exists($tsrc)) {
    	$idResult = addUsers($user_name,$user_firstname,$user_pseudo,$user_birth,$user_adress,$user_cp,$user_city,$user_phone,$user_mobile,$user_mail,$user_gender,$tsrc,$token,$usertype_id);
}


////////////////  End of JPG thumb nail creation //////////



// FIN TRAITEMENT IMAGE

}



if(!empty($_GET['success'])){
	$template->assign('success', $_GET['success']);

}elseif( !empty($_GET['error'])){
	$template->assign('success', '0');
	$template->assign('error', $_GET['error']);
}else{
	$template->assign('success', '0');
	$template->assign('error', '0');
}


// AFFICHAGE FIL D'ARIANE
$template->assign('title','Liste des membres');
$template->assign('fil', 'Ajout d\'un membre');


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
$template->display('templates/users/add.tpl');
$template->display('templates/footer.tpl');