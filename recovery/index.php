<?php
include("../conex/inibd.php");

 $web3 = trim(strtoupper($_POST["emailrecoing"]));

//consultamos si el correo ingresado existe
$sqlrec = "SELECT nombre, apellido, empresa, login_usuario, password_usuario FROM usuario WHERE login_usuario='$web3' and very='1' ";
$rxtdpt = $conexpg -> prepare($sqlrec); 
$rxtdpt -> execute(); 
$txxs = $rxtdpt -> fetchAll(PDO::FETCH_OBJ); 
if($rxtdpt -> rowCount() > 0) { 
	foreach($txxs as $dxpx) {
		
		      $correoA = strtolower($dxpx->login_usuario);
			  $correoB = $dxpx->password_usuario;
			  $correoC = $dxpx->nombre;
			  $correoD = $dxpx->apellido;
			  $validax = "si";
		  }
	  }else{
		 $validax = "no"; 
	  }

//cerrando conexion
$conexpg = null;//cierra conexion

if($validax=="si"){
	//enviamos correo
	/*$destinatario = "$correoA"; 
$asunto = "".$correoC." Recuperar Clave de Acceso a AZATRADE - BUSINESS INTELLIGENCE"; 
$cuerpo = ' 
<html> 
<head> 
   <title>Azatrade</title> 
</head> 
<body> 
<h1>Hola '.$correoC.'</h1>
Bienvenidos al Sistema Inteligente de AZATRADE<br>
Esta es la solicitud de la clave de acceso a la portada de AZATRADE<br><br<
Nombre Completo: '.$correoC.' '.$correoD.'<br>
Usuario: <b>'.$correoA.'</b><br>
Password: <b>'.$correoB.'</b><br><br>

<br><br>
<b>ATTE EQUIPO AZATRADE</b>
</body> 
</html> 
'; 

//para el envío en formato HTML 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=utf-8\r\n"; 

//dirección del remitente 
//$headers .= "From: Miguel Angel Alvarez <pepito@desarrolloweb.com>\r\n"; 
$headers .= "From: ".$web1." <".$web3.">\r\n"; 

//dirección de respuesta, si queremos que sea distinta que la del remitente 
//$headers .= "Reply-To: mariano@desarrolloweb.com\r\n"; 

//ruta del mensaje desde origen a destino 
//$headers .= "Return-path: holahola@desarrolloweb.com\r\n"; 

//direcciones que recibián copia 
//$headers .= "Cc: maria@desarrolloweb.com\r\n"; 

//direcciones que recibirán copia oculta 
//$headers .= "Bcc: jopedis85@gmail.com,azatradeinfo@gmail.com\r\n";
//$headers .= "Bcc: informes@azatrade.info,azatradeinfo@gmail.com\r\n"; 

mail($destinatario,$asunto,$cuerpo,$headers);*/
	//fin envio correo
	$mesaje = "recook";
	header("Location: ../recuperar-clave?msrc=$mesaje");
}else{
	$mesaje = "not";
	header("Location: ../recuperar-clave?msrc=$mesaje");
}
?>