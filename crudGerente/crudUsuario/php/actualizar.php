<?php

if(!empty($_POST)){
	if(isset($_POST["name"]) &&isset($_POST["lastname"])){
		if($_POST["name"]!=""&& $_POST["lastname"]!=""){
			include "conexion.php";
			
			$sql = "update usuario set username=\"$_POST[name]\",nivel=\"$_POST[lastname]\" where id=".$_POST["id"];
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