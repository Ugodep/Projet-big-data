<?php

$id=$_POST['Id_Praticien'];

require __DIR__ . '/../connexion.php';
echo "Connexion réussie à la base de données<br>";

$sql = "UPDATE Professionnel SET Actif = 1 WHERE Id_Praticien='$id'";
$Resultat = $base->exec($sql);
if($Resultat == 0)
{
echo "<br>aucun professionnel désactivé avec l'id ".$id;
}
else
{
echo "<br>le professionnel ".$id." est réactivé";
}
echo "<br><a href='index.php'>Retour</a>";
?>
