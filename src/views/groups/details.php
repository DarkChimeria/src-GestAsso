<?php
/**************************************************************************
Script de cours PHP - MVC - Smarty
**************************************************************************/

session_start();
require_once 'includes/libs/Smarty/Smarty.class.php';


$template = new Smarty();

$template->assign('title','Information du groupe');
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

// $listeProduits = array();
// $i = 0;

$row=$idResult->fetch(PDO::FETCH_ASSOC);
// VARIABLES BDD GROUPS
$group_id = $row['group_id'];
$group_name = $row['group_name'];
$group_description = $row['group_description'];
$group_activity = $row['group_activity'];
$group_avatar = $row['group_avatar'];
$group_cover = $row['group_cover'];
$datestart = $row['datestart'];
$datefinish = $row['datefinish'];
$group_dateCreation = $row['group_dateCreation'];



// VARIABLES SMARTY USERS
$template->assign('group_id', $group_id);
$template->assign('group_name', $group_name);
$template->assign('group_avatar', $group_avatar);
$template->assign('group_cover', $group_cover);
$template->assign('group_description', $group_description);
$template->assign('group_activity', $group_activity);
$template->assign('group_dateCreation', $group_dateCreation);


$idResult1 = historyGroup($group_id);
$idResult2 = actifsGroup($group_id);


$history = array();
$i = 0;
while($row1=$idResult1->fetch(PDO::FETCH_ASSOC)){
// VARIABLES SMARTY GROUPS
	if(!empty($row1['datestart']) && !empty($row1['datefinish'])){
		$history[$i]['ifActif'] = 0;
		$history[$i]['user_name'] = $row1['user_name'];
		$history[$i]['user_firstname'] = $row1['user_firstname'];
		$history[$i]['datestart'] = $row1['datestart'];
		$history[$i]['datefinish'] = $row1['datefinish'];
		$user_actif = $row1['user_name'];
	}
	// elseif ($row1['datefinish'] == NULL){
	// 	$history[$i]['nothing'] = 'nothing';
	// }
	$i++;
}



$actifs = array();
$a = 0;
while($row3=$idResult2->fetch(PDO::FETCH_ASSOC)){
// VARIABLES SMARTY GROUPS
	if(!empty($row3['datestart']) && $row3['datefinish'] == NULL){

		$actifs[$a]['user_id'] = $row3['user_id'];
		$actifs[$a]['user_pseudo'] = $row3['user_pseudo'];
		$actifs[$a]['user_avatar'] = $row3['user_profilPicture'];
		$actifs[$a]['datestart'] = $row3['datestart'];
		$actifs[$a]['datefinish'] = $row3['datefinish'];
		$birthday = $row3['user_birth'];
		$age = Age($birthday);
		$actifs[$a]['user_birth'] = $age;

		// COULEUR FOND USERS ACTIFS
		$avatar = $row3['user_profilPicture'];
		$actifs[$a]['couleurBG'] = dominant_color($avatar);
		// $template->assign('couleurBG', $couleurBG);
		// $user_actif = $row3['user_name'];
		// $template->assign('user_name', $user_actif);
		$template->assign('datefinish', $row3['datefinish']);

	}else{

	}

	$a++;

}

$notin = array();
$j = 0;
while($row4=$idResult9->fetch(PDO::FETCH_ASSOC)){
// VARIABLES SMARTY GROUPS

	$notin[$j]['ifActif'] = 0;
	$notin[$j]['user_id'] = $row4['user_id'];
	$notin[$j]['user_name'] = $row4['user_name'];
	$notin[$j]['user_firstname'] = $row4['user_firstname'];
	$notin[$j]['user_pseudo'] = $row4['user_pseudo'];
	$notin[$j]['user_avatar'] = $row4['user_profilPicture'];

	// COULEUR FOND USERS ACTIFS
	$avatar = $row4['user_profilPicture'];
	$notin[$j]['couleurBG'] = dominant_color($avatar);

	$birthday = $row4['user_birth'];
	$age = Age($birthday);
	$notin[$j]['user_birth'] = $age;
	$j++;
}



// if(isset($_POST['']))


$template->assign('history', $history);
$template->assign('actifs', $actifs);
$template->assign('notin', $notin);
$nbMembres = $idResult2->rowCount();
$template->assign('nbMembres', $nbMembres);


if(isset($_POST['update'])){
	$group_name = $_POST['group_name'];
	$group_description = $_POST['group_description'];
	$group_activity = $_POST['group_activity'];
	// $group_avatar = $_POST['group_avatar'];
	// $group_cover = $_POST['group_cover'];

// RECUPERATION DES INFORMATIONS DE L'IMAGE AVATAR
$imgFile = $_FILES['group_avatar']['name'];
$tmp_dir = $_FILES['group_avatar']['tmp_name'];
$imgType = $_FILES['group_avatar']['type'];


$imgFile2 = $_FILES['group_cover']['name'];
$tmp_dir2 = $_FILES['group_cover']['tmp_name'];
$imgType2 = $_FILES['group_cover']['type'];



$userpic="upload_files/group_avatar/" .rand(1000,1000000). $_FILES['group_avatar']['name'];
$userpic2="upload_files/group_cover/" .rand(1000,1000000). $_FILES['group_cover']['name']; // the path with the file name where the file will be stored, upload is the directory name. 
//echo $userpic;
if(move_uploaded_file ($_FILES['group_avatar']['tmp_name'],$userpic) && move_uploaded_file ($_FILES['group_cover']['tmp_name'],$userpic2)){
   echo "Successfully uploaded the mage";
   chmod("$userpic",0777);

}elseif(empty($imgFile) && empty($imgFile2)){
   $tsrc="upload_files/group_avatar/thumbs/default.png";
   $tsrc2="upload_files/group_cover/thumbs/default.png";
   $idResult = update($group_name,$group_description,$group_activity,$tsrc,$tsrc2,$group_id);

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
   $idResult = update($group_name,$group_description,$group_activity,$tsrc,$tsrc2,$group_id);
}


}


if($idResult1->rowCount() < 0){

	$template->assign('nothing', 'nothing');
}else{

	$template->assign('nothing', '');
}

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
$template->display('templates/groups/details.tpl');
$template->display('templates/footer.tpl');