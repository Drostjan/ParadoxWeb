<?php 
    session_start(); 
    /* $_GET['id'] = lo que se pasa por parametro en get */
    if(!isset($_SESSION['cesta'])){
         echo "error";
    }else{
        $cesta=$_SESSION['cesta'];
        unset($cesta[$_GET['id']]);// Se destruye un especifico index de la variable
        $_SESSION['cesta']=$cesta;// Se guarda la cesta modificada
        header("Location: ".$_SERVER['HTTP_REFERER']."");
        echo "Empty list";
    }

?>