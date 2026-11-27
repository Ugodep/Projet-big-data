<?php

$Id_Patiente = $_POST['Id_Patiente'];
$Id_Praticien = $_POST['Id_Praticien'];
$Date_consultation = $_POST['Date_consultation'];
$Heure_consultation = $_POST['Heure_consultation'];
$Motif_clinique = $_POST['Motif_clinique'];
require __DIR__ . '/../connexion.php';
echo "Connexion réussie à la base de données<br>";

$sql = "INSERT INTO Consultation(Id_Consultation, Date_consultation, Heure_consultation, Motif_clinique, Id_Patiente, Id_Praticien)
VALUES(NULL, '$Date_consultation', '$Heure_consultation', '$Motif_clinique', '$Id_Patiente', '$Id_Praticien')";

$Resultat = $base->exec($sql);

echo "Rendez-vous enregistré avec succès ! L'id de la consultation est " . $base->lastInsertId();
echo "<br><a href='index.html'>Retour</a>";

?>
