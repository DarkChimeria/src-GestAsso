<?php
/**************************************************************************
Script de cours PHP - MVC - Smarty
**************************************************************************/

require_once 'models/users/users.php';



function add(){
	$idResult9 = usersNotIn();
	require_once 'users/add.php';

}

function details($id){
	$idResult = detailsUser($id);
	$idResult9 = usersNotIn();
	require_once 'users/details.php';
}

function liste(){
	$idResult9 = usersNotIn();
	$idResult = listeUsers();
	$idResult6 = settingsAffichage();
	require_once 'users/list.php';
}

function carteLicence($user_name,$user_firstname,$group_actif,$user_dateCreation,$usertype_name,$assoLogo,$user_profilPicture,$assoName){
	$numlicence = $user_name.$user_dateCreation.$user_firstname;
	$nomprenom = $user_name . ' ' . $user_firstname;
	$profilPicture = $user_profilPicture;
	$file = "upload_files/user_license/".$user_name.".png";
	$logo = "upload_files/association_settings/logo-mini.png";
	ini_set("gd.jpeg_ignore_warning", 1);

	$font = 'includes/libs/bootstrap/fonts/arial.ttf';

	// EXTRACTION DE L'EXTENSION DE L'IMAGE
	$imgExt = strtolower(pathinfo($user_profilPicture,PATHINFO_EXTENSION));
	$valid_extensions = array('jpeg', 'jpg', 'png', 'gif');

	// CONDITION TEST SUR L'EXTENSION
	// SI L'EXTENSION EST UN GIF, JPG, JPEG OU PNG
	// L'IMAGE EST ALORS REPASSEE EN PNG POUR LA CREATION DE LA CARTE
	if(in_array($imgExt, $valid_extensions)){

   	switch ($imgExt) {
   		case 'jpg':
   		case 'jpeg':
   		$im2 = imagecreatefrompng($profilPicture);
   		break;
   		case 'gif':
   		$im2 = imagecreatefrompng($profilPicture);
   		break;
   		case 'png':
   		$im2 = imagecreatefrompng($profilPicture);
   		break;
   	} 
   }
	$im3 = imagecreatefrompng($logo);

	$im = imagecreatefrompng("upload_files/association_settings/bg-carte.png");
	
	$black = imagecolorallocate($im, 0, 0, 0);
	$white = imagecolorallocate($im, 255, 255, 255);
	$grey = imagecolorallocate($im, 102, 102, 102);


	// TAILLE DE L'IMAGE UTILISATEUR, PERMET LA BONNE DIMENSION
	// DANS imagecopy()
	$width=ImageSx($im2);
	$height=ImageSy($im2); 


	imagecopy($im, $im2, 379, 191, 0, 0, $width, $height);
	imagecopy($im, $im3, 720, 60, 0, 0, 200, 173);
	
	imagettftext($im, 30, 0, 61, 70, $white, $font, $nomprenom);
	imagettftext($im, 20, 0, 61, 120, $white, $font, $group_actif);
	imagettftext($im, 20, 0, 440, 490, $grey, $font, 'N° Licence');
	imagettftext($im, 20, 0, 300, 530, $grey, $font, $numlicence);
	// CREATION DE LA CARTE ENTIERE
	imagepng($im, $file);
	imagedestroy($im);
	//}

	return $file;	
}


function send_mail($user_mail,$message,$subject,$file)
{						
	require_once('includes/libs/PHPmailer/class.phpmailer.php');
	$mail = new PHPMailer();
	$mail->IsSMTP(); 
	$mail->SMTPDebug  = 0;                     
	$mail->SMTPAuth   = true;                  
	$mail->SMTPSecure = "ssl";                 
	$mail->Host       = "smtp.gmail.com";      
	$mail->Port       = 465;             
	$mail->AddAddress($user_mail);
	$mail->Username="groupe3disii@gmail.com";  
	$mail->Password="Anthony28";            
	$mail->SetFrom('groupe3disii@gmail.com','Gestionnaire');
	$mail->AddReplyTo("groupe3disii@gmail.com","Gestionnaire");
	$mail->Subject    = $subject;
	$mail->MsgHTML($message);
	$mail->AddAttachment($file);
	$mail->Send();
}