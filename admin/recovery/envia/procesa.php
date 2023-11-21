<?php
include("../../incBD/inibd.php");

 $web3 = trim(strtoupper($_POST["emailinput"]));

//consultamos si el correo ingresado existe
$sqlrec = "SELECT nombre, apellido, empresa, login_usuario, password_usuario FROM usuario WHERE login_usuario='$web3'";
/*$rs_rec = pg_query($sqlrec) or die("Error en la Consulta SQL");
	  $nr_rec = pg_num_rows($rs_rec);
	  if($nr_rec>0){
		  while ($fila_rec=pg_fetch_array($rs_rec)) {*/
$rs_rec=$conexpg->query($sqlrec); 
if($rs_rec->num_rows>0){ 
while($fila_rec=$rs_rec->fetch_array()){ 
		      $correoA = strtolower($fila_rec['login_usuario']);
			  $correoB = $fila_rec['password_usuario'];
			  $correoC = $fila_rec['nombre'];
			  $correoD = $fila_rec['apellido'];
			  $validax = "si";
		  }
	  }else{
		 $validax = "no"; 
	  }

//cerrando conexion
	mysqli_close($conexpg);

if($validax=="si"){
	//enviamos correo
	$destinatario = "$correoA"; 
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
$headers .= "Bcc: azatradeinfo@gmail.com\r\n"; 

mail($destinatario,$asunto,$cuerpo,$headers);
	//fin envio correo
	$mesaje = "recook";
	header("Location: ../?msrc=$mesaje");
}else{
	$mesaje = "not";
	header("Location: ../?msrc=$mesaje");
}
?>