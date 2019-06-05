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
            $result = $pdo->query($sql)->fetchObject();
            $hashDatabase = $result->usepwd;
            if (password_verify($mdp, $hashDatabase)) {
                $_SESSION['login'] = 1;
                $_SESSION['prenom'] = $result->useprenom;
                $_SESSION['nom'] = $result->usenom;
                var_dump($_SESSION);
                die();
                echo "<script>document.location.href='http://localhost/web18-1/index.php'</script>";
            }

            else
                echo "Nan";
        }
    }
} else {
    require_once "frmLogin.php";
}
