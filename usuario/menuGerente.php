<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
	print "<script>alert(\"Acceso invalido!\");window.location='login.php';</script>";
}

?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>.: SGE :.</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">
	</head>
	<body>
	<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="form.css" type="text/css"> 
	<?php include "navbarGerente.php"; ?>
	<div class="page-header" align="center">
        <h1>Menu Gerente</h1>
    </div>
    <p align="center"><a href="./crudGerente.php" class="btn btn-primary">Administracion de Datos</a></p>
    <p align="center"><a href="./consultaGerente.php" class="btn btn-primary">Consulta de Datos</a></p>
    <p align="center"><a href="./reporteGerente.php" class="btn btn-primary">Reporte de Datos</a></p>
    <p align="center"><a href="http://localhost/tesis/generarBK/bk.php" class="btn btn-danger">GENERAR BK</a></p>

	</body>
</html>