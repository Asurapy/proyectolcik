<?php
$connect = mysqli_connect("localhost", "root", "", "tesis");//Configurar los datos de conexion
$columns = array('ncierre','facturai', 'facturaf', 'remii', 'remif', 'usuario','idreg', 'fcierre');

$query = "SELECT * FROM cierreplaya WHERE ";

if($_POST["is_date_search"] == "yes")
{
 $query .= 'fcierre BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';
}

if(isset($_POST["search"]["value"]))
{
 $query .= '
  (ncierre LIKE "%'.$_POST["search"]["value"].'%" 
  OR facturai LIKE "%'.$_POST["search"]["value"].'%" 
  OR facturaf LIKE "%'.$_POST["search"]["value"].'%" 
  OR remii LIKE "%'.$_POST["search"]["value"].'%")
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY ncierre DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $fecha=date("d/m/Y", strtotime($row["fcierre"]));			
 $sub_array = array();
 $sub_array[] = $row["ncierre"];
  $sub_array[] = $row["facturai"];
 $sub_array[] = $row["facturaf"];
 $sub_array[] = $row["remii"];
 $sub_array[] = $row["remif"];
 $sub_array[] = $row["usuario"];
  $sub_array[] = $row["idreg"];
 $sub_array[] = $fecha;
 
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM cierreplaya";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>