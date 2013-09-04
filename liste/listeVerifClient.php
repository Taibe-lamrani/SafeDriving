<?php
include '../connection.php';

$client = htmlentities($_POST['client']);

    $sqlVerifClient = "SELECT * FROM student WHERE student_id = ".$client;
    $reqVerifClient = mysql_query($sqlVerifClient)or die(mysql_error());
    $resVerifClient = mysql_num_rows($reqVerifClient);
    mysql_close();
  
    if($resVerifClient>0){
        echo 'Ce client est déjà inscrit.';
    }
?>