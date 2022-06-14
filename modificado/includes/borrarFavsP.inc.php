<?php 
    session_start(); 
    /* $_GET['id'] = lo que se pasa por parametro en get */
     if(!isset($_SESSION['favs'])){
         echo "error";
    }else{
    $favs=$_SESSION['favs'];
    unset($favs[$_GET['id']]);// Se destruye un especifico index de la variable
    $_SESSION['favs']=$favs;// Se guarda la cesta modificada
    header("Location: ".$_SERVER['HTTP_REFERER']."");
    echo "Empty list";
    }

?>