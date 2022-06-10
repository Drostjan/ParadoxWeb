<?php
require_once 'db.inc.php';

if(isset($_POST["login"])){
	$aux=FALSE;
	$username = $_POST["email"];
	$psw = hash("sha256",$_POST["psw"]);

	$existen_credenciales = $conexion->prepare("SELECT correo,contra from clientes WHERE correo=? and contra=?");// Se verifica si el usuario existe , y si la contraseña es correcta
	$existen_credenciales->bind_param("ss", $username, $psw);
	$existen_credenciales->execute();
	$resultado = $existen_credenciales->get_result();
	$contador = mysqli_num_rows($resultado);
	if($contador == 1) {
		$aux=TRUE;
	}

	if($aux == TRUE){
		session_start();

		/* INICIALIZA variables de session */
		$_SESSION['session'] = TRUE;
		$_SESSION['email'] = $username;
		$_SESSION['user'] = $nombre." ".$apellidos;
		$cesta=$_SESSION['cesta'];
        $_SESSION['cesta']=$cesta;
		$favs=$_SESSION['favs'];
        $_SESSION['favs']=$favs;
		$_SESSION['f'] == false;
		header("location: ../home.php");
	}else{
		header("location: ../register.php?error");
	}

}
?>