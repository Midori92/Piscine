<?php

// Déclaration des variables
$Nom = isset($_POST["Nom"]) ? $_POST["Nom"] : "";
$Spe = isset($_POST["Spe"]) ? $_POST["Spe"] : "";
$Nom_lieu = isset($_POST["Nom_lieu"]) ? $_POST["Nom_lieu"] : "";

// Connectez-vous à votre BDD
$database = "sportify";

$db_handle = mysqli_connect('localhost', 'root', '', $database, 3307);
$db_found = mysqli_select_db($db_handle, $database);

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
    echo "OK";
    $infotrouve = false;
    while ($data = mysqli_fetch_assoc($result)) {
        $infotrouve = true;
        echo "<tr>
                <td>{$data['Nom']}</td>
                <td>{$data['Specialite']}</td>
               
              </tr>";
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