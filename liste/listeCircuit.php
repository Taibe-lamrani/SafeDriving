<?php
include '../connection.php';
?>
<p>
<label>Circuit :</label>
<select name="circuit_id" >
    <option selected="selected">--- Choix du circuit ---</option>
<?php

$type = htmlentities($_POST['type']);

    $sqlCircuit = "SELECT * FROM circuit WHERE circuit_dispo = 1 AND type_id = ".$type;
    $reqCircuit = mysql_query($sqlCircuit)or die(mysql_error());
    mysql_close();
    while ($resCircuit = mysql_fetch_array($reqCircuit)){
        echo'<option value="'.$resCircuit['circuit_id'].'" >'.$resCircuit['circuit_place'].'</option>';
}
?>
</select>
</p>