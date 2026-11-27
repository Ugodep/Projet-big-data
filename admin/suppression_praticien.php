<?php

$supp=$_POST['Id_Praticien'];

if(isset($supp))
{
try {
	require __DIR__ . '/../connexion.php';
	echo "Connexion réussie à la base de données<br>";

	$sql = "delete from Professionnel where Id_Praticien='$supp'";
	$Resultat = $base->exec($sql);
	if($Resultat == 0)
	{
	echo "<br>aucun professionnel avec l'id ".$supp;
	}
	else
	{
	echo "<br>le professionnel ".$supp." est supprimé (avec ses consultations, comptes rendus et résultats)";
	}
}
catch (Exception $e) {
	echo "<br>Erreur : ".$e->getMessage();
}
}
echo "<br><a href='index.html'>Retour</a>";
?>
