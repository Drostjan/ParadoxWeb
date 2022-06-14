<?php 
    session_start();
    include 'cesta.inc.php';
    $cesta = new Cart;
    require_once 'db.inc.php';
    $user = $_SESSION['userID'];

    if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
        if($_REQUEST['action'] == 'add' && !empty($_REQUEST['id'])){
            $productID = $_REQUEST['id'];
            $query =  $conexion->prepare("SELECT id_producto,nombre_producto,precio FROM productos WHERE id_producto = ? ");
            $query->bind_param("s", $productID);
            $query->execute();
            $query->bind_result($id_producto,$producto,$precio);
            while ($query->fetch()) {
            $itemData = array(
                'id' => $id_producto,
                'nombre' => $producto,
                'precio' => $precio,
                'qty' => 1
            );
            }
            print_r($itemData);
            $insertItem = $cesta->insert($itemData);
            $redirectLoc = $insertItem?$_SERVER['HTTP_REFERER']:'../home.php';
            header("Location: ".$redirectLoc);
        }elseif($_REQUEST['action'] == 'update' && !empty($_REQUEST['id'])){
            $itemData = array(
                'rowid' => $_REQUEST['id'],
                'qty' => $_REQUEST['qty']
            );
            $updateItem = $cesta->update($itemData);
            echo $updateItem?'ok':'err';die;
        }elseif($_REQUEST['action'] == 'remove' && !empty($_REQUEST['id'])){
            $deleteItem = $cesta->remove($_REQUEST['id']);
            header("Location: ../cesta.php");
        }elseif($_REQUEST['action'] == 'order'){
            $cestaItems = $cesta->contents();
            foreach($cestaItems as $item){
                $obtener = $conexion->prepare("SELECT stock FROM productos WHERE id_producto=?");
                $obtener->bind_param("i",$item['id']);
                $obtener->execute();
                $resultado = $obtener->get_result();
                $fila = $resultado->fetch_assoc();
                
                if($fila['stock'] < $item['qty']){
                    echo "<script>
                        window.location= '../pedido.php'
                        alert('Cantidad no disponible');
                    </script>";
                }else{
                    $create = date("Y-m-d H:i:s");
                    $insertOrder = $conexion->prepare("INSERT INTO pedidos (cliente_id, precio_total, creacion, modificacion) VALUES (?,?,?,?)");
                    $insertOrder->bind_param("ssss", $user , $cesta->total() ,$create,date("Y-m-d H:i:s"));
                    $insertOrder->execute();
                    
                    if($insertOrder){
                        $orderID = $conexion->insert_id;
                        $insertOrderItems = $conexion->prepare("INSERT INTO detalle_pedido (id_pedido, id_producto, qty) VALUES (?,?,?);");
                        $insertOrderItems->bind_param("iii",$orderID,$item['id'],$item['qty']);
                        $insertOrderItems->execute();
                        if($insertOrderItems){
                            $item['qty'] = $fila['stock'] - $item['qty'];
                            $minus = $conexion->prepare("UPDATE productos SET stock= ? WHERE id_producto=?");
                            $minus->bind_param("ii",$item['qty'],$item['id']);
                            $minus->execute();

                            $cesta->destroy();
                            header("Location: ../pedido_realizado.php?id=".$_SESSION['userID'] );
                        }else{
                            echo "<script>
                                window.location= '../pedido.php'
			        	        alert('Error insertando pedido');
    	                    </script>";
                        }
                    }else{
                        echo "<script>
                                window.location= '../pedido.php'
                                alert('Error realizando pedido');
                            </script>";
                    }
                }
            }
            
        }else{
            echo "<script>
                        window.location= '../pedido.php'
				        alert('Accion incorrecta');
    	            </script>";
        }
    }else{
        echo "<script>
            window.location= '../cesta.php'
            alert('Accion nula');
        </script>";
    }
?>