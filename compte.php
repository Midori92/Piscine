<?php
$login = isset($_POST["id"])? $_POST["id"] : "";
$pass = isset($_POST["mdp"])? $_POST["mdp"] : "";


//test//
$users = array("admin" => "123654789");


$database = "sportify";

//connectez-vous dans votre BDD
//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
$db_handle = mysqli_connect('localhost', 'root', '' );
$db_found = mysqli_select_db($db_handle, $database);

//0 -> non connecté
$who = 0; //1 -> admin // 2 -> coatch // 3 -> client

//Si l'utilisateur est valide, vérifier son mot de passe
$connexion = false;

	//connexion debuts
if ($pass == "123654789" && $login == "admin") { ///admin $who = 1
	$connexion = true;
	$who = 1;

}

echo"
<a href='message.php'>
            <img  src='message.png' alt='messagerie' width='115' heigh='150'>
        </a>

        <a href='acceuil.php'>
            <img  src='acceuil.png' alt='acceuil' width='115 heigh='150'>
        </a>

";
if($who == 0){

	$sql0 = "SELECT * FROM coach WHERE Mail = '$login' AND Mot_de_passe ='$pass'";
	$sql1 = "SELECT * FROM client WHERE Carte = '$login' AND Mot_de_passe ='$pass'";
	$result0 = mysqli_query($db_handle, $sql0);
	$result1 = mysqli_query($db_handle, $sql1);


if($data = mysqli_fetch_assoc($result0)){ //dans la table coach

		$who = 2;
		$connexion = true;
		echo "
<p> OK: Caotch CONNECTE </p>
";
}



if($data1 = mysqli_fetch_assoc($result1) && $who == 0){ //dans la table client

		$who = 3;
		$connexion = true;

		echo"
<p> OK: client CONNECTE </p>
";

	}

}

//connexion fin 
///////////

if ($who == 1){ //admin


	//affichage coach

		 $sql = "SELECT * FROM coach";
	 	$result = mysqli_query($db_handle, $sql);

	echo"




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
		<td> <img src='".$data['Photo']."' height='100' width='100'>" .  " </td>
		<td>" . $data['Adresse'] . " </td>
		<td>" . $data['Mail'] . " </td>
		 <td> CV </td>
		 <td> " . $data['Tarif'] . "</td>		 
	 </tr>

	";

	}

	///ajouter un coatch 

	echo"

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

	echo"
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

if ($who == 2){ //COACH

$sql = "SELECT * FROM coach WHERE Mail = '$login' AND Mot_de_passe ='$pass'";
$result = mysqli_query($db_handle, $sql);

//bouton message

	echo"
<button><a href='message.php'> MESSAGE</a> </button>
";


if( $data = mysqli_fetch_assoc($result)){

echo" BIENVENUE ". $data["Nom"] ." ! <br>

	<br> 
	<h1> VOS INFOS </h1>

<table>
	<tr> <td> Specialité </td>
	<td>". $data["Specialite"] ."</td>
	 </tr>

	 <tr> <td> PHOTO </td>
	<td>". $data["Photo"] ."</td>
	 </tr>

	 <tr> <td> Adresse </td>
	<td>". $data["Adresse"] ."</td>
	 </tr>

	 <tr> <td> Mail </td>
	<td>". $data["Mail"] ."</td>
	 </tr>

	 <tr> <td> Tarif </td>
	<td>". $data["Tarif"] ."</td>
	 </tr>


</table>

";
	}







}

if( $who == 3){ //Client

$sql = "SELECT * FROM client WHERE Carte = '$login' AND Mot_de_passe ='$pass'";
$result = mysqli_query($db_handle, $sql);

//bouton message

	echo"
<button><a href='message.php'> MESSAGE</a> </button>
";

if( $data = mysqli_fetch_assoc($result)){
	//if(($data['Carte'] == $id) && ($data["Mot de pasee"] == $pass)) ////A revoirr


	echo" BIENVENUE ". $data["Nom"] ." ".$data["Prenom"]." ! <br>

<br> 
<h1> VOS INFOS </h1>

<table>
<tr> <td> Adresse </td>
<td>". $data["Adresse"] ."</td>
 </tr>

 <tr> <td> Numero de carte étudiante </td>
<td>". $data["Carte"] ."</td>
 </tr>


 <tr> <td> Carte </td>
<td>". $data["Carte"] ."</td>
 </tr>
 ";

}

echo"

</table>
<br>

<h1> VOS RDV </h1>

<table>

<tr> <th> SPE</th> <th> COACH </th> <th> HEURES </th> <th> LIEU </th> </tr>";

$sql = "SELECT * FROM rdv WHERE Carte = '{$data['Carte']}'";
$result = mysqli_query($db_handle, $sql);
if( $data = mysqli_fetch_assoc($result)){

	echo"
<tr> 
<td> SPE DU COACH </td>
<td>". $data["coach"]."</td>
<td>". $data["Heures"]."</td>
<td>". $data["Lieu"]."</td>
</tr>


";

}

"
</table>
";

}

//Message
if ($who == 0) {
echo "Connexion refusée. Utilisateur inconnu.
<br>
Etes-vous sûr d'avoir déjà un compte ? <br> <br>
<button TYPE='button'>
<a href='toutparcourir.html'><INPUT TYPE = 'button' Name = 'essaie' VALUE = 'Réessayer'> </a>
</button> 
<a href='creation.html'><INPUT TYPE = 'button' Name = 'Pas de compte' VALUE = 'Pas de compte ?'> </a>
</button> 

";


} 


else {
if ($connexion) {
	session_start();

	$_SESSION['me'] = $who;
	$_SESSION['login'] = $login; //numero client ou mail


echo "<p> Vous vous êtes connecté </p>
<button> <a href='deconnect.php'> Deconnexion  </a> </button>
<button> <a href='connexion.php'> Connexion  </a> </button>";


} else {
echo "Connexion refusée. Mot de passe invalide.";
}
}

$_SESSION['connexion'] = $connexion;

?>


