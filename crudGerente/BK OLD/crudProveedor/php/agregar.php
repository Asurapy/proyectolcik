<?php

if(!empty($_POST)){
	if(isset($_POST["name"]) &&isset($_POST["lastname"]) &&isset($_POST["email"]) &&isset($_POST["address"]) &&isset($_POST["phone"]) &&isset($_POST["grupo"]) &&isset($_POST["estado"])){
		if($_POST["name"]!=""&& $_POST["lastname"]!=""&&$_POST["address"]!=""&&$_POST["grupo"]!=""){
			include "conexion.php";
            $found=false;
			$sql1= "select * from proveedor where descripcion=\"$_POST[name]\" o ruc=\"$_POST[lastname]\"";
			$query = $con->query($sql1);
			while ($r=$query->fetch_array()) {
				$found=true;
				break;
			}
			if($found){
				print "<script>alert(\"Producto Ya Registrado en el Sistema.\");window.location='../ver.php';</script>";
			}else{
			   $sql = "insert into proveedor(descripcion,ruc,telefono,direccion,email,codigoGrupo,estado,created_at) value (\"$_POST[name]\",\"$_POST[lastname]\",\"$_POST[email]\",\"$_POST[address]\",\"$_POST[phone]\",\"$_POST[grupo]\",\"$_POST[estado]\",NOW())";
			   $query = $con->query($sql);
			   if($query!=null){
				  print "<script>alert(\"Agregado exitosamente.\");window.location='../ver.php';</script>";
			   }else{
				  print "<script>alert(\"No se pudo agregar.\");window.location='../ver.php';</script>";
               }
			}
		}
	}
}



?>