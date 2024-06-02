<?php

session_start();
$connect = isset($_SESSION['connexion']) ? $_SESSION['connexion'] : null;

$nom = isset($_POST["nom"])? $_POST["nom"] : "";
$spe = isset($_POST["spe"])? $_POST["spe"] : "";
$photo = isset($_POST["photo"])? $_POST["photo"] : "";
$adresse = isset($_POST["ad"])? $_POST["ad"] : "";
$mail = isset($_POST["mail"])? $_POST["mail"] : "";
$tarif = isset($_POST["tarif"])? $_POST["tarif"] : "";

$horaire = isset($_POST["horaire"])? $_POST["horaire"] : "";
$coach = isset($_POST["Coach"])? $_POST["Coach"] : "";
$jour = isset($_POST["day"])? $_POST["day"] : "";

$database = "sportify";

//connectez-vous dans votre BDD//
//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
$db_handle = mysqli_connect('localhost', 'root', '' );
$db_found = mysqli_select_db($db_handle, $database);

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

        p{
            color: black;
        }

        table{
            margin-right: auto;
            margin-left: auto;
        }


    </style>

<div id="wrapper">
    <h1 class=titre> <img width="750" heigh="750" src="titre.png"></h1>
    <div id ="nav">
    <div id="leftcolumn">

        <div id="nav">
            <a href="index.php">
                <img src="accueilbouton.png"  alt = 'index' width="150" heigh="115">
            </a>

            <a href="toutparcourir.php">
                <img  src="parcourirbouton.png"  alt = 'parcourir' width="150" heigh="115">
            </a>

            <a href="recherche.html">
                <img  src="recherchebouton.png"  alt = 'recherche' width="150" heigh="150">
            </a>

            <a href="rendezvous.html">
                <img  src="rendezvousbouton.png"  alt = 'rdv' width="150" heigh="150">
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
    </div>
    <main>

        <div id="rightcolumn">


<?php
if ($db_found) {

    //ajouter coach dans database


///Si c'est le bouton Ajouter qui est présser
    if (isset($_POST['Ajouter'])) {

        $conn = new mysqli('localhost', 'root', '', $database);

        $sql1 = "INSERT INTO coach (Nom, Specialite, Adresse, Photo, Mail, Tarif) 
Values ('$nom','$spe','$photo','$adresse','$mail','$tarif')";


        if ($conn->query($sql1) == TRUE) {
            echo "

<p> Vous avez ajoutez '. $nom .'  </p>


";

        }
    }

///Si c'est le bouton supprimer qui est présser
    if (isset($_POST['Supprimer'])) {

        $conn = new mysqli('localhost', 'root', '', $database);

        $sql1 = "DELETE FROM coach
WHERE Nom = '$nom' AND Specialite = '$spe'";

        if ($conn->query($sql1)) {

            echo "
<p> Vous avez supprimé le coatch: '. $nom .'  </p>
";
        }


//affichage coach

        $sql = "SELECT * FROM coach";
        $result = mysqli_query($db_handle, $sql);

        echo "
<h1> LISTE DE COATCH </h1>

<table>
<tr>

<th> ID </th> <th> Nom </th> <th> Spécialité </th> <th>Photo </th>
 <th> Adresse </th> <th> Mail </th> <th> CV </th> <th> Tarif </th>

 </tr>
";

        while ($data = mysqli_fetch_assoc($result)) {


///affichage
            echo "



 <tr> 
<td>" . $data['ID_coach'] . " </td> 
<td>" . $data['Nom'] . " </td>
<td>" . $data['Specialite'] . " </td>
<td> <img src='" . $data['Photo'] . "' height='100' width='100'>" . " </td>
<td>" . $data['Adresse'] . " </td>
<td>" . $data['Mail'] . " </td>
 <td> CV </td>
 <td> " . $data['Tarif'] . "</td>

 </tr>

<button type ='button'> Ajouter un coach </button> 


";

        }

    }


    //ajout disponibilité dans bdd

    if (isset($_POST['Disponibilite'])) {

       // $sql = "SELECT * FROM coach WHERE Nom = '$coach'";
//        $result = mysqli_query($db_handle, $sql);
//
  //      if ($data = mysqli_fetch_assoc($result)) {
    //        $ID = $data[ID_coach]; }

        $conn = new mysqli('localhost', 'root', '', $database);


        if($horaire == '1011'){
            $heure = '10h-11h';
        }

        if($horaire == '1112'){
            $heure = '11h-12h';
        }

        if($horaire == '1213'){
            $heure = '12h-13h';
        }

        if($horaire == '1314'){
            $heure = '13h-14h';
        }

        if($horaire == '1415'){
            $heure = '14h-15h';
        }

        if($horaire == '1516'){
            $heure = '15h-16h';
        }

        if($horaire == '1617'){
            $heure = '16h-17h';
        }

        if($horaire == '1718'){
            $heure = '17h-18h';
        }

        if($horaire == '1819'){
            $heure = '18h-19h';
        }

        if($horaire == '1920'){
            $heure = '19h-20h';
        }

        if($horaire == '2021'){
            $heure = '20h-21h';
        }

        if($horaire == '2122'){
            $heure = '21h-22h';
        }





       $sql_dispo = "INSERT INTO dispo_coach (Nom, jour, horaire) Values ('$coach','$jour','$heure')";
       if ($conn->query($sql_dispo) == TRUE)
          {
             echo "<p> Vous avez ajouté la disponibilité de " . $coach . " le " . $jour . " à " . $heure . " ! </p>";

         }


    }
}
?>

        </div>
    </main>
    </div>
</div>
    </body>
</html>