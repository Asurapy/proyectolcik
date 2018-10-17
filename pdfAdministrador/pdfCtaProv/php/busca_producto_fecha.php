<?php
include('conexion.php');

$desde = $_POST['desde'];
$hasta = $_POST['hasta'];

//COMPROBAMOS QUE LAS FECHAS EXISTAN
if(isset($desde)==false){
	$desde = $hasta;
}

if(isset($hasta)==false){
	$hasta = $desde;
}

//EJECUTAMOS LA CONSULTA DE BUSQUEDA
$res = "SELECT * FROM ctasprov WHERE fecvto BETWEEN '$desde' AND '$hasta' ORDER BY fecvto DESC";
$registro = $conexion->query($res);

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
            	<th width="350">Codigo de Proveedor</th>
                <th width="50">Pf1</th>
                <th width="50">Pf2</th>
                <th width="75">Numero Documento</th>
                <th width="150">Importe a Pagar</th>
                <th width="150">Tipo de Documento</th>
                <th width="150">Fecha Vencimiento</th>
            </tr>';
if(mysqli_num_rows($registro)>0){
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
				<td>'.$registro2['codpro'].'</td>
				<td>'.$registro2['pref1'].'</td>
				<td>'.$registro2['pref2'].'</td>
				<td>'.$registro2['nrodoc'].'</td>
				<td>Gs/. '.$registro2['importe'].'</td>
				<td>Gs/. '.$registro2['tipodoc'].'</td>
				<td>'.fechaNormal($registro2['fecvto']).'</td>
				</tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>