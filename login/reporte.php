<?php
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>SGE - Gestion</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <?php include "navbar.php"; ?>
    <div class="page-header">
        <h1>Hola, <b><?php echo htmlspecialchars($_SESSION['username']); ?></b>. Bienvenido.</h1>
    </div>
    <p><a href="localhost:81/tesis/buscar/buscarCompra/index.php" class="btn btn-primary">Consulta Factura Compra</a></p>
    <p><a href="http://localhost:81/tesis/buscar/buscarVenta/index.php" class="btn btn-primary">Consulta Factura Venta</a></p> 
    <p><a href="http://localhost:81/tesis/buscar/buscarMovimiento/index.php" class="btn btn-primary">Consulta Movimiento</a></p>
    <p><a href="http://localhost:81/tesis/buscar/buscarCtaProv/index.php" class="btn btn-primary">Consulta Cta Proveedor</a></p>
    <p><a href="http://localhost:81/tesis/buscar/buscarCtaCliente/index.php" class="btn btn-primary">Consulta Cta Cliente</a></p>
    <p><a href="http://localhost:81/tesis/buscar/buscarTransferencia/index.php" class="btn btn-primary">Consulta Transferencia</a></p>
    <p><a href="http://localhost:81/tesis/buscar/buscarPlaya/index.php" class="btn btn-primary">Consulta Cierre Playa</a></p>

</body>
</body>

</body>
</html>