<?php 
//if(!isset($_POST['login'])) include ('loginGestion.php');
//else
if (isset($_GET['type'])){

if($_GET['type']=="gestionClient") include('gestionClient.php');
else if($_GET['type']=="gestionFormation") include('gestionFormation.php');
else if($_GET['type']=="gestionExamen")include('gestionExamen.php');
else if($_GET['type']=="gestionPlanning")include('gestionPlanning.php');
else if($_GET['type']=="detailLesson")include('detailLesson.php');
else if($_GET['type']=="studentProgress")include('studentProgress.php');
else if($_GET['type']=="ajoutExamen")include('ajoutExamen.php');
else if($_GET['type']=="chercheClient")include('chercheClient.php');
else if($_GET['type']=="chercheFormation")include('chercheFormation.php');
else if($_GET['type']=="chercheExamen")include('chercheExamen.php');
else if($_GET['type']=="modifierClient")include('modifierClient.php');
else if($_GET['type']=="modifierFormation")include('modifierFormation.php');
else if($_GET['type']=="supprimerClient")include('supprimerClient.php');
else if($_GET['type']=="supprimPart")include('supprimPart.php');
else if($_GET['type']=="ajoutPart")include('ajoutPart.php');
else if($_GET['type']=="listeFormation")include('listeFormation.php');
}
?>