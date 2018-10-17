<?php
include('conexion.php');//CONEXION A LA BD

$fecha1=$_POST['fecha1'];
$fecha2=$_POST['fecha2'];

if(isset($_POST['generar_reporte']))
{
	// NOMBRE DEL ARCHIVO Y CHARSET
	header('Content-Type:text/xls; charset=latin1');
	header('Content-Disposition: attachment; filename="Reporte_Cierre.xls"');

	// SALIDA DEL ARCHIVO
	$salida=fopen('php://output', 'w');
	// ENCABEZADOS
	fputcsv($salida, array('Id Alumno', 'Nombre', 'Carrera', 'Grupo', 'Fecha de Ingreso'));
	// QUERY PARA CREAR EL REPORTE
	$reporteCsv=$conexion->query("SELECT *  FROM cierreshop where fcierre BETWEEN '$fecha1' AND '$fecha2' ORDER BY ncierre");
	while($filaR= $reporteCsv->fetch_assoc())
		fputcsv($salida, array($filaR['ncierre'], 
								$filaR['facturai'],
								$filaR['facturaf'],
								$filaR['idreg'],
								$filaR['fcierre']));

}

?>