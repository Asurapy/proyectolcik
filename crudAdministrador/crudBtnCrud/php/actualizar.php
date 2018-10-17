<?php

if(!empty($_POST)){
	if(isset($_POST["name"]) &&isset($_POST["lastname"]) &&isset($_POST["email"]) &&isset($_POST["address"]) &&isset($_POST["phone"]) &&isset($_POST["grupo"]) &&isset($_POST["sector"]) &&isset($_POST["pago"]) &&isset($_POST["accion"]) &&isset($_POST["grupo2"])){
		if($_POST["name"]!=""&& $_POST["lastname"]!=""&&$_POST["address"]!=""){
			include "conexion.php";
			
			$sql = "update usuario set crudUsuario=\"$_POST[name]\",crudNivel=\"$_POST[lastname]\",crudImpuesto=\"$_POST[email]\",crudProducto=\"$_POST[address]\",crudProveed=\"$_POST[phone]\",crudCliente=\"$_POST[grupo]\",crudSector=\"$_POST[sector]\",crudPago=\"$_POST[pago]\",crudAccion=\"$_POST[accion]\",crudGrupo=\"$_POST[grupo2]\" where id=".$_POST["id"];
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