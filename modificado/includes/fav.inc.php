<?php
session_start();
if(isset($_SESSION['favs'])){// se verifica si existe la session favs
    $favs=$_SESSION['favs'];
    if(isset($_GET['id'])){
        $favs[$_GET['id']]=array(// se rellena favs en el indice pasado por GET
            'ID' => $_GET['id'],
             "name"=>$_SESSION['producto'],
             "precio"=>$_SESSION['precio'],
             "imagen"=>$_SESSION['imagen'],
             "qty"=>1
            );
     }
}else{ //si esta vacio se rellena inicialmente
    $name=$_POST['name'];
    $precio=$_POST['precio'];
    $qty=$_POST['qty'];
    $favs[$_GET['id']]=array(
        'ID' => $_GET['id'],
        "name"=>$_SESSION['producto'],
        "precio"=>$_SESSION['precio'],
        "imagen"=>$_SESSION['imagen'],
        "qty"=>1
       );	
}

$_SESSION['favs']=$favs;// se actualiza la session favs
header("Location: ".$_SERVER['HTTP_REFERER']."");
?>