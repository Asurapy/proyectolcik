<?php
///// INCLUIR LA CONEXIÓN A LA BD /////////////////
include('conexion.php');
///// CONSULTA A LA BASE DE DATOS /////////////////
$alumnos="SELECT * FROM transferencia where year(fecdoc) = 2018 order by nrodoc DESC";
$resAlumnos=$conexion->query($alumnos);
?>

<html lang="es">
	<head>
		<title>Reportes de Transferencia en Excel</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		<link href="css/estilos.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	</head>
	<body>

		<?php include "php/navbar.php"; ?>
		<header>
			<div class="alert alert-info">
			<h2>Reportes de Transferencia en Excel</h2>
			</div>
		</header>
		<section>
			<form method="post" class="form" action="reporte.php">
		    <input type="date" name="fecha1">
		    <input type="date" name="fecha2">
		    <input type="submit" name="generar_reporte">
		    </form>

			<table class="table">
				<tr class="bg-primary">
					<th>Nro Documento</th>
					<th>Codigo de Producto</th>
					<th>Existencia Ant.</th>
					<th>Existencia Act.</th>
					<th>Fecha de Documentacion</th>
				</tr>
				<?php
				while ($registroAlumnos = $resAlumnos->fetch_array(MYSQLI_BOTH))
				{
					echo'<tr>
						 <td>'.$registroAlumnos['nrodoc'].'</td>
						 <td>'.$registroAlumnos['codpro'].'</td>
						 <td>'.$registroAlumnos['exiant'].'</td>
						 <td>'.$registroAlumnos['exiact'].'</td>
						 <td>'.$registroAlumnos['fecdoc'].'</td>
						 </tr>';
				}
				?>
			</table>
		</section>

	</body>
</html>


