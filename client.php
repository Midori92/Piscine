<?php

session_start();


$nom = isset($_POST["nom"])? $_POST["nom"] : "";
$prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
$adresse1 = isset($_POST["ad1"])? $_POST["ad1"] : "";
$adresse2 = isset($_POST["ad2"])? $_POST["ad2"] : "";
$ville = isset($_POST["ville"])? $_POST["ville"] : "";
$cdp = isset($_POST["code"])? $_POST["code"] : "";
$pays = isset($_POST["pays"])? $_POST["pays"] : "";
$tel = isset($_POST["tel"])? $_POST["tel"] : "";
$carte = isset($_POST["carte"])? $_POST["carte"] : "";
$mdp = isset($_POST["mdp"])? $_POST["mdp"] : "";

$database = "sportify";

//connectez-vous dans votre BDD
//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
$db_handle = mysqli_connect('localhost', 'root', '' );
$db_found = mysqli_select_db($db_handle, $database);
$adresse = $adresse1." ". $adresse2. "  ". $ville."  ". $cdp."  ". $pays;

if($_SESSION['me'] == 0) { //non connecté
    if ($db_found) {

        //ajouter client dans database


        $conn = new mysqli('localhost', 'root', '', $database);

        $sql1 = "INSERT INTO client (Nom, Prenom, Adresse, Numero, Carte,Mot_de_passe) 
Values ('$nom','$prenom','$adresse','$tel','$carte','$mdp')";


        if ($conn->query($sql1) == TRUE) {
            echo "

<p> Bienvnue " . $nom . " " . $prenom . " </p>
<P> Voici vos informations: <br>" . $adresse . "<br>

";

        }
    }
}

else{ //connecté
    echo"Vous êtes déjà connecté !";
}

?>