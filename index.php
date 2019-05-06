<?php

$resultat = '<ul>';
for ($i = 1 ; $i <= 100 ; $i++) {
    $resultat .= '<li>' . $i . '</li>';
}

$resultat .= '</ul>';

echo $resultat;