<?php
///// INCLUIR LA CONEXIÓN A LA BD /////////////////
include('conexion.php');
///// CONSULTA A LA BASE DE DATOS /////////////////
$alumnos="SELECT * FROM compras where year(fecfac) = 2018 order by pref1, pref2, nrodoc DESC";
$resAlumnos=$conexion->query($alumnos);
?>

<html lang="es">
	<head>
		<title>Reportes de Compras en Excel</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		<link href="css/estilos.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	</head>
	<body>

		
		<header>
			<div class="alert alert-info">
			<h2>Reportes de Compras en Excel</h2>
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
					<th>Nombre</th>
					<th>Monto</th>
					<th>Iva</th>
					<th>Fecha de Facturacion</th>
				</tr>
				<?php
				while ($registroAlumnos = $resAlumnos->fetch_array(MYSQLI_BOTH))
				{
					echo'<tr>
						 <td>'.$registroAlumnos['nrodoc'].'</td>
						 <td>'.$registroAlumnos['nompro'].'</td>
						 <td>'.$registroAlumnos['totdoc'].'</td>
						 <td>'.$registroAlumnos['iva10'].'</td>
						 <td>'.$registroAlumnos['fecfac'].'</td>
						 </tr>';
				}
				?>
			</table>
		</section>

	</body>
</html>


