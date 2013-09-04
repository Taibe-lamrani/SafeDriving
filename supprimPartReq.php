<?php
include 'connection.php';

    $studentId = (htmlspecialchars($_POST["listeClientIns"]));
    $lessonId = (htmlspecialchars($_POST["leconinscri"]));
    $supprClient = 'DELETE FROM participationlesson WHERE student_id='.$studentId.'AND lesson_id='.$lessonId;
    $lancerSupprClient = mysql_query($supprClient) or die(mysql_error());
    mysql_close();
    
    header('location: detailLesson.html');
?>