<?php
session_start();
$connect = isset($_SESSION['connexion']) ? $_SESSION['connexion'] : null;


?>


<!DOCTYPE html>
<head>
    <title>Sportify</title>
    <meta charset="utf-8"/>
    <link href="prime.css" rel="stylesheet" type="text/css" />
    <link rel="icon"type="image/x-icon" href="favicon.ico">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
</head>
<body>
<style>
    #rightcolumn {
        padding: 10px;
        max-width: 800px;
        margin: 20px auto;
        background-color: aliceblue;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        height: auto;
        width: 650px;
    }
</style>

<div id="wrapper">
    <h1 class=titre> <img width="750" heigh="750" src="titre.png"></h1>
    <div id ="nav">
        <div id="leftcolumn">

            <div id="nav">
                <a href="index.php">
                    <img src="accueilbouton.png" alt = 'index' width="150" heigh="115">
                </a>

                <a href="toutparcourir.php">
                    <img  src="parcourirbouton.png" alt = 'parcourir'  width="150" heigh="115">
                </a>

                <a href="recherche.html">
                    <img  src="recherchebouton.png" alt = 'recherche'  width="150" heigh="150">
                </a>

                <a href="rendezvous.php">
                    <img  src="rendezvousbouton.png" alt = 'rdv'  width="150" heigh="150">
                </a> <?php

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
<div id="carousel-container">
<h1> Nos sports </h1>  
<div id="carrousel">  
  <ul>  
    <li><img src="ten.jpg" width="75%" height="60%"/></li>  
    <li><img src="bask.jpg" width="75%" height="60%"/></li>  
    <li><img src="fo.jpg" width="85%" height="60%"/></li>  
    <li><img src="dan.jpg" width="75%" height="100%"/></li>  
    <li><img src="nat.jpg" width="85%" height="100%"/></li>  
    <li><img src="bo.jpg" width="85%" height="100%"/></li>  
    <li><img src="cours.jpg" width="85%" height="100%"/></li>  
 
  </ul>  
</div>  

</div>
<script>
$(document).ready(function(){  
  var $carrousel = $('#carrousel');
  var $img = $('#carrousel img');
  var $thumbnails = $('#thumbnails');
  var indexImg = $img.length - 1;
  var i = 0;
  

  $carrousel.append('<div class="controls"><span class="prev">Precedent</span><span class="next">Suivant</span></div>');
  

  $img.each(function(index) {
    var thumbnailSrc = $(this).attr('src');
    $thumbnails.append('<img src="' + thumbnailSrc + '" alt="thumbnail' + index + '">');
  });
  

  $thumbnails.on('click', 'img', function() {
    var index = $(this).index();
    changeSlide(index);
  });
  

  $('.next').click(function(){ 
    changeSlide(i + 1);
  });
  

  $('.prev').click(function(){ 
    changeSlide(i - 1);
  });
  

  function changeSlide(index) {
    if (index < 0) {
      index = indexImg;
    } else if (index > indexImg) {
      index = 0;
    }
    i = index;
    var translateValue = -(100 / $img.length) * i + '%';
    $carrousel.find('ul').css('transform', 'translateX(' + translateValue + ')');
    // Mettre en surbrillance la miniature correspondante
    $thumbnails.find('img').removeClass('active');
    $thumbnails.find('img').eq(i).addClass('active');
  }
  

  function slideImg() {  
    setInterval(function() { 
      changeSlide(i + 1);
    }, 4000); 
  }  

  slideImg();
  
}); 
</script> 
          </div> 
     </div>
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