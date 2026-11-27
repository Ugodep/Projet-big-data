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
<title>Dossier de la patiente</title>
<link rel="stylesheet" href="../style.css">
<link rel="icon" href="../icone.svg">
</head>
<body>
<img src="../logo.svg" alt="Pink Data" width="200">
<h1>Dossier de la patiente</h1>
<table>
<tr><th>Date</th><th>Motif</th><th>Praticien</th><th>Examen demandé</th><th>Classification</th></tr>
<?php
$sql = "SELECT C.Date_consultation, C.Motif_clinique, Pro.Nom, Pro.Specialite, D.Type_examen_demande, CR.Classification
FROM Patiente P
INNER JOIN Consultation C ON C.Id_Patiente = P.Id_Patiente
INNER JOIN Professionnel Pro ON Pro.Id_Praticien = C.Id_Praticien
LEFT JOIN Prescription Pr ON Pr.Id_Consultation = C.Id_Consultation
LEFT JOIN Demande_examen D ON D.Id_Prescription = Pr.Id_Prescription
LEFT JOIN Examen E ON E.Id_Demande = D.Id_Demande
LEFT JOIN Compte_rendu_radiologique CR ON CR.Id_Examen = E.Id_Examen
WHERE P.Id_Patiente = '$Id_Patiente' AND C.Id_Praticien = '$Id_Praticien'";
$resultat=$base->query($sql);
while($ligne=$resultat->fetch(PDO::FETCH_ASSOC))
{
	$Date=$ligne['Date_consultation'];
	$Motif=$ligne['Motif_clinique'];
	$Praticien=$ligne['Nom'];
	$Specialite=$ligne['Specialite'];
	$Examen=$ligne['Type_examen_demande'];
	$Classification=$ligne['Classification'];
	echo "<tr><td>$Date</td><td>$Motif</td><td>$Praticien ($Specialite)</td><td>$Examen</td><td>$Classification</td></tr>";
}
?>
</table>
<a href="index.php">Retour</a>
</body>
</html>
