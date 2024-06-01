<?php
session_start();
$_SESSION['connexion'] = TRUE;
header("Location: acceuil.php");
exit();
?>