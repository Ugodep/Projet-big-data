<html>
<head>
<meta charset="UTF-8">
<title>Installer la base</title>
<link rel="stylesheet" href="style.css">
<link rel="icon" href="icone.svg">
</head>
<body>
<img src="logo.svg" alt="Pink Data" width="200">
<h1>Installer la base</h1>
<?php
if (isset($_POST['ok']))
{
	// meme mot de passe que connexion.php
	$motDePasse = (PHP_OS_FAMILY === 'Darwin') ? 'root' : '';
	$base = new PDO('mysql:host=localhost', 'root', $motDePasse);

	$base->exec(file_get_contents('pink_data_cascade.sql'));
	$base->exec(file_get_contents('donnees_test.sql'));

	echo "<p>La base pink_data est installée avec les données de test.</p>";
	echo "<a href='index.html'>Aller à la connexion</a>";
}
else
{
	echo "<p>Attention : ça efface la base pink_data et la recrée avec les données de test.</p>";
	echo "<form action='installer.php' method='post'>";
	echo "<input type='hidden' name='ok' value='1'>";
	echo "<input type='submit' value='Installer la base'>";
	echo "</form>";
}
?>
</body>
</html>
