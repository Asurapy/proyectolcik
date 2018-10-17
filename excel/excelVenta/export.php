<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "tesis");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM ventasbk where year(fecfac) = 2017";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>Pf1</th>  
                         <th>pf2</th>  
                         <th>Numero Factura</th>  
       <th>Total Documento</th>
       <th>Iva</th>
       <th>Nombre Cliente</th>
       <th>Fecha Facturacion</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["pf1"].'</td>  
                         <td>'.$row["pf2"].'</td>  
                         <td>'.$row["nrodoc"].'</td>  
       <td>'.$row["tdto10"].'</td>  
       <td>'.$row["iva10"].'</td>
       <td>'.$row["nomcli"].'</td>
       <td>'.$row["fecfac"].'</td>
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Compras.xls');
  echo $output;
 }
}
?>