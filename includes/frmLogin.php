<?php
$nom = isset($nom) ? $nom : "";
$pwd = isset($pwd) ? $pwd : "";
?>
<form method="post" action="index.php?page=login">
    <div>
        <label for="email">e-mail&nbsp;: </label>
        <input name="email" type="mail" value="<?=$email?>"/>
    </div>
    <div>
        <label for="mdp">Mot de passe&nbsp;: </label>
        <input name="mdp" type="password" />
    </div>
    <div>
        <input type="reset" value="Effacer" />
        <input type="submit" value="Valider" />
    </div>
    <input type="hidden" name="login" />
</form>
