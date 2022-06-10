<!DOCTYPE html>
<html>

<head>
    <title>Paradox - Cesta </title>
    <?php
        session_start();
        if ( $_SESSION['session']  != 1) {
            include_once 'seccion-menu.php';
            include_once 'not_logged.php';
        }else{
            include_once 'seccion-menu2.php';
        
?>
    <div class="main-2">
        <div class="paradox_separator2">
            <a>Cesta</a>
        </div>
        <div class="caja_cesta_fav">
            <ul>
            <li>
                <?php

                    if(!isset($_SESSION['cesta'])){
                        ?>
                    <h3>En este momento su cesta esta vacía</h3>
                    <?php
                    }else{
                    $cesta=$_SESSION['cesta'];
                    $_SESSION['cesta']=$cesta;
		        	if(isset($_SESSION['cesta'])){
		        	    $total=0;
                        foreach ($cesta as $key => $value) {
		        		    if($cesta[$key]!=NULL ){   
                               $_SESSION['qty'] = $cesta[$key]['qty'];
                ?>
                <div class="elproducto_img_pedido">
                    <?php echo "<img src='".$_SESSION['cesta'][$key]['imagen']."' >" ?>
                </div>
                <p class="item-title">
                    Producto: 
                            <?php echo $cesta[$key]['name']."  "; ?>
                </p>
                <p class="item-qty">
                        Cantidad: 
                            <?php echo $cesta[$key]['qty']."  "; ?>
                </p>
                <p class="item-sub">
                        Subtotal:  
                            <?php echo $cesta[$key]['precio']."  "; ?>
                </p>
                <a href="includes/borrarCestaP.inc.php?id=<?php echo $key; ?>"><button type="button">Eliminar</button></a>
            </li>
            <?php
                        }
                    }
                }else{
                    echo "Empty list";
                }
            }
            ?>
            <?php
                $total=0;
		        if(isset($_SESSION['cesta'])){
		            foreach ($cesta as $key => $value) {
		                if($cesta[$key]!=NULL){ 
		                    $total=$total + ($cesta[$key]['precio'] * $cesta[$key]['qty']);
		                }else{
                            
                        }
                    }
                }
                ?>
                <h3>Total:
                    <?php
                echo $total."€";
                ?> </h3> <?php
                $_SESSION['total'] = $total;
            ?>
                <div class="buttonsCestaFav">
                    <a href="pedido.php"><button type="button">Crear Pedido</button></a>
                    <a href="includes/borrarCesta.inc.php"><button type="button">Vaciar cesta</button></a>
                </div>
            </ul>
        </div>

    </div>
    <?php
        }
    include_once 'seccion-footer.php';
?>
