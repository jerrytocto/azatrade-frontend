<?php

 $tipo_plan = $_POST["plan"];
  $nom = $_POST["nombres"];
   $cel = $_POST["celu"];
    $email = trim(strtolower($_POST["correo"]));
	 $comen = $_POST["textarea"];
	 
$destinatario = "$email"; 
$asunto = "Solicitud/Acceso avanzado al '.$tipo_plan.' AZATRADE"; 
$cuerpo = ' 
<html> 
<head> 
   <title>Solicitud de Acceso Azatrade</title> 
</head> 
<body> 
<h1>Hola '.$nom.'</h1> 
Para tener acceso al <b>'.$tipo_plan.'</b>, siga estos 3 simples pasos:<br>
1. Pagar el costo del <b>'.$tipo_plan.'</b>  en<br>
<p>
* BANCO DE LA NACIÓN Soles 04301177408<br>
* BCP Soles: 41521396625050<br>
* BBVA Soles: 0011-0796-0200120794 <br>
<b>Titular:</b> Ramiro Azañero Díaz<br>

</p>
2. Enviar el voucher de pago a <b>informes@azatrade.info</b> o al WhatsApp +51 974915400
 <br>
3. Nosotros estaremos confirmando el pago y enviaremos un correo de confirmación.<br><br>

<b>Este mensaje esta consignado al correo: </b>'.$email.' <br>
<b>Numero Telefonico:</b> '.$cel.' .<br>
<b>Comentario de registro:</b> '.$comen.' .<br><br>

<b>ATTE EQUIPO AZATRADE</b>

</body> 
</html> 
'; 

//para el envío en formato HTML 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=utf-8\r\n"; 

//dirección del remitente 
//$headers .= "From: Miguel Angel Alvarez <pepito@desarrolloweb.com>\r\n"; 
$headers .= "From: ".$nom." <".$email.">\r\n"; 

//dirección de respuesta, si queremos que sea distinta que la del remitente 
//$headers .= "Reply-To: mariano@desarrolloweb.com\r\n"; 

//ruta del mensaje desde origen a destino 
//$headers .= "Return-path: holahola@desarrolloweb.com\r\n"; 

//direcciones que recibián copia 
//$headers .= "Cc: maria@desarrolloweb.com\r\n"; 

//direcciones que recibirán copia oculta 
$headers .= "Bcc: azatradeinfo@gmail.com\r\n"; 

mail($destinatario,$asunto,$cuerpo,$headers);
$mensaje="true";
header("Location: ../?mss=$mensaje");
	?>
