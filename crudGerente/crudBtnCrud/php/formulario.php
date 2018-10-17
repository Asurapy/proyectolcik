<?php
include "conexion.php";

$user_id=null;
$sql1= "select * from usuario where id = ".$_GET["id"];
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
    <label for="name">ABM Impuesto</label>
    <input type="numeric" class="form-control" value="<?php echo $person->crudImpuesto ; ?>" name="name" required>
  </div>
  <div class="form-group">
    <label for="lastname">ABM Producto</label>
    <input type="numeric" class="form-control" value="<?php echo $person->crudProducto; ?>" name="lastname" required>
  </div>
  <div class="form-group">
    <label for="address">ABM Cliente</label>
    <input type="numeric" class="form-control" value="<?php echo $person->crudCliente; ?>" name="address" required>
  </div>
  <div class="form-group">
    <label for="email">ABM Proveedor</label>
    <input type="numeric" class="form-control" value="<?php echo $person->crudProveed; ?>" name="email" >
  </div>
  <div class="form-group">
    <label for="phone">ABM Gestion</label>
    <input type="numeric" class="form-control" value="<?php echo $person->crudUsuario; ?>" name="phone" >
  </div>
<input type="hidden" name="id" value="<?php echo $person->id; ?>">
  <button type="submit" class="btn btn-default">Actualizar</button>
</form>
<?php else:?>
  <p class="alert alert-danger">404 No se encuentra</p>
<?php endif;?>