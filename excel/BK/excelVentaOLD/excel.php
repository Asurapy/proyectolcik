<?php
$connect = mysqli_connect("localhost", "root", "", "inkesa");
if(isset(($_POST["pf1"]) && isset($_POST["pf2"])))
$sql = "SELECT * FROM compras where fecpro between pf1 and pf2";  
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
       <th>Total Guaranies</th>
       <th>Nombre del Cliente</th>
                    </tr>
     <?php
     while($row = mysqli_fetch_array($result))  
     {  
        echo '  
       <tr>  
         <td>'.$row["pref1"].'</td>  
         <td>'.$row["pref2"].'</td>  
         <td>'.$row["nrodoc"].'</td>  
         <td>'.$row["totdoc"].'</td>  
         <td>'.$row["nompro"].'</td>
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
