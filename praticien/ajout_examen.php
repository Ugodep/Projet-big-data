<?php

$Id_Demande = $_POST['Id_Demande'];
$Id_Equipement = $_POST['Id_Equipement'];
$Date_examen = $_POST['Date_examen'];
$Heure_examen = $_POST['Heure_examen'];
require __DIR__ . '/../connexion.php';
echo "Connexion réussie à la base de données<br>";

$sql = "INSERT INTO Examen(Id_Examen, Date_examen, Heure_examen, Id_Demande, Id_Equipement)
VALUES(NULL, '$Date_examen', '$Heure_examen', '$Id_Demande', '$Id_Equipement')";

$Resultat = $base->exec($sql);

echo "Examen enregistré avec succès ! Son id est " . $base->lastInsertId();
echo "<br><a href='index.php'>Retour</a>";

?>
