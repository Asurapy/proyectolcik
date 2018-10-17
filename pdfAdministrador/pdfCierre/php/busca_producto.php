<?php
include('conexion.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA
$res = "SELECT * FROM cierreplaya WHERE ncierrre LIKE '%$dato%' OR facturai LIKE '%$dato%' ORDER BY fcierre DESC";
$registro = $conexion->query($res);

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
            	<th width="350">Numero Cierre</th>
                <th width="50">Factura Inicial</th>
                <th width="50">Factura Final</th>
                <th width="75">Remision Inicial</th>
                <th width="150">Remision Final</th>
                <th width="150">Usuario</th>
                <th width="150">Fecha Registro</th>
            </tr>';
if(mysqli_num_rows($registro)>0){
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
				<td>'.$registro2['ncierre'].'</td>
				<td>'.$registro2['facturai'].'</td>
				<td>'.$registro2['facturaf'].'</td>
				<td>'.$registro2['remii'].'</td>
				<td>Gs/. '.$registro2['remif'].'</td>
				<td>Gs/. '.$registro2['usuario'].'</td>
				<td>'.fechaNormal($registro2['fcierre']).'</td>
				</tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>