<?php

// Déclaration des variables
$Nom = isset($_POST["Nom"]) ? $_POST["Nom"] : "";
$Spe = isset($_POST["Spe"]) ? $_POST["Spe"] : "";
$Nom_lieu = isset($_POST["Nom_lieu"]) ? $_POST["Nom_lieu"] : "";

// Connectez-vous à votre BDD
$database = "sportify";

$db_handle = mysqli_connect('localhost', 'root', '', $database, 3307);
$db_found = mysqli_select_db($db_handle, $database);

?>


<!DOCTYPE html>
<html>
<head>
    <title>Sportify - Parcourir</title>
    <meta charset="utf-8"/>
    <link href="prime.css" rel="stylesheet" type="text/css" />
    <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>
<body>
    <div id="wrapper">
        <h1 class="titre"><img width="750" heigh="750" src="titre.png" alt="Sportify"></h1>
        <div id="leftcolumn"> 

            <div id="nav">  
            <a href="index.html">
                   <img src="accueilbouton.png" width="115" heigh="115">
            </a>  
          
            <a href="toutparcourir.html">
               <img  src="parcourirbouton.png" width="115" heigh="115">
            </a>  
            
           <a href="recherche.html">
                <img  src="recherchebouton.png" width="115" heigh="150">
           </a>  
          
           <a href="rendezvous.html">
                <img  src="rendezvousbouton.png" width="115" heigh="150">
           </a>  
           <a href="votrecompte.html">
                <img  src="votrecompte.png" width="115" heigh="150">
           </a> 
          </div> 
     </div>
        <div id="rightcolumn">
           <div class="search-container">
        <form action="recherche.php" method="post">
            <input type="text" name="query" placeholder="Nom, Spécialité ou Etablissement.....">
            <input type="submit" value="Recherche">
        </form>
    </div>




<?php 

// Si la BDD existe, faire le traitement
if ($db_found) {
    // Construction de la requête SQL avec des conditions dynamiques
    $sql = "SELECT * FROM coach WHERE 1=1";
    if ($Nom != "") {
        $sql .= " AND Nom LIKE '%$Nom%'";
    }
    if ($Spe != "") {
        $sql .= " AND Specialite LIKE '%$Spe%'";
    }
    if ($Nom_lieu != "") {
        $sql .= " AND Lieu LIKE '%$Nom_lieu%'";
    }

    $result = mysqli_query($db_handle, $sql);

    // Affichage des résultats
    $infotrouve = false;
    while ($data = mysqli_fetch_assoc($result)) {
        $infotrouve = true;
        echo "<tr>
                <td>{$data['Nom']}</td>
                <td>{$data['Specialite']}</td>
               
              </tr>
              </br>";
    }

    echo "</table>";

    if (!$infotrouve) {
        echo "<p>Aucun coach trouvé</p>";
    }
} else {
    echo "Base de données non trouvée";
}

// Fermer la connexion
mysqli_close($db_handle);
?>



                <br>
                <p class="contact">Sportify <br>  
                    67 avenue Marceau<br>  
                    75015 Paris<br><br>  
                    (+33) 01 02 03 04 05 06  
                </p>
                <div id="footer">Copyright &copy; 2024 Sportify<br>
                    <a href="mailto:sportify@gmail.com">sportify@gmail.com</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>







