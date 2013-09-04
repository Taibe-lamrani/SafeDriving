<?php
include 'connection.php';
    $lesson_date = mysql_real_escape_string(htmlspecialchars  ($_POST['lesson_date']));
    $lesson_placeNbr = mysql_real_escape_string(htmlspecialchars  ($_POST['lesson_placeNbr']));
    $type_id = mysql_real_escape_string(htmlspecialchars  ($_POST['type_id']));
    $vehicule_id = mysql_real_escape_string(htmlspecialchars  ($_POST['vehicle_id']));
    $circuit_id = mysql_real_escape_string(htmlspecialchars  ($_POST['circuit_id']));
    $instructor_id = mysql_real_escape_string(htmlspecialchars  ($_POST['instructor']));
    $pack_id = mysql_real_escape_string(htmlspecialchars  ($_POST['pack_id']));

        $sql = "INSERT INTO lesson VALUES('','$lesson_date', '$lesson_placeNbr', '$type_id', '$vehicule_id', '$circuit_id', '$instructor_id', '$pack_id')";
            mysql_query($sql) or die(mysql_error());
        $sqlUpdateV = "UPDATE vehicle SET vehicle_dispo = 0 WHERE vehicle_id=".$vehicule_id;
            mysql_query($sqlUpdateV) or die(mysql_error());
        $sqlUpdateC = "UPDATE circuit SET circuit_dispo = 0 WHERE circuit_id=".$circuit_id;
            mysql_query($sqlUpdateC) or die(mysql_error());
        $sqlUpdateI = "UPDATE instructor SET instructor_dispo = 0 WHERE instructor_id=".$instructor_id;
            mysql_query($sqlUpdateI) or die(mysql_error());

        mysql_close();
        header('location:gestionFormation.html');
?>