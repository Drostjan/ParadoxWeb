<?php 
session_start();
 
header("Location: ".$_SERVER['HTTP_REFERER']."");
unset($_SESSION['cesta']);// Se destruye la variable de session
?>