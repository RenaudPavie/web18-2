<?php
session_start();

date_default_timezone_set('Europe/Paris');
require_once './functions/classAutoLoader.php';
spl_autoload_register('classAutoLoader');

require_once './includes/pdo.php';
require_once './functions/getLang.php';
require_once './functions/secureForm.php';
require_once './includes/head.php';
require_once './includes/header.php';
require_once './includes/content.php';
require_once './includes/footer.php';
