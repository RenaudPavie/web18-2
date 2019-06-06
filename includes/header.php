<?php
if (isset($_SESSION['login']) && $_SESSION['login'] == 1)
    $logValue = "logout";
else
    $logValue = "login";
?>
<header>
    <nav>
        <ul>
            <li><a href="index.php?page=home" title="Page d'accueil">Accueil</a></li>
            <li><a href="index.php?page=news" title="Actualités">Actualités</a></li>
            <li><a href="index.php?page=<?=$logValue?>" title="<?=ucfirst($logValue)?>"><?=ucfirst($logValue)?></a></li>
            <li><a href="index.php?page=registration" title="Inscription">Inscription</a></li>
            <?php
                // Pour afficher le lien vers la page 'Game', on vérifie que l'utilisateir est connecté
                if (isset($_SESSION['login']) && $_SESSION['login'] == 1)
                     echo "<li><a href=\"index.php?page=game\" title=\"Game\">Game</a></li>";
            ?>
        </ul>
    </nav>
</header>
