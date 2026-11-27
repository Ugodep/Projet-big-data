<?php
session_start();

$login = $_POST['login'];
$mdp = $_POST['mdp'];

if ($login == 'admin' && $mdp == 'admin')
{
	header('Location: admin/index.php');
}
else if ($login == 'secretariat' && $mdp == 'secretariat')
{
	header('Location: secretariat/index.php');
}
else
{
	require __DIR__ . '/connexion.php';
	$sql = "SELECT * FROM Professionnel WHERE Login = :Login";
	$requete = $base->prepare($sql);
	$requete->execute([
		'Login' => $login
	]);
	$ligne = $requete->fetch(PDO::FETCH_ASSOC);

	if ($ligne && password_verify($mdp, $ligne['Mot_de_passe']) && $ligne['Actif'] == 0)
	{
		echo "Ce compte est désactivé<br>";
		echo "<a href='index.html'>Retour</a>";
	}
	else if ($ligne && password_verify($mdp, $ligne['Mot_de_passe']))
	{
		$_SESSION['id_praticien'] = $ligne['Id_Praticien'];
		$_SESSION['nom'] = $ligne['Nom'];
		header('Location: praticien/index.php');
	}
	else
	{
		echo "Identifiant ou mot de passe incorrect<br>";
		echo "<a href='index.html'>Réessayer</a>";
	}
}

?>
