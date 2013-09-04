<?php
include 'connection.php';
$leconID = (htmlspecialchars($_POST["leconID"]));
$client = (htmlspecialchars($_POST["client"]));
$nombreLesson = (htmlspecialchars($_POST["nombreLesson"]));
$moins = $nombreLesson-1;
    $sqlAjoutPart = "INSERT INTO participationlesson VALUES('','$leconID', '$client')";
    mysql_query($sqlAjoutPart) or die(mysql_error());
    $sqlPlaceMoins = "UPDATE lesson SET lesson_placeNbr='$moins' WHERE lesson_id= '$leconID'";
    mysql_query($sqlPlaceMoins) or die(mysql_error());
    mysql_close();
    header('location:gestionFormation.html');
?>