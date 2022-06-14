<?php
    session_start();
    /* Se elimina el contenido de la session */
    $_SESSION['session'] = FALSE;
    $_SESSION['user'] = "";
    $_SESSION['email'] = "";
    $_SESSION['telefono'] = "";
    
    /* Se cierra la session */
    session_abort();
    header("location: ../index.php");

?>