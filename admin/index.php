<?php
require __DIR__ . '/../connexion.php';
?>
<html>
<head>
<meta charset="UTF-8">
<title>Administrateur</title>
<link rel="stylesheet" href="../style.css">
<link rel="icon" href="../icone.svg">
</head>
<body>
<img src="../logo.svg" alt="Pink Data" width="200">
<h1>Administrateur</h1>
<p><a href="../deconnexion.php">Se déconnecter</a></p>

<h2>Professionnels de santé</h2>
<table>
<tr><th>Id</th><th>Nom</th><th>Prénom</th><th>Spécialité</th><th>Téléphone</th><th>Email</th><th>Identifiant</th><th>Actif</th></tr>
<?php
$sql = "SELECT *
FROM Professionnel";
$resultat=$base->query($sql);
while($ligne=$resultat->fetch(PDO::FETCH_ASSOC))
{
	$id=$ligne['Id_Praticien'];
	$Nom=$ligne['Nom'];
	$Prenom=$ligne['Prenom'];
	$Specialite=$ligne['Specialite'];
	$Telephone=$ligne['Telephone'];
	$Email=$ligne['Email'];
	$Login=$ligne['Login'];
	$Actif=$ligne['Actif'];
	echo "<tr><td>$id</td><td>$Nom</td><td>$Prenom</td><td>$Specialite</td><td>$Telephone</td><td>$Email</td><td>$Login</td><td>$Actif</td></tr>";
}
?>
</table>

<h2>Ajouter un professionnel de santé</h2>
<form action="ajout_praticien.php" method="post">
    Nom : <input type="text" name="Nom"><br>
    Prenom : <input type="text" name="Prenom"><br>
    Specialite : <input type="text" name="Specialite"><br>
    Telephone : <input type="text" name="Telephone"><br>
    Email : <input type="text" name="Email"><br>
    Identifiant : <input type="text" name="Login"><br>
    Mot de passe : <input type="password" name="Mot_de_passe"><br>
    <input type="submit" value="Ajouter">
</form>

<h2>Désactiver un professionnel de santé</h2>
<form action="desactivation_praticien.php" method="post">
    Id professionnel : <input type="number" name="Id_Praticien"><br>
    <input type="submit" value="Désactiver">
</form>

<h2>Réactiver un professionnel de santé</h2>
<form action="reactivation_praticien.php" method="post">
    Id professionnel : <input type="number" name="Id_Praticien"><br>
    <input type="submit" value="Réactiver">
</form>
</body>
</html>
