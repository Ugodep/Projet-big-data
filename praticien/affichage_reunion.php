<?php

$Id_Patiente = $_POST['Id_Patiente'];
try{
require __DIR__ . '/../connexion.php';
	echo "Connexion à la base de données réussie<br>";

	echo "<br> voila les réunions de la patiente :<br><br>";
	$sql = "SELECT R.Date_reunion, R.Heure_reunion, C.Synthese_decisions, C.Plan_traitement_propose, Pro.Nom, Pro.Specialite
	FROM Concerner C
	INNER JOIN Reunion R ON R.Id_Reunion = C.Id_Reunion
	LEFT JOIN Participer Pa ON Pa.Id_Reunion = R.Id_Reunion
	LEFT JOIN Professionnel Pro ON Pro.Id_Praticien = Pa.Id_Praticien
	WHERE C.Id_Patiente = '$Id_Patiente'";
	$resultat=$base->query($sql);
	while($ligne=$resultat->fetch(PDO::FETCH_ASSOC))
		{
		$Date=$ligne['Date_reunion'];
		$Heure=$ligne['Heure_reunion'];
		$Synthese=$ligne['Synthese_decisions'];
		$Plan=$ligne['Plan_traitement_propose'];
		$Praticien=$ligne['Nom'];
		$Specialite=$ligne['Specialite'];
		echo "$Date $Heure -Décisions : $Synthese, Plan de traitement : $Plan, Participant : $Praticien ($Specialite) ";
		echo "<br>";
		}
   }
catch (Exception $e){
die('Erreur : '.$e->getMessage());
}
echo "<br><a href='index.html'>Retour</a>";
?>
