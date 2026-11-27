<?php

$Nom = $_POST['Nom'];
$Telephone = $_POST['Telephone'];
$Email = $_POST['Email'];
$Localite = $_POST['Localite'];
try{
$base = new PDO('mysql:host=localhost;dbname=pink_data', 'root', 'root');
	echo "Connexion à la base de données réussie<br>";
$sql = "UPDATE Patiente SET Telephone = '$Telephone', Email = '$Email', Localite = '$Localite' WHERE Nom = '$Nom'";
	$Resultat = $base->exec($sql);
	echo "<h3>Une patiente a été bien modifiée</h3>";
   }
catch (Exception $e){
die('Erreur : '.$e->getMessage());
}
echo "<a href='index.html'>Retour</a>";
?>
