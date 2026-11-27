<?php
session_start();
// on efface la session
session_destroy();
header('Location: index.html');
?>
