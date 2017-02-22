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

if(!isset($_POST['group_name'])){
	$group_name = '';


}elseif(empty($_POST['group_name'])){
	Header( 'Location: index.php?gestion=groups&action=add&error=1' );

}elseif(isset($_POST['add'])){
	$group_name = $_POST['group_name'];
	$group_description = $_POST['group_description'];
	$group_activity = $_POST['group_activity'];
	$group_avatar = $_POST['group_avatar'];
	$group_cover = $_POST['group_cover'];
	
	$today = date('Y-m-d');
	// $idResult = addGroups($group_name,$group_description,$group_activity,$group_avatar,$group_cover,$today);

	// RECUPERATION DES INFORMATIONS DE L'IMAGE AVATAR
$imgFile = $_FILES['group_avatar']['name'];
$tmp_dir = $_FILES['group_avatar']['tmp_name'];
$imgType = $_FILES['group_avatar']['type'];


$imgFile2 = $_FILES['group_cover']['name'];
$tmp_dir2 = $_FILES['group_cover']['tmp_name'];
$imgType2 = $_FILES['group_cover']['type'];



$userpic="upload_files/group_avatar/" .rand(1000,1000000). $_FILES['user_profilPicture']['name'];
$userpic2="upload_files/group_cover/" .rand(1000,1000000). $_FILES['user_profilPicture']['name']; // the path with the file name where the file will be stored, upload is the directory name. 
//echo $userpic;
if(move_uploaded_file ($_FILES['group_avatar']['tmp_name'],$userpic) && move_uploaded_file ($_FILES['group_cover']['tmp_name'],$userpic2)){
   echo "Successfully uploaded the mage";
   chmod("$userpic",0777);

}elseif(empty($imgFile) && empty($imgFile2)){
   $tsrc="upload_files/group_avatar/thumbs/default.png";
   $tsrc2="upload_files/group_cover/thumbs/default.png";
   $idResult = addGroups($group_name,$group_description,$group_activity,$tsrc,$tsrc2,$today);

}else{
   echo "Failed to upload file Contact Site admin to fix the problem";
   exit;
}

///////// Start the thumbnail generation//////////////
$n_width=256;          // Fix the width of the thumb nail images
$n_height=256;         // Fix the height of the thumb nail imaage
////////////////////////////////////////////

$tsrc="upload_files/group_avatar/thumbs/" .rand(1000,1000000).$_FILES['group_avatar']['name'];
$tsrc2="upload_files/group_cover/thumbs/" .rand(1000,1000000).$_FILES['group_cover']['name'];   // Path where thumb nail image will be stored
//echo $tsrc;
if (!($_FILES['group_avatar']['type'] =="image/jpeg" OR $_FILES['group_avatar']['type']=="image/gif" OR $_FILES['group_avatar']['type']=="image/png") OR !($_FILES['group_cover']['type'] =="image/jpeg" OR $_FILES['group_cover']['type']=="image/gif" OR $_FILES['group_cover']['type']=="image/png")){echo "Your uploaded file must be of JPG or GIF. Other file types are not allowed<BR>";
exit;}
/////////////////////////////////////////////// Starting of GIF thumb nail creation///////////
if($_FILES['group_avatar']['type']=="image/png"){
   $im=ImageCreateFromPNG($userpic); 
   $width=ImageSx($im);              // Original picture width is stored
   $height=ImageSy($im);             // Original picture height is stored
   $n_height=($n_width/$width) * $height; // Add this line to maintain aspect ratio
   $newimage=imagecreatetruecolor($n_width,$n_height);                 
   imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
   ImagePng($newimage,$tsrc);
   chmod("$tsrc",0777);
}elseif(@$_FILES['group_avatar']['type']=="image/gif"){
   $im=ImageCreateFromGIF($userpic);
   $width=ImageSx($im);              // Original picture width is stored
   $height=ImageSy($im);                  // Original picture height is stored
   $n_height=($n_width/$width) * $height; // Add this line to maintain aspect ratio
   $newimage=imagecreatetruecolor($n_width,$n_height);
   imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
   ImagePng($newimage,$tsrc);
   chmod("$tsrc",0777);
}elseif($_FILES['group_avatar']['type']=="image/jpeg"){
   $im=ImageCreateFromJPEG($userpic); 
   $width=ImageSx($im);             
   $height=ImageSy($im);             // Original picture height is stored
   $n_height=($n_width/$width) * $height; // Add this line to maintain aspect ratio
   $newimage=imagecreatetruecolor($n_width,$n_height);                 
   imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
   ImagePng($newimage,$tsrc);
   chmod("$tsrc",0777);
}


$n_widthcover=550;
$n_heightcover=150;  

if($_FILES['group_cover']['type']=="image/png"){
   $im=ImageCreateFromPNG($userpic2); 
   $width=ImageSx($im);              // Original picture width is stored
   $height=ImageSy($im);             // Original picture height is stored
   $n_heightcover=($n_widthcover/$width) * $height; // Add this line to maintain aspect ratio
   $newimage=imagecreatetruecolor($n_widthcover,$n_heightcover);                 
   imageCopyResized($newimage,$im,0,0,0,0,$n_widthcover,$n_heightcover,$width,$height);
   ImagePng($newimage,$tsrc2);
   chmod("$tsrc2",0777);
}elseif(@$_FILES['group_cover']['type']=="image/gif"){
   $im=ImageCreateFromGIF($userpic2);
   $width=ImageSx($im);              // Original picture width is stored
   $height=ImageSy($im);                  // Original picture height is stored
   $n_heightcover=($n_widthcover/$width) * $height; // Add this line to maintain aspect ratio
   $newimage=imagecreatetruecolor($n_widthcover,$n_heightcover);
   imageCopyResized($newimage,$im,0,0,0,0,$n_widthcover,$n_heightcover,$width,$height);
   ImagePng($newimage,$tsrc2);
   chmod("$tsrc2",0777);
}elseif($_FILES['group_cover']['type']=="image/jpeg"){
   $im=ImageCreateFromJPEG($userpic2); 
   $width=ImageSx($im);             
   $height=ImageSy($im);             // Original picture height is stored
   $n_heightcover=($n_widthcover/$width) * $height; // Add this line to maintain aspect ratio
   $newimage=imagecreatetruecolor($n_widthcover,$n_heightcover);                 
   imageCopyResized($newimage,$im,0,0,0,0,$n_widthcover,$n_heightcover,$width,$height);
   ImagePng($newimage,$tsrc2);
   chmod("$tsrc2",0777);
}


if (file_exists($tsrc)) {
   $idResult = addGroups($group_name,$group_description,$group_activity,$tsrc,$tsrc2,$today);
}


////////////////  End of JPG thumb nail creation //////////



// FIN TRAITEMENT IMAGE

}

//AFFICHAGE FILD'ARIANE
$template->assign('title','Liste des membres');
$template->assign('fil', 'Ajout d\'un groupe');

//MEMBRES SANS GROUPES
$countMembres = $idResult10->rowCount();
$template->assign('countMembresSansGroupe', $countMembres);

// AFFICHAGE PARAMETRES
$idResult7 = settingsAffichage();
$row2=$idResult7->fetch(PDO::FETCH_ASSOC);
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

$template->display('templates/header.tpl');
$template->display('templates/groups/add.tpl');
$template->display('templates/footer.tpl');