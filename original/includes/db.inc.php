<?php

/*Informacion de la conexion */
    $severName = "localhost";
    $severUser = "root";
    $severPass = "";
    $severDb = "paradox";

/*Establecer la conexion*/
    $conexion = mysqli_connect($severName,$severUser,$severPass,$severDb);
    $conexion->set_charset('utf8');
    
    if(!$conexion){
        die("Conection refused ".mysqli_connect_error());
    }
?>