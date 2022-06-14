<!DOCTYPE html>
<html>

<head>
    <title>Paradox - Pedido Realizado </title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <style>
    .container{width: 100%;padding: 50px;}
    p{color: #34a853;font-size: 18px;}
    </style>
    <?php 
session_start();
if ( $_SESSION['session']  != 1) {
    include_once 'seccion-menu.php';
}else{
    include_once 'seccion-menu2.php';
}

if(!isset($_REQUEST['id'])){
    header("Location: home.php");
}
?>
<div class="main-2">
    <div class="container">
        <h1>Order Status</h1>
        <p>Your order has submitted successfully. Order ID is #<?php echo $_GET['id']; ?></p>
    </div>
    <a href="home.php" class="btn btn-dark"><i class="glyphicon glyphicon-menu-left"></i> Volver al Inicio</a>
</div>
<?php
            include_once 'seccion-footer.php'
        ?>