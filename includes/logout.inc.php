<?php
$_SESSION['login'] = 0;
session_destroy();
echo "<script>document.location.href='http://localhost/web18-1/index.php'</script>";
