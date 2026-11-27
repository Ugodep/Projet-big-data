<?php
session_start();
if (!isset($_SESSION['id_praticien']))
{
    die("Connecte-toi d'abord. <a href='../index.html'>Connexion</a>");
}
$Id_Praticien = $_SESSION['id_praticien'];
require __DIR__ . '/../connexion.php';
?>
<html>
<head>
<meta charset="UTF-8">
<title>Professionnel de santé</title>
<link rel="stylesheet" href="../style.css">
<link rel="icon" href="../icone.svg">
</head>
<body>
<img src="../logo.svg" alt="Pink Data" width="200">
<h1>Professionnel de santé</h1>
<p>Connecté : Dr <?php echo $_SESSION['nom']; ?> - <a href="../deconnexion.php">Se déconnecter</a></p>

<h2>Mes patientes</h2>
<table>
<tr><th>Id</th><th>Nom</th><th>Prénom</th><th>Naissance</th><th>Localité</th><th>Téléphone</th></tr>
<?php
$sql = "SELECT DISTINCT P.* FROM Patiente P INNER JOIN Consultation C ON C.Id_Patiente = P.Id_Patiente WHERE C.Id_Praticien = '$Id_Praticien'";
$resultat=$base->query($sql);
while($ligne=$resultat->fetch(PDO::FETCH_ASSOC))
{
	$id=$ligne['Id_Patiente'];
	$Nom=$ligne['Nom'];
	$Prenom=$ligne['Prenom'];
	$Naissance=$ligne['Date_naissance'];
	$Localite=$ligne['Localite'];
	$Telephone=$ligne['Telephone'];
	echo "<tr><td>$id</td><td>$Nom</td><td>$Prenom</td><td>$Naissance</td><td>$Localite</td><td>$Telephone</td></tr>";
}
?>
</table>

<h2>Mes consultations</h2>
<table>
<tr><th>Id</th><th>Date</th><th>Heure</th><th>Patiente</th><th>Motif</th><th>Symptômes</th><th>Conclusions</th></tr>
<?php
$sql = "SELECT C.*, P.Nom AS NomPatiente, P.Prenom FROM Consultation C INNER JOIN Patiente P ON P.Id_Patiente = C.Id_Patiente WHERE C.Id_Praticien = '$Id_Praticien'";
$resultat=$base->query($sql);
while($ligne=$resultat->fetch(PDO::FETCH_ASSOC))
{
	$id=$ligne['Id_Consultation'];
	$Date=$ligne['Date_consultation'];
	$Heure=$ligne['Heure_consultation'];
	$Patiente=$ligne['NomPatiente'];
	$Prenom=$ligne['Prenom'];
	$Motif=$ligne['Motif_clinique'];
	$Symptomes=$ligne['Symptomes_observes'];
	$Conclusions=$ligne['Conclusions'];
	echo "<tr><td>$id</td><td>$Date</td><td>$Heure</td><td>$Patiente $Prenom</td><td>$Motif</td><td>$Symptomes</td><td>$Conclusions</td></tr>";
}
?>
</table>

<h2>Examens demandés, pas encore réalisés</h2>
<table>
<tr><th>Id demande</th><th>Examen</th><th>Patiente</th></tr>
<?php
$sql = "SELECT D.Id_Demande, D.Type_examen_demande, P.Nom, P.Prenom FROM Demande_examen D INNER JOIN Prescription Pr ON Pr.Id_Prescription = D.Id_Prescription INNER JOIN Consultation C ON C.Id_Consultation = Pr.Id_Consultation INNER JOIN Patiente P ON P.Id_Patiente = C.Id_Patiente LEFT JOIN Examen E ON E.Id_Demande = D.Id_Demande WHERE E.Id_Examen IS NULL AND C.Id_Praticien = '$Id_Praticien'";
$resultat=$base->query($sql);
while($ligne=$resultat->fetch(PDO::FETCH_ASSOC))
{
	$id=$ligne['Id_Demande'];
	$Examen=$ligne['Type_examen_demande'];
	$Nom=$ligne['Nom'];
	$Prenom=$ligne['Prenom'];
	echo "<tr><td>$id</td><td>$Examen</td><td>$Nom $Prenom</td></tr>";
}
?>
</table>

<h2>Suivi des examens</h2>
<table>
<tr><th>Id examen</th><th>Patiente</th><th>Examen</th><th>Date</th><th>Classification</th><th>Lésion</th><th>Bénin / malin</th></tr>
<?php
$sql = "SELECT E.Id_Examen, P.Nom, P.Prenom, D.Type_examen_demande, E.Date_examen, CR.Classification, RA.Nature_lesion, RA.Caractere_benin_malin FROM Patiente P INNER JOIN Consultation C ON C.Id_Patiente = P.Id_Patiente INNER JOIN Prescription Pr ON Pr.Id_Consultation = C.Id_Consultation INNER JOIN Demande_examen D ON D.Id_Prescription = Pr.Id_Prescription INNER JOIN Examen E ON E.Id_Demande = D.Id_Demande LEFT JOIN Compte_rendu_radiologique CR ON CR.Id_Examen = E.Id_Examen LEFT JOIN Resultat_anapath RA ON RA.Id_Examen = E.Id_Examen WHERE C.Id_Praticien = '$Id_Praticien'";
$resultat=$base->query($sql);
while($ligne=$resultat->fetch(PDO::FETCH_ASSOC))
{
	$id=$ligne['Id_Examen'];
	$Nom=$ligne['Nom'];
	$Prenom=$ligne['Prenom'];
	$Examen=$ligne['Type_examen_demande'];
	$Date=$ligne['Date_examen'];
	$Classification=$ligne['Classification'];
	$Nature=$ligne['Nature_lesion'];
	$Caractere=$ligne['Caractere_benin_malin'];
	echo "<tr><td>$id</td><td>$Nom $Prenom</td><td>$Examen</td><td>$Date</td><td>$Classification</td><td>$Nature</td><td>$Caractere</td></tr>";
}
?>
</table>

<h2>Équipements</h2>
<table>
<tr><th>Id</th><th>Type</th><th>Salle</th><th>État</th></tr>
<?php
$sql = "SELECT * FROM Equipement";
$resultat=$base->query($sql);
while($ligne=$resultat->fetch(PDO::FETCH_ASSOC))
{
	$id=$ligne['Id_Equipement'];
	$Type=$ligne['Type_machine'];
	$Salle=$ligne['Localisation_salle'];
	$Etat=$ligne['Etat_fonctionnement'];
	echo "<tr><td>$id</td><td>$Type</td><td>$Salle</td><td>$Etat</td></tr>";
}
?>
</table>

<h2>Voir le dossier d'une patiente</h2>
<form action="jointure_patiente.php" method="post">
    Id patiente : <input type="number" name="Id_Patiente"><br>
    <input type="submit" value="Voir le dossier">
</form>

<h2>Ajouter un antécédent familial</h2>
<form action="ajout_antecedent_familial.php" method="post">
    Id patiente : <input type="number" name="Id_Patiente"><br>
    Nom de la maladie : <input type="text" name="Nom_maladie"><br>
    Lien de parente : <input type="text" name="Lien_parente"><br>
    <input type="submit" value="Ajouter">
</form>

<h2>Ajouter un antécédent médical</h2>
<form action="ajout_antecedent_medical.php" method="post">
    Id patiente : <input type="number" name="Id_Patiente"><br>
    Date du diagnostic : <input type="date" name="Date_diagnostic"><br>
    Nom de la maladie : <input type="text" name="Nom_maladie"><br>
    Traitements : <input type="text" name="Traitements"><br>
    <input type="submit" value="Ajouter">
</form>

<h2>Compléter une consultation (symptômes et conclusions)</h2>
<form action="update_consultation.php" method="post">
    Id consultation : <input type="number" name="Id_Consultation"><br>
    Symptomes : <input type="text" name="Symptomes_observes"><br>
    Conclusions : <input type="text" name="Conclusions"><br>
    <input type="submit" value="Mettre à jour">
</form>

<h2>Prescription + demande d'examen (transaction)</h2>
<form action="transaction_prescription.php" method="post">
    Id consultation : <input type="number" name="Id_Consultation"><br>
    Type de prescription : <input type="text" name="Type_prescription"><br>
    Indication clinique : <input type="text" name="Indication_clinique"><br>
    Instructions : <input type="text" name="Instructions_complementaires"><br>
    Examen demande : <input type="text" name="Type_examen_demande"><br>
    <input type="submit" value="Valider la transaction">
</form>

<h2>Réunion multidisciplinaire</h2>
<form action="ajout_reunion.php" method="post">
    Id patiente : <input type="number" name="Id_Patiente"><br>
    Date : <input type="date" name="Date_reunion"><br>
    Heure : <input type="time" name="Heure_reunion"><br>
    Synthese des decisions : <input type="text" name="Synthese_decisions"><br>
    Plan de traitement propose : <input type="text" name="Plan_traitement_propose"><br>
    <input type="submit" value="Enregistrer la réunion">
</form>

<h2>Voir les réunions d'une patiente</h2>
<form action="affichage_reunion.php" method="post">
    Id patiente : <input type="number" name="Id_Patiente"><br>
    <input type="submit" value="Afficher les réunions">
</form>

<h2>Ajouter un équipement</h2>
<form action="ajout_equipement.php" method="post">
    Type de machine : <input type="text" name="Type_machine"><br>
    Salle : <input type="text" name="Localisation_salle"><br>
    <input type="submit" value="Ajouter">
</form>

<h2>Enregistrer un examen réalisé</h2>
<form action="ajout_examen.php" method="post">
    Id demande : <input type="number" name="Id_Demande"><br>
    Id equipement : <input type="number" name="Id_Equipement"><br>
    Date : <input type="date" name="Date_examen"><br>
    Heure : <input type="time" name="Heure_examen"><br>
    <input type="submit" value="Enregistrer l'examen">
</form>

<h2>Compte rendu radiologique</h2>
<form action="ajout_cr_radio.php" method="post">
    Id examen : <input type="number" name="Id_Examen"><br>
    Date : <input type="date" name="Date_compte_rendu"><br>
    Localisation des lesions : <input type="text" name="Localisation_lesions"><br>
    Classification : <input type="text" name="Classification"><br>
    Description des images : <input type="text" name="Description_images"><br>
    Conclusion : <input type="text" name="Conclusion"><br>
    <input type="submit" value="Enregistrer">
</form>

<h2>Résultat anatomopathologique</h2>
<form action="ajout_anapath.php" method="post">
    Id examen : <input type="number" name="Id_Examen"><br>
    Date : <input type="date" name="Date_resultat"><br>
    Type de prelevement : <input type="text" name="Type_prelevement"><br>
    Nature de la lesion : <input type="text" name="Nature_lesion"><br>
    Benin ou malin : <input type="text" name="Caractere_benin_malin"><br>
    Descriptions : <input type="text" name="Descriptions"><br>
    Conclusions : <input type="text" name="Conclusions"><br>
    <input type="submit" value="Enregistrer">
</form>

<h2>Fichier médical</h2>
<form action="ajout_fichier.php" method="post">
    Id examen : <input type="number" name="Id_Examen"><br>
    Nom du fichier : <input type="text" name="Nom_fichier"><br>
    Format : <input type="text" name="Format_fichier"><br>
    Largeur (pixels) : <input type="number" name="Largeur_pixels"><br>
    Hauteur (pixels) : <input type="number" name="Hauteur_pixels"><br>
    Taille (octets) : <input type="number" name="Taille_octets"><br>
    Date de creation : <input type="date" name="Date_creation"><br>
    Chemin ou URL : <input type="text" name="Chemin_ou_URL_stockage"><br>
    <input type="submit" value="Enregistrer le fichier">
</form>

<h2>Supprimer une patiente</h2>
<form action="suppression_patiente.php" method="post">
    Id patiente : <input type="number" name="Id_Patiente"><br>
    <input type="submit" value="Supprimer">
</form>

</body>
</html>
