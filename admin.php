<?php
$nom = isset($_POST["nom"])? $_POST["nom"] : "";
$spe = isset($_POST["spe"])? $_POST["spe"] : "";
$photo = isset($_POST["photo"])? $_POST["photo"] : "";
$adresse = isset($_POST["ad"])? $_POST["ad"] : "";
$mail = isset($_POST["mail"])? $_POST["mail"] : "";
$tarif = isset($_POST["tarif"])? $_POST["tarif"] : "";
$database = "sportify";

//connectez-vous dans votre BDD//
//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
$db_handle = mysqli_connect('localhost', 'root', '' );
$db_found = mysqli_select_db($db_handle, $database);

if ($db_found) {

 //ajouter coach dans database


///Si c'est le bouton Ajouter qui est présser
if(isset($_POST['Ajouter'])){

$conn = new mysqli('localhost', 'root', '',$database);

$sql1 = "INSERT INTO coach (Nom, Specialite, Adresse, Photo, Mail, Tarif) 
Values ('$nom','$spe','$photo','$adresse','$mail','$tarif')";


if($conn->query($sql1) == TRUE){
echo"

<p> Vous avez ajoutez '. $nom .'  </p>


";

}
}

///Si c'est le bouton supprimer qui est présser
if(isset($_POST['Supprimer'])){

$conn = new mysqli('localhost', 'root', '',$database);

$sql1 = "DELETE FROM coach
WHERE Nom = '$nom' AND Specialite = '$spe'";

if($conn->query($sql1)){

echo"
<p> Vous avez supprimé le coatch: '. $nom .'  </p>
"
;
}



//affichage coach

	 $sql = "SELECT * FROM coach";
 	$result = mysqli_query($db_handle, $sql);

echo"
<h1> LISTE DE COATCH <h1>

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
<td> <img src='".$data['Photo']."' height='100' width='100'>" .  " </td>
<td>" . $data['Adresse'] . " </td>
<td>" . $data['Mail'] . " </td>
 <td> CV </td>
 <td> " . $data['Tarif'] . "</td>

 </tr>

<button type ='button'> Ajouter un coach </button> 


";

}

}
}
?>