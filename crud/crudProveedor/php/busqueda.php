<?php

include "conexion.php";

$user_id=null;
$sql1= "select * from proveedor where descripcion like '%$_GET[s]%' or 	ruc like '%$_GET[s]%' or telefono like '%$_GET[s]%' or direccion like '%$_GET[s]%' or email like '%$_GET[s]%' ";
$query = $con->query($sql1);
?>

<?php if($query->num_rows>0):?>
<table class="table table-bordered table-hover">
<thead>
	<th>Nombre</th>
	<th>Ruc</th>
	<th>Telefono/th>
	<th>Direccion</th>
	<th>Email</th>
	<th></th>
</thead>
<?php while ($r=$query->fetch_array()):?>
<tr>
	<td><?php echo $r["descripcion"]; ?></td>
	<td><?php echo $r["ruc"]; ?></td>
	<td><?php echo $r["telefono"]; ?></td>
	<td><?php echo $r["direccion"]; ?></td>
	<td><?php echo $r["email"]; ?></td>
	<td style="width:150px;">
		<a href="./editar.php?id=<?php echo $r["codigoProveed"];?>" class="btn btn-sm btn-warning">Editar</a>
		<a href="#" id="del-<?php echo $r["codigoProveed"];?>" class="btn btn-sm btn-danger">Eliminar</a>
		<script>
		$("#del-"+<?php echo $r["codigoProveed"];?>).click(function(e){
			e.preventDefault();
			p = confirm("Estas seguro?");
			if(p){
				window.location="./php/eliminar.php?id="+<?php echo $r["codigoProveed"];?>;

			}

		});
		</script>
	</td>
</tr>
<?php endwhile;?>
</table>
<?php else:?>
	<p class="alert alert-warning">No hay resultados</p>
<?php endif;?>
