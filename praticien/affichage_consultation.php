<?php

try{
$base = new PDO('mysql:host=localhost;dbname=pink_data', 'root', 'root');
	echo "Connexion à la base de données réussie<br>";

	$sql = "SELECT * FROM Consultation";
	$resultat=$base->query($sql);
	echo "le nombre de consultations dans la base de donnees est : ".$resultat->rowCount();
	echo "<br>";
	echo "<br>";
	while($ligne=$resultat->fetch(PDO::FETCH_ASSOC))
		{
		$id=$ligne['Id_Consultation'];
		$Date=$ligne['Date_consultation'];
		$Heure=$ligne['Heure_consultation'];
		$Patiente=$ligne['Id_Patiente'];
		$Praticien=$ligne['Id_Praticien'];
		$Motif=$ligne['Motif_clinique'];
		$Symptomes=$ligne['Symptomes_observes'];
		$Conclusions=$ligne['Conclusions'];
		echo "$id -Date : $Date $Heure, Id patiente : $Patiente, Id praticien : $Praticien, Motif : $Motif, Symptomes : $Symptomes, Conclusions : $Conclusions ";
		echo "<br>";
		}
   }
catch (Exception $e){
die('Erreur : '.$e->getMessage());
}
echo "<br><a href='index.html'>Retour</a>";
?>
