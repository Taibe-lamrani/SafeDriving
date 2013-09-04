<?php
include 'connection.php';

    $studentName = mysql_real_escape_string(htmlspecialchars($_POST['studentName']));
    $studentFirstName = mysql_real_escape_string(htmlspecialchars($_POST['studentFirstName']));
    $studentEmail = mysql_real_escape_string(htmlspecialchars($_POST['studentEmail']));
    $studentPhone = mysql_real_escape_string(htmlspecialchars($_POST['studentPhone']));
    $studentCode = mysql_real_escape_string(htmlspecialchars($_POST['studentCode']));
    $studentCodeObtentionDate = mysql_real_escape_string(htmlspecialchars($_POST['studentCodeObtentionDate']));
    $studentInstructor = mysql_real_escape_string(htmlspecialchars($_POST['studentInstructor']));
    $studentSchool = mysql_real_escape_string(htmlspecialchars($_POST['studentSchool']));

$studentChange = (htmlspecialchars($_POST['studentChange']));
    
        $modifierClient = "UPDATE student SET student_name='$studentName', student_firstName='$studentFirstName', student_email='$studentEmail', student_phone='$studentPhone', student_code='$studentCode', student_codeObtentionDate='$studentCodeObtentionDate' WHERE student_id = '$studentChange'";
        mysql_query($modifierClient) or die(mysql_error());
        mysql_close();
                
    header('location: client.html');
    ?>