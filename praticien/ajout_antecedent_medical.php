<?php

$Id_Patiente = $_POST['Id_Patiente'];
$Date_diagnostic = $_POST['Date_diagnostic'];
$Nom_maladie = $_POST['Nom_maladie'];
$Traitements = $_POST['Traitements'];
$base = new PDO('mysql:host=localhost;dbname=pink_data', 'root', 'root');
echo "Connexion réussie à la base de données<br>";

$sql = "INSERT INTO Antecedent_medical(Id_Antecedent_med, Date_diagnostic, Nom_maladie, Traitements, Id_Patiente)
VALUES(NULL, '$Date_diagnostic', '$Nom_maladie', '$Traitements', '$Id_Patiente')";

$Resultat = $base->exec($sql);

echo "Antécédent médical ajouté avec succès !";
echo "<br><a href='index.html'>Retour</a>";

?>
