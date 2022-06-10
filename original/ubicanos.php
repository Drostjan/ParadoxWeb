<!DOCTYPE html>
<html>
    <head>
        <title>Paradox - Donde Ubicarnos </title>
        <?php
        session_start();
        if ( $_SESSION['session']  != 1) {
            include_once 'seccion-menu.php';
        }else{
            include_once 'seccion-menu2.php';
        }
        ?>
    
    <div class="main">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d419.84292152309166!2d2.171972622842742!3d41.4110019310235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a4a2cf87a6555d%3A0xd61f5ffe16202460!2sEscuela%20P%C3%A1lcam!5e0!3m2!1ses!2ses!4v1654182727508!5m2!1ses!2ses" width="95%" height="700" style="border:0;margin:40px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>        </div>
    </div>
    <?php
            include_once 'seccion-footer.php'
        ?>    <?php
        include_once 'seccion-footer.php'
    ?>