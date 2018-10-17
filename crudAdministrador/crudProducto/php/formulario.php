<?php
include "conexion.php";

$user_id=null;
$sql1= "select * from producto where codigoProducto = ".$_GET["id"];
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
    <label for="name">Descripcion</label>
    <input type="text" class="form-control" value="<?php echo $person->descripcion; ?>" name="name" required>
  </div>
  <div class="form-group">
    <label for="lastname">Precio Unitario</label>
    <input type="text" class="form-control" value="<?php echo $person->precioUnitario; ?>" name="lastname" required>
  </div>
  <div class="form-group">
    <label for="address">Precio Costo</label>
    <input type="text" class="form-control" value="<?php echo $person->precioCosto; ?>" name="address" required>
  </div>
  <div class="form-group">
    <label for="email">Cantidad</label>
    <input type="text" class="form-control" value="<?php echo $person->cantidad; ?>" name="email" >
  </div>
  <div class="form-group">
    <label for="phone">Codigo Iva</label>
    <input type="text" class="form-control" value="<?php echo $person->codigoIva; ?>" name="phone" required>
  </div>
  <div class="form-group">
    <label for="sector">Codigo Sector</label>
    <input type="text" class="form-control" value="<?php echo $person->codigoSector; ?>" name="sector" required>
  </div>
  <div class="form-group">
    <label for="estado">Estado</label>
    <input type="text" class="form-control" value="<?php echo $person->estado; ?>" name="estado" required>
  </div>
<input type="hidden" name="id" value="<?php echo $person->codigoProducto; ?>">
  <button type="submit" class="btn btn-default">Actualizar</button>
</form>
<?php else:?>
  <p class="alert alert-danger">404 No se encuentra</p>
<?php endif;?>