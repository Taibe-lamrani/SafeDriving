<?php
include '../connection.php';
?>
<p>
<label>Vehicule :</label>
<select name="vehicle_id" >
<?php
$idType = htmlentities($_POST['idType']);

    $sqlVehicule = "SELECT * FROM vehicle WHERE vehicle_dispo = 1 AND type_id = ".$idType ;
    $reqVehicule = mysql_query($sqlVehicule)or die(mysql_error());
    mysql_close();
    while ($resVehicule = mysql_fetch_array($reqVehicule)){
        echo'<option value="'.$resVehicule['vehicle_id'].'" >'.$resVehicule['vehicle_name'].'</option>';
}
?>
</select>
</p>