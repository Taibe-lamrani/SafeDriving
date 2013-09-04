<?php
//$serveur="localhost";
//$user_serveur="root";
//$pass_serveur="";
//$bdd_serveur="safedriving";
//
$serveur="mysql51-38.perso";
$user_serveur="auriam974";
$pass_serveur="WpRAe0zG";
$bdd_serveur="auriam974";

mysql_connect($serveur,$user_serveur,$pass_serveur) or die("erreur de connexion au serveur !!");
mysql_select_db($bdd_serveur) or die("erreur de connexion a la base de donnees");
?>