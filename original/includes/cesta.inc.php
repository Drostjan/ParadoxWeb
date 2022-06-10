<?php
require_once 'db.inc.php'; 
session_start(); 
if(isset($_POST["submit"])){// verifica que se haya enviado el formulario
	$aux_err=FALSE;
    $id= $_POST["id"]; // obtiene el elemento id del formulario
    $qty = $_POST["q"];// obtiene el elemento q del formulario

    if(!isset($qty)){// verifica que este el elemento q
        $aux_err=TRUE;
    }
	
	if(!preg_match('/^[1-9]{1,1}$/',$qty)){// verifica que este escrito correctamente el elemento q
		$aux_err=TRUE; 
	}

    if($aux_err == FALSE){
        $nombre = $_SESSION['producto'];
        $precio = $_SESSION['precio'];
        $imagen = $_SESSION['imagen'];    
        if(!empty($_POST)){
            if(isset($_POST["id"]) && isset($_POST["q"])){
                if(empty($_SESSION['cesta'])){ //si esta vacia se rellena inicialmente
                    $_SESSION['cesta']=array( array(
                        'ID' => $_POST['id'],
                        "name"=>$nombre,
                        "precio"=>$precio,
                        "imagen"=>$imagen,
                        "qty"=>$_POST["q"],
                        "stock" => $_SESSION['stock']
                        )
                    );
                }else{
                    $carro=$_SESSION['cesta'];
                    $repeated = false;
                    foreach ($carro as $c) { // se verifica si el producto existe o no
                        if($c["name"]==$nombre){
                            $repeated=true;
                            break;
                        }
                    }

                    if($repeated){
                        header("Location: ".$_SERVER['HTTP_REFERER']."");
                    }else{
                        // si el producto no esta repetido entonces lo agregamos a la variable cart y despues asignamos la variable cart a la variable de sesion
                        array_push($carro, array(
                            'ID' => $_POST['id'],
                            "name"=>$nombre,
                            "precio"=>$precio,
                            "imagen"=>$imagen,
                            "qty"=>$_POST["q"],
                            "stock" => $_SESSION['stock']
                            ));
                        $_SESSION["cesta"] = $carro;
                    }
                }
            }
        }
            header("Location: ".$_SERVER['HTTP_REFERER']."");
        }else{
            header("location: ../cesta.php?error");
        }
    }

?>
