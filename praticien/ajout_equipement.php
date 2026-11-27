<?php

$Type_machine = $_POST['Type_machine'];
$Localisation_salle = $_POST['Localisation_salle'];
require __DIR__ . '/../connexion.php';
echo "Connexion réussie à la base de données<br>";

$sql = "INSERT INTO Equipement(Id_Equipement, Type_machine, Localisation_salle, Etat_fonctionnement)
VALUES(NULL, '$Type_machine', '$Localisation_salle', 'en service')";

$Resultat = $base->exec($sql);

echo "Équipement ajouté avec succès ! Son id est " . $base->lastInsertId();
echo "<br><a href='index.html'>Retour</a>";

?>
