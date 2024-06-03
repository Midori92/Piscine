<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hour = $_POST["hour"];
    $day = $_POST["day"];
    $database = 'sportify';
    $db_handle = mysqli_connect('localhost', 'root', '', $database, 3307);
    if (!$db_handle) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Suppression de la disponibilité dans la base de données
    $sql_delete = "DELETE FROM dispo_coach WHERE Nom = 'Jean Dupont' AND Jour = '$day' AND Horaire = '$hour'";

    if (mysqli_query($db_handle, $sql_delete)) {
        echo "<script>
                alert('Votre réservation a été effectuée avec succès!');
                window.location.href='tennis.php';
              </script>";
    } else {
        echo "Erreur: " . $sql_delete . "<br>" . mysqli_error($db_handle);
    }
    mysqli_close($db_handle);
}
?>
