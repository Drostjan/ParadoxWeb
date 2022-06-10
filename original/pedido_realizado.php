<!DOCTYPE html> 
<html>
    <head>
        <title>Paradox - Detalle de Pedido</title>
        <?php
            session_start();
            if ( $_SESSION['session']  != 1) {
                include_once 'seccion-menu.php';
                include_once 'not_logged.php';
            }else{
                include_once 'seccion-menu2.php';
               
            ?>
    <div class="main">
        <div class="paradox_separator2">
            <a>Pedido Realizado</a>
        </div>
        <div class="caja_cesta_fav">
            <ul>
                <?php
                    if(isset($_SESSION['detalle_pedido']) && !empty($_SESSION['detalle_pedido']['cliente'])){                            
                ?>
                <li>
                    <p class="item-title">
                        Cliente:
                        <?php echo $_SESSION['detalle_pedido']['cliente']; ?>
                    </p>
                    <p class="item-list">
                    Productos:
                        <ul>                            
                            <li>
                            <?php
                                  foreach($_SESSION['detalle_pedido']['productos'] as $key => $value) {
                                        if($_SESSION['detalle_pedido']['productos'][$key]!=NULL){ 
                                            
                            ?>          
                                <div class="elproducto_img_pedido">
                                    <?php echo "<img src='".$_SESSION['detalle_pedido']['productos'][$key]['imagen']."' >" ?>
                                </div>    
                                <p class="item-title">
                                    Producto:
                                    <?php echo $_SESSION['detalle_pedido']['productos'][$key]['name']; ?>
                                </p>
                               
                                <p class="item-title">
                                    Cantidad:
                                    <?php echo $_SESSION['detalle_pedido']['productos'][$key]['qty']; ?>
                                </p>
                                <?php }else{
                                        header("Location: ../cesta.php?error");
                                    }} ?>
                            </li>
                        </ul>
                    </p>
                    <p class="item-title">
                        Total:
                        <?php echo $_SESSION['detalle_pedido']['total']; ?>
                    </p>
                    <p class="item-title">
                        Direccion:
                        <?php echo $_SESSION['detalle_pedido']['direccion']; ?>
                    </p>
                    <p class="item-title">
                        Telefono:
                        <?php echo $_SESSION['detalle_pedido']['telefono']; ?>
                    </p>
                </li>
                <?php
                                unset($_SESSION['cesta']);
                                $_SESSION['cesta'] = array();
                                unset($_SESSION['detalle_pedido']);
                            }else{
                                header("Location: ../cesta.php?error");
                            }

                ?>
            </ul>
        </div>
    </div>
<?php
            }
            include_once 'seccion-footer.php';
?>
