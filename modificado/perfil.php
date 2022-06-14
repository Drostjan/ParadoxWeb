<!DOCTYPE html>
<html>

<head>
    <title>Paradox - Perfil </title>
    <?php
    require_once 'includes/db.inc.php';
    session_start();
    $username = $_SESSION['email'];
    if ( $_SESSION['session']  != 1) {
        include_once 'seccion-menu.php';
        include_once 'not_logged.php';
    }else{
        include_once 'seccion-menu2.php';
        if($username == 'moderador@paradox.com' ){
            $perfil = $conexion->prepare("SELECT * from clientes where correo = ?");
            $perfil->bind_param("s", $username);
            $perfil->execute();
            $resultado = $perfil->get_result();
            $fila = $resultado->fetch_assoc();
            $_SESSION['user'] = $fila['nombre']." ".$fila['apellidos'];
            $_SESSION['userID'] = $fila['id_cliente'];
            ?>
            <div class="main_perfil">
            <div class="paradox_separator2">
                <a>mis datos</a>
            </div>
            <div class="perfil">
                <div class="perfil_contenedor">
                    <ul>
                        <li class="hola">BIENVENIDO,</li>
                        <li class="perfil_detalle_nombre"><?php echo $fila['nombre']." ".$fila['apellidos']; ?></li>
                    </ul>
                </div>
            </div>
            <div class="perfil_opcion">
                <ul class="left_eleccion">
                    <li class="left_eleccion-opcion"><a href="home.php">INICIO</a></li>
                    
                    <li class="left_eleccion-opcion"><a href="formulario_producto.php">AÑADIR UN PRODUCTO</a></li>
                    <li class="left_eleccion-opcion"><a href="includes/logout.inc.php">CERRAR SESIÓN</a></li>
                </ul>
                <div class="right_info">
                    <ul>
                        <li class="info_titulo">Nombre:</li>
                        <li class="perfil_detalle_nombre"><?php echo $fila['nombre']." ".$fila['apellidos']; ?></li><br>
                        <li class="info_titulo">Email:</li>
                        <li class="perfil_info_nom_apellido"><?php echo $username; ?></li><br>
                        <li class="info_titulo">Número de teléfono:</li>
                        <li class="perfil_info_telefono"><?php echo chunk_split($fila[('telefono')],3,' '); ?></li><br>
                    </ul>
                </div>
            </div>
        </div>
            <?php
        }else{
        $perfil = $conexion->prepare("SELECT * from clientes where correo = ?");
        $perfil->bind_param("s", $username);
        $perfil->execute();
        $resultado = $perfil->get_result();
        $fila = $resultado->fetch_assoc();
        
        ?>
        <div class="main_perfil">
            <div class="paradox_separator2">
                <a>mis datos</a>
            </div>
            <div class="perfil">
                <div class="perfil_contenedor">
                    <ul>
                        <li class="hola">BIENVENIDO,</li>
                        <li class="perfil_detalle_nombre"><?php echo $fila['nombre']." ".$fila['apellidos']; ?></li>
                    </ul>
                </div>
            </div>
            <div class="perfil_opcion">
                <ul class="left_eleccion">
                    <li class="left_eleccion-opcion"><a href="home.php">INICIO</a></li>
                    <li class="left_eleccion-opcion"><a href="includes/logout.inc.php">CERRAR SESIÓN</a></li>
                </ul>
                <div class="right_info">
                    <ul>
                        <li class="info_titulo">Nombre:</li>
                        <li class="perfil_detalle_nombre"><?php echo $fila['nombre']." ".$fila['apellidos']; ?></li><br>
                        <li class="info_titulo">Email:</li>
                        <li class="perfil_info_nom_apellido"><?php echo $username; ?></li><br>
                        <li class="info_titulo">Número de teléfono:</li>
                        <li class="perfil_info_telefono"><?php echo chunk_split($fila[('telefono')],3,' '); ?></li><br>
                    </ul>
                </div>
            </div>
        </div>
            <?php
            }
        }
        include_once 'seccion-footer.php';
            ?>
