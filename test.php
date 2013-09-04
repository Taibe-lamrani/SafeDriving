<?php
//Creating general vars
$year = date("Y");
if(!isset($_GET['month'])) $monthnb = date("n");
else {
    $monthnb = $_GET['month'];
    $year = $_GET['year'];
    if($monthnb <= 0) {
        $monthnb = 12;
        $year = $year - 1;
    }
    elseif($monthnb > 12) {
        $monthnb = 1;
        $year = $year + 1;
    }
}
$day = date("w");
$nbdays = date("t", mktime(0,0,0,$monthnb,1,$year));
$firstday = date("w",mktime(0,0,0,$monthnb,1,$year));

//Replace the number of the day by its french name
$daytab[1] = 'Lu';
$daytab[2] = 'Ma';
$daytab[3] = 'Me';
$daytab[4] = 'Je';
$daytab[5] = 'Ve';
$daytab[6] = 'Sa';
$daytab[7] = 'Di';

//Build the calendar table
$calendar = array();
$z = (int)$firstday;
if($z == 0) $z =7;
for($i = 1; $i <= ($nbdays/5); $i++){
    for($j = 1; $j <= 7 && $j-$z+1+(($i*7)-7) <= $nbdays; $j++){
        if($j < $z && ($j-$z+1+(($i*7)-7)) <= 0){
                $calendar[$i][$j] = null;
        }
        else {
            $calendar[$i][$j] = $j-$z+1+(($i*7)-7);            
        }
    }
}

//Replace the number of the month by its french name
switch($monthnb) {
    case 1: $month = 'Janvier'; break;
    case 2: $month = 'Fevrier'; break;
    case 3: $month = 'Mars'; break;
    case 4: $month = 'Avril'; break;
    case 5: $month = 'Mai'; break;
    case 6: $month = 'Juin'; break;
    case 7: $month = 'Juillet'; break;
    case 8: $month = 'Août'; break;
    case 9: $month = 'Septembre';    break;
    case 10: $month = 'Octobre'; break;
    case 11:    $month = 'Novembre';    break;
    case 12:    $month = 'Décembre';    break;
}
?>
<div id="calendrier">
    <table>
        <tr>
            <th><span class="linkcal"><a href="index.php?month=<?php echo $monthnb - 1; ?>&year=<?php echo $year; ?>"><<</a></span></th>
            <th colspan="5" class="headcal"><?php echo($month.' '.$year);  ?></th>
            <th><span class="linkcal"><a href="index.php?month=<?php echo $monthnb + 1; ?>&year=<?php echo $year; ?>">>></a></span></th>
        </tr>
        <?php
            echo('<tr>');
            for($i = 1; $i <= 7; $i++){
                echo('<th>'.$daytab[$i].'</th>');
            }
            echo('</tr>');
            for($i = 1; $i <= count($calendar); $i++) {
                echo('<tr>');
                for($j = 1; $j <= 7 && $j-$z+1+(($i*7)-7) <= $nbdays; $j++){
                    if($j-$z+1+(($i*7)-7) == date("j") && $monthnb == date("n") && $year == date("Y")) echo('<th class="current">'.$calendar[$i][$j].'</th>');
                    else echo('<th>'.$calendar[$i][$j].'</th>');
                }
                echo('</tr>');
            }
        ?>
    </table>
</div>
