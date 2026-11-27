<?php

$login = $_POST['login'];
$mdp = $_POST['mdp'];

if ($login == 'admin' && $mdp == 'admin')
{
	header('Location: admin/index.html');
}
else if ($login == 'secretariat' && $mdp == 'secretariat')
{
	header('Location: secretariat/index.html');
}
else if ($login == 'praticien' && $mdp == 'praticien')
{
	header('Location: praticien/index.html');
}
else
{
	echo "Identifiant ou mot de passe incorrect<br>";
	echo "<a href='index.html'>Réessayer</a>";
}

?>
