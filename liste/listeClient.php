<?php
include '../connection.php';
?>
<p>
    <label>Choissisez votre Client</label>
    <select name="client" onChange="verifierStudent();">
<?php

$listeClient = htmlentities($_POST['listeClient']);

    $sqlListeClient = "SELECT * FROM student WHERE school_id = ".$listeClient;
    $reqListeClient = mysql_query($sqlListeClient)or die(mysql_error());
    mysql_close();
    while ($resListeClient = mysql_fetch_array($reqListeClient)){
        echo'<option value="'.$resListeClient['student_id'].'" >'.$resListeClient['student_firstName'].' - '.$resListeClient['student_name'].'</option>';
}
?>
    </select>

</p>