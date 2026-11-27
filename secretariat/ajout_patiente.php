<?php

$Nom = $_POST['Nom'];
$Prenom = $_POST['Prenom'];
$Date_naissance = $_POST['Date_naissance'];
$Numero = $_POST['Numero'];
$Rue = $_POST['Rue'];
$Code_postal = $_POST['Code_postal'];
$Localite = $_POST['Localite'];
$Telephone = $_POST['Telephone'];
$Email = $_POST['Email'];
require __DIR__ . '/../connexion.php';
echo "Connexion réussie à la base de données<br>";

$sql = "INSERT INTO Patiente(Id_Patiente, Nom, Prenom, Date_naissance, Numero, Rue, Code_postal, Localite, Telephone, Email)
VALUES(NULL, '$Nom', '$Prenom', '$Date_naissance', '$Numero', '$Rue', '$Code_postal', '$Localite', '$Telephone', '$Email')";

$Resultat = $base->exec($sql);

echo "Patiente ajoutée avec succès ! Son id est " . $base->lastInsertId();
echo "<br><a href='index.php'>Retour</a>";

?>
