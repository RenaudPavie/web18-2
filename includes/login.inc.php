<?php

if (isset($_POST['login'])) {
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $mdp = isset($_POST['mdp']) ? $_POST['mdp'] : "";

    $erreur = array();

    if ($email == "") array_push($erreur, "Veuillez saisir un mail");
    if ($mdp == "") array_push($erreur, "Veuillez saisir un mot de passe");

    if (count($erreur) > 0) {
        $msgErreur = "<ul>";

        for ($i = 0; $i < count($erreur); $i++) {
            $msgErreur .= "<li>" . $erreur[$i] . "</li>";
        }

        $msgErreur .= "</ul>";

        echo $msgErreur;

        require_once 'frmLogin.php';
    } else {
        $sql = "SELECT * FROM t_users WHERE usemail='$email'";

        $result = $pdo->query($sql)->fetchAll();

        if (count($result) == 0) {
            echo "<p>You're not in the database, Michel</p>";
        } else {
            $hashDatabase = $pdo->query($sql)->fetchObject()->usepwd;
            if (password_verify($mdp, $hashDatabase))
                echo "Welcome Michel";

            else
                echo "Nan";

            echo "Michel is here";

        }
    }
} else {
    require_once "frmLogin.php";
}
