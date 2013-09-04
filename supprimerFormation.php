<?php
include 'connection.php';

    $idLesson = (htmlspecialchars($_POST["idLesson"]));
    $supprLesson = 'DELETE FROM lesson WHERE lesson_id='.$idLesson;
    $lancerSupprLesson = mysql_query($supprLesson) or die(mysql_error());
    mysql_close();

    header('location: gestionFormation.html');
?>