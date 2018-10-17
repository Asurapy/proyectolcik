<?php

if(!empty($_POST)){
	if(isset($_POST["name"]) &&isset($_POST["lastname"]) &&isset($_POST["email"]) &&isset($_POST["address"]) &&isset($_POST["phone"]) &&isset($_POST["grupo"]) &&isset($_POST["estado"])){
		if($_POST["name"]!=""&& $_POST["lastname"]!=""&&$_POST["address"]!=""){
			include "conexion.php";
			
			$sql = "update proveedor set descripcion=\"$_POST[name]\",ruc=\"$_POST[lastname]\",telefono=\"$_POST[email]\",direccion=\"$_POST[address]\",email=\"$_POST[phone]\",estado=\"$_POST[estado]\" where 	codigoProvee=".$_POST["id"];
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