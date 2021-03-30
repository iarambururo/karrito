<?php
session_start();
unset($_SESSION['erabiltzailea']);
session_destroy();
header('location:index.php');

?>