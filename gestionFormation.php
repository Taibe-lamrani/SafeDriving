<?php
include 'connection.php';
?>
<div class="menuGestion">
    <div class="menuGestionDroit">
        <ul>
            <li><img src="ImageGestion/icones/ajoutFormation.png" id="ajoutFormation" alt="Ajouter Formation"/></li>
            <li><a href="listeFormation.html"><img src="ImageGestion/icones/planning.png" alt="Lister Toutes les Formations"/></a></li>
            <li><a href="chercheFormation.html"><img src="ImageGestion/icones/rechercher.png" alt="Recherche Formation"/></a></li>
        </ul>
    </div>
    <div class="menuGestionGauche">
        <h2>Formation à venir</h2>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
    $("#dateLesson").datepicker({dateFormat: 'yy-mm-dd'});
});
</script>
<div class="formGestion">
    <form method="POST" action="ajoutFormationReq.php" name="formationForm" onSubmit="return verifFormation();" enctype="multipart/form-data">        
        <fieldset>
            <legend>Ajout Formation</legend>

            <p>
            <label>Date :</label>
                <input id="dateLesson" type="text" name="lesson_date"/>
            </p>

            <p>
            <label>Nombre de place :</label>
            <select name="lesson_placeNbr">
                <option value="5">5</option>
                <option value="5">12</option>
            </select>
            </p>

           <p>
            <label>Type :</label>
            <select name="type_id" onChange="setVehicule(); setPack();">
                <?php
                $sqlType = "SELECT * FROM type";
                $reqType = mysql_query($sqlType) or die(mysql_error());
                while ($resType = mysql_fetch_array($reqType)){
                    echo'<option value="'.$resType['type_id'].'" >'.$resType['type_name'].'</option>';
                }
                ?>
            </select>
           </p>
           <div id="selectVoiture">
               <!-- Affichage des différents vehicule -->
           </div>
           
           <div id="selectCircuit">
               <!-- Affichage des circuits -->
           </div>
           
           <div id="selectPack">
               <!-- Affichage des pack -->
           </div>
           
           <p>
            <label>Circuit :</label>
            <select name="circuit_id" >
            <?php

                $sqlCircuit = "SELECT * FROM circuit WHERE circuit_dispo = 1";
                $reqCircuit = mysql_query($sqlCircuit)or die(mysql_error());
                while ($resCircuit = mysql_fetch_array($reqCircuit)){
                    echo'<option value="'.$resCircuit['circuit_id'].'" >'.$resCircuit['circuit_place'].'</option>';
            }
            ?>
            </select>
            </p>
            <p>
            <label>Moniteur :</label>
            <select name="instructor" >
            <?php
                $sqlMoniteur = "SELECT * FROM instructor WHERE instructor_dispo = 1" ;
                $reqMoniteur = mysql_query($sqlMoniteur)or die(mysql_error());
                while ($resMoniteur = mysql_fetch_array($reqMoniteur)){
                    echo'<option value="'.$resMoniteur['instructor_id'].'" >'.$resMoniteur['instructor_firstName'].' - '.$resMoniteur['instructor_name'].'</option>';
            }
            ?>
            </select>
            </p>
            <input type="submit" value="Enregistrer" />
        </fieldset>
    </form>
</div>

    <div class="table">
        <table>
            <tr>
                <th>Date</th>
                <th>Nombre Place restante</th>
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
                if($nbrLesson > 0){
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
            }
    ?>
            </table>
        </div>
    </div>