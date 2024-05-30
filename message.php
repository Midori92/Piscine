<?php
session_start();

$database = "sportify";

//connectez-vous dans votre BDD
//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
$db_handle = mysqli_connect('localhost', 'root', '' );
$db_found = mysqli_select_db($db_handle, $database);

$who = $_SESSION['me']; //1/2 ou 3
$me = $_SESSION['login']; //mail ou carte
$sql = "SELECT * FROM coach";
$result = mysqli_query($db_handle, $sql);

$conn = new mysqli('localhost', 'root', '',$database);


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

        .icon{
            position: fixed;
            border-radius: 50%;
            background-color: blueviolet;
            align-items: center;
            color: white;
            cursor:pointer;

        }
    </style>
</head>
<body>


    <?php

    if ($who == 2){ //coach

        $client = isset($_POST["client"]) ? mysqli_real_escape_string($db_handle, $_POST["client"]) : "";
        $mess = isset($_POST["message"]) ? mysqli_real_escape_string($db_handle, $_POST["message"]) : "";

        $sql1 = "INSERT INTO message (source, dest, message) 
Values ('$me','$client','$mess')";



        if (mysqli_query($db_handle, $sql1)){

            echo "
<br>
<p> Message envoyé ! </p>

";
        }
    }



    if ($who == 3){ //client

        $coach = isset($_POST["Coach"]) ? mysqli_real_escape_string($db_handle, $_POST["Coach"]) : "";
        $mess = isset($_POST["message"]) ? mysqli_real_escape_string($db_handle, $_POST["message"]) : "";

        $sql1 = "INSERT INTO message (source, dest, message) 
Values ('$me','$coach','$mess')";



    if (mysqli_query($db_handle, $sql1)){
        //if($conn->query($sql1) == TRUE) {
            echo "
<br>
<p> Message envoyé ! </p>

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


$sql2 = "SELECT * FROM message WHERE source = '$me' AND dest = '$coach'"; //message envoyé
$sql3 = "SELECT * FROM message WHERE dest = '$me' AND source = '$coach'"; //messages reçu
$result2 = mysqli_query($db_handle, $sql2);
$result3 = mysqli_query($db_handle, $sql3);

while($data = mysqli_fetch_assoc($result2)){//messages envoyé
    echo"
    <p class = 'send'>".$data['message']."</p>
    ";

}

while($data = mysqli_fetch_assoc($result3)){//messages reçu
    echo"
    <p class='recu'>".$data['message']."</p>
    ";

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

$sql = "SELECT * FROM client";
$resultc = mysqli_query($db_handle, $sql);


$sql4 = "SELECT * FROM message WHERE source = '$me' AND dest = '$client'"; //message envoyé
$sql5 = "SELECT * FROM message WHERE dest = '$me' AND source = '$client'"; //messages reçu
$result4 = mysqli_query($db_handle, $sql4);
$result5 = mysqli_query($db_handle, $sql5);


while($data = mysqli_fetch_assoc($result4)){//messages envoyé
    echo"
    <p class = 'send'>".$data['message']."</p>
    ";}

while($data = mysqli_fetch_assoc($result5)){//messages reçu
    echo"
    <p class='recu'>".$data['message']."</p>
    ";

}

?>

            <div class="bas">

                <form action = "" method = "post">
                    <div class="form1">
                        <label for="client">Choose a Client:</label>
                        <select id="client" name="client">



                            <?php

                            ///affichage nom coach
                            while ($data = mysqli_fetch_assoc($resultc)){

                                echo'
            <option value="'.$data["Nom"].'">'. $data["Nom"].' '. $data["Prenom"].'</option>
            ';  }

                            ?>
                    </div>
                    <?php } ?>


            <div class="form2">
            <input type = "text" name = "message" required>
            <INPUT TYPE = "Submit" Name = "Submit1" VALUE = "Envoyer">


            </div>


        </form>

</div>
    </div>
</div>

</body>
</html>
