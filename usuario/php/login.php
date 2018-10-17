<?php

if(!empty($_POST)){
	if(isset($_POST["username"]) &&isset($_POST["password"])){
		if($_POST["username"]!=""&&$_POST["password"]!=""){
			include "conexion.php";
			
			$nivel=null;
			$username=null;
			$user_id=null;
			///BOTONES DE CRUD
			$crudProducto=null;
			$crudProveedor=null;
			$crudCliente=null;
			$crudUsuario=null;
			///////////////////////
            
            //BOTONES DE CONSULTAS
            $consultaCompra=null;
            $consultaVenta=null;
            $consultaMovim=null;
            $consultaCliente=null;
            $consultaProveedor=null;
            ////////////////////////////////////

			$pas = md5($_POST["password"]);
			$sql1= "select * from usuario where (username=\"$_POST[username]\" or email=\"$_POST[username]\") and password=\"$pas\" ";
			$query = $con->query($sql1);
			while ($r=$query->fetch_array()) {
				$user_id=$r["id"];

				//BOTONES DE CRUD
                $crudImpuesto=$r["crudImpuesto"];
                $crudProveedor=$r["crudProveed"];
                $crudProducto=$r["crudProducto"];
                $crudCliente=$r["crudCliente"];
                $crudUsuario=$r["crudUsuario"];
                //////////////////////////////////////////

                //BOTONES DE CONSULTA 
                $consultaCompra=$r["consultaCompra"];
                $consultaVenta=$r["consultaVenta"];
                $consultaMovim=$r["consultaMovim"];
                $consultaCliente=$r["consultaCliente"];
                $consultaProveedor=$r["consultaProveedor"];
                //////////////////////////////////////////////////

				$nivel=$r["nivel"];
				$username=$r["username"];
				break;
			}
			if($user_id==null and $nivel==null){
				print "<script>alert(\"Acceso invalido.\");window.location='../login.php';</script>";
			}elseif($nivel==1){
				session_start();
				$_SESSION["user_id"]=$user_id;
                //BOTONES DE CRUD
				if($crudImpuesto==1){
                  $_SESSION["crudImpuesto"]=$crudImpuesto;
				}elseif($crudImpuesto==0){
				   $crudImpuesto=null;
				   $_SESSION["crudImpuesto"]=$crudImpuesto;
				}

				if($crudProveedor==1){
                  $_SESSION["crudProveed"]=$crudProveedor;
				}elseif($crudImpuesto==0){
				   $crudImpuesto=null;
				   $_SESSION["crudProveed"]=$crudProveedor;
				}

				if($crudProducto==1){
                  $_SESSION["crudProducto"]=$crudProducto;
				}elseif($crudImpuesto==0){
				   $crudImpuesto=null;
				   $_SESSION["crudProducto"]=$crudProducto;
				}

				if($crudCliente==1){
                  $_SESSION["crudCliente"]=$crudCliente;
				}elseif($crudCliente==0){
				   $crudCliente=null;
				   $_SESSION["crudCliente"]=$crudCliente;
				}

				if($crudUsuario==1){
                  $_SESSION["crudUsuario"]=$crudUsuario;
				}elseif($crudUsuario==0){
				   $crudCliente=null;
				   $_SESSION["crudUsuario"]=$crudUsuario;
				}
                ////////////////////////////////////////////////////


                ////BOTNES DE CONSULTA
                if($consultaCompra==1){
                  $_SESSION["consultaCompra"]=$consultaCompra;
				}elseif($consultaCompra==0){
				   $consultaCompra=null;
				   $_SESSION["consultaCompra"]=$consultaCompra;
				}

				if($consultaVenta==1){
                  $_SESSION["consultaVenta"]=$consultaVenta;
				}elseif($crudImpuesto==0){
				   $consultaVenta=null;
				   $_SESSION["consultaVenta"]=$consultaVenta;
				}

				if($consultaMovim==1){
                  $_SESSION["consultaMovim"]=$consultaMovim;
				}elseif($crudImpuesto==0){
				   $crudImpuesto=null;
				   $_SESSION["consultaMovim"]=$consultaMovim;
				}

				if($consultaCliente==1){
                  $_SESSION["consultaCliente"]=$consultaCliente;
				}elseif($crudCliente==0){
				   $consultaCliente=null;
				   $_SESSION["consultaCliente"]=$consultaCliente;
				}

				if($consultaProveedor==1){
                  $_SESSION["consultaProveedor"]=$consultaProveedor;
				}elseif($consultaProveedor==0){
				   $crudCliente=null;
				   $_SESSION["consultaProveedor"]=$consultaProveedor;
				}
                /////////////////////////////////////////////////
				print "<script>window.location='http://localhost/tesis/usuario/menuGerente.php';</script>";				
			}elseif($nivel==2){
				session_start();
				$_SESSION["user_id"]=$user_id;
				//BOTONES DE CRUD
				if($crudImpuesto==1){
                  $_SESSION["crudImpuesto"]=$crudImpuesto;
				}elseif($crudImpuesto==0){
				   $crudImpuesto=null;
				   $_SESSION["crudImpuesto"]=$crudImpuesto;
				}

				if($crudProveedor==1){
                  $_SESSION["crudProveed"]=$crudProveedor;
				}elseif($crudImpuesto==0){
				   $crudImpuesto=null;
				   $_SESSION["crudProveed"]=$crudProveedor;
				}

				if($crudProducto==1){
                  $_SESSION["crudProducto"]=$crudProducto;
				}elseif($crudImpuesto==0){
				   $crudImpuesto=null;
				   $_SESSION["crudProducto"]=$crudProducto;
				}

				if($crudCliente==1){
                  $_SESSION["crudCliente"]=$crudCliente;
				}elseif($crudCliente==0){
				   $crudCliente=null;
				   $_SESSION["crudCliente"]=$crudCliente;
				}
				/////////////////////////////////////////////////////

                ////BOTNES DE CONSULTA
                if($consultaCompra==1){
                  $_SESSION["consultaCompra"]=$consultaCompra;
				}elseif($consultaCompra==0){
				   $consultaCompra=null;
				   $_SESSION["consultaCompra"]=$consultaCompra;
				}

				if($consultaVenta==1){
                  $_SESSION["consultaVenta"]=$consultaVenta;
				}elseif($crudImpuesto==0){
				   $consultaVenta=null;
				   $_SESSION["consultaVenta"]=$consultaVenta;
				}

				if($consultaMovim==1){
                  $_SESSION["consultaMovim"]=$consultaMovim;
				}elseif($crudImpuesto==0){
				   $crudImpuesto=null;
				   $_SESSION["consultaMovim"]=$consultaMovim;
				}

				if($consultaCliente==1){
                  $_SESSION["consultaCliente"]=$consultaCliente;
				}elseif($crudCliente==0){
				   $consultaCliente=null;
				   $_SESSION["consultaCliente"]=$consultaCliente;
				}

				if($consultaProveedor==1){
                  $_SESSION["consultaProveedor"]=$consultaProveedor;
				}elseif($consultaProveedor==0){
				   $crudCliente=null;
				   $_SESSION["consultaProveedor"]=$consultaProveedor;
				}
                /////////////////////////////////////////////////

				$_SESSION["username"]=$username;
				print "<script>window.location='http://localhost/tesis/usuario/menuAdministrativo.php';</script>";	
			}
		}
	}
}



?>