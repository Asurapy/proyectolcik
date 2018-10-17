<?php

if(!empty($_POST)){
	if(isset($_POST["name"]) &&isset($_POST["lastname"]) &&isset($_POST["email"]) &&isset($_POST["address"]) &&isset($_POST["phone"]) &&isset($_POST["grupo"]) &&isset($_POST["estado"])){
		if($_POST["name"]!=""&& $_POST["lastname"]!=""&&$_POST["address"]!=""&&$_POST["grupo"]!=""){
			include "conexion.php";
			
			$sql = "insert into proveedor(descripcion,ruc,telefono,direccion,email,	codigoGrupo,estado,created_at) value (\"$_POST[name]\",\"$_POST[lastname]\",\"$_POST[email]\",\"$_POST[address]\",\"$_POST[phone]\",\"$_POST[grupo]\",\"$_POST[estado]\",NOW())";
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