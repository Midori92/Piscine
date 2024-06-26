<?php

session_start(); //session

$connect = isset($_SESSION['connexion']) ? $_SESSION['connexion'] : null;


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
<style>
    main {
        height :700px;
    }
    #rightcolumn {
        padding: 10px;
        max-width: 800px;
        margin: 20px auto;
        background-color: aliceblue;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        height: 470px;
        width: 650px;
    }
</style>

<div id="wrapper">
    <h1 class="titre"><img width="750" heigh="750" src="titre.png" alt="Sportify"></h1>
    <div id="leftcolumn">

        <div id="nav">
            <a href="index.html">
                <img src="accueilbouton.png" width="115" heigh="115">
            </a>

            <a href="acceuil.php">
                <img  src="parcourirbouton.png"  alt="toutparcourir" width="115" heigh="115">
            </a>

            <a href="financing.html">
                <img  src="recherchebouton.png" alt="financing" width="115" heigh="150">
            </a>

            <a href="contact.html">
                <img  src="rendezvousbouton.png" alt="RDV" width="115" heigh="150">
            </a>

            <?php

                if($connect == TRUE ) {
                    echo"
                    <a href = 'compte.php' >
                <img  src = 'votrecompte.png' alt = 'moncompte' width = '115' heigh = '150' >
            </a >";
            }
                else{
                echo"
                    <a href = 'compte.html' >
                <img  src = 'votrecompte.png' alt = 'moncompte' width = '115' heigh = '150' >
            </a >";
                }


            ?>
            <a href="message.php">
                <img  src="message.png" alt="messagerie" width="115" heigh="150">
            </a>


            <?php
            if($connect !== null) {
                if ($_SESSION['connexion'] == TRUE) { //si connecté
                    echo "
                    <a href='deconnect.php'>
                <img  src='deco.png' alt='deconnexion' width='115' heigh='150'>
            </a>";
                }

                else {
                    echo "OK";
                };

            }
            ?>

        </div>
    </div>
    <main>
        <div id="rightcolumn">
            <div>
                <h2>Catégories des Services</h2>
                <div class="category">
                    <h3> <a href="activites.html"> Activités sportives</a></h3>
                    <p>Découvrez une variété d'activités sportives adaptées à tous les âges et niveaux. Nos programmes incluent des cours de yoga, de natation, de danse, et bien plus encore. Rejoignez nos sessions pour rester actif et en bonne santé.</p>
                </div>
                <div class="category">
                    <h3><a href="sportcompet.html"> Les Sports de compétition</a></h3>
                    <p>Participez à des sports de compétition excitants, y compris le football, le basketball, le tennis, et bien d'autres. Nous offrons des entraînements rigoureux et des compétitions régulières pour les athlètes souhaitant améliorer leurs performances et atteindre de nouveaux sommets.</p>
                </div>
                <div class="category">
                    <h3><a href="sallesport.html">Salle de sport Omnes</a></h3>
                    <p>Notre salle de sport Omnes est équipée des dernières technologies et offre un environnement parfait pour vos séances de fitness. Des entraîneurs professionnels sont disponibles pour vous guider et personnaliser vos programmes d'entraînement selon vos besoins.</p>
                </div>
                <br>
            </div>
        </div>
    </main>
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


