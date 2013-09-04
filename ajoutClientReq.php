<?php
include 'connection.php';
            
    $studentName = mysql_real_escape_string(htmlspecialchars($_POST['studentName']));
    $studentFirstName = mysql_real_escape_string(htmlspecialchars($_POST['studentFirstName']));
    $studentEmail = mysql_real_escape_string(htmlspecialchars($_POST['studentEmail']));
    $studentPhone = mysql_real_escape_string(htmlspecialchars($_POST['studentPhone']));
    $studentCode = mysql_real_escape_string(htmlspecialchars($_POST['studentCode']));
    $studentCodeObtentionDate = mysql_real_escape_string(htmlspecialchars  ($_POST['studentCodeObtentionDate']));
    $studentInstructor = mysql_real_escape_string(htmlspecialchars($_POST['studentInstructor']));
    $studentSchool = mysql_real_escape_string(htmlspecialchars($_POST['studentSchool']));

        $AjoutClient = "INSERT INTO student VALUES('','$studentFirstName', '$studentName', '$studentEmail', '$studentPhone', '$studentCode', '$studentCodeObtentionDate', '', '', '$studentInstructor', '$studentSchool')";
        mysql_query($AjoutClient) or die(mysql_error());
        mysql_close();
header('location:client.html');
?>