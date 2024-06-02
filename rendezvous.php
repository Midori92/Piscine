<?php
session_start();
$connect = isset($_SESSION['connexion']) ? $_SESSION['connexion'] : null;


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sportify - Rendez-vous</title>
    <link rel="stylesheet" href="rendezvous.css">
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="toutparcourir.php">Tout Parcourir</a></li>
            <li><a href="recherche.html">Recherche</a></li>
            <li><a href="rendez-vous.php">Rendez-vous</a></li>
            <li> <?php

                if($connect == TRUE AND $connect !== null) { //dejà connecté
                    echo"
                <a href = 'compte.php' >
                    <img  src = 'votrecompte.png' alt = 'moncompte' width = '115' heigh = '150' >
                    </a >";
                }

                else{ //non connecté
                    echo"
                    <a href = 'compte.html'>
                        <img  src = 'votrecompte.png' alt = 'moncompte' width = '115' heigh = '150' >
                    </a >";
                }
                ?>

                <a href="message.php">
                    <img  src="message.png" alt="messagerie" width="115" heigh="150">
                </a>
            </li>
        </ul>
    </nav>
</header>
<main>
    <section id="rendez-vous">
        <h1>Vos Rendez-vous Confirmés</h1>
        <div class="rdv-item">
            <h2>Coach : Guy DUMAIS</h2>
            <p><strong>Date :</strong> Lundi 14 juin 2024</p>
            <p><strong>Heure :</strong> 10h00 - 11h00</p>
            <p><strong>Adresse :</strong> Salle de Sport Omnes, 12 Rue de l'Université, 75005 Paris</p>
            <p><strong>Informations Supplémentaires :</strong></p>
            <ul>
                <li>Documents à apporter : Carte d'identité, Certificat médical</li>
                <li>Digicode : 1234</li>
            </ul>
            <button class="cancel-btn" onclick="cancelRdv()">Annulation de RDV</button>
        </div>
    </section>
</main>
<footer>
    <p>Contactez-nous : <a href="mailto:sportify@omneseducation.com">sportify@omneseducation.com</a> | Téléphone : 01 23 45 67 89</p>
    <div id="map"></div>
</footer>

<script>
    function cancelRdv() {
        const confirmation = confirm("Voulez-vous vraiment annuler ce rendez-vous ?");
        if (confirmation) {
            alert("Votre rendez-vous a été annulé.");
            // Code pour annuler le rendez-vous sur le serveur
            // Ex: envoyer une requête AJAX pour annuler le rendez-vous
        }
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>
<script>
    function initMap() {
        const sportifyLocation = { lat: 48.8566, lng: 2.3522 }; // Coordonnées de l'adresse de Sportify
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 15,
            center: sportifyLocation,
        });
        const marker = new google.maps.Marker({
            position: sportifyLocation,
            map: map,
        });
    }
</script>
</body>
</html>

