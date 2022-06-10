<!DOCTYPE html>
<html>
<head>
    <title>Paradox - Registro </title>
    <?php
    include_once 'seccion-menu.php';
    ?>
        <!--=====================================================================-->
        <!--============================-->
        <!--    FORMULARIO  -->
        <!--============================-->
        <form action="includes/signup.inc.php" method="post" class="formulario" id="formulario">
            <div class="paradox_separator2">
                <a>Crear cuenta</a>
            </div>
            <div class="formulario-main" id="div-nombre">
                <label for="nombre" class="formulario-label"><b>Nombre</b></label>
                <i class="formulario-icono fas fa-times-circle"></i>
                <div class="formulario-input">
                    <input type="text" class="formulario-item" placeholder="Introduzca el nombre" name="nombre" id="nombre">
                </div>
                <a class="formulario-error">El nombre solo puede contener letras.</a><br>
            </div>

            <div class="formulario-main" id="div-apellidos">
                <label for="apellidos" class="formulario-label"><b>Apellidos</b></label>
                <i class="formulario-icono fa fa-times-circle"></i>
                <div class="formulario-input">
                    <input type="text" class="formulario-item" placeholder="Introduzca sus apellidos" name="apellidos" id="apellidos">
                </div>
                <a class="formulario-error">El apellido solo puede contener letras.</a><br>
            </div>

            <div class="formulario-main" id="div-email">
                <label for="email" class="formulario-label"><b>Email</b></label>
                <i class="formulario-icono fa fa-times-circle"></i>
                <div class="formulario-input">
                    <input type="text" class="formulario-item" placeholder="Introduzca el usuario" name="email" id="email">
                </div>
                <a class="formulario-error">El email ha de contener un "@" y un "." entre una o varias letras.</a><br>
            </div>

            <div class="formulario-main" id="div-psw">
                <label for="psw" class="formulario-label"><b>Contraseña</b></label>
                <i class="formulario-icono fa fa-times-circle"></i>
                <div class="formulario-input">
                    <input type="password" class="formulario-item" placeholder="Introduzca la contraseña" name="psw" id="psw">
                </div>
                <a class="formulario-error">La contraseña ha de contener un mínimo de 8 carácteres y un máximo de 25 carácteres.</a><br>
            </div>

            <div class="formulario-main" id="div-psw2">
                <label for="psw2" class="formulario-label"><b>Repite la contraseña</b></label>
                <i class="formulario-icono fa fa-times-circle"></i>
                <div class="formulario-input">
                    <input type="password" class="formulario-item" placeholder="Repita la contraseña" name="psw2" id="psw2">
                </div>
                <a class="formulario-error">Las contraseñas no coinciden.</a><br>
            </div>

            <div class="formulario-main" id="div-telefono">
                <label for="telefono" class="formulario-label"><b>Teléfono</b></label>
                <i class="formulario-icono fa fa-times-circle"></i>
                <div class="formulario-input">
                    <input type="text" class="formulario-item" placeholder="Introduzca el teléfono" name="telefono" id="telefono">
                </div>
                <a class="formulario-error">El teléfono ha de contener únicamente 9 números.</a><br>
            </div>    

            <div class="formulario-main" id="div-pais">
                <label for="pais" class="formulario-label"><b>País</b></label><br>
                <select name="pais" class="pais" id="pais">
                    <optgroup label="Seleccione país">
                    <option value="España">España</option>
                    <option value="Portugal" disabled>Portugal (No disponible)</option>
                    <option value="Italia" disabled>Italia (No disponible)</option>
                </select>
            </div>


            <div class="formulario-main" id="div-submit">
                <button type="submit" name="submit" value="submit" >UNIRSE A NOSOTROS</button>
                <a class="mensaje-correcto" id="mensaje-correcto">¡FELICIDADES, YA ERES MIEMBRO DE PARADOX!</a>
            </div>

            <div class="mensaje-error" id="mensaje-error">
            <a><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> ¡Por favor, rellena el formulario correctamente!</a>
            </div>
        
        </form>
            <script src="assets/js/validar_register.js"></script>
            <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
        <?php
    include_once 'seccion-footer.php'
?>
