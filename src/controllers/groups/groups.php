<?php
/**************************************************************************
Script de cours PHP - MVC - Smarty
**************************************************************************/

require_once 'models/groups/groups.php';

function add(){
	$idResult10 = usersNotIn();
	require_once 'groups/add.php';

}

function details($id){
	$idResult = detailsGroup($id);
	$idResult9 = usersNotIn();
	require_once 'groups/details.php';
}


function liste(){
	$idResult = listeGroups();
	$idResult6 = settingsAffichage();
	$idResult9 = usersNotIn();
	require_once 'groups/list.php';
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

function Age($birthday)
{
    $arr1 = explode('-', $birthday);
    $arr2 = explode('-', date('Y-m-d'));
		
    if(($arr1[1] < $arr2[1]) || (($arr1[1] == $arr2[1]) && ($arr1[2] <= $arr2[2])))
    return $arr2[0] - $arr1[0];

    return $arr2[0] - $arr1[0] - 1;
}


function dominant_color($avatar){
    $i = imagecreatefrompng($avatar);
    $rTotal  = '';
    $bTotal  = '';
    $gTotal  = '';
    $total = '';


    for ($x=0;$x<imagesx($i);$x++) {
        for ($y=0;$y<imagesy($i);$y++) {
            $rgb = imagecolorat($i, $x, $y);
            $r = ($rgb >> 16) & 0xFF;
            $g = ($rgb >> 8) & 0xFF;
            $b = $rgb & 0xFF;
            $rTotal += $r;
            $gTotal += $g;
            $bTotal += $b;
            $total++;
    }

}

$r = round($rTotal/$total);
$g = round($gTotal/$total);
$b = round($bTotal/$total);


$couleur = ($r).','.($g).','.($b);

return $couleur;
}


