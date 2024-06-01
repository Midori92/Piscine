<?php
session_start();
$_SESSION['connexion'] = TRUE;
header("Location: index.php");
exit();
?>

