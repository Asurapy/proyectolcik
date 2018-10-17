<?php
$connect = mysqli_connect("localhost", "root", "", "tesis");
$sql = "SELECT * FROM transferencia where year(fecdoc) = 2018";  
$result = mysqli_query($connect, $sql);
?>
<html>  
 <head>  
  <title>Para Pasar de MySQL A Excel</title>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
 </head>  
 <body>  
  <div class="container">  
   <br />  
   <br />  
   <br />  
   <div class="table-responsive">  
    <h2 align="center">Para Pasar de MySQL A Excel</h2><br /> 
    <table class="table table-bordered">
     <tr>  
                         <th>Pf1</th>  
                         <th>Pf2</th>  
                         <th>Nro Factura</th>  
       <th>Total Documento</th>
       <th>Iva</th>
       <th>Fecha Facturacion</th>
                    </tr>
     <?php
     while($row = mysqli_fetch_array($result))  
     {  
        echo '  
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
     ?>
    </table>
    <br />
    <form method="post" action="export.php">
     <input type="submit" name="export" class="btn btn-success" value="Export" />
    </form>
   </div>  
  </div>  
 </body>  
</html>
