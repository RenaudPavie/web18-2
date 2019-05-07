<?php

function getLang() : string
{
    // Récupération de la langue du navigateur
    $locale = locale_accept_from_http($_SERVER['HTTP_ACCEPT_LANGUAGE']);
    // Si la langue n'est pas défini, on définit le français par défaut
    if ($locale == "")
        $locale = 'fr-FR';
    // Récupération des deux premiers caractères la chaîne    
    $locale = substr($locale, 0, 2);
    // Renvoie de la fonction
    return $locale; 
}
