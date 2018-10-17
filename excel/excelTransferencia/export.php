<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "tesis");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM transferencia where year(fecdoc) = 2018";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>Numero Documento</th> 
                         <th>Fecha Documento</th>  
                         <th>Codigo</th>  
       <th>Tipo Ajuste</th>
       <th>Leyenda</th>
       <th>Cantidad</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["nrodoc"].'</td>  
                         <td>'.$row["fecdoc"].'</td>  
                         <td>'.$row["codpro"].'</td>  
       <td>'.$row["tipaju"].'</td>  
       <td>'.$row["leyend"].'</td>
       <td>'.$row["cantidad"].'</td>
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Transferencia.xls');
  echo $output;
 }
}
?>