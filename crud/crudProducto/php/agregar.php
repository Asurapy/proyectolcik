<?php

if(!empty($_POST)){
	if(isset($_POST["name"]) &&isset($_POST["lastname"]) &&isset($_POST["email"]) &&isset($_POST["address"]) &&isset($_POST["phone"]) &&isset($_POST["sector"]) &&isset($_POST["estado"])){
		if($_POST["name"]!=""&& $_POST["lastname"]!=""&&$_POST["address"]!=""&&$_POST["sector"]!=""){
			include "conexion.php";
			
			$sql = "insert into producto(descripcion,precioUnitario,precioCosto,cantidad,codigoIva,codigoSector,estado,created_at) value (\"$_POST[name]\",\"$_POST[lastname]\",\"$_POST[email]\",\"$_POST[address]\",\"$_POST[phone]\",\"$_POST[sector]\",\"$_POST[estado]\",NOW())";
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