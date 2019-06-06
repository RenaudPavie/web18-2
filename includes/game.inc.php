<?php

if (isset($_SESSION['login']) && $_SESSION['login'] == 1) {
    $partie = new Game();
    $partie->cardsGenerator();


}

else {
    echo "Pas le droit";
}

