<?php
include 'connection.php';
            $lesson_date = mysql_real_escape_string(htmlspecialchars  ($_POST['lesson_date']));
            $lesson_placeNbr = mysql_real_escape_string(htmlspecialchars  ($_POST['lesson_placeNbr']));
            $type_id = mysql_real_escape_string(htmlspecialchars  ($_POST['type_id']));
            $vehicle_id = mysql_real_escape_string(htmlspecialchars  ($_POST['vehicle_id']));
            $cicuit_id = mysql_real_escape_string(htmlspecialchars  ($_POST['circuit_id']));
            $instructor_id = mysql_real_escape_string(htmlspecialchars  ($_POST['instructor']));
            $pack_id = mysql_real_escape_string(htmlspecialchars  ($_POST['pack_id']));
            
            $lessonChange = (htmlspecialchars($_POST['lessonChange']));
             if(isset($vehicle_id) && isset($pack_id)){
                $req = "UPDATE lesson SET lesson_date='$lesson_date', lesson_placeNbr='$lesson_placeNbr', type_id='$type_id', vehicle_id='$vehicle_id', circuit_id='$cicuit_id', instructor_id='$instructor_id', pack_id='$pack_id' WHERE lesson_id =".$lessonChange;
             }else{
                 $req = "UPDATE lesson SET lesson_date='$lesson_date', lesson_placeNbr='$lesson_placeNbr', type_id='$type_id', circuit_id='$cicuit_id', instructor_id='$instructor_id' WHERE lesson_id =".$lessonChange;
             }
                mysql_query($req) or die(mysql_error());
                mysql_close();
                header('location:gestionFormation.html');
?>