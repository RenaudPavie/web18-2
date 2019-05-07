<?php

// Récupération des fichiers avec double extension du répertoire /includes
$content = glob('./includes/*.inc.php');

// Récupération du paramètre d'URL 'page' (superglobale $_GET)
$page = isset($_GET['page']) ? $_GET['page'] : "";

// Concaténation de la valeur récupérée pour avoir le bon chemin
$page = './includes/' . $page . '.inc.php';

// On vérifie si la chaîne précédente est présente dans le tableau renvoyé par glob()
$page = in_array($page, $content) ? $page : './includes/home.inc.php';

// Inclusion de la page
require $page;