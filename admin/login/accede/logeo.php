<?php
if(!empty($_POST)){
	$lincodU = strtoupper($_POST["userazatrade"]);
	$lincodP = $_POST["passazatrade"];
	//echo"$lincodU - $lincodP";
	if(isset($lincodU) &&isset($_POST["passazatrade"])){
		if($lincodU!=""&&$_POST["passazatrade"]!=""){
			include("../../incBD/inibd.php");
			
			$codaza_id=null;
			$sql1= "select * from usuario where (login_usuario='$lincodU' and password_usuario='$lincodP' and estado='A' and very='1') ";
			$queryv=$conexpg->query($sql1); 
if($queryv->num_rows>0){ 
while($rowde=$queryv->fetch_array()){ 
			/*$rsde = pg_query($conexpg,$sql1);
if (pg_num_rows($rsde) > 0){
	while($rowde = pg_fetch_array($rsde)){*/
		$codaza_id = $rowde["codusuario"];
		$codaza_nombres = $rowde["nombre"];
		$codaza_coreo = $rowde["mail"];
		$codaza_ape = $rowde["apellido"];
		$codaza_movil = $rowde["celular"];
		$codaza_direc = $rowde["direccion"];
		$codaza_perfil = $rowde["perfil"];
		$codaza_nivel = $rowde["nivel"];
		$codaza_rol = $rowde["rol"];
		$codaza_logi = $rowde["login_usuario"];
		
		//echo"$codaza_nombres xx - $codaza_ape sss";
	}
			}
			if($codaza_id==null){
				print "<script>alert(\"Acceso invalido  Usuario o Clave Incorrectos.\");window.location='../../login/';</script>";
			}else{
		//obtenemos fecha y hora actual
		date_default_timezone_set("America/Lima");
        $fechahoydia = date("Y-m-d");
		//consultamos pago de acceso
		$sqlpago = "SELECT id_acceso, id_user, nom_user, nombres, monto, tipo_pago, fecha_pago, modo_pago, num_operacion, observacion, fe_activa, fe_vence, estado, fe_registro
FROM pagos_acceso
WHERE id_user = '".$codaza_id."' AND estado = 'Activo'";
				$queryp=$conexpg->query($sqlpago); 
if($queryp->num_rows>0){ 
while($rowpago=$queryp->fetch_array()){ 
		/*$rspago = pg_query($conexpg,$sqlpago);
if (pg_num_rows($rspago) > 0){
	while($rowpago = pg_fetch_array($rspago)){*/
		$codactipago = $rowpago["id_acceso"];
		$useactipago = $rowpago["id_user"];
		$feactiven = $rowpago["fe_vence"];
		$siacce = "SI";
		//actualizamos registro si ya vencio
		if($fechahoydia > $feactiven){
		$updateactua = "UPDATE pagos_acceso SET estado='Vencido' WHERE id_acceso='".$codactipago."' "; 
			$conexpg->query($updateactua);
 //$rs = pg_query($conexpg,$updateactua )or die("Error al actualizar datos");
			$siacce = "NO";
			}
		
	}
}else{
	$siacce = "NO";
}
		
		session_start();
		$_SESSION['codusuario'] = $codaza_id;
		$_SESSION['nombreaza'] = $codaza_nombres;
		$_SESSION['mail'] = $codaza_coreo;
		$_SESSION['apellido'] = $codaza_ape;
		$_SESSION['celular'] = $codaza_movil;
		$_SESSION['direccion'] = $codaza_direc;
		$_SESSION['perfil'] = $codaza_perfil;
		$_SESSION['nivel'] = $codaza_nivel;
		$_SESSION['rol'] = $codaza_rol;
		$_SESSION['login_usuario'] = $codaza_logi;
		$_SESSION['acceso_pago'] = $siacce;
				
				/*obtenermos ip*/
				if($_SERVER["HTTP_X_FORWARDED_FOR"]) {
                 // El usuario navega a través de un proxy
                  $ip_proxy = $_SERVER["REMOTE_ADDR"]; // ip proxy
                  $ip_maquina = $_SERVER["HTTP_X_FORWARDED_FOR"]; // ip de la maquina
                 } else {
                 $ip_maquina = $_SERVER["REMOTE_ADDR"]; // No se navega por proxy
                 }
				
				//registramos datos de acceso si es diferente a administrador
				if($codaza_rol<>'Admin'){
					$G = date("G");
		            $date = date("Y-m-d")." ".date("$G:i:s");
                   $sqlii="insert into gente_online(codusuario,gen_onl_ip,gen_onl_dia) values($codaza_id,'$ip_maquina','$date')";
					$conexpg->query($sqlii);
					//pg_query($conexpg,$sqlii);
				}

				
				print "<script>window.location='../../';</script>";	


			}
		}
	}
}

mysqli_close($conexpg);

?>