<?php

$Id_Examen = $_POST['Id_Examen'];
session_start();
if (!isset($_SESSION['id_praticien']))
{
    die("Connecte-toi d'abord. <a href='../index.html'>Connexion</a>");
}
$Id_Praticien = $_SESSION['id_praticien'];
$Date_compte_rendu = $_POST['Date_compte_rendu'];
$Localisation_lesions = $_POST['Localisation_lesions'];
$Classification = $_POST['Classification'];
$Description_images = $_POST['Description_images'];
$Conclusion = $_POST['Conclusion'];
require __DIR__ . '/../connexion.php';
echo "Connexion réussie à la base de données<br>";

$sql = "INSERT INTO Compte_rendu_radiologique(Id_Compte_rendu, Date_compte_rendu, Localisation_lesions, Classification, Conclusion, Description_images, Id_Examen, Id_Praticien)
VALUES(NULL, '$Date_compte_rendu', '$Localisation_lesions', '$Classification', '$Conclusion', '$Description_images', '$Id_Examen', '$Id_Praticien')";

$Resultat = $base->exec($sql);

echo "Compte rendu ajouté avec succès !";
echo "<br><a href='index.php'>Retour</a>";

?>
