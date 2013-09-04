<?php
include 'connection.php';
$studentChange = (htmlspecialchars($_POST['studentChange']));
?>
<script type="text/javascript">
$(document).ready(function(){

    $("#dateCodeModif").datepicker({
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true
    });
});
</script>
<div class="formGestion">
        <form method="POST" action="modifierClientReq.php"  enctype="multipart/form-data">
            
            <fieldset>
                <legend>Modifier Client</legend>
            
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
               <input type="text" id="dateCodeModif" name="studentCodeObtentionDate" />
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
            <?php
                $sqlStudentChange = "SELECT * FROM student WHERE student_id=".$studentChange;
                $reqStudentChange = mysql_query($sqlStudentChange)or die(mysql_error());
                mysql_close();
                while ($resStudentChange = mysql_fetch_array($reqStudentChange)){
                    echo'<input type="hidden" name="studentChange" value="'.$resStudentChange['student_id'].'">';                  
            }
            ?>
            <input type="submit" value="Enregistrer" />
            </fieldset>
        </form>
</div>