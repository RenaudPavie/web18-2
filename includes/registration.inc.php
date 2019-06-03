<?php

if (isset($_POST['validation'])) {
    // Récupération des éléments du formulaire
    $nom = isset($_POST['nom']) ? $_POST['nom'] : "";
    $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : "";
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $mdp = isset($_POST['mdp']) ? $_POST['mdp'] : "";

    // Initialisation d'un tableau vide
    $erreur = array();

    // Vérification des champs (remplis ou non)
    if ($nom == "") array_push($erreur, "Veuillez saisir un nom");
    if ($prenom == "") array_push($erreur, "Veuillez saisir un prénom");
    if ($email == "") array_push($erreur, "Veuillez saisir un mail");
    if ($mdp == "") array_push($erreur, "Veuillez saisir un mot de passe");

    // L'on s'assure que le tableau n'est point vide
    if (count($erreur) > 0) {
        $msgErreur = "<ul>";

        for ($i = 0 ; $i < count($erreur) ; $i++) {
            $msgErreur .= "<li>" . $erreur[$i] . "</li>";
        }

        $msgErreur .= "</ul>";

        echo $msgErreur;

        require_once 'frmRegistration.php';
    }

    else {
        // Préparation de la requête SQL pour compter le nombre d'occurence avec l'adresse mail
        $checkMail = "SELECT COUNT(*) FROM t_users WHERE  USEMAIL='" . $email . "'";
        // Exécution de la requête
        $nombreOccurences = $pdo->query($checkMail)->fetchColumn();

        if ($nombreOccurences == 0 ) {
            $mdp = password_hash($mdp, PASSWORD_DEFAULT);
        }

        else {
            echo "Michel, tu es dans la base";
        }

    }
}

else {
    require_once 'frmRegistration.php';
}
