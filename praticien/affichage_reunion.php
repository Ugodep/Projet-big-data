<?php
// il faut etre connecté
session_start();
if (!isset($_SESSION['id_praticien']))
{
    die("Connecte-toi d'abord. <a href='../index.html'>Connexion</a>");
}
$Id_Praticien = $_SESSION['id_praticien'];
$Id_Patiente = $_POST['Id_Patiente'];
require __DIR__ . '/../connexion.php';
?>
<html>
<head>
<meta charset="UTF-8">
<title>Réunions de la patiente</title>
<link rel="stylesheet" href="../style.css">
<link rel="icon" href="../icone.svg">
</head>
<body>
<img src="../logo.svg" alt="Pink Data" width="200">
<h1>Réunions de la patiente</h1>
<table>
<tr><th>Date</th><th>Heure</th><th>Décisions</th><th>Plan de traitement</th><th>Participant</th></tr>
<?php
$sql = "SELECT R.Date_reunion, R.Heure_reunion, C.Synthese_decisions, C.Plan_traitement_propose, Pro.Nom, Pro.Specialite
FROM Concerner C
INNER JOIN Reunion R ON R.Id_Reunion = C.Id_Reunion
LEFT JOIN Participer Pa ON Pa.Id_Reunion = R.Id_Reunion
LEFT JOIN Professionnel Pro ON Pro.Id_Praticien = Pa.Id_Praticien
WHERE C.Id_Patiente = '$Id_Patiente'";
$resultat=$base->query($sql);
while($ligne=$resultat->fetch(PDO::FETCH_ASSOC))
{
	$Date=$ligne['Date_reunion'];
	$Heure=$ligne['Heure_reunion'];
	$Synthese=$ligne['Synthese_decisions'];
	$Plan=$ligne['Plan_traitement_propose'];
	$Praticien=$ligne['Nom'];
	$Specialite=$ligne['Specialite'];
	echo "<tr><td>$Date</td><td>$Heure</td><td>$Synthese</td><td>$Plan</td><td>$Praticien ($Specialite)</td></tr>";
}
?>
</table>
<a href="index.php">Retour</a>
</body>
</html>
