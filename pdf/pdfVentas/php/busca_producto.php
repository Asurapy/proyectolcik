<?php
include('conexion.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA
$res = "SELECT * FROM ventasbk WHERE nomcli LIKE '%$dato%' OR nrodoc LIKE '%$dato%' ORDER BY fecfac DESC";
$registro = $conexion->query($res);

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
            	<th width="350">Nombre</th>
                <th width="50">Pf1</th>
                <th width="50">Pf2</th>
                <th width="75">Numero Documento</th>
                <th width="150">Precio Unitario</th>
                <th width="150">Precio Distribuidor</th>
                <th width="150">Fecha Registro</th>
            </tr>';
if(mysqli_num_rows($registro)>0){
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
				<td>'.$registro2['nomcli'].'</td>
				<td>'.$registro2['pf1'].'</td>
				<td>'.$registro2['pf2'].'</td>
				<td>'.$registro2['nrodoc'].'</td>
				<td>Gs/. '.$registro2['totdoc'].'</td>
				<td>Gs/. '.$registro2['iva10'].'</td>
				<td>'.fechaNormal($registro2['fecfac']).'</td>
				</tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>