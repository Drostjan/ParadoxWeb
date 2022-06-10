<!DOCTYPE html> 
<html>
    <head>
        <title>Paradox - Confirmar Pedidos</title>
        <?php
            session_start();
            if ( $_SESSION['session']  != 1) {
                include_once 'seccion-menu.php';
                include_once 'not_logged.php';
            }else{
                include_once 'seccion-menu2.php';
            
            if(!empty($_SESSION['cesta'])){
                if($_SESSION['total'] >= 150){
                    $_SESSION['detalle_pedido'] = array(
                        'cliente' => '',
                        'productos' => $_SESSION['cesta'],
                        'direccion' => '',
                        'telefono' => 0,
                        'estado' => 'creado',
                        'total' => $_SESSION['total']
                    );
                }else{
                    $_SESSION['detalle_pedido'] = array(
                        'cliente' => '',
                        'productos' => $_SESSION['cesta'],
                        'direccion' => '',
                        'telefono' => 0,
                        'estado' => 'creado',
                        'total' => $_SESSION['total']+ 5
                    );
                }
            }else{
                header("Location: ../cesta.php");
            }
            
            ?>

        <form action="includes/pedido.inc.php" method="post" class="formulario" id="formulario">
            <div class="paradox_separator2">
                <a>Confirmar Pedido</a>
            </div>
            <div class="formulario-main" id="div-nombre">
                <label for="nombre" class="formulario-label"><b>Nombre</b></label>
                <i class="formulario-icono fas fa-times-circle"></i>
                <div class="formulario-input">
                    <input type="text" class="formulario-item" placeholder="Introduzca el nombre" name="nombre" id="nombre">
                </div>
                <a class="formulario-error">El nombre solo puede contener letras.</a><br>
            </div>
            <div class="formulario-main" id="div-telefono">
                <label for="telefono" class="formulario-label"><b>Teléfono</b></label>
                <i class="formulario-icono fa fa-times-circle"></i>
                <div class="formulario-input">
                    <input type="text" class="formulario-item" placeholder="Introduzca el teléfono" name="telefono" id="telefono">
                </div>
                <a class="formulario-error">El teléfono ha de contener únicamente 9 números.</a><br>
            </div>
            <div class="formulario-main" id="div-direccion">
                <label for="direccion" class="formulario-label"><b>Direccion</b></label>
                <i class="formulario-icono fa fa-times-circle"></i>
                <div class="formulario-input">
                    <input type="text" class="formulario-item" placeholder="Ejemplo: Calle Castillejos, 361-2" name="direccion" id="direccion">
                </div>
                <a class="formulario-error">La descripción solo puede contener letras.</a><br>
            </div>
            <div class="formulario-main" id="div-submit">
                <button type="submit" name="submit" value="submit">CONFIRMAR PEDIDO</button>
                <a class="mensaje-correcto" id="mensaje-correcto">PEDIDO REALIZADO CORRECTAMENTE!</a>
            </div>

            <div class="mensaje-error" id="mensaje-error">
                <a><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> ¡Por favor, rellena el formulario
                    correctamente!</a>
            </div>
        </form>
        <script src="assets/js/validar_pedido.js"></script>
        <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>

<?php
            }
 include_once 'seccion-footer.php';
?>