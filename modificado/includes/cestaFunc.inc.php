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
            $create = date("Y-m-d H:i:s");
            $insertOrder = $conexion->prepare("INSERT INTO pedidos (cliente_id, precio_total, creacion, modificacion) VALUES (?,?,?,?)");
            $insertOrder->bind_param("ssss", $user , $cesta->total() ,$create,date("Y-m-d H:i:s"));
            $insertOrder->execute();
            $cestaItems = $cesta->contents();
            if($insertOrder){
                $orderID = $conexion->insert_id;
                
                foreach($cestaItems as $item){
                    $insertOrderItems = $conexion->prepare("INSERT INTO detalle_pedido (id_pedido, id_producto, qty) VALUES (?,?,?);");
                    $insertOrderItems->bind_param("iii",$orderID,$item['id'],$item['qty']);
                    $insertOrderItems->execute();

                    
                    
                }

                if($insertOrderItems){
                    $cesta->destroy();
                    header("Location: ../pedido_realizado.php?id=".$_SESSION['userID'] );
                }else{
                    header("Location: ../pedido.php");
                }
            }else{
                header("Location: ../pedido.php");
            }
        }else{
            header("Location: ../home.php");
        }
    }else{
        header("Location: ../home.php");
    }
?>