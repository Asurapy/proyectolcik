<?php
include "conexion.php";

$user_id=null;
$sql1= "select * from usuario where  id = ".$_GET["id"];
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
    <label for="name">ABM Usuario</label>
    <input type="number" class="form-control" value="<?php echo $person->crudUsuario; ?>" name="name" required>
  </div>
  <div class="form-group">
    <label for="lastname">ABM Nivel</label>
    <input type="number" class="form-control" value="<?php echo $person->crudNivel; ?>" name="lastname" required>
  </div>
  <div class="form-group">
    <label for="address">ABM Impuesto</label>
    <input type="number" class="form-control" value="<?php echo $person->crudImpuesto; ?>" name="address" required>
  </div>
  <div class="form-group">
    <label for="email">ABM Producto</label>
    <input type="number" class="form-control" value="<?php echo $person->crudProducto; ?>" name="email" required>
  </div>
  <div class="form-group">
    <label for="phone">ABM Proveedor</label>
    <input type="number" class="form-control" value="<?php echo $person->crudProveed; ?>" name="phone" required>
  </div>
  <div class="form-group">
     <label for="grupo">ABM Cliente</label>
     <input type="number" class="form-control" name="grupo">
  </div>
  <div class="form-group">
     <label for="sector">ABM Sector</label>
     <input type="number" class="form-control" name="sector">
  </div>
  <div class="form-group">
     <label for="pago">ABM Pago</label>
     <input type="number" class="form-control" name="pago">
  </div>
  <div class="form-group">
     <label for="accion">ABM Accion</label>
     <input type="number" class="form-control" name="accion">
  </div>
  <div class="form-group">
     <label for="grupo2">ABM Grupo</label>
     <input type="number" class="form-control" name="grupo2">
  </div>
<input type="hidden" name="id" value="<?php echo $person->codigoProveed; ?>">
  <button type="submit" class="btn btn-default">Actualizar</button>
</form>
<?php else:?>
  <p class="alert alert-danger">404 No se encuentra</p>
<?php endif;?>