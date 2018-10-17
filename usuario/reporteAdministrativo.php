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
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="form.css" type="text/css">
    <?php include "navbarAdministrativo.php"; ?>
    <div class="page-header" align="center">
        <h1>Reportes Generales de Datos</h1>
    </div>
    <p align="center"><a href="http://localhost/tesis/excelAdministrador/excelVenta/descargar_reporte_bd.php" class="btn btn-primary">Excel Factura Venta</a></p>
    <p align="center"><a href="http://localhost/tesis/excelAdministrador/excelCompra/descargar_reporte_bd.php" class="btn btn-primary">Excel Factura Compra</a></p> 
    <p align="center"><a href="http://localhost/tesis/pdfAdministrador/pdfCompra/vistas/index.php" class="btn btn-primary">PDF Factura Compra</a></p>
    <p align="center"><a href="http://localhost/tesis/pdfAdministrador/pdfVentas/vistas/index.php" class="btn btn-primary">PDF Factura Venta</a></p>
    

</body>
</body>

</body>
</html>