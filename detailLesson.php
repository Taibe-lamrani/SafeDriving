<?php
include 'connection.php';
$lessonDates = (htmlspecialchars($_POST["lessonDate"]));
$lessonPlaceNbr = (htmlspecialchars($_POST["lessonPlaceNbr"]));
$idLesson = (htmlspecialchars($_POST["idLesson"]));
$idType = (htmlspecialchars($_POST["idType"]));
$idVehicule = (htmlspecialchars($_POST["idVehicule"]));
$idCircuit = (htmlspecialchars($_POST["idCircuit"]));
$idInstructor = (htmlspecialchars($_POST["idInstructor"]));
$idPack = (htmlspecialchars($_POST["idPack"]));
?>
<div class="menuGestion">
    <ul>
        <?php
        $selectLesson = "SELECT * FROM lesson WHERE lesson_id =" .$idLesson;
        
            $recupId = mysql_query($selectLesson)or die(mysql_error());
                while ($lanRecupId = mysql_fetch_array($recupId)){
                    echo'<form method="POST" action="supprimerFormation.php">
                            <input type="hidden" name="idLesson" value="'.$lanRecupId['lesson_id'].'"/>
                                <li><input type="image" src="ImageGestion/icones/supprimerplanning.png" value="Supprimer Formation" onClick="etreSur();"/></li>
                         </form>';
                            }
        ?>
                                <li><img src="ImageGestion/icones/modifier.png" id="modifierFormation" value="Modifier Formation" /></li>
    </ul>
</div>


<script type="text/javascript">
$(document).ready(function(){
    $("#dateLesson").datepicker({dateFormat: 'yy-mm-dd'});
});

</script>
<div class="formGestion" id="formGestionModif">
        <form method="POST" action="modifierFormationReq.php"  enctype="multipart/form-data">
            
            <fieldset>
                <legend>Modifier Formation</legend>
            
            <p>
            <label>Date :</label>
                <input id="dateLesson" type="text" name="lesson_date" value="<?php echo $lessonDates; ?>" />
            </p>
            
            <p>
            <label>Modifier le nombre de place</label>
            <input type="text" name="lesson_placeNbr" id="showLesson_placeNbr" value="<?php echo $lessonPlaceNbr; ?>"/>
            <div id="lesson_placeNbr" style="display: none">
            <select name="lesson_placeNbr"/>
                <option value="5">5</option>
                <option value="12">12</option>
            </select>
            </div>
            </p>

            <p>
            <label>Modifier le type de formation</label>
            <input type="text" name="type_id" id="showType_id" value="<?php 
                                                            $sqlType = 'SELECT * FROM type WHERE type_id='.$idType;
                                                            $reqType = mysql_query($sqlType) or die(mysql_error());
                                                            while ($resType = mysql_fetch_array($reqType)){
                                                                echo $resType['type_name'];
                                                            }
                                                            ?>"/>
               <div id="type_id" style="display: none">
            <select name="type_id" onChange="setVehicule(); setPack()">
                <?php
                $sqlType = "SELECT * FROM type";
                $reqType = mysql_query($sqlType) or die(mysql_error());
                while ($resType = mysql_fetch_array($reqType)){
                    echo'<option value="'.$resType['type_id'].'" >'.$resType['type_name'].'</option>';
                }
                ?>
            </select>
               </div>
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
               <label>Modifier le circuit</label>
           <input type="text" name="circuit_id" id="showCircuit_id" value="<?php 
                                                            $sqlCircuit = 'SELECT * FROM circuit WHERE circuit_id='.$idCircuit;
                                                            $reqCircuit = mysql_query($sqlCircuit) or die(mysql_error());
                                                            while ($resCircuit = mysql_fetch_array($reqCircuit)){
                                                                echo $resCircuit['circuit_place'];
                                                            }
                                                        ?>"/>
           <div id="circuit_id" style="display: none">
            <select name="circuit_id" >
            <?php
                $sqlCircuit = "SELECT * FROM circuit ";
                $reqCircuit = mysql_query($sqlCircuit)or die(mysql_error());
                while ($resCircuit = mysql_fetch_array($reqCircuit)){
                    echo'<option value="'.$resCircuit['circuit_id'].'" >'.$resCircuit['circuit_place'].'</option>';
            }
            ?>
            </select>
           </div>
            </p>
            
            <p>
                <label>Modifier le moniteur</label>
            <input type="text" name="instructor" id="showInstructor" value="<?php 
                                                            $sqlInstructor = 'SELECT * FROM instructor WHERE instructor_id='.$idInstructor;
                                                            $reqInstructor = mysql_query($sqlInstructor) or die(mysql_error());
                                                            while ($resInstructor = mysql_fetch_array($reqInstructor)){
                                                                echo $resInstructor['instructor_firstName'].' - '.$resInstructor['instructor_name'];
                                                            }
                                                            ?>"/>
            <div id="instructor" style="display: none">
            <select name="instructor" >
            <?php
                $sqlMoniteur = "SELECT * FROM instructor" ;
                $reqMoniteur = mysql_query($sqlMoniteur)or die(mysql_error());
                while ($resMoniteur = mysql_fetch_array($reqMoniteur)){
                    echo'<option value="'.$resMoniteur['instructor_id'].'" >'.$resMoniteur['instructor_firstName'].' - '.$resMoniteur['instructor_name'].'</option>';
            }
            ?>
            </select>
            </div>
            </p>
            <br />
			<?php
                $sqlLessonChange = "SELECT * FROM lesson WHERE lesson_id=".$idLesson;
                $reqLessonChange = mysql_query($sqlLessonChange)or die(mysql_error());
                while ($resLessonChange = mysql_fetch_array($reqLessonChange)){
                    echo'<input type="hidden" name="lessonChange" value="'.$resLessonChange['lesson_id'].'">';                  
            }
            ?>
            <input type="submit" class="submit" value="Modifier" />
            </fieldset>
        </form>
</div>


    <table class="teteTable">
        <tr>
            <th>
                <img src="ImageGestion/icones/ajouterPers.png" id="ajoutPart"/>
                <img src="ImageGestion/icones/supprimerPers.png" id="supprimPart" />
            </th>
            
            <th>
                Fiche Formation
            </th>
        </tr>
    </table>
    <table class="ficheDetail">
        <tr>
            <th>Type</th>
            <?php 
            $sqlType = 'SELECT * FROM type WHERE type_id='.$idType;
            $reqType = mysql_query($sqlType) or die(mysql_error());
            while ($resType = mysql_fetch_array($reqType)){
                echo'<td>'.$resType['type_name'].'</td>';
            }
            ?>
        </tr>
        <tr>
            <th>Vehicule</th>
            <?php 
            $sqlVehicule = 'SELECT * FROM vehicle WHERE vehicle_id='.$idVehicule;
            $reqVehicule = mysql_query($sqlVehicule) or die(mysql_error());
            while ($resVehicule = mysql_fetch_array($reqVehicule)){
                echo'<td>'.$resVehicule['vehicle_name'].'</td>';
            }
            ?>
        </tr>
        <tr>
            <th>Circuit</th>
            <?php 
            $sqlCircuit = 'SELECT * FROM circuit WHERE circuit_id='.$idCircuit;
            $reqCircuit = mysql_query($sqlCircuit) or die(mysql_error());
            while ($resCircuit = mysql_fetch_array($reqCircuit)){
                echo'<td>'.$resCircuit['circuit_place'].'</td>';
            }
            ?>
        </tr>
        <tr>
            <th>Moniteur</th>
            <?php 
                $sqlInstructor = 'SELECT * FROM instructor WHERE instructor_id='.$idInstructor;
                $reqInstructor = mysql_query($sqlInstructor) or die(mysql_error());
                while ($resInstructor = mysql_fetch_array($reqInstructor)){
                    echo'<td>'.$resInstructor['instructor_firstName'].$resInstructor['instructor_name'].'</td>';
            }
            ?>
        </tr>
        <tr>
            <th>Formule</th>
            <?php 
                $sqlPack = 'SELECT * FROM pack WHERE pack_id='.$idPack;
                $reqPack = mysql_query($sqlPack) or die(mysql_error());
                while ($resPack = mysql_fetch_array($reqPack)){
                    echo'<td>'.$resPack['pack_name'].'</td>';
                }
            ?>
        </tr>        
    </table>

<div class="formGestion" id="formGestionAjout" style="padding-top: 10px;">
    <form method="POST" action="ajoutPartReq.php" enctype="multipart/form-data">
        <?php
            $sqlStudID = 'SELECT * FROM lesson WHERE lesson_id='.$idLesson;
            $reqStudID = mysql_query($sqlStudID) or die(mysql_error());
            while ($resStudID = mysql_fetch_array($reqStudID)){
                echo'<input type="hidden" name="leconID" value="'.$resStudID['lesson_id'].'"/>';
                echo'<input type="hidden" name="nombreLesson" value="'.$resStudID['lesson_placeNbr'].'"/>';
            }
        ?>
        <fieldset>
            <p>
                <label>Selectionne votre agence :</label>
                <select name="agence" onChange="setClient();">
                <?php
                    $affAgence = 'SELECT * FROM school ORDER BY school_place';
                    $lancerAffAgence = mysql_query($affAgence) or die(mysql_error());
                    while ($agence = mysql_fetch_array($lancerAffAgence)){
                        echo'<option value="'.$agence['school_id'].'">'.$agence['school_place'].'</option>';
                    }
                ?>
                </select>
            </p>
            <div id="selectClient">
                <!--Afficher tous les clients -->
            </div>

            <div id="erreurClient">
                <!--Afficher erreur -->
            </div>
            
            <input type="image" src="ImageGestion/icones/ajouter.png" />
        </fieldset>
    </form>
</div>

    <div class="formGestion" id="formGestionSupprim" style="padding-top: 10px;">
    <form method="POST" action="supprimPartReq.php" enctype="multipart/form-data">
    <fieldset>
        <p>
            <label>Personne inscrite :</label>
            <select>
            <?php
                $sqlParticipant = 'SELECT s.student_firstName AS prenoms, s.student_name AS noms, pl.student_id AS students FROM student s, participationlesson pl WHERE s.student_id = pl.student_id AND lesson_id='.$idLesson;
                    $reqParticipant = mysql_query($sqlParticipant) or die(mysql_error());
                    while ($resParticipant = mysql_fetch_array($reqParticipant)){
                        echo'<option>'.$resParticipant['prenoms'].' - '.$resParticipant['noms'].'</option>';
                    }            ?>
            </select>
            <input type="hidden" value="<?php echo $idLesson ;?>" name="leconinscri"/>
        </p>
        <input type="image" src="ImageGestion/icones/supprimer.png" />
    </fieldset>
    </form>
    </div>