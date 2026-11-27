<?php
try{
require __DIR__ . '/../connexion.php';
	echo "Connexion à la base de données réussie<br>";

	echo "<br> voila les patientes qui ont eu un examen :<br><br>";
	$sql = "SELECT P.Nom, P.Prenom, D.Type_examen_demande, E.Date_examen, CR.Classification, RA.Nature_lesion, RA.Caractere_benin_malin
	FROM Patiente P
	INNER JOIN Consultation C ON C.Id_Patiente = P.Id_Patiente
	INNER JOIN Prescription Pr ON Pr.Id_Consultation = C.Id_Consultation
	INNER JOIN Demande_examen D ON D.Id_Prescription = Pr.Id_Prescription
	INNER JOIN Examen E ON E.Id_Demande = D.Id_Demande
	LEFT JOIN Compte_rendu_radiologique CR ON CR.Id_Examen = E.Id_Examen
	LEFT JOIN Resultat_anapath RA ON RA.Id_Examen = E.Id_Examen";
	$resultat=$base->query($sql);
	while($ligne=$resultat->fetch(PDO::FETCH_ASSOC))
		{
		$Nom=$ligne['Nom'];
		$Prenom=$ligne['Prenom'];
		$Examen=$ligne['Type_examen_demande'];
		$Date=$ligne['Date_examen'];
		$Classification=$ligne['Classification'];
		$Nature=$ligne['Nature_lesion'];
		$Caractere=$ligne['Caractere_benin_malin'];
		echo "$Nom $Prenom -Examen : $Examen, Date : $Date, Classification : $Classification, Nature de la lésion : $Nature, Bénin ou malin : $Caractere ";
		echo "<br>";
		}
   }
catch (Exception $e){
die('Erreur : '.$e->getMessage());
}
echo "<br><a href='index.html'>Retour</a>";
?>
