<?php
include 'connection.php';
?>
<div class="menuGestion">
    <div class="menuGestionDroit">
        <ul>
            <li><img src="ImageGestion/icones/ajoutFormation.png" id="ajoutFormation" alt="Ajouter Formation"/></li>
            <li><a href="chercheFormation.html"><img src="ImageGestion/icones/rechercher.png" alt="Recherche Formation"/></a></li>
        </ul>
    </div>
    <div class="menuGestionGauche">
        <h2>Toutes les Formations</h2>
    </div>
</div>
    <div class="table">
        <table>
            <tr>
                <th>Date</th>
                <th>Nombre Place</th>
            </tr>
        </table>
        <div class="table_scroll">
            <table class="ligneClick">
    <?php 
        $sqlFormation = 'SELECT * FROM lesson ORDER BY lesson_date';
        $reqFormation = mysql_query($sqlFormation) or die(mysql_error());
        mysql_close();
        while ($resFormation = mysql_fetch_array($reqFormation)){
            
            $nbrLesson = $resFormation['lesson_placeNbr'];
                    echo'<form  method="POST" class="letGo" action="detailLesson.html">';
                    echo'<tr>';
                    echo'<td width="20%"><input type="hidden" name="lessonDate" value="'.$resFormation['lesson_date'].'"/>'.$resFormation['lesson_date'].'</td>';
                    echo'<td width="20%"><input type="hidden" name="lessonPlaceNbr" value="'.$nbrLesson.'"/>'.$nbrLesson.'</td>';
                    echo'<td>
                            <input type="hidden" name="idLesson" value="'.$resFormation['lesson_id'].'" />
                            <input type="hidden" name="idType" value="'.$resFormation['type_id'].'" />
                            <input type="hidden" name="idVehicule" value="'.$resFormation['vehicle_id'].'" />
                            <input type="hidden" name="idCircuit" value="'.$resFormation['circuit_id'].'" />
                            <input type="hidden" name="idInstructor" value="'.$resFormation['instructor_id'].'" />
                            <input type="hidden" name="idPack" value="'.$resFormation['pack_id'].'" />
                            <input type="submit" value="Afficher"/>';
                    echo '</td>';
                    echo'</tr></form>';
            }
    ?>
            </table>
        </div>
    </div>