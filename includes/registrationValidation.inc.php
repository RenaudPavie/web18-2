<?php

$mail = isset($_GET['mail']) ? $_GET['mail'] : "";
$token = isset($_GET['token']) ? $_GET['token'] : "";

echo "<p>Mail : $mail</p>";
echo "<p>Token : $token</p>";
