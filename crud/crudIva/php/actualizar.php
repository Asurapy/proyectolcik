<?php

if(!empty($_POST)){
	if(isset($_POST["name"]) &&isset($_POST["tasa"])){
		if($_POST["name"]!=""&& $_POST["tasa"]!=""){
			include "conexion.php";
			
			$sql = "update iva set name=\"$_POST[name]\",tasa=\"$_POST[tasa]\" where id=".$_POST["id"];
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Actualizado exitosamente.\");window.location='../ver.php';</script>";
			}else{
				print "<script>alert(\"No se pudo actualizar.\");window.location='../ver.php';</script>";

			}
		}
	}
}



?>