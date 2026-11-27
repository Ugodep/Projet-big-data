<?php
// il faut etre connecté
session_start();
if (!isset($_SESSION['id_praticien']))
{
    die("Connecte-toi d'abord. <a href='../index.html'>Connexion</a>");
}
$Id_Praticien = $_SESSION['id_praticien'];

$Id_Consultation = $_POST['Id_Consultation'];
$Symptomes_observes = $_POST['Symptomes_observes'];
$Conclusions = $_POST['Conclusions'];
require __DIR__ . '/../connexion.php';
echo "Connexion réussie à la base de données<br>";

$sql = "UPDATE Consultation SET Symptomes_observes='$Symptomes_observes', Conclusions='$Conclusions'
WHERE Id_Consultation='$Id_Consultation' AND Id_Praticien='$Id_Praticien'";

$Resultat = $base->exec($sql);

if($Resultat == 0)
{
echo "aucune consultation modifiée";
}
else
{
echo "Consultation mise à jour avec succès !";
}
echo "<br><a href='index.php'>Retour</a>";

?>
