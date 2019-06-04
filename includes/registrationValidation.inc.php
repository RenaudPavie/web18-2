<?php

$mail = isset($_GET['mail']) ? $_GET['mail'] : "";
$token = isset($_GET['token']) ? $_GET['token'] : "";

$sql = "SELECT * FROM t_users
        WHERE usemail='$mail'
        AND usetoken='$token'";

$result = $pdo->query($sql);

if ($result->rowCount() == 0) {
    echo "Dis donc Michel, tu fais quoi avec l'URL ?";
}


else {
    $truc = $result->fetchObject();
    var_dump(strtotime($truc->usedatetime));
    echo strtotime('now');

    $timeRegistration = strtotime($truc->usedatetime);
    $timeNow = strtotime('now');

    $delta = $timeNow - $timeRegistration;

    if ($delta <= 3600) {
        echo "Yes";
    }

    else {
        echo "Trop tard Michel";
    }
}

