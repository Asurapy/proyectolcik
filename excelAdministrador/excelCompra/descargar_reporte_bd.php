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

		<?php include "navbar.php"; ?>
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
				$factura = '';
				while ($registroAlumnos = $resAlumnos->fetch_array(MYSQLI_BOTH))
				{
					//CEROS PARA EL PREFIJO 1
                    if(strlen($registroAlumnos["pref1"])==1){
                       $wpf1='00';
                    }else{
                       $wpf1='0';
                    }
                    //CEROS PARA EL PREFIJO 2
                    if(strlen($registroAlumnos["pref2"])==1){
                       $wpf2='00';
                    }else{
                        $wpf2='0';
                    }
                    $nroFormat=number_format($registroAlumnos['totdoc']);
                    $nroIva=number_format($registroAlumnos['iva10']);
					$factura = $wpf1.$registroAlumnos['pref1'].'-'.$wpf2.$registroAlumnos['pref2'].'-'.$registroAlumnos['nrodoc'];
					echo'<tr>
						 <td>'.$factura.'</td>
						 <td>'.$registroAlumnos['nompro'].'</td>
						 <td>'.$nroFormat.'</td>
						 <td>'.$nroIva.'</td>
						 <td>'.$registroAlumnos['fecfac'].'</td>
						 </tr>';
				}
				?>
			</table>
		</section>

	</body>
</html>


