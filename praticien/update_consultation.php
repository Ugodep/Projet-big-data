<?php

$Id_Consultation = $_POST['Id_Consultation'];
$Symptomes_observes = $_POST['Symptomes_observes'];
$Conclusions = $_POST['Conclusions'];
require __DIR__ . '/../connexion.php';
echo "Connexion réussie à la base de données<br>";

$sql = "UPDATE Consultation SET Symptomes_observes='$Symptomes_observes', Conclusions='$Conclusions'
WHERE Id_Consultation='$Id_Consultation'";

$Resultat = $base->exec($sql);

if($Resultat == 0)
{
echo "aucune consultation modifiée (id inconnu ?)";
}
else
{
echo "Consultation mise à jour avec succès !";
}
echo "<br><a href='index.html'>Retour</a>";

?>
