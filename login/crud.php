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
    <p><a href="register.php" class="btn btn-danger">Gestion de Usuarios</a></p>
    <p><a href="http://localhost:81/tesis/crud/crudIva/ver.php" class="btn btn-primary">Admin Iva</a></p>
    <p><a href="http://localhost:81/tesis/crud/crudProducto/ver.php" class="btn btn-primary">Admin Producto</a></p>
    <p><a href="http://localhost:81/tesis/crud/crudProveedor/ver.php" class="btn btn-primary">Admin Proveedor</a></p>
</body>
</body>

</body>
</html>