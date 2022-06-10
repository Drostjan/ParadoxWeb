<?php
session_start();
require_once 'db.inc.php';

if(isset($_POST["submit"])){
    $aux_err=FALSE;
    $nombre = $_POST["nombre"];
    $telefono = $_POST["telefono"];
    $direccion = $_POST["direccion"];
    $_SESSION['detalle_pedido']['estado'] = "en proceso";
    if(isset($_SESSION['cesta'])){
        
        if(empty($nombre) || empty($telefono) || empty($direccion)){
            $aux_err=TRUE;
        }

        if(!preg_match('/^[a-zA-ZÀ-ÿ]{1,20}\s?[a-zA-ZÀ-ÿ]{1,20}$/',$nombre)){
	    	$aux_err=TRUE; 
	    }

        if(!preg_match('/^\d{9,9}$/',$telefono)){
	    	$aux_err=TRUE;
	    }

        if(!preg_match('/^[a-zA-ZÀ-ÿ0-9-,\s]{1,100}$/',$direccion)){
	    	$aux_err=TRUE; 
	    }
    
        if($aux_err == FALSE){
                $productos = $_SESSION['detalle_pedido']['productos'];
                foreach($productos as $key => $value){ // recorre la variable de session de pedido
                    $st = $productos[$key]['stock'];
                    $qty = $productos[$key]['qty'];
                    if($st < $qty){// verifica que la cantidad del un producto del pedido no sea superior al stock de ese producto
                        header("location: ../pedido.php?error");
                    }else{
                        $st = $st - $qty;
                        $producto = $_SESSION['detalle_pedido']['productos'][$key]['ID'];
                        $con = $conexion->prepare("UPDATE productos SET stock=? WHERE nombre_producto=?");// actualiza el stock para asi tener un STOCK DINAMICO
                        $con->bind_param("ss",$st,$producto);
                        $con->execute();

                        $_SESSION['detalle_pedido']['cliente'] = $nombre;
                        $_SESSION['detalle_pedido']['telefono'] = $telefono;
                        $_SESSION['detalle_pedido']['direccion'] = $direccion;

                        $can = $conexion->prepare("INSERT INTO pedidos (usuario,telefono,direccion,estado,total) VALUES (?, ?, ?, ?, ?)");
                        $can->bind_param("sissi",$nombre,$telefono,$direccion, $_SESSION['detalle_pedido']['estado'],$_SESSION['detalle_pedido']['total']);
                        $can->execute();
                        header("location: ../pedido_realizado.php");    
                   }
                }
        }else {
            header("location: ../pedido.php?error");
        }
    }else{
        header("location: ../pedido.php?error");
    }
}
?>
