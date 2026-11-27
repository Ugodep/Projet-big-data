<?php

$id=$_POST['Id_Praticien'];

require '../connexion.php';
echo "Connexion réussie à la base de données<br>";

$sql = "UPDATE Professionnel SET Actif = 0 WHERE Id_Praticien='$id'";
$Resultat = $base->exec($sql);
if($Resultat == 0)
{
echo "<br>aucun professionnel actif avec l'id ".$id;
}
else
{
echo "<br>le professionnel ".$id." est désactivé";
}
echo "<br><a href='index.php'>Retour</a>";
?>
