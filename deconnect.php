<?php
session_start();
session_unset();
session_destroy();
$_SESSION['connexion'] = FALSE;

echo"
Vous vous êtes déconnecté !
";
header("Location: acceuil.php");
exit();


?>