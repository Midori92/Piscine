<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hour = $_POST["hour"];
    $day = $_POST["day"];
    $database = 'sportify';
    $db_handle = mysqli_connect('localhost', 'root', '', $database, 3307);
    if (!$db_handle) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql_insert = "INSERT INTO dispo_coach (Nom, Jour, Horaire) VALUES ('Guy Dumais', '$day', '$hour')";
 
    if (mysqli_query($db_handle, $sql_insert)) {
       echo "<script>alert('Votre réservation a été effectuée avec succès!');</script>";
        header("Location: boxe.php");
            exit();
    } else {
        echo "Erreur: " . $sql_insert . "<br>" . mysqli_error($db_handle);
    }
    mysqli_close($db_handle);
}
?>