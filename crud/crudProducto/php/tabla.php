<?php

include "conexion.php";

$user_id=null;
$sql1= "select * from producto";
$query = $con->query($sql1);
?>

<?php if($query->num_rows>0):?>
<div class="table-responsive">
<table class="table table-bordered table-hover">
<thead>
	<th>Descripcion</th>
	<th>Precio Unitario</th>
	<th>Precio Costo</th>
	<th>Cantidad</th>
	<th>Codigo Sector</th>
	<th></th>
</thead>
<?php while ($r=$query->fetch_array()):?>
<tr>
	<td><?php echo $r["descripcion"]; ?></td>
	<td><?php echo $r["precioUnitario"]; ?></td>
	<td><?php echo $r["precioCosto"]; ?></td>
	<td><?php echo $r["cantidad"]; ?></td>
	<td><?php echo $r["codigoSector"]; ?></td>
	<td style="width:150px;">
		<a href="./editar.php?id=<?php echo $r["codigoProducto"];?>" class="btn btn-sm btn-warning">Editar</a>
		<a href="#" id="del-<?php echo $r["codigoProducto"];?>" class="btn btn-sm btn-danger">Eliminar</a>
		<script>
		$("#del-"+<?php echo $r["codigoProducto"];?>).click(function(e){
			e.preventDefault();
			p = confirm("Estas seguro?");
			if(p){
				window.location="./php/eliminar.php?id="+<?php echo $r["codigoProducto"];?>;

			}

		});
		</script>
	</td>
</tr>
<?php endwhile;?>
</table>
</div>
<?php else:?>
	<p class="alert alert-warning">No hay resultados</p>
<?php endif;?>
