<?php
require '../connexion.php';
?>
<html>
<head>
<meta charset="UTF-8">
<title>Secrétariat</title>
<link rel="stylesheet" href="../style.css">
<link rel="icon" href="../icone.svg">
</head>
<body>
<img src="../logo.svg" alt="Pink Data" width="200">
<h1>Secrétariat</h1>
<p><a href="../deconnexion.php">Se déconnecter</a></p>

<h2>Patientes</h2>
<table>
<tr><th>Id</th><th>Nom</th><th>Prénom</th><th>Naissance</th><th>Localité</th><th>Téléphone</th><th>Email</th></tr>
<?php
$sql = "SELECT *
FROM Patiente";
$resultat=$base->query($sql);
while($ligne=$resultat->fetch(PDO::FETCH_ASSOC))
{
	$id=$ligne['Id_Patiente'];
	$Nom=$ligne['Nom'];
	$Prenom=$ligne['Prenom'];
	$Naissance=$ligne['Date_naissance'];
	$Localite=$ligne['Localite'];
	$Telephone=$ligne['Telephone'];
	$Email=$ligne['Email'];
	echo "<tr><td>$id</td><td>$Nom</td><td>$Prenom</td><td>$Naissance</td><td>$Localite</td><td>$Telephone</td><td>$Email</td></tr>";
}
?>
</table>

<h2>Professionnels de santé</h2>
<table>
<tr><th>Id</th><th>Nom</th><th>Prénom</th><th>Spécialité</th></tr>
<?php
$sql = "SELECT *
FROM Professionnel
WHERE Actif = 1";
$resultat=$base->query($sql);
while($ligne=$resultat->fetch(PDO::FETCH_ASSOC))
{
	$id=$ligne['Id_Praticien'];
	$Nom=$ligne['Nom'];
	$Prenom=$ligne['Prenom'];
	$Specialite=$ligne['Specialite'];
	echo "<tr><td>$id</td><td>$Nom</td><td>$Prenom</td><td>$Specialite</td></tr>";
}
?>
</table>

<h2>Rendez-vous</h2>
<table>
<tr><th>Id</th><th>Date</th><th>Heure</th><th>Patiente</th><th>Praticien</th><th>Motif</th></tr>
<?php
$sql = "SELECT C.Id_Consultation, C.Date_consultation, C.Heure_consultation, C.Motif_clinique, P.Nom AS NomPatiente, P.Prenom, Pro.Nom AS NomPraticien
FROM Consultation C
INNER JOIN Patiente P ON P.Id_Patiente = C.Id_Patiente
INNER JOIN Professionnel Pro ON Pro.Id_Praticien = C.Id_Praticien";
$resultat=$base->query($sql);
while($ligne=$resultat->fetch(PDO::FETCH_ASSOC))
{
	$id=$ligne['Id_Consultation'];
	$Date=$ligne['Date_consultation'];
	$Heure=$ligne['Heure_consultation'];
	$Patiente=$ligne['NomPatiente'];
	$Prenom=$ligne['Prenom'];
	$Praticien=$ligne['NomPraticien'];
	$Motif=$ligne['Motif_clinique'];
	echo "<tr><td>$id</td><td>$Date</td><td>$Heure</td><td>$Patiente $Prenom</td><td>$Praticien</td><td>$Motif</td></tr>";
}
?>
</table>

<h2>Ajouter une patiente</h2>
<form action="ajout_patiente.php" method="post">
    Nom : <input type="text" name="Nom"><br>
    Prenom : <input type="text" name="Prenom"><br>
    Date de naissance : <input type="date" name="Date_naissance"><br>
    Numero : <input type="text" name="Numero"><br>
    Rue : <input type="text" name="Rue"><br>
    Code postal : <input type="text" name="Code_postal"><br>
    Localite : <input type="text" name="Localite"><br>
    Telephone : <input type="text" name="Telephone"><br>
    Email : <input type="text" name="Email"><br>
    <input type="submit" value="Ajouter">
</form>

<h2>Modifier une patiente</h2>
<form action="update_patiente.php" method="post">
    Nom : <input type="text" name="Nom"><br>
    Nouveau telephone : <input type="text" name="Telephone"><br>
    Nouvel email : <input type="text" name="Email"><br>
    Nouvelle localite : <input type="text" name="Localite"><br>
    <input type="submit" value="Modifier">
</form>

<h2>Prendre un rendez-vous</h2>
<form action="ajout_consultation.php" method="post">
    Id patiente : <input type="number" name="Id_Patiente"><br>
    Id praticien : <input type="number" name="Id_Praticien"><br>
    Date : <input type="date" name="Date_consultation"><br>
    Heure : <input type="time" name="Heure_consultation"><br>
    Motif : <input type="text" name="Motif_clinique"><br>
    <input type="submit" value="Enregistrer le rendez-vous">
</form>

</body>
</html>
