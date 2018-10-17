<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
    print "<script>alert(\"Acceso invalido!\");window.location='login.php';</script>";
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
    <p><a href="localhost/tesis/excel/excelCompra/index.php" class="btn btn-primary">Consulta Factura Compra</a></p>
    <p><a href="http://localhost/tesis/excel/excelVenta/index.php" class="btn btn-primary">Consulta Factura Venta</a></p> 

</body>
</body>

</body>
</html>