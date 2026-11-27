<?php

$Nom = $_POST['Nom'];
$Prenom = $_POST['Prenom'];
$Specialite = $_POST['Specialite'];
$Telephone = $_POST['Telephone'];
$Email = $_POST['Email'];
$Login = $_POST['Login'];
$Mot_de_passe = password_hash($_POST['Mot_de_passe'], PASSWORD_DEFAULT);
require __DIR__ . '/../connexion.php';
echo "Connexion réussie à la base de données<br>";

$sql = "INSERT INTO Professionnel(Id_Praticien, Nom, Prenom, Specialite, Telephone, Email, Login, Mot_de_passe)
VALUES(NULL, '$Nom', '$Prenom', '$Specialite', '$Telephone', '$Email', '$Login', '$Mot_de_passe')";

$Resultat = $base->exec($sql);

echo "Professionnel ajouté avec succès ! Son id est " . $base->lastInsertId();
echo "<br><a href='index.php'>Retour</a>";

?>
