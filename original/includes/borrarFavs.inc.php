<?php 
session_start(); 

header("Location: ".$_SERVER['HTTP_REFERER']."");
unset($_SESSION['favs']);// Se destruye la variable de session
?>