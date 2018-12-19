<?php
session_start();
session_destroy();
setcookie("rememberme", "", time()-3600, '/');
include("index.php")
?>

