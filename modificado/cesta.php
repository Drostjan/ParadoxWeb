<!DOCTYPE html>
<html>
<?php
        include 'includes/cesta.inc.php';
        $cesta = new Cart;
?>
<head>
    <title>Paradox - Cesta </title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <?php
        session_start();
        if ( $_SESSION['session']  != 1) {
            include_once 'seccion-menu.php';
            include_once 'not_logged.php';
        }else{
            include_once 'seccion-menu2.php';
        
    ?>
    <script>
    function update(obj,id){
        $.get("includes/cestaFunc.inc.php", {action:"update", id:id, qty:obj.value}, function(data){
            if(data == 'ok'){
                location.reload();
            }else{
                alert('Cart update failed, please try again.');
            }
        });
    }

    </script>
    <style>
    .container{padding: 10px;}
    input[type="number"]{width: 30%;}
    </style>
    <div class="main-2">
        <div class="paradox_separator2">
            <a>Cesta</a>
        </div>
        <div class="caja_cesta_fav">
            <table class="table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                        <th>Borrar</th>
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
                        <td><input type="number" class="form-control text-center" value="<?php echo $item["qty"]; ?>" onchange="update(this, '<?php echo $item['rowid']; ?>')"></td>
                        <td><?php echo $item["precio"]* $item["qty"].' €'; ?></td>
                        <td>
                            <a href="includes/cestaFunc.inc.php?action=remove&id=<?php echo $item["rowid"]; ?>" class="btn btn-danger" onclick="return confirm('Estas seguro?')"><i class="glyphicon glyphicon-trash"></i></a>
                        </td>
                    </tr>
                    <?php } }else{ ?>
                    <tr><td colspan="5"><p>Tu carrito esta vacio.....</p></td>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td><a href="home.php" class="btn btn-dark"><i class="glyphicon glyphicon-menu-left"></i> Continuar comprando</a></td>
                        <td colspan="2"></td>
                        <?php if($cesta->total_items() > 0){ ?>
                        <td class="text-center"><strong>Total <?php echo $cesta->total().' €'; ?></strong></td>
                        <td><a href="pedido.php" class="btn btn-success btn-block">Crear Pedido <i class="glyphicon glyphicon-menu-right"></i></a></td>
                        <?php } ?>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <?php
        }
    include_once 'seccion-footer.php';
?>
