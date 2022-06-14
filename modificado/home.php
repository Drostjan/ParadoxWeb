<!DOCTYPE html>
<html>
<head>
    <title>Paradox - Home </title>
    <?php
    include_once 'seccion-menu2.php';
    ?>
    <div class="main">
        <div id="slides">
            <figure class="slider">
                <figure><img src="assets/images/slider1.jpg"></figure>
                <figure><img src="assets/images/slider2.jpg"></figure>
                <figure><img src="assets/images/slider3.jpg"></figure>
                <figure><img src="assets/images/slider4.jpg"></figure>
                <figure><img src="assets/images/slider1.jpg"></figure>
            </figure>
        </div>
        <div class="paradox_separator">
            <a>destacadas</a>
        </div>
        <div class="productos">
        <?php 
            require_once 'includes/db.inc.php';
            $sql=$conexion->prepare("SELECT nombre_producto,imagen,stock FROM productos WHERE nombre_producto LIKE '%a%'  LIMIT 6 "); 
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