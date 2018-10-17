<?php

if(!empty($_POST)){
	if(isset($_POST["name"]) &&isset($_POST["tasa"])){
		if($_POST["name"]!=""&& $_POST["tasa"]!=""){
			include "conexion.php";
			
			$sql = "insert into iva(name,tasa,created_at) value (\"$_POST[name]\",\"$_POST[tasa]\",NOW())";
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Agregado exitosamente.\");window.location='../ver.php';</script>";
			}else{
				print "<script>alert(\"No se pudo agregar.\");window.location='../ver.php';</script>";

			}
		}
	}
}



?>