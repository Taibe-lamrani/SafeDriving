<?php
include 'connection.php';
    if (isset($_POST ['rechercheClient'])){
        $rechercheClient = mysql_real_escape_string(htmlspecialchars($_POST['rechercheClient']));
 ?>
<table>
<?php
        $req = "SELECT * FROM student where student_name LIKE %".$rechercheClient."%";
        mysql_query($req)or die(mysql_error());
        while ($res = mysql_fetch_array($req)){
            echo'<tr>';
            echo'<td width="20%">'.$res['student_firstName'].'</td>';
            echo'<td width="15%">'.$res['student_name'].'</td>';
            echo'<td width="15%">'.$res['student_email'].'</td>';
            echo'<td width="15%">'.$res['student_phone'].'</td>';
            echo'<td width="5%">'.$res['student_code'].'</td>';
            echo'<td width="15%">'.$res['student_codeObtentionDate'].'</td>';
            echo'<td width="5%">'.$res['student_lessonNbr'].'</td>';
            echo'</tr>';
        }
        ?>
</table>
<?php
    }else{
?>

<div class="formGestion">
    <form method="POST" action="" >
        <fieldset>
            <legend>Rechercher Clients</legend>
        <p>
            <label>Vous avez la possibilité de faire <br />une recherche par le Nom uniquement.</label>
            <input type="text" name="rechercheClient" value="" />
            <input type="submit" value="Rechercher" />
        </p>
        </fieldset>
    </form>
</div>
<?php
    }
 ?>