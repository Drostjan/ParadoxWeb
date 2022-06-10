<!DOCTYPE html>
<html>

<head>
    <title>Paradox</title>
    <?php
    session_start();
    if ( $_SESSION['session']  != 1) {
        include_once 'seccion-menu.php';
    }else{
        include_once 'seccion-menu2.php';
    }
    ?>
    <div class="main_elproducto">
        <?php 
            require_once 'includes/db.inc.php';
            if(isset($_GET['id'])){
                $id_product= $_GET['id'];
            }
            $sql= $conexion->prepare("SELECT id_producto,nombre_producto,descripcion,stock,precio,imagen,talla FROM productos WHERE nombre_producto = ?"); 
            $sql->bind_param("s",$id_product);
            $sql->execute();
            $sql->bind_result($it,$producto,$descripcion,$stock,$precio,$imagen,$talla);
            while ($sql->fetch()) {
                $_SESSION['producto'] = $producto;
                $_SESSION['precio'] = $precio;
                $_SESSION['imagen'] = $imagen;
                $_SESSION['stock'] = $stock;
        ?> 
        <div class="paradox_separator2">
            <a><?php echo $producto ?></a>
        </div>
        <div class="caja_elproducto">
            <div class="elproducto_img">
                <?php echo "<img src='".$imagen."' >" ?>
            </div>
            <div class="elproducto_info">
                <ul>
                    <li id="elproducto_nombre"><?php echo $producto ?></li>
                    <li id="elproducto_talla">Talla:  <?php echo $talla ?></li>
                    <li id="elproducto_precio">Precio:  <?php echo $precio." €"; ?></li>

                    <form class="form-inline" method="post" action="includes/cesta.inc.php">
                            <input type="hidden" name="id" value="<?php echo $producto; ?>">
	                        <li id="elproducto_stock"><input type="text" name="q" value="1" style="width:100px;" min="1" max="6" class="form-control" placeholder="Cantidad"></li>
                            <li id="elproducto_botones"><div class="elproducto_botones">
                                <a><button type="submit" name="submit" class="btn btn-primary">Añadir a la cesta</button></a>
                                <a href="includes/fav.inc.php?id=<?php echo $it; ?>"><img id="fav-icon-add" src="assets/images/favorites.png" width="28" height="28" title="Añadir a favoritos"></a>
                            </div></li>
                    </form>
                </ul>
            </div>
            <div class="elproducto_descripcion">
            <p><?php echo $descripcion  ?></p>
            </div>
        </div>
    </div>
    <?php
            
            }
        ?>
    </div>
    <?php
        include_once 'seccion-footer.php'
        ?>
