<?php
include("incBD/inibd.php");
$idclavepage = $_GET["key"];

$query_very = "SELECT nombre, apellido, empresa, login_usuario, password_usuario FROM usuario WHERE keyi='$idclavepage'";
$query=$conexpg->query($query_very); 
if($query->num_rows>0){ 
while($fila_very=$query->fetch_array()){ 
		  $verycorreo = strtolower($fila_very["login_usuario"]);
		  $nomcorre = $fila_very["nombre"];
		  $apecorre = $fila_very["apellido"];
		  $clacorre = $fila_very["password_usuario"];
		  $empcorre = $fila_very["empresa"];
			  
			  //actualizamos registro
			  $upda = "UPDATE usuario SET very='1' WHERE keyi='$idclavepage'";
			  $rs = $conexpg->query($upda);
		  }
	  }else{
		 $verycorreo = ""; 
	  }

//enviamos correo con sus datos de acceso
if($verycorreo!=""){
	/*$destinatario = "$verycorreo"; 
$asunto = " ".$nomcorre." Su cuenta fue Creada AZATRADE - BUSINESS INTELLIGENCE"; 
$cuerpo = ' 
<html> 
<head> 
   <title>Acceso Azatrade</title> 
</head> 
<body> 
<h1>Hola '.$nomcorre.'</h1>
Bienvenidos al Sistema Inteligente de AZATRADE, tu cuenta ya esta activa.<br>
Nombre Completo: '.$nomcorre.' '.$apecorre.'<br>
Empresa: <b>'.$empcorre.'</b><br>
Usuario: <b>'.$verycorreo.'</b><br>
Password: <b>'.$clacorre.'</b><br><br>

<br><br>
<b>ATTE EQUIPO AZATRADE</b>
<br><br>
<font size="1"><b>Aviso:</b>AZATRADE no se responsabiliza si los datos que se te brinda (usuario y clave), los compartes con otros usuarios. Si detectamos que compartiste estos datos, la cuenta se te bloqueara permanentemente sin reclamo alguno por tema de seguridad.</font>
</body> 
</html> 
'; 

//para el envío en formato HTML 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=utf-8\r\n"; 

//dirección del remitente 
//$headers .= "From: Miguel Angel Alvarez <pepito@desarrolloweb.com>\r\n"; 
$headers .= "From: Azatrade <azatradeinfo@gmail.com>\r\n"; 

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
	//cerrando conexion
	mysqli_close($conexpg);*/
}
header("Location: rpt-apro-user.php?var=ok");
?>
