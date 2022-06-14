<?php
require_once 'db.inc.php';

if(isset($_POST["submit"])){
	$aux_err=FALSE;
	$nombre = $_POST["nombre"];
	$apellidos = $_POST["apellidos"];
	$email = $_POST["email"];
	$psw = hash("sha256",$_POST["psw"]);
	$psw2 = hash("sha256",$_POST["psw2"]);
	$telefono = $_POST["telefono"];
	$pais = $_POST["pais"];
	require_once 'db.inc.php';

	if(empty($nombre) || empty($apellidos) || empty($email) || empty($psw) || empty($psw2) || empty($telefono)){
        $aux_err=TRUE;
    }
	
	if(!preg_match('/^[a-zA-ZÀ-ÿ]{1,20}\s?[a-zA-ZÀ-ÿ]{1,20}$/',$nombre)){
		$aux_err=TRUE; 
	}

	if(!preg_match('/^[a-zA-ZÀ-ÿ]{1,20}\s?[a-zA-ZÀ-ÿ]{1,20}$/',$apellidos)){
		$aux_err=TRUE; 
	}

	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$aux_err=TRUE;
	}
	
	if(!preg_match('/^.{8,25}$/',$_POST["psw"])){
		$aux_err=TRUE;
	}

	if($psw !== $psw2){
		$aux_err=TRUE;
	}

	if(!preg_match('/^\d{9,9}$/',$telefono)){
		$aux_err=TRUE;
	}
	//Comprobar si el correo existe en la base de datos
	$existe_el_correo = $conexion->prepare("SELECT correo from clientes WHERE correo = ?");
	$existe_el_correo->bind_param("s", $email);
	$existe_el_correo->execute();
	$resultado = $existe_el_correo->get_result();
	$contador = mysqli_num_rows($resultado);
	if($contador == 1) {
		$aux_err=TRUE;
	}



	if($aux_err == FALSE){
		$stmt = $conexion->prepare("INSERT INTO clientes (nombre, apellidos, correo, contra, telefono, pais) VALUES (?, ?, ?, ?, ?, ?)");// Se inserta el nuevo usuario con sus datos
		$stmt->bind_param("ssssss", $nombre, $apellidos, $email ,$psw, $telefono, $pais);
		$stmt->execute();
		session_start();
		header("location: ../home.php");
		$_SESSION['session'] = TRUE;
		$_SESSION['user'] = $nombre." ".$apellidos;
		$_SESSION['email'] = $email;
		$_SESSION['telefono'] = $telefono;
		$cesta=$_SESSION['cesta'];
            $_SESSION['cesta']=$cesta;
			$favs=$_SESSION['favs'];
            $_SESSION['favs']=$favs;
	}else {
		header("location: ../register.php?error");
	}
}

?>