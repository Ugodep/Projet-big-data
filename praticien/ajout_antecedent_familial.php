<?php

$Id_Patiente = $_POST['Id_Patiente'];
$Nom_maladie = $_POST['Nom_maladie'];
$Lien_parente = $_POST['Lien_parente'];
require __DIR__ . '/../connexion.php';
echo "Connexion réussie à la base de données<br>";

$sql = "INSERT INTO Antecedent_familial(Id_Antecedent_fam, Nom_maladie, Lien_parente, Id_Patiente)
VALUES(NULL, '$Nom_maladie', '$Lien_parente', '$Id_Patiente')";

$Resultat = $base->exec($sql);

echo "Antécédent familial ajouté avec succès !";
echo "<br><a href='index.php'>Retour</a>";

?>
