<?php
$connect = mysqli_connect("localhost", "root", "", "tesis");//Configurar los datos de conexion
$columns = array('nrodoc','codpro', 'tipaju', 'leyend', 'cantidad', 'exiant','exiact', 'fecdoc');

$query = "SELECT * FROM transferencia WHERE ";

if($_POST["is_date_search"] == "yes")
{
 $query .= 'fecdoc BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';
}

if(isset($_POST["search"]["value"]))
{
 $query .= '
  (nrodoc LIKE "%'.$_POST["search"]["value"].'%" 
  OR tipaju LIKE "%'.$_POST["search"]["value"].'%" 
  OR leyend LIKE "%'.$_POST["search"]["value"].'%" 
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
 $query .= 'ORDER BY nrodoc DESC ';
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
 $fecha=date("d/m/Y", strtotime($row["fecdoc"]));			
 $sub_array = array();
 $sub_array[] = $row["nrodoc"];
  $sub_array[] = $row["codpro"];
 $sub_array[] = $row["tipaju"];
 $sub_array[] = $row["leyend"];
 $sub_array[] = $row["cantidad"];
 $sub_array[] = $row["exiant"];
  $sub_array[] = $row["exiact"];
 $sub_array[] = $fecha;
 
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM transferencia";
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