<?php
include 'connection.php';
$idClient = (htmlspecialchars($_POST["idClient"]));
?>
<script type="text/javascript">
function etreSur(){
    var reponse = confirm("Êtes vous sûr de vouloir supprimer ce client ?")
    if(reponse){
        alert('Client Supprimer')
    }else {
        windown.location="http://www.auriam.fr/SafeDriving";      
    }
}
</script>
<div class="menuGestion">
    <ul>
        <?php
        $affNote = "SELECT * FROM mark WHERE student_id = " .$idClient;
        $selectClient = "SELECT * FROM student WHERE student_id =" .$idClient;
        
    $recupId = mysql_query($selectClient)or die(mysql_error());
    while ($lanRecupId = mysql_fetch_array($recupId)){
        echo'<form method="POST" action="supprimerClient.php">
                <input type="hidden" name="studentId" value="'.$lanRecupId['student_id'].'"/>
                    <li><input type="image" src="ImageGestion/icones/supprimerClient.png" value="Supprimer Client" onClick="etreSur();"/></li>
             </form>';
        echo'<form method="POST" action="modifierClient.html">
                <input type="hidden" name="studentChange" value="'.$lanRecupId['student_id'].'"/>
                    <li><input type="image" src="ImageGestion/icones/modifierClient.png" value="Modifier Client" /></li>
             </form>';
    }
            ?>
    </ul>
</div>
    <table class="teteTable">
        <tr>
            <th width="40%">
            <?php
            $reqSelectClient = mysql_query($selectClient)or die(mysql_error());
            while ($resSelectClient = mysql_fetch_array($reqSelectClient)){
                echo '<span>'.$resSelectClient["student_name"].' - '.$resSelectClient["student_firstName"].'</span>';
            }
            ?>
            </th>
            <th>
                Fiche Client
            </th>
        </tr>
    </table>
    <table class="ficheDetail">
        <tr>
            <th width="50%">Nbr de leçon :</th>
            <?php
            $reqSelectClient = mysql_query($selectClient)or die(mysql_error());
            while ($resSelectClient = mysql_fetch_array($reqSelectClient)){
                echo '<td>'.$resSelectClient["student_lessonNbr"].'</td>';
            }
            ?>
        </tr>
        <tr>
            <th>
                Pack Acheter:
            </th>
            <td>
                
            </td>
        </tr>
        <tr>
            <th>Notes Reçu :</th>
            <td><ul>
            <?php
    
            $lanAffNote = mysql_query($affNote)or die(mysql_error());
            mysql_close();
            while ($resAffNote = mysql_fetch_array($lanAffNote)){
                echo '<li>'.$resAffNote["mark_value"].'</li>';
                }
            ?>        
                </ul></td>
        </tr>
    </table>