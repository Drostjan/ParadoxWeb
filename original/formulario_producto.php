    <!DOCTYPE html>
    <html>

    <head>
        <title>Paradox - Agregar Producto </title>

        <?php
         require_once 'includes/db.inc.php';
         session_start();
         $username = $_SESSION['email'];
         if ( $_SESSION['session']  != 1) {
             include_once 'seccion-menu.php';
             include_once 'not_logged.php';
         }else{
             include_once 'seccion-menu2.php';
             if($username == 'moderador@paradox.com'){
      ?>
        <!--=====================================================================-->
        <!--============================-->
        <!--    FORMULARIO  -->
        <!--============================-->
        
        <form action="includes/agregar_producto.php" method="post" enctype="multipart/form-data" class="formulario"
            id="formulario">
            <div class="paradox_separator2">
                <a>Agregar producto</a>
            </div>
            <div class="formulario-main" id="div-nombre">
                <label for="nombre" class="formulario-label"><b>Nombre del Producto</b></label>
                <i class="formulario-icono fas fa-times-circle"></i>
                <div class="formulario-input">
                    <input type="text" class="formulario-item" placeholder="Introduzca el nombre" name="nombre"
                        id="nombre">
                </div>
                <a class="formulario-error">El nombre solo puede contener letras y números.</a><br>
            </div>

            <div class="formulario-main" id="div-descripcion">
                <label for="descripcion" class="formulario-label"><b>Descripción</b></label>
                <i class="formulario-icono fa fa-times-circle"></i>
                <div class="formulario-input">
                    <input type="text" class="formulario-item" placeholder="Introduzca la descripcion"
                        name="descripcion" id="descripcion">
                </div>
                <a class="formulario-error">La descripción solo puede contener letras.</a><br>
            </div>

            <div class="formulario-main" id="div-precio">
                <label for="precio" class="formulario-label"><b>Precio</b></label>
                <i class="formulario-icono fa fa-times-circle"></i>
                <div class="formulario-input">
                    <input type="text" class="formulario-item" placeholder="Introduzca el Precio" name="precio"
                        id="precio">
                </div>
                <a class="formulario-error">El precio solo puede contener numeros positivos.</a><br>
            </div>

            <div class="formulario-main" id="div-talla">
                <label for="talla" class="formulario-label"><b>Talla</b></label><br>
                <select name="talla" class="talla" id="talla">
                    <optgroup label="Ropa">
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                    <optgroup label="Calzado">
                        <option value="41">41</option>
                        <option value="42">42</option>
                        <option value="43">43</option>
                        <option value="44">44</option>
                        <option value="45">45</option>
                    <optgroup label="Otros">
                        <option value="Talla única">Talla única</option>
                        <option value="X" selected>X</option>
                </select>
            </div><br>

            <div class="formulario-main" id="div-stock">
                <label for="stock" class="formulario-label"><b>Stock</b></label>
                <i class="formulario-icono fa fa-times-circle"></i>
                <div class="formulario-input">
                    <input type="text" class="formulario-item" placeholder="Introduzca el Stock" name="stock"
                        id="stock">
                </div>
                <a class="formulario-error">El stock solo puede contener numeros.</a><br>
            </div>

            <div class="formulario-main" id="div-imagen">
                <label for="archivo" class="formulario-label"><b>Imagen</b><br>
                    <div class="subir-archivo">
                        <i class="fa fa-cloud-upload"></i> Subir imagen
                        <input name="archivo" id="archivo" type="file" />
                </label>
            </div>
            </div><br>

            <div class="formulario-main" id="div-categoria">
                <label for="categoria" class="formulario-label"><b>Categoría</b></label><br>
                <select name="categoria" class="categoria" id="categoria">
                    <optgroup label="Seleccione categoría">
                        <option value="ropa">Ropa</option>
                        <option value="calzado">Calzado</option>
                        <option value="accesorios">Accesorios</option>
                </select>
            </div>

            <div class="formulario-main" id="div-submit">
                <button type="submit" name="submit" value="submit">SUBIR PRODUCTO</button>
                <a class="mensaje-correcto" id="mensaje-correcto">¡PRODUCTO SUBIDO CORRECTAMENTE!</a>
            </div>

            <div class="mensaje-error" id="mensaje-error">
                <a><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> ¡Por favor, rellena el formulario
                    correctamente!</a>
            </div>

        </form>
        <script src="assets/js/validar_producto.js"></script>
        <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
        <?php
        }else{
            include_once 'seccion-menu2.php';
            include_once 'no_es_admin.php';
        }
    }
        include_once 'seccion-footer.php'
    ?>