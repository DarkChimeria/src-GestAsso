<?php
$tmp = 'd11edf197cf9bf42c186048470ca09ef';
$droite = "tk!@";
$gauche = "ar30o&b%";
$token = hash('ripemd128',"$gauche.$tmp.$droite");

echo $token;