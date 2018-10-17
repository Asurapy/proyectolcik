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
    <label for="name">Consulta Compra</label>
    <input type="numeric" class="form-control" value="<?php echo $person->consultaCompra ; ?>" name="name" required>
  </div>
  <div class="form-group">
    <label for="lastname">Consulta Venta</label>
    <input type="numeric" class="form-control" value="<?php echo $person->consultaVenta; ?>" name="lastname" required>
  </div>
  <div class="form-group">
    <label for="address">Consulta Cliente</label>
    <input type="numeric" class="form-control" value="<?php echo $person->consultaCliente; ?>" name="address" required>
  </div>
  <div class="form-group">
    <label for="email">Consulta Proveedor</label>
    <input type="numeric" class="form-control" value="<?php echo $person->consultaProveedor; ?>" name="email" >
  </div>
  <div class="form-group">
    <label for="phone">Consulta Movimiento</label>
    <input type="numeric" class="form-control" value="<?php echo $person->consultaMovim; ?>" name="phone" >
  </div>
<input type="hidden" name="id" value="<?php echo $person->id; ?>">
  <button type="submit" class="btn btn-default">Actualizar</button>
</form>
<?php else:?>
  <p class="alert alert-danger">404 No se encuentra</p>
<?php endif;?>