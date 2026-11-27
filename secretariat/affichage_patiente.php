<?php
try{
$base = new PDO('mysql:host=localhost;dbname=pink_data', 'root', 'root');
	echo "Connexion à la base de données réussie<br>";

	$sql = "SELECT * FROM Patiente";
	$resultat=$base->query($sql);
	echo "le nombre de patientes dans la base de donnees est : ".$resultat->rowCount();
	echo "<br>";
	echo "<br>";
	while($ligne=$resultat->fetch(PDO::FETCH_ASSOC))
		{
		$id=$ligne['Id_Patiente'];
		$Nom=$ligne['Nom'];
		$Prenom=$ligne['Prenom'];
		$Naissance=$ligne['Date_naissance'];
		$Localite=$ligne['Localite'];
		$Telephone=$ligne['Telephone'];
		$Email=$ligne['Email'];
		echo "$id -Nom : $Nom, Prénom : $Prenom, Naissance : $Naissance, Localité : $Localite, Téléphone : $Telephone, Email : $Email ";
		echo "<br>";
		}
   }
catch (Exception $e){
die('Erreur : '.$e->getMessage());
}
echo "<br><a href='index.html'>Retour</a>";
?>
