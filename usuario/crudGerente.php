
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
    <?php include "navbarGerente.php"; ?>
    <div class="page-header" align="center">
        <h1>Administracion Generales de Datos</h1>
    </div>

<?php
      session_start();
    if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
       print "<script>alert(\"Acceso invalido!\");window.location='login.php';</script>";
    }

    if(!isset($_SESSION['crudImpuesto']) || empty($_SESSION['crudImpuesto'])){
     
    }else{
       print "<p align='center'><a href='http://localhost/tesis/crudGerente/crudIva/ver.php' class='btn btn-primary'>Tipo de Impuesto</a></p>"; 
    }

    if(!isset($_SESSION['crudProducto']) || empty($_SESSION['crudProducto'])){
     
    }else{
       print "<p align='center'><a href='http://localhost/tesis/crudGerente/crudProducto/ver.php' class='btn btn-primary'>Mantenimiento de Productos</a></p>"; 
    }

    if(!isset($_SESSION['crudCliente']) || empty($_SESSION['crudCliente'])){
     
    }else{
       print "<p align='center'><a href='http://localhost/tesis/crudGerente/crudPersona/ver.php' class='btn btn-primary'>Mantenimiento de Cliente</a></p>"; 
    }

    if(!isset($_SESSION['crudProveed']) || empty($_SESSION['crudProveed'])){
     
    }else{
       print "<p align='center'><a href='http://localhost/tesis/crudGerente/crudProveedor/ver.php' class='btn btn-primary'>Mantenimiento de Proveedor</a></p>"; 
    }

    if(!isset($_SESSION['crudUsuario']) || empty($_SESSION['crudUsuario'])){
     
    }else{
       print "<p align='center'><a href='registro.php' class='btn btn-danger'>Gestion de Usuarios</a></p>"; 
    }
?>
    <p align="center"><a href="http://localhost/tesis/crudGerente/crudNivel/ver.php" class="btn btn-danger">Nivel de Usuarios</a></p>
    <p align="center"><a href="http://localhost/tesis/crudGerente/crudGrupo/ver.php" class="btn btn-primary">Mantenimiento de Grupos</a></p> 
    <p align="center"><a href="http://localhost/tesis/crudGerente/crudSector/ver.php" class="btn btn-primary">Mantenimiento de Sectores</a></p> 
    <p align="center"><a href="http://localhost/tesis/crudGerente/crudPago/ver.php" class="btn btn-primary">Formas de Pago</a></p> 
    <p align="center"><a href="http://localhost/tesis/crudGerente/crudAccion/ver.php" class="btn btn-primary">Tipos de Acciones</a></p> 
    <p align="center"><a href="gestionBotones.php" class="btn btn-primary">Gestion de Botones</a></p> 
    
</body>
</body>

</body>
</html>