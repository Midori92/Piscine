<?php
$database = "sportify";

//connectez-vous dans votre BDD
//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
$db_handle = mysqli_connect('localhost', 'root', '' );
$db_found = mysqli_select_db($db_handle, $database);

$me = 132645; ///session
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

        .recu{
            color:white;
            background: gray;
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
            margin-bottom: 10px;
            margin-right: 200px;
            width: 100px;
            float:right;
            clear: both;
            border-radius: 50px;
        }

        .chat{
            margin:auto;
            background-color: black;
        }

        form{
            margin-right: auto;
            margin-left: auto;
            clear: both;
        }
    </style>
</head>
<body>

    <?php
    $coach = isset($_POST["Coach"])? mysqli_real_escape_string($db_handle, $_POST["Coach"]) : "";
    $mess = isset($_POST["message"])? mysqli_real_escape_string($db_handle, $_POST["message"]) : "";



    $sql1 = "INSERT INTO message (source, dest, message) 
Values ('$me','$coach','$mess')";



    if (mysqli_query($db_handle, $sql1)){
        //if($conn->query($sql1) == TRUE) {
            echo "
<br>
<p> Message envoyé ! </p>

";
    }


    //affichage  message
    ?>


<h1> Messages </h1>

<div class="chat">
<?php


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

    <table>

        <form action = "" method = "post">

            <input type = "text" name = "message" required>
            <INPUT TYPE = "Submit" Name = "Submit1" VALUE = "Envoyer"> <br>
            <label for="Coach">Choose a Coach:</label>
            <select id="Coach" name="Coach">



                <?php

                ///affichage nom coach
                while ($data = mysqli_fetch_assoc($result)){

                    echo'
            <option value="'.$data["Nom"].'">'. $data["Nom"].'</option>
            ';
                }


                ?>
        </form>
    </table>

</div>

</body>
</html>
