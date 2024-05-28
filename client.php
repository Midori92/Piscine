<?php
$nom = isset($_POST["nom"])? $_POST["nom"] : "";
$prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
$adresse1 = isset($_POST["ad1"])? $_POST["ad1"] : "";
$adresse2 = isset($_POST["ad2"])? $_POST["ad2"] : "";
$ville = isset($_POST["ville"])? $_POST["ville"] : "";
$cdp = isset($_POST["code"])? $_POST["mdp"] : "";
$pays = isset($_POST["pays"])? $_POST["pays"] : "";
$tel = isset($_POST["tel"])? $_POST["tel"] : "";
$carte = isset($_POST["carte"])? $_POST["carte"] : "";
$mdp = isset($_POST["mdp"])? $_POST["mdp"] : "";
$database = "sportify";

//connectez-vous dans votre BDD
//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
$db_handle = mysqli_connect('localhost', 'root', '' );
$db_found = mysqli_select_db($db_handle, $database);

if ($db_found) {

 //ajouter client dans database


$conn = new mysqli('localhost', 'root', '',$database);

$sql1 = "INSERT INTO client (Nom, Prenom, Adresse, Numero, Carte) 
Values ('$nom','$prenom','$adresse1','$tel','$carte')";


if($conn->query($sql1) == TRUE){
echo"

<p> Bienvnue '. $nom.' '.$prenom.'' </p>
<P> Voici vos informations: <br>'. $adresse1. '<br>' .



";

}
}
?>