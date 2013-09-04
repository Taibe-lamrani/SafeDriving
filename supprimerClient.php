<?php
include 'connection.php';

    $studentId = (htmlspecialchars($_POST["studentId"]));
    $supprClient = 'DELETE FROM student WHERE student_id='.$studentId;
    $lancerSupprClient = mysql_query($supprClient) or die(mysql_error());
    mysql_close();

    header('location: gestionClient.html');
?>