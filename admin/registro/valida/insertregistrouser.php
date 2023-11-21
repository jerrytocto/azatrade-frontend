<?php
session_start();

include("../../incBD/inibd.php");

$web1 = trim($_POST["tuname"]);
 $web2 = $_POST["tuapellido"];
 $web3 = trim(strtoupper($_POST["tuemail"]));
 $web4  =trim($_POST["tuphone"]);
 $web5 = $_POST["tuadres"];
 $web6 = $_POST["tubusiness"];
 $web7 = trim($_POST["tuclave"]);
$email = trim($_POST["tuemail"]);

//generamos clave de acceso
$caracteres='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
$longpalabra=8;
for($pass='', $n=strlen($caracteres)-1; strlen($pass) < $longpalabra ; ) {
  $x = rand(0,$n);
  $pass.= $caracteres[$x];
}
//echo"$pass <br>";

//generamos clave de activacion
$caracteres_acti='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
$longpalabra_acti=32;
for($passacti='', $nacti=strlen($caracteres_acti)-1; strlen($passacti) < $longpalabra_acti ; ) {
  $xacti = rand(0,$nacti);
  $passacti.= $caracteres_acti[$xacti];
}
//echo"$passacti";

//consultamos si el correo ingresado existe
$sqlconsu="SELECT login_usuario, password_usuario FROM usuario WHERE login_usuario='$web3'";
/*$result_UU= pg_query($conexpg,$sqlconsu) or die("Error en la Consulta SQL Sumatoria Total");
	  $numReg_U = pg_num_rows($result_UU);
	  if($numReg_U>0){
		  while ($fila_UU=pg_fetch_array($result_UU)) {*/
$result_UU=$conexpg->query($sqlconsu); 
if($result_UU->num_rows>0){ 
while($rwage=$result_UU->fetch_array()){
			 //print(Exite al menos un registro);
             $buscaemail = "yes";
		  }
	  }else{
		  //print(No Existen registros);
          $buscaemail = "no";
	  }
/*$resultadoc=pg_query($conexpg,$sqlconsu) or die (pg_last_error());
if (pg_num_rows($resultadoc)==0){
//print(Exite al menos un registro);
$buscaemail = "yes";
}else{
//print(No Existen registros);
$buscaemail = "no";
}*/

//validamos captcha
if(isset($_SESSION["num1"]) && isset($_SESSION["num2"]) && isset($_POST["captcha"])){ 
	$resp = $_SESSION["num1"]+$_SESSION["num2"]; 
	$captcha = $_POST["captcha"]; 
	if($resp==$captcha){ 
		//echo "Captcha Correcto"; 
		$valida_captcha = "1";
	}else{ 
		//echo "Captcha Incorrecto";
		$valida_captcha = "0";
	} 
} 

if($web1=="" or $web3=="" or $web4=="" or $web7=="" ){//si estan vacios
	$mesaje = "error";
	header("Location: ../?msr=$mesaje");
	exit;
}else if($buscaemail=="yes"){// si ya existe el usuario
	$mesaje = "be";
	header("Location: ../?msr=$mesaje");
	exit;
}else if($valida_captcha=="0"){
    $mesaje = "error";
	header("Location: ../?msr=$mesaje");
	exit;
}else{//si no existe registra
	
	$sqlinsert="INSERT INTO usuario(nombre, apellido, mail, celular, direccion, empresa, login_usuario, password_usuario, rol, estado, password_ramdon, perfil, fecha, iddistrito, idprovincia, iddepartamento, profesion, nivel, formacion, institucion_laboral, tipo_institucion, cargo, very, keyi)values('$web1', '$web2', '$web3', '$web4', '$web5', '$web6', '$web3', '$web7', 'BASICO', 'A', '', '', now(), '0', '0', '0', '', '', '', '', '', '', '1', '$passacti')";
	$conexpg->query($sqlinsert) or die(mysqli_error($conexpg));
    //pg_query($conexpg,$sqlinsert);
	
	//enviamos correo
	$destinatario = "$email"; 
//$asunto = "".$web1." Su cuenta fue Creada AZATRADE - BUSINESS INTELLIGENCE"; 
$asunto = "$web1 Su cuenta fue Creada AZATRADE - BUSINESS INTELLIGENCE";
$cuerpo = ' 
<html> 
<head> 
   <title>Acceso Azatrade</title> 
</head> 
<body> 
<h1>Hola '.$web1.'</h1>
Bienvenidos al Sistema Inteligente de AZATRADE<br>
Nombre Completo: '.$web1.' '.$web2.'<br>
Empresa: <b>'.$web6.'</b><br>
Usuario: <b>'.$web3.'</b><br>
Password: <b>'.$web7.'</b><br><br>

<br><br>
<b>ATTE EQUIPO AZATRADE</b>
<br><br>
<font size="1"><b>Aviso:</b>AZATRADE no se responsabiliza si los datos que se te brinda (usuario y clave), los compartes con otros usuarios. Si detectamos que compartiste estos datos, la cuenta se te bloqueara permanentemente sin reclamo alguno por tema de seguridad.</font>
</body> 
</html> 
'; 

//para el envío en formato HTML 
$headers = "MIME-Version: 1.0\r\n"; 
//$headers .= "Content-type: text/html; charset=utf-8\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
//dirección del remitente 
//$headers .= "From: Miguel Angel Alvarez <pepito@desarrolloweb.com>\r\n"; 
//$headers .= "From: ".$web1." <".$web3.">\r\n"; 
$headers .= "From: ".$web1." / ". $email.">\r\n"; 
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
//cerrando conexion
	mysqli_close($conexpg);
	$mesaje = "rs-ok";
	header("Location: ../../login/?msr=$mesaje&#azatrade");
}
?>