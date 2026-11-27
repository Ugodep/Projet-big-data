<?php

$Nom = $_POST['Nom'];
$Telephone = $_POST['Telephone'];
$Email = $_POST['Email'];
$Localite = $_POST['Localite'];
require '../connexion.php';

$sql = "UPDATE Patiente SET Telephone = '$Telephone', Email = '$Email', Localite = '$Localite' WHERE Nom = '$Nom'";
$Resultat = $base->exec($sql);
if($Resultat == 0)
{
echo "aucune patiente modifiée avec le nom ".$Nom;
}
else
{
echo "la patiente ".$Nom." est modifiée";
}
echo "<br><a href='index.php'>Retour</a>";
?>
