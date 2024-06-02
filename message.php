<?php
session_start();

$connect = isset($_SESSION['connexion']) ? $_SESSION['connexion'] : null;
$poste_sess = isset($_SESSION['poste']) ? $_SESSION['poste'] : null;
$login_sess = isset($_SESSION['login']) ? $_SESSION['login'] : null;


$database = "sportify";

//connectez-vous dans votre BDD
//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
$db_handle = mysqli_connect('localhost', 'root', '' );
$db_found = mysqli_select_db($db_handle, $database);

$who = $poste_sess; //1/2 ou 3
$me = $login_sess; //mail ou carte

//nom du coach a partir de son mail
$namecoach = "SELECT * From coach WHERE Mail = '$me'";
$nom_coach = mysqli_query($db_handle, $namecoach);
$me_coach = mysqli_fetch_assoc($nom_coach);

//nom du client a partir de sa carte
$nameclient = "SELECT * From Client WHERE Carte = '$me'";
$nom_client = mysqli_query($db_handle, $nameclient);
$me_client = mysqli_fetch_assoc($nom_client);

$sql = "SELECT * FROM coach";
$result = mysqli_query($db_handle, $sql);

$conn = new mysqli('localhost', 'root', '',$database);
//me = email.

echo"<a href='compte.php'>
                <img  src='votrecompte.png' alt='moncompte' width='115' heigh='150'>
            </a>";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Chatroom</title>

    <style>

        p, h1{
            text-align: center;
        }

        .titre {
            color: white;
            background-color: gray;
            height: 30px;
            border-radius: 50px;
            margin-top: 5px;

        }

        .recu{
            color:white;
            background: blue;
            margin-bottom: 10px;
            width: 100px;
            float: left;
            margin-bottom: 10px;
            margin-right: 200px;
            width: 100px;
            clear: both;
            border-radius: 50px;
        }

        .send{
            color:white;
            background: blueviolet;
           margin-right: 20px;
            width: 100px;
            float:right;
            clear: both;
            border-radius: 50px;
        }

        .chat{
            margin:0 auto;
            padding: 20px;
            background-color: black;
            width:50%;
            max-width: 600px;
            border-radius: 10px;
            position:relative;
            top:50%;
        }

        form{
            margin-right: auto;
            margin-left: auto;
            clear: both;
        }


    </style>
</head>
<body>

<?php // connecté

if($poste_sess !== null && $login_sess !== null && $connect !== null){
        if( $_SESSION['connexion'] == TRUE){ ?>

            <?php
        //raisonnement nom coach -> numero client
            if ($who == 2){ //coach

                $client = isset($_POST["client"]) ? mysqli_real_escape_string($db_handle, $_POST["client"]) : "";
                $mess = isset($_POST["message"]) ? mysqli_real_escape_string($db_handle, $_POST["message"]) : "";

                $sql_cl = "SELECT * From client WHERE Nom = '$client'";
                $result_cl = mysqli_query($db_handle, $sql_cl);
                $info_client = mysqli_fetch_assoc($result_cl);

                $sql1 = "INSERT INTO message (source, dest, message) 
        Values ('$me_coach[Nom]','$info_client[Carte]','$mess')";



                if (mysqli_query($db_handle, $sql1)){
                    //if($conn->query($sql1) == TRUE) {
                    echo "
        <br>
        <p> Message envoyé ! </p>
         <p> ".$me." ". $me_coach["Nom"]." ".$client." </p>
        ";
                }
            }



            if ($who == 3){ //client

                $coach = isset($_POST["Coach"]) ? mysqli_real_escape_string($db_handle, $_POST["Coach"]) : "";
                $mess = isset($_POST["message"]) ? mysqli_real_escape_string($db_handle, $_POST["message"]) : "";

                $sql1 = "INSERT INTO message (source, dest, message) 
        Values ('$me_client[Carte]','$coach','$mess')";



            if (mysqli_query($db_handle, $sql1)){
                //if($conn->query($sql1) == TRUE) {
                    echo "
        <br>
        <p> Message envoyé ! </p>
         <p> ".$_SESSION['login']." ". $me_client["Nom"]." ".$coach."</p>
        ";
            }
         }

            //affichage  message
            ?>


        <h1> Messages </h1>

        <div class="chat">
            <div class="titre"> <p>
                    <?php  if($who == 2) //coach
                    {
                        echo"$client";
                    }

                    if($who == 3) //client
                    {
                        echo "$coach";
                    }

                    ?>
                </p></div>
            <div class="message">

        <?php

        if($who == 3) //client

        {

        //$caoch == nom et prenom du coach choisi

        $sql_mess1 = "SELECT * FROM message WHERE (source = '$me' AND dest = '$coach') OR (source = '$coach' AND dest = '$me') ORDER BY id ASC";
        $result_mess1 = mysqli_query($db_handle, $sql_mess1);

        while ($data = mysqli_fetch_assoc($result_mess1)) {

            if ($data['source'] == $me) {
                echo "<p class='send'>".$data['message']."</p>";
            } else {
                echo "<p class='recu'>".$data['message']."</p>";
            }

        }

        ?>

        <div class="bas">

                <form action = "" method = "post">
        <div class="form1">
                    <label for="Coach">Choose a Coach:</label>
                    <select id="Coach" name="Coach">



                        <?php

                        ///affichage nom coach
                        while ($data = mysqli_fetch_assoc($result)){

                            echo'
                    <option value="'.$data["Nom"].'">'. $data["Nom"].'</option>
                    ';  }

                        ?>
        </div>
        <?php }


        if($who == 2) //coach

        {

        $sql_coach = "SELECT * FROM client";
        $result_coach = mysqli_query($db_handle, $sql_coach);


        $sql_mess2 = "SELECT * FROM message WHERE (source = '$me_coach[Nom]' AND dest = '$info_client[Carte]') OR (source = '$info_client[Carte]' AND dest = '$me_coach[Nom]') ORDER BY id ASC";
        $result_mess2 = mysqli_query($db_handle, $sql_mess2);

        while ($data = mysqli_fetch_assoc($result_mess2)) {

            if ($data['source'] == $me_coach['Nom']) {
                echo "<p class='send'>".$data['message']."</p>";
            } else {
                echo "<p class='recu'>".$data['message']."</p>";
            }

        }
        //ORDER BY ID ASC



        ?>

                    <div class="bas">

                        <form action = "" method = "post">
                            <div class="form1">
                                <label for="client">Choose a client:</label>
                                <select id="client" name="client">



                                    <?php

                                    ///affichage nom client
                                    while ($data = mysqli_fetch_assoc($result_coach)){

                                        echo'
                    <option value="'.$data["Nom"].'">'. $data["Nom"].' '.$data["Prenom"].'</option>
                    ';  }

                                    ?>
                            </div>
                            <?php }



        ?>


                    <div class="form2">
                    <input type = "text" name = "message" required>
                    <INPUT TYPE = "Submit" Name = "Submit1" VALUE = "Envoyer">


                    </div>


                </form>

        </div>
            </div>
        </div>



            <button> <a href='deconnect.php'> Deconnexion  </a> </button>


            <?php }

        else{ //non connecté

                echo" <p> Vous devez créer un compte ou vous connecter</p>
            
            <button> <a href='creation.html'> Créer un compte  </a> </button>
            <button> <a href='compte.html'> Connexion  </a> </button>";
            }

    }


else{ //non connecté

    echo" <p> Vous devez créer un compte ou vous connecter</p>
    
    <button> <a href='creation.html'> Créer un compte  </a> </button>
    <button> <a href='compte.html'> Connexion  </a> </button>";
} ?>


</body>
</html>
