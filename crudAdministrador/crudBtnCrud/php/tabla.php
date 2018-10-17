<?php

include "conexion.php";

$user_id=null;
$sql1= "SELECT * FROM usuario, nivel where usuario.nivel = nivel.id";
$query = $con->query($sql1);
?>

<?php if($query->num_rows>0):?>
<div class="table-responsive">
<table class="table table-bordered table-hover">
<thead>
	<th>Usuario</th>
	<th>Email</th>
	<th>Nivel</th>
	<th>Descripcion Nivel</th>
	<th>Fecha Creacion</th>
	<th></th>
</thead>
<?php while ($r=$query->fetch_array()):?>
<tr>
	<td><?php echo $r["username"]; ?></td>
	<td><?php echo $r["email"]; ?></td>
	<td><?php echo $r["nivel"]; ?></td>
	<td><?php echo $r["descripcion"]; ?></td>
	<td><?php echo $r["created_at"]; ?></td>
	<td style="width:150px;">
		<a href="./editar.php?id=<?php echo $r["id"];?>" class="btn btn-sm btn-warning">Editar</a>
		<a href="#" id="del-<?php echo $r["id"];?>" class="btn btn-sm btn-danger">Eliminar</a>
		<script>
		$("#del-"+<?php echo $r["id"];?>).click(function(e){
			e.preventDefault();
			p = confirm("Estas seguro?");
			if(p){
				window.location="./php/eliminar.php?id="+<?php echo $r["id"];?>;

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
