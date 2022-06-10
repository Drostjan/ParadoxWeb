<!DOCTYPE html>
<html>

<head>
    <title>Paradox - Home </title>
    <?php
    session_start();
    $_SESSION['session'] = FALSE;
    include_once 'seccion-menu.php';
    
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
            <div class="producto"><a href="producto.php?id=jordan 1 retro high red" ><img src="assets/images/jordan_1_retro_high.png"></a></div>
            <div class="producto"><a href="producto.php?id=dove hoodie gap"><img src="assets/images/dove-hoodie-gap.png"></a></div>
            <div class="producto"><a href="producto.php?id=off white industrial belt"><img src="assets/images/off-white-industrial-belt.png"></a></div>
            <div class="producto"><a href="producto.php?id=adidas yeezy 700"><img src="assets/images/adidas_yeezy_700.png"></a></div>
            <div class="producto"><a href="producto.php?id=nike hoodie ocean"><img src="assets/images/sudadera_nike.png"></a></div>
            <div class="producto"><a href="producto.php?id=jordan 1 retro high white"><img src="assets/images/jordan_1_retro_high_white.png"></a></div>

        </div>
    </div>
    <?php
            include_once 'seccion-footer.php'
        ?>