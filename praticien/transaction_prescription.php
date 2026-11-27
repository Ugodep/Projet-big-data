<?php

$Id_Consultation = $_POST['Id_Consultation'];
$Type_prescription = $_POST['Type_prescription'];
$Indication_clinique = $_POST['Indication_clinique'];
$Instructions = $_POST['Instructions_complementaires'];
$Type_examen_demande = $_POST['Type_examen_demande'];

try {

    $base = new PDO('mysql:host=localhost;dbname=pink_data', 'root', 'root');
    $base->beginTransaction();
    $sql = "INSERT INTO Prescription (Date_prescription, Heure_prescription, Type_prescription, Indication_clinique, Instructions_complementaires, Id_Consultation)
            VALUES (CURDATE(), CURTIME(), '$Type_prescription', '$Indication_clinique', '$Instructions', :Id_Consultation)";
    $requete = $base->prepare($sql);
    $requete->execute([
        'Id_Consultation' => $Id_Consultation
    ]);
    $Id_Prescription = $base->lastInsertId();
    echo "Id de la prescription : " . $Id_Prescription . "<br>";
    $sql = "INSERT INTO Demande_examen (Type_examen_demande, Id_Prescription)
            VALUES ('$Type_examen_demande', :Id_Prescription)";
    $requete = $base->prepare($sql);
    $requete->execute([
        'Id_Prescription' => $Id_Prescription
    ]);
    echo "Id de la demande d'examen : " . $base->lastInsertId() . "<br>";
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
echo "<br><a href='index.html'>Retour</a>";
?>
