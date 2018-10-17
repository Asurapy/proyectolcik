<?php

if(!empty($_POST)){
	if(isset($_POST["username"]) &&isset($_POST["fullname"]) &&isset($_POST["email"]) &&isset($_POST["password"]) &&isset($_POST["confirm_password"]) &&isset($_POST["nivel"])){
		if($_POST["username"]!=""&& $_POST["fullname"]!=""&&$_POST["email"]!=""&&$_POST["password"]!=""&&$_POST["password"]==$_POST["confirm_password"]&&$_POST["nivel"]!=""){
			include "conexion.php";
			$found=false;
			$pas = md5($_POST["password"]);
			echo "$pas";
			$sql1= "select * from usuario where username=\"$_POST[username]\" or email=\"$_POST[email]\"";
			$query = $con->query($sql1);
			while ($r=$query->fetch_array()) {
				$found=true;
				break;
			}
			if($found){
				print "<script>alert(\"Nombre de usuario o email ya estan registrados.\");window.location='../menuGerente.php';</script>";
			}
			$sql = "insert into usuario(username,fullname,email,password,nivel,created_at) value (\"$_POST[username]\",\"$_POST[fullname]\",\"$_POST[email]\",\"$pas\",\"$_POST[nivel]\",NOW())";
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Registro exitoso. \");window.location='../menuGerente.php';</script>";
			}
		}
	}
}



?>