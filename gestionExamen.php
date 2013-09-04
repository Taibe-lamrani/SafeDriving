<?php
include 'connection.php';
?>
<div class="menuGestion">
    <ul>
        <li><a href="examenAjout.php"><img src="ImageGestion/icones/ajouter.png" alt="Ajouter Examen"/></a></li>
        <li><a href="chercheExamen.php"><img src="ImageGestion/icones/rechercher.png" alt="Recherche Examen"/></a></li>
    </ul>
</div>
    <div class="table">
    <table>
        <tr>
            <th>Date</th>
            <th>Nombre de Place</th>   
        <tr>        
    </table>
        <div class="table_scroll">
    <?php 
        $sqlExamen = 'SELECT * FROM examen ORDER BY examen_date';
        $reqExamen = mysql_query($sqlExamen)or die(mysql_error());
        while ($resExamen = mysql_fetch_array($reqExamen)){
            echo'<tr>';
            echo'<td>'.$resExamen['examen_date'].'</td>';
            echo'<td>'.$resExamen['examen_placeNbr'].'</td>';
            echo'</tr>';
        }
    ?>
        </div>
    </div>