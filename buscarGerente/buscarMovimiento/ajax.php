<?php
$connect = mysqli_connect("localhost", "root", "", "tesis");//Configurar los datos de conexion
$columns = array('idturno','codpro', 'descri', 'inicial', 'salida', 'fechaproc','usuario', 'idreg');

$query = "SELECT * FROM movicombus WHERE ";

if($_POST["is_date_search"] == "yes")
{
 $query .= 'fechaproc BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';
}

if(isset($_POST["search"]["value"]))
{
 $query .= '
  (idturno LIKE "%'.$_POST["search"]["value"].'%" 
  OR descri LIKE "%'.$_POST["search"]["value"].'%" 
  OR usuario LIKE "%'.$_POST["search"]["value"].'%" 
  OR codpro LIKE "%'.$_POST["search"]["value"].'%")
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY idturno DESC ';
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
 $fecha=date("d/m/Y", strtotime($row["fechaproc"]));			
 $sub_array = array();
 $sub_array[] = $row["idturno"];
  $sub_array[] = $row["codpro"];
 $sub_array[] = $row["descri"];
 $sub_array[] = $row["inicial"];
 $sub_array[] = $row["salida"];
 $sub_array[] = $row["usuario"];
  $sub_array[] = $row["idreg"];
 $sub_array[] = $fecha;
 
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM movicombus";
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