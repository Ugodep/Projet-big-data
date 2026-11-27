<?php

$supp=$_POST['Id_Patiente'];

if(isset($supp))
{
$base = new PDO('mysql:host=localhost;dbname=pink_data', 'root', 'root');
	echo "Connexion réussie à la base de données<br>";

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
echo "<br><a href='index.html'>Retour</a>";
?>
