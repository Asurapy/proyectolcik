<?php
///// INCLUIR LA CONEXIÓN A LA BD /////////////////
include('conexion.php');
///// CONSULTA A LA BASE DE DATOS /////////////////
$alumnos="SELECT * FROM ventasbk where year(fecfac) = 2017 order by pf1, pf2, nrodoc DESC";
$resAlumnos=$conexion->query($alumnos);
?>

<html lang="es">
	<head>
		<title>Excel de Ventas Realizadas</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		<link href="css/estilos.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	</head>
	<body>

		<?php include "navbar.php"; ?>
		<header>
			<div class="alert alert-info">
			<h2>Excel de Ventas Realizadas</h2>
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
					<th>Numero Factura</th>
					<th>Ruc</th>
					<th>Importe</th>
					<th>Iva</th>
					<th>Fecha de Facturacion</th>
				</tr>
				<?php
				while ($registroAlumnos = $resAlumnos->fetch_array(MYSQLI_BOTH))
				{
					//CEROS PARA EL PREFIJO 1
                    if(strlen($registroAlumnos["pf1"])==1){
                       $wpf1='00';
                    }else{
                       $wpf1='0';
                    }
                    //CEROS PARA EL PREFIJO 2
                    if(strlen($registroAlumnos["pf2"])==1){
                       $wpf2='00';
                    }else{
                        $wpf2='0';
                    }
                    $nroFormat=number_format($registroAlumnos['totdoc']);
                    $nroIva=number_format($registroAlumnos['iva10']);
					$factura = $wpf1.$registroAlumnos['pf1'].'-'.$wpf2.$registroAlumnos['pf2'].'-'.$registroAlumnos['nrodoc'];
					echo'<tr>
						 <td>'.$factura.'</td>
						 <td>'.$registroAlumnos['ruc'].'</td>
						 <td>'.$nroFormat.'</td>
						 <td>'.$nroFormat.'</td>
						 <td>'.$registroAlumnos['fecfac'].'</td>
						 </tr>';
				}
				?>
			</table>
		</section>

	</body>
</html>


