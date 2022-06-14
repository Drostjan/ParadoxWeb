<?php
include 'includes/cesta.inc.php';
$cesta = new Cart;

if($cesta->total_items() <= 0){
    header("Location: cesta.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Paradox</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <?php
    session_start();
    if ( $_SESSION['session']  != 1) {
        include_once 'seccion-menu.php';
    }else{
        include_once 'seccion-menu2.php';
    }
    ?>
    <style>
    .container{width: 100%;padding: 50px;}
    .table{width: 65%;float: left;}
    .addr{width: 30%;float: left;margin-left: 30px;}
    </style>
<div class="main-2">
     <div class="paradox_separator2">
         <a>Detalle de Pedido</a>
     </div>
     <div class="caja_cesta_fav">
         <table class="table">
             <thead>
                 <tr>
                     <th>Producto</th>
                     <th>Precio</th>
                     <th>Cantidad</th>
                     <th>Subtotal</th>
                 </tr>
             </thead>
             <tbody>
                 <?php

                    if($cesta->total_items() > 0){
                     $cestaItems = $cesta->contents();
                     foreach($cestaItems as $item){
                 ?>
                 <tr>
                    <td><?php echo $item["nombre"]; ?></td>
                    <td><?php echo $item["precio"].' €'; ?></td>
                    <td><?php echo $item["qty"]; ?></td>
                    <td><?php echo $item["precio"]* $item["qty"].' €'; ?></td>
                 </tr>
                 <?php } }else{ ?>
                 <tr><td colspan="4"><p>Cesta Vacia......</p></td>
                 <?php } ?>
             </tbody>
             <tfoot>
                 <tr>
                     <td colspan="3"></td>
                     <?php if($cesta->total_items() > 0){ ?>
                        <td class="text-center"><strong>Total <?php echo $cesta->total().' €'; ?></strong></td>
                     <?php } ?>
                     <td><a href="home.php" class="btn btn-dark"><i class="glyphicon glyphicon-menu-left"></i> Continuar comprando</a></td>
                     <td><a href="includes/cestaFunc.inc.php?action=order" class="btn btn-success orderBtn"><i class="glyphicon glyphicon-menu-right"></i>Confirmar Pedido</a></td>
                 </tr>
             </tfoot>
         </table>
     </div>
     <div class="addr">
        <h4>Detalles de envío</h4>
        <?php 
            require_once 'includes/db.inc.php';

            $sql= $conexion->prepare("SELECT * FROM clientes WHERE correo = ?");
            $sql->bind_param("s",$_SESSION["email"]);
            $sql->execute();
            $resultado = $sql->get_result();
            $fila = $resultado->fetch_assoc();
        ?>
        <p><?php echo $fila['correo']; ?></p>
        <p><?php echo $fila['telefono']; ?></p>
        <p><?php echo $fila['pais']; ?></p>
     </div>

</div>
<?php
        include_once 'seccion-footer.php'
        ?>
