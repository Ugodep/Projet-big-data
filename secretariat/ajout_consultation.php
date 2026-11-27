<?php

$Id_Patiente = $_POST['Id_Patiente'];
$Id_Praticien = $_POST['Id_Praticien'];
$Date_consultation = $_POST['Date_consultation'];
$Heure_consultation = $_POST['Heure_consultation'];
$Motif_clinique = $_POST['Motif_clinique'];
require '../connexion.php';
echo "Connexion réussie à la base de données<br>";

$sql = "SELECT * FROM Professionnel WHERE Id_Praticien='$Id_Praticien' AND Actif = 1";
$verif = $base->query($sql);
if($verif->rowCount() == 0)
{
die("Ce professionnel n'existe pas ou est désactivé. <a href='index.php'>Retour</a>");
}

$sql = "INSERT INTO Consultation(Id_Consultation, Date_consultation, Heure_consultation, Motif_clinique, Id_Patiente, Id_Praticien)
VALUES(NULL, '$Date_consultation', '$Heure_consultation', '$Motif_clinique', '$Id_Patiente', '$Id_Praticien')";

$base->exec($sql);

echo "Rendez-vous enregistré avec succès ! L'id de la consultation est " . $base->lastInsertId();
echo "<br><a href='index.php'>Retour</a>";

?>
