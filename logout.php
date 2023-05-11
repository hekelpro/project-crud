<?php
session_start();
session_destroy();
$_SESSION["level"] = false;
$_SESSION["iduser"] = false;
header("Location: index.php");
die();
?>