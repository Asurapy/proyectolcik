<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "inkesa");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM producto";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>Codigo</th>  
                         <th>Descripcion</th>  
                         <th>Precio Unitario</th>  
       <th>Precio Costo</th>
       <th>Existencia</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["codpro"].'</td>  
                         <td>'.$row["descri"].'</td>  
                         <td>'.$row["punit"].'</td>  
       <td>'.$row["pcosto"].'</td>  
       <td>'.$row["exist1"].'</td>
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