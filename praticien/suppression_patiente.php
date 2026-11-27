<?php

$supp=$_POST['Id_Patiente'];

if(isset($supp))
{
require '../connexion.php';
	echo "Connexion réussie à la base de données<br>";

	// echoue si la patiente a encore des consultations ou des données
	try
	{
    $sql = "delete from Patiente where Id_Patiente='$supp'";
	$Resultat = $base->exec($sql);
	if($Resultat == 0)
	{
	echo "<br>aucune patiente avec l'id ".$supp;
	}
	else
	{
    echo "<br>la patiente ".$supp." est supprimée";
	}
	}
	catch(PDOException $e)
	{
	echo "<br>impossible de supprimer la patiente ".$supp." car elle a encore des données liées";
	}
}
echo "<br><a href='index.php'>Retour</a>";
?>
