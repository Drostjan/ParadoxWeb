<!DOCTYPE html>
<html>

<head>
    <title>Paradox</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
            $sql= $conexion->prepare("SELECT id_producto,nombre_producto,descripcion,stock,precio,imagen,talla,categoria FROM productos WHERE nombre_producto = ?"); 
            $sql->bind_param("s",$id_product);
            $sql->execute();
            $sql->bind_result($it,$producto,$descripcion,$stock,$precio,$imagen,$talla,$categoria);
            while ($sql->fetch()) {
                $_SESSION['producto'] = $producto;
                $_SESSION['precio'] = $precio;
                $_SESSION['imagen'] = $imagen;
        ?> 
       

        <div class="paradox_separator2">
            <a href="<?php echo $categoria.".php"; ?>" class="btn btn-dark"><i class="glyphicon glyphicon-menu-left"></i></a>
            <a><?php echo $producto; ?></a>
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
                    <div class="elproducto_botones">
                        <a class="btn btn-success" href="includes/cestaFunc.inc.php?action=add&id=<?php echo $it; ?>">Añadir a la cesta</a>
                        <a href="includes/fav.inc.php?id=<?php echo $it; ?>"><img id="fav-icon-add" src="assets/images/favorites.png" width="28" height="28" title="Añadir a favoritos"></a>
                    </div>
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
