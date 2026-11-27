<?php

$Id_Examen = $_POST['Id_Examen'];
// il faut etre connecté
session_start();
if (!isset($_SESSION['id_praticien']))
{
    die("Connecte-toi d'abord. <a href='../index.html'>Connexion</a>");
}
$Id_Praticien = $_SESSION['id_praticien'];
$Date_resultat = $_POST['Date_resultat'];
$Type_prelevement = $_POST['Type_prelevement'];
$Nature_lesion = $_POST['Nature_lesion'];
$Caractere = $_POST['Caractere_benin_malin'];
$Descriptions = $_POST['Descriptions'];
$Conclusions = $_POST['Conclusions'];
require __DIR__ . '/../connexion.php';
echo "Connexion réussie à la base de données<br>";

$sql = "INSERT INTO Resultat_anapath(Id_Resultat_anapath, Date_resultat, Type_prelevement, Descriptions, Nature_lesion, Caractere_benin_malin, Conclusions, Id_Examen, Id_Praticien)
VALUES(NULL, '$Date_resultat', '$Type_prelevement', '$Descriptions', '$Nature_lesion', '$Caractere', '$Conclusions', '$Id_Examen', '$Id_Praticien')";

$Resultat = $base->exec($sql);

echo "Résultat ajouté avec succès !";
echo "<br><a href='index.php'>Retour</a>";

?>
