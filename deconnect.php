<?php
session_start();
session_unset();
session_destroy();
$_SESSION['connexion'] = FALSE;
$_SESSION['login'] = null;

echo"
Vous vous êtes déconnecté !
";
header("Location: index.php");
exit();


?>