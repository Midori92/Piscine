<?php

session_start();

$connect = isset($_SESSION['connexion']) ? $_SESSION['connexion'] : null;

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
                <img  src="parcourirbouton.png" alt = 'parcourir' width="150" heigh="115">
            </a>

            <a href="recherche.html">
                <img  src="recherchebouton.png" alt = 'recherche' width="150" heigh="150">
            </a>

            <a href="rendezvous.html">
                <img  src="rendezvousbouton.png" alt = 'rdv' width="150" heigh="150">
            </a>

            <?php
            if($connect == TRUE) { //dejà connecté
                echo"
                <a href = 'compte.php' >
                    <img  src = 'votrecompte.png' alt = 'moncompte' width = '115' heigh = '150' >
                </a >";
            }

            else{ //non connecté
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
            <br>
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

        <div id="rightcolumn">


<?php

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

        </div>
    </main>
    </div>
</div>
    </body>
</html>
