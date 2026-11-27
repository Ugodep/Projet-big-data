<?php

$Nom = $_POST['Nom'];
$Prenom = $_POST['Prenom'];
$Specialite = $_POST['Specialite'];
$Telephone = $_POST['Telephone'];
$Email = $_POST['Email'];
$base = new PDO('mysql:host=localhost;dbname=pink_data', 'root', 'root');
echo "Connexion réussie à la base de données<br>";

$sql = "INSERT INTO Professionnel(Id_Praticien, Nom, Prenom, Specialite, Telephone, Email)
VALUES(NULL, '$Nom', '$Prenom', '$Specialite', '$Telephone', '$Email')";

$Resultat = $base->exec($sql);

echo "Professionnel ajouté avec succès ! Son id est " . $base->lastInsertId();
echo "<br><a href='index.html'>Retour</a>";

?>
