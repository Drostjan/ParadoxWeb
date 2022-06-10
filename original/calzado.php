<!DOCTYPE html>
<html>

<head>
    <title>Paradox - Calzado </title>
    <?php
session_start();
if ( $_SESSION['session']  != 1) {
    include_once 'seccion-menu.php';
}else{
    include_once 'seccion-menu2.php';
}
?>
    <div class="main">
    <div class="paradox_separator">
            <a>calzado</a>
        </div>
        <div class="productos">
    <?php 
            require_once 'includes/db.inc.php';
            $sql=$conexion->prepare("SELECT nombre_producto,imagen,stock FROM productos WHERE categoria = 'calzado' "); 
            $sql->execute();
            $sql->bind_result($name,$imagen,$stock);     
            
            while ($sql->fetch()){
                if($stock == 0){
                    echo "";
                }
                else{  
        ?> 
        <?php
            echo "<div class='producto'><a href='producto.php?id=".$name."' ><img src='".$imagen."' ></a></div>";   
            }
        }
        ?>
        </div>
    </div>
    <?php
    include_once 'seccion-footer.php'
?>
