<?php
$destinatario = "".$correousuen."";
$asunto = "Acceso Avanzado a Azatrade- $nom_u"; 
$cuerpo = ' 
<html> 
<head> 
   <title>ACCESO AZATRADE</title> 
</head> 
<body> 
<h1>Hola:'.$nom_u.' </h1> 
<p> Te acabamos de dar acceso avanzado a las consultas en nuestra web de AZATRADE</p> 
<br>
Con tu acceso <b>'.$tpro_u.'</b> podras reportar, consultar y descargar toda la informacion que nesecites, si tienes alguna duda o consulta escribeme a azatradeinfo@gmail.com, Whatsapp : +51 978037200
<br><br>
<b>ATTE EQUIPO AZATRADE</b>
<br><br><br>
</body> 
</html> 
'; 

//para el envío en formato HTML 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=utf-8\r\n"; 

//dirección del remitente 
$headers .= "From: Azatrade <azatradeinfo@gmail.com>\r\n"; 

//dirección de respuesta, si queremos que sea distinta que la del remitente 
//$headers .= "Reply-To: mariano@desarrolloweb.com\r\n"; 

//ruta del mensaje desde origen a destino 
//$headers .= "Return-path: holahola@desarrolloweb.com\r\n"; 

//direcciones que recibián copia 
//$headers .= "Cc: maria@desarrolloweb.com\r\n"; 

//direcciones que recibirán copia oculta 
//$headers .= "Bcc: pepe@pepe.com,juan@juan.com\r\n"; 
$headers .= "Bcc: jopedis85@gmail.com,azatradeinfo@gmail.com\r\n";

mail($destinatario,$asunto,$cuerpo,$headers);
?>