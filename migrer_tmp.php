<?php
require __DIR__ . '/connexion.php';
if ($base->query("SHOW COLUMNS FROM Professionnel LIKE 'Actif'")->rowCount() == 0) {
  $base->exec("ALTER TABLE Professionnel ADD Actif TINYINT NOT NULL DEFAULT 1");
  echo "colonne Actif ajoutee | ";
}
echo $base->query("select count(*) from Professionnel where Actif=1")->fetchColumn()." actifs";
?>
