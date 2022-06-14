<!DOCTYPE html>
<html>

<head>
    <title>Paradox - Ropa </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <?php
session_start();
if ( $_SESSION['session']  != 1) {
    include_once 'seccion-menu.php';
}else{
    include_once 'seccion-menu2.php';
}?>
    <div class="main">
    <div class="paradox_separator">
            <a>Ropa</a>
        </div>
        <div class="productos">
    <?php 
            require_once 'includes/db.inc.php';
            $sql=$conexion->prepare("SELECT nombre_producto,imagen,stock FROM productos WHERE categoria = 'ropa' "); 
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
