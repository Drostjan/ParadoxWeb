<?php
require_once 'db.inc.php';

if(isset($_POST["submit"])){
	$aux_err=FALSE;
	$nombre = $_POST["nombre"];
	$descripcion = $_POST["descripcion"];
	$precio = $_POST["precio"];
	$talla = $_POST["talla"];
	$stock = $_POST["stock"];
	$imagen = $_FILES["archivo"];
	$archivo = $_FILES['archivo']['name'];
	$categoria = $_POST["categoria"];

	if(empty($nombre) || empty($descripcion) || empty($precio) || empty($stock) || empty($archivo)){
        $aux_err=TRUE;
    }
	
	if(!preg_match('/^[a-zA-ZÀ-ÿ0-9\s]{1,30}$/',$nombre)){
		$aux_err=TRUE; 
	}

	if(!preg_match('/^[a-zA-ZÀ-ÿ,.\s]{1,200}$/',$descripcion)){
		$aux_err=TRUE; 
	}

	if(!preg_match('/^[1-9]{1,3},?[0-9]{1,2}$/',$precio)){
		$aux_err=TRUE; 
	}

	if(!preg_match('/^[0-9]{1,2}$/',$stock)){
		$aux_err=TRUE; 
	}
	
	//Validar imagen producto
	//Si el archivo contiene algo y es diferente de vacio
	if (isset($archivo) && $archivo != "") {
	$tipo = $_FILES['archivo']['type'];
	$tamano = $_FILES['archivo']['size'];
	$temp = $_FILES['archivo']['tmp_name'];
	if ((strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano <= 2097152)) {
		if (move_uploaded_file($temp, '../assets/images/'.$archivo)) {
			$imagen='assets/images/'.$archivo;
		}else{
				$aux_err=TRUE;
		}
	}else{
		$aux_err=TRUE; 
	}
}

	if($aux_err == FALSE){
		$con = $conexion->prepare("INSERT INTO productos (nombre_producto, descripcion, precio, talla, stock, imagen, categoria) VALUES (?, ?, ?, ?, ?, ?, ?)");
		$con->bind_param("sssssss",$nombre ,$descripcion ,$precio ,$talla ,$stock ,$imagen ,$categoria);
		$con->execute();
		header("location: ../formulario_producto.php");
	}else {
		header("location: ../formulario_producto.php?error");
	}
}

?>