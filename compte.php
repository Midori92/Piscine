<?php

session_start();
$connect = isset($_SESSION['connexion']) ? $_SESSION['connexion'] : null;
$poste_sess = isset($_SESSION['poste']) ? $_SESSION['poste'] : null;
$login_sess = isset($_SESSION['login']) ? $_SESSION['login'] : null;


$login = isset($_POST["id"])? $_POST["id"] : "";
$pass = isset($_POST["mdp"])? $_POST["mdp"] : "";


//test//
$users = array("admin" => "123654789");


$database = "sportify";

//connectez-vous dans votre BDD
//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)s
$db_handle = mysqli_connect('localhost', 'root', '',$database, 3307 );
$db_found = mysqli_select_db($db_handle, $database);

//0 -> non connecté
$who = 0; //1 -> admin // 2 -> coatch // 3 -> client

//Si l'utilisateur est valide, vérifier son mot de passe
$connexion = false;
?>
<!DOCTYPE html>
<head>
    <title>Sportify: Mon Compte</title>
    <meta charset="utf-8"/>
    <link href="prime.css" rel="stylesheet" type="text/css" />
    <link rel="icon"type="image/x-icon" href="favicon.ico">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
</head>


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

        table{
            margin-right: auto;
            margin-left: auto;
        }

        h1{
            text-align: center;
        }

        footer{
            clear: both;
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
                if ($connect == TRUE) { //si connecté
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



    //connexion debuts
if ($pass == "123654789" && $login == "admin") { ///admin $who = 1
    $connexion = true;
    $poste = 1;
    $who = 1;

}

//dééjà connecté

if($connect !== null) {
    if ($connect == TRUE) {
        $login = $login_sess;

        if ($poste_sess == 1) { //admin


            //affichage coach

            $sql = "SELECT * FROM coach";
            $result = mysqli_query($db_handle, $sql);

            echo "




    <h1> LISTE DE COACH </h1>

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

    ";

            }
            echo"</table>";

            ///ajouter un coatch

            echo "

    


    

    <table>
        <form action = 'admin.php' method = 'post'>
        <tr>
        <td colspan='2'>
        <h1> AJOUTER OU SUPPRIMER COACH </h1>
</td>
</tr>
        <tr> 
            <td>  NOM </td>
            <td><input type = 'text' name = 'nom'></td> 
        </tr>
        <tr> 
            <td> Spécialité </td>
            <td><input type = 'text' name = 'spe'></td> 
        </tr>

        <tr> 
            <td> Photo </td>
            <td><input type = 'text' name = 'photo'></td> 
        </tr>

        <tr> 
            <td> Adresse </td>
            <td><input type = 'text' name = 'ad'></td> 
        </tr>

        <tr> 
            <td> Mail </td>
            <td><input type = 'text' name = 'mail'></td> 
        </tr>

        <tr> 
            <td> Tarif </td>
            <td><input type = 'text' name = 'tarif'></td> 
        </tr>

        <tr>
            <td colspan='2'>
            <INPUT TYPE = 'Submit' Name = 'Ajouter' VALUE = 'Ajouter'>
        </td>
        <tr>
            <td colspan='2'>
            <INPUT TYPE = 'Submit' Name = 'Supprimer' VALUE = 'Supprimer'>
        </td>
        </tr>

        

        </form>
    </table>    
        ";

            //affichage clients

            $sql0 = "SELECT * FROM client";
            $result0 = mysqli_query($db_handle, $sql0);

            echo "
    

    <table>
    <tr>
    <th colspan='6'>
    <h1> LISTE DE CLIENT </h1>
</th>
</tr>
    <tr>

    <th> NOM </th> <th> Prenom </th> <th> Adresse </th> <th>Numero </th>
     <th> Carte </th> <th> Mot de passe </th>  

     </tr>
    ";

            while ($data = mysqli_fetch_assoc($result0)) {


                ///affichage
                echo "

     <tr> 
        <td>" . $data['Nom'] . " </td> 
        <td>" . $data['Prenom'] . " </td>
        <td>" . $data['Adresse'] . " </td>
        <td>" . $data['Numero'] . " </td>
        <td>" . $data['Carte'] . " </td>
         <td> " . $data['Mot_de_passe'] . "</td>         
     </tr>

    ";

            }

///Disponibilité des coach

$sql = "SELECT * FROM coach";
$result = mysqli_query($db_handle, $sql);

?>

        </table>


            <table>
                <form action="admin.php" method="post">
                        <tr>
                            <td colspan="2">
                                <h1> Disponibilité des coachs </h1>
                            </td>
                        </tr>
                    <tr>
                        <td><label for="Coach">Choose a Coach:</label></td>
                        <td>  <select id="Coach" name="Coach">

                                <?php

                                ///affichage nom coach
                                while ($data = mysqli_fetch_assoc($result)){

                                    echo'
            <option value="'.$data["Nom"].'">'. $data["Nom"].'</option>
            ';  }

                                ?>
                        </td>
                        </select>
                    </tr>
                    <tr>
                        <td><label for="day">Choose le jour:</label>

                        </td>
                        <td><select id="day" name="day">
                            <option value="lundi" > Lundi </option>
                            <option value="mardi" > Mardi </option>
                            <option value="mercredi" > Mercredi </option>
                                <option value="jeudi" > Jeudi </option>
                                <option value="vendredi" > Vendredi </option>
                                <option value="samedi" > Samedi </option>
                                <option value="dimanche" > Dimanche </option>
                            </select>
                        </td>

                    </tr>
                    <tr>
                        <td><label for="horaire">Horaire</label>

                        </td>
                        <td><select id="horaire" name="horaire">
                            <option value="1011" > 10h-11h </option>
                            <option value="1112" > 11h-12h </option>
                            <option value="1213" > 12h-13h </option>
                                <option value="1314" > 13h-14h </option>
                                <option value="1415" > 14h-15h </option>
                                <option value="1516" > 15h-16h </option>
                                <option value="1617" > 16h-17h </option>
                                <option value="1718" > 17h-18h </option>
                                <option value="1819" > 18h-19h </option>
                                <option value="1920" > 19h-20h </option>
                                <option value="2021" > 20h-21h </option>
                                <option value="2122" > 21h-22h </option>

                            </select>
                        </td>

                    </tr>

                <tr>
                    <td colspan="2">
                        <INPUT TYPE = "Submit" Name = "Disponibilite" VALUE = "Disponibilite">
                    </td>
                </tr>
                </form>
            </table>

<?php
            ///Disponibilité des salles

    //        $sql_salle = "SELECT * FROM salle_sport";
     //       $result = mysqli_query($db_handle, $sql_salle);

            ?>

            </table>


            <table>
                <form action="admin.php" method="post">
                    <tr>
                        <td colspan="2">
                            <h1> Disponibilité des Salles </h1>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="salle">Choose a salle:</label></td>
                        <td>  <select id="salle" name="salle">

                                <?php

                                ///affichage nom coach
                                while ($data = mysqli_fetch_assoc($result)){

                                    echo'
            <option value="'.$data["Salle"].'">'. $data["Salle"].'</option>
            ';  }

                                ?>
                        </td>
                        </select>
                    </tr>
                    <tr>
                        <td><label for="day">Choose le jour:</label>

                        </td>
                        <td><select id="day" name="day">
                                <option value="lundi" > Lundi </option>
                                <option value="mardi" > Mardi </option>
                                <option value="mercredi" > Mercredi </option>
                                <option value="jeudi" > Jeudi </option>
                                <option value="vendredi" > Vendredi </option>
                                <option value="samedi" > Samedi </option>
                                <option value="dimanche" > Dimanche </option>
                            </select>
                        </td>

                    </tr>
                    <tr>
                        <td><label for="horaire">Horaires:</label>

                        </td>
                        <td><select id="horaire" name="horaire">
                                <option value="1011" > 10h-11h </option>
                                <option value="1112" > 11h-12h </option>
                                <option value="1213" > 12h-13h </option>
                                <option value="1314" > 13h-14h </option>
                                <option value="1415" > 14h-15h </option>
                                <option value="1516" > 15h-16h </option>
                                <option value="1617" > 16h-17h </option>
                                <option value="1718" > 17h-18h </option>
                                <option value="1819" > 18h-19h </option>
                                <option value="1920" > 19h-20h </option>
                                <option value="2021" > 20h-21h </option>
                                <option value="2122" > 21h-22h </option>

                            </select>
                        </td>

                    </tr>

                    <tr>
                        <td colspan="2">
                            <INPUT TYPE = "Submit" Name = "Disponibilite_salle" VALUE = "Disponibilite_salle">
                        </td>
                    </tr>
                </form>
            </table>

<?php
        }


        if ($poste_sess == 2) { //coach


            $sql = "SELECT * FROM coach WHERE Mail = '$login'";
            $result = mysqli_query($db_handle, $sql);
            //  $poste = 2;
            $days = array('lundi','mardi','mercredi','jeudi','vendredi','samedi','dimanche');
            $heures = array('10h-11h', '11h-12h', '12h-13h','13h-14h','14h-15h','15h-16h','16h-17h','17h-18h','18h-19h','19h-20h','20h-21h','21h-22h');

//bouton message


            if ($data = mysqli_fetch_assoc($result)) {

                echo " BIENVENUE " . $data["Nom"] . " ! <br>

    <br> 
    <h1> VOS INFOS </h1>

<table>
    <tr> <td> Specialité </td>
    <td>" . $data["Specialite"] . "</td>
     </tr>

     <tr> <td> PHOTO </td>
    <td>" . $data["Photo"] . "</td>
     </tr>

     <tr> <td> Adresse </td>
    <td>" . $data["Adresse"] . "</td>
     </tr>

     <tr> <td> Mail </td>
    <td>" . $data["Mail"] . "</td>
     </tr>

     <tr> <td> Tarif </td>
    <td>" . $data["Tarif"] . "</td>
     </tr>


</table>


<table>
<tr>
<th colspan='8'> <h1>Diponibilité</h1></th>
</tr>

<tr>
        <td> </td>
        <td> Lundi </td>
        <td> Mardi </td>
        <td> Mercredi </td>
        <td> Jeudi </td>
        <td> Vendredi </td>
        <td> Samedi </td>
        <td> Dimanche </td>

</tr>
   ";


$valeur= "" ;
$hours = "" ;
                foreach( $heures as $hours){


echo"
    <tr>
    <td> " . $hours . " </td>
    ";
            foreach( $days as $valeur) {
                        $sql_edt = "SELECT * FROM dispo_coach WHERE Jour = '$valeur' AND Horaire = '$hours'";
                        $result_edt = mysqli_query($db_handle, $sql_edt);


                        if($data = mysqli_fetch_assoc($result_edt)) {
                            echo "
                
                     <td style='background-color: green'> 
                            Disponible
                     </td>";
                        }

                       else {
                            echo "
                
                     <td style='background-color: red'> 
                            Non disponible
                     </td>";
                       }
                    }
echo"
            </tr>";
                }

                    ?>
    </tr>
</table>

<?php
            }


        }

        if ($poste_sess == 3) { //client

            $sql = "SELECT * FROM client WHERE Carte = '$login'";
            $result = mysqli_query($db_handle, $sql);


            if ($data = mysqli_fetch_assoc($result)) {

                echo " BIENVENUE " . $data["Nom"] . " " . $data["Prenom"] . " ! <br>

<br> 
<h1> VOS INFOS </h1>

<table>
<tr> <td> Adresse </td>
<td>" . $data["Adresse"] . "</td>
 </tr>

 <tr> <td> Numero de carte étudiante </td>
<td>" . $data["Carte"] . "</td>
 </tr>


 <tr> <td> Carte </td>
<td>" . $data["Carte"] . "</td>
 </tr>
 ";

            }

            echo "

</table>
<br>

<h1> VOS RDV </h1>

<table>

<tr> <th> SPE</th> <th> COACH </th> <th> HEURES </th> <th> LIEU </th> </tr>";

            $sql = "SELECT * FROM rdv WHERE Carte = '{$data['Carte']}'";
            $result = mysqli_query($db_handle, $sql);
            if ($data = mysqli_fetch_assoc($result)) {

                echo "
<tr> 
<td> SPE DU COACH </td>
<td>" . $data["coach"] . "</td>
<td>" . $data["Heures"] . "</td>
<td>" . $data["Lieu"] . "</td>
</tr>


";

            }

            "
</table>
";

        }

    }

    else {
        if ($who == 0) {

            $sql0 = "SELECT * FROM coach WHERE Mail = '$login' AND Mot_de_passe ='$pass'";
            $sql1 = "SELECT * FROM client WHERE Carte = '$login' AND Mot_de_passe ='$pass'";
            $result0 = mysqli_query($db_handle, $sql0);
            $result1 = mysqli_query($db_handle, $sql1);


            if ($data = mysqli_fetch_assoc($result0)) { //dans la table coach

                $who = 2;
                $connexion = true;
                echo "
<p> OK: Caotch CONNECTE </p>
";
            }


            if ($data1 = mysqli_fetch_assoc($result1) && $who == 0) { //dans la table client

                $who = 3;
                $connexion = true;

                echo "
<p> OK: client CONNECTE </p>
";

            }

        }

//connexion fin
///////////

        if ($who == 1 && ($_SESSION["connexion"] !== TRUE or $connect == null)) { //admin


            //affichage coach

            $sql = "SELECT * FROM coach";
            $result = mysqli_query($db_handle, $sql);

            echo "




    <h1> LISTE DE COACH <h1>

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

    ";

            }

            ///ajouter un coatch

            echo "

    </table>


    <h1> AJOUTER OU SUPPRIMER COACH </h1>

    <table>
        <form action = 'admin.php' method = 'post'>
        <tr> 
            <td>  NOM </td>
            <td><input type = 'text' name = 'nom'></td> 
        </tr>
        <tr> 
            <td> Spécialité </td>
            <td><input type = 'text' name = 'spe'></td> 
        </tr>

        <tr> 
            <td> Photo </td>
            <td><input type = 'text' name = 'photo'></td> 
        </tr>

        <tr> 
            <td> Adresse </td>
            <td><input type = 'text' name = 'ad'></td> 
        </tr>

        <tr> 
            <td> Mail </td>
            <td><input type = 'text' name = 'mail'></td> 
        </tr>

        <tr> 
            <td> Tarif </td>
            <td><input type = 'text' name = 'tarif'></td> 
        </tr>

        <tr>
            <td colspan='2'>
            <INPUT TYPE = 'Submit' Name = 'Ajouter' VALUE = 'Ajouter'>
        </td>
        <tr>
            <td colspan='2'>
            <INPUT TYPE = 'Submit' Name = 'Supprimer' VALUE = 'Supprimer'>
        </td>
        </tr>

        

        </form>
    </table>    
        ";


//////////////////////////TEST

            //affichage clients

            $sql0 = "SELECT * FROM client";
            $result0 = mysqli_query($db_handle, $sql0);

            echo "
    <h1> LISTE DE CLIENT <h1>

    <table>
    <tr>

    <th> NOM </th> <th> Prenom </th> <th> Adresse </th> <th>Numero </th>
     <th> Carte </th> <th> Mot de passe </th>  

     </tr>
    ";

            while ($data = mysqli_fetch_assoc($result0)) {


                ///affichage
                echo "

     <tr> 
        <td>" . $data['Nom'] . " </td> 
        <td>" . $data['Prenom'] . " </td>
        <td>" . $data['Adresse'] . " </td>
        <td>" . $data['Numero'] . " </td>
        <td>" . $data['Carte'] . " </td>
         <td> " . $data['Mot_de_passe'] . "</td>         
     </tr>

    ";

            }

        }

        if ($who == 2 && ($_SESSION["connexion"] !== TRUE or $connect == null)) { //COACH

            $sql = "SELECT * FROM coach WHERE Mail = '$login' AND Mot_de_passe ='$pass'";
            $result = mysqli_query($db_handle, $sql);
            $poste = 2;


            if ($data = mysqli_fetch_assoc($result)) {

                echo " BIENVENUE " . $data["Nom"] . " ! <br>

    <br> 
    <h1> VOS INFOS </h1>

<table>
    <tr> <td> Specialité </td>
    <td>" . $data["Specialite"] . "</td>
     </tr>

     <tr> <td> PHOTO </td>
    <td>" . $data["Photo"] . "</td>
     </tr>

     <tr> <td> Adresse </td>
    <td>" . $data["Adresse"] . "</td>
     </tr>

     <tr> <td> Mail </td>
    <td>" . $data["Mail"] . "</td>
     </tr>

     <tr> <td> Tarif </td>
    <td>" . $data["Tarif"] . "</td>
     </tr>


</table>


        
<table>
<tr>
<th colspan='8'> <h1>Disponibilités</h1></th>
</tr>

<tr>
        <td> </td>
        <td> Lundi </td>
        <td> Mardi </td>
        <td> Mercredi </td>
        <td> Jeudi </td>
        <td> Vendredi </td>
        <td> Samedi </td>
        <td> Dimanche </td>

</tr>
   ";

                $days = array('lundi','mardi','mercredi','jeudi','vendredi','samedi','dimanche');
                $heures = array('10h-11h', '11h-12h', '12h-13h','13h-14h','14h-15h','15h-16h','16h-17h','17h-18h','18h-19h','19h-20h','20h-21h','21h-22h');

$valeur= "" ;
$hours = "" ;
foreach( $heures as $hours){


    echo"
    <tr>
    <td> " . $hours . " </td>
    ";
    foreach( $days as $valeur) {
        $sql_edt = "SELECT * FROM dispo_coach WHERE Jour = '$valeur' AND Horaire = '$hours'";
        $result_edt = mysqli_query($db_handle, $sql_edt);


        if($data = mysqli_fetch_assoc($result_edt)) {
            echo "
                
                     <td style='background-color: green'> 
                            Disponible
                     </td>";
        }

        else {
            echo "
                
                     <td style='background-color: red'> 
                            Non disponible
                     </td>";
        }
    }
    echo"
            </tr>";
}

?>
            </tr>
            </table>
          <?php  }

            if ($who == 3 && ($_SESSION["connexion"] !== TRUE or $connect == null)) { //Client

                $sql = "SELECT * FROM client WHERE Carte = '$login' AND Mot_de_passe ='$pass'";
                $result = mysqli_query($db_handle, $sql);
                $poste = 3;

//bouton message

                echo "
<button><a href='message.php'> MESSAGE</a> </button>
";

                if ($data = mysqli_fetch_assoc($result)) {
                    //if(($data['Carte'] == $id) && ($data["Mot de pasee"] == $pass)) ////A revoirr


                    echo " BIENVENUE " . $data["Nom"] . " " . $data["Prenom"] . " ! <br>

<br> 
<h1> VOS INFOS </h1>

<table>
<tr> <td> Adresse </td>
<td>" . $data["Adresse"] . "</td>
 </tr>

 <tr> <td> Numero de carte étudiante </td>
<td>" . $data["Carte"] . "</td>
 </tr>


 <tr> <td> Carte </td>
<td>" . $data["Carte"] . "</td>
 </tr>
 ";

                }

                echo "

</table>
<br>

<h1> VOS RDV </h1>

<table>

<tr> <th> SPE</th> <th> COACH </th> <th> HEURES </th> <th> LIEU </th> </tr>";

                $sql = "SELECT * FROM rdv WHERE Carte = '{$data['Carte']}'";
                $result = mysqli_query($db_handle, $sql);
                if ($data = mysqli_fetch_assoc($result)) {

                    echo "
<tr> 
<td> SPE DU COACH </td>
<td>" . $data["coach"] . "</td>
<td>" . $data["Heures"] . "</td>
<td>" . $data["Lieu"] . "</td>
</tr>


";

                }

                "
</table>
";

            }

//Message
            if ($who == 0 && ($_SESSION["connexion"] !== TRUE or $connect == null)) {
                echo "Connexion refusée. Utilisateur inconnu.
<br>
Etes-vous sûr d'avoir déjà un compte ? <br> <br>
<button TYPE='button'>
<a href='index.php'><INPUT TYPE = 'button' Name = 'index' VALUE = 'index'> </a>
</button> 
<a href='creation.html'><INPUT TYPE = 'button' Name = 'Pas de compte' VALUE = 'Pas de compte ?'> </a>
</button> 

";
            }


        }
    }

}


//pas encore connecté
else {

    if ($who == 0) {

        $sql0 = "SELECT * FROM coach WHERE Mail = '$login' AND Mot_de_passe ='$pass'";
        $sql1 = "SELECT * FROM client WHERE Carte = '$login' AND Mot_de_passe ='$pass'";
        $result0 = mysqli_query($db_handle, $sql0);
        $result1 = mysqli_query($db_handle, $sql1);


        if ($data = mysqli_fetch_assoc($result0)) { //dans la table coach
            $who = 2;
            $connexion = true;
            echo "
<p> OK: Caotch CONNECTE </p>
";
        }


        if ($data1 = mysqli_fetch_assoc($result1) && $who == 0) { //dans la table client

            $who = 3;
            $connexion = true;

            echo "
<p> OK: client CONNECTE </p>
";

        }

    }

//connexion fin
///////////

    if ($who == 1 && ($_SESSION["connexion"] !== TRUE or $connect == null)) { //admin


        //affichage coach

        $sql = "SELECT * FROM coach";
        $result = mysqli_query($db_handle, $sql);

        echo "




    <h1> LISTE DE COACH </h1>

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

    ";

        }

        ///ajouter un coatch

        echo "

    </table>


    <h1> AJOUTER OU SUPPRIMER COACH </h1>

    <table>
        <form action = 'admin.php' method = 'post'>
        <tr> 
            <td>  NOM </td>
            <td><input type = 'text' name = 'nom'></td> 
        </tr>
        <tr> 
            <td> Spécialité </td>
            <td><input type = 'text' name = 'spe'></td> 
        </tr>

        <tr> 
            <td> Photo </td>
            <td><input type = 'text' name = 'photo'></td> 
        </tr>

        <tr> 
            <td> Adresse </td>
            <td><input type = 'text' name = 'ad'></td> 
        </tr>

        <tr> 
            <td> Mail </td>
            <td><input type = 'text' name = 'mail'></td> 
        </tr>

        <tr> 
            <td> Tarif </td>
            <td><input type = 'text' name = 'tarif'></td> 
        </tr>

        <tr>
            <td colspan='2'>
            <INPUT TYPE = 'Submit' Name = 'Ajouter' VALUE = 'Ajouter'>
        </td>
        <tr>
            <td colspan='2'>
            <INPUT TYPE = 'Submit' Name = 'Supprimer' VALUE = 'Supprimer'>
        </td>
        </tr>

        

        </form>
    </table>    
        ";


//////////////////////////TEST

        //affichage clients

        $sql0 = "SELECT * FROM client";
        $result0 = mysqli_query($db_handle, $sql0);

        echo "
    <h1> LISTE DE CLIENT </h1>

    <table>
    <tr>

    <th> NOM </th> <th> Prenom </th> <th> Adresse </th> <th>Numero </th>
     <th> Carte </th> <th> Mot de passe </th>  

     </tr>
    ";

        while ($data = mysqli_fetch_assoc($result0)) {


            ///affichage
            echo "

     <tr> 
        <td>" . $data['Nom'] . " </td> 
        <td>" . $data['Prenom'] . " </td>
        <td>" . $data['Adresse'] . " </td>
        <td>" . $data['Numero'] . " </td>
        <td>" . $data['Carte'] . " </td>
         <td> " . $data['Mot_de_passe'] . "</td>         
     </tr>

    ";

        }

    }

    if ($who == 2 && ($_SESSION["connexion"] !== TRUE or $connect == null)) { //COACH

        $sql = "SELECT * FROM coach WHERE Mail = '$login' AND Mot_de_passe ='$pass'";
        $result = mysqli_query($db_handle, $sql);
        $poste = 2;


        if ($data = mysqli_fetch_assoc($result)) {

            echo " BIENVENUE " . $data["Nom"] . " ! <br>

    <br> 
    <h1> VOS INFOS </h1>

<table>
    <tr> <td> Specialité </td>
    <td>" . $data["Specialite"] . "</td>
     </tr>

     <tr> <td> PHOTO </td>
    <td>" . $data["Photo"] . "</td>
     </tr>

     <tr> <td> Adresse </td>
    <td>" . $data["Adresse"] . "</td>
     </tr>

     <tr> <td> Mail </td>
    <td>" . $data["Mail"] . "</td>
     </tr>

     <tr> <td> Tarif </td>
    <td>" . $data["Tarif"] . "</td>
     </tr>


</table>

        
<table>
<tr>
<th colspan='8'> <h1>Diponibilité</h1></th>
</tr>

<tr>
        <td> </td>
        <td> Lundi </td>
        <td> Mardi </td>
        <td> Mercredi </td>
        <td> Jeudi </td>
        <td> Vendredi </td>
        <td> Samedi </td>
        <td> Dimanche </td>

</tr>
   ";

$days = array('lundi','mardi','mercredi','jeudi','vendredi','samedi','dimanche');
$heures = array('10h-11h', '11h-12h', '12h-13h','13h-14h','14h-15h','15h-16h','16h-17h','17h-18h','18h-19h','19h-20h','20h-21h','21h-22h');

$valeur= "" ;
$hours = "" ;
foreach( $heures as $hours){


    echo"
    <tr>
    <td> " . $hours . " </td>
    ";
    foreach( $days as $valeur) {
        $sql_edt = "SELECT * FROM dispo_coach WHERE Jour = '$valeur' AND Horaire = '$hours'";
        $result_edt = mysqli_query($db_handle, $sql_edt);


        if($data = mysqli_fetch_assoc($result_edt)) {
            echo "
                
                     <td style='background-color: green'> 
                            Disponible
                     </td>";
        }

        else {
            echo "
                
                     <td style='background-color: red'> 
                            Non disponible
                     </td>";
        }
    }
    echo"
            </tr>";
}

?>
            </tr>
            </table>


<?php


            }
        }



        if ($who == 3 && ($_SESSION["connexion"] !== TRUE or $connect == null)) { //Client

            $sql = "SELECT * FROM client WHERE Carte = '$login' AND Mot_de_passe ='$pass'";
            $result = mysqli_query($db_handle, $sql);
            $poste = 3;

            if ($data = mysqli_fetch_assoc($result)) {
                //if(($data['Carte'] == $id) && ($data["Mot de pasee"] == $pass)) ////A revoirr


                echo " BIENVENUE " . $data["Nom"] . " " . $data["Prenom"] . " ! <br>

<br> 
<h1> VOS INFOS </h1>

<table>
<tr> <td> Adresse </td>
<td>" . $data["Adresse"] . "</td>
 </tr>

 <tr> <td> Numero de carte étudiante </td>
<td>" . $data["Carte"] . "</td>
 </tr>


 <tr> <td> Carte </td>
<td>" . $data["Carte"] . "</td>
 </tr>
 ";

            }

            echo "

</table>
<br>

<h1> VOS RDV </h1>

<table>

<tr> <th> SPE</th> <th> COACH </th> <th> HEURES </th> <th> LIEU </th> </tr>";

            $sql = "SELECT * FROM rdv WHERE Carte = '{$data['Carte']}'";
            $result = mysqli_query($db_handle, $sql);
            if ($data = mysqli_fetch_assoc($result)) {

                echo "
<tr> 
<td> SPE DU COACH </td>
<td>" . $data["coach"] . "</td>
<td>" . $data["Heures"] . "</td>
<td>" . $data["Lieu"] . "</td>
</tr>


";

            }

            "
</table>
";

        }

//Message
        if ($who == 0 && ($_SESSION["connexion"] !== TRUE or $connect == null)) {
            echo "Connexion refusée. Utilisateur inconnu.
<br>
Etes-vous sûr d'avoir déjà un compte ? <br> <br>
<button TYPE='button'>
<a href='index.php'><INPUT TYPE = 'button' Name = 'index' VALUE = 'index'> </a>
</button> 
<a href='creation.html'><INPUT TYPE = 'button' Name = 'Pas de compte' VALUE = 'Pas de compte ?'> </a>
</button> 

";
        }



}

if ($connexion) {

    $_SESSION['connexion'] = $connexion;
    $_SESSION['poste'] = $poste;
    $_SESSION['login'] = $login; //numero client ou mail


echo "<p> Vous vous êtes connecté </p>
<button> <a href='deconnect.php'> Deconnexion  </a> </button>
<button> <a href='connexion.php'> Connexion  </a> </button>";


}

if(!$connexion && !$connect OR $connect == null) {
echo "Connexion refusée. Mot de passe invalide.";

}

?>


</div>
    
<footer>
        <p class="contact">Sportify <br>  
            67 avenue Marceau 75015 Paris</p> 
            Contactez-nous : <a href="mailto:sportify@omneseducation.com">sportify@omneseducation.com</a> | Téléphone : 01 23 45 67 89</p>
    </footer> 
    </div>
</div>
</main>
</body>
</html>