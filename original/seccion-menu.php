        <!--Para que los tildes se muestren bien-->
        <meta charset="utf-8">
        <!--Conectar el css-->
        <link rel="stylesheet" href="assets/styles/main.css">
        <link rel="icon" href="assets/images/logo.png">

    </head>
    <body>
        <!--=====================================================================-->
        <!--                               Menu                                  -->
        <!--=====================================================================-->
        <div class="menu" >
            <div id="menu_responsive">
                <div class="boton_menu" tabindex="0">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </div>
                <div id="menu_contenido" tabindex="0">
                  <ul>
                    <a href="index.php">Home</a>
                    <a href="ropa.php">Ropa</a>
                    <a href="calzado.php">Calzado</a>
                    <a href="accesorios.php">Accesorios</a>
                    <a href="fav.php">Favoritos</a>
                  </ul>
                </div>
            </div>
            <div class="menu-logo">
                <a href="index.php">PARADOX</a>
            </div>
            <div id="categorias" class="menu-categorias">
                <a href="ropa.php">Ropa</a>
                <a href="calzado.php">Calzado</a>
                <a href="accesorios.php">Accesorios</a>
            </div>

            <div class="menu-iconos">

                <a onclick="document.getElementById('id_ventana').style.display='block'" style="margin:0" tabindex="0">
                    <img id="login-icon" src="assets/images/login.png" width="18" title="Iniciar sesion">
                </a>

                <a id="fav" href="fav.php" style="margin:0">
                    <img id="fav-icon" src="assets/images/favorites.png" width="18" title="Favoritos">
                </a>

                <a href="cesta.php" style="margin:0">
                    <img id="cesta-icon" src="assets/images/shoppingcart.png" width="18" title="Cesta">
                </a>
            </div>
        </div>
        
        <!--=====================================================================-->
        <!--============================-->
        <!--    Ventana iniciar sesion  -->
        <!--============================-->
        <div id="id_ventana" class="ventana_login">
            
            <form class="contenido_login animacion_zoom" action="includes/login.inc.php" method="post">
                <div class="contenedor_ventana_login">
                    <h2>Inicia sesión</h2>
                    <span onclick="document.getElementById('id_ventana').style.display='none'" class="close" title="cerrar">×</span>
                </div>
                
                <div class="login_container">
                    <label for="username"><b>Email</b></label>
                    <input type="text" placeholder="Introduzca el email" name="email" id="email">

                    <label for="psw"><b>Contraseña</b></label>
                    <input type="password" placeholder="Introduzca la contraseña" name="psw" id="pass">
                    <button type="submit" name="login" value="login">Iniciar sesión
                    </button>
                    </script>
                    <span class="register">¿Eres nuevo en PARADOX?<br><a class="register_href" href="register.php">Crearse una cuenta</a></span>
                </div>
            </form>
        </div>
