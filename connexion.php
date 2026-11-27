<?php
// Mac (MAMP) : mot de passe "root". Windows (WAMP / XAMPP) : pas de mot de passe.
$motDePasse = (PHP_OS_FAMILY === 'Darwin') ? 'root' : '';

$base = new PDO('mysql:host=localhost;dbname=pink_data', 'root', $motDePasse);
