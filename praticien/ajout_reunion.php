<?php

$Id_Patiente = $_POST['Id_Patiente'];
// il faut etre connecté
session_start();
if (!isset($_SESSION['id_praticien']))
{
    die("Connecte-toi d'abord. <a href='../index.html'>Connexion</a>");
}
$Id_Praticien = $_SESSION['id_praticien'];
$Date_reunion = $_POST['Date_reunion'];
$Heure_reunion = $_POST['Heure_reunion'];
$Synthese = $_POST['Synthese_decisions'];
$Plan = $_POST['Plan_traitement_propose'];

try {

    require __DIR__ . '/../connexion.php';
    $base->beginTransaction();
    $sql = "INSERT INTO Reunion (Date_reunion, Heure_reunion)
            VALUES ('$Date_reunion', '$Heure_reunion')";
    $base->exec($sql);
    $Id_Reunion = $base->lastInsertId();
    echo "Id de la réunion : " . $Id_Reunion . "<br>";
    $sql = "INSERT INTO Concerner (Id_Patiente, Id_Reunion, Synthese_decisions, Plan_traitement_propose)
            VALUES ('$Id_Patiente', :Id_Reunion, '$Synthese', '$Plan')";
    $requete = $base->prepare($sql);
    $requete->execute([
        'Id_Reunion' => $Id_Reunion
    ]);
    echo "Patiente liée à la réunion<br>";
    $sql = "INSERT INTO Participer (Id_Reunion, Id_Praticien)
            VALUES (:Id_Reunion, '$Id_Praticien')";
    $requete = $base->prepare($sql);
    $requete->execute([
        'Id_Reunion' => $Id_Reunion
    ]);
    echo "Praticien ajouté à la réunion<br>";
    $base->commit();
    echo "Transaction validée avec succès !";
}
catch (Exception $e) {
    if (isset($base) && $base->inTransaction()) {
        $base->rollBack();
    }
    die("Erreur : " . $e->getMessage() .
        "<br>Transaction annulée (ROLLBACK).");
}
echo "<br><a href='index.php'>Retour</a>";
?>
