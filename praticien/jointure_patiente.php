<?php

$Id_Patiente = $_POST['Id_Patiente'];
try{
$base = new PDO('mysql:host=localhost;dbname=pink_data', 'root', 'root');
	echo "Connexion à la base de données réussie<br>";

	echo "<br> voila les consultations de la patiente :<br><br>";
	$sql = "SELECT C.Date_consultation, C.Motif_clinique, Pro.Nom, Pro.Specialite, D.Type_examen_demande, CR.Classification
	FROM Patiente P
	INNER JOIN Consultation C ON C.Id_Patiente = P.Id_Patiente
	INNER JOIN Professionnel Pro ON Pro.Id_Praticien = C.Id_Praticien
	LEFT JOIN Prescription Pr ON Pr.Id_Consultation = C.Id_Consultation
	LEFT JOIN Demande_examen D ON D.Id_Prescription = Pr.Id_Prescription
	LEFT JOIN Examen E ON E.Id_Demande = D.Id_Demande
	LEFT JOIN Compte_rendu_radiologique CR ON CR.Id_Examen = E.Id_Examen
	WHERE P.Id_Patiente = '$Id_Patiente'";
	$resultat=$base->query($sql);
	while($ligne=$resultat->fetch(PDO::FETCH_ASSOC))
		{
		$Date=$ligne['Date_consultation'];
		$Motif=$ligne['Motif_clinique'];
		$Praticien=$ligne['Nom'];
		$Specialite=$ligne['Specialite'];
		$Examen=$ligne['Type_examen_demande'];
		$Classification=$ligne['Classification'];
		echo "$Date -Motif : $Motif, Praticien : $Praticien ($Specialite), Examen demandé : $Examen, Classification : $Classification ";
		echo "<br>";
		}
   }
catch (Exception $e){
die('Erreur : '.$e->getMessage());
}
echo "<br><a href='index.html'>Retour</a>";
?>
