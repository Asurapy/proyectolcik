<?php
include "conexion.php";

$user_id=null;
$sql1= "select * from proveedor where codigoProveed = ".$_GET["id"];
$query = $con->query($sql1);
$person = null;
if($query->num_rows>0){
while ($r=$query->fetch_object()){
  $person=$r;
  break;
}

  }
?>

<?php if($person!=null):?>

<form role="form" method="post" action="php/actualizar.php">
  <div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" class="form-control" value="<?php echo $person->descripcion; ?>" name="name" required>
  </div>
  <div class="form-group">
    <label for="lastname">Ruc</label>
    <input type="text" class="form-control" value="<?php echo $person->ruc; ?>" name="lastname" required>
  </div>
  <div class="form-group">
    <label for="address">Telefono</label>
    <input type="text" class="form-control" value="<?php echo $person->telefono; ?>" name="address" required>
  </div>
  <div class="form-group">
    <label for="email">Direccion</label>
    <input type="text" class="form-control" value="<?php echo $person->direccion; ?>" name="email" >
  </div>
  <div class="form-group">
    <label for="phone">Email</label>
    <input type="email" class="form-control" value="<?php echo $person->email; ?>" name="phone" >
  </div>
  <div class="form-group">
    <label for="grupo">Codigo Grupo</label>
    <input type="text" class="form-control" value="<?php echo $person->codigoGrupo; ?>" name="email" >
  </div>
  <div class="form-group">
    <label for="estado">Estado</label>
    <input type="text" class="form-control" value="<?php echo $person->estado; ?>" name="estado" >
  </div>
<input type="hidden" name="id" value="<?php echo $person->id; ?>">
  <button type="submit" class="btn btn-default">Actualizar</button>
</form>
<?php else:?>
  <p class="alert alert-danger">404 No se encuentra</p>
<?php endif;?>