<?php
$database = "sportify";

//connectez-vous dans votre BDD
//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
$db_handle = mysqli_connect('localhost', 'root', '' );
$db_found = mysqli_select_db($db_handle, $database);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chatroom</title>
</head>
<body>
<table>

    <form action = "" method = "post">

        <input type = "text" name = "message" required>
        <INPUT TYPE = "Submit" Name = "Submit1" VALUE = "Envoyer"> <br>
        <label for="Coach">Choose a Coach:</label>
        <select id="Coach" name="Coach">



        <?php
        $me = 132645; ///session
        $sql = "SELECT * FROM coach";
	 	$result = mysqli_query($db_handle, $sql);
        $conn = new mysqli('localhost', 'root', '',$database);

         ///affichage nom coach
        while ($data = mysqli_fetch_assoc($result)){

            echo'
            <option value="'.$data["Nom"].'">'. $data["Nom"].'</option>
            ';
        }

        $coach = isset($_POST["Coach"])? $_POST["Coach"] : "";
        $mess = isset($_POST["message"])? $_POST["message"] : "";

?>
    </form>

    <?php


        $sql1 = "INSERT INTO message (source, dest, message) 
Values ('$me','$coach','$mess')";



        if($conn->query($sql1) == TRUE) {
            echo "

<br>
<p> '.$mess.' à '.$coach.' </p>

";

        }  ?>




</table>
</body>
</html>
