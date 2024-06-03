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
    height: 650px;
    width: 650px;
}
main {
     height: 730px;
     text-align: left;
        }

.availability-table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
}

.availability-table th,
.availability-table td {
    border: 1px solid black;
    padding: 10px;
    text-align: center;
}

.available {
    background-color: grey; 
}

.button-group {
    display: flex;
    justify-content: left;
    gap: 30px;
    margin-top: 10px;
    flex-wrap: wrap;
    
}

.btn-rdv,
.btn-comm,
.btn-cv {
    color: black;
    border: 2px solid black;
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 1em;
    cursor: pointer;
}

.btn-rdv {
    background-color: lightpink;
}

.btn-comm {
    background-color: skyblue;
}

.btn-cv {
    background-color: lightgreen;
}
</style>  
    
<div id="wrapper">
        <h1 class="titre"><img width="750" heigh="750" src="titre.png" alt="Sportify"></h1>
        <div id="nav">
        <div id="leftcolumn"> 

            <div id="nav">  
            <a href="index.php">
                   <img src="accueilbouton.png" width="150" heigh="115">
            </a>  
          
            <a href="toutparcourir.php">
               <img  src="parcourirbouton.png" width="150" heigh="115">
            </a>  
            
           <a href="recherche.html">
                <img  src="recherchebouton.png" width="150" heigh="150">
           </a>  
          
           <a href="rendezvous.php">
                <img  src="rendezvousbouton.png" width="150" heigh="150">
           </a>  
           <a href="compte.html">
                <img  src="votrecompte.png" width="150" heigh="150">
           </a> 
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
            <h2>Coach de Biking</h2>
            <div class="coach-details">
                <img src="nicolasdubreuil.jpeg" alt="Coach Biking" class="coach-photo" width="150" heigh="150">
                <p><strong>Nom:</strong> Nicolas Dubreuil</p>
                <p><strong>Bureau:</strong> Salle de Sport Omnes, 12 rue de l'université,75015 Paris</p>
                <p><strong>Disponibilité:</strong></p>
                 <table class="availability-table">
                <thead>
                <tr>
                    <th>Heure</th>
                    <th>Lundi</th>
                    <th>Mardi</th>
                    <th>Mercredi</th>
                    <th>Jeudi</th>
                    <th>Vendredi</th>
                    <th>Samedi</th>
                    <th>Dimanche</th>
                </tr>
                </thead>
                <tbody>

<?php
                $database = 'sportify';
                $db_handle = mysqli_connect('localhost', 'root', '', $database, 3307);
                if (!$db_handle) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $days = array("lundi","mardi","mercredi","jeudi","vendredi","samedi","dimanche");
                $heures = array("10h-11h", "11h-12h", "12h-13h","13h-14h","14h-15h","15h-16h","16h-17h","17h-18h","18h-19h","19h-20h","20h-21h","21h-22h");
                $nom='Nicolas Dubreuil';

                foreach ($heures as $hour) {
                    echo "<tr>";
                    echo "<td>$hour</td>";
                    foreach ($days as $day) {
                        $sql_edt = "SELECT * FROM dispo_coach WHERE Jour = '$day' AND Horaire = '$hour' AND Nom='$nom'";
                        $result_edt = mysqli_query($db_handle, $sql_edt);
                        if (mysqli_num_rows($result_edt) > 0) {
                              
                            echo "<td style='background-color: green;'>";
                            echo "<form method='post' action='RDVbiking2.php'>";
                            echo "<input type='hidden' name='hour' value='$hour'>";
                            echo "<input type='hidden' name='day' value='$day'>";
                            echo "<input type='submit' class='reserve-button' value='Réserver'>";
                            echo "</form>";
                            echo "</td>";
                        
                        
                        } else {
                            echo "

                     <td style='background-color: green'> 
                            Non Disponible
                     </td>";
                            
                        }
                    }
                    echo "</tr>";
                }
                mysqli_close($db_handle);
                ?>
            </tbody>
    </tr>
</table>
                <br>
                <div class="button-group">
                    <button class="btn-rdv"  id="book-appointment" onclick="window.location.href='RDVbiking.php'">Prendre Rendez-vous</button>
                    <button class="btn-comm" onclick="communicateWithCoach()">Communiquer avec le coach</button>
                    <button class="btn-cv" onclick="window.location.href='CVbiking.html'">Voir le CV </button>


</div>

<script>
function communicateWithCoach() {
    const choice = prompt("Souhaitez-vous (1) appeler le coach, (2) envoyer un email, ou (3) retourner? Entrez le numéro correspondant à votre choix:");
    if (choice === '1') {
        alert("Appeler le coach au numéro: (+33) 678654321");
    } else if (choice === '2') {
        window.location.href = "mailto:nicolas.dubreuil@sportify.com";
    } else if (choice === '3') {
        window.location.href = 'biking.html';
    } else {
        alert("Choix invalide. Veuillez réessayer.");
    }
}
function afficherXML() {
            var xmlContent = document.getElementById("xmlContent").innerText;
            var newWindow = window.open();
            newWindow.document.write("<pre>" + xmlContent + "</pre>");
        }
</script> 
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