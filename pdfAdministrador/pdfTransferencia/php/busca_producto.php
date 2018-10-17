<?php
include('conexion.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA
$res = "SELECT * FROM transferencia WHERE usuario LIKE '%$dato%' OR nrodoc LIKE '%$dato%' ORDER BY fecfac DESC";
$registro = $conexion->query($res);

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
            	<th width="350">Numero Documento</th>
                <th width="50">Codigo Producto</th>
                <th width="50">Cantidad Transferida</th>
                <th width="75">Existencia anterior</th>
                <th width="150">Existencia Actual</th>
                <th width="150">Usuario</th>
                <th width="150">Fecha Registro</th>
            </tr>';
if(mysqli_num_rows($registro)>0){
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
				<td>'.$registro2['nrodoc'].'</td>
				<td>'.$registro2['codpro'].'</td>
				<td>'.$registro2['cantidad'].'</td>
				<td>'.$registro2['exiant'].'</td>
				<td>Gs/. '.$registro2['exiact'].'</td>
				<td>Gs/. '.$registro2['usuario'].'</td>
				<td>'.fechaNormal($registro2['fecdoc']).'</td>
				</tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>