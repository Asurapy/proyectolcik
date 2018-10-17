<?php

if(strlen($_GET['desde'])>0 and strlen($_GET['hasta'])>0){
	$desde = $_GET['desde'];
	$hasta = $_GET['hasta'];

	$verDesde = date('d/m/Y', strtotime($desde));
	$verHasta = date('d/m/Y', strtotime($hasta));
}else{
	$desde = '1111-01-01';
	$hasta = '9999-12-30';

	$verDesde = '__/__/____';
	$verHasta = '__/__/____';
}
require('../fpdf/fpdf.php');
require('conexion.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$pdf->Image('../recursos/tienda.gif' , 10 ,8, 10 , 13,'GIF');
$pdf->Cell(18, 10, '', 0);
$pdf->Cell(150, 10, 'listado de facturas compras', 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(50, 10, 'Hoy: '.date('d-m-Y').'', 0);
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(70, 8, '', 0);
$pdf->Cell(100, 8, 'LISTADO DE CIERRE', 0);
$pdf->Ln(10);
$pdf->Cell(60, 8, '', 0);
$pdf->Cell(100, 8, 'Desde: '.$verDesde.' hasta: '.$verHasta, 0);
$pdf->Ln(23);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(15, 8, 'Id.', 0);
$pdf->Cell(20, 8, 'Numero Cierre', 0);
$pdf->Cell(20, 8, 'Factura Inicial', 0);
$pdf->Cell(20, 8, 'Factura Final', 0);
$pdf->Cell(20, 8, 'Remision Inicial', 0);
$pdf->Cell(30, 8, 'Remision Final', 0);
$pdf->Cell(30, 8, 'Usuario', 0);
$pdf->Cell(30, 8, 'Fech. Registro', 0);
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);
//CONSULTA

$res = "SELECT * FROM cierreplaya WHERE fcierre BETWEEN '$desde' AND '$hasta'";
$productos = $conexion->query($res);

$item = 0;
$totaluni = 0;
$totaldis = 0;
while($productos2 = mysqli_fetch_array($productos)){
	$item = $item+1;
	//$totaluni = $totaluni + $productos2['totdoc'];
	//$totaldis = $totaldis + $productos2['vtaiva10'];
	$pdf->Cell(15, 8, $item, 0);
	$pdf->Cell(20, 8,$productos2['ncierre'], 0);
	$pdf->Cell(20, 8, $productos2['facturai'], 0);
	$pdf->Cell(20, 8, $productos2['facturaf'], 0);
	$pdf->Cell(20, 8, $productos2['remii'], 0);
	$pdf->Cell(30, 8, 'Gs/. '.$productos2['remif'], 0);
	$pdf->Cell(30, 8, 'Gs/. '.$productos2['usuario'], 0);
	$pdf->Cell(30, 8, date('d/m/Y', strtotime($productos2['fcierre'])), 0);
	$pdf->Ln(8);
}
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(104,8,'',0);
//$pdf->Cell(25,14,'Total Unitario: '.$totaluni '.GS',0);
//$pdf->Ln(8);
//$pdf->Cell(25,14,'Total Dist: S/. '.$totaldis,0);

$pdf->Output('reporte.pdf','D');
?>