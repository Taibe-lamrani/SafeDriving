<?php
include'connection.php';
?>
<div class="menuGestion">
    <div class="menuGestionDroit">
        <ul>
            <li><img src="ImageGestion/icones/ajouterClient.png" id="ajoutClient" alt="Ajouter Client" /></li>
            <li><a href="chercheClient.php"><img src="ImageGestion/icones/rechercher.png" alt="Recherche Client"/></a></li>    
        </ul>
    </div>
    <div class="menuGestionGauche">
        <h2>Listing Clients</h2>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function(){

    $("#dateCode").datepicker({
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true
    });
});

function Ouioui()
{
    document.getElementById("cacheCode").style.display = "inline";
}
</script>
<div class="formGestion">
        <form method="POST" action="ajoutClientReq.php" name="clientForm" onSubmit="return verifClient();" enctype="multipart/form-data">
            
                <span id="messageErreur" style="display:none;">Tous les champs sont obligatoires</span><br />

            <fieldset>
                <legend>Ajout Client</legend>
            
            <p>
            <label>Nom :</label>
                <input type="text" name="studentName" id="studentName"/>
            </p>

            <p>
            <label>Prénom :</label>
            <input type="text" name="studentFirstName" id="studentFirstName" />
            </p>

           <p>
            <label>Email :</label>
                <input type="text" name="studentEmail" id="studentEmail" /><br />
           </p>

           <p>
            <label>Téléphone :</label>
                <input type="text" name="studentPhone" id="studentPhone" /><br />
           </p>
           
           <p>
               <label>Possède t'il le Code ?</label>
                    <input type="radio" name="studentCode" value="true" onClick="javacript:Ouioui();"/>Oui
                    <input type="radio" name="studentCode" selected="selected" value="false"/>Non
           </p>
           
           <p id="cacheCode" style="display: none;">
               <label>Si oui, la date d'obtention du code:</label>
               <input type="text" id="dateCode" name="studentCodeObtentionDate" />
           </p>
            <p>
            <label>Le Commercial responsables du client :</label>
            <select name="studentInstructor" >
            <?php
            
                $sqlCommercial = "SELECT * FROM commercial" ;
                $reqCommercial = mysql_query($sqlCommercial)or die(mysql_error());
                while ($resCommercial = mysql_fetch_array($reqCommercial)){
                    echo'<option value="'.$resCommercial['commercial_id'].'">'.$resCommercial['commercial_firstName'].' - '.$resCommercial['commercial_name'].'</option>';
            }
            ?>
            </select>
            </p>
           
            <p>
            <label>L'agence rattaché :</label>
            <select name="studentSchool" >
            <?php
            
                $sqlSchool = "SELECT * FROM school" ;
                $reqSchool = mysql_query($sqlSchool)or die(mysql_error());
                while ($resSchool = mysql_fetch_array($reqSchool)){
                    echo'<option value="'.$resSchool['school_id'].'" >'.$resSchool['school_place'].'</option>';
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
            <th width="20%">Prénom</th>
            <th width="15%">Nom</th>
            <th width="25%">Email</th>
            <th width="15%">Téléphone</th>
            <th width="5%">Code</th>
            <th width="15%">Date <br />D'obtention</th>
            <th width="5%">Nombre <br />Leçon </th>
        <tr>        
    </table>
        <div class="table_scroll" >
            <table class="ligneClick">
    <?php 
    
        $affClient = 'SELECT * FROM student ORDER BY student_name';
        $lancerAffClient = mysql_query($affClient) or die(mysql_error());
        mysql_close();
        
        while ($Client = mysql_fetch_array($lancerAffClient)){
            echo'<tr>';
            echo'<td width="20%">'.$Client['student_firstName'].'</td>';
            echo'<td width="15%">'.$Client['student_name'].'</td>';
            echo'<td width="15%">'.$Client['student_email'].'</td>';
            echo'<td width="15%">'.$Client['student_phone'].'</td>';
            echo'<td width="5%">'.$Client['student_code'].'</td>';
            echo'<td width="15%">'.$Client['student_codeObtentionDate'].'</td>';
            echo'<td width="5%">'.$Client['student_lessonNbr'].'</td>';
            echo'<td>
                  <form  method="POST" id="formClient" class="letGo" action="studentProgress.html">
                      <input type="hidden" name="idClient" value="'.$Client['student_id'].'" />
                      <input type="submit" id="submitButton" value="Afficher"/>
                  </form>';
            echo '</td>';
            echo'</tr>';
        }
    ?>
            </table>
        </div>
    </div>