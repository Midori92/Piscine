<?php

// Vérifier si le formulaire de recherche a été soumis
if(isset($_POST['query'])) {
    // Récupérer la valeur de recherche de l'utilisateur
    $query = $_POST['query'];
    
    // Rediriger l'utilisateur en fonction de sa recherche
    switch ($query) {
        case 'Guy Dumais':
            header("Location: boxe.html");
            exit(); // Assurez-vous de terminer le script après la redirection
            break;
        case 'Jean Dupont':
            header("Location: tennis.html");
            exit();
            break;
        case 'Marie Dubois':
            header("Location: basket.html");
            exit();
            break;
        case 'Paul Martin':
            header("Location: foot.html");
            exit(); // Assurez-vous de terminer le script après la redirection
            break;
        case 'Clara Petit':
            header("Location: danse.html");
            exit();
            break;
        case 'Lucie Bertrand':
            header("Location: natation.html");
            exit();
            break;
        case 'boxe':
            header("Location: boxe.html");
            exit(); // Assurez-vous de terminer le script après la redirection
            break;
        case 'Tennis':
            header("Location: tennis.html");
            exit();
            break;
        case 'Basket':
            header("Location: basket.html");
            exit();
            break;
        case 'Basketball':
            header("Location: basket.html");
            exit();
            break;
        case 'Foot':
            header("Location: foot.html");
            exit(); // Assurez-vous de terminer le script après la redirection
            break;
        case 'Football':
            header("Location: foot.html");
            exit(); // Assurez-vous de terminer le script après la redirection
            break;
        case 'Danse':
            header("Location: danse.html");
            exit();
            break;
        case 'Natation':
            header("Location: natation.html");
            exit();
            break;
        case 'sport en compétition':
            header("Location: sportcompet.html");
            exit(); // Assurez-vous de terminer le script après la redirection
            break;
        case 'activités sportives':
            header("Location: activites.html");
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
