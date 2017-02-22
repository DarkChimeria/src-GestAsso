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
// Header('Location: index.php?gestion=users&action=details&id='. $_SESSION['id']);
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

$template->assign('title','Profil du membre');


$verifUser = $idResult->rowCount();
if($verifUser == 0){

	Header( 'Location: index.php?gestion=groups&action=liste&info=1' );
}

$row=$idResult->fetch(PDO::FETCH_ASSOC);
// VARIABLES BDD USERS
$userid = $row['user_id'];
$user_name = $row['user_name'];
$user_firstname= $row['user_firstname'];
$user_pseudo = $row['user_pseudo'];
$user_birth = $row['user_birth'];
$user_adress = $row['user_adress'];
$user_cp = $row['user_cp'];
$user_city = $row['user_city'];
$user_phone = $row['user_phone'];
$user_mobile = $row['user_mobile'];
$user_mail = $row['user_mail'];
$user_gender = $row['user_gender'];
$user_profilPicture = $row['user_profilPicture'];
$usertype_id = $row['usertype_id'];
$user_dateCreation = $row['user_dateCreation'];
$user_active = $row['user_active'];
// VARIABLES BDD GROUPS
$group_name = $row['group_name'];
$datestart = $row['datestart'];
$datefinish = $row['datefinish'];

// VARIABLES BDD LICENSES
if($row['paid'] == 1){
	$license = 'Licencié';
}else{
	$license = 'Non Licencié';
}

// VARIABLES BDD USERTYPE
$usertype_name = $row['usertype_name'];

// VARIABLES SMARTY USERS
$template->assign('userid', $userid);
$template->assign('user_name', $user_name);
$template->assign('user_firstname', $user_firstname);
$template->assign('user_pseudo', $user_pseudo);
$template->assign('user_birth', $user_birth);
$template->assign('user_adress', $user_adress);
$template->assign('user_cp', $user_cp);
$template->assign('user_city', $user_city);
$template->assign('user_phone', $user_phone);
$template->assign('user_mobile', $user_mobile);
$template->assign('user_mail', $user_mail);
$template->assign('user_gender', $user_gender);
$template->assign('user_profilPicture', $user_profilPicture);
$template->assign('usertype_id', $usertype_id);
$template->assign('user_dateCreation', $user_dateCreation);



// VARIABLES SMARTY LICENSES
$template->assign('license', $license);

// VARIABLES SMARTY USERTYPE
$template->assign('usertype_name', $usertype_name);

$idResult1 = historyUser($userid);

$history = array();
$i = 0;

while($row1=$idResult1->fetch(PDO::FETCH_ASSOC)){
	$history[$i]['group_id'] = $row1['group_id'];
	$history[$i]['group_name'] = $row1['group_name'];
	$history[$i]['group_description'] = $row1['group_description'];
	$history[$i]['group_activity'] = $row1['group_activity'];
	$history[$i]['datestart'] = $row1['datestart'];
	$history[$i]['datefinish'] = $row1['datefinish'];

// VARIABLES SMARTY GROUPS
	if(!empty($row1['datestart']) && $row1['datefinish'] == NULL){
		$history[$i]['ifActif'] = 1;
		$group_actif = $row1['group_name'];
		$template->assign('group_name', $group_actif);
		$template->assign('datestart', $row1['datestart']);
	}else{
		$history[$i]['ifActif'] = 0;
		$group_actif = '';
		$template->assign('group_name', 'Aucun Groupe Actif');
		$template->assign('datestart', '');
	}

	$i++;
}

$template->assign('history', $history);


// AFFICHAGE PARAMETRES
$idResult7 = settingsAffichage();
$row2=$idResult7->fetch(PDO::FETCH_ASSOC);
$assoName = $row2['asso_name'];
$assoLogo = $row2['asso_image'];
$template->assign('assoName', $assoName);
$template->assign('assoLogo', $assoLogo);
//FIN


// AFFICHAGE CARTE LICENCE
$file = carteLicence($user_name,$user_firstname,$group_actif,$user_dateCreation,$usertype_name,$assoLogo,$user_profilPicture,$assoName);

$template->assign('carteLicence', $file);


// ENVOI DE MAIL LICENCE

if(isset($_POST['licence'])){

	$message = 'Bonjour ' . $user_firstname . ',<br>' . 'Vous etes inscrit depuis ' . $user_dateCreation . '.<br>Votre groupe actif est : ' . $group_actif;
	$subject = 'Votre licence est prete';
	$sendLicence= send_mail($user_mail,$message,$subject,$file);
}


if($user_active == 1){

	$template->assign('conditionactive', 1);
	$template->assign('user_active', 'Membre Actif');


}else{
	$template->assign('conditionactive', 0);
	$template->assign('user_active', 'Membre Archivé');

}

if(isset($_POST['archiver'])){
	$archiver = 0;
	archivageUser($archiver,$userid);
}elseif(isset($_POST['activer'])){

	$activer = 1;
	archivageUser($activer,$userid);

}elseif(isset($_POST['modifier'])){
	$user_id = $_GET['id'];
	$user_name = $_POST['user_name'];
	$user_firstname = $_POST['user_firstname'];
	$user_pseudo = $_POST['user_pseudo'];
	$user_birth = $_POST['user_birth'];
	$user_adress = $_POST['user_adress'];
	$user_cp = $_POST['user_cp'];
	$user_city = $_POST['user_city'];
	$user_phone = $_POST['user_phone'];
	$user_mobile = $_POST['user_mobile'];
	$user_gender = $_POST['user_gender'];
	$user_mail = $_POST['user_mail'];
	$usertype_id = $_POST['usertype_id'];
	$userpicorigin = $row['user_profilPicture'];


	// RECUPERATION DES INFORMATIONS DE L'IMAGE AVATAR
	$imgFile = $_FILES['user_profilPicture']['name'];
	$tmp_dir = $_FILES['user_profilPicture']['tmp_name'];
	$imgType = $_FILES['user_profilPicture']['type'];
	// $userpic = 'upload_files/user_avatar/default.png';


$userpic="upload_files/user_avatar/" .rand(1000,1000000). $_FILES['user_profilPicture']['name'];


if(empty($_FILES['user_profilPicture']['name'])){

$idResult = update($user_name,$user_firstname,$user_pseudo,$user_birth,$user_adress,$user_cp,$user_city,$user_phone,$user_mobile,$user_mail,$user_gender,$usertype_id,$userpicorigin,$user_id);
}elseif (!($_FILES['user_profilPicture']['type'] =="image/jpeg" OR $_FILES['user_profilPicture']['type']=="image/gif" OR $_FILES['user_profilPicture']['type']=="image/png")){echo "Your uploaded file must be of JPG or GIF. Other file types are not allowed<BR>";
exit;
}
elseif(move_uploaded_file ($_FILES['user_profilPicture']['tmp_name'],$userpic)){
// echo "Successfully uploaded the mage";
chmod("$userpic",0777);

}else{
echo "Probleme lors de l'envoi de l'image !";
exit;
}

///////// Start the thumbnail generation//////////////
$n_width=256;          // Fix the width of the thumb nail images
$n_height=256;         // Fix the height of the thumb nail imaage
////////////////////////////////////////////

$tsrc="upload_files/user_avatar/thumbs/" .rand(1000,1000000).$_FILES['user_profilPicture']['name'];   // Path where thumb nail image will be stored
//echo $tsrc;

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
// else{

// 	echo 'pas le bon type';
// }



if (file_exists($tsrc)) {
    	$idResult = update($user_name,$user_firstname,$user_pseudo,$user_birth,$user_adress,$user_cp,$user_city,$user_phone,$user_mobile,$user_mail,$user_gender,$usertype_id,$tsrc,$user_id);
}





	
}

//MEMBRES SANS GROUPES
$countMembres = $idResult9->rowCount();
$template->assign('countMembresSansGroupe', $countMembres);

$template->display('templates/header.tpl');
$template->display('templates/users/details.tpl');
$template->display('templates/footer.tpl');