<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "tesis");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM cierreplaya where year(fcierre) = 2018";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>Numero Cierre</th> 
                         <th>Fecha Cierre</th>  
                         <th>Factura Inicial</th>  
       <th>Factura Final</th>
       <th>Remision Inicial</th>
       <th>Remision Final</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["ncierre"].'</td>  
                         <td>'.$row["fcierre"].'</td>  
                         <td>'.$row["facturai"].'</td>  
       <td>'.$row["facturaf"].'</td>  
       <td>'.$row["remii"].'</td>
       <td>'.$row["remif"].'</td>
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=CierrePlaya.xls');
  echo $output;
 }
}
?>