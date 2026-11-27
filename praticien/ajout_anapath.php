<?php

$Id_Examen = $_POST['Id_Examen'];
$Id_Praticien = $_POST['Id_Praticien'];
$Date_resultat = $_POST['Date_resultat'];
$Type_prelevement = $_POST['Type_prelevement'];
$Nature_lesion = $_POST['Nature_lesion'];
$Caractere = $_POST['Caractere_benin_malin'];
$Descriptions = $_POST['Descriptions'];
$Conclusions = $_POST['Conclusions'];
$base = new PDO('mysql:host=localhost;dbname=pink_data', 'root', 'root');
echo "Connexion réussie à la base de données<br>";

$sql = "INSERT INTO Resultat_anapath(Id_Resultat_anapath, Date_resultat, Type_prelevement, Descriptions, Nature_lesion, Caractere_benin_malin, Conclusions, Id_Examen, Id_Praticien)
VALUES(NULL, '$Date_resultat', '$Type_prelevement', '$Descriptions', '$Nature_lesion', '$Caractere', '$Conclusions', '$Id_Examen', '$Id_Praticien')";

$Resultat = $base->exec($sql);

echo "Résultat ajouté avec succès !";
echo "<br><a href='index.html'>Retour</a>";

?>
