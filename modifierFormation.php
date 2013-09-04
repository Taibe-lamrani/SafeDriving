<script type="text/javascript">
$(document).ready(function(){

    $("#dateLesson").datepicker({dateFormat: 'yy-mm-dd'});
});

</script>
<div class="formGestion">
        <form method="POST" action="modifierFormationReq.php"  enctype="multipart/form-data">
            
            <fieldset>
                <legend>Ajout Formation</legend>
            
            <p>
            <label>Date :</label>
                <input id="dateLesson" type="text" name="lesson_date" value="" />
            </p>

            <p>
            <label>Nombre de place :</label>
            <select name="lesson_placeNbr"/>
                <option value="5">5</option>
                <option value="5">12</option>
            </select>
            </p>

           <p>
            <label>Type :</label>
            <select name="type_id" onChange="setVehicule(); setPack()">
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

                $sqlCircuit = "SELECT * FROM circuit ";
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
            
                $sqlMoniteur = "SELECT * FROM instructor" ;
                $reqMoniteur = mysql_query($sqlMoniteur)or die(mysql_error());
                while ($resMoniteur = mysql_fetch_array($reqMoniteur)){
                    echo'<option value="'.$resMoniteur['instructor_id'].'" >'.$resMoniteur['instructor_firstName'].' - '.$resMoniteur['instructor_name'].'</option>';
            }
            ?>
            </select>
            </p>
            <?php
                $sqlLessonChange = "SELECT * FROM lesson WHERE lesson_id=".$lessonChange;
                $reqLessonChange = mysql_query($sqlLessonChange)or die(mysql_error());
                mysql_close();
                while ($resLessonChange = mysql_fetch_array($reqLessonChange)){
                    echo'<input type="hidden" name="lessonChange" value="'.$resLessonChange['lesson_id'].'">';                  
            }
            ?>
            <input type="submit" value="Enregistrer" />
            </fieldset>
        </form>
</div>