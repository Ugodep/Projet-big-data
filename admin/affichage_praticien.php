<?php
try{
require __DIR__ . '/../connexion.php';
	echo "Connexion à la base de données réussie<br>";

	$sql = "SELECT * FROM Professionnel";
	$resultat=$base->query($sql);
	echo "le nombre de professionnels dans la base de donnees est : ".$resultat->rowCount();
	echo "<br>";
	echo "<br>";
	while($ligne=$resultat->fetch(PDO::FETCH_ASSOC))
		{
		$id=$ligne['Id_Praticien'];
		$Nom=$ligne['Nom'];
		$Prenom=$ligne['Prenom'];
		$Specialite=$ligne['Specialite'];
		$Telephone=$ligne['Telephone'];
		$Email=$ligne['Email'];
		echo "$id -Nom : $Nom, Prénom : $Prenom, Spécialité : $Specialite, Téléphone : $Telephone, Email : $Email ";
		echo "<br>";
		}
   }
catch (Exception $e){
die('Erreur : '.$e->getMessage());
}
echo "<br><a href='index.html'>Retour</a>";
?>
