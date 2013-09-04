<?php
include '../connection.php';
?>
<p>
<label>Pack :</label>
<select name="pack_id" >
<?php

$typePack = htmlentities($_POST['typePack']);

    $sqlPack = "SELECT * FROM pack WHERE type_id = ".$typePack ;
    $reqPack = mysql_query($sqlPack)or die(mysql_error());
    mysql_close();
    while ($resPack = mysql_fetch_array($reqPack)){
        echo'<option value="'.$resPack['pack_id'].'" >'.$resPack['pack_name'].'</option>';
}
?>
</select>
</p>