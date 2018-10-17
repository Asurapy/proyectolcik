<?php
$connect = mysqli_connect("localhost", "root", "", "tesis");//Configurar los datos de conexion
$columns = array('nroctacte','codcli', 'importe', 'saldodoc', 'nrodoc', 'tipdoc','fecdoc', 'fecvto');

$query = "SELECT * FROM ctasctes WHERE ";

if($_POST["is_date_search"] == "yes")
{
 $query .= 'fecvto BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';
}

if(isset($_POST["search"]["value"]))
{
 $query .= '
  (nroctacte LIKE "%'.$_POST["search"]["value"].'%" 
  OR tipdoc LIKE "%'.$_POST["search"]["value"].'%" 
  OR nrodoc LIKE "%'.$_POST["search"]["value"].'%" 
  OR codcli LIKE "%'.$_POST["search"]["value"].'%")
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY fecvto DESC ';
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
 $fecha=date("d/m/Y", strtotime($row["fecvto"]));			
 $sub_array = array();
 $sub_array[] = $row["nroctacte"];
  $sub_array[] = $row["codcli"];
 $sub_array[] = $row["importe"];
 $sub_array[] = $row["saldodoc"];
 $sub_array[] = $row["nrodoc"];
 $sub_array[] = $row["tipdoc"];
  $sub_array[] = $row["fecdoc"];
 $sub_array[] = $fecha;
 
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM ctasctes";
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