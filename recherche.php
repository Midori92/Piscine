<?php

// Vérifier si le formulaire de recherche a été soumis
if(isset($_POST['query'])) {
    // Récupérer la valeur de recherche de l'utilisateur
    $query = $_POST['query'];
    
    // Rediriger l'utilisateur en fonction de sa recherche
    switch ($query) {
        case 'Guy Dumais':
            header("Location: boxe.php");
            exit(); 
            break;
        case 'Jean Dupont':
            header("Location: tennis.php");
            exit();
            break;
        case 'Marie Dubois':
            header("Location: basket.php");
            exit();
            break;
        case 'Paul Martin':
            header("Location: foot.php");
            exit(); 
            break;
        case 'Clara Petit':
            header("Location: danse.php");
            exit();
            break;
        case 'Lucie Bertrand':
            header("Location: natation.php");
            exit();
            break;
        case 'Boxe':
            header("Location: boxe.php");
            exit(); 
            break;
        case 'boxe':
            header("Location: boxe.php");
            exit(); 
            break;
        case 'Tennis':
            header("Location: tennis.php");
            exit();
            break;
        case 'tennis':
            header("Location: tennis.php");
            exit();
            break;
        case 'Basket':
            header("Location: basket.php");
            exit();
            break;
        case 'Basketball':
            header("Location: basket.php");
            exit();
            break;
        case 'basket':
            header("Location: basket.php");
            exit();
            break;
        case 'basketball':
            header("Location: basket.php");
            exit();
            break;
        case 'Foot':
            header("Location: foot.php");
            exit(); 
            break;
        case 'Football':
            header("Location: foot.php");
            exit(); 
            break;
        case 'foot':
            header("Location: foot.php");
            exit(); 
            break;
        case 'football':
            header("Location: foot.php");
            exit(); 
            break;
        case 'Danse':
            header("Location: danse.php");
            exit();
            break;
        case 'danse':
            header("Location: danse.php");
            exit();
            break;
        case 'Natation':
            header("Location: natation.php");
            exit();
            break;
        case 'natation':
            header("Location: natation.php");
            exit();
            break;
        case 'sport en compétition':
            header("Location: sportcompet.php");
            exit(); 
            break;
        case 'activités sportives':
            header("Location: activites.html");
            exit();
            break;
        case 'Activités sportives':
            header("Location: activites.html");
            exit();
            break;
        case 'salle de sport':
            header("Location: sallesport.html");
            exit();
            break;
        case 'salle de sport omnes':
            header("Location: sallesport.html");
            exit();
            break;
        case 'Musculation':
            header("Location: muscu.php");
            exit(); 
            break;
        case 'Fitness':
            header("Location: fitness.php");
            exit();
            break;
        case 'Cardio':
            header("Location: cardio.php");
            exit();
            break;
        case 'Biking':
            header("Location: biking.php");
            exit();
            break;
        case 'Cours collectifs':
            header("Location: coursco.php");
            exit();
            break;
        case 'musculation':
            header("Location: muscu.php");
            exit(); 
            break;
        case 'fitness':
            header("Location: fitness.php");
            exit();
            break;
        case 'cardio':
            header("Location: cardio.php");
            exit();
            break;
        case 'cours collectifs':
            header("Location: coursco.php");
            exit();
            break;
        default:
            // Rediriger vers une page d'erreur ou afficher un message
           header("Location: recherche.html");
            exit();
            break;

    }
} else {
    // Si le formulaire n'a pas été soumis, rediriger vers une page d'accueil par exemple
    header("Location: recherche.html");
            exit();
            
}

?>
