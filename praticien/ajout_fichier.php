<?php

$Id_Examen = $_POST['Id_Examen'];
$Nom_fichier = $_POST['Nom_fichier'];
$Format_fichier = $_POST['Format_fichier'];
$Largeur_pixels = $_POST['Largeur_pixels'];
$Hauteur_pixels = $_POST['Hauteur_pixels'];
$Taille_octets = $_POST['Taille_octets'];
$Date_creation = $_POST['Date_creation'];
$Chemin = $_POST['Chemin_ou_URL_stockage'];
require __DIR__ . '/../connexion.php';
echo "Connexion réussie à la base de données<br>";

$sql = "INSERT INTO Fichier_medical(Id_Fichier, Nom_fichier, Format_fichier, Largeur_pixels, Hauteur_pixels, Taille_octets, Date_creation, Chemin_ou_URL_stockage, Id_Examen)
VALUES(NULL, '$Nom_fichier', '$Format_fichier', '$Largeur_pixels', '$Hauteur_pixels', '$Taille_octets', '$Date_creation', '$Chemin', '$Id_Examen')";

$Resultat = $base->exec($sql);

echo "Fichier médical ajouté avec succès !";
echo "<br><a href='index.html'>Retour</a>";

?>
