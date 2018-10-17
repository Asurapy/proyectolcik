<?php

if(!empty($_POST)){
	if(isset($_POST["name"])){
		if($_POST["name"]!=""){
			include "conexion.php";
			
			$sql = "insert tipoajuste (name,created_at) value (\"$_POST[name]\",NOW())";
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